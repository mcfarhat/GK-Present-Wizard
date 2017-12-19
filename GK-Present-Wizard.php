<?php

/*
  Plugin Name: GK Present Wizard
  Plugin URI: http://www.greateck.com/
  Description: This wordpress plugin creates a wizard approach within your wordpress installation that you can use to allow display of presents based on user demographics
  Version: 1.1.0
  Author: mcfarhat
  Author URI: http://www.greateck.com
  License: GPLv2
 */

//making image generation an AJAX function
add_action( 'wp_ajax_gk_generate_gift_image', 'gk_generate_gift_image' );
add_action( 'wp_ajax_nopriv_gk_generate_gift_image', 'gk_generate_gift_image' );

function gk_generate_gift_image() {
	$gift_id = intval( $_POST['gift_id'] );
	
	$current_user = wp_get_current_user();

    // Handle request then generate response using WP_Ajax_Response
	//display user thumb:
	//echo get_user_meta(get_current_user_id( ), 'thumbnail', true);
	//echo get_avatar( get_current_user_id( ), $size, $default, $alt, $args ); 
	$avatar_code = get_avatar( get_current_user_id( ), 128);
	$present_code = get_the_post_thumbnail( $gift_id, array( 180, 180) );
	
	//https://developers.facebook.com/docs/sharing/reference/feed-dialog/v2.5

	// creating image for sharing
	
	$headerurl = get_home_url() ."/wp-content/themes/electro/dynamic_images/header.jpg";
	$header_img = @imagecreatefromjpeg($headerurl);
	$header_info = getimagesize($headerurl);
	$header_img_width = 720;//$header_info[0];
	$header_img_height = 100;//$header_info[1];
	
	$present_url_right = substr($present_code, strpos($present_code, 'src')+5);
	$present_url = substr($present_url_right, 0, strpos($present_url_right, '"'));				
	
	//$present_img = @imagecreatefromjpeg(wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ));
	//$image_info = getimagesize(wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ));
	$present_img = @imagecreatefromjpeg($present_url);
	$image_info = getimagesize($present_url);
	$present_img_width = $image_info[0];
	$present_img_height = $image_info[1];
	
	$avatar_url_right = substr($avatar_code, strpos($avatar_code, 'src')+5);
	$avatar_url = substr($avatar_url_right, 0, strpos($avatar_url_right, '"'));
	
	//echo "url::::".$avatar_url_right.">>>".$avatar_url;
	
	$user_img = @imagecreatefromjpeg($avatar_url);
	$second_image_info = getimagesize(get_avatar_url( get_current_user_id( )));
	$user_img_width = 150;//$second_image_info[0];
	$user_img_height = 150;//$second_image_info[1];
	
	$innerurl = get_home_url() ."/wp-content/themes/electro/dynamic_images/inner.jpg";
	$inner_img = @imagecreatefromjpeg($innerurl);
	//$header_info = getimagesize($headerurl);
	$inner_img_width = 720;//$header_info[0];
	$inner_img_height = 100;//$header_info[1];
	
	//echo "w:".$user_img_width .">h:".$user_img_height;
	//1200 x 630 
	//600 x 315
	$width = 1200;//720;
	$height = 628;//350;
	$header_text = strtoupper($current_user->user_firstname."'s Perfect Present is: ");
	$gift_text = get_the_title($gift_id);
	$digit_cutoff = 13;
	/*if (strlen(get_the_title())>$digit_cutoff){
		$find_first_comma = strpos($fulltext, ",");
		//if comma not found, try to find / to split on it
		if (!$find_first_comma){
			$find_first_comma = strpos($fulltext, ":");
		}
		if ($find_first_comma < $digit_cutoff - 1){
			$find_first_comma = $digit_cutoff - 1;
		}
		$text1 = substr($fulltext,0,$find_first_comma+1);
		$text2 = substr($fulltext,$find_first_comma+1);
	}else{
		$text1 = $fulltext;
		$text2 = "";
	}
	*/
	
	
	create_image($header_text, 
				$gift_text,
				$header_img,
				$header_img_width,
				$header_img_height,
				$user_img, 
				$user_img_width,
				$user_img_height,
				$present_img,
				$present_img_width,
				$present_img_height,
				$inner_img,
				$inner_img_width,
				$inner_img_height,
				$width,
				$height);
	
					
	$imgurl = get_home_url() ."/wp-content/themes/electro/dynamic_images/image".get_current_user_id( ).".png?".date("U");
	$description = "By analysing your age, gender, and interests, we will find the perfect present for you. You can then share it with others so that they know what you like.";
	$caption = "YOURPERFECTPRESENT.COM By ".$current_user->user_firstname;
	
	echo ("<a id='gift-print".$gift_id."' target='_blank' href='https://www.facebook.com/dialog/feed?app_id=773738489429577&amp;display=popup&amp;link=".urlencode(home_url()."/fbgame?originator_id=".get_current_user_id( )."&gift_id=".$gift_id)."&amp;picture=".$imgurl."&amp;caption=".$caption."&amp;description=".$description."'></a>");//<img src='".home_url()."/wp-content/uploads/2015/12/facebook-share-button.png' style='display:inline !important;' >
	die();
}

