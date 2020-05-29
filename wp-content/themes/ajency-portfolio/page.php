<?php get_header();  ?>

<section class="post-content">
	<div class="container p5">
	  	<div class="row">
		    <div class="col col12">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					<?php the_content(); ?>

					<?php endwhile; ?>
				<?php endif; ?>

		    </div>
	  	</div>


	</div>
</section>

<?php get_footer(); ?>