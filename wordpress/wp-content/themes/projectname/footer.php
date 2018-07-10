<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ProjectName
 */

?>

	</div><!-- #content -->

	<footer class="footer">
		<div class="ques-section">
			<div class="container">	
				<div class="ques-section__header">
					<div class="title">Возникли вопросы?</div>						
				</div>	
				<div class="ques-section__content">
					<div class="ques-section__text">	
						<p><a href="mailto:info@example.com">info@example.com</a></p>
						<p><a href="tel:+38 (044) 555-44-33">+38 (044) 555-44-33</a></p>
						<p>telegram-channel</p>
						<p>facebook-profile</p>
					</div>	
					<div class="ques-section__form">
						<form class="ques-section__fm" action="#">
							<div class="ques-section__fluid"><input class="ques-section__input" placeholder="E-mail" type="email"></div>
							<div class="ques-section__fluid"><textarea class="ques-section__textarea" placeholder="Текст сообщения" name="message" cols="30" rows="10"></textarea></div>
							<div class="ques-section__fluid__bt"><input class="ques-section__button" type="submit" value="BUTTON" ></div>
						</form>
					</div>	
				</div>
			</div>
		</div>					
		<div class="map-section">
			<?php
			$map_scale = get_field('map_scale'); 	
			$map_lat = get_field('map_lat'); 	
			$map_lng = get_field('map_lng'); 	
			$map_icon = get_field('map_icon'); 	
			if ($map_lat && $map_lat):
				if (!$map_scale) {$map_scale=16;}
				if( empty($map_icon) ){
					$map_icon = get_template_directory_uri() . '/assets/bundle/images/placemark.png';
				}else{
					$map_icon = $map_icon['url'];
				}		
			?>
			<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB970Jl3_xANObC8nXwFBs90lpUp58kELQ&callback=initMap" async defer></script>
			<script type="text/javascript">
				function initMap() {
					var latlng = new google.maps.LatLng(<?=$map_lat?>, <?=$map_lng?>);
					var settings = {
						zoom: <?=$map_scale?>,
						center: latlng,
						mapTypeControl: true,
						mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU},
						navigationControl: true,
						navigationControlOptions: {style: google.maps.NavigationControlStyle.SMALL},
						mapTypeId: google.maps.MapTypeId.ROADMAP};
					var map = new google.maps.Map(document.getElementById("map_canvas"), settings);
					var contentString = '<div id="content">'+
						'<div id="siteNotice">'+
						'</div>'+
						'<h1 id="firstHeading" class="firstHeading">Hogenhaug</h1>'+
						'<div id="bodyContent">'+
						'<p>Сайт turvisa.com.ua</p>'+
						'</div>'+
						'</div>';
					var infowindow = new google.maps.InfoWindow({
						content: contentString
					});

					var mapIcon = new google.maps.MarkerImage('<?=$map_icon?>',
						new google.maps.Size(112,110),
						new google.maps.Point(0,0),
						new google.maps.Point(50,50)
					);				
					
					var labelPos = new google.maps.LatLng(<?=$map_lat?>, <?=$map_lng?>);

					var companyMarker = new google.maps.Marker({
						position: labelPos,
						icon: mapIcon,									
						map: map,
						zIndex: 3,
						fontColor: "#ffffff",
					});								
				}
			</script>				
			<div class="map_canvas" id="map_canvas" style="width:100%; height:368px"></div>
			<?php
			endif;
			?>			
		</div>	
	</footer>

</div><!-- #wrapper -->

<?php wp_footer(); ?>

</body>
</html>
