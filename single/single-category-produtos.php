<?php get_header(); ?>
	<div id="primary">
		<div id="main">
			<div class="container">
				<?php 

				while( have_posts() ): the_post();

				?>	


					<article id="post-<?php the_ID();?>" <?php post_class(); ?>>
    
        <header>
        <h1 class="text-center"><?php the_title(); ?></h1>
		
        </header>

        <hr>

    <div class="content">
        <div class="row"><?php the_post_thumbnail('large',array('class' => 'produtos_p_img')); ?></div>

        <hr>
        
        <div class="row"><?php the_content(); ?></div>
    </div>

</article>

					
			    <?php

				endwhile;

				?>
			</div>
		</div>
	</div>
<?php get_footer(); ?>