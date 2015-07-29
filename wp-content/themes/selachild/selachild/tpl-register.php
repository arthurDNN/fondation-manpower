<?php
/*
 * Template Name : Inscription
 */ 

// Si un utilisateur est connecté, il se retrouve directement sur son profil
$error = false;
// Si les informations de login sont iccorects, alors l'utilisateur doit réessayer
if(!empty($_POST))
{
	// La variable $d est un peu plus simple à appeler que $_POST
	$d = $_POST;
	// Si l'utilisateur à accepter les conditions d'utilisation, nous commençons le 
	// traitement du formulaire. Sinon nous renvoyons directement un messsage lui 
	// disant d'accepter les conditions d'utilisation $d['charte'] contient 
	// une valeur booléenne correspondant à celle de la checkbox du formulaire d'inscription
	if(!$d['charte'])
	{
		$error = "Veuillez accepter les conditions d'utilisation";
	}
	else
	{
		// Si les deux mots de passes sont différents, nous renvoyons un message d'erreur et nous 
		// arrêtons le traitement du formulaire 
		if($d['user_pass'] != $d['user_pass2'])
		{
			$error = "Les deux mots de passes ne correspondent pas";
		}
		else
		{
			// Nous vérifions que l'email est correct pour continuer le traitement grâce à la fonction 
			// is_email de wordpress
			if(!is_email($d['user_email']))
			{
				$error = "Veuillez rentrer un email valide";
			}
			else
			{
				// Nous vérifions que le code postal contient bien cinq chiffres
				if(!preg_match('#^[0-9]{5}$#',$d['user_cp']))
				{
					$error = "Le code postal doit être composé de cinq chiffres";
				}
				else
				{
					// Toutes les conditions ont été validés donc nous pouvons enregistrer 
					// les données de l'utilisateur grâce à la fonction wp_insert_user().
					// wp_insert_user fait déjà toutes les vérifications dans la BDD 
					// donc on a pas besoin de le faire.
					$user = wp_insert_user(array(
								'user_login' => $d['user_login'],
								'first_name' => $d['first_name'],
								'last_name' => $d['last_name'],
								'user_email' => $d['user_email'],
								'user_pass' => $d['user_pass'], 
								'user_registered' => date('Y-m-j H:m:s')
								));
					// Si l'utilisateur n'a pas pu s'inscrire, on renvoit l'erreur et on l'affiche
					if(is_wp_error($user))
					{
						$error = $user->get_error_message();
					}
					// Une fois l'inscription validée, création des métas.
					else
					{
						// Rajout des métas que si l'utilisateur a bien été inscrit : pour le cp 
						// et pour les associations
						add_user_meta($user, 'user_cp', $d['user_cp']);
						add_user_meta($user, 'association', $d['associations']);
						// Puis nous envoyons un mail afin d'envoyer une confirmation à l'utilisateur
						$msg = "Bonjour,\r\nConfirmez votre inscription en cliquant sur le liens suivant :\r\n
								".site_url()."/index.php/confirmation?login=".urlencode($d['user_login'])."&email=".urlencode($d['user_email']);
						$subject="Confirmation d'inscription";
						if(!mail($d['user_email'] ,$subject ,$msg))
						{
						    $error = "L'envoi du mail de confirmation a échoué mais l'enregistrement à été fait";
						}
						// Login du nouvel utilisateur 
						wp_signon($d);
						//  Suppression des données de l'utilisateur dans la variable intermédiaire 
						$d = array();
						$error = "Un mail de confirmation vous a été envoyé. Vous devez confirmer votre contre 
								  avant de vous authentifier";
						// Redirection de l'utilisateur vers son profil
						//header('location:profil');
					}
				}
			}
		}
	}
}
?>

<!-- Début header -->
<?php get_header(); ?>
<!-- Fin header -->

	<h1>S'inscrire</h1>

	<?php if ($error): ?>
		<div class="error">
			<?php 
				// On affiche le message d'erreur s'il y en a un :
				echo $error; 
			?>
		</div>
	<?php endif ?>

	<!-- Debut formulaire inscription -->
	<form action = "<?php echo $_SERVER['REQUEST_URI']; ?>" method = "POST">
		<label for = "last_name">Votre nom</label>
		<input type = "text" name = "last_name" value = "<?php echo isset($d['last_name']) ? $d['last_name'] : '';?>" id = "last_name"></br>

		<label for = "first_name">Votre prénom</label>
		<input type = "text" name = "first_name" value = "<?php echo isset($d['first_name']) ? $d['first_name'] : '';?>" id = "user_prenom"></br>

		<label for = "user_login">Votre login</label>
		<input type = "text" name = "user_login" value = "<?php echo isset($d['user_login']) ? $d['user_login'] : '';?>" id = "user_login"></br>

		<label for = "user_email">Votre email</label>
		<input type = "email" name = "user_email" value = "<?php echo isset($d['user_email']) ? $d['user_email'] : '';?>" id = "user_email"></br>

		<label for = "user_pass">Votre mot de passe</label>
		<input type = "password" name = "user_pass" id = "user_pass"></br>

		<label for = "user_pass2">Confirmez votre mot de passe</label>
		<input type = "password" name = "user_pass2" id = "user_pass2"></br>

		<label for = "user_cp">Code postal de votre lieu de travail</label>
		<input type = "text" name = "user_cp" value = "<?php echo isset($d['user_cp']) ? $d['user_cp'] : '';?>" id = "user_cp"></br>

		<select name = "associations">
			<option>Association 1</option>
			<option>Association 2</option>
			<option>Association 3</option>
		</select>

		<input type = "checkbox" name = "charte" id = "charte" checked>
		<label for = "charte">J'ai pris connaissance de la <a href = "#">charte</a></label></br>

		<input type = "submit" value = "S'inscrire">
	</form>
	<!-- Fin formulaire inscription -->

<!-- Debut footer -->
<?php get_footer(); ?>
<!-- Fin footer -->