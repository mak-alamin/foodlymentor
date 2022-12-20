(function ($) {

  /**
   * =============================================
   * Product PopUp
   * =============================================
   */
  var product_popup = {
    modal_template: `<div id="foodlymentor_product_popup" class="modal-container">
          <div class="modal-content">
              <div class="modal-header">
                  <h2 class="product-title"></h2>
                  <i class="eicon-editor-close"></i>
              </div>
              <div class="modal-body">
                  <p class="product-img"></p>
                  <p class="product-desc"></p>
                  <div class="addi_options"></div>
              </div>
              <div class="modal-footer">
                  <div class="quantity">
                      <i class="eicon-minus-circle-o qty_decrease"></i>
                      <input type="text" name="product_quantity" id="product_quantity" value="1">
                      <i class="eicon-plus-circle-o qty_increase"></i>
                  </div>   
              </div>
          </div>
      </div>`,

    clearPopup: function () {
      $("#foodlymentor_product_popup .product-title").text("");
      $("#foodlymentor_product_popup .product-desc").text("");
      $("#foodlymentor_product_popup #product_quantity").val(1);
      $("#foodlymentor_product_popup .modal-footer").find(".product").remove();
    },
  };

  $(document).ready(function () {
    $(document.body).append(product_popup.modal_template);

    var product_title = $("#foodlymentor_product_popup .product-title");
    var product_img = $("#foodlymentor_product_popup .product-img");
    var product_desc = $("#foodlymentor_product_popup .product-desc");
    var modal_footer = $("#foodlymentor_product_popup .modal-footer");

    $(document).on(
      "click",
      ".foodlymentor-product-grid li.product",
      function (e) {
        e.preventDefault();

        var product_id = parseInt($(this).data("product_id"));

        jQuery.ajax({
          method: "GET",
          url: foodlymentorData.ajaxurl,
          data: {
            product_id: product_id,
            action: "get_woo_product_data",
          },
          success: function (data) {
            console.log(data);
            product_title.text(data.name);
            product_img.html(
              '<img src="' + data.image + '" alt="' + data.name + '">'
            );
            product_desc.text(data.short_desc);

            modal_footer.append(data.add_to_cart_btn);
          },
          error: function (err) {
            console.log(err);
          },
          complete: function () {
            $(".modal-container").show();
          },
        });
      }
    );

    $(document).on(
      "click",
      "#foodlymentor_product_popup .eicon-editor-close",
      function () {
        $(".modal-container").fadeOut();
        setTimeout(product_popup.clearPopup, 500);
      }
    );

    $(document).on("click", "#foodlymentor_product_popup", function (e) {
      if (e.target.closest(".modal-content")) {
        return;
      }

      $(".modal-container").fadeOut();
      setTimeout(product_popup.clearPopup, 500);
    });
  });

  /**
   * =============================================
   * Product Quantity
   * =============================================
   */
  $(document).on(
    "click",
    "#foodlymentor_product_popup .qty_increase",
    function () {
      var product_qty = $("#foodlymentor_product_popup input#product_quantity");

      var quantity = parseInt(product_qty.val(), 10) || 1;

      quantity = isNaN(quantity) ? 1 : quantity;

      var max_quantity = product_qty.attr("max");

      if (quantity == max_quantity) {
        return;
      }

      quantity++;

      product_qty.val(quantity);

      var add_to_cart_btn = $(this)
        .closest(".modal-footer")
        .find("a.add_to_cart_button");

      $(add_to_cart_btn).attr("data-quantity", quantity);
    }
  );

  $(document).on(
    "click",
    "#foodlymentor_product_popup .qty_decrease",
    function () {
      var product_qty = $("#foodlymentor_product_popup input#product_quantity");

      var quantity = parseInt(product_qty.val(), 10);

      quantity = isNaN(quantity) ? 1 : quantity;

      if (quantity == 1) {
        return;
      }

      quantity--;

      product_qty.val(quantity);

      var add_to_cart_btn = $(this)
        .closest(".modal-footer")
        .find("a.add_to_cart_button");

      $(add_to_cart_btn).attr("data-quantity", quantity);
    }
  );

  $(document).on(
    "change",
    "#foodlymentor_product_popup input#product_quantity",
    function () {
      var add_to_cart_btn = $(this)
        .closest(".modal-footer")
        .find("a.add_to_cart_button");

      $(add_to_cart_btn).attr("data-quantity", quantity);
    }
  );
})(jQuery);
