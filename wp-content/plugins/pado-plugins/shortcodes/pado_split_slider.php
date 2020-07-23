<?php
if ( function_exists('vc_map') ) {
    $url = EF_URL . '/admin/assets/images/shortcodes_images/split_slider/';
    $url_btn = EF_URL . '/admin/assets/images/shortcodes_images/button/';
    vc_map(
        array(
            'name'     => __('Split Slider', 'js_composer'),
            'base'     => 'pado_split_sliders',
            'category' => __('Content', 'js_composer'),
            'params'   => array(
                array(
                    'type'       => 'param_group',
                    'heading'    => __('Split slider item', 'js_composer'),
                    'param_name' => 'items',
                    'value'      => '',
                    'params'     => array(
                        array(
                            'type'       => 'attach_image',
                            'heading'    => __('Section image', 'js_composer'),
                            'param_name' => 'image',
                        ),
                        array(
                            'type'       => 'colorpicker',
                            'heading'    => __('Section background color', 'js_composer'),
                            'param_name' => 'bg_color',
                        ),
                        array(
                            'param_name'  => 'item_style',
                            'type'        => 'select_preview',
                            'description' => '',
                            'heading'     => 'Item style',
                            'value'       => array(
                                array(
                                    'value' => 'description',
                                    'label' => esc_html__('Simple heading', 'js_composer'),
                                    'image' => $url . 'description.jpg'
                                ),
                                array(
                                    'value' => 'skill_list',
                                    'label' => esc_html__('Heading with skill list', 'js_composer'),
                                    'image' => $url . 'skill_list.jpg'
                                ),
                                array(
                                    'value' => 'images_list',
                                    'label' => esc_html__('Heading with image list', 'js_composer'),
                                    'image' => $url . 'images_list.jpg'
                                ),
                                array(
                                    'value' => 'form',
                                    'label' => esc_html__('Heading with form', 'js_composer'),
                                    'image' => $url . 'form.jpg'
                                ),
                            ),
                            'admin_label' => true,
                            'save_always' => true,
                        ),
                        array(
                            'type'       => 'textfield',
                            'heading'    => __('Subtitle', 'js_composer'),
                            'param_name' => 'subtitle',
                            'value'      => '',
                        ),
                        array(
                            'type'        => 'textarea',
                            'heading'     => __('Title', 'js_composer'),
                            'param_name'  => 'title',
                            'value'       => '',
                            'description' => 'Tag &lt;br&gt; sets the line break to the place where this tag is located',
                            'admin_label' => true,
                            'save_always' => true,
                        ),
                        array(
                            'type'       => 'textarea',
                            'heading'    => __('Description', 'js_composer'),
                            'param_name' => 'description',
                            'value'      => '',
                            'dependency' => array('element' => 'item_style', 'value' => array('description', 'images_list'))
                        ),
                        array(
                            'type'        => 'param_group',
                            'heading'     => __('Skills', 'js_composer'),
                            'param_name'  => 'linear_skills',
                            'description' => __('Enter values for skill', 'js_composer'),
                            'dependency'  => array('element' => 'item_style', 'value' => array('skill_list')),
                            'value'       => '',
                            'params'      => array(
                                array(
                                    'type'        => 'textfield',
                                    'heading'     => __('Title', 'js_composer'),
                                    'param_name'  => 'title',
                                    'description' => __('Add title for your skill.', 'js_composer'),
                                    'admin_label' => true,
                                    'save_always' => true,
                                ),
                                array(
                                    'type'        => 'textfield',
                                    'heading'     => __('Number', 'js_composer'),
                                    'param_name'  => 'number',
                                    'description' => __('Only number from 0 to 100.', 'js_composer'),
                                    'admin_label' => true,
                                    'save_always' => true,
                                ),
                                array(
                                    'param_name'  => 'number_style',
                                    'type'        => 'dropdown',
                                    'description' => '',
                                    'heading'     => 'Number position',
                                    'value'       => array(
                                        esc_html__('End of all line', 'js_composer')    => 'all-line',
                                        esc_html__('End of active line', 'js_composer') => 'active-line',
                                    ),
                                ),
                                array(
                                    "type"        => "colorpicker",
                                    "heading"     => __("Line color", "js_composer"),
                                    "param_name"  => "line_color",
                                    "value"       => '#004ae2',
                                    "description" => __("Choose line color", "js_composer"),
                                ),
                            ),
                        ),
                        array(
                            'type'       => 'param_group',
                            'heading'    => __('List with image', 'js_composer'),
                            'param_name' => 'images_list',
                            'dependency' => array('element' => 'item_style', 'value' => array('images_list')),
                            'value'      => '',
                            'params'     => array(
                                array(
                                    'type'       => 'attach_image',
                                    'heading'    => __('Item image', 'js_composer'),
                                    'param_name' => 'image',
                                ),
                                array(
                                    'type'       => 'textfield',
                                    'heading'    => __('URL for image', 'js_composer'),
                                    'param_name' => 'link',
                                ),
                            ),
                        ),
                        array(
                            'type'       => 'dropdown',
                            'heading'    => __('Count items in a line', 'js_composer'),
                            'param_name' => 'count_line',
                            'value'      => array(
                                __('Two', 'js_composer')   => 'two',
                                __('Three', 'js_composer') => 'three',
                                __('Four', 'js_composer')  => 'four',
                            ),
                            'dependency' => array('element' => 'item_style', 'value' => array('images_list'))
                        ),
                        array(
                            'type'        => 'textfield',
                            'heading'     => __('Contact form', 'js_composer'),
                            'param_name'  => 'form',
                            'description' => __('Add your form id from shortcode Contact Form 7 Plugin.', 'js_composer'),
                            'dependency'  => array('element' => 'item_style', 'value' => array('form')),
                            'admin_label' => true,
                            'save_always' => true,
                        ),
                        array(
                            'type'       => 'checkbox',
                            'heading'    => esc_html__('Light heading text', 'js_composer'),
                            'param_name' => 'light',
                            'std'        => '',
                        ),
                        array(
                            'type'       => 'dropdown',
                            'heading'    => __('Text align', 'js_composer'),
                            'param_name' => 'text_align',
                            'value'      => array(
                                'Center content' => 'text-center',
                                'Left content'   => 'text-left',
                                'Right content'  => 'text-right',
                            ),
                        ),
                        array(
                            'type'       => 'vc_link',
                            'heading'    => __('Link/Button', 'js_composer'),
                            'param_name' => 'button',
                            'dependency' => array('element' => 'item_style', 'value' => array('description', 'skill_list', 'images_list'))
                        ),
                        array(
                            'type'       => 'select_preview',
                            'param_name' => 'btn_style',
                            'heading'    => 'Button style',
                            'dependency' => array('element' => 'item_style', 'value' => array('description', 'skill_list', 'images_list')),
                            'value'      => array(
                                array(
                                    'value' => 'a-btn a-btn-1',
                                    'label' => esc_html__('Default', 'js_composer'),
                                    'image' => $url_btn . 'a-btn-1.png'
                                ),
                                array(
                                    'value' => 'a-btn a-btn-1 a-btn-arrow',
                                    'label' => esc_html('Default with arrow', 'pado'),
                                    'image' => $url_btn . 'a-btn-1 a-btn-arrow.png',
                                ),
                                array(
                                    'value' => 'a-btn a-btn-2',
                                    'label' => esc_html('Default Transparent', 'pado'),
                                    'image' => $url_btn . 'a-btn-2.png',
                                ),
                                array(
                                    'value' => 'a-btn a-btn-2 a-btn-arrow',
                                    'label' => esc_html('Default Transparent with arrow', 'pado'),
                                    'image' => $url_btn . 'a-btn-2 a-btn-arrow.png',
                                ),
                                array(
                                    'value' => 'a-btn a-btn-3',
                                    'label' => esc_html('Dark', 'pado'),
                                    'image' => $url_btn . 'a-btn-3.png',
                                ),
                                array(
                                    'value' => 'a-btn a-btn-3 a-btn-arrow',
                                    'label' => esc_html('Dark with arrow', 'pado'),
                                    'image' => $url_btn . 'a-btn-3 a-btn-arrow.png',
                                ),
                                array(
                                    'value' => 'a-btn a-btn-4',
                                    'label' => esc_html('Dark Transparent', 'pado'),
                                    'image' => $url_btn . 'a-btn-4.png',
                                ),
                                array(
                                    'value' => 'a-btn a-btn-4 a-btn-arrow',
                                    'label' => esc_html('Dark Transparent with arrow', 'pado'),
                                    'image' => $url_btn . 'a-btn-4 a-btn-arrow.png',
                                ),
                                array(
                                    'value' => 'a-btn a-btn-5',
                                    'label' => esc_html('Light', 'pado'),
                                    'image' => $url_btn . 'a-btn-5.png',
                                ),
                                array(
                                    'value' => 'a-btn a-btn-5 a-btn-arrow',
                                    'label' => esc_html('Light with arrow', 'pado'),
                                    'image' => $url_btn . 'a-btn-5 a-btn-arrow.png',
                                ),
                                array(
                                    'value' => 'a-btn a-btn-6',
                                    'label' => esc_html('Light Transparent', 'pado'),
                                    'image' => $url_btn . 'a-btn-6.png',
                                ),
                                array(
                                    'value' => 'a-btn a-btn-6 a-btn-arrow',
                                    'label' => esc_html('Light Transparent with arrow', 'pado'),
                                    'image' => $url_btn . 'a-btn-6 a-btn-arrow.png',
                                ),
                                array(
                                    'value' => 'a-btn a-btn-7',
                                    'label' => esc_html('White', 'pado'),
                                    'image' => $url_btn . 'a-btn-7.png',
                                ),
                                array(
                                    'value' => 'a-btn a-btn-7 a-btn-arrow',
                                    'label' => esc_html('White with arrow', 'pado'),
                                    'image' => $url_btn . 'a-btn-7 a-btn-arrow.png',
                                ),
                                array(
                                    'value' => 'a-btn a-btn-8',
                                    'label' => esc_html('White Transparent', 'pado'),
                                    'image' => $url_btn . 'a-btn-8.png',
                                ),
                                array(
                                    'value' => 'a-btn a-btn-8 a-btn-arrow',
                                    'label' => esc_html('White Transparent with arrow', 'pado'),
                                    'image' => $url_btn . 'a-btn-8 a-btn-arrow.png',
                                ),
                                array(
                                    'value' => 'a-btn a-btn-link',
                                    'label' => esc_html('Default link', 'pado'),
                                    'image' => $url_btn . 'a-btn-link.png',
                                ),
                                array(
                                    'value' => 'a-btn a-btn-link a-btn-arrow',
                                    'label' => esc_html('Default link with arrow', 'pado'),
                                    'image' => $url_btn . 'a-btn-link a-btn-arrow.png',
                                ),
                            )
                        ),
                        array(
                            'type'       => 'select_preview',
                            'heading'    => __('Button style for form', 'js_composer'),
                            'param_name' => 'btn_style_form',
                            'dependency' => array('element' => 'item_style', 'value' => array('form')),
                            'value'      => array(
                                array(
                                    'value' => 'a-btn-style a-btn-1-style',
                                    'label' => esc_html__('Default', 'js_composer'),
                                    'image' => $url_btn . 'a-btn-1.png'
                                ),
                                array(
                                    'value' => 'a-btn-style a-btn-2-style',
                                    'label' => esc_html('Default Transparent', 'pado'),
                                    'image' => $url_btn . 'a-btn-2.png',
                                ),
                                array(
                                    'value' => 'a-btn-style a-btn-3-style',
                                    'label' => esc_html('Dark', 'pado'),
                                    'image' => $url_btn . 'a-btn-3.png',
                                ),
                                array(
                                    'value' => 'a-btn-style a-btn-4-style',
                                    'label' => esc_html('Dark Transparent', 'pado'),
                                    'image' => $url_btn . 'a-btn-4.png',
                                ),
                                array(
                                    'value' => 'a-btn-style a-btn-5-style',
                                    'label' => esc_html('Light', 'pado'),
                                    'image' => $url_btn . 'a-btn-5.png',
                                ),
                                array(
                                    'value' => 'a-btn-style a-btn-6-style',
                                    'label' => esc_html('Light Transparent', 'pado'),
                                    'image' => $url_btn . 'a-btn-6.png',
                                ),
                                array(
                                    'value' => 'a-btn-style a-btn-7-style',
                                    'label' => esc_html('White', 'pado'),
                                    'image' => $url_btn . 'a-btn-7.png',
                                ),
                                array(
                                    'value' => 'a-btn-style a-btn-8-style',
                                    'label' => esc_html('White Transparent', 'pado'),
                                    'image' => $url_btn . 'a-btn-8.png',
                                ),
                            )
                        ),
                        array(
                            'type'        => 'colorpicker',
                            'heading'     => __('Color for pagination (no active item)', 'js_composer'),
                            'param_name'  => 'pagination_color1',
                            "value"       => '#000',
                            'description' => 'Only if pagination is not disabled'
                        ),
                        array(
                            'type'        => 'colorpicker',
                            'heading'     => __('Color for pagination (active item)', 'js_composer'),
                            'param_name'  => 'pagination_color2',
                            "value"       => '#fff',
                            'description' => 'Only if pagination is not disabled'
                        ),
                        array(
                            'type'       => 'checkbox',
                            'heading'    => __('Light style for header', 'js_composer'),
                            'param_name' => 'light_style_header',
                        ),
                    ),
                ),
                array(
                    'type'       => 'dropdown',
                    'heading'    => __('Navigation position', 'js_composer'),
                    'param_name' => 'nav_pos',
                    'value'      => array(
                        __('Left', 'js_composer')  => 'left',
                        __('Right', 'js_composer') => 'right',
                        __('None', 'js_composer')  => 'none',
                    ),
                    'group'      => 'Slider options'
                ),
                array(
                    'type'       => 'dropdown',
                    'heading'    => 'Image original size',
                    'param_name' => 'image_original_size',
                    'value'      => array_merge(array('full'), get_intermediate_image_sizes()),
                    'group'      => 'Slider options'
                ),
                array(
                    'type'       => 'css_editor',
                    'heading'    => __('CSS box', 'js_composer'),
                    'param_name' => 'css',
                    'group'      => __('Design options', 'js_composer')
                )
            ),
        )
    );
}

