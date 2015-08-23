<?php
	/*
	 Template Name: 首页 
	*/
	
	//get_header(); 
    include 'languages/properties.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?php echo LanguageProperty::getText('title'); ?></title>
    <link rel="shortcut icon" href="<?php bloginfo('template_url');?>/assets/img/logo.png" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php bloginfo('template_url');?>/assets/css/reset.css">
    <link rel="stylesheet" href="<?php bloginfo('template_url');?>/assets/css/jquery.dropdown.min.css">
    <link rel="stylesheet" href="<?php bloginfo('template_url');?>/assets/css/style.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
</head>

<body>
    <div class="header">
        <img src="<?php bloginfo('template_url');?>/assets/img/flag.png" />
        <?php //wp_nav_menu( array( 'menu' => 'navmenu', 'depth' => 1) ); ?>
        <div class="header-form">
            <div class="language">
                <button value="Dropdown" data-jq-dropdown="#jq-dropdown-1"><?php echo $_COOKIE['language'] == 'en' ? 'EN' : '中文'; ?>&nbsp;&nbsp;<i class="fa fa-angle-down"></i></button>
                <div id="jq-dropdown-1" class="jq-dropdown jq-dropdown-tip">
                    <ul class="jq-dropdown-menu">
                        <li><a href="<?php echo home_url(add_query_arg(array('language'=>'en'),$wp->request));?>">EN</a></li>
                        <li><a href="<?php echo home_url(add_query_arg(array('language'=>'zh'),$wp->request));?>">中文</a></li>
                    </ul>
                </div>
            </div>
            <?php get_search_form(); ?>
        </div>
    </div>
    <div class="banner">
        <div class="unslider-arrows">
            <div class="unslider-arrow prev">
                <a href="#"></a>
            </div>
            <div class="unslider-arrow next">
                <a href="#"></a>
            </div>
        </div>
        <!-- 置顶文章 -->
        <ul>
            <?php 
                $sticky = get_option('sticky_posts'); 
                rsort( $sticky );//对数组逆向排序，即大ID在前 
                //$sticky = array_slice( $sticky, 0, 10);//输出置顶文章数，请修改10，0不要动，如果需要全部置顶文章输出，可以把这句注释掉 
                query_posts( array( 'post__in' => $sticky, 'caller_get_posts' => 1 ) ); 
                if (have_posts()) :while (have_posts()) : the_post(); 
                    $img_id = get_post_thumbnail_id();
                    $img_url = wp_get_attachment_image_src($img_id);
                    $img_url = $img_url[0];   
            ?> 
                <li style="background-image: <?php echo $img_url; ?>">
                    <div class="inner">
                        <a class="btn-index" href="<?php the_permalink(); ?>"><?php echo get_i18n_meta(get_the_ID(), 'title', true, true); ?></a>
                    </div>
                </li>
            <?php    endwhile; endif; ?> 
        </ul>

        <div class="sub-menu">
            <div class="column" style="background-image: url('<?php bloginfo('template_url');?>/assets/img/观山湖公园.jpeg');">
                <a href="/?cat=2">
                    <div class="mask">
                        <img src="<?php bloginfo('template_url');?>/assets/img/icon_jingdian.png"/>
                        <div>景点</div>
                    </div>
                </a>
            </div>
            <div class="column" style="background-image: url('<?php bloginfo('template_url');?>/assets/img/酒店房间.png');">
                <a href="/?cat=3">
                    <div class="mask">
                        <img src="<?php bloginfo('template_url');?>/assets/img/icon_jiudian.png"/>
                        <div>酒店</div>
                    </div>
                </a>
            </div>
            <div class="column" style="background-image: url('<?php bloginfo('template_url');?>/assets/img/八宝甲鱼.jpeg');">
                <a href="/?cat=4">
                    <div class="mask">
                        <img src="<?php bloginfo('template_url');?>/assets/img/icon_meishi.png"/>
                        <div>美食</div>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <!-- 消息 -->
	<div class="news">
        <ul>
            <?php 
            $query = new WP_Query('tag=topnews');
            if ($query->have_posts()) {
                $index = 0;
                while ($query->have_posts()) { 
                    $query->the_post();  
                    $img_id = get_post_thumbnail_id();
                    $img_url = wp_get_attachment_image_src($img_id);
                    $img_url = $img_url[0];
            ?>
                <?if($index %3 == 0) {?><li><?php } ?>
                <div class="news-item">
                    <div class="news-img" style="background-image: url('<?php echo $img_url ?>');"></div>
                    <div class="news-right">
                        <h5><?php echo get_i18n_meta(get_the_ID(), 'title', true, true); ?></h5>
                        <div class="desc">
                            <?php echo wp_trim_words( get_i18n_content(get_the_content()), 33); ?>    
                        </div>
                    </div>
                </div>

                <?if($index %3 == 0 && $index > 0) { ?></li><?php } ?>

                <?php
                    $index++;
                }
                if($index %3 !=0) {?></li><?php } ?>
            <?php 
            } 
            ?> 
        </ul>
    </div>
	
	<!-- 景点模块 -->
	<div class="grey" style="padding: 60px 8%">
        <h2 class="index-title"><span style="background-image: url('<?php bloginfo('template_url');?>/assets/img/attractions_icon.png');">景点精选</span></h2>
        <div id="attractions">
            <div class="attractions-arrows">
                <div class="attractions-arrow prev">
                    <a href="javascript:;">
                        <i class="fa fa-angle-left"></i>
                    </a>
                </div>
                <div>景点精选</div>
                <div class="attractions-arrow next">
                    <a href="javascript:;">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>
            </div>
            <ul>
            	<?php 
					$category_id = get_cat_ID('景点');
					// 7 为首页标签
					$view_query = search_by_cat_tag($category_id, 7, 10); 
					if( $view_query->have_posts() ) {
						while ($view_query->have_posts()) : $view_query->the_post(); 
                            $img_id = get_post_thumbnail_id();
                            $img_url = wp_get_attachment_image_src($img_id);
                            $img_url = $img_url[0];
                    ?>
				<li>
                    <div class="attractions-img" style="background-image: url('<?php echo $img_url;?>');"></div>
                    <div class="attractions-panel">
                        <div class="attractions-logo">
                            <img src="<?php bloginfo('template_url');?>/assets/img/attractions_logo.png">
                        </div>
                        <h3><?php echo get_i18n_meta(get_the_ID(), 'title', true, true); ?></h3>
                        <div class="attractions-desc"><?php echo wp_trim_words( get_i18n_content(get_the_content()),126).'...'; ?></div>
                        <div class="attractions-btn">
                            <a href="<?php the_permalink(); ?>">了解更多</a>
                        </div>
                    </div>
                </li>
						<?php
						endwhile;
					} 
				?>
                
            </ul>
        </div>
    </div>
	
	<!-- 酒店模块 -->
	<div id="hotel" class="white" style="padding: 60px 8%">
        <h2 class="index-title center">
            <span style="background-image: url('<?php bloginfo('template_url');?>/assets/img/hotel_icon.png');">酒店精选</span>
            <div class="hotel-hr"></div>
        </h2>
        <div>
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
			<div class="col-25-block hotel-item">
                <a href="<?php the_permalink(); ?>">
                <div class="hotel-img" style="background-image: url('<?php echo $img_url;?>');"></div>
                <h3><?php echo get_i18n_meta(get_the_ID(), 'title', true, true); ?></h3>
                <div class="hotel-desc"><?php echo get_i18n_meta(get_the_ID(),'hotelDesc',true); ?></div>
                </a>
            </div>
				<?php
				endwhile;
			} 
		?>
            <div style="clear:both;"></div>
        </div>
    </div>
	
	<!-- 美食模块 -->
	<div id="cate" class="grey" style="padding: 60px 8%">
        <h2 class="index-title">
            <span style="padding-left: 65px; background-image: url('<?php bloginfo('template_url');?>/assets/img/cate_icon.png');">美食精选</span>
        </h2>
        <div>
        	<?php 
				$category_id = get_cat_ID('美食');
				// 7 为首页标签
				$view_query = search_by_cat_tag($category_id, 7, 10); 
				if( $view_query->have_posts() ) {
					while ($view_query->have_posts()) : $view_query->the_post(); 
                        $img_id = get_post_thumbnail_id();
                        $img_url = wp_get_attachment_image_src($img_id);
                        $img_url = $img_url[0];
                    ?>
						<div class="col-50-block col-img" style="background-image: url('<?php echo $img_url; ?>');">
                            <a href="<?php the_permalink(); ?>">
			                     <div class="mask"></div>
                            </a>
			            </div>
					<?php
					endwhile;
				} 
			?>
        </div>
        <div class="all_cate">
            <a href="/?cat=4">查看所有美食</a>
        </div>
    </div>
	
	<!-- 视频模块 -->
	<div id="video" class="white" style="padding: 40px 8%">
        <div id="mod_tenvideo_flash_player_1436075834045"><embed wmode="window" flashvars="vid=q0138iplaoa&amp;tpid=3&amp;showend=1&amp;showcfg=1&amp;searchbar=1&amp;shownext=1&amp;list=2&amp;autoplay=1&amp;ptag=1.weibo&amp;outhost=http%3A%2F%2Fv.qq.com%2Fpage%2Fq%2Fo%2Fa%2Fq0138iplaoa.html%3F__t%3D1%26ptag%3D1.weibo%26_out%3D102&amp;refer=http%3A%2F%2Ft.qq.com%2Fsuishenailou&amp;openbc=0&amp;title=%20%E8%B4%B5%E9%98%B3%E9%A3%8E%E6%99%AF_095338" src="http://imgcache.qq.com/tencentvideo_v1/player/TencentPlayer.swf?max_age=86400&amp;v=20140714" quality="high" name="tenvideo_flash_player_1436075834045" id="tenvideo_flash_player_1436075834045" bgcolor="#000000" width="100%" height="483px" align="middle" allowscriptaccess="always" allowfullscreen="true" type="application/x-shockwave-flash" pluginspage="http://get.adobe.com/cn/flashplayer/"></div>
    </div>
    <div style="clear:both;"></div>

	
	<?php get_footer(); ?>