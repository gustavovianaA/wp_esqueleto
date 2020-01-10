<?php get_header(); ?>
	<div class="content-area">
		<main>
			<section class="slide">
				<?php echo do_shortcode( '[recent_post_slider design="design-1"]' ); ?>
			</section>
			<section class="services">
				<div class="container">
					<h1>Our Services</h1>
					<div class="row">
						<div class="col-sm-4">
							<div class="services-item">
								<?php 
								if( is_active_sidebar( 'services-1' )){
									dynamic_sidebar( 'services-1' );
								}

								?>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="services-item">
								<?php 
								if( is_active_sidebar( 'services-2' )){
									dynamic_sidebar( 'services-2' );
								}

								?>								
							</div>
						</div>
						<div class="col-sm-4">
							<div class="services-item">
								<?php 
								if( is_active_sidebar( 'services-3' )){
									dynamic_sidebar( 'services-3' );
								}

								?>								
							</div>
						</div>
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
			<section class="map">
				<div class="container">
					<div class="row">Mapa</div>
				</div>				
			</section>

           <!-- produtos posts -->
			<section class="produtos">
				<div class="container">
					

					
							<h2 class="text-center ">Produtos</h2>
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
								<figure class="produtos_img"><?php the_post_thumbnail(); ?></figure>					
								
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
								<figure class="produtos_img"><?php the_post_thumbnail(); ?></figure>					
								
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
	  </main>
	</div>
<?php get_footer(); ?>