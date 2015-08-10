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
        <a href="#"><img src="/assets/img/attractions_icon_white.png"> 贵阳景点</a>
    </div>

    <?php 
    $category_id = get_cat_ID('景点');
    // 7 为首页标签
    $view_query = search_by_cat_tag($category_id, 7, 5); 
    if( $view_query->have_posts() ) {
        
        //$posts = $view_query->have_posts();
        
        //for($index = 0; $index < $posts->length; $index++){
        $index = 0;
        while ($view_query->have_posts()) : $view_query->the_post(); 
            $img_id = get_post_thumbnail_id();
            $img_url = wp_get_attachment_image_src($img_id);
            $img_url = $img_url[0];


    ?>
        <?php if($index == 0) {?>
        <div class="col-50-block col-img" style="background-image: url('<?php echo $img_url;?>');"><div class="mask"></div></div>
        <?php } ?>
        
        <?php if($index == 1) {?>
        <div class="col-50-block"  style="height:100%">
        <?php } ?>
            <?php if($index == 1) {?><div style="height:50%"><?php }?>
                <?php if($index > 1 && $index < 3) {?><div class="col-50-block col-img" style="background-image: url('<?php echo $img_url;?>');"><div class="mask"></div></div><?php } ?>
            <?php if($index == 2) { ?></div><?php }?>
            <?php if($index == 3) {?><div style="height:50%"><?php }?>
                <?php if($index > 2) {?><div class="col-50-block col-img" style="background-image: url('<?php echo $img_url;?>');"><div class="mask"></div></div><?php } ?>
        <?php if($index == 4) {?></div>
        </div>
        <?php } ?>
    <?php
            $index ++;
            endwhile;
        } 
    ?>
</div>
<div class="content">
	<?php /* The loop */ ?>
	<?php while ( have_posts() ) : the_post(); ?>
	<div class="col-50-block padding">
        <div class="attractions">
            <?php the_post_thumbnail(array(783, 430)); ?>
            <h4><?php the_title(); ?></h4>
            <div class="desc" ><div class="desc"><?php echo get_i18n_content(get_post(get_the_ID())->post_content);?></div></div>
            <div class="link">
                <a href="<?php the_permalink(); ?>">查看详细</a>
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