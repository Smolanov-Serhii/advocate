<?php

/**
 * Template Name: Главная страница
 *
 */
get_header();
$post_id = get_the_ID();
?>
<main id="main" class="main">
    <aside id="aside" class="aside">
        <div class="aside__container">
            <div class="wrapper">
                <div class="position">
                    <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'Top-Menu',
                            'menu_id'        => 'left-menu',
                        )
                    );
                    ?>
                    <div class="aside__socials">
                        <a href="<?php the_field('instagram', 'options');?>" class="aside__socials-item">
                            <img src="<?php echo get_template_directory_uri()?>/img/insta.svg" alt="Інстаграм">
                        </a>
                        <a href="<?php the_field('facebook', 'options');?>" class="aside__socials-item">
                            <img src="<?php echo get_template_directory_uri()?>/img/fb.svg" alt="">
                        </a>
                        <a href="<?php the_field('twitter', 'options');?>" class="aside__socials-item">
                            <img src="<?php echo get_template_directory_uri()?>/img/tw.svg" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </aside>
    <section id="banner" class="banner screen screen1">
        <div class="banner__design">
            <img src="<?php echo get_template_directory_uri()?>/img/design-banner.svg" alt="Декорацыя сайта">
        </div>
        <div class="banner__bg">
            <img src="<?php the_field('zobrazhennya_na_fon', $post_id);?>" alt="<?php echo the_field('title'. $post_id);?>">
        </div>
        <div class="banner__content">
            <h2 class="banner__untitle">
                <?php the_field('undertitle', $post_id);?>
            </h2>
            <h1 class="banner__title">
                <?php the_field('title', $post_id);?>
            </h1>
            <?php the_field('subtitle', $post_id);?>
            <div class="banner__button button-stroke">
                <?php the_field('napis_na_knopczi', $post_id);?>
            </div>
        </div>
    </section>
    <section id="about" class="about screen screen2">
        <div class="about__container main-container">
            <h3 class="about__untitle section-untitle">
                <?php the_field('nadzagolovok-about', $post_id);?>
            </h3>
            <h2 class="about__title section-title">
                <?php the_field('zagolovok-about', $post_id);?>
            </h2>
            <div class="about__list">
                <div class="about__item">
                    <div class="about__desc">
                        <?php the_field('persha_kolonka', $post_id);?>
                    </div>
                </div>
                <div class="about__item">
                    <div class="about__desc">
                        <?php the_field('druga_kolonka', $post_id);?>
                    </div>
                </div>
            </div>
            <div class="about__digits">
                <?php
                if( have_rows('czifri', $post_id) ):
                    while( have_rows('czifri', $post_id) ) : the_row();
                        $digit = get_sub_field('czifra-value');
                        $devide = get_sub_field('znak_pyslya_czifri');
                        $desc = get_sub_field('tekst_pyd_czifroyu');
                        ?>
                            <div class="about__digits-item">
                                <div class="digit">
                                    <span class="number" data-num="<?php echo $digit?>"></span><?php echo $devide?>
                                </div>
                                <div class="desc">
                                    <?php echo $desc?>
                                </div>
                            </div>
                        <?php
                    endwhile;
                endif;
                ?>
            </div>
        </div>
    </section>
    <section id="branch" class="branch screen screen3 main-container">
        <div class="branch__image">
            <img src="<?php the_field('zobrazhennya_na_fon-branch', $post_id);?>" alt="<?php the_field('zagolovok-branch', $post_id);?>">
        </div>
        <div class="branch__container">
            <h3 class="branch__untitle section-untitle">
                <?php the_field('nadzagolovok-branch', $post_id);?>
            </h3>
            <h2 class="branch__title section-title">
                <?php the_field('zagolovok-branch', $post_id);?>
            </h2>
            <div class="branch__list">
                <?php
                $counter = 0;
                $class = '';
                $args = array(
                    'post_type' => 'directions',
                    'showposts' => "-1", //сколько показать статей
                    'orderby' => "menu_order", //сортировка по дате
                    'caller_get_posts' => 1);
                $my_query = new wp_query($args);
                if ($my_query->have_posts()) {
                    while ($my_query->have_posts()) {
                        $my_query->the_post();
                        $postpers_id = get_the_ID();
                        $image = get_field('zobrazhennya_na_golovnu', $postpers_id);
                        $counter++;
                        if ($counter > 4){$class='hidden';}
                            ?>
                        <a href="<?php the_permalink();?>" class="branch__item <?php echo $class?>">
                            <div class="branch__image">
                                <img src="<?php echo $image;?>" alt="<?php the_title();?>">
                            </div>
                            <h4 class="branch__item-title">
                                <?php the_title();?>
                            </h4>
                            <div class="branch__item-lnk">
                                Дізнатись більше
                                <svg width="32" height="8" viewBox="0 0 32 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M28.1716 0.464562L31.3536 3.64654C31.5488 3.8418 31.5488 4.15839 31.3536 4.35365L28.1716 7.53563C27.9763 7.73089 27.6597 7.73089 27.4645 7.53563C27.2692 7.34037 27.2692 7.02378 27.4645 6.82852L29.7929 4.5001H0V3.5001H29.7929L27.4645 1.17167C27.2692 0.976407 27.2692 0.659824 27.4645 0.464562C27.6597 0.2693 27.9763 0.2693 28.1716 0.464562Z" fill="#4E6488"/>
                                </svg>

                            </div>
                        </a>
                    <?php
                    }
                }
                wp_reset_query(); ?>
            </div>
            <?php
            if ($counter > 4){
                ?>
                <div class="branch__button">
                    <div class="branch__show button-stroke js-show">
                        Дивитись усі послуги
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </section>
    <section id="pluses" class="pluses screen screen4 main-container">
        <div class="pluses__design">
            <img src="<?php echo get_template_directory_uri()?>/img/design-pluses.svg" alt="Декорацыя сайта">
        </div>
        <div class="pluses__container">
            <h3 class="pluses__untitle section-untitle">
                <?php the_field('nadzagolovok-pluses', $post_id);?>
            </h3>
            <h2 class="pluses__title section-title">
                <?php the_field('zagolovok-pluses', $post_id);?>
            </h2>
            <div class="pluses__list">
                <?php
                if( have_rows('perevagi_spisok', $post_id) ):
                    while( have_rows('perevagi_spisok', $post_id) ) : the_row();
                        $image = get_sub_field('zobrazhennya_perevagi');
                        $title = get_sub_field('zagolovok_perevagi');
                        $desc = get_sub_field('poyasnennya_perevagi');
                        ?>
                        <div class="pluses__item">
                            <div class="pluses__item-icon">
                                <img src="<?php echo $image?>" alt="<?php echo $title?>">
                            </div>
                            <h4 class="pluses__item-title">
                                <?php echo $title?>
                            </h4>
                            <div class="pluses__item-desc">
                                <?php echo $desc?>
                            </div>
                        </div>
                    <?php
                    endwhile;
                endif;
                ?>
            </div>
            <div class="pluses__button">
                <div class="pluses__form button-stroke">
                    Замовити консультацію
                </div>
            </div>
        </div>
    </section>
</main>



<?php get_footer(); ?>
