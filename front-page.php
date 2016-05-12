<?php get_header(); ?>

<div id="home" class="container-fluid">
	<a id="hiring" href="#apply">Now Hiring</a>
	<section id="slider" class="row">
		<h1 class="hidden"><?php bloginfo('name')?> – <?php bloginfo('description');?></h1>

	<?php if( have_rows('background') ):
		$count == 0; ?>
		<div id="carousel" class="carousel slide">
			<div class="carousel-inner">
	   <?php while ( have_rows('background') ) : the_row();
			$image = get_sub_field('image'); ?>
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
				<ul>
					<li class="tab-1"><a href="#food">Dinner</a></li>
					<li class="tab-2"><a href="#drink">Drink</a></li>
					<li class="tab-3"><a href="#lunch">Lunch</a></li>
				</ul>
				<div id="food">
					<?php the_field('food_specials'); ?>
				</div>
				<div id="drink">
					<?php the_field('drink_specials'); ?>
				</div>
				<div id="lunch">
					<?php the_field('lunch_specials'); ?>
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

	<div id="info" class="row equal">
		<div class="col col1 col-sm-4 col-md-3 text-center">
			<ul>
				<li class="tab-1"><a href="#location">Location &amp; Hours</a></li>
				<li class="tab-2"><a href="#about">About</a></li>
				<li class="tab-3"><a href="#photos">Photo Gallery</a></li>
				<li class="tab-4"><a href="#fund">Fundraising</a></li>
			</ul>
			<h2>Now Hiring</h2>
<!-- 			<a href="#" class="btn btn1">View Open Positions</a> -->
			<a id="apply-btn" href="#apply" class="btn btn2">Apply Today</a>
		</div>
		<div class="content col col-sm-8 col-md-7 col-lg-7">
		    <article id="about">
<!-- 			    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/fresh-handmade-tortillas.jpg" alt="Locations" class="img-responsive"/> -->
				<h2>About</h2>
				<?php the_content(); ?>
		    </article>
		    <article id="location">
				<h2>Location &amp; Hours</h2>
				<?php the_field('location'); ?>
				<div class="col-sm-7 col-md-8"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.2040322736807!2d-96.64500524849574!3d40.75753697922555!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x87969617f81f6819%3A0x6bf4c64d97d0029e!2sChevys+Fresh+Mex!5e0!3m2!1sen!2sus!4v1461013916048" width="100%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe></div>
		    </article>
		    <?php if (get_field('gallery')){ ?>
				<article id="photos" class="gallery">
					<h2>Photo Gallery</h2>
				 <?php $images = get_field('gallery');
					if( $images ): ?>
			        <ul>
			            <?php foreach( $images as $image ): ?>
			            <li>
			                <a href="<?php echo $image['sizes']['large']; ?>" class="fancybox" rel="chevys">
			                    <img class="img-responsive" src="<?php echo $image['sizes']['thumbnail']; ?>" alt="<?php echo $image['title']; ?>" />
			                </a>
			            </li>
			            <?php endforeach; ?>
			        </ul>
			    </article>
				<?php endif; ?>
			<?php } ?>
			<article id="fund">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/fundraisers.jpg" alt="Fundraisers" class="img-responsive"/>
				<h2>Fundraising</h2>
				<?php the_field('fundraising'); ?>
		    </article>

	    </div>
	    <div class="col col-md-2 last">
		    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/margarita-special.jpg" alt="Chevys E-Club" class="img-responsive" />
		    <div class="social"><?php wp_nav_menu( array('menu' => 'Social')); ?></div>
	    </div>
	</div>

	<div id="kraft" class="row">
		<div class="container">
		  <?php if( have_rows('specials') ): while ( have_rows('specials') ) : the_row(); ?>
			<div class="col-sm-4">
				<h2><?php the_sub_field('headline'); ?></h2>
				<h3><?php the_sub_field('subheading'); ?></h3>
				<p><?php the_sub_field('paragraph'); ?></p>
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

<?php get_footer(); ?>