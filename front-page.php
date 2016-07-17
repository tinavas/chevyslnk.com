<?php get_header(); ?>

<div id="home" class="container-fluid">
	<a id="hiring" href="#apply">Now Hiring</a>
	
	<section id="slider" class="row">
		<h1 class="hidden"><?php bloginfo('name')?> – <?php bloginfo('description');?></h1>

	<?php if( have_rows('background') &&  !get_field( 'home_video' ) ):
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
	
	<section id="slider" class="row">
	<?php
	/**
	 * oEmbed Video - YouTube
	 */

		$iframe = get_field('home_video');
		preg_match('/src="(.+?)"/', $iframe, $matches);
		$src = $matches[1];
		
		/**
		 * Substring - YouTube Video ID
		 */
		$str_sub = $src;
		preg_match('/embed\/(.*?)\?/', $str_sub, $match_sub);
		$sub_str_match = $match_sub[1];

		/**
		 * YouTube Embed Parameters
		 */
		$params = array(
			'controls'  	=> 0,
			'hd'        	=> 1,
			'autohide'  	=> 1,
			'autoplay'		=> 1,
			'version'		=> 3,
			'controls'		=> 0,
			'showinfo'		=> 0,
			'wmode'			=> 'opaque',
			'loop'			=> 1,
			'html5'			=> 1,
			'enablejsapi' 	=> 1,
			'playlist'		=> $sub_str_match
		);
		
		/**
		 * ReFormat oEmbed
		 */
		$new_src = add_query_arg($params, $src);
		$iframe = str_replace($src, $new_src, $iframe);
		$attributes = 'frameborder="0"';
		$iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);
		echo '<div class="embed-container">';
		echo $iframe;
		echo '</div>';
		?>
		<style>
			.embed-container { 
				position: relative; 
				padding-bottom: 56.25%;
				height: 0;
				overflow: hidden;
				max-width: 100%;
				height: auto;
			} 
			.embed-container iframe,
			.embed-container object,
			.embed-container embed { 
				position: absolute;
				top: 0;
				left: 0;
				width: 100%;
				height: 100%;
			}
		</style>
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

	<div id="info" class="row equal">
		<div class="col col1 col-sm-4 col-md-3 text-center">
			<ul>
				<li class="tab-1"><a href="#location">Location &amp; Hours</a></li>
				<li class="tab-2"><a href="#about">About</a></li>
				<li class="tab-3"><a href="#photos">Photo Gallery</a></li>
				<li class="tab-4"><a href="#fund">Fundraising</a></li>
			</ul>
			<h2>$200 Bonus-Now Hiring</h2>
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
				<div class="col-sm-7 col-md-8"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.205055167633!2d-96.64542768481041!3d40.75751447932699!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x87969617f7cadfed%3A0x5532f8af454c785a!2s5500+S+56th+St+%231%2C+Lincoln%2C+NE+68516!5e0!3m2!1sen!2sus!4v1464031096113" width="100%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe></div>
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