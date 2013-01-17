<?php
require 'fb-manager.php';
require 'compliments.php';

$compliments = getComplimentsList();
$friends = getFriends();
?>

<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css" media="screen" />
		<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css" media="screen" />
		<link rel="stylesheet" type="text/css" href="assets/css/bootstrap-responsive.css" media="screen" />
		<link rel="stylesheet" type="text/css" href="assets/css/bootstrap-responsive.min.css" media="screen" />
		<script type="text/javascript" src="assets/js/jquery.js"></script>
	    <script type="text/javascript" src="assets/js/jquery.min.js"></script>
	    <script type="text/javascript" src="assets/js/bootstrap.js"></script>
		<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>		

		<script type="text/javascript">
			var compliments = [
				<?php 
					for ($i = 0; $i < count($compliments); $i++) {
						echo "{";
						echo "\"phrase\":\"";
						echo $compliments[$i];
						echo "\"";
						echo "},";
					}
				?>
			];

			var friends = [
				<?php 
					foreach ($friends as $friend) {
						echo '{';
						echo '"name":"'.$friend["name"].'",';
						echo '"profile_img_url":"'.$friend["picture"].'",';
						echo '"profile_id":"'.$friend["id"].'"';
						echo '},';
					};
				?>
			];

		</script>
	</head>

	<style type="text/css">
      body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
      }

      .quote {
        display: inline-block;
        width: 500px;
        height: 180px;
        padding: 19px 20px;
        border: 0px solid #000;
        /*-webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);*/
      }
	  
      .quote .quote-heading {
        margin-bottom: 10px;
      }
	  
	   h1.quote {
        line-height: 1.2;
      }

      .fb-profile-img {
      	display: inline-block;
      	width: 100px;
      	height: 100px;
      	background: white;
      	padding: 5px;
      	border: 1px solid #e5e5e5;
        vertical-align: top;
        margin-top: 50px;
      }

      .container-fluid {
        display: block;
        border: 0px solid #000;
        width: 200%;
        margin: auto;
        overflow: hidden;
      }

      .inner-container {
        margin: auto;
        display: block;
        border: 0px solid #000;
        width: 50%;
        overflow: hidden;
        vertical-align: top;
        float: left;
      }

      .compliment-btn {
        margin-right: 20px;
        cursor: pointer;
      }

      header {
        display: block;
        border: 0px solid #000; 
        width: 700px;
        margin: auto;
      }

      .wrapper {
        width: 680px;
        margin: auto;
        overflow:hidden;
      }

      #logo {
        display: block;
        margin-left: 10px;
      }
      .right {
        float:  right;
      }

      .bttn {
      	font-size: 48px;
      	font-weight: bold;
      }

      .next-btn {
        margin-right: 30px;
        cursor: pointer;
      }
      .btn {
        z-index: 100;
      }

      .bottom-buttons {
        display: block;
        width: 650px;
        margin: auto;
      }
    </style>


	<body>
		<div id="fb-root"></div>
    <script>
    //   window.fbAsyncInit = function() {
    //     // init the FB JS SDK
    //     FB.init({
    //       appId      : '148922615261239', // App ID from the App Dashboard\
    //       status     : true, // check the login status upon init?
    //       cookie     : true, // set sessions cookies to allow your server to access the session?
    //       xfbml      : true  // parse XFBML tags on this page?
    //     });

    //     // Additional initialization code such as adding Event Listeners goes here

    //   };

    //   // Load the SDK's source Asynchronously
    //   // Note that the debug version is being actively developed and might 
    //   // contain some type checks that are overly strict. 
    //   // Please report such bugs using the bugs tool.
    //   (function(d, debug){
    //      var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
    //      if (d.getElementById(id)) {return;}
    //      js = d.createElement('script'); js.id = id; js.async = true;
    //      js.src = "//connect.facebook.net/en_US/all" + (debug ? "/debug" : "") + ".js";
    //      ref.parentNode.insertBefore(js, ref);
    //    }(document, /*debug*/ false));
    </script>
    <header>
      <img src="assets/img/logo.png" id="logo">
    </header>

		<div class="wrapper">
			<div class="container-fluid">			
			    <span class="inner-container cell1">
			        <img class="fb-profile-img" src="">
			  		<span class="quote">
			        	<h1 class="quote"><a class="fb-name" href=""></a>, <span class="compliment"></span></h1>
			        </span>
              <br>
              
			    </span>
			    <span class="inner-container cell2">
			        <img class="fb-profile-img" src="">
			  		<span class="quote">
			        	<h1 class="quote"><a class="fb-name" href=""></a>, <span class="compliment"></span></h1>
			        </span>
              <br>
			    </span>
			</div>
		</div>
    <span class="bottom-buttons">
        <span class="bttn compliment-btn"><img class="happy-face" src="assets/img/face1.png" />Compliment</span>           
        <span class="bttn next-btn"><img class="sad-face" src="assets/img/face3.png" />Next</span>
		</span>
		<script type="text/javascript">
			$(document).ready(function() {
				update_cell($(".cell1"));
				update_cell($(".cell2"));				
				resize_text(".cell1");
				resize_text(".cell2");

				$(".next-btn").click(function() {
					$(".inner-container").css("margin-left",0);
					$(".bttn").hide()
			        $(".cell1").animate({"margin-left":"-100%"}, 500, function() {
			        	$(".bttn").fadeIn()
						$(".container-fluid").append($(".cell1"));
						$(".inner-container").removeClass("cell1 cell2");
						$(".inner-container:first-child").addClass("cell1");									
						$(".inner-container:nth-child(2)").addClass("cell2");

			  			update_cell($(".cell2"));						
						resize_text(".cell2");
					});
				});
				
				$(".compliment-btn").mouseover(function() {
					$(".happy-face").attr("src","assets/img/face2.png");
					$(".compliment-btn").mouseout(function() {
						$(".happy-face").attr("src","assets/img/face1.png")
					});
				});

				$(".next-btn").mouseover(function() {
					$(".sad-face").attr("src","assets/img/face4.png");
					$(".next-btn").mouseout(function() {
						$(".sad-face").attr("src","assets/img/face3.png")
					});
				});			
			});

			function update_cell(cell) {
				var compliment = compliments[Math.floor(Math.random() * compliments.length)];
	        	var friend = friends[Math.floor(Math.random() * friends.length)];

				cell.find(".compliment").html(compliment.phrase);
				cell.find(".fb-profile-img").attr("src", friend.profile_img_url);
				cell.find(".fb-name").html(friend.name);
				cell.find(".fb-name").attr("href","http://www.facebook.com/"+friend.profile_id);
				cell.find(".fb-name").attr("target","_blank");					
				cell.find(".fb-name").data("friend-id",""+friend.profile_id);
			}
			
			function resize_text(cell) {
				var header = $(cell+" h1");
				var inner = $(cell+" .compliment");
				var outer = $(cell+" span.quote");

				if (inner.height() > (parseInt(outer.height() - 60))) {
				  while(inner.height() > (parseInt(outer.height() - 60))) {
					header.css("font-size", (parseInt(header.css("font-size")) - 1) + "px");
				  }
				}
				else if (inner.height() < (parseInt(outer.height() - 60)) && header.css("font-size") < "39px") {
				  while(inner.height() < (parseInt(outer.height() - 60)) && header.css("font-size") < "39px") {
					header.css("font-size", (parseInt(header.css("font-size")) + 1) + "px");
				  }
				}
		  }

		  $(".compliment-btn").click(function () {
           // check if user is logged in:
           var body = $(".fb-name").html() + ", " + $(".compliment").html();
		   var friend_id = $(".fb-name").data("friend-id");	
		   var url = "post.php?friend_id=" + friend_id + "&compliment=" + body;
		   console.log(url)
		   window.location = url;
      });
		</script>
	</body>
</html>