<?php

    if( function_exists('acf_add_options_page') ) {
        acf_add_options_page(array(
            'page_title' => 'Theme General Settings',
            'menu_title' => 'Theme Settings',
            'menu_slug' => 'theme-general-settings',
            'capability' => 'edit_posts',
            'redirect' => false
        ));
    }

    if( function_exists('acf_add_options_sub_page') ) {
        acf_add_options_sub_page(array(
            'page_title' 	=> 'Theme Header Settings',
            'menu_title'	=> 'Header',
            'parent_slug'	=> 'theme-general-settings',
        ));

        acf_add_options_sub_page(array(
            'page_title' 	=> 'Theme Footer Settings',
            'menu_title'	=> 'Footer',
            'parent_slug'	=> 'theme-general-settings',
        ));
    }

    if( function_exists('acf_add_local_field') ) {
        acf_add_local_field(array(
            'key' => 'field_1',
            'label' => 'Sub Title',
            'name' => 'sub_title',
            'type' => 'text',
            'parent' => 'theme-general-settings'
        ));
    }

    if( function_exists('acf_add_local_field_group') ){
        acf_add_local_field_group(array(
            'key' => 'group_610835f2b0548',
            'title' => 'demo',
            'fields' => array(
                array(
                    'key' => 'field_610835f600312',
                    'label' => 'test',
                    'name' => 'test',
                    'type' => 'text',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '50',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => 'default value',
                    'placeholder' => 'placeholder',
                    'prepend' => 'prepend',
                    'append' => 'append',
                    'maxlength' => 13,
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'options_page',
                        'operator' => '==',
                        'value' => 'theme-general-settings',
                    ),
                ),
            ),
            'menu_order' => 0,
            'position' => 'normal',
            'style' => 'default',
            'label_placement' => 'top',
            'instruction_placement' => 'label',
            'hide_on_screen' => '',
            'active' => true,
            'description' => '',
        ));

        // Metaboxes
        acf_add_local_field_group(array(
            'key' => 'project_details_key',
            'title' => 'Project Details',
            'fields' => array(
                array(
                    'key' => 'project_gallery_key',
                    'label' => 'Project Gallery',
                    'name' => 'project_gallery_key',
                    'type' => 'gallery',
                    'min' => 0,
                    'max' => 99,
                    'preview_size' => 'full',
                    'library' => 'all',
                    'min_width' => 0,
                    'min_height' => 0,
                    'min_size' => 0,
                    'max_width' => 0,
                    'max_height' => 0,
                    'max_size' => 0,
                    'mime_types' => '',
                    'wrapper' => array(
                        'width' => '100',
                        'class' => '',
                        'id' => '',
                    ),
                ),
                array(
                    'key' => 'project_created_date_key',
                    'label' => 'Created Date',
                    'name' => 'project_created_date_key',
                    'type' => 'date_picker',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array (
                        'width' => '20',
                        'class' => '',
                        'id' => '',
                    ),
                    'display_format' => 'j F Y',
                    'return_format' => 'j F Y',
                    'first_day' => 1,
                ),
                array(
                    'key' => 'project_website_name_key',
                    'label' => 'Website Name',
                    'name' => 'project_website_name_key',
                    'type' => 'text',
                    'prefix' => '',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array (
                        'width' => '20',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => '',
                    'placeholder' => '',
                    'prepend' => '',
                    'append' => '',
                    'maxlength' => '',
                    'readonly' => 0,
                    'disabled' => 0,
                ),
                array(
                    'key' => 'project_website_link_key',
                    'label' => 'Website Link',
                    'name' => 'project_website_link_key',
                    'type' => 'url',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array (
                        'width' => '20',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => '',
                    'placeholder' => ''
                ),
                array(
                    'key' => 'project_theme_used_in_the_project_key',
                    'label' => 'Theme Name',
                    'name' => 'project_theme_used_in_the_project_key',
                    'type' => 'text',
                    'prefix' => '',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array (
                        'width' => '20',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => '',
                    'placeholder' => '',
                    'prepend' => '',
                    'append' => '',
                    'maxlength' => '',
                    'readonly' => 0,
                    'disabled' => 0,
                ),
                array(
                    'key' => 'project_software_used_in_the_project_key',
                    'label' => 'Software Used',
                    'name' => 'project_software_used_in_the_project_key',
                    'type' => 'checkbox',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array (
                        'width' => '20',
                        'class' => '',
                        'id' => '',
                    ),
                    'choices' => array(
                        'wordpress' => 'WordPress',
                        'woocommerce' => 'WooCommerce',
                    ),
                    'allow_custom' => 0,
                    'default_value' => array(
                        0 => 'wordpress',
                    ),
                    'layout' => 'horizontal',
                    'toggle' => 1,
                    'return_format' => 'array',
                    'save_custom' => 0,
                ),
            ),
            'location' => array (
                array (
                    array (
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'project',
                    ),
                ),
            ),
        ));
    }


