<?php
// Template Name: Game Template
// Version: 1.1.0

?>
<style>
.top-bar, #masthead, .navbar-primary, .woocommerce-breadcrumb{
	display: none;
}
</style>


<style>
		@font-face {
			font-family: Myriad Pro Bold;
		}
		@font-face {
			font-family: Myriad Pro Condensed;
		}
		#fb-present-content-wrapper
		{
			background-color:#374358;
			width:90%;
			text-align:left;
			margin-bottom:30px;
			
			margin-left: auto;
			margin-right: auto;		
			display: flex;
		}
		.fb-present-content-wrapper-sub-full
		{
			/*display:inline-block;*/
			flex:1;
			margin-right:2%;
			width:100%
		}
		
		.fb-present-content-wrapper-sub-half
		{
			/*display: inline-table;*/
			flex: 1;
			width: 48%
		}

		#fb-present-content-wrapper h1
		{
			font-family:Myriad Pro Bold;
		}
		#fb-present-content-wrapper h2
		{
			font-family:Myriad Pro Condensed;
		}
		#fb-content-container-title
		{
			padding-top:30px;
			padding-bottom:30px;
			color:white;
			font-size:28px;
			text-align:center;
		}
		#fb-content-container-left
		{
			width:90%;
			border-radius:15px;
			max-width:1150px;
			background: rgba(255,255,255,1);
			background: -moz-linear-gradient(left, rgba(255,255,255,1) 0%, rgba(246,246,246,1) 47%, rgba(237,237,237,1) 100%);
			background: -webkit-gradient(left top, right top, color-stop(0%, rgba(255,255,255,1)), color-stop(47%, rgba(246,246,246,1)), color-stop(100%, rgba(237,237,237,1)));
			background: -webkit-linear-gradient(left, rgba(255,255,255,1) 0%, rgba(246,246,246,1) 47%, rgba(237,237,237,1) 100%);
			background: -o-linear-gradient(left, rgba(255,255,255,1) 0%, rgba(246,246,246,1) 47%, rgba(237,237,237,1) 100%);
			background: -ms-linear-gradient(left, rgba(255,255,255,1) 0%, rgba(246,246,246,1) 47%, rgba(237,237,237,1) 100%);
			background: linear-gradient(to right, rgba(255,255,255,1) 0%, rgba(246,246,246,1) 47%, rgba(237,237,237,1) 100%);
			filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff', endColorstr='#ededed', GradientType=1 );

			text-align:center;
			vertical-align:middle;
			margin-left: auto;
			margin-right: auto;
		}
		
		#fb-content-container-left img{
			margin-left: auto;
			margin-right: auto;
		}

		#fb-content-container-right
		{

			width:90%;
			border-radius:15px;
			max-width:1120px;
			background-repeat:no-repeat;
			text-align:center;
			vertical-align:middle;
			margin-right: 10%;
			
		}

		#fb-present-image-container
		{
			border-radius:15px;
			background: rgb(255,255,255); /* Old browsers */
			background: -moz-linear-gradient(top,  rgba(255,255,255,1) 0%, rgba(243,243,243,1) 50%, rgba(237,237,237,1) 51%, rgba(255,255,255,1) 100%); /* FF3.6-15 */
			background: -webkit-linear-gradient(top,  rgba(255,255,255,1) 0%,rgba(243,243,243,1) 50%,rgba(237,237,237,1) 51%,rgba(255,255,255,1) 100%); /* Chrome10-25,Safari5.1-6 */
			background: linear-gradient(to bottom,  rgba(255,255,255,1) 0%,rgba(243,243,243,1) 50%,rgba(237,237,237,1) 51%,rgba(255,255,255,1) 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
			filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff', endColorstr='#ffffff',GradientType=0 ); /* IE6-9 */
			text-align:center;
			vertical-align:middle;
			width:50%;
			display:inline-block;
		}
		
		#fb-present-profile{
			width: 160px;
			border: 10px solid #FFFFFD;
			border-radius: 50%;
			max-width: 100%;
			height: 160px;
			box-sizing: border-box;
			z-index: 20;
			margin-top:-25%;
			margin-left:70%;
			box-shadow: 1px 1px 30px black;
		}

		#fb-button-container
		{

			display:inline-block;
			/*width:360px;*/
			width: 100%;
			vertical-align:middle;
			
		}

		.fb-active-button
		{
			border-radius:8px;
			background-position:center top;
			height:70px;
			font-size:28px;
			font-family:Myriad Pro Bold;
			width:360px;	
			color:white;
			margin-bottom:20px;
			border:0px;
		}

		#fb-footer-note
		{
			color:#C6C7CB;
			padding-bottom:40px;
			font-size:22px;
			margin-bottom:30px;
		}
		
		.title_special_txt{
			color:#faa327;
		}
		
		.fball_fbshare{
			width: 100% !important;
			float: none !important;
			text-align: center !important;
		}
		
		
		.gift_result{
			background-size: 260px 260px;
			background-repeat: no-repeat;
			background-position: center;
			height:	250px;
			*/
			padding-top: 40px;
		}
		.gift_result img{
		    border-radius: 5px;
			box-shadow: 2px 2px 40px grey;
		}
		
		.image-cropper {
			width: 100px;
			height: 100px;
			position: relative;
			overflow: hidden;
			border-radius: 50%;
			box-shadow: 1px 1px 30px grey;
			margin-left: 100px;
			margin-top: -50px;
		}
		
		.image-cropper-container{
			margin-left: auto;
			margin-right: auto;
			text-align: center;
			width: 100px;
		}

		img {
			display: inline;
			margin: 0 auto;
			height: 100%;
			width: auto;
		}
		
		.more_presents{
		}
		
		.more_presents, .buy_now, .fbook_share_lnk{
			font-family:Myriad Pro Bold;
			background-size: 100%;
			background-repeat: round;
			border: none;
			display: block;
			color: white;
			font-size: 20px;
			width: 200px;
			margin-left: auto;
			margin-right: auto;
			padding: 10px;
			padding-top: 15px;
		}
		
		.fbook_share_lnk{
			height: 50px;
		}
		
		.buy_now{
		}

		.buy_now:hover, .buy_now:visited, .buy_now:focus{
			color: white;
		}
		
		.more_presents:hover, .more_presents:visited, .more_presents:focus{
			color: white;
		}
		
		
		@media screen and (max-width: 993px){
			#fb-present-content-wrapper{
				display: block;
			}
			.fb-present-content-wrapper-sub-half{
				width: 100%;
			}
		}

		.more_presents:hover, .buy_now:hover{
			background-size: 100%;
			background-repeat: round;			
			border: none;
			color: white;
		}

		.result_msg_container{
			padding-top: 120px;
			color: grey;
			font-family:Myriad Pro Condensed;
			font-size: 16px;
		}

		#silhouette-img-container{
			padding-top: 40px;
			margin-bottom: 40px;
		}

		#play-now{
			margin-bottom: 20px;
		}

		#amazon-img{
			width: 200px;
			margin-left: auto;
			margin-right: auto;
			padding-bottom: 20px;
			padding-top: 10px;
		}

		#result-gift-img-ss-div{
			margin: 30px;
		}
		
		#facebook-connect{
			width: 180px;
		}
		
		#gift-pic-referer{
			padding: 60px;
			padding-bottom: 20px
		}
		
		#padder{
			padding-bottom: 8px;
		}
		
		#colbased{
		    margin-bottom: 0px!important;
		}
		
		#img-loader{
			display: none;
			position: fixed;
			top: 0;
			left: 0;
			bottom: 0;
			background-color: rgba(0, 0, 0, 0.85);
			right: 0;
			width: 100%;
			height: 100%;	
		}

		</style>

