(function ($) {
  function foodlymentorRefreshCart() {
    console.log("added.");
    // First, get the current cart count and total
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
