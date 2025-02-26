! function (t, o) {
	"object" == typeof exports && "undefined" != typeof module ? o() : "function" == typeof define && define.amd ? define(o) : o()
}(0, function () {
	"use strict";
	window.ShardsDashboards = window.ShardsDashboards ? window.ShardsDashboards : {}, $.extend($.easing, {
		easeOutSine: function (t, o, e, i, n) {
			return i * Math.sin(o / n * (Math.PI / 2)) + e
		}
	}), $(document).ready(function () {
		var t = {
			duration: 270,
			easing: "easeOutSine"
		};
		$(".dropdown").on("show.bs.dropdown", function () {
			$(this).find(".dropdown-menu").first().stop(!0, !0).slideDown(t)
		}), $(".dropdown").on("hide.bs.dropdown", function () {
			$(this).find(".dropdown-menu").first().stop(!0, !0).slideUp(t)
		}), $(".toggle-sidebar").click(function (t) {
			$(".main-sidebar").toggleClass("open")
		})
	})
});
