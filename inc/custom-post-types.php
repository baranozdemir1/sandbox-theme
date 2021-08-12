<?php

// Register Custom Post Type Project
function sandbox_create_project_cpt() {

    $labels = array(
        'name' => _x( 'Projects', 'Post Type General Name', 'sandbox' ),
        'singular_name' => _x( 'Project', 'Post Type Singular Name', 'sandbox' ),
        'menu_name' => _x( 'Projects', 'Admin Menu text', 'sandbox' ),
        'name_admin_bar' => _x( 'Project', 'Add New on Toolbar', 'sandbox' ),
        'archives' => __( 'Project Archives', 'sandbox' ),
        'attributes' => __( 'Project Attributes', 'sandbox' ),
        'parent_item_colon' => __( 'Parent Project:', 'sandbox' ),
        'all_items' => __( 'All Projects', 'sandbox' ),
        'add_new_item' => __( 'Add New Project', 'sandbox' ),
        'add_new' => __( 'Add New', 'sandbox' ),
        'new_item' => __( 'New Project', 'sandbox' ),
        'edit_item' => __( 'Edit Project', 'sandbox' ),
        'update_item' => __( 'Update Project', 'sandbox' ),
        'view_item' => __( 'View Project', 'sandbox' ),
        'view_items' => __( 'View Projects', 'sandbox' ),
        'search_items' => __( 'Search Project', 'sandbox' ),
        'not_found' => __( 'Not found', 'sandbox' ),
        'not_found_in_trash' => __( 'Not found in Trash', 'sandbox' ),
        'featured_image' => __( 'Featured Image', 'sandbox' ),
        'set_featured_image' => __( 'Set featured image', 'sandbox' ),
        'remove_featured_image' => __( 'Remove featured image', 'sandbox' ),
        'use_featured_image' => __( 'Use as featured image', 'sandbox' ),
        'insert_into_item' => __( 'Insert into Project', 'sandbox' ),
        'uploaded_to_this_item' => __( 'Uploaded to this Project', 'sandbox' ),
        'items_list' => __( 'Projects list', 'sandbox' ),
        'items_list_navigation' => __( 'Projects list navigation', 'sandbox' ),
        'filter_items_list' => __( 'Filter Projects list', 'sandbox' ),
    );
    $args = array(
        'label' => __( 'Project', 'sandbox' ),
        'description' => __( '', 'sandbox' ),
        'labels' => $labels,
        'menu_icon' => 'dashicons-schedule',
        'supports' => array('title', 'editor', 'thumbnail', 'revisions'),
        'taxonomies' => array(),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => true,
        'has_archive' => true,
        'hierarchical' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'post',
    );
    register_post_type( 'project', $args );

    $labelsForTax = array(
        'name' => _x( 'Category', 'taxonomy general name' ),
        'singular_name' => _x( 'Category', 'taxonomy singular name' ),
        'search_items' =>  __( 'Search Category' ),
        'all_items' => __( 'All Category' ),
        'parent_item' => __( 'Parent Category' ),
        'parent_item_colon' => __( 'Parent Category:' ),
        'edit_item' => __( 'Edit Category' ),
        'update_item' => __( 'Update Category' ),
        'add_new_item' => __( 'Add New Category' ),
        'new_item_name' => __( 'New Category Name' ),
        'menu_name' => __( 'Category' ),
    );

    register_taxonomy('project-category', array('project'), array(
        'hierarchical' => true,
        'labels' => $labelsForTax,
        'show_ui' => true,
        'show_in_rest' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array( 'slug' => 'project-category' ),
    ));

}
add_action( 'init', 'sandbox_create_project_cpt', 0 );