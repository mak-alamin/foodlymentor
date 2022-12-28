(function ($) {
  $(document).ready(function () {
    $(".foodlymentor_cat_menu_list a").on("click", function () {
      $(".dropbtn").removeClass("active");
      $(".dropbtn").text("More" + "...");
    });

    $("#moreDropdown a").on("click", function () {
      $(".dropbtn").addClass("active");
      $(".dropbtn").text($(this).text());
    });

    $(window).scroll(function () {
      if ($("#moreDropdown .ex-menu-item-active").length) {
        $(".dropbtn")
          .text($("#moreDropdown .ex-menu-item-active").text())
          .addClass("ex-menu-item-active");
      } else {
        $(".dropbtn")
          .removeClass("ex-menu-item-active")
          .text("More" + "...");
      }
    });
  });
})(jQuery);
