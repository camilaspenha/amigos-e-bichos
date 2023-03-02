<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Nossa ONG promove a adoção responsável de animais. Acreditamos que todo animal tem a chance de ser o membro de uma família e ter um lar amoroso e com os cuidados dignos que merecem.">
	<meta name="keywords" content="ONG, animais, adoção de animais">    
	    <meta name="author" content="Digital Kah WebDesign">    
	    <meta name="categories" content="Animais para Adoção">
    <link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'wp-bootstrap-starter' ); ?></a>
    <?php if(!is_page_template( 'blank-page.php' ) && !is_page_template( 'blank-page-with-container.php' )): ?>
    <div id="barra_superior_contatos" class="">  
        <div class="container">
            <div class="row m-auto">
                <div class="col-lg-6 links-mobile">
                    <a class="mail" href="mailto:amigosebichossp@gmail.com" title="E-mail de contato">
                        <i class="far fa-paper-plane"></i>
                        <span class="d-none d-lg-inline">amigosebichossp@gmail.com</span>
                    </a>
                    <a href="https://api.whatsapp.com/send?phone=5511963790205&text=Ol%C3%A1!%20Eu gostaria de ajudar!" title="Telefone/Whatsapp de contato" class="ml-1">
                        <i class="fab fa-whatsapp"></i>
                        <span class="celular d-none d-lg-inline">(11) 96379-0205</span>
                    </a>
                    <a href="https://www.facebook.com/AmigoseBichos.SP.Guarulhos/" title="Facebook Amigos e Bichos" aria-label="Visite nossa página no Facebook" class="d-inline d-lg-none ml-1">
                        <i class="fab fa-facebook-square"></i>                
                    </a>
                    <a href="https://www.instagram.com/amigosebichossp/" title="Instagram Amigos e Bichos" aria-label="Visite nossa página no Instagram" class="d-inline d-lg-none ml-1">
                        <i class="fab fa-instagram"></i>                
                    </a>
                </div>
                <div class="col-lg-6 text-right">
                    <span class="d-none d-lg-inline mr-1">Acompanhe nosso projeto também pelas redes sociais</span>
                    <a href="https://www.facebook.com/AmigoseBichos.SP.Guarulhos/" title="Facebook Amigos e Bichos" aria-label="Visite nossa página no Facebook" class="d-none d-lg-inline">
                        <img src="<?php echo get_stylesheet_directory_uri() . '/img/face.png';?>" role="presentation" alt="">                
                    </a>
                    <a href="https://www.instagram.com/amigosebichossp/" title="Instagram Amigos e Bichos" aria-label="Visite nossa página no Instagram" class="d-none d-lg-inline">
                        <img src="<?php echo get_stylesheet_directory_uri() . '/img/insta.png';?>" role="presentation" alt="" class="insta">                
                    </a>
                </div>
            </div>
        </div>
    </div>
	<header id="masthead" class="site-header navbar-static-top <?php echo wp_bootstrap_starter_bg_class(); ?> mt-1" role="banner">
        <div class="container">
            <nav class="navbar navbar-expand-xl p-0">
                <div class="navbar-brand">
                    <?php if ( get_theme_mod( 'wp_bootstrap_starter_logo' ) ): ?>
                        <a href="<?php echo esc_url( home_url( '/' )); ?>" title="Site Amigos e Bichos" aria-label="Página inicial do site">
                            <img src="<?php echo esc_url(get_theme_mod( 'wp_bootstrap_starter_logo' )); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
                        </a>
                    <?php else : ?>
                        <a class="site-title" href="<?php echo esc_url( home_url( '/' )); ?>"><?php esc_url(bloginfo('name')); ?></a>
                    <?php endif; ?>
                </div>
                <?php
                if (!is_front_page()) {
                    ?>
                        <a class="voltar" href="javascript:history.back()">Voltar</a>
                    <?php
                } else {
                    ?>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-nav" aria-controls="" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <?php


                     wp_nav_menu(array(
                    'theme_location'    => 'primary',
                    'container'       => 'div',
                    'container_id'    => 'main-nav',
                    'container_class' => 'collapse navbar-collapse justify-content-end',
                    'menu_id'         => false,
                    'menu_class'      => 'navbar-nav',
                    'depth'           => 3,
                    'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
                    'walker'          => new wp_bootstrap_navwalker()
                ));
                }
               
                ?>

            </nav>
        </div>
	</header><!-- #masthead -->

    <?php if(is_front_page() && !get_theme_mod( 'header_banner_visibility' )): ?>
        <div id="page-sub-header" <?php if(has_header_image()) { ?>style="background-image: url('<?php header_image(); ?>');" <?php } ?>>
            <div class="container">
                <h1>
                    <?php
                    if(get_theme_mod( 'header_banner_title_setting' )){
                        echo get_theme_mod( 'header_banner_title_setting' );
                    }else{
                        echo 'WordPress + Bootstrap';
                    }
                    ?>
                </h1>
                <p>
                    <?php
                    if(get_theme_mod( 'header_banner_tagline_setting' )){
                        echo get_theme_mod( 'header_banner_tagline_setting' );
                }else{
                        echo esc_html__('To customize the contents of this header banner and other elements of your site, go to Dashboard > Appearance > Customize','wp-bootstrap-starter');
                    }
                    ?>
                </p>
                <a href="#content" class="page-scroller"><i class="fa fa-fw fa-angle-down"></i></a>
            </div>
        </div>
    <?php endif; ?>
	<div id="content" class="site-content">
		<div class="container">
			<div class="row">
                <?php endif; ?>