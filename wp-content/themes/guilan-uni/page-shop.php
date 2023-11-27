<?php get_header('shop'); ?>
<section class="slider">
  <div class="slide" id="slide-1">
    <img src="<?php echo get_template_directory_uri() . '/shopitems/images/2880_1667657509745711.jpg' ?>" />
  </div>
  <div class="slide" id="slide-2">
    <img src="<?php echo get_template_directory_uri() . '/shopitems/images/2880_16994515555855587.webp' ?>" />
  </div>
  <div class="slide" id="slide-3">
    <img src="<?php echo get_template_directory_uri() . '/shopitems/images/2880_1699451853752046.webp' ?>" />
  </div>
</div>
<div class="button-group">
  <button onclick="changeSlide('slide-1')">1</button>
  <button onclick="changeSlide('slide-2')">2</button>
  <button onclick="changeSlide('slide-3')">3</button>
</section>



<!-- <section class="slidermn">
  <div class="sliderr mySwiper">
    <div class="sliderr-wrapper">
      <div class="sliderr-slide"><img src="<?php echo get_template_directory_uri() . '/shopitems/images/2880_1667657509745711.jpg' ?>"></div>
      <div class="sliderr-slide"><img src="<?php echo get_template_directory_uri() . '/shopitems/images/2880_16994515555855587.webp' ?>"></div>
      <div class="sliderr-slide"><img src="<?php echo get_template_directory_uri() . '/shopitems/images/2880_1699451853752046.webp' ?>"></div>
    </div>
    <div class="sliderr-button-next"></div>
    <div class="sliderr-button-prev"></div>
    <div class="sliderr-pagination"></div>
  </div>
</section> -->
<div class="wrapper">
  <!-- <section class="fasele"></section> -->
  <section class="products swiper-container">
  <div class="swiper-wrapper">
        <?php


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
            <div class="swiper-slide">
              <div class="single-product-wrapper">
                <a href="<?php echo get_permalink($product->get_id()); ?>">
                <div class="single-product-img">
                  <?php echo $product->get_image('profesorMedium');
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
  <div class="swiper-button-next"></div>
<div class="swiper-button-prev"></div>
  </section>
  <!-- <section class="fasele"></section> -->
  <section class="all-products">
    <?php
  $ahadd = new WP_query(array(
          'post_type' => 'product',
          'post_per_page'=>10
        ));

        if ($ahadd->have_posts()) : while ($ahadd->have_posts()) : $ahadd->the_post();
            if (!defined('ABSPATH')) {
              exit; // Exit if accessed directly
            }

            global $product;
            
        ?>
 <div class="ahad-slide flex-item">
              <div class="single-product-wrapper">
                <a href="<?php echo get_permalink($product->get_id()); ?>">
                <div class="single-product-img">
                  <?php echo $product->get_image('profesorMedium');
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
  </section>
  <!-- <section class="fasele"></section> -->
  <section class="products swiper-container">
  <div class="swiper-wrapper">
        <?php


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
            <div class="swiper-slide">
              <div class="single-product-wrapper">
                <a href="<?php echo get_permalink($product->get_id()); ?>">
                <div class="single-product-img">
                  <?php echo $product->get_image('profesorMedium');
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
  <div class="swiper-button-next"></div>
<div class="swiper-button-prev"></div>
  </section>
</div>
<script>
      let currentSlide = 1;
    const totalSlides = 3;
    
    function changeSlide(slideId) {
      let slides = document.getElementsByClassName('slide');
      for(let i = 0; i < slides.length; i++) {
        slides[i].style.opacity = 0;
      }
      document.getElementById(slideId).style.opacity = 1;
      currentSlide++;
    }
    
    // Automatically move to the next slide every 2 seconds
    setInterval(function() {
      if(currentSlide > totalSlides) {
        currentSlide = 1;
      }
      changeSlide('slide-' + currentSlide);
    }, 5000);
</script>
<?php get_footer('shop'); ?>