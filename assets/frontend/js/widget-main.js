(function ($) {
  /**
   * Cart Additional Options Toggle
   */
  $("body").on("click", "dt.variation-Additionals", function () {
    if ($(this).closest("dl.variation").hasClass("open")) {
      $(this).closest("dl.variation").removeClass("open");
    } else {
      $(this).closest("dl.variation").addClass("open");
    }
  });
})(jQuery);
