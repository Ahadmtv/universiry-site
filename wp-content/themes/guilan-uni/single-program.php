<?php
get_header();
if (have_posts()) {
    while (have_posts()) {
        the_post();
        banner(array(
            'title'=>'',
            'subtitle'=>'',
            'photo'=>''
        ));
?>


        <div class="container container--narrow page-section">
            <div class="metabox metabox--position-up metabox--with-home-link">
                <p>
                    <a class="metabox__blog-home-link" href="<?php echo site_url('/رشته ها'); ?>"> رفتن به رشته ها
                    </a> <span class="metabox__main">
                        نوشته شده توسط <?php the_author_posts_link(); ?> در <?php echo get_the_time('d F Y'); ?>(<?php echo get_the_category_list(','); ?>)
                    </span>
                </p>
            </div>
            <p><?php the_content(); ?></p>
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
            
            $add_profesor = new $wp_query(
                array(
                    'posts_per_page' => -1,
                    'post_type' => 'profesor',
                    // 'meta_key'=>'eventDate',
                    'orderby' => 'title',
                    'order' => 'ASC',
                    'meta_query' => array(
                        array(),
                        array(
                            'key' => 'related_program',
                            'compare' => 'LIKE',
                            'value' => '"' . get_the_ID() . '"'
                        )
                    )
                )
            );

            if ($add_profesor->have_posts()) {

            ?>
                <hr class="section-break">
                <h2>استادید رشته</h2>

                <?php
                echo '<ul class="professor-cards">';
                while ($add_profesor->have_posts()) {
                    $add_profesor->the_post();
                ?>
          <li class="professor-card__list-item">
            <a href="<?php the_permalink(); ?>" class="professor-card">
              <img class="professor-card__image" src="<?php the_post_thumbnail_url('profesorSmall') ?>" />
              <span class="professor-card__name"><?php the_title(); ?></span>
            </a>
          </li>
            <?php
                }
                echo '</ul>';
            }
            ?>



            <?php
wp_reset_postdata();

            $add_events_ = new $wp_query(
                array(
                    'posts_per_page' => -1,
                    'post_type' => 'event',
                    // 'meta_key'=>'eventDate',
                    'orderby' => 'post_date',
                    'order' => 'ASC',
                    'meta_query' => array(
                        array(),
                        array(
                            'key' => 'related_program',
                            'compare' => 'LIKE',
                            'value' => '"' . get_the_ID() . '"'
                        )
                    )
                )
            );

            if ($add_events_->have_posts()) {

            ?>
                <hr class="section-break">
                <h2>رویداد های مرتبط با رشته</h2>

                <?php
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
                                $eventDate = new DateTime(`$day/$monthNum/$year`);
                                add_post_meta(get_the_ID(), 'eventDate', 15);
                                echo $monthName;

                                ?>
                            </span>
                            <span class="event-summary__day">
                                <?php echo convertEnglishToPersian($day) ?>
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

        </div>







<?php
    }
}
get_footer();


?>