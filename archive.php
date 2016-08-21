<?php /* Template Name: Archive */ ?>

<?php get_header(); ?>
	
	<div class="px2 md-px3 py2 md-py4" style="min-height: 85vh">

		<h1 class="measure"><a href="<?= esc_url(home_url('/')); ?>"><?php bloginfo( 'name' ); ?></a> : all posts</h1>

		<dl>

		<?php
			/**
			 * The WordPress Query class.
			 * @link http://codex.wordpress.org/Function_Reference/WP_Query
			 *
			 */
			$args = array(
				
				//Type & Status Parameters
				'post_type'   => 'post',
				
				//Order & Orderby Parameters
				'order'               => 'ASC',
				'orderby'             => 'date',
				
				//Pagination Parameters
				'posts_per_page'         => 10,
				'posts_per_archive_page' => -1
				
			);
		
		$query = new WP_Query( $args );

		while ($query->have_posts()) : $query->the_post(); ?>

			<dt><time class="caps h6 gray"><?= get_the_date( 'jS M y'); ?></time></dt>
			<dd class="mb2"><a href="<?= the_permalink(); ?>"><?php the_title(); ?></a></dd>

		<?php endwhile; wp_reset_postdata(); ?>

		</dl>

	</div>

<?php get_footer(); ?>