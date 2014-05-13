(function(root) {
    if (root.bailin_face) {
        return;
    }

    var jq = jQuery.noConflict();

    function pop_info() {
        var arrow = '<div class="arrow"></div>';
        var FACE_TPL = arrow + "<table>";
        var COLS = 14;
        var num = 57;
        FACE_TPL += "<tr>"
        for (var i = 1; i <= num; i++) {
            if (i % COLS != 0) {
                FACE_TPL += '<td class="face_cell"><img data-index="' + i + '" src="image/face_new/' + i + '.gif"></img></td>';
            } else {
                FACE_TPL += '</tr><tr>'
            }
        }
        FACE_TPL += "</table>";
        return FACE_TPL;
    }

    function getPos(target) {
        var el = jq(target).get(0);
        var pos = 0;
        if ('selectionStart' in el) {
            pos = el.selectionStart;
        } else if ('selection' in document) {
            el.focus();
            var Sel = document.selection.createRange();
            var SelLength = document.selection.createRange().text.length;
            Sel.moveStart('character', -el.value.length);
            pos = Sel.text.length - SelLength;
        }
        return pos;
    }

    function insertface(id, target) {
        var faceText = '[nm:' + id + ':]';
        var pos = getPos(target);
        var strHead = '',
            strEnd = '';
        strHead = jq(target).val().substr(0, pos);
        strEnd = jq(target).val().substr(pos, jq(target).val().length);
        jq(target).val(strHead + faceText + strEnd);
        jq(target).get(0).selectionStart = strHead.length + faceText.length;
        jq(target).get(0).selectionEnd = strHead.length + faceText.length;
    }

    function popover_menu(e, height, width, html) {
        e = e.next(".drop_face_menu");
        if (e.html() == "") {
            e.html(html);
            e.css({
                "display": "block"
            });
            e.stop().animate({
                "width": width + "px"
            }, 100, function() {
                e.stop().animate({
                    "height": height + "px"
                }, 50, function() {
                    e.addClass("face_menu_opened");
                });
            });
        }
    }

    function close_menu(target) {
        if (!jq(target).hasClass("drop_face") && !jq(target).hasClass("drop_face_menu") && !jq(target).parents().hasClass("drop_face_menu")) {
            jq(".drop_face_menu").each(function() {
                obj = jq(this);
                if (obj.hasClass("face_menu_opened")) {
                    obj.removeClass("face_menu_opened");
                    obj.html("");
                    obj.css({
                        "height": "0px",
                        "width": "0px",
                        "display": "none"
                    });
                }
            });
        }
    }
    jq(document).on("click", ".face_cell", function() {
        var img_id = jq(this).children().data("index");
        var obj = jq(this).closest(".drop_face_menu");
        target = "#" + obj.data("target");
        document.getElementById(obj.data("target")).focus();
        insertface(img_id, target);
    });
    jq(document).on("click", ".drop_face", function(e) {
        e.preventDefault();
        popover_menu(jq(this), 152, 374, pop_info());
    });
    jq(document).on("click", function(e) {
        close_menu(e.target);
    });

    root.bailin_face = {};
})(window);
