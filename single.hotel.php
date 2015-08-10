<?php

/*
Template Name Posts: 酒店文章
*/

get_header(); ?>

<div class="banner">
    <ul>
        <?php 
            $category_id = get_cat_ID('酒店');
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
        <div class="article">
        <?php echo get_i18n_content(get_post(get_the_ID())->post_content); ?>

        <?php 

        	$pictures = get_post_meta(get_the_ID(),'picture',false);
        	if($pictures){
        ?>
        <div class="img-block">
        	<?php foreach($pictures as $picture){ ?>
            
            <img src="<?php echo $picture;?>">
            
            <?php }?>
        </div>
        <?php } ?>
        <?php 
            $facilities = get_i18n_meta(get_the_ID(), 'facility', false, true);
        	if($facilities){
        ?>
        客房设施<br />
        <?php		
        	foreach($facilities as $facility){
        		echo $facility.'      ';
        	} 
        }?><br />
        <?php 
            $services = get_i18n_meta(get_the_ID(), 'service', false, true);
        	if($services){
        ?>
        服务项目<br />
        <?php		
        	foreach($services as $service){
        		echo $service.'      ';
        	} 
        }?><br />
        </div>
        <div class="intro">
        <?php the_title(); ?><br />
        订房专线:<?php echo get_post_meta(get_the_ID(),'phone',true);?><br />
        邮箱: <?php echo get_post_meta(get_the_ID(),'email',true);?><br />
        酒店地址: <?php echo get_i18n_meta(get_the_ID(), 'address', true, true); ?><br />
        <br />

        <?php 

        	$points = get_i18n_meta(get_the_ID(), 'viewpoint', false, true);
        	if($points){
        ?>
        景点<br />
        <?php		
        	foreach($points as $point){
        		list($head, $end) = split ('[,]', $point); 
        ?>
        	<?php echo $head; ?><span class="sub"><?php echo $end;?></span><br/>
        <?php
        	} 
        }?><br />
        <br />
        <?php 

        	$trafics = get_i18n_meta(get_the_ID(), 'trafic', false, true);
        	if($trafics){
        ?>
        交通<br />
        <?php		
        	foreach($trafics as $trafic){
        		echo $trafic.'<br/>';
        	} 
        }?>
        <img id="baidu_map" src="/assets/img/jiudian_baidu_map.png" style="margin-top: 100px"/>
        </div>
        <div style="clear:both;"></div>
        <?php comments_template(); ?>
    </div>
    <div style="clear:both;"></div>






<?php get_footer(); ?>