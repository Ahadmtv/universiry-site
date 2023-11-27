<?php


add_action('rest_api_init','likeData');
function likeData(){
register_rest_route('likeApi/v1','info',array(
    'methods'=>'POST',
    'callback'=>'postApi'
));

register_rest_route('likeApi/v1','info',array(
    'methods'=>'DELETE',
    'callback'=>'deleteApi'
));
function postApi($data){
    if(is_user_logged_in()){
        $professorID= sanitize_text_field($data['ID']);
        $likeExists=new WP_Query(array(
            'author'=>get_current_user_id(),
             'post_type'=> 'like',
             'meta_query'=>array(
                 array(
                     'key'=>'like_professor_id',
                     'compare'=> '=',
                     'value'=> $professorID

                 )
             )
         ));
         if($likeExists->found_posts==0 and get_post_type($professorID) == 'profesor'){
            return wp_insert_post(array(
                'post_type'=> 'like',
                'post_status'=> 'publish',
                'post_title'=> 'ali',
                'meta_input'=> array(
                    'like_professor_id'=>$professorID
                )
        
            ));
         }else{
            die('شما قبلا این استاد را لایک کردید');
         }


    }else{
        die('برای لایک کردن ابتدا وارد شوید');
    }

}
function deleteApi($data){
    $likeID= sanitize_text_field($data['like']);
    if(get_current_user_id()== get_post_field('post_author', $likeID) and get_post_type($likeID) == 'like'){
        wp_delete_post($likeID,true);
    }else{
        die(strval(get_post_field('post_author', $likeID)));
    }

}
}
?>