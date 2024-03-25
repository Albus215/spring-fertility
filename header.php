<?php
/**
 * The main header file.
 *
 * @package Lean
 * @since 1.0.0
 */

use Lean\Load;

$fav_url = get_stylesheet_directory_uri() . '/favicon/';

$hide_header = get_field('layout_hide_header_and_menu_on_this_page');
$customHeaderUse = get_field('layout_use_custom_header');
$customHeader = [];
if ($customHeaderUse) {
	$customHeader = get_field('layout_custom_header');
}

$specific_scripts = get_field('layout_specific_scripts');
$specific_styles = get_field('layout_specific_styles');
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

	<?php if (strpos(get_page_template(), 'egg-hunt') !== false) : ?>
		<link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700,700i,900,900i" rel="stylesheet">
	<?php endif; ?>

	<?php wp_head(); ?>

	<link rel="apple-touch-icon-precomposed" sizes="57x57"
		  href="<?php echo esc_url($fav_url); ?>apple-touch-icon-57x57.png"/>
	<link rel="apple-touch-icon-precomposed" sizes="114x114"
		  href="<?php echo esc_url($fav_url); ?>apple-touch-icon-114x114.png"/>
	<link rel="apple-touch-icon-precomposed" sizes="72x72"
		  href="<?php echo esc_url($fav_url); ?>apple-touch-icon-72x72.png"/>
	<link rel="apple-touch-icon-precomposed" sizes="144x144"
		  href="<?php echo esc_url($fav_url); ?>apple-touch-icon-144x144.png"/>
	<link rel="apple-touch-icon-precomposed" sizes="60x60"
		  href="<?php echo esc_url($fav_url); ?>apple-touch-icon-60x60.png"/>
	<link rel="apple-touch-icon-precomposed" sizes="120x120"
		  href="<?php echo esc_url($fav_url); ?>apple-touch-icon-120x120.png"/>
	<link rel="apple-touch-icon-precomposed" sizes="76x76"
		  href="<?php echo esc_url($fav_url); ?>apple-touch-icon-76x76.png"/>
	<link rel="apple-touch-icon-precomposed" sizes="152x152"
		  href="<?php echo esc_url($fav_url); ?>apple-touch-icon-152x152.png"/>
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo esc_url($fav_url); ?>favicon.ico"/>
	<link rel="icon" type="image/x-icon" href="<?php echo esc_url($fav_url); ?>favicon.ico"/>
	<link rel="icon" type="image/png" href="<?php echo esc_url($fav_url); ?>favicon-196x196.png" sizes="196x196"/>
	<link rel="icon" type="image/png" href="<?php echo esc_url($fav_url); ?>favicon-96x96.png" sizes="96x96"/>
	<link rel="icon" type="image/png" href="<?php echo esc_url($fav_url); ?>favicon-32x32.png" sizes="32x32"/>
	<link rel="icon" type="image/png" href="<?php echo esc_url($fav_url); ?>favicon-16x16.png" sizes="16x16"/>
	<link rel="icon" type="image/png" href="<?php echo esc_url($fav_url); ?>favicon-128.png" sizes="128x128"/>

	<meta name="application-name" content="&nbsp;"/>
	<meta name="msapplication-TileColor" content="#FFFFFF"/>
	<meta name="msapplication-TileImage" content="mstile-144x144.png"/>
	<meta name="msapplication-square70x70logo" content="mstile-70x70.png"/>
	<meta name="msapplication-square150x150logo" content="mstile-150x150.png"/>
	<meta name="msapplication-wide310x150logo" content="mstile-310x150.png"/>
	<meta name="msapplication-square310x310logo" content="mstile-310x310.png"/>
	<meta name="google-site-verification" content="NQzgQvesBboqLBDjjUdm1aORgjGq5h_ZXC_-8XXDIjg"/>

	<?php if (!empty($specific_scripts)) :
		if (strpos($specific_scripts, 'script>') !== false) echo $specific_scripts;
		else echo '<script type="text/javascript" id="spring-page-specific-scripts">' . $specific_scripts . '</script>';
	endif;
	if (!empty($specific_styles)) :
		if (strpos($specific_styles, 'style>') !== false) echo $specific_styles;
		else echo '<style type="text/css" id="spring-page-specific-styles">' . $specific_styles . '</style>';
	endif; ?>

</head>

<body <?php body_class(); ?>>

<?php do_action('lean/before_header'); ?>
<?php Load::organisms('header/popup-cookies'); ?>
<?php if (empty($hide_header) || !$hide_header) : ?>
	<?php Load::organisms('header/popup'); ?>
	<?php Load::organisms('header/home-popover'); ?>
	<?php Load::organisms('nav-primary/nav-primary'); ?>
<?php endif; ?>
<?php if ($customHeaderUse && !empty($customHeader)) : ?>
	<?php Load::organisms('nav-primary/nav-custom', ['nav' => $customHeader]); ?>
<?php endif; ?>
<?php do_action('lean/after_header'); ?>