if ( class_exists('WPBakeryShortCode') ) {
    class WPBakeryShortCode_pado_split_sliders extends WPBakeryShortCode {
        protected function content($atts, $content = null) {
            extract(shortcode_atts(array(
                'items'               => array(),
                'class'               => '',
                'image_original_size' => 'full',
                'nav_pos'             => 'left',
            ), $atts));

            if ( !in_array("pado-multiscroll", self::$js_scripts) ) {
                self::$js_scripts[] = "pado-multiscroll";
            }

            if ( !in_array("pado-countT", self::$js_scripts) ) {
                self::$js_scripts[] = "pado-countT";
            }

            if ( !in_array("pado-skills", self::$js_scripts) ) {
                self::$js_scripts[] = "pado-skills";
            }

            if ( !in_array("pado-split-slider", self::$js_scripts) ) {
                self::$js_scripts[] = "pado-split-slider";
            }
            $this->enqueueJs();


            // include needed stylesheets
            if ( !in_array("pado-split-slider", self::$css_scripts) ) {
                self::$css_scripts[] = "pado-split-slider";
            }

            if ( !in_array("pado-skills", self::$css_scripts) ) {
                self::$css_scripts[] = "pado-skills";
            }
            $this->enqueueCss();

            $navigation = ($nav_pos == 'none') ? '0' : '1';

            $pagination_passive = '';
            $pagination_active  = '';
            $style_header       = '';

            $image_original_size = isset($image_original_size) && !empty($image_original_size) ? $image_original_size : 'full';

            ob_start();

            if ( !empty($items) && isset($items) ) :
                $items = (array)vc_param_group_parse_atts($items); ?>
                <div class="split-slider">
                    <?php foreach ( $items as $key => $slide ) :
                        $light     = !empty($slide['light']) ? 'light' : '';
                        $bg_color  = !empty($slide['bg_color']) ? $slide['bg_color'] : 'transparent';
                        $image_bg  = (isset($slide['image']) && !empty($slide['image'])) ? wp_get_attachment_image_url($slide['image'], $image_original_size) : '';
                        $image_alt = (!empty($slide['image']) && is_numeric($slide['image'])) ? get_post_meta($slide['image'], '_wp_attachment_image_alt', true) : '';
                        $image_bg  = '<img src="' . esc_url($image_bg) . '" class="s-img-switch" alt="' . esc_attr($image_alt) . '">';

                        if ( isset($slide['subtitle']) && !empty($slide['subtitle']) ) {
                            $subtitle_output = '<h5 class="subtitle">' . esc_html($slide['subtitle']) . '</h5>';
                        } else {
                            $subtitle_output = '';
                        }

                        if ( isset($slide['title']) && !empty($slide['title']) ) {
                            $title_output = '<h3 class="title">' . wp_kses_post($slide['title']) . '</h3>';
                        } else {
                            $title_output = '';
                        }

                        if ( isset($slide['description']) && !empty($slide['description']) ) {
                            $description_output = '<div class="description">' . wp_kses_post($slide['description']) . '</div>';
                        } else {
                            $description_output = '';
                        }

                        if ( !empty($slide['images_list']) && $slide['item_style'] == 'images_list' ) {
                            $images_list       = (array)vc_param_group_parse_atts($slide['images_list']);
                            $image_list_output = '<div class="image-list ' . esc_attr($slide['text_align']) . '">';
                            foreach ( $images_list as $image_item ) {
                                $image_list_output .= '<div class="image-item ' . esc_attr($slide['count_line']) . '">';
                                if ( !empty($image_item['image']) ) {
                                    $image          = wp_get_attachment_image_url($image_item['image'], $image_original_size);
                                    $image_item_alt = (!empty($image_item['image']) && is_numeric($image_item['image'])) ? get_post_meta($image_item['image'], '_wp_attachment_image_alt', true) : '';

                                    if ( !empty($image_item['link']) ) {
                                        $image_list_output .= '<a href="' . esc_url($image_item['link']) . '" target="_blank"><img src="' . esc_url($image) . '" alt="' . esc_attr($image_item_alt) . '"></a>';
                                    } else {
                                        $image_list_output .= '<img src="' . esc_url($image) . '" alt="' . esc_attr($image_item_alt) . '">';
                                    }
                                }
                                $image_list_output .= '</div>';
                            }
                            $image_list_output .= '</div>';
                        } else {
                            $image_list_output = '';
                        }


                        if ( !empty($slide['linear_skills']) && $slide['item_style'] == 'skill_list' ) {
                            $linear_skills        = (array)vc_param_group_parse_atts($slide['linear_skills']);
                            $linear_skills_output = '<div class="skills ' . esc_attr($light) . '">';
                            foreach ( $linear_skills as $skill ) {
                                if ( !empty($skill['title']) && !empty($skill['number']) && is_numeric($skill['number']) && !empty($skill['line_color']) ) {
                                    $linear_skills_output .= '<div class="skill" data-value="' . esc_attr($skill['number']) . '">
                                                                <span class="skill-label">' . esc_html($skill['title']) . '</span>
                                                                <div class="skill-value ' . esc_attr($skill['number_style']) . '"><span class="counter" data-from="0" data-speed="1000" data-to="' . esc_attr($skill['number']) . '">0</span>%</div>
                                                                <div class="line">
                                                                    <div class="active-line" style="background-color: ' . esc_attr($skill['line_color']) . '"></div>
                                                                </div>
                                                            </div> ';
                                }

                            }
                            $linear_skills_output .= '</div>';
                        } else {
                            $linear_skills_output = '';
                        }

                        if ( !empty($slide['form']) && $slide['item_style'] == 'form' ) {
                            $form_output = '<div class="form ' . esc_attr($slide['btn_style_form']) . '">' . do_shortcode('[contact-form-7 id="' . esc_attr($slide['form']) . '"]') . '</div>';
                        } else {
                            $form_output = '';
                        }


                        if ( isset($slide['button']) && !empty($slide['button'] && $slide['item_style'] != 'form') ) {
                            $url = vc_build_link($slide['button']);
                            $target = !empty($url_btn['target']) ? $url_btn['target'] : '_self';

                            $button_output =
                                '<div class="link-wrap">
                                    <a href="' . esc_url($url['url']) . '" class="' . esc_attr($slide['btn_style']) . '" 
                                        target="' . esc_attr($target) . '">' . esc_html($url['title']) . '</a>
                                </div>';
                        } else {
                            $button_output = '';
                        }

                        $output = '<div class="content-wrap ' . esc_attr($light) . ' ' . esc_attr($slide['text_align']) . '" >';
                        $output .= $subtitle_output . $title_output . $description_output . $image_list_output . $linear_skills_output . $form_output . $button_output;
                        $output .= '</div>';

                        $output_arr[$key]['content']  = $output;
                        $output_arr[$key]['image']    = $image_bg;
                        $output_arr[$key]['bg_color'] = $bg_color;

                        $pagination_passive .= $slide['pagination_color1'] . ',';
                        $pagination_active  .= $slide['pagination_color2'] . ',';
                        $style_header       .= !empty($slide['light_style_header']) ? '1,' : '0,';

                    endforeach; ?>
                    <div class="split-wrapper split-wrapper--desctop full-height-window-hard js-split-slider"
                         data-style-header="<?php echo esc_attr($style_header); ?>"
                         data-nav="<?php echo esc_attr($navigation); ?>"
                         data-nav-pos="<?php echo esc_attr($nav_pos); ?>"
                         data-pagination-color="<?php echo esc_attr($pagination_passive); ?>"
                         data-pagination-color-active="<?php echo esc_attr($pagination_active); ?>">

                        <div class="split-ms-left">
                            <?php foreach ( $output_arr as $key => $output_item ) { ?>
                                <div class="split-ms-section"
                                     style="<?php echo esc_attr('background-color: ' . $output_item['bg_color']); ?>">
                                    <?php if ( $key % 2 == 1 ) :
                                        echo $output_item['image'];
                                    else  :
                                        echo $output_item['content'];
                                    endif; ?>
                                </div>
                            <?php } ?>
                        </div>

                        <div class="split-ms-right">
                            <?php foreach ( $output_arr as $key => $output_item ) : ?>
                                <div class="split-ms-section"
                                     style="<?php echo 'background-color: ' . $output_item['bg_color'] ?>">
                                    <?php if ( $key % 2 == 0 ) :
                                        echo $output_item['image'];
                                    else  :
                                        echo $output_item['content'];
                                    endif; ?>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="split-wrapper split-wrapper--mob">
                        <?php foreach ( $output_arr as $key => $output_item ) { ?>
                            <div class="split-mob-section"
                                 style="<?php echo esc_attr('background-color: ' . $output_item['bg_color']); ?>">
                                <div class="split-mob-image"><?php echo $output_item['image']; ?></div>
                                <?php echo $output_item['content']; ?>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            <?php endif;

            return ob_get_clean();

        }
    }
}