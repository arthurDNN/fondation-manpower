<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <main id="main">
 *
 * @package Sela
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<header id="masthead" class="site-header" role="banner">
		<a class="skip-link screen-reader-text" href="#content" title="<?php esc_attr_e( 'Skip to content', 'sela' ); ?>"><?php _e( 'Skip to content', 'sela' ); ?></a>

		<div class="site-branding">
			<?php sela_the_site_logo(); ?>
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<?php if ( '' != get_bloginfo( 'description' ) ) : ?>
			<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
			<?php endif; ?>
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation" role="navigation">
			<button class="menu-toggle" aria-controls="menu" aria-expanded="false"><?php _e( 'Menu', 'sela' ); ?></button>
			
			<a href = "<?php echo bloginfo('url'); ?>" class="logo">	
			</a>
			<a href = "<?php echo bloginfo('url'); ?>" class="bouton-marche">j'ai marché!	
			</a>
			
			<div class="menu">
				<div class="social">
				
					<a href = "<?php echo bloginfo('url'); ?>" class="block-social">Accueil</a>
					<a href = "<?php echo bloginfo('url'); ?>/fondation/reglement/" class="block-social">Règlement</a>
					<a href = "<?php echo bloginfo('url'); ?>/fondation/projet/" class="block-social">Projets</a>
					<?php $user = wp_get_current_user(); ?>
					<?php if ($user->ID == 0): ?>
					<a href = "<?php echo bloginfo('url'); ?>/index.php/login" class="block-social login">Se connecter </a>
					<a href = "<?php echo bloginfo('url'); ?>/index.php/register" class="block-social register">S'inscrire</a>
								
					<?php else: ?>
					<a href = "<?php echo bloginfo('url'); ?>/index.php/profil" class="block-social" >Mon profil</a>
					<a href = "<?php echo bloginfo('url'); ?>/index.php/logout" class="block-social" >Se déconnecter</a>
					<?php endif ?>
					
				</div>
			</div>		
		</nav><!-- #site-navigation -->
		<?php if ($user->ID != 0): ?>
        <div class="error">
                Salut <?php echo $user->user_login; ?>
        </div>
    	<?php endif ?>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
