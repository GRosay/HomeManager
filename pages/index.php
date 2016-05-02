<?php

	### Récupération localisation user
	$sUserIP = $_SERVER['REMOTE_ADDR'];
	$oJsonGeoIP = file_get_contents('http://geoip.nekudo.com/api/'.$sUserIP);
	$oJsonGeoIP = json_decode($oJsonGeoIP);
	$aGeoIP = objectToArray($oJsonGeoIP);
?>
	<!--<script>
	var time = new Date().getTime();

	function refresh() {
		if (new Date().getTime() - time >= 20000)
			window.location.reload(true);
		else
			setTimeout(refresh, 10000);
	}

	setTimeout(refresh, 10000);
</script>-->
<div class="row">
	<div class="col-md-12">
		<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title"><i class="fa fa-money"></i> Prochaines factures</h3>
				<div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
				</div>
			</div>
			<div class="box-body">
				<table class="table table-condensed">
					<thead>
						<tr>
							<th>
								Fournisseur
							</th>
							<th>
								N° Facture
							</th>
							<th>
								Solde
							</th>
							<th>
								Date d'échéance
							</th>
							<th>
							</th>
						</tr>
					</thead>
					<tbody id='BillList'>
					<script>
						$('#BillList').load('ajax/bill.list.ajax.php?a=refresh&limit=5');
					</script>
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<div class="col-md-4">
		<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title"><i class="fa fa-video-camera"></i> Webcam</h3>
				<div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
				</div>
			</div>
			<div class="box-body">
				<iframe width="100%" height="270px" src="https://www.youtube.com/embed/YH3Nhp0R9t8" frameborder="0" allowfullscreen></iframe>
			</div>
		</div>
	</div>

	<div class="col-md-4">
		<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title"><i class="fa fa-sun-o"></i> Météo actuelle</h3>
				<div class="box-tools pull-right">
					<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
				</div>
			</div>
			<div class="box-body">
				<?php
				$sJsonString = file_get_contents('http://api.openweathermap.org/data/2.5/weather?q='.$aGeoIP['city'].'&units=metric&APPID=ecc79ec89b40448c1c2d1a0bc80e3e3f');
				$oJsonObject = json_decode($sJsonString);
				echo "<p style='text-align:center;'><img style='max-width:98%;max-height:270px;' src='img/icon/" . fGetWeatherIcon($oJsonObject->{'weather'}[0]->{'id'}) . "' /></p>";
				echo "<h1 style='text-align:center;'>" . $oJsonObject->{'main'}->{'temp'} . " °C<small><br /><i class='fa fa-map-marker'></i> ".$aGeoIP['city']."</small></h1>";
				?>
			</div>
		</div>
	</div>

	<div class="col-md-4">
		<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title"><i class="fa fa-sun-o"></i> Météo actuelle</h3>
				<div class="box-tools pull-right">
					<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
				</div>
			</div>
			<div class="box-body">
				<?php
				$sJsonString = file_get_contents('http://api.openweathermap.org/data/2.5/weather?q=Carrouge&units=metric&APPID=ecc79ec89b40448c1c2d1a0bc80e3e3f');
$oJsonObject = json_decode($sJsonString);
echo "<p style='text-align:center;'><img style='max-width:98%;max-height:270px;' src='img/icon/" . fGetWeatherIcon($oJsonObject->{'weather'}[0]->{'id'}) . "' /></p>";
				echo "<h1 style='text-align:center;'>" . $oJsonObject->{'main'}->{'temp'} . " °C<small><br />Carrouge</small></h1>";
?>
			</div>
		</div>
	</div>

</div>

<!--


<div class="col-md-6">
	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title"><i class="fa fa-video-camera"></i> Security cameras</h3>
			<div class="box-tools pull-right">
				<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
			</div>
		</div>
		<div class="box-body">

		</div>
	</div>
</div>


-->


<?php

function fGetWeatherIcon($sCodeMeteo) {
	switch ($sCodeMeteo) {
		case 200:
			$sImage = "clouds-with-lighting-littlerain";
			break;
		case 201:
		case 202:
			$sImage = "clouds-with-lighting-rain";
			break;
		case 210:
			$sImage = "clouds-with-lighting";
			break;
		case 211:
		case 212:
		case 221:
		case 230:
		case 231:
		case 232:
			$sImage = "clouds-with-2lighting.png";
			break;
		case 300:
		case 310:
		case 500:
		case 501:
		case 520:
			$sImage = "clouds-with-littlerain.png";
			break;
		case 301:
		case 302:
		case 311:
		case 312:
		case 313:
		case 314:
		case 321:
		case 502:
		case 503:
		case 504:
		case 521:
		case 522:
		case 531:
			$sImage = "clouds-with-rain.png";
			break;
		case 600:
			$sImage = "clouds-with-littlesnow.png";
			break;
		case 601:
		case 602:
		case 611:
		case 612:
		case 620:
		case 621:
		case 622:
		case 511:
			$sImage = "clouds-with-snow.png";
			break;
		case 615:
		case 616:
			$sImage = "sun-rain-snow-01.png";
			break;
		case 701:
		case 711:
		case 721:
		case 731:
		case 741:
		case 751:
		case 761:
		case 762:
		case 771:
		case 781:
			$sImage = "sun-haze-01.png";
			break;
		case 800:
			$sImage = "sun.png";
			break;
		case 801:
		case 802:
			$sImage = "sun-with-1cloud.png";
			break;
		case 803:
		case 804:
			$sImage = "clouds.png";
			break;
		case 905:
			$sImage = "sun-windy-01.png";
			break;
		default:
			$sImage = "unknown.png";
			break;
	}


	return $sImage;
}

?>