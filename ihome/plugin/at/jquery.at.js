//Copyright (c) 2012 chord.luo@gmail.com
var jq = jQuery.noConflict();
(function() {

  (function(jq) {
    var At, AtView, Mirror, log, _DEFAULT_TPL, _evalTpl, _highlighter, _isNil, _objectify, _sorter, _unique;
    Mirror = function($origin) {
      this.init($origin);
      return this;
    };
    Mirror.prototype = {
      $mirror: null,
      css: ["overflowY", "height", "width", "paddingTop", "paddingLeft", "paddingRight", "paddingBottom", "marginTop", "marginLeft", "marginRight", "marginBottom", 'fontFamily', 'borderStyle', 'borderWidth', 'wordWrap', 'fontSize', 'lineHeight', 'overflowX'],
      init: function($origin) {
        var $mirror, css;
        $mirror = jq('<div></div>');
        css = {
          opacity: 0,
          position: 'absolute',
          left: 0,
          top: 0,
          zIndex: -20000,
          'white-space': 'pre-wrap'
        };
        jq.each(this.css, function(i, p) {
          return css[p] = $origin.css(p);
        });
        $mirror.css(css);
        jq('body').append($mirror);
        return this.$mirror = $mirror;
      },
      setContent: function(html) {
        return this.$mirror.html(html);
      },
      getFlagRect: function() {
        var $flag, pos;
        $flag = this.$mirror.find("span#flag");
        pos = $flag.position();
        return {
          left: pos.left,
          top: pos.top,
          bottom: $flag.height() + pos.top
        };
      },
      height: function() {
        return this.$mirror.height();
      }
    };
    At = function(inputor) {
      var $inputor,
        _this = this;
      $inputor = this.$inputor = jq(inputor);
      this.options = {};
      this.query = {
        text: "",
        start: 0,
        stop: 0
      };
      this._cache = {};
      this.pos = 0;
      this.flags = {};
      this.theflag = null;
      this.search_word = {};
      this.view = AtView;
      this.mirror = new Mirror($inputor);
      $inputor.on("keyup.inputor", function(e) {
        var lookup, stop;
        stop = e.keyCode === 40 || e.keyCode === 38;
        lookup = !(stop && _this.view.isShowing());
        if (lookup) return _this.lookup();
      }).on("mouseup.inputor", function(e) {
        return _this.lookup();
      });
      this.init();
      log("At.new", $inputor[0]);
      return this;
    };
    At.prototype = {
      constructor: At,
      init: function() {
        var _this = this;
        this.$inputor.on('keydown.inputor', function(e) {
          return _this.onkeydown(e);
        }).on('scroll.inputor', function(e) {
          return _this.view.hide();
        }).on('blur.inputor', function(e) {
          return _this.view.hide(1000);
        });
        return log("At.init", this.$inputor[0]);
      },
      reg: function(flag, options) {
        var opt, _base, _default;
        opt = {};
        if (jq.isFunction(options)) {
          opt['callback'] = options;
        } else {
          opt = options;
        }
        _default = (_base = this.options)[flag] || (_base[flag] = jq.fn.atWho["default"]);
        this.options[flag] = jq.extend({}, _default, opt);
        return log("At.reg", this.$inputor[0], flag, options);
      },
      dataValue: function() {
        var match, search_word;
        search_word = this.search_word[this.theflag];
        if (search_word) return search_word;
        match = /data-value=["']?\$\{(\w+)\}/g.exec(this.getOpt('tpl'));
        return this.search_word[this.theflag] = !_isNil(match) ? match[1] : null;
      },
      getOpt: function(key) {
        try {
          return this.options[this.theflag][key];
        } catch (error) {
          return null;
        }
      },
      rect: function() {
        var $inputor, Sel, at_rect, bottom, end_range, format, html, mirror, offset, start_range, text, x, y;
        $inputor = this.$inputor;
        if (document.selection) {
          Sel = document.selection.createRange();
          x = Sel.boundingLeft + $inputor.scrollLeft();
          y = Sel.boundingTop + jq(window).scrollTop() + $inputor.scrollTop();
          bottom = y + Sel.boundingHeight;
          return {
            top: y - 2,
            left: x - 2,
            bottom: bottom - 2
          };
        }
        mirror = this.mirror;
        format = function(value) {
          return value.replace(/</g, '&lt').replace(/>/g, '&gt').replace(/`/g, '&#96').replace(/"/g, '&quot').replace(/\r\n|\r|\n/g, "<br />");
        };
        text = $inputor.val();
        start_range = text.slice(0, this.pos - 1);
        end_range = text.slice(this.pos + 1);
        html = "<span>" + format(start_range) + "</span>";
        html += "<span id='flag'>@</span>";
        html += "<span>" + format(end_range) + "</span>";
        mirror.setContent(html);
        offset = $inputor.offset();
        at_rect = mirror.getFlagRect();
        x = offset.left + at_rect.left - $inputor.scrollLeft();
        y = offset.top - $inputor.scrollTop();
        bottom = y + at_rect.bottom;
        y += at_rect.top;
        return {
          top: y,
          left: x,
          bottom: bottom + 2
        };
      },
      cache: function(value) {
        var key, _base;
        key = this.query.text;
        if (!this.getOpt("cache") || !key) return null;
        return (_base = this._cache)[key] || (_base[key] = value);
      },
      getKeyname: function() {
        var $inputor, caret_pos, end, key, matched, start, subtext, text,
          _this = this;
        $inputor = this.$inputor;
        text = $inputor.val();
        caret_pos = $inputor.caretPos();
        subtext = text.slice(0, caret_pos);
        matched = null;
        jq.each(this.options, function(flag) {
          var match, regexp;
          regexp = new RegExp(flag + '([A-Za-z0-9_\+\-]*)$|' + flag + '([^\\x00-\\xff]*)$', 'gi');
          match = regexp.exec(subtext);
          if (!_isNil(match)) {
            //matched = match[1] === void 0 ? match[2] : match[1];
            matched = match[2] ? match[2] : match[1];
            _this.theflag = flag;
            return false;
          }
        });
        if (typeof matched === 'string' && matched.length <= 20) {
          start = caret_pos - matched.length;
          end = start + matched.length;
          this.pos = start;
          key = {
            'text': matched.toLowerCase(),
            'start': start,
            'end': end
          };
        } else {
          this.view.hide();
        }
        log("At.getKeyname", key);
        return this.query = key;
      },
      replaceStr: function(str) {
        var $inputor, key, source, start_str, text;
        $inputor = this.$inputor;
        key = this.query;
        source = $inputor.val();
        start_str = source.slice(0, key.start);
        text = start_str + str + source.slice(key.end);
        $inputor.val(text);
        $inputor.caretPos(start_str.length + str.length);
        $inputor.change();
        return log("At.replaceStr", text);
      },
      onkeydown: function(e) {
        var view;
        view = this.view;
        if (!view.isShowing()) return;
        switch (e.keyCode) {
          case 38:
            e.preventDefault();
            view.prev();
            break;
          case 40:
            e.preventDefault();
            view.next();
            break;
          case 9:
          case 13:
            if (!view.isShowing()) return;
            e.preventDefault();
            view.choose();
            break;
          default:
            jq.noop();
        }
        return e.stopPropagation();
      },
      renderView: function(datas) {
        log("At.renderView", this, datas);
        datas = datas.splice(0, this.getOpt('limit'));
        datas = _unique(datas, this.dataValue());
        datas = _objectify(datas);
        datas = _sorter.call(this, datas);
        return this.view.render(this, datas);
      },
      lookup: function() {
        var callback, datas, key;
        key = this.getKeyname();
        if (!key) return false;
        log("At.lookup.key", key);
        if (!_isNil(datas = this.cache())) {
          this.renderView(datas);
        } else if (!_isNil(datas = this.lookupWithData(key))) {
          this.renderView(datas);
        } else if (jq.isFunction(callback = this.getOpt('callback'))) {
          callback(key.text, jq.proxy(this.renderView, this));
        } else {
          this.view.hide();
        }
        return jq.noop();
      },
      lookupWithData: function(key) {
        var data, items,
          _this = this;
        data = this.getOpt("data");
        if (jq.isArray(data) && data.length !== 0) {
          items = jq.map(data, function(item, i) {
            var match, name, regexp;
            try {
              name = jq.isPlainObject(item) ? item[_this.dataValue()] : item;
              regexp = new RegExp(key.text.replace("+", "\\+"), 'i');
              match = name.match(regexp);
            } catch (e) {
              return null;
            }
            if (match) {
              return item;
            } else {
              return null;
            }
          });
        }
        return items;
      }
    };
    AtView = {
      timeout_id: null,
      id: '#at-view',
      holder: null,
      _jqo: null,
      jqo: function() {
        var jqo;
        jqo = this._jqo;
        return jqo = _isNil(jqo) ? (this._jqo = jq(this.id)) : jqo;
      },
      init: function() {
        var $menu, tpl,
          _this = this;
        if (!_isNil(this.jqo())) return;
        tpl = "<div id='" + this.id.slice(1) + "' class='at-view'><ul id='" + this.id.slice(1) + "-ul'></ul></div>";
        jq("body").append(tpl);
        $menu = this.jqo().find('ul');
        return $menu.on('mouseenter.view', 'li', function(e) {
          $menu.find('.cur').removeClass('cur');
          return jq(e.currentTarget).addClass('cur');
        }).on('click', function(e) {
          e.stopPropagation();
          e.preventDefault();
          return _this.choose();
        });
      },
      isShowing: function() {
        return this.jqo().is(":visible");
      },
      choose: function() {
        var $li, str;
        $li = this.jqo().find(".cur");
        str = _isNil($li) ? this.holder.query.text + " " : $li.attr(this.holder.getOpt("choose")) + " ";
        this.holder.replaceStr(str);
        return this.hide();
      },
      rePosition: function() {
        var rect;
        rect = this.holder.rect();
        if (rect.bottom + this.jqo().height() - jq(window).scrollTop() > jq(window).height()) {
          rect.bottom = rect.top - this.jqo().height();
        }
        log("AtView.rePosition", {
          left: rect.left,
          top: rect.bottom
        });
        return this.jqo().offset({
          left: rect.left,
          top: rect.bottom
        });
      },
      next: function() {
        var cur, next;
        cur = this.jqo().find('.cur').removeClass('cur');
        next = cur.next();
        if (!next.length) next = jq(this.jqo().find('li')[0]);
        return next.addClass('cur');
      },
      prev: function() {
        var cur, prev;
        cur = this.jqo().find('.cur').removeClass('cur');
        prev = cur.prev();
        if (!prev.length) prev = this.jqo().find('li').last();
        return prev.addClass('cur');
      },
      show: function() {
        if (!this.isShowing()) this.jqo().show();
        return this.rePosition();
      },
      hide: function(time) {
        var callback,
          _this = this;
        if (isNaN(time)) {
          if (this.isShowing()) return this.jqo().hide();
        } else {
          callback = function() {
            return _this.hide();
          };
          clearTimeout(this.timeout_id);
          return this.timeout_id = setTimeout(callback, 300);
        }
      },
      clear: function(clear_all) {
        if (clear_all === true) this._cache = {};
        return this.jqo().find('ul').empty();
      },
      render: function(holder, list) {
        var $ul, tpl;
        if (!jq.isArray(list)) return false;
        if (list.length <= 0) {
          this.hide();
          return true;
        }
        this.holder = holder;
        holder.cache(list);
        this.clear();
        $ul = this.jqo().find('ul');
        tpl = holder.getOpt('tpl');
        jq.each(list, function(i, item) {
          var li;
          tpl || (tpl = _DEFAULT_TPL);
          li = _evalTpl(tpl, item);
          log("AtView.render", li);
          return $ul.append(_highlighter(li, holder.query.text));
        });
        $ul.children().tooltip();
        this.show();
        return $ul.find("li:eq(0)").addClass("cur");
      }
    };
    _objectify = function(list) {
      return jq.map(list, function(item, k) {
        if (!jq.isPlainObject(item)) {
          item = {
            id: k,
            name: item
          };
        }
        return item;
      });
    };
    _evalTpl = function(tpl, map) {
      var el;
      try {
        return el = tpl.replace(/\$\{([^\}]*)\}/g, function(tag, key, pos) {
          return map[key];
        });
      } catch (error) {
        return "";
      }
    };
    _highlighter = function(li, query) {
      if (_isNil(query)) return li;
      return li.replace(new RegExp(">\\s*(\\w*)(" + query.replace("+", "\\+") + ")(\\w*)\\s*<", 'ig'), function(str, $1, $2, $3) {
        return '> ' + $1 + '<strong>' + $2 + '</strong>' + $3 + ' <';
      });
    };
    _sorter = function(items) {
      var data_value, item, query, results, text, _i, _len;
      data_value = this.dataValue();
      query = this.query.text;
      results = [];
      for (_i = 0, _len = items.length; _i < _len; _i++) {
        item = items[_i];
        text = item[data_value];
        if (text.toLowerCase().indexOf(query) === -1) continue;
        item.order = text.toLowerCase().indexOf(query);
        results.push(item);
      }
      results.sort(function(a, b) {
        return a.order - b.order;
      });
      return results;
    };
    _unique = function(list, query) {
      var record;
      record = [];
      return jq.map(list, function(v, id) {
        var value;
        value = jq.isPlainObject(v) ? v[query] : v;
        if (jq.inArray(value, record) < 0) {
          record.push(value);
          return v;
        }
      });
    };
    _isNil = function(target) {
      return !target || (jq.isPlainObject(target) && jq.isEmptyObject(target)) || (jq.isArray(target) && target.length === 0) || (target instanceof jq && target.length === 0) || target === void 0;
    };
    _DEFAULT_TPL = "<li id='${id}' data-value='${name}'>${name}</li>";
    log = function() {};
    jq.fn.atWho = function(flag, options) {
      AtView.init();
      return this.filter('textarea, input').each(function() {
        var $this, data;
        $this = jq(this);
        data = $this.data("AtWho");
        if (!data) $this.data('AtWho', (data = new At(this)));
        return data.reg(flag, options);
      });
    };
    return jq.fn.atWho["default"] = {
      data: [],
      choose: "data-value",
      callback: null,
      cache: true,
      limit: 5,
      tpl: _DEFAULT_TPL
    };
  })(window.jQuery);

}).call(this);
