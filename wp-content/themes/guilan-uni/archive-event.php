<?php
get_header();
banner(array(
    'title' => 'رویداد ها',
    'subtitle' => 'مسابقات ،جشن ها و مراسمات دانشگاه را اینجا دنبال کنید',
    'photo' => ''
));
?>


<div class="container container--narrow page-section">
    <?php if (have_posts()) {
        while (have_posts()) {
            the_post();
            ?>
            <div class="metabox metabox--position-up metabox--with-home-link">
                <p>
                    <a class="metabox__blog-home-link" href="<?php echo site_url(''); ?>"><i class="fa fa-home"
                            aria-hidden="true"></i> بازگشت به خانه</a> <span class="metabox__main"> رویداد ها</span>
                </p>
            </div>
            <div class="post-item">
                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <div class="metabox">
                    <span>نوشته شده توسط
                        <?php the_author_posts_link(); ?> در
                        <?php echo get_the_time('d F Y'); ?>(
                        <?php echo get_the_category_list(','); ?>)
                    </span>
                </div>
                <p><?php echo wp_trim_words(get_the_content(), 18); ?></p>
                <div class="btnmn readmore">
                    <a href="<?php the_permalink(); ?>">ادامه مطلب</a>
                </div>
            </div>
            <?php
        }
    }
   echo paginate_links(); ?>
</div>



<?php
get_footer();
?>