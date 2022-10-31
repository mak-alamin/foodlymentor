let modal_template = `<div id="foodlymentor_product_popup" class="modal-container">
    <div class="modal-content">
        <div class="modal-header">
            <h2>Product Title</h2>
            <i class="eicon-editor-close"></i>
        </div>
        <div class="modal-body">
            <p>
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Velit, qui
                voluptas. Esse, fuga! Saepe, quo laboriosam fuga tempore voluptate
                vero enim, autem, explicabo recusandae perferendis eum sed
                distinctio ipsam libero! Lorem ipsum dolor sit.
            </p>
        </div>
        <div class="modal-footer">
            <div class="quantity">
                <i class="eicon-minus-circle-o"></i>
                <input type="number" name="quantity">
                <i class=" eicon-plus-circle-o"></i>
            </div>
            <button> Add To Cart </button>
        </div>
    </div>
</div>`;
(function ($) {
  $(document).ready(function () {
    $(document.body).append(modal_template);

    const closeBtn = $("#foodlymentor_product_popup .eicon-editor-close");

    $(document).on(
      "click",
      ".foodlymentor-product-grid li.product",
      function (e) {
        e.preventDefault();
        $(".modal-container").show();
      }
    );

    closeBtn.on("click", function () {
      $(".modal-container").fadeOut();
    });

    $(document.body).on("click", function (e) {
      if (e.target.closest(".modal-content")) {
        return;
      }

      $(".modal-container").fadeOut();
    });
  });
})(jQuery);
