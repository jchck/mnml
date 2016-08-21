<?php get_header(); ?>

<div class="px2 md-px3 py2 md-py4" style="min-height: 85vh">

	<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>

			<h1 class="measure"><?php bloginfo( 'name' ); ?> : <a href="<?= the_permalink(); ?>"><?php the_title(); ?></a></h1>

			<?php the_content(); ?>

		<?php endwhile; ?>

	<?php else : ?>

		<h1 class="measure"><a href="<?= esc_url(home_url('/')); ?>"><?php bloginfo( 'name' ); ?></a> : sorry but no posts were found :(</h1>

	<?php endif; ?>

</div>

<?php get_footer(); ?>