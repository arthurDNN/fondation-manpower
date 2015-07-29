<?php
/*
* Template Name : Login
* Description : Le template de login se charge de la connexion des 
* utilisateurs sur la plateforme. Nous utilisont des fonctions déjà intégré 
* dans wordpress afin de réaliser le login : 
* wp_signon($post) : se charge d'effectuer la connexion : renvoi une erreur si la connexion échoue
* wp_get_current_user() : renvoi l'utilisateur courant s'il existe
* is_wp_error() : nous permet de savoir si wordpress a renvoyé une erreur
* get_error_message() : nous renvoie le message d'erreur correspondant afin qu'on puisse l'afficher
* get_header() et get_footer() nous renvoient le reste de la page HTML 
*/ 
$error = false;

/* 
 * Si un utilisateur est connecté, il se retrouve directement sur son profil
 * Si l'ID est différent de 0, il y a bien une session ouverte et donc un utilisateur 
 * connecté
 */ 
$user = wp_get_current_user();
if(($user->ID != 0) && (get_user_meta($user->ID,'confirmation',true) == "confirmer"))
{
	header('location:profil');
}

/* 
 * Si l'utilisateur valide le formulaire, nous essayons d'établir une connexion
 * S'il y a une erreur, nous l'affichons à travers la variable $error 
 * S'il n'y a pas d'erreur, l'utilisateur est redirigé vers son profil 
 */ 
if(!empty($_POST))
{
	// Fonction wordpress qui se charge du login -> pas besoin de le faire manuellement
	$user = wp_signon($_POST);
	// S'il y a une erreur, nous l'affichons grâce à la variable $error à laquelle on affecte
	// le message d'erreur
	if(is_wp_error($user))
	{
		$error = $user->get_error_message();
	}
	// Si les informations de login sont inccorects, alors l'utilisateur doit réessayer
	// sinon il est redirigé vers son profil
	else
	{
		// S'il n'y a pas d'erreur et l'utilisateur est bien connecté, on le renvoi à sa page profil
		if(get_user_meta($user->ID,'confirmation',true) == "confirmer")
		{
			header('location:profil');
		}
		else
		{
			$error = "Vous n'avez pas confirmé votre compte, rendez-vous sur votre boîte mail";
		}
	}
}
/*
 * Nous devons récupérer l'utilisateur courant afin de retourner les informations nécessaires si une 
 * session existe déjà :
 */
else
{
	$user = wp_get_current_user();
	if(($user->ID != 0) && (get_user_meta($user->ID,'confirmation',true) == "confirmer"))
	{
		header('location:profil');
	}
}
?>

<!-- Début header -->
<?php get_header(); ?>
<!-- Fin header -->

	<h1>Se connecter</h1>

	<?php if ($error): ?>
		<div class="error">
			<?php 
				// On affiche le message d'erreur s'il y en a un :
				echo $error; 
			?>
		</div>
	<?php endif ?>

	<!-- Formulaire de login -->
	<form action = "<?php echo $_SERVER['REQUEST_URI']; ?>" method = "POST">

		<label for = "user_login">Votre login</label>
		<input type = "text" name = "user_login" id = "user_login"></br>

		<label for = "user_password">Votre mot de passe</label>
		<input type = "password" name = "user_password" id = "user_password"></br>

		<input type = "checkbox" name = "remember" id = "remember" value = "1">
		<label for = "remember">Se souvenir de moi</label></br>

		<input type = "submit" value = "Se connecter">
	</form>
	<!-- Fin formulaire de login -->

<!-- Debut footer -->
<?php get_footer(); ?>
<!-- Fin footer -->