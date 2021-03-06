<?php
/* 
 * Cette fonction permet de gérer les page en fonction de l'URL 
 * Il renvoi le template correspondant à l'URL demandé
 */
function site_router() 
{
	// Premmière chose : Detection et gestion de l'URL
	$root = str_replace('index.php','',$_SERVER['SCRIPT_NAME']);
	$url = str_replace($_SERVER['SCRIPT_NAME'], '', $_SERVER['REQUEST_URI']);
	$url = explode('/', $url);
	if((count($url) == 2) && $url[1] == 'login')
	{
		require 'tpl-login.php';
		die();
	}
	else if((count($url) == 2) && $url[1] == 'profil')
	{
		require 'tpl-profil.php';
		die();
	}
	else if((count($url) == 2) && $url[1] == 'logout')
	{
		wp_logout();
		header('location:'.$root);
		die();
	}
	else if((count($url) == 2) && $url[1] == 'register')
	{
		require 'tpl-register.php';
		die();
	}
	else if((count($url) == 2) && preg_match("#confirmation#", $url[1]))
	{
		require 'tpl-confirmation.php';
		die();
	}
	else if((count($url) == 2) && $url[1] == 'ajax')
	{
		require 'ajax.php';
		die();
	}
}

// Overide de la fonction worpress afin que site_router soit appelée
add_action( 'send_headers', 'site_router' );

// Suppression de la barre d'administration 
add_filter('show_admin_bar', '__return_false');


// On inclut les scripts JQuery et ceux du thème enfant 
function bbx_enqueue_scripts() 
{ 
	wp_enqueue_script( 'jquery' ); 
	wp_enqueue_script( 'calendar-script', get_stylesheet_directory_uri() . '/js/calendar.js', array(), '20140813', true );
} 
add_action( 'wp_enqueue_scripts', 'bbx_enqueue_scripts' );

?>