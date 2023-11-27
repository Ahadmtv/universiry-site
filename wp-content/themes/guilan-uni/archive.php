<?php
get_header();
?>
<div class="page-banner">
  <div class="page-banner__bg-image"
    style="background-image: url(<?php echo get_template_directory_uri() ?>/images/ocean.jpg)"></div>
  <div class="page-banner__content container container--narrow">
    <h1 class="page-banner__title"><?php if(is_category()){ echo get_the_category()[0]->cat_name;}else if(is_author()){the_author();}else if(is_date()){echo get_the_time('d F Y');

    } ?></h1>
    <div class="page-banner__intro">
      <p><?php the_archive_description(); ?></p>
    </div>
  </div>
</div>

<div class="container container--narrow page-section">
  <?php if (have_posts()) {
    while (have_posts()) {
      the_post();
      ?>
      <div class="metabox metabox--position-up metabox--with-home-link">
        <p>
          <a class="metabox__blog-home-link" href="<?php echo site_url('');?>"><i class="fa fa-home" aria-hidden="true"></i> بازگشت به  خانه</a> <span class="metabox__main"> مطالب</span>
        </p>
      </div>
      <div class="post-item">
        <h2><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
        <div class="metabox">
          <span>نوشته شده توسط <?php the_author_posts_link();?> در  <?php echo get_the_time('d F Y');?>(<?php echo get_the_category_list(',');?>) </span>
        </div>
        <p>ورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است، چاپگ در تبخئ
          سخرئخحخح یبوخو مماکک ککصممحقبمج محمحمبحمف محجمحج وجو ججج و</p>
        <div class="readmore">
          <a href="#">ادامه مطلب</a>
        </div>
      </div>
      <?php
    }
  } echo paginate_links();?>
    </div>



<?php
get_footer();
?>