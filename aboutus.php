<?php
	/*
	 Template Name: 自定义页面模版
	*/
	
	get_header(); ?>
<div>
	<?php echo get_post(get_the_ID())->post_content; ?>
</div>

<?php get_footer(); ?>