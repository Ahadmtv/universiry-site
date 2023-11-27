<?php
get_header();
if (have_posts()) {
    while (have_posts()) {
        the_post();
        banner(array(
            'title' => '',
            'subtitle' => '',
            'photo' => ''
        ));
?>

        <div class="container container--narrow page-section">
            <div class="metabox metabox--position-up metabox--with-home-link">
                <p>
                    <a class="metabox__blog-home-link" href="<?php echo site_url('/استاد ها'); ?>"> رفتن به لیست استاد ها
                    </a>
                </p>
            </div>

            <div class="generic-content">
                <div class="row group">
                    <div class="one-third"><?php the_post_thumbnail('profesorMedium'); ?></div>
                    <div class="two-third">
                        <?php
                        $likeCount = new WP_Query(array(
                            'post_type' => 'like',
                            'meta_query' => array(
                                array(
                                    'key' => 'like_professor_id',
                                    'compare' => '=',
                                    'value' => get_the_ID()

                                )
                            )
                        ));

                        $likeExists = new WP_Query(array(
                            'author' => get_current_user_id(),
                            'post_type' => 'like',
                            'meta_query' => array(
                                array(
                                    'key' => 'like_professor_id',
                                    'compare' => '=',
                                    'value' => get_the_ID()

                                )
                            )
                        ));
                        $ahad = 'no';
                        if ($likeExists->found_posts) {
                            $ahad = 'yes';
                        }
                        ?>

                        <span class="like-box"  data-likeid='<?php if($likeExists->found_posts){echo $likeExists->posts[0]->ID; }  ?>' data-islogin='<?php
                                                                if (is_user_logged_in()) {
                                                                    echo 'yes';
                                                                } else {
                                                                    echo 'no';
                                                                }
                                                                ?>' data-exists='<?php echo $ahad ?>' data-professorid='<?php echo get_the_ID(); ?>' >
                            <i class="fa fa-heart-o" aria-hidden='true'></i>
                            <i class="fa fa-heart" aria-hidden='true'></i>
                            <span class="like-count"><?php echo $likeCount->found_posts ?></span>
                        </span>
                        
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>
            <?php
            $relatedPrograms = get_field('related_program');
            if ($relatedPrograms) {
            ?>
                <hr class="section-break">
                <h2>مدرس رشته های زیر:</h2>
                <?php
                foreach ($relatedPrograms as $program) {
                ?>
                    <li class="list-item"><a href='<?php echo get_permalink($program) ?>'><?php echo get_the_title($program) ?></a></li>
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