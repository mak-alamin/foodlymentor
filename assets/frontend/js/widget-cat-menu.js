(function ($) {
  $(document).ready(function () {
    // More menu dropdown
    $("body").on("click", ".more-menu-filter .dropbtn", function () {
      $("#moreDropdown").toggleClass("show");
      $(this).toggleClass("active");
    });

    var dropDownButton = $(".foodlymentor_cat_menu_list .dropbtn"),
      dropDownLink = $(".foodlymentor_cat_menu_list a");

    dropDownLink.on("click", function () {
      dropDownLink.removeClass("active");
      dropDownButton.removeClass("active");
      dropDownButton.text("More" + "...");
      $(this).addClass("active");
    });

    $("body").on("click", "#moreDropdown a", function () {
      dropDownLink.removeClass("active");
      dropDownButton.addClass("active");
      $(this).addClass("active");
      dropDownButton.text($(this).text());
    });

    $(window).scroll(function () {
      if ($("#moreDropdown .active").length) {
        dropDownButton
          .text($("#moreDropdown .active").text())
          .addClass("active");
      } else {
        dropDownButton.removeClass("active").text("More" + "...");
      }
    });
  });
})(jQuery);
