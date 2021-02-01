<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package petgold
 */

?> 
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
		<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'petgold'); ?></a>

		<!-- Header -->
		<header id="header" class="header">
			<!-- Cta bar -->
			<section class="ctaBar">
				<div class="container">
					<div class="row">
						<div class="col-12 col-md-7 ctaBar__left">
							<?php if ( get_field('datos_de_contacto', 'options')['correo_electronico'] ): ?>
							<div class="ctaBar__left--item">
									<a href="mailto:<?php echo get_field('datos_de_contacto', 'options')['correo_electronico']; ?>" class="link">
										<svg viewBox="0 0 483.3 483.3">
											<path d="M424.3,57.75H59.1c-32.6,0-59.1,26.5-59.1,59.1v249.6c0,32.6,26.5,59.1,59.1,59.1h365.1c32.6,0,59.1-26.5,59.1-59.1
												v-249.5C483.4,84.35,456.9,57.75,424.3,57.75z M456.4,366.45c0,17.7-14.4,32.1-32.1,32.1H59.1c-17.7,0-32.1-14.4-32.1-32.1v-249.5
												c0-17.7,14.4-32.1,32.1-32.1h365.1c17.7,0,32.1,14.4,32.1,32.1v249.5H456.4z" />
												<path d="M304.8,238.55l118.2-106c5.5-5,6-13.5,1-19.1c-5-5.5-13.5-6-19.1-1l-163,146.3l-31.8-28.4c-0.1-0.1-0.2-0.2-0.2-0.3
												c-0.7-0.7-1.4-1.3-2.2-1.9L78.3,112.35c-5.6-5-14.1-4.5-19.1,1.1c-5,5.6-4.5,14.1,1.1,19.1l119.6,106.9L60.8,350.95
												c-5.4,5.1-5.7,13.6-0.6,19.1c2.7,2.8,6.3,4.3,9.9,4.3c3.3,0,6.6-1.2,9.2-3.6l120.9-113.1l32.8,29.3c2.6,2.3,5.8,3.4,9,3.4
												c3.2,0,6.5-1.2,9-3.5l33.7-30.2l120.2,114.2c2.6,2.5,6,3.7,9.3,3.7c3.6,0,7.1-1.4,9.8-4.2c5.1-5.4,4.9-14-0.5-19.1L304.8,238.55z" />
										</svg>
										<?php echo get_field('datos_de_contacto', 'options')['correo_electronico']; ?>
									</a>
							</div>
							<?php endif; ?>
							<?php if ( get_field('datos_de_contacto', 'options')['whatsapp'] ): ?>
							<div class="ctaBar__left--item">
								<a href="https://wa.me/57<?php echo str_replace(' ', '', get_field('datos_de_contacto', 'options')['whatsapp']); ?>" class="link" target="_blank">
									<svg viewBox="0 0 30.667 30.667">
										<path d="M30.667,14.939c0,8.25-6.74,14.938-15.056,14.938c-2.639,0-5.118-0.675-7.276-1.857L0,30.667l2.717-8.017
											c-1.37-2.25-2.159-4.892-2.159-7.712C0.559,6.688,7.297,0,15.613,0C23.928,0.002,30.667,6.689,30.667,14.939z M15.61,2.382
											c-6.979,0-12.656,5.634-12.656,12.56c0,2.748,0.896,5.292,2.411,7.362l-1.58,4.663l4.862-1.545c2,1.312,4.393,2.076,6.963,2.076
											c6.979,0,12.658-5.633,12.658-12.559C28.27,8.016,22.59,2.382,15.61,2.382z M23.214,18.38c-0.094-0.151-0.34-0.243-0.708-0.427
											c-0.367-0.184-2.184-1.069-2.521-1.189c-0.34-0.123-0.586-0.185-0.832,0.182c-0.243,0.367-0.951,1.191-1.168,1.437
											c-0.215,0.245-0.43,0.276-0.799,0.095c-0.369-0.186-1.559-0.57-2.969-1.817c-1.097-0.972-1.838-2.169-2.052-2.536
											c-0.217-0.366-0.022-0.564,0.161-0.746c0.165-0.165,0.369-0.428,0.554-0.643c0.185-0.213,0.246-0.364,0.369-0.609
											c0.121-0.245,0.06-0.458-0.031-0.643c-0.092-0.184-0.829-1.984-1.138-2.717c-0.307-0.732-0.614-0.611-0.83-0.611
											c-0.215,0-0.461-0.03-0.707-0.03S9.897,8.215,9.56,8.582s-1.291,1.252-1.291,3.054c0,1.804,1.321,3.543,1.506,3.787
											c0.186,0.243,2.554,4.062,6.305,5.528c3.753,1.465,3.753,0.976,4.429,0.914c0.678-0.062,2.184-0.885,2.49-1.739
											C23.307,19.268,23.307,18.533,23.214,18.38z" />
									</svg>
									<?php echo get_field('datos_de_contacto', 'options')['whatsapp']; ?>
								</a>
							</div>
							<?php endif; ?>
						</div>

						<div class="col-12 col-md-5 ctaBar__right">
							<div class="ctaBar__right--item">
								<?php if ( is_user_logged_in() ) { ?>
									<a class="link" href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php _e('My Account','woothemes'); ?>">
										<svg viewBox="-42 0 512 512.002">
											<path d="m210.351562 246.632812c33.882813 0 63.222657-12.152343 87.195313-36.128906 23.972656-23.972656 36.125-53.304687 36.125-87.191406 0-33.875-12.152344-63.210938-36.128906-87.191406-23.976563-23.96875-53.3125-36.121094-87.191407-36.121094-33.886718 0-63.21875 12.152344-87.191406 36.125s-36.128906 53.308594-36.128906 87.1875c0 33.886719 12.15625 63.222656 36.132812 87.195312 23.976563 23.96875 53.3125 36.125 87.1875 36.125zm0 0" />
											<path d="m426.128906 393.703125c-.691406-9.976563-2.089844-20.859375-4.148437-32.351563-2.078125-11.578124-4.753907-22.523437-7.957031-32.527343-3.308594-10.339844-7.808594-20.550781-13.371094-30.335938-5.773438-10.15625-12.554688-19-20.164063-26.277343-7.957031-7.613282-17.699219-13.734376-28.964843-18.199219-11.226563-4.441407-23.667969-6.691407-36.976563-6.691407-5.226563 0-10.28125 2.144532-20.042969 8.5-6.007812 3.917969-13.035156 8.449219-20.878906 13.460938-6.707031 4.273438-15.792969 8.277344-27.015625 11.902344-10.949219 3.542968-22.066406 5.339844-33.039063 5.339844-10.972656 0-22.085937-1.796876-33.046874-5.339844-11.210938-3.621094-20.296876-7.625-26.996094-11.898438-7.769532-4.964844-14.800782-9.496094-20.898438-13.46875-9.75-6.355468-14.808594-8.5-20.035156-8.5-13.3125 0-25.75 2.253906-36.972656 6.699219-11.257813 4.457031-21.003906 10.578125-28.96875 18.199219-7.605469 7.28125-14.390625 16.121094-20.15625 26.273437-5.558594 9.785157-10.058594 19.992188-13.371094 30.339844-3.199219 10.003906-5.875 20.945313-7.953125 32.523437-2.058594 11.476563-3.457031 22.363282-4.148437 32.363282-.679688 9.796875-1.023438 19.964844-1.023438 30.234375 0 26.726562 8.496094 48.363281 25.25 64.320312 16.546875 15.746094 38.441406 23.734375 65.066406 23.734375h246.53125c26.625 0 48.511719-7.984375 65.0625-23.734375 16.757813-15.945312 25.253906-37.585937 25.253906-64.324219-.003906-10.316406-.351562-20.492187-1.035156-30.242187zm0 0" />
										</svg>
										Mi cuenta
									</a>
								<?php } 
								else { ?>
									<a class="link" href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php _e('Login / Register','woothemes'); ?>">
										<svg viewBox="-42 0 512 512.002">
											<path d="m210.351562 246.632812c33.882813 0 63.222657-12.152343 87.195313-36.128906 23.972656-23.972656 36.125-53.304687 36.125-87.191406 0-33.875-12.152344-63.210938-36.128906-87.191406-23.976563-23.96875-53.3125-36.121094-87.191407-36.121094-33.886718 0-63.21875 12.152344-87.191406 36.125s-36.128906 53.308594-36.128906 87.1875c0 33.886719 12.15625 63.222656 36.132812 87.195312 23.976563 23.96875 53.3125 36.125 87.1875 36.125zm0 0" />
											<path d="m426.128906 393.703125c-.691406-9.976563-2.089844-20.859375-4.148437-32.351563-2.078125-11.578124-4.753907-22.523437-7.957031-32.527343-3.308594-10.339844-7.808594-20.550781-13.371094-30.335938-5.773438-10.15625-12.554688-19-20.164063-26.277343-7.957031-7.613282-17.699219-13.734376-28.964843-18.199219-11.226563-4.441407-23.667969-6.691407-36.976563-6.691407-5.226563 0-10.28125 2.144532-20.042969 8.5-6.007812 3.917969-13.035156 8.449219-20.878906 13.460938-6.707031 4.273438-15.792969 8.277344-27.015625 11.902344-10.949219 3.542968-22.066406 5.339844-33.039063 5.339844-10.972656 0-22.085937-1.796876-33.046874-5.339844-11.210938-3.621094-20.296876-7.625-26.996094-11.898438-7.769532-4.964844-14.800782-9.496094-20.898438-13.46875-9.75-6.355468-14.808594-8.5-20.035156-8.5-13.3125 0-25.75 2.253906-36.972656 6.699219-11.257813 4.457031-21.003906 10.578125-28.96875 18.199219-7.605469 7.28125-14.390625 16.121094-20.15625 26.273437-5.558594 9.785157-10.058594 19.992188-13.371094 30.339844-3.199219 10.003906-5.875 20.945313-7.953125 32.523437-2.058594 11.476563-3.457031 22.363282-4.148437 32.363282-.679688 9.796875-1.023438 19.964844-1.023438 30.234375 0 26.726562 8.496094 48.363281 25.25 64.320312 16.546875 15.746094 38.441406 23.734375 65.066406 23.734375h246.53125c26.625 0 48.511719-7.984375 65.0625-23.734375 16.757813-15.945312 25.253906-37.585937 25.253906-64.324219-.003906-10.316406-.351562-20.492187-1.035156-30.242187zm0 0" />
										</svg>
										Iniciar / Registrarse
									</a>
								<?php } ?>
							</div>

							<div class="ctaBar__right--item">
								<?php global $woocommerce; ?>
								<a href="<?php echo $woocommerce->cart->get_cart_url(); ?>" class="link">
									<svg viewBox="0 0 512 512">
										<path d="m490.299 185.717h-106.219l-59.584-136.433c-3.315-7.591-12.157-11.06-19.749-7.743-7.592 3.315-11.059 12.158-7.743 19.75l54.34 124.427h-190.688l54.34-124.427c3.315-7.592-.151-16.434-7.743-19.75-7.591-3.317-16.435.15-19.749 7.743l-59.584 136.433h-106.219c-13.895 0-24.207 12.579-21.167 25.82l55.935 243.63c2.221 9.674 11.015 16.55 21.167 16.55h356.728c10.152 0 18.946-6.876 21.167-16.55l55.935-243.63c3.04-13.24-7.273-25.82-21.167-25.82zm-359.557 46.004c-2.004 0-4.041-.404-5.996-1.258-7.592-3.315-11.059-12.157-7.743-19.75l11.268-25.802h32.736l-16.512 37.808c-2.461 5.639-7.971 9.002-13.753 9.002zm50.258 159.996c0 8.284-6.716 15-15 15s-15-6.716-15-15v-110c0-8.284 6.716-15 15-15s15 6.716 15 15zm90 0c0 8.284-6.716 15-15 15s-15-6.716-15-15v-110c0-8.284 6.716-15 15-15s15 6.716 15 15zm90 0c0 8.284-6.716 15-15 15s-15-6.716-15-15v-110c0-8.284 6.716-15 15-15s15 6.716 15 15zm26.253-161.254c-1.954.854-3.991 1.258-5.995 1.258-5.782 0-11.292-3.362-13.754-9.001l-16.512-37.808h32.736l11.268 25.802c3.316 7.592-.151 16.434-7.743 19.749z" />
									</svg>
									Carrito
								</a>
							</div>
						</div>
					</div>
				</div>
			</section>
			<div class="container">
				<div class="row">
					<div class="col-12 header__container">
						<div class="header__logo">

							<?php if ( get_field('logo_principal', 'options') ) : $image = get_field('logo_principal', 'options'); ?>
									<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="header__logo--img" aria-label="Go to homepage">
										<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" srcset="">
									</a>
							<?php endif; ?>

						</div>

						<div class="header__rightMenu">

							<!-- Main menu right -->
							<nav id="main__menu" class="header__rightMenu--nav">
								<?php
									wp_nav_menu(
										array(
											'theme_location' => 'main-menu',
											'menu_id'        => 'main-menu',
											'menu_class'	 => 'header__desktopMenu',
											'container'		 => 'ul',
										)
									);
								?>
							</nav>

							<!-- Search form -->
							<div class="header__rightMenu--searchForm">
								<form action="">
									<input type="text" placeholder="Buscar productos">
									<input type="submit" value="Search">
								</form>
							</div>
							<!-- Btn search -->
							<button class="header__rightMenu--search">
								<svg viewBox="0 0 18.023 19.039">
									<path class="a" d="M11.267,12.457,17.5,18.5ZM.75,7.171A6.525,6.525,0,0,1,7.373.75a6.524,6.524,0,0,1,6.622,6.421,6.523,6.523,0,0,1-6.622,6.42A6.524,6.524,0,0,1,.75,7.171Z" transform="translate(0 0)" />
								</svg>
							</button>

							<!-- hamburger menu -->
							<button id="button__menu" class="hamburger hamburger--squeeze  header__hamburguer" type="button" aria-label="Open menu">
								<span class="hamburger-box">
									<span class="hamburger-inner"></span>
								</span>
							</button>
							<!-- /hamburger menu -->

						</div>
					</div>
				</div>
			</div>
		</header>