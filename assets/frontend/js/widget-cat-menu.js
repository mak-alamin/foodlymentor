(function ($) {
  $(document).ready(function () {
    var dropDownButton = $(".foodlymentor_cat_menu_list .dropbtn"),
      dropDownLink = $(".foodlymentor_cat_menu_list a");

    dropDownLink.on("click", function () {
      dropDownButton.removeClass("active");
      dropDownButton.text("More" + "...");
      $(this).addClass("active");
    });

    $("#moreDropdown a").on("click", function () {
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
