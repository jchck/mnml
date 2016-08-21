<?php get_header(); ?>

<div class="px2 md-px3 py2 md-py4" style="min-height: 85vh">

	<?php while (have_posts()) : the_post(); ?>

		<h1 class="measure mb0"><a href="<?= esc_url(home_url('/')); ?>"><?php bloginfo( 'name' ); ?></a> : <?php the_title(); ?></h1>

		<time class="caps h6 gray"><?= get_the_date(); ?></time>

		<?php the_content(); ?>

	<?php endwhile; ?>
</div>

<?php get_footer(); ?>