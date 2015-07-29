<?php
/*
 * Template Name : Confirmation
 */ 
$userinfo = username_exists($_GET['login']);
// Si meta n'existe pas, on le crée, s'il existe 
// on redirige vers le login
if(get_user_meta($userinfo,'confirmation',true) == "confirmer")
{
	header('location:login');
}
elseif (empty($userinfo)) 
{
	header('location:register');
}
else
{
	add_user_meta($userinfo,'confirmation','confirmer');
	$msg = "Bonjour,\r\nVous avez confirmé votre inscription. Vous pouvez vous authentifier en 
			vous rendant à l'adresse suivante :\r\n\r\n<?php echo site_url();?>index.php/login";
					$subject="Inscription confirmée";
	if(!mail($_GET['email'] ,$subject ,$msg))
	{
		$error = "L'envoi du mail de confirmation a échoué";
	}
}
?>
<!-- Début header -->
<?php get_header();?>
<!-- Fin header -->

<h1>Confirmation</h1>
<h5>
	Vous avez confirmé votre compte. Vous pouvez maintenant vous 
	<a href="<?php echo site_url();?>/index.php/login">authentifier</a>
</h5>
<!-- Debut footer -->
<?php get_footer();?>
<!-- Fin footer -->