<?php
/**
 * Template Name: Products Page
 * This template should be used when including WooCommerce product shortcodes
 */
	get_header();
	global $woo_options;
?>

    <div id="content" class="page col-full">
		<section id="main" class="col-left">

		<?php if ( isset( $woo_options['woo_breadcrumbs_show'] ) && $woo_options['woo_breadcrumbs_show'] == 'true' ) { ?>
			<section id="breadcrumbs">
				<?php woo_breadcrumbs(); ?>
			</section><!--/#breadcrumbs -->
		<?php } ?>

        <?php
        	if ( have_posts() ) { $count = 0;
        		while ( have_posts() ) { the_post(); $count++;
        ?>
            <article <?php post_class(); ?>>

				<header>
			    	<h1><?php the_title(); ?></h1>
				</header>

                <section class="entry">
                	<?php the_content(); ?>

					<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'woothemes' ), 'after' => '</div>' ) ); ?>
               	</section><!-- /.entry -->

				<?php edit_post_link( __( '{ Edit }', 'woothemes' ), '<span class="small">', '</span>' ); ?>

            </article><!-- /.post -->

            <?php
            	// Determine wether or not to display comments here, based on "Theme Options".
            	if ( isset( $woo_options['woo_comments'] ) && in_array( $woo_options['woo_comments'], array( 'page', 'both' ) ) ) {
            		comments_template();
            	}

				} // End WHILE Loop
			} else {
		?>
			<article <?php post_class(); ?>>
            	<p><?php _e( 'Sorry, no posts matched your criteria.', 'woothemes' ); ?></p>
            </article><!-- /.post -->
        <?php } // End IF Statement ?>

		</section><!-- /#main -->

        <?php get_sidebar(); ?>

    </div><!-- /#content -->

<?php get_footer(); ?>