<?php

/*
Template Name Posts: 美食文章
*/

get_header(); ?>

<div class="banner">
    <ul>
        <?php 
            $category_id = get_cat_ID('美食');
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
                <?php
                endwhile;
            } 
        ?>
    </ul>
</div>
<div class="content">
    <div class="article"><?php echo get_i18n_content(get_post(get_the_ID())->post_content); ?></div>
    <div class="intro">
        中文名：<?php echo get_i18n_meta(get_the_ID(), 'foodname', true, true); ?><br/>
        主要食材：<?php echo get_i18n_meta(get_the_ID(), 'foodmaterial', true, true); ?><br/>
        分    类：<?php echo get_i18n_meta(get_the_ID(), 'foodclass', true, true);?><br/>
        口    味：<?php echo get_i18n_meta(get_the_ID(), 'flavor', true, true); ?><br/>
        辅    料：<?php echo get_i18n_meta(get_the_ID(), 'seasoning', true, true); ?><br/>
    </div>
    <div style="clear:both;"></div>
</div>






<?php get_footer(); ?>