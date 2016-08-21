<?php get_header(); ?>

<div class="px3 py4">

	<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>

			<h1 class="measure"><a href="<?= esc_url(home_url('/')); ?>"><?php bloginfo( 'name' ); ?></a> : <?php the_title(); ?></h1>

			<?php the_content(); ?>

		<?php endwhile; ?>

	<?php else : ?>

		<h1 class="measure"><a href="<?= esc_url(home_url('/')); ?>"><?php bloginfo( 'name' ); ?></a> : sorry but no posts were found :(</h1>

	<?php endif; ?>

</div>

<?php get_footer(); ?>