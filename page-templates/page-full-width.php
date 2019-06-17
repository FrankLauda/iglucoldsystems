<?php
/*
Template Name: Full Width
*/
get_header(); ?>

<?php

// check if the flexible content field has rows of data
if( have_rows('flexible_content') ):?>

		     <! -- // loop through the rows of data-->

		    <?php while ( have_rows('flexible_content') ) : the_row();?>

		        <?php if( get_row_layout() == '1_column' ):?>

		        	 <! -- // 1 column wysiwyg-->

		        <div class=" <?php if( get_sub_field('full_width_row') == true ) { echo 'full-width'; }?>">
		        	<div class="grid-x">
		  				<div class="cell">
		  					<?php echo get_sub_field('column_1');?>
		  				</div>
		  			</div>
		  		</div>

		  			<! -- // 2 column Wysiwyg-->

		  			<?php elseif( get_row_layout() == '2_column' ):?>

		  		 <div class=" <?php if( get_sub_field('full_width_row') == true ) { echo 'full-width'; }?>">		
		        	<div class="grid-x grid-margin-x">
		  				<div class="cell large-6 medium-12">
		  					<?php echo get_sub_field('column_1');?>
		  				</div>
		  			
		  				<div class="cell large-6 medium-12">
		  					<?php echo get_sub_field('column_2');?>
		  				</div>
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

		        	<div class="grid-x full-width-two-thirds">
		  				<div class="cell large-7 medium-12">
		  					<?php echo get_sub_field('column_1');?>
		  				</div>
		  			
		  				<div class="cell large-5 medium-12">
		  					<?php echo get_sub_field('column_2');?>
		  				</div>
		  			</div>

		  			<! -- // 2 column 70/30 with Slider -->

		  			<?php elseif( get_row_layout() == '2_column_70_30_slider' ):?>

		        	<div class="grid-x full-width-two-thirds">
		  				<div class="cell large-7 medium-12">
		  					
		  					<div class="flexslider">
								<ul class="slides">

									<?php while( have_rows('sml_slider') ): the_row();

										$image = get_sub_field('image');
										$imageurl = $image ['sizes']['sml_slides'];
										$title = get_sub_field('title');
										?>

										<li>
											<p class="slide-title"><?php echo $title;?></p>
											<img src="<?php echo $imageurl;?>">
										</li>


									<?php endwhile; ?>
									</ul>
								</div>
		  				</div>

		  				<div class="cell large-5 medium-12">
		  					<?php echo get_sub_field('column_2');?>
		  				</div>
		  			</div>

		  			<! -- // 3 column Wysiwyg-->

		  		 <div class=" <?php if( get_sub_field('full_width_row') == true ) { echo 'full-width'; }?>">
		  			<?php elseif( get_row_layout() == '3_column' ):?>

		        	<div class="grid-x container grid-margin-x">
		  				<div class="cell large-4">
		  					<?php echo get_sub_field('column_1');?>
		  				</div>
		  			
		  				<div class="cell large-4">
		  					<?php echo get_sub_field('column_2');?>
		  				</div>

		  				<div class="cell large-4">
		  					<?php echo get_sub_field('column_3');?>
		  				</div>
		  			</div>
		  		</div>

					<! -- // 3 column Floating-->

					<?php elseif( get_row_layout() == 'floating_3_column' ):?>

							        	<div class="grid-x full-width-two-thirds">
							  				<div class="cell large-7 medium-12">
							  					<?php echo get_sub_field('image');?>
							  				</div>
							  			
											<div class="cell floating">
							  					<?php echo get_sub_field('floating_image');?>
							  				</div>

							  				<div class="cell hero large-5 medium-12">
							  					<?php echo get_sub_field('text');?>
							  				</div>
							  			</div>
							  		</div>



		        <?php endif;?>

		    <?php endwhile;?>

		 <?php else :?>

		 	// no layouts found

		 <?php endif;?>

<?php get_footer();
