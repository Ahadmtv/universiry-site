<?php function trim_number($num)
{
  $eng = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
  $per = array('۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹');
  return str_replace($eng, $per, $num);
} ?>
<!DOCTYPE html <?php language_attributes(); ?>>
<html>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="icon" type="image/x-icon" href="<?php echo get_theme_file_uri('/images/favicon.ico') ?>">
  <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i" rel="stylesheet" />
  <!-- اضافه کردن فایل‌های استایل Swiper CSS -->
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />



  <?php wp_head() ?>
</head>

<body <?php body_class(); ?>>
  <header class="site-header">
    <div class="container headerflex">
      <div class="school-logo-text float-left">
        <span class="logo-sec picture">
          <img class="" src="<?php echo get_theme_file_uri('/images/IMG19214987-removebg(1).png') ?>">
        </span>
        <span class="logo-sec text "><a href="<?php echo get_site_url(); ?>">دانشگاه <strong>گیلان</strong></a></span>
      </div>
      <div class="basket float-left">
        <a href="<?php echo get_site_url().'/cart'; ?>">
          <span><img src="data:image/png;base64,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"></span>
          <?php $cartNumber = WC()->cart->get_cart_contents_count();
          if($cartNumber){?>
<span class="cart-num"><?php echo trim_number($cartNumber) ?></span>
<?php
          }
          ?>
          
        </a>
      </div>
      <span class="js-shopsearch-trigger site-header__shopsearch-trigger"><i class="fa fa-search" aria-hidden="true"></i></span>
      <i class="site-header__menu-trigger fa fa-bars" aria-hidden="true"></i>
      <div class="site-header__menu group">
        <nav class="main-navigation">

          <?php wp_nav_menu(array(
            'menu' => 'shop',
            'theme_location' => 'topMenushop'
          )); ?>
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

          <span class="shopsearch-trigger js-shopsearch-trigger"><i class="fa fa-search" aria-hidden="true"></i></span>
        </div>
      </div>
    </div>
  </header>