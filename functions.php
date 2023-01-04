<?php

/**
 * Common Functions
 */
function utf8ize($d)
{
    if (is_array($d)) {
        foreach ($d as $k => $v) {
            $d[$k] = utf8ize($v);
        }
    } else if (is_string($d)) {
        return utf8_encode($d);
    }
    return $d;
}

// Metadata repeat field
function foodlycmb2_get_price_type_options($text_domain, $value = false)
{
    $_list = array(
        ''   => esc_html__('Quantity Based', $text_domain),
        'fixed' => esc_html__('Fixed Amount', $text_domain),
    );

    $_options = '';
    foreach ($_list as $abrev => $state) {
        $_options .= '<option value="' . $abrev . '" ' . selected($value, $abrev, false) . '>' . $state . '</option>';
    }

    return $_options;
}

function foodlycmb2_render_price_options_field_callback($field, $value, $object_id, $object_type, $field_type)
{
    $text_domain = 'foodlymentor';
    // make sure we specify each part of the value we need.
    $value = wp_parse_args($value, array(
        'name' => '',
        'type' => '',
        'def' => '',
        'dis' => '',
        'price' => '',
    ));

    wp_enqueue_style('admin-main');

    // echo '<pre>';
    // print_r($value);
    // echo '</pre>';

?>
    <div class="foodly-options foodly-name-option">
        <p><label for="<?php echo $field_type->_id('_name'); ?>"><?php esc_html_e('Option name', $text_domain) ?></label></p>
        <?php echo $field_type->input(array(
            'class' => '',
            'name'  => $field_type->_name('[name]'),
            'id'    => $field_type->_id('_name'),
            'value' => $value['name'],
            'type'  => 'text',
            'desc'  => '',
        )); ?>
    </div>
    <div class="foodly-options foodly-def-option">
        <p><label for="<?php echo $field_type->_id('_def'); ?>"><?php esc_html_e('Default', $text_domain) ?></label></p>
        <input type="checkbox" class="" name="<?php echo esc_attr($field_type->_name('[def]')) ?>" id="<?php echo $field_type->_id('_def'); ?>" value="yes" data-hash="<?php echo $field->hash_id('_def'); ?>" <?php checked($value['def'], 'yes'); ?>>
    </div>
    <div class="foodly-options foodly-dis-option">
        <p><label for="<?php echo $field_type->_id('_dis'); ?>"><?php esc_html_e('Disable ?', $text_domain) ?></label></p>
        <input type="checkbox" class="" name="<?php echo esc_attr($field_type->_name('[dis]')) ?>" id="<?php echo $field_type->_id('_dis'); ?>" value="yes" data-hash="<?php echo $field->hash_id('_dis'); ?>" <?php checked($value['dis'], 'yes'); ?>>
    </div>
    <div class="foodly-options foodly-price-option">
        <p><label for="<?php echo $field_type->_id('_price'); ?>'"><?php esc_html_e('Price', $text_domain) ?></label></p>
        <?php echo $field_type->input(array(
            'class' => '',
            'name'  => $field_type->_name('[price]'),
            'id'    => $field_type->_id('_price'),
            'value' => $value['price'],
            'type'  => 'text',
            'desc'  => '',
        )); ?>
    </div>
    <div class="foodly-options foodly-unit-option">
        <p><label for="<?php echo $field_type->_id('_unit'); ?>'"><?php esc_html_e('Unit', $text_domain) ?></label></p>
        <?php echo $field_type->input(array(
            'class' => '',
            'name'  => $field_type->_name('[unit]'),
            'id'    => $field_type->_id('_unit'),
            'value' => $value['unit'],
            'type'  => 'text',
            'desc'  => '',
        )); ?>
    </div>
    <div class="foodly-options foodly-type-option">
        <p><label for="<?php echo $field_type->_id('_type'); ?>'"><?php esc_html_e('Type of price', $text_domain) ?></label></p>
        <?php echo $field_type->select(array(
            'class' => '',
            'name'  => $field_type->_name('[type]'),
            'id'    => $field_type->_id('_type'),
            'value' => $value['type'],
            'options' => foodlycmb2_get_price_type_options($text_domain, $value['type']),
            'desc'  => '',
        )); ?>
    </div>
<?php
    echo $field_type->_desc(true);
}

