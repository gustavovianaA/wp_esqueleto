<?php get_header(); ?>
	<div class="content-area">
		<main>

			<section class="services">
				<div class="container">
					<h1>Serviços</h1>
				
						
							<div class="services-item row">
								<?php 
								if( is_active_sidebar( 'services-1' )){
									dynamic_sidebar( 'services-1' );
								}

								?>
							</div>
					
					
					
					
				</div>				
			</section>
			<section class="middle-area">
				<div class="container">
					<div class="row">
						<?php get_sidebar( 'home' ); ?>
						<div class="news col-md-8">
							<div class="container">
								<h1>Latest News</h1>
								<div class="row">
									<?php 

									$featured = new WP_Query( 'post_type=post&posts_per_page=1&cat=3,6' );

									if( $featured->have_posts() ):
										while( $featured->have_posts() ): $featured->the_post();
									?>

									<div class="col-12">
										<?php get_template_part( 'template-parts/content', 'featured' ); ?>
									</div>

									<?php
										endwhile;
										wp_reset_postdata();
									endif;


									// Segundo Loop
									$args = array(
										'post_type' => 'post',
										'posts_per_page' => 2,
										'category__not_in' => array( 5 ),
										'category__in' => array( 3, 6 ),
										'offset' => 1
									);

									$secondary = new WP_Query( $args );

									if( $secondary->have_posts() ):
										while( $secondary->have_posts() ): $secondary->the_post();
									?>

									<div class="col-sm-6">
										<?php get_template_part( 'template-parts/content', 'secondary' ); ?>
									</div>

									<?php
										endwhile;
										wp_reset_postdata();
									endif;									
									?>
								</div>
							</div>
						</div>						
					</div>
				</div>				
			</section>
		

           <!-- produtos posts -->
			<section class="produtos">
				<div class="container">
					

					
							<h2 class="text-center ">Produtos 1</h2>
							<div  class="row">
							<?php 
							// Se houver algum post
							
							$args = array(
    'post_type'         => 'post',
    'posts_per_page'    => 10,
    'category_name'        => 'produtos'
);
$the_query = new WP_Query( $args );

							if( $the_query->have_posts() ):
								// Enquanto houver posts, mostre-os pra gente
								while( $the_query->have_posts() ): $the_query->the_post();

							?>

                                 <!-- verifica se há imagem de post, caso haja, exibe -->
								
								<article class="col-4 text-center" style="margin : 50px 0">
								<a href="<?php the_permalink();?>" class="post-link"><h3><?php the_title(); ?></h3></a>

								<?php if(has_post_thumbnail()) : ?>
								
								<!-- IMAGEM DE POST -->
								<div class="produtos_img"><? the_post_thumbnail('medium' , array('class'=>'post_img_pre')) ?></div>						
								
                                <!-- TÍTULO COM LINK / DATA / AUTOR ... -->
								
					            <?php endif; ?>
								 
								<!-- RESUMO -->
								<!-- <?php the_excerpt(); ?> -->
							    
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

					

					</div>
				</div>
			</section>


	 <!-- produtos sem links -->
			<section class="produtos">
				<div class="container">
					

					
							<h2 class="text-center ">Produtos 2</h2>
							<div  class="row">
							<?php 
							// Se houver algum post
							
							$args = array(
    'post_type'         => 'post',
    'posts_per_page'    => 10,
    'category_name'        => 'produtos'
);
$the_query = new WP_Query( $args );

							if( $the_query->have_posts() ):
								// Enquanto houver posts, mostre-os pra gente
								while( $the_query->have_posts() ): $the_query->the_post();

							?>

                                 <!-- verifica se há imagem de post, caso haja, exibe -->
								
								<article class="col-4 text-center" style="margin : 50px 0">
								<h3><?php the_title(); ?></h3>

								<?php if(has_post_thumbnail()) : ?>
								
								<!-- IMAGEM DE POST -->
								<div class="produtos_img"><? the_post_thumbnail('medium' , array('class'=>'post_img_pre')) ?></div>					
								
                                <!-- TÍTULO COM LINK / DATA / AUTOR ... -->
								
					            <?php endif; ?>
								 
								<!-- RESUMO -->
								<?php the_excerpt(); ?> 
							    
							    <!-- LINK POST -->

							    
                             	</article>

							    
							 

							<?php 
								endwhile;
							else:
							?>

							 <p>Não Há nada para ser mostrado...</p>

							<?php endif; ?>

					

					</div>
				</div>
			</section>		
	  

<section class="carousel-posts">
<section class="cr_multiplos">   

 <h2 class="text-center py-0 mt-0 mb-4">Carousel - Ex : depoimentos</h2>

 <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
  </ol>

  <div class="carousel-inner">
    

    <?php 
							// Se houver algum post
							
							$args = array(
    'post_type'         => 'post',
    'category_name'        => 'depoimentos'
);
$the_query = new WP_Query( $args );

							if( $the_query->have_posts() ):
								// Enquanto houver posts, mostre-os pra gente
								$count = 1;
								while( $the_query->have_posts() ): $the_query->the_post();
								if($count == 1) {
							?>
								<div class=" carousel-item active">
    							<div class=" container px-5 ">  
    							<section class="cr_cards row"> 

    							<? } ?>
                         
								<!-- monta o início do item de carousel e o título -->
                                 <article class="carousel_item_post col-md-4 text-center ">
     							 <div>
     							 <h3><span class="cr_nome"><?php the_title(); ?></span></h3>

								<?php if(has_post_thumbnail()) : ?>
								
								<!-- IMAGEM DE POST -->
								<? the_post_thumbnail('medium') ?>

												
								
                                <!-- TÍTULO COM LINK / DATA / AUTOR ... -->
								
					            <?php endif; ?>
								 
								<!-- RESUMO -->
								<?php the_excerpt(); ?>
							    
							    <!-- LINK POST -->

							    </div>
                             	</article>

							    
				             <?php if(($count % 3) == 0 ){ ?>

				             </section>
				         		</div>
				         			</div>

				         	<div class=" carousel-item ">
    						<div class=" container px-5 ">  
    						<section class="cr_cards row">

    						<?php } ?>


    						 <?php $count++; ?>

							 <?php endwhile; ?>

							</section>
				         		</div>
				         			</div>

							<? else: ?>

							 <p>Não Há nada para ser mostrado...</p>

							<?php endif; ?>


     

  

   
  </div> <!-- Fim carousel-inner -->
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="cr-control" aria-hidden="true">&lt;</span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="cr-control" aria-hidden="true">&gt;</span>
    <span class="sr-only">Next</span>
  </a>
</div>
</section><!-- fim cr_multilos -->
</section>	

<!-- mapa de localização -->
<section class="map">
				<div class="container">
					<div class="row">Mapa</div>
				</div>				
			</section>


	  </main>
	</div>
<?php get_footer(); ?>