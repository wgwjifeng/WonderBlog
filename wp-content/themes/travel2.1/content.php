<div class="post post-text  clearfix <?php if ($wp_query->current_post%2 == 1) { echo 'post-right';}else {echo 'post-left';}; ?>">
	<div class="post-date">
		<span class="icon day"><?php the_time('j'); ?></span>
		<span class="week">
			<a href="<?php the_permalink() ?>"><?php echo date('l',get_the_time('U')); ?></a>
		</span>
		<span class="date"><?php echo date('F',get_the_time('U')).' '.get_the_time('jS  Y'); ?></span>
	</div>
	<div class="post-content">
		<div class="sprite post-main-bg">
			<div class="sprite post-main" data-url="<?php the_permalink() ?>" data-type="">
				<?php if (has_post_format('image')) : ?>
					<a href="<?php the_permalink() ?>"><img src="<?php huilang_thumbnail( ); ?>" alt="<?php the_title(); ?>" /></a>
				<?php else: ?>
				<div class="mod-txt mod-text">
					<h2>
						<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
					</h2>
					<?php if(preg_match('/<!--more.*?-->/', $post->post_content)){
					  the_content("");
					  }else{
					    if ( post_password_required($post) ) { $output = get_the_password_form(); echo $output;}
						else{
							echo "<p>", mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 180," [...]"),"</p>";
						} 
					  }
					?>
				</div>
				<?php endif; ?>
			</div>
		</div>
		<div class="sprite post-meta">
			<div class="author-avatar">
				<?php if (function_exists('get_avatar')) { echo get_avatar( get_the_author_email(), '64' ); }?>
			</div>
			<h3><?php the_author(); ?></h3>
			<div class="tags">
				<table>
					<tbody>
						<tr>
							<td><?php the_category('','',''); ?></td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="like clearfix">
				<a class="hot-num" href="<?php the_permalink() ?>#notes"><?php echo getPostViews(get_the_ID()); ?>℃</a>
			</div>
		</div>
	</div>
</div>