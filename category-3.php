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
<div class="banner">
    <ul>
        <?php 
            $category_id = get_cat_ID('酒店');
            // 7 为首页标签
            $view_query = search_by_cat_tag($category_id, 7, 10); 
            if( $view_query->have_posts() ) {
                while ($view_query->have_posts()) : $view_query->the_post(); 
                    $img_id = get_post_thumbnail_id();
                    $img_url = wp_get_attachment_image_src($img_id);
                    $img_url = $img_url[0];
                ?>

            <li style="background-image: url('<?php echo $img_url; ?>');">
                <div class="inner">
                    <a class="btn" href="<?php the_permalink(); ?>">
                        <img src="<?php echo $img_url;?>"><?php echo get_i18n_meta(get_the_ID(), 'title', true, true); ?>
                    </a>
                </div>
            </li>

                <?php
                endwhile;
            } 
        ?>
    </ul>
</div>
<div class="content">

	<?php /* The loop */ ?>
	<?php while ( have_posts() ) : the_post(); 
        $img_id = get_post_thumbnail_id();
        $img_url = wp_get_attachment_image_src($img_id);
        $img_url = $img_url[0];
    ?>

	<div class="hotel">
        <div class="col-50-block right-separation">
            <div class="hotel-img col-50-block" style="background-image: url('<?php echo $img_url;?>')"></div>
            <div class="hotel-info col-50-block">
                <h3 class="name"><?php echo get_i18n_meta(get_the_ID(), 'title', true, true); ?></h3>
                <h5 class="rating"><?php echo get_i18n_meta(get_the_ID(), 'hotelStar', true, true); ?></h5>
                <div class="address">
                	<?php echo get_i18n_meta(get_the_ID(), 'address', true, true); ?>
                	<br>(订房热线<?php echo get_i18n_meta(get_the_ID(), 'phone', true, true); ?>)
                </div>
                <div class="hotel-btn">
                    <a href="<?php the_permalink(); ?>">查看详情</a>
                </div>
            </div>
        </div>
        <div class="col-50-block">
            <div class="hotel-desc">
                <?php //the_content('',FALSE,'');?>
                <?php echo get_i18n_content(get_post(get_the_ID())->post_content);?>
            </div>
            <ul class="hotel-service">
            	<?php if(has_tag('wifi')) {?>
	                <li>
	                    <img src="<?php bloginfo('template_url');?>/assets/img/jiudian_wifi.png">
	                    <div>免费WiFi（部分）</div>
	                </li>
            	<?php }?>
            	<?php if(has_tag('freeToiletries')) {?>
	                <li>
	                    <img src="<?php bloginfo('template_url');?>/assets/img/jiudian_toiletries.png">
	                    <div>免费洗漱用品</div>
	                </li>
                <?php } ?>
                <?php if(has_tag('parking')) {?>
	                <li>
	                    <img src="<?php bloginfo('template_url');?>/assets/img/jiudian_port.png">
	                    <div>免费停车场</div>
	                </li>
                <?php } ?>
                <?php if(has_tag('swimmingPool')) {?>
                <li>
                    <img src="<?php bloginfo('template_url');?>/assets/img/jiudian_swim.png">
                    <div>游泳池</div>
                </li>
                <?php } ?>
            </ul>
        </div>
        <div style="clear:both;"></div>
    </div>
		

	<?php endwhile; ?>
	

</div>
<?php get_footer(); ?>