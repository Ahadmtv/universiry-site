<?php
add_action('rest_api_init','universityAddData');
function universityAddData(){
register_rest_route('university/v1','info',array(
    'methods'=>WP_REST_Server::READABLE,
    'callback'=>'uniAdd'
));
}
function uniAdd($data){
   $result=new WP_Query(array(
    'post_type'=>array('post','page','program','event','profesor'),
    's'=> $data['search']
   ));
   $resultData=array(
    'general'=>array(),
    'profesor'=>array(),
    'program'=>array(),
    'event'=>array()
   );
   if($result->have_posts()){
    while($result->have_posts()){
        $result->the_post();
        if(get_post_type() == 'post' or get_post_type()=='page'){
            array_push($resultData['general'], array(
                'title'=>get_the_title(),
                'author'=>get_the_author(),
                'link'=>get_permalink(),
                'post_type'=>get_post_type()
            ));
        }
        if(get_post_type() == 'program'){
            array_push($resultData['program'], array(
                'title'=>get_the_title(),
                'author'=>get_the_author(),
                'link'=>get_permalink(),
                'post_type'=>get_post_type(),
                'id'=>get_the_ID()
            ));
        }
        if(get_post_type() == 'profesor'){
            array_push($resultData['profesor'], array(
                'title'=>get_the_title(),
                'author'=>get_the_author(),
                'link'=>get_permalink(),
                'post_type'=>get_post_type()
            ));
        }
        if(get_post_type() == 'event'){
            array_push($resultData['event'], array(
                'title'=>get_the_title(),
                'author'=>get_the_author(),
                'link'=>get_permalink(),
                'post_type'=>get_post_type()
            ));
        }

   }

}
if($resultData['program']){
    $ahad=array('relation'=>'OR');

    foreach($resultData['program'] as $item){
        array_push($ahad, array(
            'key'=>'related_program',
            'compare'=>'LIKE',
            'value'=>$item['id']
        ));
    }
    
    
    $relatedProfesor=new WP_Query(array(
        'post_type'=>'profesor',
        'meta_query'=>$ahad
    
    ));
    if($relatedProfesor->have_posts()){
        while($relatedProfesor->have_posts()){
            $relatedProfesor->the_post();
            if(get_post_type() == 'profesor'){
                array_push($resultData['profesor'], array(
                    'title'=>get_the_title(),
                    'author'=>get_the_author(),
                    'link'=>get_permalink(),
                    'post_type'=>get_post_type()
                ));
            }
        }
    }
}
$resultData['profesor']=array_values(array_unique($resultData['profesor'],SORT_REGULAR));
return $resultData;
}

?>