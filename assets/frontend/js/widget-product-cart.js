// (function ($) {
//   $(document).ready(function () {
//     $("body").on(
//       "click",
//       "#foodlymentor_product_popup .ajax_add_to_cart",
//       function () {
//         console.log(foodlymentorData);
//         var data = {
//           action: "woocommerce_ajax_add_to_cart",
//           product_id: parseInt($(this).data("product_id")),
//           quantity: parseInt($(this).data("quantity")),
//           addi_options: $(this).data("addi_options"),
//         };

//         jQuery.ajax({
//           method: "POST",
//           url: foodlymentorData.ajaxurl,
//           data: data,
//           success: function (res) {
//             console.log(res);
//           },
//           error: function (err) {
//             console.log(err);
//           },
//         });
//       }
//     );
//   });
// })(jQuery);
