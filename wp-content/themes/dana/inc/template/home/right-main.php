<?php if($themeoptions['right-sidebar-panel-status'] == 0) { ?>
<!--=================== right-main  =================================-->
<div class="right-main col-lg-3 col-md-12">
	<div class="row">
		<?php require(get_template_directory() . '/inc/template/home/right-main/widget-bio.php'); ?>
		<?php require(get_template_directory() . '/inc/template/home/right-main/car-widget-note.php'); ?>
	</div>
</div>
<!--===================  end-right-main =================================-->
<?php }?>