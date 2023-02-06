(function ($) {

  /**
   * ---------------------------------
   * Side Cart
   * ---------------------------------
  */
  $("body").on("click", ".foodlymentor-cart-icon", function () {
    $(".foodlymentor_shopping_cart-side_cart").animate({
      right: '0px'
    }, 300);
  });

  $("body").on("click", ".foodlymentor_shopping_cart_content .close-cart", function (){
    $(".foodlymentor_shopping_cart-side_cart").animate({
      right: '-40%'
    }, 300);
  });

  /**
   * Refresh cart
   */
  function foodlymentorRefreshCart() {
    $.ajax({
      url: wc_add_to_cart_params.ajax_url,
      type: "POST",
      data: {
        action: "woocommerce_get_refreshed_fragments",
      },
      success: function (data) {
        $(".foodlymentor_mini_cart").html(
          data.fragments["div.widget_shopping_cart_content"]
        );

        $("#foodlymentor_product_popup .eicon-editor-close").click();
      },
    });
  }

  $("body").on("added_to_cart", foodlymentorRefreshCart);
  $("body").on("removed_from_cart", foodlymentorRefreshCart);
})(jQuery);
