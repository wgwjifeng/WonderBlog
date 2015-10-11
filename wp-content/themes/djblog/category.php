<?php get_header(); ?> 

<!--  TWITTER END -->


<!--  ENTRY SUMMARY BEGIN -->

<!--  ENTRY SUMMARY END -->


<!--  ENTRY SUMMARY BEGIN -->
 <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div class="EntrySingle">
	<div class="TitleDate">
		<div class="Title"><a href="<?php the_permalink() ?>"><span class="TitleReplace"><?php the_title(); ?></span></a></div>
		<div class="DateStamp"><span class="DateReplace"><?php the_time("Y-m-d"); ?></span></div>
	</div>
	<div class="Entry" id="entry-489">
		<div class="EntryContent">
			<div class="EntryContentBody"><?php the_content() ?></div>
		</div>
	</div>
</div>

  <?php endwhile; ?>

          <?php else : ?>
             <li>

            <div class="ttl"><a href="#" target="_blank">暂无</a></div>

            <div class="timestamp">

              <?php date(Y-m-d,time());?>

            </div>

            <div style="clear:both"></div>

            <span></span> </li>

          <?php endif; ?>
<!-- /content -->
<!-- FOOTER BEGIN -->
<?php get_footer(); ?>
