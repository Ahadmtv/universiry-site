<?php get_header() ?>

<div class="page-banner">
  <div class="page-banner__bg-image" style="background-image: url(<?php echo get_template_directory_uri() ?>/images/library-hero.jpg)"></div>
  <div class="page-banner__content container t-center c-white">
    <h1 class="headline headline--large">خوش آمدید</h1>
    <h2 class="headline headline--medium">خوشحال هستیم که شما اینجایید</h2>
    <h3 class="headline headline--small"><strong>رشته </strong>مورد علاقه خود را پیدا کنید</h3>
    <a href="<?php echo site_url('/رشته ها'); ?>" class="btn btn--large btn--blue">رشتتو پیدا کن</a>
  </div>
</div>

<div class="full-width-split group">
  <div class="full-width-split__one">
    <div class="full-width-split__inner">
      <h2 class="headline headline--small-plus t-center">رویداد های پیش رو</h2>
      <?php
      function convertPersianToEnglish($str)
      {
        $farsi = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
        $en = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];

        $output = str_replace($farsi, $en, $str);
        return $output;
      }
      function convertEnglishToPersian($str)
      {
        $farsi = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
        $en = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];

        $output = str_replace($en, $farsi, $str);
        return $output;
      }
      $all_event = new $wp_query(
        array(
          'posts_per_page' => 0,
          'post_type' => 'event',
        )
      );
      if ($all_event->have_posts()) {
        while ($all_event->have_posts()) {
          $all_event->the_post();
          $eventDateString = get_field('تاریخ_رویداد');
          $year = $eventDateString['سال'];
          $month = $eventDateString['ماه'];
          $monthNum = $month['value'];
          $monthName = $month['label'];
          $day = $eventDateString['روز'];
          $ahadddd = $year + $monthNum + $day;
          $eventDate = new DateTime(`$day/$monthNum/$year`);
          if (!metadata_exists('post', get_the_ID(), 'ahadmtv')) {

            add_post_meta(get_the_ID(), 'ahadmtv', $ahadddd);
          } else {
            $eventDateStringcheck = get_field('تاریخ_رویداد');
            $yearcheck = $eventDateStringcheck['سال'];
            $monthcheck = $eventDateStringcheck['ماه'];
            $monthNumcheck = $monthcheck['value'];
            $daycheck = $eventDateStringcheck['روز'];
            $ahadddd = $year + $monthNum + $day;
            if ($year != $yearcheck or $month != $monthNumcheck or $day != $daycheck) {
              delete_post_meta(get_the_ID(), 'ahadmtv', $ahadddd);
              $ahaddddNew = $yearcheck + $monthNumcheck + $daycheck;
              add_post_meta(get_the_ID(), 'ahadmtv', $ahaddddNew);
            }
          }
        }
      }

      $add_events_ = new $wp_query(
        array(
          'posts_per_page' => 2,
          'post_type' => 'event',
          'meta_key' => 'ahadmtv',
          'orderby' => 'meta_value_num',
          'order' => 'ASC'
        )
      );

      if ($add_events_->have_posts()) {
        while ($add_events_->have_posts()) {
          $add_events_->the_post();
      ?>
          <div class="event-summary">
            <a class="event-summary__date t-center" href="<?php echo get_day_link(get_post_time('Y'), get_post_time('m'), get_post_time('j')); ?>">
              <span class="event-summary__month">
                <?php

                $eventDateString = get_field('تاریخ_رویداد');
                $year = $eventDateString['سال'];
                $month = $eventDateString['ماه'];
                $monthNum = $month['value'];
                $monthName = $month['label'];
                $day = $eventDateString['روز'];
                $ahadddd = $year + $monthNum + $day;
                $eventDate = new DateTime(`$day/$monthNum/$year`);
                echo $monthName;

                ?>
              </span>
              <span class="event-summary__day">
                <?php echo convertEnglishToPersian(ltrim($day, '0')) ?>
              </span>
            </a>
            <div class="event-summary__content">
              <h5 class="event-summary__title headline headline--tiny"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
              <p>
                <?php if (has_excerpt()) {
                  the_excerpt();
                } else {
                  echo wp_trim_words(get_the_content(), 18);
                }; ?><a href="<?php the_permalink(); ?>" class="nu gray">بیشتر
                  بخوانید</a>
              </p>
            </div>
          </div>



      <?php
        }
      }
      ?>

      <p class="t-center no-margin"><a href="<?php echo site_url('/رویداد ها') ?>" class="btn btn--blue">مشاهده تمامی
          رویداد ها</a></p>
    </div>
  </div>
  <div class="full-width-split__two">
    <div class="full-width-split__inner">
      <h2 class="headline headline--small-plus t-center">مطالب ما</h2>

      <?php
      $recent = new WP_Query(
        array(
          'posts_per_page' => 2,
          'post_type' => 'post'
        )
      );


      if ($recent->have_posts()) {
        while ($recent->have_posts()) {
          $recent->the_post();
      ?>
          <div class="event-summary">
            <a class="event-summary__date event-summary__date--beige t-center" href="<?php echo get_day_link(get_post_time('Y'), get_post_time('m'), get_post_time('j')); ?>">
              <span class="event-summary__month">
                <?php the_time('F'); ?>
              </span>
              <span class="event-summary__day">
                <?php echo convertEnglishToPersian(ltrim(strval(get_post_time('d')), '0')); ?>
              </span>
            </a>
            <div class="event-summary__content">
              <h5 class="event-summary__title headline headline--tiny"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
              <p>
                <?php if (has_excerpt()) {
                  the_excerpt();
                } else {
                  echo wp_trim_words(get_the_content(), 18);
                }; ?> <a href="<?php the_permalink(); ?>" class="nu gray">بیشتر
                  بخوانید</a>
              </p>
            </div>
          </div>


      <?php
        }
      }
      ?>


      <p class="t-center no-margin"><a href="<?php echo site_url('/مطالب'); ?>" class="btn btn--yellow">مشاهده تمام
          مطالب</a></p>
    </div>
  </div>
