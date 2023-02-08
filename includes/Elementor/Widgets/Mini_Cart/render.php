<?php

$settings = $this->get_settings_for_display();

$controls['cart_title'] = $settings['foodlymentor_cart_title'];

update_option('foodlymentor_cart_title', $controls['cart_title']);

echo  '<div class="foodlymentor_shopping_cart_content">';

$remove_icon = '<svg class="ast-mobile-svg ast-close-svg" fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M5.293 6.707l5.293 5.293-5.293 5.293c-0.391 0.391-0.391 1.024 0 1.414s1.024 0.391 1.414 0l5.293-5.293 5.293 5.293c0.391 0.391 1.024 0.391 1.414 0s0.391-1.024 0-1.414l-5.293-5.293 5.293-5.293c0.391-0.391 0.391-1.024 0-1.414s-1.024-0.391-1.414 0l-5.293 5.293-5.293-5.293c-0.391-0.391-1.024-0.391-1.414 0s-0.391 1.024 0 1.414z"></path></svg>';

if (is_admin()) {
?>
    <div class="foodlymentor_shopping_cart_content">
        <h2 class="cart-title"><?php echo $controls['cart_title']; ?></h2>
        <div class="foodlymentor_mini_cart">
            <ul class="woocommerce-mini-cart cart_list product_list_widget ">
                <li class="woocommerce-mini-cart-item mini_cart_item">
                    <a href="" class="remove remove_from_cart_button"><span class="ahfb-svg-iconset ast-inline-flex"><?php echo $remove_icon; ?></span></a> <a href="#">
                        <img width="300" height="300" src="<?php echo FOODLYMENTOR_ASSETS_URL . '/images/cart-item-1.png' ?>" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail">Spaghetti with Grilled Mackerel</a>
                    <dl class="variation open">
                        <dt class="variation-Additionals">+ Additionals:</dt>
                        <dd class="variation-Additionals"></dd>
                        <dt class="variation-item-1">Item 1:</dt>
                        <dd class="variation-item-1">
                            <p>2 gm (+ $0 )</p>
                        </dd>
                        <dt class="variation-item-2">Item 2:</dt>
                        <dd class="variation-item-2">
                            <p>2 ml (+ $0 )</p>
                        </dd>
                    </dl>
                    <span class="quantity">1 × <span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">$</span>12.00</bdi></span></span>
                </li>
                <li class="woocommerce-mini-cart-item mini_cart_item">
                    <a href="" class="remove remove_from_cart_button"><span class="ahfb-svg-iconset ast-inline-flex"><?php echo $remove_icon; ?></span></a> <a href="#">
                        <img width="300" height="300" src="<?php echo FOODLYMENTOR_ASSETS_URL . '/images/cart-item-2.png' ?>" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail">Chicken Nuggets with Potato </a>
                    <span class="quantity">1 × <span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">$</span>18.00</bdi></span></span>
                </li>
            </ul>

            <p class="woocommerce-mini-cart__total total">
                <strong>Subtotal:</strong> <span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">$</span>95.00</bdi></span>
            </p>

            <p class="woocommerce-mini-cart__buttons buttons">
                <a href="#" class="button checkout wc-forward wp-element-button">Checkout</a>
            </p>
        </div>
    </div>

<?php
} else {
    foodlymentor_get_cart($controls);
}

echo '</div>';
