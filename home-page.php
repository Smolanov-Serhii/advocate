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
            <picture>
                <source srcset="<?php echo get_template_directory_uri()?>/img/design-banner.svg" media="(min-width: 1024px)">
                <img src="<?php echo get_template_directory_uri()?>/img/baner-design-mob.svg" alt="<?php echo the_field('title'. $post_id);?>">
            </picture>
        </div>
        <div class="banner__bg">
            <img src="<?php the_field('zobrazhennya_na_fon', $post_id);?>" alt="<?php echo the_field('title'. $post_id);?>">
        </div>
        <div class="banner__content">
            <h2 class="banner__untitle" data-aos="fade-right" data-aos-delay="100">
                <?php the_field('undertitle', $post_id);?>
            </h2>
            <h1 class="banner__title" data-aos="fade-right" data-aos-delay="300">
                <?php the_field('title', $post_id);?>
            </h1>
            <h3 class="banner__subtitle" data-aos="fade-right" data-aos-delay="500">
                <?php the_field('subtitle', $post_id);?>
            </h3>

            <div class="banner__button button-stroke js-form" data-aos="fade-right" data-aos-delay="700">
                <?php the_field('napis_na_knopczi', $post_id);?>
            </div>
        </div>
    </section>
    <section id="about" class="about screen screen2">
        <div class="about__container main-container">
            <h3 class="about__untitle section-untitle" data-aos="fade-right" data-aos-delay="100">
                <?php the_field('nadzagolovok-about', $post_id);?>
            </h3>
            <h2 class="about__title section-title" data-aos="fade-right" data-aos-delay="300">
                <?php the_field('zagolovok-about', $post_id);?>
            </h2>
            <div class="about__list">
                <div class="about__item" data-aos="fade-right" data-aos-delay="500">
                    <div class="about__desc">
                        <?php the_field('persha_kolonka', $post_id);?>
                    </div>
                </div>
                <div class="about__item" data-aos="fade-left" data-aos-delay="500">
                    <div class="about__desc">
                        <?php the_field('druga_kolonka', $post_id);?>
                    </div>
                </div>
            </div>
            <div class="about__digits">
                <?php
                if( have_rows('czifri', $post_id) ):
                    $daley = 100;
                    while( have_rows('czifri', $post_id) ) : the_row();
                        $digit = get_sub_field('czifra-value');
                        $devide = get_sub_field('znak_pyslya_czifri');
                        $desc = get_sub_field('tekst_pyd_czifroyu');
                        ?>
                            <div class="about__digits-item" data-aos="fade-up" data-aos-delay="<?php echo $daley?>>">
                                <div class="digit">
                                    <span class="number" data-num="<?php echo $digit?>"></span><?php echo $devide?>
                                </div>
                                <div class="desc">
                                    <?php echo $desc?>
                                </div>
                            </div>
                        <?php
                        $daley = $daley + 300;
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
            <h3 class="branch__untitle section-untitle" data-aos="fade-right" data-aos-delay="100">
                <?php the_field('nadzagolovok-branch', $post_id);?>
            </h3>
            <h2 class="branch__title section-title" data-aos="fade-right" data-aos-delay="300">
                <?php the_field('zagolovok-branch', $post_id);?>
            </h2>
            <div class="branch__list" data-aos="fade-up" data-aos-delay="500">
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
                    <div class="branch__show button-stroke js-form">
                        <?php the_field('napys_dyvytys_usi_poslugy', 'options');?>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </section>
    <section id="pluses" class="pluses screen screen4 main-container">
        <div class="pluses__design">
            <picture>
                <source srcset="<?php echo get_template_directory_uri()?>/img/design-banner.svg" media="(min-width: 1024px)">
                <img src="<?php echo get_template_directory_uri()?>/img/baner-design-mob.svg" alt="<?php the_field('zagolovok-pluses', $post_id);?>">
            </picture>
        </div>
        <div class="pluses__container">
            <h3 class="pluses__untitle section-untitle" data-aos="fade-right" data-aos-delay="100">
                <?php the_field('nadzagolovok-pluses', $post_id);?>
            </h3>
            <h2 class="pluses__title section-title" data-aos="fade-right" data-aos-delay="300">
                <?php the_field('zagolovok-pluses', $post_id);?>
            </h2>
            <div class="pluses__list" data-aos="fade-up" data-aos-delay="500">
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
                <div class="pluses__form button-stroke js-form">
                    <?php the_field('napys_zamovyty_konsultacziyu', 'options');?>
                </div>
            </div>
        </div>
    </section>
    <section id="reviews" class="screen screen5 reviews">
        <div class="reviews__design">
            <img src="<?php echo get_template_directory_uri()?>/img/reviews-design.svg" alt="Декорацыя сайта">
        </div>
        <div class="reviews__image">
            <img src="<?php the_field('zobrazhennya_na_fon-reviews', $post_id);?>" alt="<?php the_field('zagolovok-reviews', $post_id);?>">
        </div>
        <div class="reviews__container main-container">
            <h2 class="reviews__untitle section-untitle" data-aos="fade-right" data-aos-delay="100">
                <?php the_field('nadzagolovok-reviews', $post_id);?>
            </h2>
            <h3 class="reviews__title section-title" data-aos="fade-right" data-aos-delay="300">
                <?php the_field('zagolovok-reviews', $post_id);?>
            </h3>
            <div class="reviews__list swiper-container" data-aos="fade-up" data-aos-delay="500">
                <div class="swiper-wrapper">
                    <?php
                    $counter = 0;
                    $class = '';
                    $args = array(
                        'post_type' => 'reviews',
                        'showposts' => "-1", //сколько показать статей
                        'orderby' => "menu_order", //сортировка по дате
                        'caller_get_posts' => 1);
                    $my_query = new wp_query($args);
                    if ($my_query->have_posts()) {
                        while ($my_query->have_posts()) {
                            $my_query->the_post();
                            $postpers_id = get_the_ID();
                            $image = get_field('fotografiya_kliyenta', $postpers_id);
                            $name = get_field('fio_kliyenta', $postpers_id);
                            $work = get_field('posada_kliyenta', $postpers_id);
                            $content = get_field('vidguk', $postpers_id);
                            $stars = get_field('oczinka', $postpers_id);
                            ?>
                            <div class="reviews__item swiper-slide">
                                <div class="wrapper">
                                    <div class="reviews__item-image">
                                        <img src="<?php echo $image ?>" alt="<?php echo $name ?>">
                                    </div>
                                    <h3 class="reviews__item-name">
                                        <?php echo $name ?>
                                    </h3>
                                    <h4 class="reviews__item-work">
                                        <?php echo $work ?>
                                    </h4>
                                    <div class="reviews__item-content">
                                        <?php echo $content ?>
                                    </div>
                                    <div class="reviews__item-stars">
                                        <div class="rating-result">
                                            <?php
                                            $i = 1;
                                            while ($i <= 5) {
                                                if ($i <= $stars){
                                                    echo '<span class="active"></span>';
                                                } else {
                                                    echo '<span></span>';
                                                }
                                                $i++;
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    wp_reset_query(); ?>
                </div>
                <div class="reviews__control main-container">
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
        </div>
    </section>
    <section id="contacts" class="contacts screen screen6">
        <div class="contacts__container">
            <div class="contacts__mob main-container" style="display: none">
                <h2 class="contacts__untitle section-untitle" data-aos="fade-right" data-aos-delay="100">
                    <?php the_field('nadzagolovok-contacts', $post_id);?>
                </h2>
                <h3 class="contacts__title section-title" data-aos="fade-right" data-aos-delay="300">
                    <?php the_field('zagolovok-contacts', $post_id);?>
                </h3>
            </div>
            <div class="contacts__left padding-left">
                <h2 class="contacts__untitle section-untitle contacts__dif" data-aos="fade-right" data-aos-delay="100">
                    <?php the_field('nadzagolovok-contacts', $post_id);?>
                </h2>
                <h3 class="contacts__title section-title contacts__dif" data-aos="fade-right" data-aos-delay="300">
                    <?php the_field('zagolovok-contacts', $post_id);?>
                </h3>
                <div class="contacts__list" data-aos="fade-up" data-aos-delay="500">
                    <div class="contacts__contacts-item">
                        <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M18.3508 1.1073C16.5813 1.3502 14.7584 2.01936 13.2766 2.9698C10.9096 4.48814 8.9724 6.99597 8.09575 9.67691C7.34341 11.9778 7.26257 14.5434 7.87417 16.7119C8.6103 19.322 9.78572 21.3078 13.1656 25.6512C13.9815 26.6999 14.6492 27.5768 14.6492 27.5999C14.6492 27.623 13.8594 27.6419 12.8942 27.6419C11.177 27.6419 11.1351 27.6456 10.9567 27.809C10.7445 28.0032 6 37.9842 6 38.2362C6 38.3258 6.03943 38.4867 6.08759 38.5938C6.27472 39.0099 6.13729 39 11.7492 39H16.9191L17.1568 38.7848C17.3536 38.6068 17.3946 38.516 17.3946 38.2576C17.3946 37.9993 17.3536 37.9084 17.1568 37.7304L16.9191 37.5153H12.4124C9.93378 37.5153 7.90576 37.5058 7.90576 37.4943C7.90576 37.4828 8.79238 35.6038 9.87609 33.3186L11.8464 29.1638L13.8587 29.144L15.871 29.1243L17.1902 30.8143L18.5093 32.5044L17.4772 32.5415C16.8156 32.5652 16.3836 32.6141 16.2739 32.6773C16.014 32.8274 15.8692 33.2386 15.9687 33.544C16.1304 34.0402 16.0124 34.0262 20.0202 34.0262C23.5912 34.0262 23.6394 34.0242 23.8022 33.8706C24.0497 33.637 24.1233 33.3801 24.0271 33.085C23.8866 32.6537 23.6919 32.5833 22.5264 32.5415L21.4907 32.5044L22.8098 30.8143L24.129 29.1243L26.1413 29.144L28.1536 29.1638L30.1239 33.3186C31.2076 35.6038 32.0942 37.4828 32.0942 37.4943C32.0942 37.5058 30.0662 37.5153 27.5876 37.5153H23.0809L22.8432 37.7304C22.6464 37.9084 22.6054 37.9993 22.6054 38.2576C22.6054 38.516 22.6464 38.6068 22.8432 38.7848L23.0809 39H28.2508C33.8627 39 33.7253 39.0099 33.9124 38.5938C33.9606 38.4867 34 38.3258 34 38.2362C34 37.9842 29.2555 28.0032 29.0433 27.809C28.8649 27.6456 28.823 27.6419 27.1058 27.6419C26.1406 27.6419 25.3508 27.623 25.3508 27.5999C25.3508 27.5768 26.0181 26.6999 26.8337 25.6512C29.2777 22.5086 30.2676 21.0443 31.1081 19.3275C32.1132 17.2746 32.5356 15.5772 32.5327 13.6019C32.5279 10.3571 31.3229 7.33626 29.0935 4.97988C27.9514 3.77281 26.9806 3.04159 25.5592 2.31816C23.4012 1.21977 20.7614 0.776286 18.3508 1.1073ZM22.1476 2.6958C26.501 3.56591 29.8948 6.961 30.8554 11.407C31.0647 12.3755 31.1194 14.1659 30.9682 15.097C30.5679 17.5624 29.3873 19.901 26.9027 23.1507C24.9677 25.6815 20.0509 31.9476 20 31.9476C19.9491 31.9476 15.0323 25.6815 13.0973 23.1507C10.6127 19.901 9.43213 17.5624 9.03177 15.097C8.88319 14.1817 8.93538 12.3798 9.13827 11.4206C9.97527 7.46462 12.7958 4.28474 16.5729 3.03876C17.2137 2.82734 17.994 2.65615 18.9372 2.52001C19.4902 2.44013 21.3887 2.54413 22.1476 2.6958ZM18.4719 6.19556C16.9416 6.52093 15.8032 7.15877 14.6492 8.33726C13.5798 9.42941 12.9537 10.5656 12.6226 12.0153C12.4248 12.8814 12.438 14.5371 12.6497 15.3931C12.9824 16.7385 13.5859 17.8575 14.5106 18.8434C15.5232 19.923 16.6647 20.6203 18.0629 21.0134C18.7213 21.1984 18.9057 21.218 20 21.2183C21.0352 21.2187 21.2992 21.1941 21.8325 21.0475C23.3031 20.6431 24.2564 20.0775 25.3508 18.9598C26.7074 17.5743 27.41 16.0016 27.5245 14.0939C27.7193 10.8493 25.778 7.77596 22.7702 6.56741C21.4716 6.0456 19.8409 5.90448 18.4719 6.19556ZM21.8325 7.81167C22.7976 8.12843 23.5759 8.61104 24.2932 9.33758C26.676 11.7508 26.6766 15.5475 24.2946 17.9575C23.1072 19.1587 21.6542 19.773 20 19.773C18.3162 19.773 16.8941 19.163 15.6648 17.9135C14.5523 16.7826 13.9162 15.2311 13.9162 13.6485C13.9162 11.033 15.6439 8.63487 18.1131 7.82295C18.8702 7.57404 19.2246 7.52935 20.2199 7.55734C21.0002 7.57924 21.2394 7.61702 21.8325 7.81167ZM19.5447 37.7304C19.348 37.9084 19.307 37.9993 19.307 38.2576C19.307 38.7934 19.8589 39.154 20.3164 38.9171C21.0177 38.5538 20.7605 37.5153 19.9694 37.5153C19.8665 37.5153 19.6754 37.6121 19.5447 37.7304Z" fill="#E2C4A2"/>
                        </svg>
                        <span><?php echo the_field('adress', 'options')?></span>
                    </div>
                    <div class="contacts__contacts-item">
                        <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M21.9954 3.11126C21.9104 3.17085 21.7987 3.32034 21.7473 3.44345C21.6669 3.63591 21.6669 3.69863 21.7473 3.8911C21.8866 4.22474 22.0838 4.33164 22.56 4.33164C22.7854 4.33164 23.2793 4.36293 23.6576 4.40127C29.9654 5.03953 34.9617 10.0374 35.5998 16.3472C35.6381 16.7256 35.6694 17.2197 35.6694 17.4452C35.6694 17.9215 35.7763 18.1187 36.1098 18.2581C36.3022 18.3385 36.3649 18.3385 36.5573 18.2581C37.0154 18.0666 37.075 17.7505 36.9298 16.2807C36.4843 11.7717 34.0556 7.80298 30.211 5.30209C29.4064 4.77863 27.8836 4.05533 26.9252 3.74135C25.1387 3.15604 22.4263 2.8093 21.9954 3.11126ZM22.0102 7.11768C21.6437 7.34117 21.592 7.84344 21.9066 8.12466C22.0797 8.27953 22.1722 8.30159 22.8238 8.34324C27.6558 8.65231 31.3501 12.3478 31.6591 17.1813C31.7009 17.8358 31.7223 17.9251 31.8798 18.1014C32.1907 18.4495 32.7607 18.3331 32.9469 17.8835C33.1274 17.4476 32.865 15.5786 32.4389 14.264C31.4661 11.2635 28.9227 8.67117 25.9338 7.63383C25.092 7.34164 24.2497 7.14797 23.4348 7.05928C22.519 6.95962 22.2513 6.97059 22.0102 7.11768ZM7.40293 7.90369C7.21676 7.97026 6.94426 8.11995 6.79741 8.23628C6.2273 8.68798 4.71174 10.3317 4.32766 10.9149C2.99542 12.9378 2.64899 15.3534 3.36462 17.6305C3.68907 18.6626 5.01593 21.1195 6.30042 23.0663C7.76397 25.2847 9.19577 27.0251 11.2226 29.0497C13.212 31.0367 14.6942 32.2623 16.8404 33.6943C18.4015 34.736 20.4547 35.9063 21.4968 36.3484C23.5405 37.2154 25.7335 37.2172 27.7889 36.3535C28.413 36.0913 29.0287 35.7126 29.6587 35.2035C30.3877 34.6144 31.8292 33.124 31.9833 32.7999C32.162 32.4241 32.192 31.7356 32.0488 31.294C31.9417 30.9638 31.7366 30.7416 29.0363 28.0304C25.8006 24.7817 25.7807 24.7657 24.981 24.7683C24.2394 24.7709 24.0532 24.8947 22.5522 26.384C21.8216 27.1089 21.1193 27.7563 20.9914 27.8228C20.8428 27.8999 20.6213 27.9424 20.3777 27.9407C20.0197 27.938 19.9549 27.9103 19.3151 27.4858C18.9403 27.2372 18.3198 26.7917 17.9363 26.496C17.3113 26.0141 17.209 25.9582 16.9509 25.9576C16.7172 25.957 16.6327 25.992 16.5025 26.1433C16.3171 26.359 16.2872 26.7456 16.4393 26.9627C16.635 27.2422 18.6558 28.7022 19.3046 29.0329C19.7185 29.2439 20.3639 29.3365 20.8253 29.2512C21.6181 29.1045 21.841 28.9464 23.3112 27.4879C24.1372 26.6685 24.7469 26.1153 24.853 26.089C24.96 26.0627 25.1026 26.0849 25.2183 26.1462C25.3227 26.2014 26.626 27.4678 28.1146 28.9604C30.7838 31.6369 30.821 31.6779 30.821 31.9424C30.821 32.2011 30.783 32.2481 29.7418 33.2723C28.6078 34.3879 28.2129 34.6897 27.388 35.0709C26.4896 35.4861 25.7425 35.6446 24.6775 35.6458C23.2178 35.6474 22.5189 35.4397 20.7258 34.4715C15.8467 31.8368 12.0255 28.5645 8.72687 24.1963C7.06381 21.994 5.12671 18.718 4.661 17.3201C4.17849 15.8716 4.23109 14.266 4.80798 12.8374C5.19041 11.8903 5.50761 11.4501 6.6418 10.2924C7.24247 9.67929 7.80349 9.16015 7.88843 9.13882C7.97331 9.1175 8.12673 9.13484 8.22935 9.17729C8.33189 9.21981 9.64634 10.4879 11.1503 11.9952C13.8097 14.6605 13.8849 14.7429 13.8849 14.9931C13.8849 15.2389 13.824 15.3118 12.5269 16.6188C11.3376 17.8175 11.1424 18.0442 10.9545 18.4459C10.7888 18.8002 10.7333 19.0201 10.7106 19.4134C10.6666 20.1738 10.7942 20.5211 11.5078 21.5819C12.3177 22.786 12.4612 22.934 12.8186 22.934C13.039 22.934 13.1392 22.8929 13.2923 22.7398C13.624 22.408 13.5741 22.2259 12.8801 21.2387C12.1735 20.2336 12.0287 19.9487 12.0267 19.5602C12.0241 19.0494 12.1704 18.8491 13.6104 17.3912C15.131 15.8518 15.2132 15.727 15.2132 14.9604C15.2132 14.2123 15.1262 14.1049 11.9777 10.9654C10.0246 9.01797 9.04328 8.0856 8.83918 7.98355C8.43278 7.78045 7.83955 7.74743 7.40293 7.90369ZM22.0759 11.0695C21.6585 11.2565 21.5679 11.8083 21.9051 12.1097C22.0703 12.2573 22.1893 12.2929 22.6533 12.3334C24.5371 12.4978 26.0232 13.4214 26.9618 15.011C27.3271 15.6296 27.5547 16.3565 27.6465 17.1984C27.7133 17.8099 27.7486 17.9377 27.8968 18.1036C28.0289 18.2516 28.1272 18.2967 28.3176 18.2967C28.8963 18.2967 29.0716 17.9467 28.9663 17.0017C28.7071 14.677 27.3533 12.7292 25.2753 11.6913C24.2096 11.159 22.5821 10.8427 22.0759 11.0695ZM21.939 15.1256C21.7764 15.2437 21.6643 15.5751 21.7086 15.807C21.7594 16.0726 22.0324 16.275 22.406 16.3241C23.1219 16.418 23.5868 16.8831 23.6807 17.5992C23.7523 18.1453 24.0792 18.3941 24.561 18.2692C24.861 18.1914 24.9955 17.9575 24.9857 17.5303C24.9635 16.5663 24.3841 15.6991 23.46 15.2468C23.0018 15.0226 22.172 14.9564 21.939 15.1256ZM14.3442 24.1155C13.9871 24.4347 14.0822 24.9827 14.5269 25.1685C14.7114 25.2456 14.8067 25.2503 14.9863 25.1911C15.45 25.0379 15.5718 24.4783 15.2183 24.1248C14.9569 23.8633 14.6303 23.8598 14.3442 24.1155Z" fill="#E2C4A2"/>
                        </svg>
                        <span class="row">
                            <a href="tel:<?php echo the_field('telefon_1', 'options')?>"><?php echo the_field('telefon_1', 'options')?></a>
                            <span>;&nbsp</span>
                            <a href="tel:<?php echo the_field('telefon_2', 'options')?>"><?php echo the_field('telefon_2', 'options')?></a>
                        </span>

                    </div>
                    <div class="contacts__contacts-item">
                        <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M5.00394 8.07852C4.59121 8.17543 3.98706 8.53118 3.69277 8.85052C3.5434 9.01265 3.32636 9.34544 3.21059 9.5899L3 10.0345V19.5224V29.0102L3.24851 29.5131C3.54779 30.1189 3.93304 30.4962 4.55162 30.7893L4.99609 31H20.0035H35.0108L35.5136 30.7514C36.1192 30.452 36.4964 30.0667 36.7894 29.4479L37 29.0033V19.5189V10.0345L36.7894 9.5899C36.4964 8.97119 36.1192 8.58575 35.5136 8.28638L35.0108 8.03779L24.9937 8.02002C18.0554 8.0077 14.9242 8.02394 14.8063 8.0728C14.7126 8.11153 14.5853 8.22901 14.5235 8.33377C14.3485 8.63001 14.3813 8.85338 14.6372 9.10936L14.8634 9.33565H24.6666H34.4698L33.5401 10.2675L32.6104 11.1993H28.1615H23.7127L23.4865 11.4255C23.1796 11.7326 23.1796 11.9971 23.4865 12.3041L23.7127 12.5304L27.4953 12.5307L31.2779 12.5309L26.454 17.3473C21.1907 22.6024 21.3789 22.4382 20.4421 22.5935C20.1204 22.6468 19.8796 22.6468 19.5579 22.5935C18.6069 22.4358 18.9592 22.7527 11.9491 15.75L5.52838 9.33605L7.41135 9.33585C9.45508 9.33565 9.58376 9.31549 9.74045 8.97145C9.89601 8.62995 9.78383 8.25776 9.47763 8.09935C9.32986 8.02295 8.90296 8.00577 7.27828 8.01117C6.16945 8.01489 5.14599 8.04518 5.00394 8.07852ZM11.6749 8.19193C11.5003 8.34808 11.4652 8.42801 11.4652 8.67008C11.4652 8.91448 11.4999 8.99175 11.6833 9.15568C12.3133 9.71869 13.151 8.7972 12.5531 8.19906C12.2903 7.93616 11.9641 7.93356 11.6749 8.19193ZM9.07123 14.7432L13.6791 19.3522L9.03836 23.9947C6.48596 26.5481 4.3751 28.6372 4.34756 28.6372C4.28754 28.6372 4.27923 10.6416 4.33904 10.3423C4.36193 10.2279 4.39926 10.1343 4.42201 10.1343C4.44483 10.1343 6.53693 12.2083 9.07123 14.7432ZM35.6866 19.4557C35.6962 24.5055 35.6813 28.6372 35.6535 28.6372C35.6258 28.6372 33.5146 26.5483 30.962 23.9951L26.3209 19.3528L30.9268 14.7452C34.0761 11.5947 35.5543 10.1591 35.601 10.2058C35.6469 10.2517 35.675 13.2889 35.6866 19.4557ZM20.7005 11.417C20.3846 11.733 20.3821 11.9941 20.692 12.3041C20.9435 12.5557 21.1553 12.5901 21.4651 12.4299C21.7051 12.3058 21.7965 12.1429 21.7965 11.8397C21.7965 11.5089 21.5703 11.2674 21.216 11.2199C20.9604 11.1856 20.9142 11.2032 20.7005 11.417ZM17.8782 23.3978C18.0468 23.4945 18.4211 23.6556 18.7099 23.7558C19.1638 23.9133 19.3383 23.938 20 23.938C20.6617 23.938 20.8362 23.9133 21.2901 23.7558C21.5789 23.6556 21.9532 23.4945 22.1218 23.3978C22.2906 23.3011 23.088 22.5691 23.894 21.7713L25.3595 20.3206L29.9987 24.9616C32.5503 27.5142 34.638 29.6251 34.638 29.6524C34.638 29.6798 28.0509 29.7021 20 29.7021C11.9491 29.7021 5.36204 29.6798 5.36204 29.6524C5.36204 29.6251 7.44968 27.5142 10.0013 24.9616L14.6405 20.3206L16.106 21.7713C16.912 22.5691 17.7094 23.3011 17.8782 23.3978Z" fill="#E2C4A2"/>
                        </svg>
                        <a href="mailto:<?php echo the_field('e-mail', 'options')?>"><?php echo the_field('e-mail', 'options')?></a>
                    </div>
                    <div class="contacts__form">
                        <?php echo do_shortcode('[contact-form-7 id="120" title="Форма контакти"]')?>
                    </div>
                </div>
            </div>
            <div class="contacts__map">
                <div id="map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2539.896263380549!2d30.494161315932743!3d50.461656394438194!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40d4ce6f8f290521%3A0xfa825e48e4a06b96!2z0YPQuy4g0JPQu9GD0LHQvtGH0LjRhtC60LDRjywgNDAsINCa0LjQtdCyLCAwMjAwMA!5e0!3m2!1sru!2sua!4v1644743832358!5m2!1sru!2sua" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </div>
    </section>
</main>



<?php get_footer(); ?>
