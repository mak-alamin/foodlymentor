(function ($) {
  $("body").on("added_to_cart, removed_from_cart", function () {
    // First, get the current cart count and total
    $.ajax({
      url: wc_add_to_cart_params.ajax_url,
      type: "POST",
      data: {
        action: "woocommerce_get_refreshed_fragments",
      },
      success: function (data) {
        // Update the mini cart count and total
        $(".foodlymentor_shopping_cart_content").replaceWith(
          data.fragments[".cart-contents"]
        );
      },
    });
  });
})(jQuery);
