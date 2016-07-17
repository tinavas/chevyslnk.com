<?php get_header();?>

<div id="home" class="container-fluid">
	<a id="hiring" href="#apply">Now Hiring</a>
	<section id="slider" class="row">
		<h1 class="hidden"><?php bloginfo('name'); ?> – <?php bloginfo('description'); ?></h1>

	<?php if( have_rows('background_images', 180) ):
		$count == 0; ?>
		<div id="carousel" class="carousel slide">
			<div class="carousel-inner">
	   <?php while ( have_rows('background_images', 180) ) : the_row();
			$image = get_sub_field('image', 180); ?>
				<div class="item <?php if ( $count == 0){ echo 'active';};?>" data-slide-number="<?php echo $count++;?>" style="background:url(<?php echo $image['url'];?>) no-repeat center top; background-size:cover;">
				</div>
	    <?php endwhile; ?>
			</div>
			<a class="carousel-control prev" href="#carousel" data-slide="prev"></a>
			<a class="carousel-control next" href="#carousel" data-slide="next"></a>
		</div>
	<?php endif; ?>
	</section>

	<div style="display: none;">
		<div id="specials" class="text-center">
			<article id="tabs">
				<ul class="nav nav-tabs" id="myTab">
					<li class="specials_item_1 active"><a data-target="#food" data-toggle="tab">Dinner</a></li>
					<li class="specials_item_2"><a data-target="#drink" data-toggle="tab">Drink</a></li>
					<li class="specials_item_3"><a data-target="#lunch" data-toggle="tab">Lunch</a></li>
				</ul>
	
				<div class="tab-content">
					<div class="tab-pane active" id="food"><?php the_field('food_specials', 188); ?></div>
					<div class="tab-pane" id="drink"><?php the_field('drink_specials', 188); ?></div>
					<div class="tab-pane" id="lunch"><?php the_field('lunch_specials', 188); ?></div>
				</div>
			</article>	
		</div>
	</div>

	<div style="display: none;">
		<div id="apply">
			<h2 class="text-center">Job Application</h2>
			<?php echo do_shortcode('[gravityform id="2" title="false" description="false" ajax="true"]'); ?>
		</div>
	</div>



	<div id="kraft" class="row">
		<div class="container">
		  <?php if( have_rows('specials', 2) ): while ( have_rows('specials', 2) ) : the_row(); ?>
			<div class="col-sm-4">
				<h2><?php the_sub_field('headline', 2); ?></h2>
				<h3><?php the_sub_field('subheading', 2); ?></h3>
				<p><?php the_sub_field('paragraph', 2); ?></p>
			</div>
		  <?php endwhile; endif; ?>
		</div>
	</div>

</div>

<script>
	jQuery(function($){
		jQuery('#carousel').carousel({
		    interval: 4000
		});
	});
	jQuery(document).ready(function($) {
	    $("#menu-item-23 a, #apply-btn, #hiring").fancybox({
			maxWidth	: 800,
			maxHeight	: 800,
			padding		: 0,
			fitToView	: true,
			autoSize	: true,
			closeClick	: false,
			openEffect	: 'none',
			closeEffect	: 'fade',
			helpers:  { title:  null }
		});
	    $("#tabs,#info").tabs();
	});
</script>

<?php get_footer();?>