<?php
get_header();

//calling main function
grab_data_steps();

//function to display the details of the referring source, along with purchase possibility
function grab_referrer_details(){
	//making sure we got the right params
	if (!empty($_GET['originator_id']) && !empty($_GET['gift_id'])){
		$originator_id = $_GET['originator_id'];
		
		$avatar_code = get_avatar($originator_id, 128);
		$user_info = get_userdata($originator_id);
		$first_name = $user_info->first_name;
		
		$gift_id = $_GET['gift_id'];
		$present_code = get_the_post_thumbnail( $gift_id, array( 180, 180) );
		$present_url = get_post_meta( $gift_id, '_product_url', true );
		$present_title = get_the_title( $gift_id );
		
		$amazon_img_src = "";
		$amazon_img = "<img id='amazon-img' src='".$amazon_img_src."'>";
		
		$final_content = '<div class="fb-present-content-wrapper-sub-half">
			<div id="fb-content-container-title">
					<h1><span class="title_special_txt">'.strtoupper($first_name).'\'S</span><br /> PERFECT PRESENT</h1>
			</div>';
		$final_content .= '<div id="fb-content-container-left" >';
		$final_content .= "<div class='centered_content'>";
		$final_content .= "<div id='gift-pic-referer' class='gift_result'>";
		$final_content .= $present_code;
		
		$final_content .= "<div class='image-cropper-container'>";
		$final_content .= "<div class='image-cropper'>";//or use bootstrap: class="img-circle" on the img tag
		$final_content .= $avatar_code;
		$final_content .= "</div>";
		$final_content .= "</div>";
		$final_content .= "</div>";
		$final_content .= "<div id='gift-text-links'>";
		$final_content .= "<div id='text-links'>".$first_name."'s perfect present is: <br/><b>".$present_title."!</b>";
		$final_content .= "</div>";
		$final_content .= "</div>";
		$final_content .= "</div>";
		
		$final_content .= "<a href='".$present_url."'>".$amazon_img."</a>";
		
		$final_content .= "<a href='/shop/' class='more_presents'>Find Similar</a>";		
		
		$final_content .= "<div id='breaker' ><br /><br /></div>";
		$final_content .= "</div>";
		$final_content .= "<div id='breaker' ><br /></div>";
		$final_content .= "</div><!-- closing sub-main div -->";
		
		echo $final_content;
		
	}
}

