<?php
get_header();
banner(array(
  'title' => 'رشته ها',
  'subtitle' => 'رشته های در حال تدریس',
  'photo' => get_theme_file_uri('/images/inaki-del-olmo-NIJuEQw0RKg-unsplash.jpg')
));
?>


<div class="container container--narrow page-section">
  <?php if (have_posts()) {
    while (have_posts()) {
      the_post();
      ?>
      <div class="metabox metabox--position-up metabox--with-home-link">
        <p>
          <a class="metabox__blog-home-link" href="<?php echo site_url('');?>"><i class="fa fa-home" aria-hidden="true"></i> بازگشت به  خانه</a> <span class="metabox__main"> رشته ها</span>
        </p>
      </div>
      <div class="post-item">
        <h2><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
        <p><?php echo wp_trim_words(get_the_content(), 18); ?></p>
        <div class="btnmn readmore">
          <a href="<?php the_permalink();?>">بیشتر بخوانید</a>
        </div>
      </div>
      <?php
    }
  } echo paginate_links();?>
    </div>



<?php
get_footer();
?>