if ( !function_exists( 'create_image' ) ){
function create_image($description1, $description2, $header_img, $w0, $h0, $user_img, $w1, $h1, $present_img, $w2, $h2, $inner_img, $w3, $h3, $width, $height ){
        $im = @imagecreatetruecolor($width, $height) or die("Cannot Initialize new GD image stream");
        $background_color = imagecolorallocate($im, 255, 255, 255);  // white
		$font_color = imagecolorallocate($im, 12, 89, 207);  // blue
		
		$new_font_file = get_template_directory() . '/fbgame-fonts/MyriadPro-Bold.otf';
		
		$white = imagecolorallocate($im, 255, 255, 255);
		
		$orange = imagecolorallocate($im, 251, 163, 40);
		
		imagefilledrectangle($im, 0, 0, $width, $height, $background_color);
		$font_file = get_template_directory() . '/HelveticaNw.ttf';
		
		$left_img_padding = 30;
		//bool imagecopy ( resource $dst_im , resource $src_im , int $dst_x , int $dst_y , int $src_x , int $src_y , int $src_w , int $src_h )
		//bool imagecopyresampled ( resource $dst_image , resource $src_image , int $dst_x , int $dst_y , int $src_x , int $src_y , int $dst_w , int $dst_h , int $src_w , int $src_h )
		
		
		$full_url = get_template_directory_uri().'/dynamic_images/new_share_v2-2.jpg';
		$full_background = @imagecreatefromjpeg($full_url);
		//create background full image
		imagecopy($im, $full_background, 0, 0, 0, 0, $width, $height);
		
		//create gift image
		//imagecopy($im, $present_img, $left_img_padding+$w1, 140, 0, 0, $w2, $h2);
		imagecopyresampled($im,$present_img,$left_img_padding+$w1+10,250,0,0,300,300,$w2, $h2);
		
		//imagecopy($im, $header_img, 0, 0, 0, 0, $w0, $h0);
		
		//create user circular image
		//circular image code reference: http://stackoverflow.com/questions/9880503/crop-image-in-circle-php
		$newwidth = $w1;
		$newheight = $h1;
		$circle_user_image = imagecreatetruecolor($newwidth, $newheight);
		imagealphablending($circle_user_image,true);
		imagecopyresampled($circle_user_image,$user_img,0,0,0,0,$newwidth,$newheight,$w1,$h1);
		// create masking
		//$mask = imagecreatetruecolor($width, $height);
		$mask = imagecreatetruecolor($newwidth, $newheight);

		$transparent = imagecolorallocate($mask, 255, 0, 0);
		imagecolortransparent($mask, $transparent);
		imagefilledellipse($mask, $newwidth/2, $newheight/2, $newwidth, $newheight, $transparent);


		$red = imagecolorallocate($mask, 0, 0, 0);
		imagecopymerge($circle_user_image, $mask, 0, 0, 0, 0, $newwidth, $newheight,100);
		imagecolortransparent($circle_user_image, $red);
		imagefill($circle_user_image,0,0, $red);
		
		imagecopy($im, $circle_user_image, $left_img_padding+$w1+208, 450, 0, 0, $w1, $h1);
		
		
		//imagecopy($im, $inner_img, 0, 110+$h2, 0, 0, $w3, $h3);
		
		//array imagefttext ( resource $image , float $size , float $angle , int $x , int $y , int $color , string $fontfile , string $text [, array $extrainfo ] )
		imagefttext ($im, 28, 0, 250, 70, $white, $new_font_file, $description1);//imagestring($im, 5, 20, 20, $description, $font_color);
		
		if (strlen($description2)<30)
			imagefttext ($im, 28, 0, 400, 140 ,$orange, $new_font_file, $description2);//$left_img_padding+$w1+20+150+200
		else
			imagefttext ($im, 28, 0, 300, 140 ,$orange, $new_font_file, $description2);//$left_img_padding+$w1+20+150+200
        
		
		//adding button text
		$current_user = wp_get_current_user();
		$user_fname = $current_user->user_firstname;
		// $user_fname = "Timmyuoiiuui";
		$buy_text = "Buy For ".$user_fname;
		$user_indent = 0;
		if (strlen($user_fname)<5)
			$user_indent = 50;
		elseif (strlen($user_fname)<8)
			$user_indent = 20;
		elseif (strlen($user_fname)>=10)
			$user_indent = -10;
		
		imagefttext ($im, 28, 0, 650+$user_indent, 320 ,$white, $new_font_file, $buy_text);
		
		imagepng($im,get_template_directory() ."/dynamic_images/image".get_current_user_id( ).".png");
		imagedestroy($user_img);
		imagedestroy($present_img);
        imagedestroy($im);
		
		
		imagedestroy($circle_user_image);
		imagedestroy($mask);
}
}
?>