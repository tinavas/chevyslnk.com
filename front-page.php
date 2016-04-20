<?php get_header(); ?>

<div id="home" class="container-fluid">
	<section id="slider" class="row">
		<h1 class="hidden"><?php bloginfo('name')?> – <?php bloginfo('description');?></h1>

	<?php if( have_rows('background') ):
		$count == 0; ?>
		<div id="carousel" class="carousel slide">
			<div class="carousel-inner">
	   <?php while ( have_rows('background') ) : the_row();
			$image = get_sub_field('image'); ?>
				<div class="item <?php if ( $count == 0){ echo 'active';};?>" data-slide-number="<?php echo $count++;?>" style="background:url(<?php echo $image['url'];?>) no-repeat center top; background-size:cover;min-height: 90vh;">
				</div>
	    <?php endwhile; ?>
			</div>
		</div>
	<?php endif; ?>

<!--
		<article id="tabs" class="col-md-3 col-md-offset-1">
			<ul>
				<li class="tab-1"><a href="#food">Food</a></li>
				<li class="tab-2"><a href="#drink">Drink</a></li>
			</ul>
			<div id="food">
				<?php the_field('food_specials'); ?>
			</div>
			<div id="drink">
				<?php the_field('drink_specials'); ?>
			</div>
		</article>
-->

			<div id="food" style="display: none;">
				<?php the_field('food_specials'); ?>
			</div>
			<div id="drink" style="display: none;">
				<?php the_field('drink_specials'); ?>
			</div>
		</article>
	</section>

	<div id="info" class="row equal">
		<div class="col col1 col-sm-6 col-md-3 col-lg-offset-1 text-center">
			<ul>
				<li class="tab-1"><a href="#location">Location &amp; Hours</a></li>
				<li class="tab-2"><a href="#about">About</a></li>
				<li class="tab-3"><a href="#photos">Photo Gallery</a></li>
				<li class="tab-4"><a href="#fund">Fundraising</a></li>
<!--
				<li class="tab-5"><a href="#tequila">Tequila Selection</a></li>
				<li class="tab-6"><a href="#dough">Doughballs</a></li>
-->
			</ul>
			<h2>Now Hiring</h2>
			<a href="#" class="btn btn1">View Open Positions</a>
			<a href="#" class="btn btn2">Apply Today</a>
			<div class="black"></div>
		</div>
		<div class="content col col-sm-6 col-md-7 col-lg-6">
		    <article id="about">
<!-- 			    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/fresh-handmade-tortillas.jpg" alt="Locations" class="img-responsive"/> -->
				<h2>About</h2>
				<?php the_content(); ?>
		    </article>
		    <article id="location">
				<h2>Location &amp; Hours</h2>
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.2040322736807!2d-96.64500524849574!3d40.75753697922555!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x87969617f81f6819%3A0x6bf4c64d97d0029e!2sChevys+Fresh+Mex!5e0!3m2!1sen!2sus!4v1461013916048" width="400" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
				<?php the_field('location'); ?>
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
<!--
		    <article id="tequila">
				<h2>Tequila Selection</h2>
				<?php the_field('tequila'); ?>
		    </article>
		    <article id="dough">
				<h2>Doughballs</h2>
				<?php the_field('dough'); ?>
		    </article>
-->

	    </div>
	    <div class="col-md-2 last">
		    <a target="_blank" href="http://chevys.com/chevys-eclub-signup/"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/Chevys-E-Club.jpg" alt="Chevys E-Club" class="img-responsive" /></a>
		    <div class="social"><?php wp_nav_menu( array('menu' => 'Social')); ?></div>
	    </div>
	</div>

	<div id="kraft" class="row">
		<div class="container">
			<div class="col-md-4"><h2>SUNDAY BRUNCH</h2><h3>Join us for Sunday Brunch buffet!</h3><p>$13.99 for Adults, $5.99 for Kids (6-12). Drinks not included.</p></div>
			<div class="col-md-4"><h2>Tuesday Margaritaville</h2><h3>Join us every Tuesday</h3><p>for 1/2 Price House Margaritas, house and fruit flavors (strawberry, mango, peach, raspberry and seasonal fresh fruit)</p></div>
			<div class="col-md-4"><h2>Endless Enchilada Wednesday</h2><h3>Subtitle</h3><p>Text here</p></div>
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
	    $( "#tabs,#info" ).tabs({
	     // event: "mouseover"
	    });
	    
	    $(".inline").fancybox({
		maxWidth	: 800,
		maxHeight	: 600,
		fitToView	: false,
		width		: '70%',
		height		: '70%',
		autoSize	: false,
		closeClick	: false,
		openEffect	: 'none',
		closeEffect	: 'none'
	});
	});
</script>

<?php get_footer(); ?>