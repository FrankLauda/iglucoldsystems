<?php
/*
Template Name: Front
*/
get_header(); ?>

<header class="front-hero" role="banner">

	<?php if( have_rows('slider') ): ?>

	<div class="flexslider">
		<ul class="slides">

	<?php while( have_rows('slider') ): the_row();

		$image = get_sub_field('image');
		$imageurl = $image['sizes']['slides'];
		$title = get_sub_field('title');
		$short_description = get_sub_field('short_description');
		$slider_link = get_sub_field('slider_link');
		?>

		<li>
			<img src="<?php echo $imageurl;?>">
				<div class="slider-description">
					<h1><?php echo $title;?></h1>
					<p><?php echo $short_description;?></p>
					<a href="<?php echo $slider_link;?>">Find out more</a>
				</div>
		</li>


	<?php endwhile; ?>
	</ul>
</div>

<?php endif; ?>

</header>

	<?php

// check if the flexible content field has rows of data
if( have_rows('flexible_content') ):?>

		     <! -- // loop through the rows of data-->

		    <?php while ( have_rows('flexible_content') ) : the_row();?>

		        <?php if( get_row_layout() == '1_column' ):?>

		        	 <! -- // Full width wysiwyg-->

		        	<div class="grid-x">
		  				<div class="cell">
		  					<?php echo get_sub_field('column_1');?>
		  				</div>
		  			</div>

		  			<! -- // 2 column Wysiwyg-->

		  			<?php elseif( get_row_layout() == '2_column' ):?>

		        	<div class="grid-x grid-margin-x">
		  				<div class="cell small-6">
		  					<?php echo get_sub_field('column_1');?>
		  				</div>
		  			
		  				<div class="cell small-6">
		  					<?php echo get_sub_field('column_2');?>
		  				</div>
		  			</div>

		  			<! -- // 2 column 30/70 -->

		  			<?php elseif( get_row_layout() == '2_column_30_70' ):?>

		        	<div class="grid-x full-width-two-thirds">
		  				<div class="cell large-5 medium-12">
		  					<?php echo get_sub_field('column_1');?>
		  				</div>
		  	
		  				<div class="cell large-7 medium-12">
		  					<?php echo get_sub_field('column_2');?>
		  				</div>
		  			</div>

		  				<! -- // 2 column 70/30 -->

		  			<?php elseif( get_row_layout() == '2_column_70_30' ):?>

		        	<div class="grid-x grid-margin-x">
		  				<div class="cell small-7">
		  					<?php echo get_sub_field('column_1');?>
		  				</div>
		  			
		  				<div class="cell small-5">
		  					<?php echo get_sub_field('column_2');?>
		  				</div>
		  			</div>

		  			<! -- // 3 column Wysiwyg-->

		  			<?php elseif( get_row_layout() == '3_column' ):?>

		        	<div class="grid-x grid-margin-x">
		  				<div class="cell small-4">
		  					<?php echo get_sub_field('column_1');?>
		  				</div>
		  			
		  				<div class="cell small-4">
		  					<?php echo get_sub_field('column_2');?>
		  				</div>

		  				<div class="cell small-4">
		  					<?php echo get_sub_field('column_3');?>
		  				</div>
		  			</div>


		        <?php endif;?>

		    <?php endwhile;?>

		 <?php else :?>

		 	// no layouts found

		 <?php endif;?>

<?php get_footer();

// Can also be used with $(document).ready()