<?php
$settings = $this->get_settings_for_display();
?>
<div class="foodlymentor_cat_menu_list"></div>

<script>
    (function($) {
        let menu_categories = JSON.parse('<?php echo $this->get_menu_categories(); ?>');

        let $cat_menu_html = '';
        let $more_menu_items = '';
        let $more_menu_html = '';

        let $category_width = 0;
        let $font_size_factor = 16;

        if (window.innerWidth < 768) { // Mobile
            $font_size_factor = '<?php echo $settings['foodlymentor_font_size_factor_mobile']['size']; ?>';
        } else if (window.innerWidth >= 768 && window.innerWidth < 992) { // Tablet
            $font_size_factor = '<?php echo $settings['foodlymentor_font_size_factor_tablet']['size']; ?>';
        } else { // Desktop
            $font_size_factor = '<?php echo $settings['foodlymentor_font_size_factor']['size']; ?>'
        }

        $.each(menu_categories, function(key, cat) {
            if (cat.category_parent == 0) {
                $category_width += parseInt(cat.slug.length) * parseInt($font_size_factor);

                if ($category_width > window.innerWidth) {
                    $more_menu_items += '<a href="#' + cat.slug + '">' + cat.name + '</a>';
                } else {
                    $cat_menu_html += '<a href="#' + cat.slug +
                        '">' + cat.name +
                        '</a>';
                }
            }
        });

        if ($more_menu_items != '') {
            $more_menu_html += '<div class="more-menu-filter dropdown"><button class="dropbtn">More...</button><div id="moreDropdown" class="dropdown-content">' + $more_menu_items + '</div></div>';
        }

        $(".foodlymentor_cat_menu_list").append($cat_menu_html);
        $(".foodlymentor_cat_menu_list").append($more_menu_html);
    })(jQuery);
</script>