<?php require_once 'config/init.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<!DOCTYPE html>
<head>
<html lang="en">
	
	<meta charset="utf-8">
	
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<link rel="stylesheet" href="stylesheets/base.css">
	<link rel="stylesheet" href="stylesheets/skeleton.css">
	<link rel="stylesheet" href="stylesheets/layout.css">

	<link rel="shortcut icon" href="images/D2Wlogo.jpg">
	<link rel="apple-touch-icon" href="images/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">

			<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBPgGoEmvBi6s6S5nRjIizP5wyOzBOFsh4&sensor=false">
			</script>

			<script>
			var myCenter=new google.maps.LatLng(52.065456,-0.81735);

			function initialize()
			{
			var mapProp = {
			  center:myCenter,
			  zoom:13,
			  //mapTypeId:google.maps.MapTypeId.ROADMAP
			  styles: [
						    {
						        "featureType": "all",
						        "stylers": [
						            {
						                "saturation": -100
						            },
						            {
						                "gamma": 0.5
						            }
						        ]
						    }
						],
			  
			  };
			var map=new google.maps.Map(document.getElementById("googleMap_d2wlocation"),mapProp);
						
			var marker=new google.maps.Marker({
			  position:myCenter,
			  });

			marker.setMap(map);
			}

			google.maps.event.addDomListener(window, 'load', initialize);
			</script>

			<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

			<script type="text/javascript" src="js/jquery-1.2.6.min.js"></script>

				<script type="text/javascript"> //slideshow

				function slideSwitch() {
				    var $active = $('#slideshow IMG.active');

				    if ( $active.length == 0 ) $active = $('#slideshow IMG:last');

				    // use this to pull the images in the order they appear in the markup
				    var $next =  $active.next().length ? $active.next()
				        : $('#slideshow IMG:first');

				    $active.addClass('last-active');

				    $next.css({opacity: 0.0})
				        .addClass('active')
				        .animate({opacity: 1.0}, 1000, function() {
				            $active.removeClass('active last-active');
				        });
				}

				$(function() {
				    setInterval( "slideSwitch()", 5000 );
				});

				</script>

				<script> //script to convert jason using jquery
				$(document).ready(function (){
				    $("#button1").click(function(){       
				        /* set no cache */
				        $.ajaxSetup({ cache: false });
				 
				        $.getJSON("encodejson.php", function(data){
				            var html = [];
				 
				            /* loop through array */
				            $.each(data, function(index, d){           
				                html.push(
				                          "Vinyl: ", d.vinyl, "<br>",
				                          "Produces: ", d.produces, "<br>",
				                          "Suitable For: ", d.suitable_for, "<br>",
				                          "Available In: ", d.available_in, "<br><br><br>");
				            });
				 
				 
				            $("#div1").html(html.join(''));
				        }).error(function(jqXHR, textStatus, errorThrown){ /* assign handler */
				            /* alert(jqXHR.responseText) */
				            alert("error occurred!");
				        });
				    });
				});
				</script>

</head>
<body>

<div class="container">
		<div class="three columns">
			<a href="index.php"><img src="images/D2Wlogo.jpg" width="60%" text-align="center"></a>
		</div>
		<div class="eleven columns">
			<h2  class="remove-bottom" style="margin-top: 10px">D2W</h2>
			<h5>Embroidery & Print Specialists</h5>
		</div>
		
		<div class="remove-bottom" style="margin-top: 10px" id="login" class="four columns">
			<ul>
				<?php
				
				$user = new user();

				if($user->isLoggedIn()) {
					?>
					
					<p>Hello <a href="profile.php?user=<?php echo escape($user->data()->username); //displays users username grabbed from DB ?>"><?php echo escape($user->data()->username); ?></a>!</p> 
					
					<a href="logout.php">Log out</a>
	

					<?php

					if($user->hasPermission('admin')) {  //checks if user loggin in has the admin property
					?>
						<p>you are logged in as admin</p>
					<?php
					}

				} else {
					echo 	'<li><a href="login.php">log in</a></li>
							<li><a href="register.php">register</a></li>';
				} 
				?>
		</ul>
		
		</div>
		<div class="sixteen columns">
		<hr />
		</div>
		

		
		