function foodlycmb2_sanitize_price_options_callback($override_value, $value)
{
    echo '<pre>';
    print_r($value);
    exit;
    return $value;
}

function foodlymentor_sanitize($check, $meta_value, $object_id, $field_args, $sanitize_object)
{
    // if not repeatable, bail out.
    if (!is_array($meta_value) || !$field_args['repeatable']) {
        return $check;
    }

    foreach ($meta_value as $key => $val) {
        $meta_value[$key] = array_filter(array_map('sanitize_text_field', $val));
    }

    return array_filter($meta_value);
}

function foodlymentor_escape($check, $meta_value, $field_args, $field_object)
{
    // if not repeatable, bail out.
    if (!is_array($meta_value) || !$field_args['repeatable']) {
        return $check;
    }

    foreach ($meta_value as $key => $val) {
        $meta_value[$key] = array_filter(array_map('esc_attr', $val));
    }

    return array_filter($meta_value);
}


/**
 * Conditionally displays a metabox when used as a callback in the 'show_on_cb' cmb2_box parameter
 *
 * @param  CMB2 $cmb CMB2 object.
 *
 * @return bool      True if metabox should show
 */
function foodlymentor_show_if_front_page($cmb)
{
    // Don't show this metabox if it's not the front page template.
    if (get_option('page_on_front') !== $cmb->object_id) {
        return false;
    }
    return true;
}

/**
 * Conditionally displays a field when used as a callback in the 'show_on_cb' field parameter
 *
 * @param  CMB2_Field $field Field object.
 *
 * @return bool              True if metabox should show
 */
function foodlymentor_hide_if_no_cats($field)
{
    // Don't show this field if not in the cats category.
    if (!has_tag('cats', $field->object_id)) {
        return false;
    }
    return true;
}

/**
 * Manually render a field.
 *
 * @param  array      $field_args Array of field arguments.
 * @param  CMB2_Field $field      The field object.
 */
function foodlymentor_render_row_cb($field_args, $field)
{
    $classes     = $field->row_classes();
    $id          = $field->args('id');
    $label       = $field->args('name');
    $name        = $field->args('_name');
    $value       = $field->escaped_value();
    $description = $field->args('description');
?>
    <div class="custom-field-row <?php echo esc_attr($classes); ?>">
        <p><label for="<?php echo esc_attr($id); ?>"><?php echo esc_html($label); ?></label></p>
        <p><input id="<?php echo esc_attr($id); ?>" type="text" name="<?php echo esc_attr($name); ?>" value="<?php echo $value; ?>" /></p>
        <p class="description"><?php echo esc_html($description); ?></p>
    </div>
<?php
}

/**
 * Manually render a field column display.
 *
 * @param  array      $field_args Array of field arguments.
 * @param  CMB2_Field $field      The field object.
 */
function foodlymentor_display_text_small_column($field_args, $field)
{
?>
    <div class="custom-column-display <?php echo esc_attr($field->row_classes()); ?>">
        <p><?php echo $field->escaped_value(); ?></p>
        <p class="description"><?php echo esc_html($field->args('description')); ?></p>
    </div>
<?php
}

/**
 * Conditionally displays a message if the $post_id is 2
 *
 * @param  array      $field_args Array of field parameters.
 * @param  CMB2_Field $field      Field object.
 */
function foodlymentor_before_row_if_2($field_args, $field)
{
    if (2 == $field->object_id) {
        echo '<p>Testing <b>"before_row"</b> parameter (on $post_id 2)</p>';
    } else {
        echo '<p>Testing <b>"before_row"</b> parameter (<b>NOT</b> on $post_id 2)</p>';
    }
}
