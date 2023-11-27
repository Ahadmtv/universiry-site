<?php
get_header();
if(have_posts()){
    while(have_posts()){
        the_post();
        banner(array(
            'title'=>'یادداشت ها',
            'subtitle'=>'مطالب مهم رو میتونی اینجا برای خودت ذخیره کنی',
            'photo'=>''
        ));
        ?>

        <div class="container container--narrow page-section">
            <div class="create-note">
                <h2 class="headline headline--medium">یادداشت جدید</h2>
                <input class="new-note-title" placeholder="عنوان">
                <textarea class="new-note-body" placeholder='یادداشت'></textarea>
                <span class="submit-note">افزودن</span>
            </div>
            <ul class='min-list link-list' id='my-notes'>
                <?php 
                $notes=new WP_Query(array(
                    'post_type'=> 'note',
                    'posts_per_page'=> -1,
                    'author'=> get_current_user_id()
                ));
                if($notes->have_posts()){
                    while($notes->have_posts()){
                        $notes->the_post();
                        ?>
                        <li data-state='readonly' data-id='<?php the_ID(); ?>'>
                            <input readonly class="text-place note-title-field" value="<?php echo str_replace('خصوصی: ','',esc_attr(get_the_title()) ) ?>">
                           <i class='fa fa-pencil edit-note' aria-hidden="true">ویرایش          </i>
                           <i class='fa fa-trash delete-note' aria-hidden="true">حذف</i>
                            <textarea readonly class="text-place note-body-field"><?php echo get_the_content(); ?></textarea>
                            <i class='update-note btn btn--blue btn--small fa fa-arrow-left' aria-hidden="true">ذخیره</i>
                        </li>
                        <?php
                    }
                }

                ?>
            </ul>
        </div>
        <?php
    }
} echo paginate_links();
get_footer();


?>