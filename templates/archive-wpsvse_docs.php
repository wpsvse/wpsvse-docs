<?php
/**
 * The template for displaying Archive pages.
 *
 * @package WPSV Dokumentation
 */

get_header(); ?>

    <section id="page-header" class="section">
		<div class="container">
			<div class="row">
        <div class="col-md-12">
        	<h1 class="page-title">Dokumentation</h1>
        </div>
      </div>
    </div>
    </section>
    <!-- Start Page Header -->

    <!-- Start Page Content -->
	<section id="page-full" class="section">
		<div class="container">
			<div class="row">
        <div class="col-md-9 blog-listings docs-listings">
          <div class="row">
                <?php
                $wpsvseDocCats = get_terms('wpsvse_doc_cat','child_of=0&hide_empty=0');

               	foreach ($wpsvseDocCats as $cat) :
               	$args = array(
               		'post_type' => 'wpsvse_docs',
               		'posts_per_page' => -1,
               		'tax_query' => array(
               			'relation' => 'AND',
               			array(
               				'taxonomy' => 'wpsvse_doc_cat',
               				'field' => 'id',
               				'terms' => array( $cat->term_id ),
               				'operator' => 'IN'
               			)
               		)
               	);

               	$wpsvseInDocQuery = new WP_Query($args);

               	if ($wpsvseInDocQuery->have_posts()) : ?>
               	<div class="col-md-6 doc-col">
               	<h2><?php echo $cat->name; ?></h2>
               	<ul>
               	<?php while ($wpsvseInDocQuery->have_posts()) : $wpsvseInDocQuery->the_post(); ?>

               	<li>
                  <a class="doc-permalink" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
               	</li>

                 <?php
                 endwhile;
                 echo '</ul></div>';
                 ?>

                 <?php else :
                 	echo '<div class="col-md-6 doc-col"><h2>'.$cat->name.'</h2>';
                 	echo '<p><em><small>Det finns för närvarande inga artiklar under <strong>'.$cat->name.'</strong>. ';
                 if ( is_user_logged_in() ) {
                 	echo 'Varför inte <a href="' . esc_url( home_url( '/dokumentredigerare/' ) ) . '">skapa en</a>!';
                 }
                 	echo '</small></em></p></div>';
                 endif;
                 wp_reset_query();
                 endforeach;
                 ?>
          </div>
        </div>
        <div id="sidebar" class="col-md-3 widget-area" role="complementary">
          <?php
					// Load default widgets
					include ( plugin_dir_path(__FILE__) . '/default-widgets.php');
					// Dynamic widgets
					if ( ! dynamic_sidebar( 'docs-widgets' ) ) : endif; ?>
      	</div>
			</div>
		</div>
	</section>
	<!-- End Page Content -->

<?php get_footer(); ?>
