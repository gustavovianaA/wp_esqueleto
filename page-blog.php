
<?php get_header(); ?>

<img class="img-fluid" src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" />

	<div class="content-area">
		<main>
			<section class="middle-area">
				<div class="container">
					<div class="row">

						<div class="col-8">


							 <!-- produtos posts -->
			<section class="produtos">

					

					
							<h2 class="text-center ">Blog</h2>
						
							<?php 
							// Se houver algum post
							
							$args = array(
    'post_type'         => 'post',
    'posts_per_page'    => 10,
    'category_name'        => 'blog'
);
$the_query = new WP_Query( $args );

							if( $the_query->have_posts() ):
								// Enquanto houver posts, mostre-os pra gente
								while( $the_query->have_posts() ): $the_query->the_post();

							?>

                                 <!-- verifica se há imagem de post, caso haja, exibe -->
								
								<article  style="margin : 50px 0">
								<a href="<?php the_permalink();?>" class="post-link"><h2><?php the_title(); ?></h2></a>

								<?php if(has_post_thumbnail()) : ?>
								
								<!-- IMAGEM DE POST -->
								<?php the_post_thumbnail('large' , array('class'=>'post_img_pre')); ?>					
								
                                <!-- TÍTULO COM LINK / DATA / AUTOR ... -->
								
					            <?php endif; ?>
								 
								<!-- RESUMO -->
							    <?php the_excerpt(); ?> 
							    
							    <!-- LINK POST -->

							    <a href="<?php the_permalink();?>" class="post-link">
							    	<buttom class="btn btn-block btn-info">Ver Detalhes</buttom></a>
                                
                             	</article>

							    
							<?php 
								endwhile;
							else:
							?>

							 <p>Não Há nada para ser mostrado...</p>

							<?php endif; ?>

					

					
			</section>



						</div>
						
						

						
						<?php get_sidebar( 'blog' ); ?>						
					</div>
				</div>				
			</section>      


		</main>
	</div>
<?php get_footer(); ?>