<?php

### Array contening all logs. In the futur, make a db for that ?
$aTimeLine = array();

/*

$aTimeLine[] = array(
	'badge' => '',
	'icon' => '',
	'title' => '',
	'date' => '',
	'content' => "");
 */


$aTimeLine[] = array(
	'badge' => 'success',
	'icon' => 'sun-o',
	'title' => 'Météo',
	'date' => '10 janvier 2016',
	'content' => "	<ul>
						<li>Affichage de la ville de résidence</li>
						<li>Géolocalisation de l'utilisateur</li>
					</ul>");

$aTimeLine[] = array(
		'badge' => 'info',
		'icon' => 'wrench',
		'title' => 'Global',
		'date' => '10 janvier 2016',
		'content' => "	<ul>
						<li>Reprise du projet.</li>
						<li>Sauvegarde du short-menu.</li>
						<li>Modification dans la gestion des factures (échéance fournisseur).</li>
					</ul>");


$aTimeLine[] = array(
	'badge' => 'info',
	'icon' => 'user',
	'title' => 'Page mon profil',
	'date' => '29 octobre 2015',
	'content' => "	<ul>
						<li>Création de la page.</li>
						<li>Tableau d'informations.</li>
						<li>Tableau de villes météo.</li>
					</ul>");

$aTimeLine[] = array(
	'badge' => 'info',
	'icon' => 'wrench',
	'title' => 'Changelog',
	'date' => '29 octobre 2015',
	'content' => "	<ul>
						<li>Affichage par défaut des 5 dernières infos.</li>
						<li>Bouton permettant d'afficher les plus anciens.</li>
					</ul>");

$aTimeLine[] = array(
	'badge' => 'info',
	'icon' => 'user',
	'title' => 'Image par défaut',
	'date' => '29 octobre 2015',
	'content' => "Utilisation de l'image par défaut de Gravatar au lieu d'une en local.");

$aTimeLine[] = array(
	'badge' => 'info',
	'icon' => 'wrench',
	'title' => 'Automatisation du changelog',
	'date' => '30 septembre 2015',
	'content' => "Modification du changelog pour automatiser le changement de côté.");

$aTimeLine[] = array(
	'badge' => 'info',
	'icon' => 'user',
	'title' => 'Ajout de Gravatar et documentation',
	'date' => '30 septembre 2015',
	'content' => "<ul>
						<li>Mise à jour de la page <i>À propos</i>.</li>
						<li>Désactivation temporaire de la partie <i>Besoin d'un compte</i></li>
					</ul>");
$aTimeLine[] = array(
	'badge' => 'success',
	'icon' => 'refresh',
	'title' => 'Reprise du projet',
	'date' => 'Fin août - septembre 2015',
	'content' => "<ul>
						<li>Mise à jour de la page <i>À propos</i>.</li>
						<li>Désactivation temporaire de la partie <i>Besoin d'un compte</i></li>
					</ul>");

$aTimeLine[] = array(
	'badge' => 'danger',
	'icon' => 'pause',
	'title' => 'Stand-By',
	'date' => 'Août 2015',
	'content' => "Pour diverses raisons (vacances, études, boulot, ...) le projet a été mis en stand-by.");

$aTimeLine[] = array(
	'badge' => 'success',
	'icon' => 'play-circle',
	'title' => 'Début du projet',
	'date' => 'Juillet - août 2015',
	'content' => "<ul>
						<li>Implémentation d'<b>AdminLTE</b> et création de la partie design.</li>
						<li>Création et mise en place de la partie <b>Gestion des factures</b>.</li>
					</ul>");

?>

<div class="row">
	<div class="col-md-3">
		<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title"><i class="fa fa-code"></i> Développeur</h3>
				<div class="box-tools pull-right">
					<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
				</div>
			</div>
			<div class="box-body table-responsive">
				<table class="table">
					<tbody>
						<tr>
							<td colspan="2" style="text-align:center;">
								<img style="max-width:30%;" src="https://media.licdn.com/media/p/3/005/0ac/0d9/07ca5c6.jpg" class="img-circle" />
							</td>
						</tr>
						<tr>
							<th>Nom</th>
							<td>Gaspard Rosay</th>
						</tr>
						<tr>
							<th>Pseudo</th>
							<td>BananasSplitter</th>
						</tr>
						<tr>
							<th>Contact</th>
							<td><a href="mailto:gaspard@rosay.ch">gaspard@rosay.ch</a></th>
						</tr>
						<tr>
							<th>Web</th>
							<td><a href="http://www.gaspard-rosay.ch">Gaspard's Tech Blog</a></th>
						</tr>
						<tr>
							<th>Twitter</th>
							<td><a href="https://twitter.com/RosayGaspard">@RosayGaspard</a></th>
						</tr>
						<tr>
							<th>GitHub</th>
							<td><a href="https://github.com/GRosay">@GRosay</a></th>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title"><i class="fa fa-cogs"></i> Etat du projet</h3>
				<div class="box-tools pull-right">
					<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
				</div>
			</div>
			<div class="box-body table-responsive">
				<table class="table">
					<tbody>
						<tr>
							<th><i class='fa fa-tachometer'></i> Dashboard</th>
							<td><span class='label label-info'>En attente sur le reste</span></th>
						</tr>
						<tr>
							<th><i class='fa fa-sun-o'></i> Météo</th>
							<td><span class='label label-success'>Terminé</span>
						</tr>
						<tr>
							<th><i class='fa fa-video-camera'></i> Webcam</th>
							<td><span class='label label-warning'>En cours</span></th>
						</tr>
						<tr>
							<th><i class='fa fa-money'></i> Gestion des factures</th>
							<td><span class='label label-success'>Terminé</span></th>
						</tr>
						<tr>
							<th><i class='fa fa-shopping-cart'></i> Liste des courses</th>
							<td><span class='label label-danger'>Pas commencé</span></th>
						</tr>
						<tr>
							<th><i class='fa fa-users'></i> Gestion users</th>
							<td><span class='label label-warning'>En cours</span><p class="help-block">Pour le moment, création de compte seulement par l'admin.</p></th>
						</tr>
						<tr>
							<th><i class='fa fa-tasks'></i> Liste des tâches</th>
							<td><span class='label label-danger'>Pas commencé</span></th>
						</tr>
						<tr>
							<th><i class='fa fa-credit-card'></i> Gestion des garantie</th>
							<td><span class='label label-danger'>Pas commencé</span></th>
						</tr>
						<tr>
							<th><i class='fa fa-desktop'></i> Design</th>
							<td><span class='label label-success'>Terminé</span></th>
						</tr>
						<tr>
							<th><i class='fa fa-globe'></i> Traduction</th>
							<td><span class='label label-primary'>Planifié</span></th>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<div class="col-md-3">
		<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title"><i class="fa fa-terminal"></i> Outils et librairies</h3>
				<div class="box-tools pull-right">
					<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
				</div>
			</div>
			<div class="box-body table-responsive">
				<table class="table">
					<tbody>
						<tr>
							<th>PHP</th>
							<td><span class="badge">Min. 5.3.0</span></th>
						</tr>
						<tr>
							<th>MySQL</th>
							<td><span class="badge">Min. 5.0.0</span></th>
						</tr>
						<tr>
							<th>Bootstrap</th>
							<td><span class="badge">3.3.4</span></th>
						</tr>
						<tr>
							<th>jQuery</th>
							<td><span class="badge">1.11</span></th>
						</tr>
						<tr>
							<th>Gritter</th>
							<td></th>
						</tr>
						<tr>
							<th>Pikaday</th>
							<td></th>
						</tr>
						<tr>
							<th>fineupload</th>
							<td></th>
						</tr>
						<tr>
							<th>AdminLTE</th>
							<td></th>
						</tr>
						<tr>
							<th>Gravatar</th>
							<td></th>
						</tr>
					</tbody>
				</table>
			</div>
		</div>

	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title"><i class="fa fa-wrench"></i> Changelog</h3>
				<div class="box-tools pull-right">
					<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
				</div>
			</div>
			<div class="box-body">
				<h4></h4>


				<ul class="timeline">
					<?php
					$i = 1;
					foreach($aTimeLine as $key => $aContent){
						if($i <= 5){
							echo '
								<li '. ($i % 2 == 0 ? 'class="timeline-inverted"' : null).'>
									<div class="timeline-badge '.$aContent['badge'].'"><i class="fa fa-'.$aContent['icon'].'"></i></div>
									<div class="timeline-panel">
										<div class="timeline-heading">
											<h4 class="timeline-titles">'.$aContent['title'].'</h4>
											<p><small class="text-muted"><i class="glyphicon glyphicon-time"></i> '.$aContent['date'].'</small></p>
										</div>
										<div class="timeline-body">
											'.$aContent['content'].'
										</div>
									</div>
								</li>';

						}
						else{
							echo '

								<li class="li-hidden '. ($i % 2 == 0 ? 'timeline-inverted' : null).'" hidden>
									<div class="timeline-badge '.$aContent['badge'].'"><i class="fa fa-'.$aContent['icon'].'"></i></div>
									<div class="timeline-panel">
										<div class="timeline-heading">
											<h4 class="timeline-titles">'.$aContent['title'].'</h4>
											<p><small class="text-muted"><i class="glyphicon glyphicon-time"></i> '.$aContent['date'].'</small></p>
										</div>
										<div class="timeline-body">
											'.$aContent['content'].'
										</div>
									</div>
								</li>
							';
						}
						$i++;
					}

					echo '</ul>
						<button id="btnReadMore" class="btn btn-info" onClick="fReadMore();">Read more</button>';

					?>
				</ul>
			</div>
		</div>
	</div>
</div>