<?php

/*
  Plugin Name: GK Present Wizard
  Plugin URI: http://www.greateck.com/
  Description: This wordpress plugin creates a wizard approach within your wordpress installation that you can use to allow display of presents based on user demographics
  Version: 1.0.0
  Author: mcfarhat
  Author URI: http://www.greateck.com
  License: GPLv2
 */

/* logout redirect to home page */
add_action('wp_logout',create_function('','wp_redirect(home_url());exit();'));

// adding support for the wizard
//capture post event on the right page
//add_action( 'wp', 'process_wizard' ); 
function process_wizard(){
	if (!is_home() && !is_page('Find Your Perfect Present') &&  !is_user_logged_in()){
		//redirect to home
		wp_redirect(home_url());
		exit();
	}
	//echo "<script>alert('".is_page()."');</script>";
	//if logged in, always move to 2nd page
	if ((is_home() || is_page('Find Your Perfect Present')) &&  is_user_logged_in()){
		//redirect to 2nd wizard step
		wp_redirect(home_url()."/choose-a-type-of-present");
		exit();
	}
	
}

add_filter('the_content','grab_data_steps');


function grab_data_steps(){
	//echo "<script>alert('loggedin:".is_user_logged_in()."');</script>";
	if (! is_user_logged_in()){
		?>
		<script>
				jQuery(document).ready(function(){
				<!-- setting proper header -->
					var x = document.getElementsByTagName('h1')[0];
					x.style.display="block";
					document.getElementById('howto_1').className = "ind_div ind_div_selected";
				});
		</script>
		<div id="main_page_div" class="centered_content">
            <img class="size-full wp-image-179" src="/wp-content/uploads/2016/07/birthday-present1.jpg" alt="default_present" width="160" />
		<br />
		<?php 
		echo do_shortcode("[facebookall_share]");
		?>
		<br />
		<?php
		echo do_shortcode("[facebookall_login]");
		?>
		We ask for name, gender, city and interests to find your present. We never share data.
		</div>
		<br />
		<?php
	}
	else{
		$current_user = wp_get_current_user();
		//grab needed data for querying products
		$user_gender = get_user_meta(get_current_user_id( ), 'gender', true);
		$user_locale = get_user_meta(get_current_user_id( ), 'locale', true);
		$user_age_range_min = get_user_meta(get_current_user_id( ), 'age_range_min', true);
		$user_age_range_max = get_user_meta(get_current_user_id( ), 'age_range_max', true);
		
		//grab any pre-selected presents:
		$previous_present = get_user_meta(get_current_user_id( ), 'perfect_present', true);
		
		//adjusting locale to proper matching
		//for now always set locale to the right one to avoid problems due to facebook limitations with locale
		//if (strpos($user_locale,'US')!=false){
			$user_locale = 'europe-us';
		//}
		
		//adjusting age range to proper matching. Our only options from facebook are as follows:
		//min: enum{13, 18, 21}
		//max: enum{17, 20, or empty}.
		switch($user_age_range_min){
			case '13': $user_age_range="13-to-17";break;
			case '18': $user_age_range="18-to-30";break;
			case '21': $user_age_range="18-to-30";break;
			default: $user_age_range="30-to-50";break;
		}
		//if this is step 2, grab the right info from the user to display the right categories
		if (!isset($_POST['cat_id'])){ // && is_page('Choose a type of present')
			
			//find products by attributes
				// Define Query Arguments
				$args = array( 
					'post_type'				=> 'product',
					'post_status' 			=> 'publish',
					'posts_per_page' 		=> -1,
					'tax_query' 			=> array(
						'relation' => 'AND',
						array(
							'taxonomy' 		=> 'pa_' . 'gender',//$attribute,
							'terms' 		=> $user_gender,//explode(",",$values),
							'field' 		=> 'slug',
							'operator' 		=> 'IN'
						),
						array(
							'taxonomy' 		=> 'pa_' . 'age',//$attribute,
							'terms' 		=> $user_age_range,//explode(",",$values),
							'field' 		=> 'slug',
							'operator' 		=> 'IN'
						),
						array(
							'taxonomy' 		=> 'pa_' . 'location',//$attribute,
							'terms' 		=> $user_locale,//explode(",",$values),
							'field' 		=> 'slug',
							'operator' 		=> 'IN'
						),
					)
				);
				//ob_start();
				$products = new WP_Query( $args );
				$cat_list = array();
				//echo "<script>alert('prods".$products->found_posts."');</script>";
				
				?>
				<script>
				jQuery(document).ready(function(){
				<!-- setting proper header -->
					var x = document.getElementsByTagName('h1')[0];
					x.innerHTML = "Choose a type of Present";
					x.style.display="block";
					document.getElementById('howto_2').className = "ind_div ind_div_selected";
					
				 jQuery("#step2 ul span li").click(function()
				 {
					//alert('clk');
					document.getElementById('cat_id').value = this.id;
					var x = document.getElementsByTagName('h1')[0];
					x.innerHTML = "Searching..";
					
					document.getElementById('finding_txt').style = "display: block;";
					
					setTimeout(function(){ x.innerHTML="Searching..." }, 1000);
					setTimeout(function(){ x.innerHTML="Searching...." }, 2000);
					setTimeout(function(){ x.innerHTML="Searching....." }, 3000);
					setInterval(function(){ tick () }, 1000);
					
					//move after 4 seconds to results page
					setTimeout(function(){ document.getElementById('search_frm').submit();}, 4000);
				 });
				 function fadeItem() {
					jQuery('#step2 ul span li:last').delay(500).fadeOut(fadeItem);
				 }
				 
				 function tick(){
					jQuery('#step2 ul span li:first').animate({'opacity':0}, 200, function () {
						jQuery(this).appendTo(jQuery('#step2 ul span')).css('opacity', 1); 
					});
				 }
				});
				
				
				</script>
				<?php
				echo "<form id='search_frm' method='post'>";
				echo "<input type='hidden' id='cat_id' name='cat_id' value=''>";			
				echo "<div id='step2' class='centered_content' >";
				echo "<ul id='colbased'>";
				echo "<span id='items_span'>";
				while ( $products->have_posts() ){
					$post = $products->the_post();
					$categories =  get_the_terms( get_the_ID(), 'product_cat' );
					if ( $categories && ! is_wp_error( $categories ) ){
						foreach ( $categories as $category ) {
							if (! in_array($category->term_id, $cat_list)){
								array_push($cat_list,$category->term_id);
								echo "<li id=".$category->term_id.">";//onclick='javascript:movestep3();'
								echo $category->name."<br/>";
								echo get_the_post_thumbnail( get_the_ID(), 'thumbnail' );
								echo "</li>";
							}
						}
					}
				}
				echo "</span>";
				echo "</ul>";
				echo "<br />";
				echo "<span id='finding_txt' style='display:none;'><p style='color:black !important;'>We are finding your perfect present</p></span>";
				echo "<br />";
				echo "</div>";
				echo "</form>";
				echo "<div id='breaker' ><br /></div>";
				// Restore original Post Data
				wp_reset_postdata();
		}else if (isset($_POST['cat_id']) && !empty($_POST['cat_id'])){
			//this is results stage, look for a random product while removing the exising product if one was already selected
			//echo "cat_id:".$_POST['cat_id'];
			?>
			<script>
				jQuery(document).ready(function(){
					<!-- setting proper header -->
					var x = document.getElementsByTagName('h1')[0];
					x.innerHTML = "Your Perfect Present is";
					x.style.display="block";
					document.getElementById('howto_3').className = "ind_div ind_div_selected";
				});
			</script>
			<?php
			//preparing to remove old present from list
			$excluded_list = array();
			if (isset($previous_present)){
				$excluded_list[] = $previous_present;
			}
			$args = array( 
					'post_type'				=> 'product',
					'post_status' 			=> 'publish',
					'orderby' 				=> 'rand',
					'posts_per_page' 		=> 1,
					'post__not_in'			=> $excluded_list,
					'tax_query' 			=> array(
						'relation' => 'AND',
						array(
							'taxonomy' 		=> 'pa_' . 'gender',//$attribute,
							'terms' 		=> $user_gender,//explode(",",$values),
							'field' 		=> 'slug',
							'operator' 		=> 'IN'
						),
						array(
							'taxonomy' 		=> 'pa_' . 'age',//$attribute,
							'terms' 		=> $user_age_range,//explode(",",$values),
							'field' 		=> 'slug',
							'operator' 		=> 'IN'
						),
						array(
							'taxonomy' 		=> 'pa_' . 'location',//$attribute,
							'terms' 		=> $user_locale,//explode(",",$values),
							'field' 		=> 'slug',
							'operator' 		=> 'IN'
						),
						array(
							'taxonomy' 		=> 'product_cat',//$attribute,
							'terms' 		=> $_POST['cat_id'],//explode(",",$values),
							'field' 		=> 'id',
							'operator' 		=> 'IN'
						),
					)
				);
				//ob_start();
				$products = new WP_Query( $args );
				//if we did not find any matching items, remove the condition of exluding prior found item
				if ($products->found_posts == 0){
					wp_reset_postdata();
					$args['post__not_in'] =  array();
					$products = new WP_Query( $args );
				}
				while ( $products->have_posts() ){
					$post = $products->the_post();
					echo "<form id='result_frm' method='post' class='centered_content'>";
					echo "<h1 id='perfect_present'>".get_the_title()."</h1>";
					//echo "found product:".get_the_ID();
					//saving this product as the result
					update_user_meta(get_current_user_id( ), 'perfect_present', get_the_ID());
					//update_user_meta(get_current_user_id( ), 'age_range_min', '21');
					//since we only need one
					break;
				}
				
				//display user thumb:
				//echo get_user_meta(get_current_user_id( ), 'thumbnail', true);
				//echo get_avatar( get_current_user_id( ), $size, $default, $alt, $args ); 
				$avatar_code = get_avatar( get_current_user_id( ), 128);
				$present_code = get_the_post_thumbnail( get_the_ID(), array( 128, 128) );
				$final_content = "<div class='centered_content'>";
				$final_content .= $avatar_code; 
				$final_content .= "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
				$final_content .= $present_code;
				$final_content .= "</div>";
				echo $final_content;
				
				?>				
				
				<?php 
				//$description = urlencode($current_user->user_firstname."'s Perfect Present was ".get_the_title().". What will your Perfect Present be? ");
				$caption = urlencode("By analysing your age, gender, and interests, we will find the perfect present for you. You can then share it with others so that they know what you like.");
				//$imgurl = urlencode(wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ));
				
				//https://developers.facebook.com/docs/sharing/reference/feed-dialog/v2.5
				echo "<br />";
				
				// creating image for sharing
				
				$headerurl = get_home_url() ."/wp-content/themes/twentysixteen/dynamic_images/header.jpg";
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
				
				$innerurl = get_home_url() ."/wp-content/themes/twentysixteen/dynamic_images/inner.jpg";
				$inner_img = @imagecreatefromjpeg($innerurl);
				//$header_info = getimagesize($headerurl);
				$inner_img_width = 720;//$header_info[0];
				$inner_img_height = 100;//$header_info[1];
				
				//echo "w:".$user_img_width .">h:".$user_img_height;
				//1200 x 630 
				//600 x 315
				$width = 720;
				$height = 350;
				$prelim_text = $current_user->user_firstname."'s Perfect Present: ";
				$fulltext = $prelim_text.get_the_title();
				$digit_cutoff = 13;
				if (strlen(get_the_title())>$digit_cutoff){
					$find_first_comma = strpos($fulltext, ",");
					//if comma not found, try to find / to split on it
					if (!$find_first_comma){
						$find_first_comma = strpos($fulltext, "/");
					}
					$text1 = substr($fulltext,0,$find_first_comma+1);
					$text2 = substr($fulltext,$find_first_comma+1);
				}else{
					$text1 = $fulltext;
					$text2 = "";
				}
				create_image($text1, 
							$text2,
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
				
								
				$imgurl = get_home_url() ."/wp-content/themes/twentysixteen/dynamic_images/image".get_current_user_id( ).".png?".date("U");
				$description = "By analysing your age, gender, and interests, we will find the perfect present for you. You can then share it with others so that they know what you like.";
				$caption = "By ".$current_user->user_firstname;
				
				//change facebook API
				echo "<a class='btn' target='_blank' href='https://www.facebook.com/dialog/feed?app_id=1667710153469884&amp;display=popup&amp;link=".urlencode(home_url())."&amp;redirect_uri=".home_url()."&amp;picture=".$imgurl."&amp;caption=".$caption."&amp;description=".$description."'><img src='".home_url()."/wp-content/uploads/2015/12/facebook-share-button.png' style='display:inline !important;' ></a> &nbsp; &nbsp;";
				
				//echo "<a class='btn' target='_blank' href='https://www.facebook.com/dialog/feed?app_id=1667710153469884&amp;display=popup&amp;link=".urlencode(home_url())."&amp;redirect_uri=".home_url()."&amp;picture=".$imgurl."&amp;description=".$description."'><img src='".home_url()."/wp-content/uploads/2015/12/facebook-share-button.png' style='display:inline !important;' ></a> &nbsp; &nbsp;";
				echo "<button type='submit' class='research_btn'>Search Again</button>";
				//echo do_shortcode("[facebookall_share]");
				
				echo "<br/>";
				echo "<p style='color:black !important;'>Tell your friends and family about your perfect present. See who is the first to buy it for you.</p>";
				echo "</form>";
				
				//header("Content-Type: image/png");
				//print "<img src=".$imgurl.">";

				//facebook sharing data
				//echo "<meta property='og:description'        content='".$current_user->user_firstname."\'s Perfect Present was ".get_the_title()."' />";wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) )
				wp_reset_postdata();
		}
	}
	//display the howto section
	display_how_to_section();

}

function create_image($description1, $description2, $header_img, $w0, $h0, $user_img, $w1, $h1, $present_img, $w2, $h2, $inner_img, $w3, $h3, $width, $height ){
        $im = @imagecreatetruecolor($width, $height) or die("Cannot Initialize new GD image stream");
        $background_color = imagecolorallocate($im, 255, 255, 255);  // white
		$font_color = imagecolorallocate($im, 12, 89, 207);  // blue
		imagefilledrectangle($im, 0, 0, $width, $height, $background_color);
		$font_file = get_template_directory() . '/HelveticaNw.ttf';
		
		$left_img_padding = 30;
		//bool imagecopy ( resource $dst_im , resource $src_im , int $dst_x , int $dst_y , int $src_x , int $src_y , int $src_w , int $src_h )
		imagecopy($im, $header_img, 0, 0, 0, 0, $w0, $h0);
		imagecopy($im, $user_img, 30, 110, 0, 0, $w1, $h1);
		imagecopy($im, $present_img, $left_img_padding+$w1+20, 110, 0, 0, $w2, $h2);
		imagecopy($im, $inner_img, 0, 110+$h2, 0, 0, $w3, $h3);
		
		//array imagefttext ( resource $image , float $size , float $angle , int $x , int $y , int $color , string $fontfile , string $text [, array $extrainfo ] )
		imagefttext ($im, 14, 0, $left_img_padding+$w1+20+$w2+10, 140, $font_color, $font_file, $description1);//imagestring($im, 5, 20, 20, $description, $font_color);
		
		if (strlen($description2)<30)
			imagefttext ($im, 14, 0, $left_img_padding+$w1+20+$w2+100, 170, $font_color, $font_file, $description2);
		else
			imagefttext ($im, 14, 0, $left_img_padding+$w1+20+$w2+30, 170, $font_color, $font_file, $description2);
        
		imagepng($im,get_template_directory() ."/dynamic_images/image".get_current_user_id( ).".png");
		imagedestroy($user_img);
		imagedestroy($present_img);
        imagedestroy($im);
}

function display_how_to_section(){
	?>
	<br />
	<div class="how_to_div">
		
		<div class="ind_div" id="howto_1"><p><B>1. Login </b><br />Connect with Facebook</p></div>
		<div class="ind_div" id="howto_2"><p><B>2. Search </b><br />We find your perfect present</p></div>
		<div class="ind_div" id="howto_3"><p><B>3. Results </b><br />Share your perfect Present</p></div>
		
	</div>
	<br />
	<?php
}
?>