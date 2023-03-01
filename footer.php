<?php

?>
<?php if(!is_page_template( 'blank-page.php' ) && !is_page_template( 'blank-page-with-container.php' )): ?>
			</div><!-- .row -->
		</div><!-- .container -->
	</div><!-- #content -->
    <?php get_template_part( 'footer-widget' ); ?>    
	<footer id="colophon" class="site-footer <?php echo wp_bootstrap_starter_bg_class(); ?>" role="contentinfo">
		<div class="container pt-3 pb-3">
			<div class="row m-auto" style="max-width: 900px">
				<div class="col-lg-6 redes-sociais text-center">
					<a href="<?php echo esc_url( home_url( '/' )); ?>" title="Site Amigos e Bichos" aria-label="Página inicial do site">
                        <img src="<?php echo esc_url(get_theme_mod( 'wp_bootstrap_starter_logo' )); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" class="logo-footer">
                    </a>
					<span class="acompanhe">Acompanhe-nos também pelas redes sociais!</span>
					<div class="divisor"></div>
					<a href="https://www.facebook.com/AmigoseBichos.SP.Guarulhos/" title="Facebook Amigos e Bichos" aria-label="Visite nossa página no Facebook">
                        <img src="<?php echo get_stylesheet_directory_uri() . '/img/face.png';?>" role="presentation" alt="">                
                    </a>
                    <a href="https://www.instagram.com/amigosebichossp/" title="Instagram Amigos e Bichos" aria-label="Visite nossa página no Instagram" class="ml-1">
                        <img src="<?php echo get_stylesheet_directory_uri() . '/img/insta.png';?>" role="presentation" alt="" class="insta">                
                    </a>
				</div>
				<div class="col-lg-6 text-center">
					<?php 					
					$args = array(
					  'numberposts' => -1,
					  'post_status' => 'publish'
					);
					$latest_posts = get_posts($args);
					foreach ($latest_posts as $latest_post) {
						$IDs[] = $latest_post->ID;						
					} ?>
					<div id="carouselExampleSlidesOnly" class="carousel slide carousel-fade" data-ride="carousel">
					    <div class="carousel-inner">
						  	<?php 
						  		$i = 0;
						  		foreach ($IDs as $id) {	

						  			if ($i === 0 ) {
						  				echo "<div class='carousel-item active'>";				
										echo '<a href="' . get_permalink($id) . '" >';
									    echo get_the_post_thumbnail( $id, 'thumbnail' );
									    echo '</a>';
									    echo "</div>";
						  			} else {
						  				echo "<div class='carousel-item'>";				
										echo '<a href="' . get_permalink($id) . '" >';
									    echo get_the_post_thumbnail( $id, 'thumbnail' );
									    echo '</a>';
									    echo "</div>";
						  			}					  			
								    $i ++;
						  		}
						  	?>	
						</div>
						<a class="carousel-control-prev" href="#carouselExampleSlidesOnly" role="button" data-slide="prev">
							<span class="carousel-control-prev-icon" aria-hidden="true">
								<i class="fas fa-chevron-circle-left"></i>
							</span>
							<span class="sr-only">Anterior</span>
						</a>
						<a class="carousel-control-next" href="#carouselExampleSlidesOnly" role="button" data-slide="next">
							<span class="carousel-control-next-icon" aria-hidden="true">
								<i class="fas fa-chevron-circle-right"></i>
							</span>
							<span class="sr-only">Próximo</span>
						</a>
					</div>
				</div>
			</div>			
            <div class="site-info text-center text-white">
            	<hr class="my-4 border border-white w-75">
                &copy;2020 - <?php echo date('Y'); ?> <?php echo '<a href="'.home_url().'">'.get_bloginfo('name').'- Guarulhos/SP</a>'; ?>
                <span class="sep"> | </span>
                <span>todos os direitos reservados</span>
                <div id="post-link">
					<div class="row m-auto">
						<div class="col-sm-6 p-1 previous">
							<?php
								previous_post_link('%link', '&lt; ficha anterior ', true);
							?>
						</div>
						<div class="col-sm-6 p-1 next">
							<?php
								next_post_link('%link', 'próxima ficha &gt;', TRUE);
							?>
						</div>
					</div>					
				</div>
            </div><!-- close .site-info -->
		</div>
	</footer><!-- #colophon -->
<?php endif; ?>
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>