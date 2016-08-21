<footer class="px2 md-px3">

	<?php if (!is_page_template( 'archive.php' )) : ?>
		<a href="<?= esc_url(home_url('/all')); ?>"><h5 class="caps">all posts</h5></a>
	<?php endif; ?>
	
</footer>
</body>
</html>