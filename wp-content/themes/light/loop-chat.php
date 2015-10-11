<?php
	$lines = preg_split("/[\r\n]+/", $post->post_content);
?>

<div class="entry-header">
  <h1 class="entry-title"><a href="<?php the_permalink();?>" title="<?php the_title(); ?>" rel="bookmark">
    <?php the_title(); ?>
    </a></h1>
</div>
<div class="entry-content">
  <?php 
			if(is_array($lines)) {
				$i=2;
				foreach($lines as $line) {
					if(trim($line) != '' ) 
			?>
  <p <?php if( $i%2 == 1 ){ echo 'class="content-chat even n'.$i.'"';}else {echo 'class="content-chat odd n'.$i.'"';}; ?>><span><?php echo $line;$i++ ?></span></p>
  <?php
				}
			}
			?>
</div>
