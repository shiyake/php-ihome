(function() {
	var $ = jQuery.noConflict();
	$(function() {
		function Tab(el) {
			this.el = el;
			this.$el = $(el);
			this.$el.data("space-tab", this);
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

		var $tabs = $("#maincontent .tabs");
		var activeTab = new Tab($tabs.find(".active")[0]);
		var $comment = $tabs.find(".comment");
		var $commentMenu = $tabs.find(".comment-menu");
		var $more = $tabs.find(".more");
		var $moreMenu = $tabs.find(".more-menu");

		$tabs.on('click', 'a', function(e) {
			e.preventDefault();
			var $tab = $(this.parentNode);

			if ($tab.hasClass("more")) {
				return;
			}
            if($tab.hasClass("comment"))    {
                 return;
            }
			var tab = $tab.data("space-tab");
			if (!tab) {
				tab = new Tab($tab[0]);
			}

			if (activeTab.equal(tab)) {
				return;
			}

			activeTab.hide();
			tab.show();
			activeTab = tab;
			onTabChanged();
		});
        $(document).on('click','#space_feed_tab',function(){
            if($('.more').hasClass('doing'))
            {
                $('.more').removeClass('doing');
                $('#space_feed').html($("#space_feed").text());
            }
			if($('.comment').hasClass('doing'))
            {
                $('.comment').removeClass('doing');
            }
        });
		var timer1 = -1;
		var timer = -1;
		
		$comment.hover(function() {
			clearTimeout(timer1);
			$commentMenu.show();
		}, function() {
			timer1 = setTimeout(function() {
				$commentMenu.hide();
			}, 300);
		});
		$commentMenu.hover(function() {
			clearTimeout(timer1);
		});
		
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

		var space_uid = $("[name=global_space_uid]").val();
		function getIndex(type, target) {
			var plus = '';
            
            if (type == 'event') plus = '&type=self';
                	ajaxget('space.php?uid='+space_uid+'&do='+type+'&view=me'+plus+'&ajaxdiv=maincontentcontent&space=1',target);
		}

		function onTabChanged() {
			$moreMenu.hide();
			$commentMenu.hide();
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
			
			getIndex(type, target);
		}

		window.space_activate_comment = function() {
			$("#tab_trigger_comment").click();
			setTimeout(function() {
			$(window).scrollTop(100);
			}, 4);
		};
	});
})();
