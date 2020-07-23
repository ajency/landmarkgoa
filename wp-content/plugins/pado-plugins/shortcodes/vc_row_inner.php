<?php


function cr_get_row_inner_offset( $pref, $suf, $max = 50, $step = 5 ) {
    $ar = array();
    for ( $i = 0; $i < $max + $step; $i += $step ) {
        $ar[ $i . 'px' ] = $pref . '-' . $i . $suf;
    }

    return array_merge( array( 'Default' => 'none' ), $ar );
}

$responsive_classes = array(
    array(
        'type'       => 'checkbox',
        'heading'    => __( 'Enable Ovarlay', 'js_composer' ),
        'param_name' => 'enable_ovarlay',
        'value'      => ''
    ),
    array(
        'type'       => 'dropdown',
        'heading'    => __( 'Large desktop margin top', 'js_composer' ),
        'param_name' => 'desctop_mt',
        'value'      => cr_get_row_inner_offset( 'margin-lg', 't', 200 ),
        'group'      => 'Responsive Margins'
    ),
    array(
        'type'       => 'dropdown',
        'heading'    => __( 'Large desktop margin bottom', 'js_composer' ),
        'param_name' => 'desctop_mb',
        'value'      => cr_get_row_inner_offset( 'margin-lg', 'b', 200 ),
        'group'      => 'Responsive Margins',
    ),
    array(
        'type'       => 'dropdown',
        'heading'    => __( 'Medium desktop margin top', 'js_composer' ),
        'param_name' => 'desctop_md_mt',
        'value'      => cr_get_row_inner_offset( 'margin-md', 't', 200 ),
        'group'      => 'Responsive Margins'
    ),
    array(
        'type'       => 'dropdown',
        'heading'    => __( 'Medium desktop margin bottom', 'js_composer' ),
        'param_name' => 'desctop_md_mb',
        'value'      => cr_get_row_inner_offset( 'margin-md', 'b', 200 ),
        'group'      => 'Responsive Margins',
    ),
    array(
        'type'       => 'dropdown',
        'heading'    => __( 'Tablets margin top', 'js_composer' ),
        'param_name' => 'tablets_mt',
        'value'      => cr_get_row_inner_offset( 'margin-sm', 't', 200 ),
        'group'      => 'Responsive Margins'
    ),
    array(
        'type'       => 'dropdown',
        'heading'    => __( 'Tablets margin bottom', 'js_composer' ),
        'param_name' => 'tablets_mb',
        'value'      => cr_get_row_inner_offset( 'margin-sm', 'b', 200 ),
        'group'      => 'Responsive Margins'
    ),
    array(
        'type'       => 'dropdown',
        'heading'    => __( 'Mobile margin top', 'js_composer' ),
        'param_name' => 'mobile_mt',
        'value'      => cr_get_row_inner_offset( 'margin-xs', 't', 200 ),
        'group'      => 'Responsive Margins'
    ),
    array(
        'type'       => 'dropdown',
        'heading'    => __( 'Mobile margin bottom', 'js_composer' ),
        'param_name' => 'mobile_mb',
        'value'      => cr_get_row_inner_offset( 'margin-xs', 'b', 200 ),
        'group'      => 'Responsive Margins'
    ),
    array(
        'type'       => 'dropdown',
        'heading'    => __( 'Large desktop padding top', 'js_composer' ),
        'param_name' => 'desctop_lg_pt',
        'value'      => cr_get_row_inner_offset( 'padding-lg', 't', 200 ),
        'group'      => 'Responsive Paddings'
    ),
    array(
        'type'       => 'dropdown',
        'heading'    => __( 'Large desktop padding bottom', 'js_composer' ),
        'param_name' => 'desctop_lg_pb',
        'value'      => cr_get_row_inner_offset( 'padding-lg', 'b', 200 ),
        'group'      => 'Responsive Paddings',
    ),
    array(
        'type'       => 'dropdown',
        'heading'    => __( 'Medium desktop padding top', 'js_composer' ),
        'param_name' => 'desctop_pt',
        'value'      => cr_get_row_inner_offset( 'padding-md', 't', 200 ),
        'group'      => 'Responsive Paddings'
    ),
    array(
        'type'       => 'dropdown',
        'heading'    => __( 'Medium desktop padding bottom', 'js_composer' ),
        'param_name' => 'desctop_pb',
        'value'      => cr_get_row_inner_offset( 'padding-md', 'b', 200 ),
        'group'      => 'Responsive Paddings',
    ),
    array(
        'type'       => 'dropdown',
        'heading'    => __( 'Tablets padding top', 'js_composer' ),
        'param_name' => 'tablets_pt',
        'value'      => cr_get_row_inner_offset( 'padding-sm', 't', 200 ),
        'group'      => 'Responsive Paddings'
    ),
    array(
        'type'       => 'dropdown',
        'heading'    => __( 'Tablets padding bottom', 'js_composer' ),
        'param_name' => 'tablets_pb',
        'value'      => cr_get_row_inner_offset( 'padding-sm', 'b', 200 ),
        'group'      => 'Responsive Paddings'
    ),
    array(
        'type'       => 'dropdown',
        'heading'    => __( 'Mobile padding top', 'js_composer' ),
        'param_name' => 'mobile_pt',
        'value'      => cr_get_row_inner_offset( 'padding-xs', 't', 200 ),
        'group'      => 'Responsive Paddings'
    ),
    array(
        'type'       => 'dropdown',
        'heading'    => __( 'Mobile padding bottom', 'js_composer' ),
        'param_name' => 'mobile_pb',
        'value'      => cr_get_row_inner_offset( 'padding-xs', 'b', 200 ),
        'group'      => 'Responsive Paddings'
    ),
);

if ( function_exists( 'vc_add_params' ) ) {
    vc_add_params( 'vc_row_inner', $responsive_classes );
}