</div>

<div class="hero-slider">
  <div data-glide-el="track" class="glide__track">
    <div class="glide__slides">
      <div class="hero-slider__slide" style="background-image: url(<?php echo get_template_directory_uri() ?>/images/bus.jpg)">
        <div class="hero-slider__interior container">
          <div class="hero-slider__overlay">
            <h2 class="headline headline--medium t-center">حمل و نقل رایگان</h2>
            <p class="t-center"> برای تمام دانشجویان حمل و نقل رایگان می باشد</p>
            <p class="t-center no-margin"><a href="#" class="btn btn--blue">بیشتر بخوانید</a></p>
          </div>
        </div>
      </div>
      <div class="hero-slider__slide" style="background-image: url(<?php echo get_template_directory_uri() ?>/images/apples.jpg)">
        <div class="hero-slider__interior container">
          <div class="hero-slider__overlay">
            <h2 class="headline headline--medium t-center">هر روز یک سیب</h2>
            <p class="t-center">توجه فراوان به بخش تغذیه دانشجویان</p>
            <p class="t-center no-margin"><a href="#" class="btn btn--blue">بیشتر بخوانید</a></p>
          </div>
        </div>
      </div>
      <div class="hero-slider__slide" style="background-image: url(<?php echo get_template_directory_uri() ?>/images/bread.jpg)">
        <div class="hero-slider__interior container">
          <div class="hero-slider__overlay">
            <h2 class="headline headline--medium t-center">غذای رایگان</h2>
            <p class="t-center">وعده شام و ناهار برای تمامی دانشجویان</p>
            <p class="t-center no-margin"><a href="#" class="btn btn--blue">بیشتر بخوانید</a></p>
          </div>
        </div>
      </div>
    </div>
    <div class="slider__bullets glide__bullets" data-glide-el="controls[nav]"></div>
  </div>
</div>
<?php get_footer() ?>