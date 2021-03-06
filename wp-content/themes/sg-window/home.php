<?php
/**
 * The template for displaying blog
 *
 * @package WordPress
 * @subpackage sgwindow
 * @since SG Window 1.0.0
 */

get_header(); 
$sgwindow_layout = sgwindow_get_theme_mod('layout_blog');
$sgwindow_layout_content = sgwindow_get_theme_mod('layout_blog_content');
?>
<div class="main-wrapper <?php echo esc_attr(sgwindow_content_class($sgwindow_layout_content)); ?> <?php echo esc_attr($sgwindow_layout); ?> ">

	<div class="site-content">

			<?php
				if ( have_posts() ) : ?>
					
					<div class="content"> 
				
					<?php
						while ( have_posts() ) : the_post();

							get_template_part( 'content', sgwindow_get_content_prefix() );
							
						endwhile; ?>
						
							<div class="content-search">
							<?php do_action( 'sgwindow_after_content' ); ?>
							</div><!-- .content-search -->
							
						</div><!-- .content -->
						<div class="clear"></div>
				
				<?php

					sgwindow_paging_nav();
					
				else :  
				?>
					<div class="content"> 
					<?php 
						get_template_part( 'content', 'none' );
					?>
					</div><!-- .content -->								
				<?php 
				endif;
?>

	</div><!-- .site-content -->
	<?php
	sgwindow_get_sidebar( sgwindow_get_theme_mod('layout_blog') );
	?>
</div> <!-- .main-wrapper -->

<?php
get_footer();