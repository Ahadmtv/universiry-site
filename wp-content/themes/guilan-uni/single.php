<?php
get_header();
if(have_posts()){
    while(have_posts()){
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
                        <a class="metabox__blog-home-link" href="<?php echo site_url('/مطالب');?>"> بازگشت به مطالب
                        </a> <span class="metabox__main">
                        نوشته شده توسط <?php the_author_posts_link();?> در  <?php echo get_the_time('d F Y'); ?>(<?php echo get_the_category_list(',');?>) 
                        </span>
                    </p>
                </div>
                <p><?php the_content();?></p>
        </div>
        
        
        
        
        
        
        
        <?php
    }
}
get_footer();


?>