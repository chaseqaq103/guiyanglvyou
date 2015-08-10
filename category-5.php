<?php
/**
 * The template for displaying Category pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>
<div class="photo-grid">
        <div class="grid-btn">
            <a href="#"><img src="/assets/img/cate_icon_white.png"> 最新消息</a>
        </div>

        <?php 
            $category_id = get_cat_ID('最新动态');
            // 7 为首页标签
            $view_query = search_by_cat_tag($category_id, 15, 5); 
            if( $view_query->have_posts() ) {
                while ($view_query->have_posts()) : $view_query->the_post(); 
                    $img_id = get_post_thumbnail_id();
                    $img_url = wp_get_attachment_image_src($img_id);
                    $img_url = $img_url[0];
                ?>
                <div class="col-25-block col-img" style="background-image: url('<?php echo $img_url;?>');">
                    <a href="<?php the_permalink(); ?>">
                    <div class="mask"></div>
                    </a>
                </div>
                <?php
                endwhile;
            } 
        ?>
    </div>
    <div class="content">

    	<?php /* The loop */ ?>
		<?php while ( have_posts() ) : the_post(); ?>
        <div class="col-33-block padding">
            <div class="cate">
                <?php the_post_thumbnail(array(373, 244)); ?>
                <h4><?php echo get_i18n_meta(get_the_ID(), 'title', true, true); ?></h4>
                <div class="desc"><?php echo get_i18n_content(get_post(get_the_ID())->post_content);?></div>
                <div class="link">
                    <a href="<?php the_permalink(); ?>">查看详情</a>
                </div>
            </div>
        </div>
        <?php endwhile; ?>
        <div style="clear:both"></div>
        <div class="load-more">
            <button>
                <i class="fa fa-spin fa-spinner"></i>
                <span>加载更多</span>
            </button>
        </div>
    </div>
    <div style="clear:both;"></div>
<?php get_footer(); ?>