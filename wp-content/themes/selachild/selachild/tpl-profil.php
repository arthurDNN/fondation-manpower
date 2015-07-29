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
$user = wp_get_current_user();
if($user->ID == 0)
{
	header('location:login');
}
/* 
 * Si l'utilisateur veut changer ses informations personnelles, nous devons faire 
 * un update des champs correspondants
 */
if(!empty($_POST))
{	
	if(!empty($_POST['user_cp']))
	{
		update_user_meta(get_current_user_id(),'user_cp',$_POST['user_cp']);
	}
	if(!empty($_POST['associations']))
	{
		update_user_meta(get_current_user_id(),'association',$_POST['associations']);
	}
}
?>
<!-- Début header -->
<?php get_header(); ?>
<!-- Fin header -->

<?php $selected = get_user_meta(get_current_user_id(),'association',true); ?>

	<h1>Mes infos</h1>
	<div class="single">
		<div class="post">

			<!-- Debut formulaire de modification -->
			<form action = "<?php echo $_SERVER['REQUEST_URI']; ?>" method = "POST">

				<label for = "user_cp">Code postal de votre lieu de travail :</label>
				<input type = "text" name = "user_cp" value = "<?php echo get_user_meta(get_current_user_id(),'user_cp',true); ?>"></br>

				<select name = "associations" value = "voyons" class="associations">
					<option <?php if($selected == 'Association 1'){echo("selected");}?>>Association 1</option>
					<option <?php if($selected == 'Association 2'){echo("selected");}?>>Association 2</option>
					<option <?php if($selected == 'Association 3'){echo("selected");}?>>Association 3</option>
				</select></br>

				<input type = "submit" value = "Modifier">
			</form>
			<!-- Fin formulaire de modification -->

		</div>
	</div>

<!-- Debut footer -->
<?php get_footer(); ?>
<!-- Fin footer -->