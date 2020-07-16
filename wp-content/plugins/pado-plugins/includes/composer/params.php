<?php


/**
 * [pado_param_select_preview description]
 * @method pado_param_select_preview
 * @param  [type]               $settings [description]
 * @param  [type]               $value    [description]
 * @return [type]                         [description]
 */
vc_add_shortcode_param( 'select_preview', 'pado_param_select_preview' );
if ( ! function_exists( 'select_preview' ) ) {
    function pado_param_select_preview($settings, $value) {

        $output     = '';
        $css_option = str_replace('#', 'hash-', vc_get_dropdown_option($settings, $value));

        $output .= '<select name="'
            . $settings['param_name']
            . '" class="wpb_vc_param_value wpb-input wpb-select '
            . $settings['param_name']
            . ' ' . $settings['type']
            . ' ' . $css_option
            . '" data-option="' . $css_option . '">';
        if ( is_array($value) ) {
            $value = isset($value['value']) ? $value['value'] : array_shift($value);
        }

        if ( !empty($settings['value']) ) {
            foreach ( $settings['value'] as $index => $data ) {
                if ( is_numeric($index) && (is_string($data) || is_numeric($data)) ) {
                    $option_label = $data;
                    $option_value = $data;
                } elseif ( is_numeric($index) && is_array($data) ) {
                    $option_label = isset($data['label']) ? $data['label'] : array_pop($data);
                    $option_value = isset($data['value']) ? $data['value'] : array_pop($data);
                    $option_image = isset($data['image']) ? $data['image'] : '';
                } else {
                    $option_value = $data;
                    $option_label = $index;
                }
                $selected            = '';
                $option_value_string = (string)$option_value;
                $value_string        = (string)$value;
                if ( '' !== $value && $option_value_string === $value_string ) {
                    $selected = ' selected="selected"';
                }
                $option_class = str_replace('#', 'hash-', $option_value);
                $output       .= '<option data-img-label="<span class=thumbnail-tooltip>' . esc_attr($option_label) . '</span>" data-img-src="' . esc_attr($option_image) . '" class="' . esc_attr($option_class) . '" value="' . esc_attr($option_value) . '"' . $selected . '>'
                    . htmlspecialchars($option_label) . '</option>';
            }
        }
        $output .= '</select>';

        return $output;
    }
}


// Multiple Select
// ----------------------------------------------------------------------------------
vc_add_shortcode_param( 'vc_efa_chosen', 'vc_efa_chosen' );
if ( !function_exists('vc_efa_chosen') ) {
    function vc_efa_chosen( $settings, $value ) {

        $css_option = vc_get_dropdown_option( $settings, $value );
        $value      = explode( ',', $value );

        $output = '<select name="' . $settings['param_name'] . '" data-placeholder="' . $settings['placeholder'] . '" multiple="multiple" class="wpb_vc_param_value wpb_chosen chosen wpb-input wpb-efa-select ' . $settings['param_name'] . ' ' . $settings['type'] . ' ' . $css_option . '" data-option="' . $css_option . '">';

        foreach ( $settings['value'] as $values => $option ) {
            $selected = ( in_array( $option, $value ) ) ? ' selected="selected"' : '';
            $output .= '<option value="' . $option . '"' . $selected . '>' . htmlspecialchars( $values ) . '</option>';
        }

        $output .= '</select>' . "\n";

        return $output;
    }
}


