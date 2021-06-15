<?php
declare(strict_types=1);
/**
 * Create CPTs
 *
 * @package   NGFEEDBACKFORMS
 * @author    Nikita Menshutin
 * @copyright Copyright © 2021, nikitaGlobal
 */

namespace NGFeedBackForms\Model;

class CPT {
    /**
     * Constructor
     */
    function __construct() {
        add_action( 'init', [ $this, 'registerSubmissions' ] );
    }

    /**
     * Register submissions cpt
     *
     * @return void
     */
    public function registerSubmissions():void {
        $labels = [
            'name'                  => _x( 'Submissions', 'Post type general name', NGFEEDBACKFORMS__SLUG ),
            'singular_name'         => _x( 'Submission', 'Post type singular name', NGFEEDBACKFORMS__SLUG ),
            'menu_name'             => _x( 'Submissions', 'Admin Menu text', NGFEEDBACKFORMS__SLUG ),
            'name_admin_bar'        => _x( 'Submission', 'Add New on Toolbar', NGFEEDBACKFORMS__SLUG ),
            'add_new'               => __( 'Add New', NGFEEDBACKFORMS__SLUG ),
            'add_new_item'          => __( 'Add New submission', NGFEEDBACKFORMS__SLUG ),
            'new_item'              => __( 'New submission', NGFEEDBACKFORMS__SLUG ),
            'edit_item'             => __( 'Edit submission', NGFEEDBACKFORMS__SLUG ),
            'view_item'             => __( 'View submission', NGFEEDBACKFORMS__SLUG ),
            'all_items'             => __( 'All submissions', NGFEEDBACKFORMS__SLUG ),
            'search_items'          => __( 'Search submissions', NGFEEDBACKFORMS__SLUG ),
            'parent_item_colon'     => __( 'Parent submissions:', NGFEEDBACKFORMS__SLUG ),
            'not_found'             => __( 'No submissions found.', NGFEEDBACKFORMS__SLUG ),
            'not_found_in_trash'    => __( 'No submissions found in Trash.', NGFEEDBACKFORMS__SLUG ),
            'featured_image'        => _x( 'Submission Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', NGFEEDBACKFORMS__SLUG ),
            'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', NGFEEDBACKFORMS__SLUG ),
            'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', NGFEEDBACKFORMS__SLUG ),
            'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', NGFEEDBACKFORMS__SLUG ),
            'archives'              => _x( 'Submission archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', NGFEEDBACKFORMS__SLUG ),
            'insert_into_item'      => _x( 'Insert into submission', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', NGFEEDBACKFORMS__SLUG ),
            'uploaded_to_this_item' => _x( 'Uploaded to this submission', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', NGFEEDBACKFORMS__SLUG ),
            'filter_items_list'     => _x( 'Filter submissions list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', NGFEEDBACKFORMS__SLUG ),
            'items_list_navigation' => _x( 'Submissions list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', NGFEEDBACKFORMS__SLUG ),
            'items_list'            => _x( 'Submissions list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', NGFEEDBACKFORMS__SLUG ),
        ];
        $args   = [
            'labels'              => $labels,
            'description'         => 'Submission custom post type.',
            'public'              => false,
            'show_ui'             => true,
            'has_archive'         => false,
            'show_in_menu'        => true,
            'publicly_queryable'  => false,
            'query_var'           => true,
            'exclude_from_search' => true,
            'rewrite'             => false,
            'capability_type'     => 'post',
            'capabilities'        => [
                'create_posts' => 'do_not_allow',
            ],
            'map_meta_cap'        => true,
            'hierarchical'        => false,
            'supports'            => [
                'title',
                'editor',
            ],
        ];

        register_post_type( NGFEEDBACKFORMS__SLUG, $args );
    }
}
