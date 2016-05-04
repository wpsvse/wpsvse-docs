<?php
/*
Plugin Name: WPSV Dokumentation
Description: Anpassade funktioner för WordPress Sveriges dokumentation.
Version: 0.1
License: GPL
Author: WordPress Sverige
Author URI: http://wpsv.se
*/

/**
 * Requires Formidable Forms Pro
 * for front-end editing
 *
 * @link https://formidablepro.com
 */

/**
 * Register custom post type for documentation articles
 *
 * @since 0.1
 */

 // Register Custom Post Type
 function wpsvse_doc_cpt() {

 	$labels = array(
 		'name'                  => _x( 'Artiklar', 'Post Type General Name', 'wpsvse' ),
 		'singular_name'         => _x( 'Artikel', 'Post Type Singular Name', 'wpsvse' ),
 		'menu_name'             => __( 'Dokumentation', 'wpsvse' ),
 		'name_admin_bar'        => __( 'Dokumentation', 'wpsvse' ),
 		'archives'              => __( 'Arkiv för dokumentation', 'wpsvse' ),
 		'parent_item_colon'     => __( 'Överordnad artikel:', 'wpsvse' ),
 		'all_items'             => __( 'Alla artiklar', 'wpsvse' ),
 		'add_new_item'          => __( 'Lägg till ny artikel', 'wpsvse' ),
 		'add_new'               => __( 'Lägg till ny', 'wpsvse' ),
 		'new_item'              => __( 'Ny artikel', 'wpsvse' ),
 		'edit_item'             => __( 'Redigera artikel', 'wpsvse' ),
 		'update_item'           => __( 'Uppdatera artikel', 'wpsvse' ),
 		'view_item'             => __( 'Visa artikel', 'wpsvse' ),
 		'search_items'          => __( 'Sök artikel', 'wpsvse' ),
 		'not_found'             => __( 'Kunde inte hittas', 'wpsvse' ),
 		'not_found_in_trash'    => __( 'Kunde inte hittas i papperskorgen', 'wpsvse' ),
 		'featured_image'        => __( 'Utvald bild', 'wpsvse' ),
 		'set_featured_image'    => __( 'Ange utvald bild', 'wpsvse' ),
 		'remove_featured_image' => __( 'Ta bort utvald bild', 'wpsvse' ),
 		'use_featured_image'    => __( 'Använd som utvald bild', 'wpsvse' ),
 		'insert_into_item'      => __( 'Infoga i artikel', 'wpsvse' ),
 		'uploaded_to_this_item' => __( 'Uppladdad till denna artikel', 'wpsvse' ),
 		'items_list'            => __( 'Artikellista', 'wpsvse' ),
 		'items_list_navigation' => __( 'Navigation för artikellista', 'wpsvse' ),
 		'filter_items_list'     => __( 'Filtrera artikellista', 'wpsvse' ),
 	);
 	$rewrite = array(
 		'slug'                  => 'dokumentation',
 		'with_front'            => true,
 		'pages'                 => true,
 		'feeds'                 => true,
 	);
 	$args = array(
 		'label'                 => __( 'Artikel', 'wpsvse' ),
 		'description'           => __( 'Dokumentation', 'wpsvse' ),
 		'labels'                => $labels,
 		'supports'              => array( 'title', 'editor', 'excerpt', 'author', 'comments', 'revisions' ),
 		'taxonomies'            => array( 'wpsvse_doc_cat' ),
 		'hierarchical'          => false,
 		'public'                => true,
 		'show_ui'               => true,
 		'show_in_menu'          => true,
 		'menu_position'         => 20,
 		'menu_icon'             => 'dashicons-book-alt',
 		'show_in_admin_bar'     => true,
 		'show_in_nav_menus'     => true,
 		'can_export'            => true,
 		'has_archive'           => true,
 		'exclude_from_search'   => false,
 		'publicly_queryable'    => true,
 		'rewrite'               => $rewrite,
 		'capability_type'       => 'post',
 	);
 	register_post_type( 'wpsvse_docs', $args );

 }
 add_action( 'init', 'wpsvse_doc_cpt', 0 );


