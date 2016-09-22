<div class="row links">
	<div class="col-md-12">
		<a href="/larsenUTC/">Accueil</a> > <b>Contact</b>
	</div>
</div>
<div class="splitter">
</div>
<div class="row title">
	<div class="col-md-12">
		<h1>Contact :</h1> N'hésitez pas à nous contacter pour tout renseignement par mail ou par courrier.
	</div>
</div>
<div class="card row">
	<div class="card-content col-md-12">
		Ancien de Larsen, nous serons RAVIS d'avoir de tes nouvelles et que tu nous racontes ton histoire chez Larsen : qu'y as-tu fait ? Quand ? Comment ? Anecdotes et autres détails croustillants sont les bienvenus ! <br/>
		Nous serons même heureux de te payer une mousse dans nôtre foyer préféré si l'occasion se présente... a toi de la faire se présenter ! ;)<br/><br />
		<div id="mail">
			E-mail : <a href="mailto:larsen@assos.utc.fr">larsen@assos.utc.fr</a>
		</div>
		<div id="fb">
			<a href="https://www.facebook.com/larsen.utc">Facebook</a>
		</div>
		<div id="adresse">
			BDE-UTC - Larsen <br/>
			Rue Roger Couttolenc<br/>
			BP 60301<br/>
			60203 Compiègne CEDEX<br/>
			FRANCE<br/>
		</div>
	</div>
</div>
<div id="googleMap" style="width:500px;height:380px; margin: auto;"></div>
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