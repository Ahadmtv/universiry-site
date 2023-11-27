<!DOCTYPE html <?php language_attributes(); ?>>
<html>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="icon" type="image/x-icon" href="<?php echo get_theme_file_uri('/images/favicon.ico')?>">
  <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i" rel="stylesheet" />

  <!-- <link rel="stylesheet" href="build/index.css" /> -->
  <?php wp_head() ?>
</head>

<body <?php body_class(); ?>>
  <header class="site-header">
    <div class="container headerflex">
      <!-- <h1 class="school-logo-text float-left">
      <img src=""  class="">
        <a href="#">دانشگاه <strong>گیلان</strong></a>
        
      </h1> -->
      <div class="school-logo-text float-left">
        <span class="logo-sec picture">
          <img class="" src="<?php echo get_theme_file_uri('/images/IMG19214987-removebg(1).png') ?>">
        </span>
        <span class="logo-sec text "><a href="<?php echo get_site_url(); ?>">دانشگاه <strong>گیلان</strong></a></span>
      </div>
      
      <span class="js-search-trigger site-header__search-trigger"><i class="fa fa-search" aria-hidden="true"></i></span>
      <i class="site-header__menu-trigger fa fa-bars" aria-hidden="true"></i>
      <div class="site-header__menu group">
        <nav class="main-navigation">

          <?php wp_nav_menu(array(
            'theme_location' => 'topMenu'
          )); ?>
          <!-- <ul>
              <li><a href="#">درباره ما</a></li>
              <li><a href="#">برنامه ها</a></li>
              <li><a href="#">رویداد ها</a></li>
              <li><a href="#">فضای دانشگاه</a></li>
              <li><a href="#">مطالب</a></li>
            </ul> -->
        </nav>
        <div class="site-header__util">
          <?php
          if (is_user_logged_in()) { ?>
            <a href="<?php echo site_url('/یادداشت-های-من') ?>" class="btn btn--small btn--orange float-left push-right">یادداشت های من</a>
            <a href="<?php echo wp_logout_url();  ?>" class="btn btn--small btn--dark-orange float-left">خروج</a>

          <?php
          } else { ?>
            <a href="<?php echo wp_login_url() ?>" class="btn btn--small btn--orange float-left push-right">ورود</a>
            <a href="<?php echo wp_registration_url() ?>" class="btn btn--small btn--dark-orange float-left">ثبت نام</a>
          <?php
          }
          ?>

          <span class="search-trigger js-search-trigger"><i class="fa fa-search" aria-hidden="true"></i></span>
        </div>
      </div>
    </div>
  </header>