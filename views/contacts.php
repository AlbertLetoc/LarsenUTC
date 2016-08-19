<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Larsen UTC - Contacts</title>
	    <link href="views/style.css" rel="stylesheet" />
	    <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBMFzyntK3S-mDScGkBQ-xvZ3UYDHPuh4M"></script>
		<script>
		var myCenter=new google.maps.LatLng(49.4152499,2.8195367);

		function initialize(){
			var mapProp = {
				center:myCenter,
				zoom:9,
				scaleControl:true,
				mapTypeId:google.maps.MapTypeId.ROADMAP
			};
			var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
			
			var marker=new google.maps.Marker({
	  			position:myCenter,
			});

			marker.setMap(map);
			var infowindow = new google.maps.InfoWindow({
	  			content:"BDE-UTC - Larsen <br/>Rue Roger Couttolenc<br/>BP 60301<br/>60203 Compiègne CEDEX<br/>"
	  		});

			google.maps.event.addListener(marker,'click',function() {
				map.setZoom(16);
				map.setCenter(marker.getPosition());
			});


			infowindow.open(map,marker);

		}


		google.maps.event.addDomListener(window, 'load', initialize);
		</script>
    </head>
        
    <body>
        <nav id="primary_nav_wrap">
            <?php include("./views/menu.php");?>
        </nav>

        <h1> Larsen fête ses 30 ans </h1>

        <h3> Contacts </h3>

		<p>N'hésitez pas à nous contacter pour tout renseignement par mail ou par courrier.</p>
		<p>Ancien de Larsen, nous serons RAVIS d'avoir de tes nouvelles et que tu nous racontes ton histoire chez Larsen : qu'y as-tu fait ? Quand ? Comment ? Anecdotes et autres détails croustillants sont les bienvenus ! <br/>
		Nous serons même heureux de te payer une mousse dans nôtre foyer préféré si l'occasion se présente... a toi de la faire se présenter ! ;) </p>


		<div id="mail">
			<a href="mailto:larsen@assos.utc.fr">larsen@assos.utc.fr</a>
		</div>
		<div id="fb">
			<a href="https://www.facebook.com/larsen.utc"> facebook </a>
		</div>
		<div id="adresse">
			BDE-UTC - Larsen <br/>
			Rue Roger Couttolenc<br/>
			BP 60301<br/>
			60203 Compiègne CEDEX<br/>
			FRANCE<br/>

			<div id="googleMap" style="width:500px;height:380px;"></div>
		</div>

        <?php include("./views/footer.php");?>

    </body>
</html>