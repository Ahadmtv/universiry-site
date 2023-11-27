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
                    <a class="metabox__blog-home-link" href="<?php echo site_url('/رویداد ها'); ?>"> رفتن به رویداد ها
                    </a>
                </p>
            </div>
            <p><?php the_content(); ?></p>
            <?php
            $relatedPrograms = get_field('related_program');
            if ($relatedPrograms) {
            ?>
                <hr class="section-break">
                <h2>رشته های مرتبط با موضوع</h2>
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