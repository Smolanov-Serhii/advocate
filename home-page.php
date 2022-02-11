<?php

/**
 * Template Name: Главная страница
 *
 */
get_header();
$post_id = get_the_ID();
?>

<div class="section sec0 py-0 main-title-paralax"
     style="background-image: url(<?php echo the_field('izobrazhenie_dlya_banera', $post_id) ?>); background-size: cover; background-repeat: no-repeat; background-position: 50% 50%;">
    <div class="bg-video">
        <video autoplay="" muted="" loop="" id="myVideo">
            <source src="<?php echo the_field('videofajl_dlya_banera', $post_id) ?>" type="video/mp4">
        </video>
    </div>
    <div class="container main-title-paralax__content">
        <div class="row justify-content-center align-items-center">
            <div class="col text-center">
                <div class="main-title-paralax__header">
                    <div class="logo">
                        <?php echo the_field('zagolovok_v_bloke_h1', $post_id) ?>
                    </div>

                    <h1 class="text-white mb-0"><?php echo the_field('zagolovok_v_bloke_h1', $post_id) ?>
                        <?php
                        if(get_field('podzagolovok_v_banner', $post_id)){
                            ?>
                            <span
                                class="d-block"><?php echo the_field('podzagolovok_v_banner', $post_id) ?>
                                </span>
                            <?php
                        }
                        ?>

                    </h1>
                </div>
                <div class="btn-main" data-aos="fade-up">
                    <div class="js-<?php echo the_field('rol_knopki', $post_id); ?> btn btn-secondary btn-lg text-primary">
                        <span><?php echo the_field('nadpis_na_knopke_banera', $post_id) ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="about__content content-container">
    <h2 class="about__title text-primary">
        <?php echo the_field('zagolovok_vseh_kejsov', $post_id) ?>
    </h2>
    <div class="about__cases">
        <?php if (have_rows('kejsy', $post_id)): ?>
            <?php while (have_rows('kejsy', $post_id)): the_row();
                $image = get_sub_field('izobrazhenie_dlya_kejsa');
                $exerpt = get_sub_field('kratkoe_opisanie_kejsa');
                $fullcontent = get_sub_field('polnoe_opisanie_kejsa');
                $title = get_sub_field('zagolovok_dlya_odnogo_kejsa');
                $alt = get_sub_field('seo_opisanie_dlya_kartinki');
                ?>
                <div class="about__item">
                    <div class="about__text-part">
                        <h3 class="about__item-title text-primary"  data-aos="fade-up">
                            <?php echo $title; ?>
                        </h3>
                        <div class="about__item-exerpt"  data-aos="fade-up">
                            <?php echo $exerpt; ?>
                        </div>
                        <div class="about__item-full" style="display: none;">
                            <div class="about__item-full-container">
                                <div class="close-item-about">
                                    <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect x="15.3867" y="4.89569" width="0.989092" height="14.8364" transform="rotate(45 15.3867 4.89569)" fill="#191919"></rect>
                                        <rect x="16.0859" y="15.3867" width="0.989092" height="14.8364" transform="rotate(135 16.0859 15.3867)" fill="#191919"></rect>
                                    </svg>
                                </div>
                                <div class="about__item-full-wrapper">
                                    <?php echo $fullcontent; ?>
                                </div>
                            </div>
                        </div>
                        <div class="about__show-item js-show-case-item text-primary"  data-aos="fade-up">
                            <?php echo the_field('podrobnee', 'options'); ?>
                            <svg width="10" height="6" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10 0.838313L9.1879 -3.54978e-08L5.57423 3.73048L5.00002 4.33171L4.42574 3.73048L0.812097 -4.01616e-07L-3.66438e-08 0.838313L5.00002 6L10 0.838313Z" fill="#1D8FBD"/>
                            </svg>
                        </div>
                    </div>
                    <div class="about__img-part"  data-aos="fade-up">
                        <img src="<?php echo $image; ?>" alt="<?php echo $alt; ?>">
                        <div class="ramka">
                            <svg width="100%" height="100%" viewBox="0 0 780 516" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect x="0.5" y="0.5" width="779" height="515" stroke="#1D8FBD"/>
                            </svg>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
    <div class="about__buttons">
        <div class="btn btn-outline-primary js-<?php echo the_field('rol_levoj_knopki', $post_id); ?>">
            <span><?php echo the_field('nadpis_na_levoj_knopke', $post_id); ?></span>
        </div>
        <a class="btn btn-primary" href="<?php echo the_field('raspisanie', 'options'); ?>">
            <span><?php echo the_field('raspisanie', 'options'); ?></span>
        </a>
    </div>
</section>
<section class="partners"  data-aos="fade-up">
    <h2 class="partners__title title text-primary">
        <?php echo the_field('zagolovok_nashi_partnyory', $post_id) ?>
    </h2>
    <div class="section sec9 bg-white">
        <div class="container-fluid position-absolute ">
            <div class="row bg-white align-items-center">
                <?php
                if (have_rows('karusel_logotipov', $post_id)): ?>
                    <?php while (have_rows('karusel_logotipov', $post_id)): the_row();
                        $image = get_sub_field('logotip_partnyora');
                        $title = get_sub_field('opisanie_partnyora_seo');
                        $link = get_sub_field('ssylka_na_logotip'); ?>
                        <?php
                        if($link){
                            ?>
                            <a href="<?php echo $link;?>"><img src="<?php echo $image; ?>" alt="<?php echo $title; ?>" class="img-fluid"></a>
                            <?php
                        } else {
                            ?>
                            <img src="<?php echo $image; ?>" alt="<?php echo $title; ?>" class="img-fluid">
                            <?php
                        }
                        ?>
                    <?php endwhile;
                    ?>
                <?php endif; ?>
                <div class="col-auto">

                </div>
            </div>
        </div>
    </div>
</section>


<?php get_footer(); ?>
