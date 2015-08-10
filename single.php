<?php
/**
 * The template for displaying all single posts
 *
 * @package WordPress
 * @subpackage guiyang
 * @since guiyang 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

			<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php //get_template_part( 'content', get_post_format() ); ?>
				<?php //twentythirteen_post_nav(); ?>

				<div><?php echo get_i18n_meta(get_the_ID(), 'title', true, true); ?></div>
				<div class="article"><?php echo get_i18n_content(get_post(get_the_ID())->post_content); ?></div>

				<?php comments_template(); ?>

			<?php endwhile; ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php //get_sidebar(); ?>
<?php get_footer(); ?>