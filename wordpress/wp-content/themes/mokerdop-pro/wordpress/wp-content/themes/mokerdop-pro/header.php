<?php
/**
 * Header
 *
 * @package Mokerdop_Pro
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>

<meta charset="<?php bloginfo( 'charset' ); ?>">

<meta name="viewport" content="width=device-width, initial-scale=1">

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<?php wp_body_open(); ?>

<header class="site-header">

    <div class="container header-inner">

        <!-- Logo -->

        <div class="site-logo">

            <a href="<?php echo esc_url( home_url('/') ); ?>">

                <?php

                if ( has_custom_logo() ) {

                    the_custom_logo();

                } else {

                    echo '<h2>Mokerdop Pro</h2>';

                }

                ?>

            </a>

        </div>

        <!-- Menu -->

        <nav class="main-navigation">

            <?php

            wp_nav_menu(

                array(

                    'theme_location' => 'primary',

                    'container'      => false,

                    'menu_class'     => 'menu',

                    'fallback_cb'    => false,

                )

            );

            ?>

        </nav>

        <!-- Winkelwagen -->

        <div class="header-cart">

            <a href="<?php echo wc_get_cart_url(); ?>">

                🛒

                <?php if ( class_exists('WooCommerce') ) : ?>

                    <span class="cart-count">

                        <?php echo WC()->cart->get_cart_contents_count(); ?>

                    </span>

                <?php endif; ?>

            </a>

        </div>

        <!-- Mobiel menu -->

        <button class="mobile-toggle">

            ☰

        </button>

    </div>

</header>
