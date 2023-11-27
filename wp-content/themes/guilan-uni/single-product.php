<?php
get_header('shop');

?>
<div class="wrapper">
    <?php
    if (have_posts()) {
        while (have_posts()) {
            the_post();
            if (!defined('ABSPATH')) {
                exit; // Exit if accessed directly
            }
            global $product;
            wc_print_notices();

            
            $attributes = $product->get_attributes();
            
            foreach ($attributes as $attribute) {
                echo '<br><strong>' . wc_attribute_label($attribute->get_name()) . ': </strong>';
                if ($attribute->is_taxonomy()) {
                    echo implode(', ', $attribute->get_terms());
                } else {
                    echo $attribute->get_options()[0];
                }
            }
   
            








    ?>
            <div class="single-product-info">
                <div class="single-product-info-details image-sec">
                    <div><?php echo $product->get_image('profesorMedium'); ?></div>
                    <?php $sale_price = get_post_meta(get_the_ID(), '_sale_price', true);
                    if ($sale_price) { ?>
                        <span>تخفیف</span>
                    <?php
                    }
                    ?>

                </div>
                <div class="single-product-info-details details-sec">
                    <div class="title-description-cat">
                    <div class="title-single-product"><?php echo $product->get_name(); ?></div>
                    <div class="description-single-product"><?php echo $product->get_short_description(); ?></div>
                    <div class="category-single-product"><span><?php $product_cats = wp_get_post_terms(get_the_ID(), 'product_cat');echo $product_cats[0]->name; ?></span></div>                              
                    </div>
                    <div class="price-sec-single-product">
                        <div class="price-single-product"><?php echo trim_number($product->get_price()) . ' ' . 'تومان';  ?></div>
                        <?php if ($sale_price) { ?>
                            <div class="salepercent-single-product"><span><?php echo trim_number(round(100 - (($product->get_sale_price() / $product->get_regular_price()) * 100))) . '%'; ?></span></div>
                            <div class="regularprice-single-product"><del><?php echo trim_number($product->get_regular_price());  ?></del></div> 
                        <?php
                        } ?>
                    </div>
                    <div class="add-to-cart-single-product-sec">
                        <div class="add-button-single-product">
                            <?php
                            if (!$product->is_purchasable()) {
                                return;
                            }

                            echo wc_get_stock_html($product); // WPCS: XSS ok.

                            if ($product->is_in_stock()) : ?>

                                <?php do_action('woocommerce_before_add_to_cart_form'); ?>

                                <form class="cart" action="<?php echo esc_url(apply_filters('woocommerce_add_to_cart_form_action', $product->get_permalink())); ?>" method="post" enctype='multipart/form-data'>
                                    <?php do_action('woocommerce_before_add_to_cart_button'); ?>

                                    <?php
                                    do_action('woocommerce_before_add_to_cart_quantity');

                                    woocommerce_quantity_input(
                                        array(
                                            'min_value'   => apply_filters('woocommerce_quantity_input_min', $product->get_min_purchase_quantity(), $product),
                                            'max_value'   => apply_filters('woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product),
                                            'input_value' => isset($_POST['quantity']) ? wc_stock_amount(wp_unslash($_POST['quantity'])) : $product->get_min_purchase_quantity(), // WPCS: CSRF ok, input var ok.
                                        )
                                    );

                                    do_action('woocommerce_after_add_to_cart_quantity');
                                    ?>

                                    <button type="submit" name="add-to-cart" value="<?php echo esc_attr($product->get_id()); ?>" class="single_add_to_cart_button button alt<?php echo esc_attr(wc_wp_theme_get_element_class_name('button') ? ' ' . wc_wp_theme_get_element_class_name('button') : ''); ?>"><?php echo esc_html($product->single_add_to_cart_text()); ?></button>

                                    <?php do_action('woocommerce_after_add_to_cart_button'); ?>
                                </form>

                                <?php do_action('woocommerce_after_add_to_cart_form'); ?>

                            <?php endif; ?>


                        </div>
                    </div>
                </div>
                <div class="single-product-info-details feature-sec">
                    <div class="feature-sec-container">
                        <div class="tab">
                            <?php $heading2 = apply_filters('woocommerce_product_description_heading', __('Description', 'woocommerce')); ?>
                            <button id='defaultOpen' class="tablinks" onclick="openCity(event, 'Paris')"><?php echo esc_html($heading2); ?></button>
                            <?php $heading1 = apply_filters('woocommerce_product_additional_information_heading', __('Additional information', 'woocommerce')); ?>
                            <button class="tablinks" onclick="openCity(event, 'London')" ><?php echo esc_html($heading1); ?></button>
                        </div>
                        <div id="Paris" class="tabcontent">
                            <p><?php echo $product->get_description(); ?></p>
                        </div>
                        <div id="London" class="tabcontent">
                            <p><?php do_action('woocommerce_product_additional_information', $product); ?></p>
                        </div>


                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>

    <?php
        }
    }

    ?>


</div>



















<?php get_footer('shop'); ?>
<script>  document.getElementById("defaultOpen").click()</script>