<?php
add_action('rest_api_init', 'shopAddData');
function shopAddData()
{
    register_rest_route('myshop/v1', 'info', array(
        'methods' => WP_REST_Server::READABLE,
        'callback' =>'shopAdd'
    ));
}
function shopAdd($data)
{
    $result = new WP_Query(array(
        'post_type' => 'product',
        's' => $data['search']
    ));
$exdata=array(
    'product'=>array(),
);


    if ($result->have_posts()) {
        while ($result->have_posts()) {
            $result->the_post();
            global $product;
array_push($exdata['product'],array(
    'title' => $product->get_name(),
    'link' => get_permalink($product->get_id()),
    'id'=>$product->get_id(),
    'imageurl'=>wp_get_attachment_image_url( $product->get_image_id(), 'full' )
));

        }
    }
    return $exdata;
}
?>



