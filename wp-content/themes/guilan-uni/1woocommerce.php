<?php get_header(); ?>
<section class="slidermn">
  <div class="swiper mySwiper">
    <div class="swiper-wrapper">
      <div class="swiper-slide"><img src="<?php echo get_template_directory_uri() . '/shopitems/images/2880_1667657509745711.jpg' ?>"></div>
      <div class="swiper-slide"><img src="<?php echo get_template_directory_uri() . '/shopitems/images/2880_16994515555855587.webp' ?>"></div>
      <div class="swiper-slide"><img src="<?php echo get_template_directory_uri() . '/shopitems/images/2880_1699451853752046.webp' ?>"></div>
    </div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-pagination"></div>
  </div>
</section>
<div class="wrapper">
  <section class="fasele"></section>
  <section class="products">
    <div class="ahad myAhad">
      <div class="ahad-wrapper">
        <?php
            function trim_number($num)
            {
            $eng = array('0','1','2','3','4','5','6','7','8','9');
            $per = array('۰','۱','۲','۳','۴','۵','۶','۷','۸','۹');
            return str_replace($eng,$per,$num);
            }

        $ahad = new WP_query(array(
          'post_type' => 'product',
          'post_per_page'=>10
        ));

        if ($ahad->have_posts()) : while ($ahad->have_posts()) : $ahad->the_post();
            if (!defined('ABSPATH')) {
              exit; // Exit if accessed directly
            }

            global $product;
        ?>
            <div class="ahad-slide">
              <div class="single-product-wrapper">
                <a href="<?php echo get_permalink($product->get_id()); ?>">
                <div class="single-product-img">
                  <?php echo $product->get_image();
                  $sale_price = get_post_meta(get_the_ID(), '_sale_price', true);
                                    if ($sale_price) { ?>
                                      <h3>تخفیف</h3>
                                    <?php
                                    }
                                    ?>
                </div>
                <div class="single-product-title"> 
                  <span><?php echo $product->get_name(); ?></span>
                </div>
                <div class="single-product-price">
                  <?php if ($sale_price) { ?>
                  <span class='single-product-off'><?php echo trim_number(round(100 - (($product->get_sale_price()/$product->get_regular_price())*100))).'%' ; ?></span>
                  <?php
                  }
                  ?>
                  <span class="single-product-price-sec" ><?php echo trim_number($product->get_price()).' '.'تومان';  ?></span>
                  <div class="clearfix"></div>
                </div>
                <?php if ($sale_price) { ?>
                <div class="is-onsale-price">
                  <span><del><?php echo trim_number($product->get_regular_price());  ?></del></span>
                </div>
                <?php
                  }
                  ?>
                </a>
              </div>
            </div>
        <?php endwhile;
        endif; ?>
      </div>
      <div class="ahad-pagination"></div>
    </div>
  </section>
</div>
<?php get_footer(); ?>