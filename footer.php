<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package advocate
 */

?>

	<footer id="footer" class="footer wide-container">
		<div class="footer__container">
            <div class="footer__logo">
                <a href="<?php echo home_url(); ?>">
                    <img src="<?php echo get_template_directory_uri()?>/img/logo-footer.svg" alt="">
                </a>
            </div>
            <div class="footer__navigate">
                <div class="footer__main">
                    <div class="footer__title">
                        <?php the_field('napys_menyu', 'options');?>
                    </div>
                    <div class="footer__menu">
                        <?php
                        wp_nav_menu(
                            array(
                                'theme_location' => 'Footer-Menu',
                                'menu_id'        => 'footer-menu',
                            )
                        );
                        ?>
                    </div>
                </div>
                <div class="footer__directions">
                    <div class="footer__title">
                        <?php the_field('napys_galuzi_praktyky', 'options');?>
                    </div>
                    <div class="footer__menu">
                        <?php
                        wp_nav_menu(
                            array(
                                'theme_location' => 'Praktic-Menu',
                                'menu_id'        => 'praktic-menu',
                            )
                        );
                        ?>
                    </div>
                </div>
                <div class="footer__contacts">
                    <div class="footer__title">
                        <?php the_field('napys_kontakty', 'options');?>
                    </div>
                    <div class="footer__params">
                        <div class="footer__contacts-item">
                            <a href="<?php echo home_url(); ?>/#contacts"><?php echo the_field('adress', 'options')?></a>
                        </div>
                        <div class="footer__contacts-item">
                            <a href="tel:<?php echo the_field('telefon_1', 'options')?>"><?php echo the_field('telefon_1', 'options')?></a>
                            <span>;&nbsp</span>
                            <a href="tel:<?php echo the_field('telefon_2', 'options')?>"><?php echo the_field('telefon_2', 'options')?></a>
                        </div>
                        <div class="footer__contacts-item">
                            <a href="mailto:<?php echo the_field('e-mail', 'options')?>"><?php echo the_field('e-mail', 'options')?></a>
                        </div>
                    </div>
                    <div class="footer__socials">
                        <a href="<?php the_field('instagram', 'options');?>" class="footer__socials-item">
                            <img src="<?php echo get_template_directory_uri()?>/img/insta.svg" alt="Інстаграм">
                        </a>
                        <a href="<?php the_field('facebook', 'options');?>" class="footer__socials-item">
                            <img src="<?php echo get_template_directory_uri()?>/img/fb.svg" alt="">
                        </a>
                        <a href="<?php the_field('twitter', 'options');?>" class="footer__socials-item">
                            <img src="<?php echo get_template_directory_uri()?>/img/tw.svg" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
	</footer>
</div>

<?php wp_footer(); ?>

</body>
</html>
