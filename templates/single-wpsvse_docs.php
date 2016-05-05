<?php
/**
 * The template for displaying all pages.
 *
 * @package WPSV Dokumentation
 */

get_header();

	while ( have_posts() ) : the_post(); ?>

	 <!-- Start Page Header -->
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
        <div class="col-md-9 page-content docs-content">
					<h1 class="doc-heading"><?php echo get_the_term_list( $post->ID, 'wpsvse_doc_cat', '', ', ', '' ); ?>: <?php the_title(); ?></h1>
					<!-- Doc tabs -->
				  <ul class="nav nav-tabs" role="tablist">
				    <li role="presentation" class="active"><a href="#article" aria-controls="article" role="tab" data-toggle="tab"><i class="fa fa-file-text" aria-hidden="true"></i> Artikel</a></li>
				    <li role="presentation"><a href="#discuss" aria-controls="discuss" role="tab" data-toggle="tab"><i class="fa fa-comments" aria-hidden="true"></i> Diskutera</a></li>
						<?php if (class_exists('FrmProEntriesController')) {
						// Get the form id set as post meta on form page "dokumentredigerare"
						$the_doc_page_form_id = wpsvse_get_form_page_id_by_slug('dokumentredigerare');
						$the_doc_form_id = get_post_meta( $the_doc_page_form_id, 'form_id_key', true); ?>
					    <li role="presentation"><?php echo FrmProEntriesController::entry_edit_link(array('id' => 'current', 'label' => '<i class="fa fa-pencil-square-o" aria-hidden="true"></i> Redigera', 'page_id' => $the_doc_page_form_id, 'form_id' => $the_doc_form_id)); ?></li>
						<?php } else {
							// Fallback if formidablepro is not active ?>
							<li role="presentation"><?php edit_post_link( '<i class="fa fa-pencil-square-o" aria-hidden="true"></i> Redigera', '', '' ); ?></li>
						<?php } ?>
				  </ul>

				  <!-- Tab panes -->
				  <div class="tab-content">
				    <div role="tabpanel" class="tab-pane fade in active" id="article">
							<?php the_content(); ?>
							<div class="docs-meta clearfix">
								<div class="col-md-6 col-xs-6">
									<div class="docs-cat-meta">
										<?php echo get_the_term_list( $post->ID, 'wpsvse_doc_cat', '<i class="fa fa-folder" aria-hidden="true"></i> ', ', ', '' ); ?>
									</div>
								</div>
								<div class="col-md-6 col-xs-6">
									<div class="docs-date-meta">
										<i class="fa fa-refresh" aria-hidden="true"></i> Senast uppdaterat <?php the_modified_time('j F, Y');?>
									</div>
								</div>
							</div>
						</div>
				    <div role="tabpanel" class="tab-pane fade" id="discuss">
							<?php // If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif; ?>
						</div>
				  </div>
        </div>
        <div id="sidebar" class="col-md-3 widget-area" role="complementary">
					<?php if ( ! dynamic_sidebar( 'docs-widgets' ) ) : endif; ?>
				</div>
			</div>
		</div>
	</section>
	<!-- End Page Content -->

	<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>
