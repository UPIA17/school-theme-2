<?php

function school_theme_register_custom_post_types()
{


  // Register for Staff
  $labels = array(

    'name'                  => _x('Staff', 'post type general name'),

    'singular_name'         => _x('Staff', 'post type singular name'),

    'menu_name'             => _x('Staffs', 'admin menu'),

    'name_admin_bar'        => _x('Staff', 'add new on admin bar'),

    'add_new'               => _x('Add New', 'Staff'),

    'add_new_item'          => __('Add New Staff'),

    'new_item'              => __('New Staff'),

    'edit_item'             => __('Edit Staff'),

    'view_item'             => __('View Staff'),

    'all_items'             => __('All Staffs'),

    'search_items'          => __('Search Staffs'),

    'parent_item_colon'     => __('Parent Staffs:'),

    'not_found'             => __('No staffs found.'),

    'not_found_in_trash'    => __('No staffs found in Trash.'),

    // 'archives'              => __( 'Staff Archives'),

    'insert_into_item'      => __('Insert into staff'),

    'uploaded_to_this_item' => __('Uploaded to this staff'),

    'filter_item_list'      => __('Filter staffs list'),

    'items_list_navigation' => __('Staffs list navigation'),

    'items_list'            => __('Staffs list'),

    'featured_image'        => __('Staff featured image'),

    'set_featured_image'    => __('Set staff featured image'),

    'remove_featured_image' => __('Remove staff featured image'),

    'use_featured_image'    => __('Use as featured image'),


  );



  $args = array(
    'labels'             => $labels,

    'public'             => true,

    'publicly_queryable' => true,

    'show_ui'            => true,

    'show_in_menu'       => true,

    'show_in_nav_menus'  => true,

    'show_in_admin_bar'  => true,

    'show_in_rest'       => true,

    'query_var'          => true,

    'rewrite'            => array('slug' => 'staffs'),

    'capability_type'    => 'post',

    'has_archive'        => false,

    'hierarchical'       => false,

    // 'menu_position'      => 5,

    'menu_icon'          => 'dashicons-groups',

    'supports'           => array('title'), // to support the title only
  );




  register_post_type('school_theme_staff', $args);
}
add_action('init', 'school_theme_register_custom_post_types');









// Register TAXONOMIES
function school_theme_register_taxonomies()
{

  // Add Staff Term taxonomy
  $labels = array(

    'name'              => _x('Staff Terms', 'taxonomy general name'),

    'singular_name'     => _x('Staff Term', 'taxonomy singular name'),

    'search_items'      => __('Search Staff Term'),

    'all_items'         => __('All Staff Terms'),

    'parent_item'       => __('Parent Staff Term'),

    'parent_item_colon' => __('Parent Staff Term:'),

    'edit_item'         => __('Edit Staff Term'),

    'view_item'         => __('View Staff Term'),

    'update_item'       => __('Update Staff Term'),

    'add_new_item'      => __('Add New Staff Term'),

    'new_item_name'     => __('New Staff Term Name'),

    'menu_name'         => __('Staff Term'),
  );



  $args = array(

    'labels'            => $labels,

    'hierarchical'      => true,

    'show_ui'           => true,

    'show_in_menu'      => true,

    'show_in_nav_menu'  => true,

    'show_in_rest'      => true,

    'show_admin_column' => true,

    'query_var'         => true,

    'rewrite'           => array('slug' => 'staff-term'),

  );

  register_taxonomy('school_theme_staff_term', array('school_theme_staff'), $args);
}

add_action('init', 'school_theme_register_taxonomies');





function school_theme_rewrite_flush()
{
  school_theme_register_custom_post_types();
  school_theme_register_taxonomies();
  flush_rewrite_rules();
}
add_action('after_switch_theme', 'school_theme_rewrite_flush');








// Change the placeholder of “Add title” to “Add staff name” when adding a new Staff post.
function school_theme_modify_title_placeholder($title)
{

  $screen = get_current_screen();

  if ($screen->post_type == 'school_theme_staff') {

    $title = __('Add staff name');
  }

  return $title;
}
add_filter('enter_title_here', 'school_theme_modify_title_placeholder');
