<?php
	
	class LanguageProperty {

		private static $zh = array(
			'title' => '品味贵阳',
			'hotel'=> '酒店',
			'food' => '美食',
			'sights' => '风景',
			'news' => '最新动态',
			'about_us' => '关于我们',

		);


		private static $en = array(
			'title' => 'GuiYang',
			'hotel'=> 'Hotel',
			'food' => 'Food',
			'sights' => 'Sights',
			'news' => 'News',
			'about_us' => 'About Us',
		);


		public static function getText($label){

			$local = $_COOKIE['language'];
			if($local && $local == 'en') {
				return self::$en[$label];
			} else {
				return self::$zh[$label];
			}
		}

	}

?>