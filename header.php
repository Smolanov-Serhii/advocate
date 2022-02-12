<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package advocate
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@200;300;400;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Prata&display=swap" rel="stylesheet">
	<?php wp_head(); ?>
</head>
<script>
    window.onload = function () {
        document.body.classList.add('loaded_hiding');
        window.setTimeout(function () {
            document.body.classList.add('loaded');
            document.body.classList.remove('loaded_hiding');
        }, 500);
    }
</script>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div class="preloader">
    <div class="preloader__row">
        <div class="preloader__item"></div>
        <div class="preloader__item"></div>
    </div>
</div>
<div id="page" class="site">
	<header id="header" class="header">
        <div class="header__logo padding-left padding-right">
            <?php
            the_custom_logo();
            ?>
        </div>
        <div class="header__top">
            <div class="header__contacts main-container">
                <div class="header__contacts-item">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M18 8C18 4.69 15.31 2 12 2C8.69 2 6 4.69 6 8C6 12.5 12 19 12 19C12 19 18 12.5 18 8ZM10 8C10 6.9 10.9 6 12 6C13.1 6 14 6.9 14 8C14 8.53043 13.7893 9.03914 13.4142 9.41421C13.0391 9.78929 12.5304 10 12 10C11.4696 10 10.9609 9.78929 10.5858 9.41421C10.2107 9.03914 10 8.53043 10 8ZM5 20V22H19V20H5Z" fill="#4E6488"/>
                    </svg>
                    <span><?php echo the_field('adress', 'options')?></span>
                </div>
                <div class="header__contacts-item">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M20 15.5C18.75 15.5 17.55 15.3 16.43 14.93C16.2542 14.874 16.0664 14.8667 15.8868 14.909C15.7072 14.9513 15.5424 15.0415 15.41 15.17L13.21 17.37C10.3712 15.9262 8.06378 13.6188 6.62 10.78L8.82 8.57C8.95245 8.44434 9.04632 8.28352 9.0906 8.1064C9.13488 7.92928 9.12773 7.7432 9.07 7.57C8.69065 6.41806 8.49821 5.2128 8.5 4C8.5 3.45 8.05 3 7.5 3H4C3.45 3 3 3.45 3 4C3 13.39 10.61 21 20 21C20.55 21 21 20.55 21 20V16.5C21 15.95 20.55 15.5 20 15.5ZM19 12H21C21 9.61305 20.0518 7.32387 18.364 5.63604C16.6761 3.94821 14.3869 3 12 3V5C15.87 5 19 8.13 19 12ZM15 12H17C17 9.24 14.76 7 12 7V9C13.66 9 15 10.34 15 12Z" fill="#4E6488"/>
                    </svg>
                    <a href="tel:<?php echo the_field('telefon_1', 'options')?>"><?php echo the_field('telefon_1', 'options')?></a>
                    <span>;&nbsp</span>
                    <a href="tel:<?php echo the_field('telefon_2', 'options')?>"><?php echo the_field('telefon_2', 'options')?></a>
                </div>
                <div class="header__contacts-item">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M21.75 3.75H2.25C1.83516 3.75 1.5 4.08516 1.5 4.5V19.5C1.5 19.9148 1.83516 20.25 2.25 20.25H21.75C22.1648 20.25 22.5 19.9148 22.5 19.5V4.5C22.5 4.08516 22.1648 3.75 21.75 3.75ZM19.8563 6.30234L12.4617 12.0563C12.2789 12.1992 12.0234 12.1992 11.8406 12.0563L4.44375 6.30234C4.41587 6.28082 4.39541 6.25112 4.38526 6.21739C4.37511 6.18367 4.37576 6.14761 4.38713 6.11427C4.3985 6.08094 4.42002 6.052 4.44867 6.0315C4.47731 6.01101 4.51165 5.99999 4.54688 6H19.7531C19.7883 5.99999 19.8227 6.01101 19.8513 6.0315C19.88 6.052 19.9015 6.08094 19.9129 6.11427C19.9242 6.14761 19.9249 6.18367 19.9147 6.21739C19.9046 6.25112 19.8841 6.28082 19.8563 6.30234Z" fill="#4E6488"/>
                    </svg>
                    <a href="mailto:<?php echo the_field('e-mail', 'options')?>"><?php echo the_field('e-mail', 'options')?></a>
                </div>
            </div>
        </div>
        <div class="header__nav main-container">
            <nav id="site-navigation" class="main-navigation">
                <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'Top-Menu',
                        'menu_id'        => 'top-menu',
                    )
                );
                ?>
            </nav>
        </div>
	</header>
