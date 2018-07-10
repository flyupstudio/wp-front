<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ProjectName
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div class="wrapper">
	<!-- #header -->
	<header class="header">
		<div class="container">
			<h1 class="header__title"><?php bloginfo( 'name' ); ?></h1>
			<?php
			$projectname_description = get_bloginfo( 'description', 'display' );
			if ( $projectname_description || is_customize_preview() ) :
				?>
				<h3 class="header__description"><?php echo $projectname_description; /* WPCS: xss ok. */ ?></h3>
			<?php endif; ?>
			<a href="#" class="button header__button">Кнопка для действия</a>
		</div>
		<a href="#about" class="header__link-down"></a>
	</header>
	<div role="main">