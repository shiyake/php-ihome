
(function() {
	var $ = jQuery.noConflict();
	$(function() {
		function Tab(el) {
			this.el = el;
			this.$el = $(el);
			this.$el.data("public-tab", this);
			this.name = this.$el.find("a").text();
			this.hash = this.$el.find("a").attr("href");
			this.$target = $(this.hash);
		}

		Tab.prototype.isFold = function() {
			return this.el.parentNode === $moreMenu[0];
		};

		Tab.prototype.show = function() {
			if (this.isFold()) {
				$more.find(">a").text(this.name);
				$more.addClass("active");
			} else {
				this.$el.addClass("active");
			}
			this.$target.show();
		};

		Tab.prototype.hide = function() {
			if (this.isFold()) {
				$more.find(">a").text("更多");
				$more.removeClass("active");
			} else {
				this.$el.removeClass("active");
			}
			this.$target.hide();
		};

		Tab.prototype.equal = function(tab) {
			return this.hash === tab.hash;
		}

		Tab.prototype.target = function() {
			return this.$target;
		}

		var $tabs = $(".tabs");
		var activeTab = new Tab($tabs.find(".active")[0]);
		var $more = $tabs.find(".more");
		var $moreMenu = $tabs.find(".more-menu");

		$tabs.on('click', 'a', function(e) {
			e.preventDefault();
			var $tab = $(this.parentNode);

			if ($tab.hasClass("more")) {
				return;
			}

			var tab = $tab.data("public-tab");
			if (!tab) {
				tab = new Tab($tab[0]);
			}

			if (activeTab.equal(tab)) {
				return;
			}

			activeTab.hide();
			tab.show();
			activeTab = tab;
            if ($(window).scrollTop() == 1){
                $(window).scrollTop(0);
            }else{
                $(window).scrollTop(1);
            }
			onTabChanged();
		});

		var timer = -1;

		$more.hover(function() {
			clearTimeout(timer);
			$moreMenu.show();
		}, function() {
			timer = setTimeout(function() {
				$moreMenu.hide();
			}, 300);
		});

		$moreMenu.hover(function() {
			clearTimeout(timer);
		});

		function onTabChanged() {
			$moreMenu.hide();
			if (!activeTab.isFold()) {
				return;
			}

			var $target = activeTab.target();
			if ($target.children().length !== 0) {
				return;
			}

			var hash = activeTab.hash;
			var target = hash.replace("#", "");
			var type = hash.split("_")[2];
			
		}

	});
})();
