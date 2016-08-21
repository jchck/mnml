<?php get_header(); ?>

	<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>

			<h1><a href="<?= esc_url(home_url('/')); ?>"><?php bloginfo( 'name' ); ?></a> : <?php the_title(); ?></h1>

			<?php the_content(); ?>

		<?php endwhile; ?>

	<?php else : ?>

		<p>Sorry but no posts were found :(</p>

	<?php endif; ?>

<?php get_footer(); ?>