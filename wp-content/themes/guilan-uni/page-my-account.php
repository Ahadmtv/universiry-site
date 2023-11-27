<?php
get_header();?>
<div class="wrapper">
	<div class="main-card-info">
	<?php
if(have_posts()){
while(have_posts()){
	the_post();
	the_content();
}
}
?>
	</div>
</div>
<?php
get_footer();
?>