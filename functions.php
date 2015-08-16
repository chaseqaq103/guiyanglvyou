<?php
/**
 * 根据标分类名，标签名 获取文章
 * @param catName 分类名称
 * @param tagName 标签名称
 * @param count 记录数
 */
 
function search_by_cat_tag($catId, $tagId, $count){
		$args = array(
			'cat' => $catId,
			'tag_id' => $tagId,
			'showposts' => $count,  //输出的文章数量
			'caller_get_posts'=>1
		);
		$my_query = new WP_Query($args);
		
		wp_reset_query(); 
		
		return $my_query;
}
add_action( 'search_by_cat_tag', 'search_by_cat_tag' );


/**
 * 获取文章图片url
 *
 */

function get_post_thumbnail_url($size){

	$src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), $size, false, '' );
	echo $src[0];
}
add_action( 'get_post_thumbnail_url', 'get_post_thumbnail_url' );

// 自定义菜单
register_nav_menus(
	array(
	'header-menu' => __( '导航自定义菜单' ),
	'footer-menu' => __( '页角自定义菜单' )
	)
);

function get_i18n_meta($postId, $tagname, $issingle,  $i18nflag){

	$language = $_COOKIE['language'];

	$tag = '';
	if($i18nflag){
		$tag = get_post_meta($postId, $language.'_'.$tagname ,$issingle);
	} else {
		$tag = get_post_meta($postId, $tagname, $issingle);
	}
	return $tag;
}

add_action('get_i18n_meta', 'get_i18n_meta');


function get_i18n_content($content){

	$language = $_COOKIE['language'];

	if($language == 'en'){
		//'/<!--\W*Chinese\W*-->([\s|\S]*)<!--\W*EndChinese\W*-->/i'
		preg_match('/<!--\W*EN\W*-->([\s|\S]*)<!--\W*EndEN\W*-->/i', $content, $matches);
		return $matches[1];

	} else {
		preg_match('/<!--\W*ZH\W*-->([\s|\S]*)<!--\W*EndZH\W*-->/i', $content, $matches);
		return $matches[1];

	}
}
add_action('get_i18n_content', 'get_i18n_content');


/*
* 新访问cookie设置(http://www.54ux.com)
*/
function set_language_cookie() {
	if(isset($_GET['language'])){
		setcookie('language', $_GET['language'], time()+1209600, COOKIEPATH, COOKIE_DOMAIN, false);	
	} else if (!isset($_COOKIE['language'])) {
		setcookie('language', 'zh', time()+1209600, COOKIEPATH, COOKIE_DOMAIN, false);
	}
}
//在站点初始化时请用cookie
add_action( 'init', 'set_language_cookie');


// 添加自定义栏目
//add_action('publish_page', 'add_custom_field_automatically');
//add_action('publish_post', 'add_custom_field_automatically');
/*
function add_custom_field_automatically($post_ID) {
    global $wpdb;
    if(!wp_is_post_revision($post_ID)) {
        add_post_meta($post_ID, 'field-name', 'custom value', true);
    }
}
*/




// Add default posts and comments RSS feed links to head.
add_theme_support( 'automatic-feed-links' );

/*
 * Let WordPress manage the document title.
 * By adding theme support, we declare that this theme does not use a
 * hard-coded <title> tag in the document head, and expect WordPress to
 * provide it for us.
 */
add_theme_support( 'title-tag' );

/*
 * Enable support for Post Thumbnails on posts and pages.
 *
 * See: https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
 */
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 825, 510, true );