<?php
/*
 * Template Name : Profil
 * Ce template à pour but de gérer la page personnelle des utilisateurs connectés
 * Leur profil contient les informations utiles et qui concernent l'utilisateur
 * Nous utilisont les metas (update_user_meta, add_user_meta, get_user_meta) pour gérer 
 * les informations de l'utilisateur
 */ 

/* 
 * On récuère l'utilisateur courant puis on affiche ses informations dans le code HTML 
 * si aucune session n'existe, une redirection vers la page login est faite 
 */
require("date.php");

$user = wp_get_current_user();
if($user->ID == 0)
{
	header('location:login');
}

// Mise en place du calendrier
$date = new Date();
$year = date('Y');
$month = date('n');
$dates = $date->get_all($year);
?>

<!-- Début header -->
<?php get_header(); ?>
<!-- Fin header -->

<?php $selected = get_user_meta(get_current_user_id(),'association',true); ?>

	<h1>Mon profil</h1>
	<!-- Début affichage des informations de l'utilisateur -->
	<h3><?php echo $user->user_firstname.' '.$user->user_lastname; ?></h3>
	<h3><?php echo $selected; ?></h3>
	<!-- Fin affichage des informations utilisateur -->

		<div class="single">
		<div class="post">
			<div class = "periode">
				<div class="months">
						<div class="pagination">
						<h1 class="year"><?php echo $year; ?></h1>
						<?php foreach ($date->months as $id => $m): ?>
								<a href = '#' id = 'linkmonth<?php echo $id+1; ?>' class = "page"><?php echo utf8_encode(substr(utf8_decode($m), 0,3)); ?></a>
						<?php endforeach ?>
						</div>
				</div>
				<?php $dates = current($dates); ?>
				<?php foreach ($dates as $m => $days): ?>
					<div class="month" id = "month<?php echo $m; ?>">
						<table class = "monthboxes">
							<thead>
								<tr>
									<?php foreach ($date->days as $d): ?>
										<th class = "weeks"><?php echo substr($d,0,3); ?></th>
									<?php endforeach ?>
								</tr>
							</thead>
							<tbody>
								<tr>
								<?php $end = end($days); foreach ($days as $day => $w): ?>
									<?php if ($day == 1 && $w > 1): ?>
										<td colspan = "<?php echo $w-1; ?>" class = "padding"></td>
									<?php endif ?>
									<td class = "weekdays">
										<span id = "<?php echo $m.'/'.$day.'/'.$w;?>"></span>
										<div class = "relative"><?php echo $day; ?></div>
										<div class = "compteurdepas">
											<input type = 'text' name = 'nbpas' class = 'nbpas'/></br>
											<input type = "submit" name = 'valider' class = 'envoiValeur' value = 'Valider' id = "<?php echo $m.'/'.$day.'/'.'/'.$year.'/'.$w;?>"/>
											<span id = "<?php echo $m.'/'.$day.'/'.'/'.$year.'/'.$w;?>"></span>
										</div>
									</td>
									<?php if ($w == 7): ?>
									</tr><tr>
									<?php endif ?>
								<?php endforeach ?>
								<?php if ($end != 7): ?>
									<td colspan = "<?php echo 7-$end; ?>" class = "padding"></td>
								<?php endif ?>
								</tr>
							</tbody>
						</table>
					</div>
				<?php endforeach ?>
			</div>

		</div>
	</div>
<!-- Debut footer -->
<?php get_footer(); ?>
<!-- Fin footer -->