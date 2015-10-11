<?php get_header(); ?>
	<div id="main">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<?php setPostViews(get_the_ID()); ?>
			<div class="mod-map">
			</div>
			<div class="post-date">
				<span class="icon day"><?php the_time('j'); ?></span>
				<span class="week">
					<a href="<?php the_permalink() ?>"><?php echo date('l',get_the_time('U')); ?></a>
				</span>
				<span class="date"><?php echo date('F',get_the_time('U')).' '.get_the_time('jS  Y'); ?></span>
			</div>
			<div class="article-wrap">
				<div class="article  clearfix">
					<div <?php post_class('box') ?>>
						<div class="post-title">
							<h3><?php the_title(); ?></h3>
						</div>
						<div class="post-text-body">
							<?php the_content(); ?>
						</div>
					</div>
					<?php if ( get_the_tags() ) {?>
						<div class="mod-tags">
							<div class="hd">
								<span class="icon tag"></span>
							</div>
							<?php the_tags('<span>','','</span>'); ?>
						</div>
					<?php } ?>
					<div id="notes">
						<?php comments_template('', true); ?>
					</div>
				</div>
				<div class="article-btm">
				</div>
			</div>
		<?php endwhile; ?>
		<?php endif; ?>
	</div>
<?php get_footer(); ?>