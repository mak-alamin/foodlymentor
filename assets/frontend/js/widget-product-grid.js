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
                  <div class="additional_options"></div>
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

  function foodlyAddiOptionsHtml(data) {
    let html = "";

    if (data?.addi_options?.length) {
      data.addi_options.forEach((el, i) => {
        html +=
          "<div class='addi_option' data-max='" +
          el.max_selection +
          "' data-min='" +
          el.min_selection +
          "'>";

        html += "<h3>" + el.title + "</h3>";

        if (el?._options.length) {
          el._options.forEach((option, index) => {
            console.log(option);

            let option_price = option.price ? option.price : 0;

            let defaultQty = el?.min_selection ? el.min_selection : 1;

            option_price = parseFloat(option_price).toFixed(2);

            html +=
              '<div class="option" data-group_index="' +
              i +
              '" data-index="' +
              index +
              '" data-name="' +
              option.name +
              '" data-price="' +
              option_price +
              '" data-group_title="' +
              el.title +
              '"><div class="extra-quantity">';

            html +=
              '<div class="value-button extra_decrease" value="Decrease Quantity">-</div>';

            html +=
              '<input type="text" name="ex_options_qty_0" value="' + defaultQty +
              '" min="' +
              el.min_selection +
              '" max="' +
              el.max_selection +
              '" class="extra-items-quantity"></input>';

            html +=
              '<div class="value-button extra_increase" value="Increase Quantity">+</div>';

            html += "</div>";

            html +=
              '<span class="value-button extra_active_btn" value="Add Extra Option">+</span>';

            html += "<div class='label'>";

            html += "<strong class='extra_option_name'>";

            html += option.name;

            html +=
              '<span class="woocommerce-Price-amount"> (+ $' +
              option_price +
              ")</span></strong></div></div>";
          });
        }

        html += "</div>";
      });
    }

    return html;
  }

  $(document).ready(function () {
    $(document.body).append(product_popup.modal_template);

    var product_title = $("#foodlymentor_product_popup .product-title");
    var product_img = $("#foodlymentor_product_popup .product-img");
    var product_desc = $("#foodlymentor_product_popup .product-desc");
    var addi_options = $("#foodlymentor_product_popup .additional_options");
    var modal_footer = $("#foodlymentor_product_popup .modal-footer");

    /**
     * =========================================
     * Additional Options Quantity
     * =========================================
     */

    $("body").on(
      "click",
      ".additional_options .addi_option .option",
      function () {
        let product_id = $(
          "#foodlymentor_product_popup .add_to_cart_button"
        ).data("product_id");

        let add_to_cart_url = "?add-to-cart=" + product_id;

        let options = $(".additional_options .addi_option .option.active");

        let addi_options = [];

        $.each(options, function (key, value) {
          let option = {
            group_title: $(value).data("group_title"),
            group_index: $(value).data("group_index"),
            index: $(value).data("index"),
            name: $(value).data("name"),
            quantity: $(value).find(".extra-quantity input").val(),
          };

          addi_options.push(option);
        });

        add_to_cart_url += "&addi_options=" + JSON.stringify(addi_options);

        $("#foodlymentor_product_popup .add_to_cart_button").attr(
          "href",
          add_to_cart_url
        );

        $("#foodlymentor_product_popup .add_to_cart_button").attr(
          "data-addi_options",
          JSON.stringify(addi_options)
        );
      }
    );

    $("body").on(
      "click",
      ".additional_options .addi_option .option .label, .additional_options .addi_option .option .extra_active_btn",
      function (e) {
        $(this).closest(".option").toggleClass("active");
        $(this)
          .closest(".option")
          .find(".extra-quantity")
          .toggleClass("active");
      }
    );

    // Extra Quantity Increase
    $("body").on("click", ".extra_increase", function () {
      let quantity =
        parseInt($(this).siblings("input.extra-items-quantity").val(), 10) || 1;

      quantity = isNaN(quantity) ? 1 : quantity;
      quantity++;

      let maxQuantity =
        parseInt($(this).siblings("input.extra-items-quantity").attr('max'));
      
      if(quantity > maxQuantity){
        return;
      }

      $(this).siblings("input.extra-items-quantity").val(quantity);

      let extra_price = $(this).closest(".option").data("price");

      $(this)
        .closest(".option")
        .find(".woocommerce-Price-amount")
        .html(
          '(+ <span class="woocommerce-Price-currencySymbol">$</span>' +
            parseFloat(extra_price * quantity).toFixed(2) +
            ")"
        );
    });

    // Extra Quantity decrease
    $("body").on("click", ".extra_decrease", function () {
      let quantity = parseInt(
        $(this).siblings("input.extra-items-quantity").val(),
        10
      );

      quantity = isNaN(quantity) ? 1 : quantity;

      let minQuantity =
      parseInt($(this).siblings("input.extra-items-quantity").attr('min'));

      if ( quantity == minQuantity || quantity == 1) {
        $(this).closest(".iweb_extra_options").find("input.ex-options").click();
        $(this)
          .closest(".additional_options .addi_option .option")
          .removeClass("active");
        $(this).closest(".extra-quantity").removeClass("active");
        return;
      }

      quantity--;

      $(this).siblings("input.extra-items-quantity").val(quantity);

      let extra_price = $(this).closest(".option").data("price");

      $(this)
        .closest(".option")
        .find(".woocommerce-Price-amount")
        .html(
          '(+ <span class="woocommerce-Price-currencySymbol">$</span>' +
            parseFloat(extra_price * quantity).toFixed(2) +
            ")"
        );
    });

    $("body").on("change", "input.extra-items-quantity", function () {
      let extra_price = $(this).closest(".option").data("price");

      $(this)
        .closest(".option")
        .find(".woocommerce-Price-amount")
        .html(
          '(+ <span class="woocommerce-Price-currencySymbol">$</span>' +
            parseFloat(extra_price * $(this).val()).toFixed(2) +
            ")"
        );
    });

    /**
     * =======================================
     * Open Product PopUp
     * =======================================
     */
    $("body").on(
      "click",
      ".foodlymentor-product-grid .product, .foodlymentor-product-grid .product a",
      function (e) {
        e.preventDefault();

        $(e.target).closest(".product").find(".lds-dual-ring").show();

        var product_id = parseInt($(this).data("product_id"));

        jQuery.ajax({
          method: "GET",
          url: foodlymentorData.ajaxurl,
          data: {
            product_id: product_id,
            action: "get_woo_product_data",
          },
          success: function (data) {
            product_title.text(data.name);
            product_img.html(
              '<img src="' + data.image + '" alt="' + data.name + '">'
            );

            product_desc.text(data.short_desc);

            addi_options.html(foodlyAddiOptionsHtml(data));

            modal_footer.append(data.add_to_cart_btn);

            $(".modal-container").show();

            $(e.target).closest(".product").find(".lds-dual-ring").hide();
          },

          error: function (err) {
            console.log(err);
          },
        });
      }
    );

    /**
     * =========================================
     * Product Quantity
     * =========================================
     */
    $(document).on(
      "click",
      "#foodlymentor_product_popup .qty_increase",
      function () {
        var product_qty = $(
          "#foodlymentor_product_popup input#product_quantity"
        );

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
        var product_qty = $(
          "#foodlymentor_product_popup input#product_quantity"
        );

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

    /**
     * =======================================
     * Close Product PopUp
     * =======================================
     */
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
})(jQuery);
