<?php global $arya_options; ?>
<div class="col-lg-4 pull-left footer-social">
	<ul class="pull-left">
		<?php if($arya_options['fb-address'] != ''){ ?>
			<li><a target="_blank" href="<?php echo $arya_options['fb-address']; ?>"><i class="pro-facebook"></i></a></li>
		<?php } if($arya_options['tw-address'] != ''){ ?>
			<li><a target="_blank" href="<?php echo $arya_options['tw-address']; ?>"><i class="pro-twitter"></i></a></li>
		<?php } if($arya_options['insta-address'] != ''){ ?>
			<li><a target="_blank" href="<?php echo $arya_options['insta-address']; ?>"><i class="pro-instagram"></i></a></li>
		<?php } if($arya_options['gp-address'] != ''){ ?>
			<li><a target="_blank" href="<?php echo $arya_options['gp-address']; ?>"><i class="pro-google"></i></a></li>
		<?php } if($arya_options['telegram-address'] != ''){ ?>
			<li><a target="_blank" href="<?php echo $arya_options['telegram-address']; ?>"><i class="pro-paper-plane"></i></a></li>
		<?php } if($arya_options['linked-address'] != ''){ ?>
			<li><a target="_blank" href="<?php echo $arya_options['linked-address']; ?>"><i class="pro-linkedin"></i></a></li>
		<?php } if($arya_options['footer-social-rss-stat'] == 0){ ?>
			<li><a target="_blank" href="<?php bloginfo('rss2_url'); ?>"><i class="pro-rss-1"></i></a></li>
		<?php } ?>
	</ul>
</div>