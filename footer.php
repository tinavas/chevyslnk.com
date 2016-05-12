	</div><!-- end .wrapper -->

	<?php get_sidebar();?>
	<div class="clearfix"></div>
	<footer id="footer" class="container-fluid">
        <nav class="social col-sm-4">
            <h5 class="hidden">Social Navigation</h5>
            <?php wp_nav_menu( array('menu' => 'Social')); ?>
        </nav>
        <div class="col-md-8 text-right">
<!--
			<nav>
	            <h5 class="hidden">Corporate Navigation</h5>
	            <?php wp_nav_menu( array('menu' => 'Corporate')); ?>
	        </nav>
-->
		    <p class="copyright">&copy; <?php echo date('Y');?> <?php bloginfo('name'); ?>. All Rights Reserved.</p>
	    </div>
	</footer>

  </body>
</html>
<?php wp_footer();?>