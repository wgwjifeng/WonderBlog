<?php
	$desc = false;
	$anchor_text = $href = filter_var(trim($post->post_content), FILTER_VALIDATE_URL);
	$matches = array();
	if(!$href && preg_match('/<a [^>]*href=[\"\']?([^\"\'\s]+)/i', $post->post_content, $matches)) {
		$anchor_text = $href = $matches[1];
		$desc = get_the_excerpt();
	}
	if($post->post_title) {
		$anchor_text = $post->post_title;
	}
?>

<div class="entry-header">
  <h1 class="entry-title"><a href="<?php echo $href; ?>" title="<?php echo $anchor_text; ?>" rel="external nofollow" ><?php echo $anchor_text; ?></a></h1>
</div>
<div class="entry-content">
  <?php the_content(); ?>
</div>
