<?php

/*
Template Name Posts: 景点文章
*/

get_header(); ?>

<div class="banner">
    <ul>
        <?php 
            $category_id = get_cat_ID('景点');
            // 7 为首页标签
            $view_query = search_by_cat_tag($category_id, 7, 5); 
            if( $view_query->have_posts() ) {
                while ($view_query->have_posts()) : $view_query->the_post(); 
                    $img_id = get_post_thumbnail_id();
                    $img_url = wp_get_attachment_image_src($img_id);
                    $img_url = $img_url[0];
            ?>
                <li style="background-image: url('<?php echo $img_url;?>');">
                    <div class="inner">
                        <a class="btn" href="<?php the_permalink(); ?>"><?php echo get_i18n_meta(get_the_ID(), 'title', true, true); ?></a>
                    </div>
                </li>
            <?php endwhile;
            }?>

    </ul>
</div>
<div class="content">
    <div class="article"><?php echo get_i18n_content(get_post(get_the_ID())->post_content); ?></div>
    <div class="intro">
        <?php echo get_i18n_meta(get_the_ID(), 'title', true, true); ?> <br />
        <?php echo get_i18n_meta(get_the_ID(), 'viewlevel', true, true);?><br />
        占地面积：<?php echo get_i18n_meta(get_the_ID(), 'area', true, true); ?><br />
        气候类型：<?php echo get_i18n_meta(get_the_ID(), 'climate', true, true); ?><br />
        著名景点：<?php echo get_i18n_meta(get_the_ID(), 'viewpoint', true, true);?><br />
        地址：<?php echo get_i18n_meta(get_the_ID(), 'address', true, true);?><br />
        开放时间：<?php echo get_i18n_meta(get_the_ID(), 'openninghours', true, true); ?><br />
        门票：<?php echo get_i18n_meta(get_the_ID(), 'ticket', true, true); ?><br />
        交通：<?php echo get_i18n_meta(get_the_ID(), 'traffic', true, true); ?><br />
        <img id="baidu_map" src="/assets/img/jingdian_baidu_map.png" style="margin-top: 40px"/>
    </div>


    <div style="clear:both;"></div>
</div>






<?php get_footer(); ?>