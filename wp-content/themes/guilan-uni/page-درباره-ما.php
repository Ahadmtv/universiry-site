<?php
get_header();
if (have_posts()) {
    while (have_posts()) {
        the_post();
        banner(array(
            'title' => '',
            'subtitle' => '',
            'photo' => ''
        ));
        ?>


        <div class="container container--narrow page-section">
            <?php
            $theparent = wp_get_post_parent_id(get_the_ID());
            if ($theparent) {
                ?>

                <div class="metabox metabox--position-up metabox--with-home-link">
                    <p>
                        <a class="metabox__blog-home-link" href="<?php echo get_the_permalink($theparent);?>"><i class="fa fa-home" aria-hidden="true"></i> بازگشت به
                            <?php echo get_the_title($theparent); ?>
                        </a> <span class="metabox__main">
                            <?php the_title(); ?>
                        </span>
                    </p>
                </div>
                <?php
            }
            ?>


            <div class="page-links">
                <h2 class="page-links__title"><a href="<?php echo get_the_permalink($theparent);?>"><?php echo get_the_title($theparent);?> </a></h2>
                <ul class="min-list">
                    <?php
                    if($theparent){
                        $children=$theparent;
                    }else{
                        $children=get_the_ID();
                    }
                        wp_list_pages(array(
                            'child_of'=>$children,
                            'title_li'=>NULL
                        ));
                    ?>
                </ul>
            </div>

            <div class="generic-content">
                <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است، چاپگرها و متون
                    بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط فعلی تکنولوژی مورد نیاز، و کاربردهای متنوع
                    با هدف بهبود ابزارهای کاربردی می باشد، کتابهای زیادی در شصت و سه درصد گذشته حال و آینده، شناخت فراوان جامعه
                    و متخصصان را می طلبد، تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان.</p>
                <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است، چاپگرها و متون
                    بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط فعلی تکنولوژی مورد نیاز، و کاربردهای متنوع
                    با هدف بهبود ابزارهای کاربردی می باشد، کتابهای زیادی در شصت و سه درصد گذشته حال و آینده، شناخت فراوان جامعه
                    و متخصصان را می طلبد، تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان.</p>
            </div>
        </div>

        <div class="page-section page-section--beige">
            <div class="container container--narrow generic-content">
                <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است، چاپگرها و متون
                    بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط فعلی تکنولوژی مورد نیاز، و کاربردهای متنوع
                    با هدف بهبود ابزارهای کاربردی می باشد، کتابهای زیادی در شصت و سه درصد گذشته حال و آینده، شناخت فراوان جامعه
                    و متخصصان را می طلبد، تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان.</p>

                <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است، چاپگرها و متون
                    بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط فعلی تکنولوژی مورد نیاز، و کاربردهای متنوع
                    با هدف بهبود ابزارهای کاربردی می باشد، کتابهای زیادی در شصت و سه درصد گذشته حال و آینده، شناخت فراوان جامعه
                    و متخصصان را می طلبد، تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان.</p>
            </div>
        </div>



        <?php
    }
}
?>

<?php

get_footer();

?>