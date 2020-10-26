<?php get_header();?>
	<div id="content" class="container">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<?php the_content('Read the rest of this entry »'); ?>
		<?php endwhile; endif; ?>
	</div>
	<?php wp_footer();?>
  </body>
</html>