function grab_data_steps(){
	//echo "<script>alert('loggedin:".is_user_logged_in()."');</script>";
	/*echo '<header class="entry-header">
		<h1 class="entry-title" style="display: block;">Your Perfect Present</h1>	</header>';*/
		
	$class_id = "fb-present-content-wrapper-sub-full";
	//display 2 portions in case this is a landing screen from a referrer, or this is the results screen
	if ((!empty($_GET['originator_id']) && !empty($_GET['gift_id']))||!empty($_POST['cat_id'])){
		$class_id = "fb-present-content-wrapper-sub-half";
	}
		
	?>
		
	<div id="fb-present-content-wrapper">
		<div class="<?php echo $class_id;?>">
			<div id="fb-content-container-title"> 
					<!-- name--><h1>FIND <span class="title_special_txt">YOUR</span> PERFECT PRESENT</h1>
					<!--end name-->				
			</div>
	
	<script>
		jQuery(document).ready(function($){
			$('.more_presents').click(function (event){ 
				$('#img-loader').css('display','block');
			});
		});
	</script>
	
	<?php	
	if ((! is_user_logged_in()) || (!empty($_GET['originator_id']) && !empty($_GET['gift_id']))){
		?>
				<script>
				jQuery(document).ready(function($){
					$('#play-now').click(function (event){ 
						event.preventDefault();
					<?php if ( is_user_logged_in()){?>
						/* move user to proceed with game */
						//console.log(window.location.href.substr(0,window.location.href.indexOf("?")));
						window.location.href=window.location.href.substr(0,window.location.href.indexOf("?"));
					<?php }else{ ?>
						/* emulate facebook connect */
						$('.fball_login_facebook').click();
					<?php } ?>
					
					});
					
					//change fbook button
					$('.fball_login_facebook').attr('style','background:transparent !important');
					$('.fball_login_facebook').empty();
					$('.fball_login_facebook').html('<img id="facebook-connect" >');
				});
				</script>
				<div id="fb-content-container-left" >
						<div id="fb-button-container"> 
								<!--<input type="button" class="fb-active-button" value="Play Now" style="margin-bottom:110px;"/>-->
								<div id="main-fb-icons" style="margin-bottom:40px;">
								
									<a href='' id='play-now' class='buy_now'>Play Now</a>
									<?php
									echo do_shortcode("[facebookall_login]");
									?>
									<br />
									<?php 
									echo do_shortcode("[facebookall_share]");
									?>
								</div>
						</div>
						<div id="fb-footer-note">We ask for name, gender, city and interests to find your present. We never share data.</div>
				</div>
			</div><!-- closing sub-main div -->
		
		
		
		<?php
		//display referring user data
		grab_referrer_details();
		?>
		
		</div><!-- closing main div -->
		
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
			case '13': $user_age_range="13-17";break;
			case '18': $user_age_range="18-20";break;
			case '21': $user_age_range="21-above";break;
			default: $user_age_range="21-above";break;
		}
		
		$append_breaker = '';
		//if this is step 2, grab the right info from the user to display the right categories
		if (!isset($_POST['cat_id'])){ 
			//find products by attributes
				
				?>
				<script>
				jQuery(document).ready(function($){
				<!-- setting proper header -->
					var x = document.getElementsByTagName('h1')[0];
					// console.log('hello'+x);
					x.innerHTML = 'CHOOSE A <span class="title_special_txt">TYPE</span> OF PRESENT';
					//x.style.display="block";
					
				 jQuery("#step2 ul span li").click(function()
				 {
					$('#img-loader').css('display','block');
					document.getElementById('cat_id').value = this.id;
					document.getElementById('search_frm').submit();
					
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
				echo '<div id="fb-content-container-left" >';
				echo "<form id='search_frm' method='post'>";
				echo "<h2 id='cat-text-head' >Pick a category of presents</h2>";
				$ajax_loader_link = get_template_directory_uri() . '/images/ajax-loader-spin.gif';
				echo '<div id="img-loader">';
				echo '<img id="img-loader-img" src="'.$ajax_loader_link.'" >';
				echo '</div>';
				echo "<input type='hidden' id='cat_id' name='cat_id' value=''>";			
				echo "<div id='step2' class='centered_content' >";
				echo "<ul id='colbased'>";
				echo "<span id='items_span'>";

				$cats_array = ['Fun','Games','Entertainment','Fashion','Sports','Electronics'];
				foreach ( $cats_array as $cat_item ) {
					$term_entry = get_term_by( 'name', $cat_item, 'product_cat' );
					echo "<li id=".$term_entry->term_id.">".$cat_item;
					echo "</li>";
				}
				echo "</span>";
				echo "</ul>";
				echo "<br />";
				echo "<span id='finding_txt' style='display:none;'><p style='color:black !important;'>We are finding your perfect present</p></span>";
				echo "<br />";
				echo "</div>";
				echo "</form>";
				echo "</div>";
				echo "<div id='breaker' ><br /></div>";
				echo "</div><!-- closing sub-main div -->";
				// Restore original Post Data
				//wp_reset_postdata();
		}else if (isset($_POST['cat_id']) && !empty($_POST['cat_id'])){
			//this is results stage, look for a random product while removing the exising product if one was already selected
			//echo "cat_id:".$_POST['cat_id'];
			
			echo '<div id="fb-content-container-left" >';
			?>
			<script>
				jQuery(document).ready(function($){
					<!-- setting proper header -->
					var x = document.getElementsByTagName('h1')[0];
					x.innerHTML = 'YOUR PERFECT <span class="title_special_txt">PRESENT</span> IS:';
					
					//capture search again click and submit form
					$('#search_again').click(function (event){ 
						event.preventDefault();
						$('#result_frm').submit();
					});
				});
			</script>
			<?php
			//store selected category for the user
			update_user_meta(get_current_user_id( ), 'chosen_category', $_POST['cat_id']);
			
			//preparing to remove old present from list
			$excluded_list = array();
			if (isset($previous_present)){
				$excluded_list[] = $previous_present;
			}
			
			$user_country = gk_map_ip_country();
			$available_countries = array('USA','Canada','GB','India','Rest of World');
			$available_country_codes = array('US','CA','GB','IN','ROW');
			//if not one of the values we need to filter with, set as US
			if (!in_array($user_country, $available_country_codes)){
				$user_country = 'US';
			}
			if ($user_country == 'GB'){
				$user_country = 'UK';
			}
			
			$args = array( 
					'post_type'				=> 'product',
					'post_status' 			=> 'publish',
					'orderby' 				=> 'rand',
					'posts_per_page' 		=> 1,
					'post__not_in'			=> $excluded_list,
					//'tag' 					=> array(strtolower($user_gender).$user_age_range),
					'tax_query' 			=> array(
						'relation' => 'AND',
						
						array(
							'taxonomy' 		=> 'pa_gender',//'product_tag',//$attribute,
							'terms' 		=> ucfirst($user_gender),//array(strtolower($user_gender).$user_age_range),//explode(",",$values),
							'field' 		=> 'name',
							'operator' 		=> 'IN',//'IN'
						),
						array(
							'taxonomy' 		=> 'pa_age-groups',//'product_tag',//$attribute,
							'terms' 		=> $user_age_range,//array(strtolower($user_gender).$user_age_range),//explode(",",$values),
							'field' 		=> 'name',
							'operator' 		=> 'IN',//'IN'
						),
						array(
							'taxonomy' 		=> 'product_cat',//$attribute,
							'terms' 		=> $_POST['cat_id'],//explode(",",$values),
							'field' 		=> 'id',
							'operator' 		=> 'IN'
						),
						
						array(
							'taxonomy' 		=> 'pa_country',//'product_tag',//$attribute,
							'terms' 		=> $user_country,//array(strtolower($user_gender).$user_age_range),//explode(",",$values),
							'field' 		=> 'name',
							'operator' 		=> 'IN',//'IN'
						),
						
					)
				);
				//ob_start();
				// echo "args:";
				// print_r($args);
				$products = new WP_Query( $args );
				// echo "found posts:".$products->found_posts;
				//if we did not find any matching items, remove the condition of exluding prior found item
				if ($products->found_posts == 0){
					wp_reset_postdata();
					$args['post__not_in'] =  array();
					$products = new WP_Query( $args );
				}
				$present_id = -1;
				while ( $products->have_posts() ){
					$post = $products->the_post();
					echo "<form id='result_frm' method='post' class='centered_content'>";
					echo "<h1 id='perfect_present'>".get_the_title()."</h1>";
					//echo "found product:".get_the_ID();
					//saving this product as the result
					update_user_meta(get_current_user_id( ), 'perfect_present', get_the_ID());
					$present_id = get_the_ID();
					//update_user_meta(get_current_user_id( ), 'age_range_min', '21');
					//since we only need one
					break;
				}
				
				if ($present_id != -1){
					//display user thumb:
					//echo get_user_meta(get_current_user_id( ), 'thumbnail', true);
					//echo get_avatar( get_current_user_id( ), $size, $default, $alt, $args ); 
					$avatar_code = get_avatar( get_current_user_id( ), 128);
					$present_code = get_the_post_thumbnail( $present_id, array( 180, 180) );
					$final_content = "<div class='centered_content'>";
					$final_content .= "<div class='gift_result'>";
					$final_content .= $present_code;
					
					$final_content .= "<div class='image-cropper-container'>";
					$final_content .= "<div class='image-cropper'>";//or use bootstrap: class="img-circle" on the img tag
					$final_content .= $avatar_code;
					$final_content .= "</div>";
					$final_content .= "</div>";
					$final_content .= "</div>";
					$final_content .= "</div>";
					echo $final_content;
					//$description = urlencode($current_user->user_firstname."'s Perfect Present was ".get_the_title().". What will your Perfect Present be? ");
					$caption = urlencode("By analysing your age, gender, and interests, we will find the perfect present for you. You can then share it with others so that they know what you like.");
					//$imgurl = urlencode(wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ));
					
					//https://developers.facebook.com/docs/sharing/reference/feed-dialog/v2.5
					echo "<br />";
					
					// creating image for sharing
					
					$headerurl = get_home_url() ."/images/header.jpg";
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
					
					$innerurl = get_home_url() ."/images/inner.jpg";
					$inner_img = @imagecreatefromjpeg($innerurl);
					//$header_info = getimagesize($headerurl);
					$inner_img_width = 720;//$header_info[0];
					$inner_img_height = 100;//$header_info[1];
					
					//echo "w:".$user_img_width .">h:".$user_img_height;
					//1200 x 630 
					//600 x 315
					$width = 1200;//720;
					$height = 628;//350;
					$header_text = strtoupper($current_user->user_firstname."'s Present is: ");
					$gift_text = get_the_title();
					$digit_cutoff = 13;
										
					
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
					$caption = "By ".$current_user->user_firstname;
	
					
					echo "<a target='_blank' class='fbook_share_lnk' href='https://www.facebook.com/dialog/feed?app_id=1667710153469884&amp;display=popup&amp;link=".urlencode(home_url()."/fbgame?originator_id=".get_current_user_id( )."&gift_id=".$present_id)."&amp;picture=".$imgurl."&amp;caption=".$caption."&amp;description=".$description."'></a>";
					
					echo "<a href='".get_post_meta( $present_id, '_product_url', true )."' class='buy_now'>Buy Now</a>";
					
					echo "<a href='/shop/' class='more_presents'>See More Presents</a>";
					
					$ajax_loader_link = get_template_directory_uri() . '/images/ajax-loader-spin.gif';
					echo '<div id="img-loader">';
					echo '<img id="img-loader-img" src="'.$ajax_loader_link.'">';
					echo '</div>';
					echo "<a href='' id='search_again' class='more_presents'>Search Again</a>";
					//echo do_shortcode("[facebookall_share]");
					echo "<div id='padder'></div>";
					echo "</form>";
					
					wp_reset_postdata();
				
					echo '</div ><!-- fb-content-container-left -->';
					echo "<div id='breaker' ><br /></div>";
					
					echo '</div><!-- closing sub-main div -->
							<div class="fb-present-content-wrapper-sub-half">
								<div id="fb-content-container-title"> 
										<!-- name--><h1>SHARE YOUR <span class="title_special_txt">GIFT</span>:</h1>
										<!--end name-->				
								</div>';
								
					echo '<div id="fb-content-container-left" >';
										
					echo "<div class='result_msg_container'><p>Tell your friends and family about your perfect present.<br/>See who is the first to buy it for you.</p></div>";
					
					echo "<div id='result-gift-img-ss-div'><img id='result-gift-img-ss-img' src='".get_template_directory_uri() ."/dynamic_images/image".get_current_user_id( ).".png?".date("U")."' ></div>";
					
					//change facebook API
					echo "<a target='_blank' class='fbook_share_lnk' href='https://www.facebook.com/dialog/feed?app_id=1667710153469884&amp;display=popup&amp;link=".urlencode(home_url()."/fbgame?originator_id=".get_current_user_id( )."&gift_id=".$present_id)."&amp;picture=".$imgurl."&amp;caption=".$caption."&amp;description=".$description."'></a> &nbsp; &nbsp;";
					
					echo "<div id='breaker' ><br /><br /><br /><br /></div>";
					
					echo '</div>';
					echo "<div id='breaker' ><br /></div>";
					echo '</div>';
					
				}else{
					$final_content = "<div class='centered_content'><br />There is nothing fun for you in ";
					if( $term = get_term_by( 'id', $_POST['cat_id'], 'product_cat' ) ){
						$final_content .= "'".$term->name."' category";
					}else{
						$final_content .= "the selected category";
					}
					$final_content .= ". Try another category.";
					$final_content .= "<form id='result_frm' method='post' class='centered_content'>";
					$final_content .= "<a href='' id='search_again' class='more_presents'>Search Again</a>";
					$final_content .= "</form>";
					$final_content .= "</div>";
					$final_content .= "<div id='breaker' ><br /></div>";
					$append_breaker = "<div id='breaker' ><br /></div>";
					echo $final_content;
				}
	

		}
		?>
			
		</div><!-- closing main div -->
		<?php
		echo $append_breaker;
	}

}

//adding sharing meta for facebook content customization

add_action('wp_head', 'fbook_open_graph', 5);

function fbook_open_graph(){
	echo "
	<meta property='og:url'                content='".home_url()."' />
	<meta property='og:type'               content='article' />
	<meta property='og:title'             content='Find Your Perfect Present' />
	<meta property='og:site_name'              content='Your Perfect Present' />
	
	<!-- admin specific data -->
	<!--<meta property='fb:admins'              content='' />
	<meta property='og:app_id'              content='1667710153469884' />-->
	<meta property='fb:app_id'              content='1667710153469884' />
	<!-- admin specific data -->
	
	<!--<meta property='og:image'              content='".home_url()."/wp-content/uploads/2015/12/default_present.png' />-->
	<meta property='og:image'              content='".home_url()."/wp-content/themes/electro/dynamic_images/default_share.png' />
	";
	echo "<meta property='og:description'        content='By analysing your age, gender, and interests, we will find the perfect present for you. You can then share it with others so that they know what you like.' />";
	
}

function doctype_opengraph($output) {
    return $output . '
    xmlns:og="http://opengraphprotocol.org/schema/"
    xmlns:fb="http://www.facebook.com/2008/fbml"';
}
add_filter('language_attributes', 'doctype_opengraph');


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

/* end of edits */


?>