/**
 * Register custom taxonomy for documentation categories.
 *
 * @since 0.1
 */

 function wpsvse_doc_cat_tax() {

 	$labels = array(
 		'name'                       => _x( 'Kategorier', 'Taxonomy General Name', 'wpsvse' ),
 		'singular_name'              => _x( 'Kategori', 'Taxonomy Singular Name', 'wpsvse' ),
 		'menu_name'                  => __( 'Kategorier', 'wpsvse' ),
 		'all_items'                  => __( 'Alla kategorier', 'wpsvse' ),
 		'parent_item'                => __( 'Överordna kategori', 'wpsvse' ),
 		'parent_item_colon'          => __( 'Överordnad kategori:', 'wpsvse' ),
 		'new_item_name'              => __( 'Namn på ny kategori', 'wpsvse' ),
 		'add_new_item'               => __( 'Lägg till ny kategori', 'wpsvse' ),
 		'edit_item'                  => __( 'Redigera kategori', 'wpsvse' ),
 		'update_item'                => __( 'Uppdatera kategori', 'wpsvse' ),
 		'view_item'                  => __( 'Visa kategori', 'wpsvse' ),
 		'separate_items_with_commas' => __( 'Separera flera kategorier med kommatecken', 'wpsvse' ),
 		'add_or_remove_items'        => __( 'Lägg till eller ta bort kategorier', 'wpsvse' ),
 		'choose_from_most_used'      => __( 'Välj bland dom mest använda', 'wpsvse' ),
 		'popular_items'              => __( 'Populära kategorier', 'wpsvse' ),
 		'search_items'               => __( 'Sök kategorier', 'wpsvse' ),
 		'not_found'                  => __( 'Kunde inte hittas', 'wpsvse' ),
 		'no_terms'                   => __( 'Inga kategorier', 'wpsvse' ),
 		'items_list'                 => __( 'Kategorilista', 'wpsvse' ),
 		'items_list_navigation'      => __( 'Navigation för kategorilista', 'wpsvse' ),
 	);
 	$rewrite = array(
 		'slug'                       => 'artikelkategori',
 		'with_front'                 => true,
 		'hierarchical'               => false,
 	);
 	$args = array(
 		'labels'                     => $labels,
 		'hierarchical'               => true,
 		'public'                     => true,
 		'show_ui'                    => true,
 		'show_admin_column'          => true,
 		'show_in_nav_menus'          => true,
 		'show_tagcloud'              => true,
 		'rewrite'                    => $rewrite,
 	);
 	register_taxonomy( 'wpsvse_doc_cat', array( 'wpsvse_docs' ), $args );

 }
 add_action( 'init', 'wpsvse_doc_cat_tax', 0 );


 /**
  * Set tax query args on archive
  *
  * @since 0.1
  */

 function wpsvse_doc_cat_args( $query ) {
      if ( is_admin() || ! $query->is_main_query() )
          return;

      if ( is_tax( 'wpsvse_doc_cat' ) ) {
          $query->set( 'posts_per_page', -0 );
          return;
      }
  }
  add_action( 'pre_get_posts', 'wpsvse_doc_cat_args', 1 );


 /**
  * Register shortcode for article in need of update.
  *
  * @since 0.1
  */

	function wpsvse_doc_update() {
		return '<div class="doc-update-notice bg-info box-shortcode"><i class="fa fa-exclamation-triangle"></i>Denna artikel i dokumentationen har markerats som ofullständig/bristfällig. Det innebär att vissa delar kan saknas eller vara i behov av uppdatering. Du kan som medlem redigera denna artikel.</div>';
	}
	add_shortcode( 'uppdatera', 'wpsvse_doc_update' );


  /**
   * Allow media library uploads for loggen in users.
   *
   * @since 0.1
   */

  add_filter('frm_rte_options', 'frm_rte_options', 10, 2);
  function frm_rte_options($opts, $field){
    $opts['media_buttons'] = true;
    return $opts;
  }


  /**
   * Set custom doc templates to use
   *
   * @since 0.1
   */

  add_filter('single_template','wpsvse_single_doc_template');
  add_filter('archive_template','wpsvse_archive_doc_template');
  add_filter('taxonomy_template','wpsvse_tax_doc_template');

  // get single template
  function wpsvse_single_doc_template($single_template){
    global $post;
    $found = locate_template('single-wpsvse_docs.php');
    if($post->post_type == 'wpsvse_docs' && $found == ''){
      $single_template = dirname(__FILE__).'/templates/single-wpsvse_docs.php';
    }
    return $single_template;
  }

  // get archive template
  function wpsvse_archive_doc_template($archive_template){
    if(is_post_type_archive('wpsvse_docs')){
      $theme_files = array('archive-wpsvse_docs.php');
      $exists_in_theme = locate_template($theme_files, false);
      if($exists_in_theme == ''){
        return plugin_dir_path(__FILE__) . '/templates/archive-wpsvse_docs.php';
      }
    }
    return $archive_template;
  }

  // get taxonomy template
  function wpsvse_tax_doc_template($tax_template){
    if(is_tax('wpsvse_doc_cat')){
      $theme_files = array('taxonomy-wpsvse_doc_cat.php');
      $exists_in_theme = locate_template($theme_files, false);
      if($exists_in_theme == ''){
        return plugin_dir_path(__FILE__) . '/templates/taxonomy-wpsvse_doc_cat.php';
      }
    }
    return $tax_template;
  }


  /**
   * Get form page ID for docs form
   *
   * @since 0.1
   */

  function wpsvse_get_form_page_id_by_slug($page_slug) {
  	$page = get_page_by_path($page_slug);
  	if ($page) {
  		return $page->ID;
  	} else {
  		return null;
  	}
  }


  /**
   * Register docs widget
   *
   * @since 0.1
   */

  function wpsvse_docs_widgets_init() {
    register_sidebar( array(
      'name'          => __( 'Sidofält för dokumentation', 'wpsvse' ),
      'id'            => 'docs-widgets',
      'description'   => 'Widgetfält för sidopaneler på dokumentationssidor.',
      'before_widget' => '<aside id="%1$s" class="widget %2$s">',
      'after_widget'  => '</aside>',
      'before_title'  => '<h3 class="widget-title">',
      'after_title'   => '</h3>',
    ) );
  }
  add_action( 'widgets_init', 'wpsvse_docs_widgets_init' );
