<?php
	/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that other
 * 'pages' on your WordPress site will use a different template.
 *
 * @package Wordpress
 * @subpackage guiyang
 * @since guiyang 1.0
 */
	get_header(); ?>
	<div id="primary" class="content-area">
	
	<!-- 景点模块 -->
	<?php 
		$category_id = get_cat_ID('景点');
		// 7 为首页标签
		$view_query = search_by_cat_tag($category_id, 7, 10); 
		if( $view_query->have_posts() ) {
			while ($view_query->have_posts()) : $view_query->the_post(); ?>
				<p><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></p>
			<?php
			endwhile;
		} 
	?>
	
	
	<!-- 酒店模块 -->
	<?php 
		$category_id = get_cat_ID('酒店');
		// 7 为首页标签
		$view_query = search_by_cat_tag($category_id, 7, 10); 
		if( $view_query->have_posts() ) {
			while ($view_query->have_posts()) : $view_query->the_post(); ?>
				<p><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></p>
			<?php
			endwhile;
		} 
	?>
	
	<!-- 美食模块 -->
	
	<?php 
		$category_id = get_cat_ID('美食');
		// 7 为首页标签
		$view_query = search_by_cat_tag($category_id, 7, 10); 
		if( $view_query->have_posts() ) {
			while ($view_query->have_posts()) : $view_query->the_post(); ?>
				<p><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></p>
			<?php
			endwhile;
		} 
	?>
	
	<!-- 视频模块 -->
	</div>
	
	<?php get_footer(); ?>