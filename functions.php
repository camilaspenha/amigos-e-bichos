<?php
function scripts(){
     wp_deregister_script('jquery');
     wp_register_script('jquery', 'https://code.jquery.com/jquery-1.12.4.min.js', array(), "1.12.4", true);	
     wp_enqueue_script('custom-js', get_stylesheet_directory_uri() . '/js/custom.js', array( 'jquery'), false, true);     
}
add_action('wp_enqueue_scripts','scripts');

// Funções para Limpar o Header
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'start_post_rel_link', 10, 0 );
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_styles', 'print_emoji_styles');

/* Post title*/
function shortcode_page_title() {
    return get_the_title();
}
add_shortcode('page_title', 'shortcode_page_title');

/*Animais*/
function get_cats_shortcode() {			
	$per_page = 8;
    $args = array(
	  'numberposts' => -1,
	  'post_status' => 'publish'
	);
	$post_list = get_posts($args);
	foreach ($post_list as $post) {
		$categories = get_the_category( $post->ID );
		foreach ($categories as $category) {
			if ($category->slug === 'gatos') {
				$ids[] = $post->ID;	
			}
		}
	}
	if (!empty($ids)) {
		$total_posts = sizeof($ids);
		$total_paginas = intdiv($total_posts, $per_page);
		$resto = $total_posts % $per_page;
		if ($resto !== 0) {
			$total_paginas = $total_paginas + 1;
		}
		$carousel_item = $total_paginas - 1;
		echo "<div id='carouselCats' class='d-none d-md-block carousel carousel-animals slide' data-ride='false' data-interval='false'>
			  	<div class='carousel-inner'>
			    	<div class='carousel-item active'>";
					for ($i=0; $i < $per_page; $i++) { /*0 ao 7*/
						if (array_key_exists($i, $ids)) {
							$link = get_permalink($ids[$i]);
							$imagem = get_the_post_thumbnail( $ids[$i], 'thumbnail' );
							$resumo = get_the_excerpt( $ids[$i] );
							$nome = get_the_title( $ids[$i] );
							echo "<div class='card'>
								  	<a href='" . $link . "'>".$imagem."</a>	
								  	<div class='card-body'>
								  		<a href='" . $link . "'><h5 class='card-title'>".$nome."</h5></a>
								  		<p class='card-text'>".$resumo."</p>    
								  	</div>
								</div> ";
						}					 	
					}
					$ultima_posicao = $i;/*7*/					
					 echo "</div>";
		for ($i=0; $i < $carousel_item; $i++) { 
			echo "<div class='carousel-item'>";
			$novo_ciclo = $ultima_posicao;
			if ($ultima_posicao === 7) {
				$novo_ciclo = $ultima_posicao + 1;	/*8*/
			}			
			$quebra = $novo_ciclo + $per_page;
				for ($j=$novo_ciclo; $j < $quebra; $j++) { 
					if (array_key_exists($j, $ids)) {
						$link = get_permalink($ids[$j]);
						$imagem = get_the_post_thumbnail( $ids[$j], 'thumbnail' );
						$resumo = get_the_excerpt( $ids[$j] );
						$nome = get_the_title( $ids[$j] );
						echo "<div class='card'>
							  	<a href='" . $link . "'>".$imagem."</a>	
							  	<div class='card-body'>
							    	<h5 class='card-title'>".$nome."</h5>
							    	<p class='card-text'>".$resumo."</p>    
							  	</div>
							</div> ";
					}					
				}
				$ultima_posicao = $j;
				echo "</div>";
		}
		echo "</div>";
		if ($carousel_item > 1) {
			echo " <a class='carousel-control-prev' href='#carouselCats' role='button' data-slide='prev'>
				    <span class='carousel-control-prev-icon' aria-hidden='true'></span>
				    	<i class='fas fa-chevron-circle-left'></i>
				    <span class='sr-only'>Anterior</span>
				  </a>
				  <a class='carousel-control-next' href='#carouselCats' role='button' data-slide='next'>
				    <span class='carousel-control-next-icon' aria-hidden='true'></span>
				    	<i class='fas fa-chevron-circle-right'></i>
				    <span class='sr-only'>Próximo</span>
				  </a> ";
		}
		echo "</div>";							
	} 			
	//return $post_list;
}
add_shortcode('get_cats', 'get_cats_shortcode');

function get_cats_mobile_shortcode() {
	$per_page = 1;
    $args = array(
	  'numberposts' => -1,
	  'post_status' => 'publish'
	);
	$post_list = get_posts($args);
	foreach ($post_list as $post) {
		$categories = get_the_category( $post->ID );
		foreach ($categories as $category) {
			if ($category->slug === 'gatos') {
				$ids[] = $post->ID;	
			}
		}
	}	
	if (!empty($ids)) {
		$total_posts = sizeof($ids);
		$total_paginas = intdiv($total_posts, $per_page);
		$resto = $total_posts % $per_page;
		if ($resto !== 0) {
			$total_paginas = $total_paginas + 1;
		}
		$carousel_item = $total_paginas - 2;
		echo "<div id='carouselCatsMobile' class='d-block d-md-none carousel-mobile carousel carousel-animals slide ' data-ride='false' data-interval='false'>
			  	<div class='carousel-inner'>
			    	<div class='carousel-item active'>";
					for ($i=0; $i < $per_page; $i++) { /*0 ao 7*/
						if (array_key_exists($i, $ids)) {
							$link = get_permalink($ids[$i]);
							$imagem = get_the_post_thumbnail( $ids[$i], 'thumbnail' );
							$resumo = get_the_excerpt( $ids[$i] );
							$nome = get_the_title( $ids[$i] );
							echo "<div class='card'>
								  	<a href='" . $link . "'>".$imagem."</a>	
								  	<div class='card-body'>
								  		<a href='" . $link . "'><h5 class='card-title'>".$nome."</h5></a>
								  		<p class='card-text'>".$resumo."</p>    
								  	</div>
								</div> ";
						}					 	
					}
					$ultima_posicao = $i;/*7*/					
					echo "</div>";
		for ($i=0; $i < $carousel_item; $i++) { 
			echo "<div class='carousel-item'>";
			$novo_ciclo = $ultima_posicao;
			if ($ultima_posicao === 7) {
				$novo_ciclo = $ultima_posicao + 1;	/*8*/
			}			
			$quebra = $novo_ciclo + $per_page;
				for ($j=$novo_ciclo; $j < $quebra; $j++) { 
					if (array_key_exists($j, $ids)) {
						$link = get_permalink($ids[$j]);
						$imagem = get_the_post_thumbnail( $ids[$j], 'thumbnail' );
						$resumo = get_the_excerpt( $ids[$j] );
						$nome = get_the_title( $ids[$j] );
						echo "<div class='card'>
							  	<a href='" . $link . "'>".$imagem."</a>	
							  	<div class='card-body'>
							    	<h5 class='card-title'>".$nome."</h5>
							    	<p class='card-text'>".$resumo."</p>    
							  	</div>
							</div> ";
					}					
				}
				$ultima_posicao = $j;
				echo "</div>";
		}
		echo "</div>";
		if ($carousel_item > 0) {
			echo " <a class='carousel-control-prev' href='#carouselCatsMobile' role='button' data-slide='prev'>
				    <span class='carousel-control-prev-icon' aria-hidden='true'></span>
				    	<i class='fas fa-chevron-circle-left'></i>
				    <span class='sr-only'>Anterior</span>
				  </a>
				  <a class='carousel-control-next' href='#carouselCatsMobile' role='button' data-slide='next'>
				    <span class='carousel-control-next-icon' aria-hidden='true'></span>
				    	<i class='fas fa-chevron-circle-right'></i>
				    <span class='sr-only'>Próximo</span>
				  </a> ";
		}
		echo "</div>";							
	} 			
	//return $post_list;
}
add_shortcode('get_cats_mobile', 'get_cats_mobile_shortcode');

function get_dogs_shortcode() {
	$per_page = 8;
    $args = array(
	  'numberposts' => -1,
	  'post_status' => 'publish'
	);
	$post_list = get_posts($args);
	foreach ($post_list as $post) {
		$categories = get_the_category( $post->ID );
		foreach ($categories as $category) {
			if ($category->slug === 'caes') {
				$ids[] = $post->ID;	
			}
		}
	}	
	if (!empty($ids)) {
		$total_posts = sizeof($ids);
		$total_paginas = intdiv($total_posts, $per_page);
		$resto = $total_posts % $per_page;
		if ($resto !== 0) {
			$total_paginas = $total_paginas + 1;
		}
		$carousel_item = $total_paginas - 1;
		echo "<div id='carouselDogs' class='d-none d-md-block carousel carousel-animals slide' data-ride='false' data-interval='false'>
			  	<div class='carousel-inner'>
			    	<div class='carousel-item active'>";
					for ($i=0; $i < $per_page; $i++) { /*0 ao 7*/
						if (array_key_exists($i, $ids)) {
							$link = get_permalink($ids[$i]);
							$imagem = get_the_post_thumbnail( $ids[$i], 'thumbnail' );
							$resumo = get_the_excerpt( $ids[$i] );
							$nome = get_the_title( $ids[$i] );
							echo "<div class='card'>
								  	<a href='" . $link . "'>".$imagem."</a>	
								  	<div class='card-body'>
								  		<a href='" . $link . "'><h5 class='card-title'>".$nome."</h5></a>
								  		<p class='card-text'>".$resumo."</p>    
								  	</div>
								</div> ";
						}					 	
					}
					$ultima_posicao = $i;/*7*/					
					echo "</div>";
		for ($i=0; $i < $carousel_item; $i++) { 
			echo "<div class='carousel-item'>";
			$novo_ciclo = $ultima_posicao;
			if ($ultima_posicao === 7) {
				$novo_ciclo = $ultima_posicao + 1;	/*8*/
			}			
			$quebra = $novo_ciclo + $per_page;
				for ($j=$novo_ciclo; $j < $quebra; $j++) { 
					if (array_key_exists($j, $ids)) {
						$link = get_permalink($ids[$j]);
						$imagem = get_the_post_thumbnail( $ids[$j], 'thumbnail' );
						$resumo = get_the_excerpt( $ids[$j] );
						$nome = get_the_title( $ids[$j] );
						echo "<div class='card'>
							  	<a href='" . $link . "'>".$imagem."</a>	
							  	<div class='card-body'>
							    	<h5 class='card-title'>".$nome."</h5>
							    	<p class='card-text'>".$resumo."</p>    
							  	</div>
							</div> ";
					}					
				}
				$ultima_posicao = $j;
				echo "</div>";
		}
		echo "</div>";
		if ($carousel_item > 0) {
			echo " <a class='carousel-control-prev' href='#carouselDogs' role='button' data-slide='prev'>
				    <span class='carousel-control-prev-icon' aria-hidden='true'></span>
				    	<i class='fas fa-chevron-circle-left'></i>
				    <span class='sr-only'>Anterior</span>
				  </a>
				  <a class='carousel-control-next' href='#carouselDogs' role='button' data-slide='next'>
				    <span class='carousel-control-next-icon' aria-hidden='true'></span>
				    	<i class='fas fa-chevron-circle-right'></i>
				    <span class='sr-only'>Próximo</span>
				  </a> ";
		}
		echo "</div>";							
	} 			
	//return $post_list;
}
add_shortcode('get_dogs', 'get_dogs_shortcode');

function get_dogs_mobile_shortcode() {
	$per_page = 1;
    $args = array(
	  'numberposts' => -1,
	  'post_status' => 'publish'
	);
	$post_list = get_posts($args);
	foreach ($post_list as $post) {
		$categories = get_the_category( $post->ID );
		foreach ($categories as $category) {
			if ($category->slug === 'caes') {
				$ids[] = $post->ID;	
			}
		}
	}	
	if (!empty($ids)) {
		$total_posts = sizeof($ids);
		$total_paginas = intdiv($total_posts, $per_page);
		$resto = $total_posts % $per_page;
		if ($resto !== 0) {
			$total_paginas = $total_paginas + 1;
		}
		$carousel_item = $total_paginas - 2;
		echo "<div id='carouselDogsMobile' class='d-block d-md-none carousel-mobile carousel carousel-animals slide ' data-ride='false' data-interval='false'>
			  	<div class='carousel-inner'>
			    	<div class='carousel-item active'>";
					for ($i=0; $i < $per_page; $i++) { /*0 ao 7*/
						if (array_key_exists($i, $ids)) {
							$link = get_permalink($ids[$i]);
							$imagem = get_the_post_thumbnail( $ids[$i], 'thumbnail' );
							$resumo = get_the_excerpt( $ids[$i] );
							$nome = get_the_title( $ids[$i] );
							echo "<div class='card'>
								  	<a href='" . $link . "'>".$imagem."</a>	
								  	<div class='card-body'>
								  		<a href='" . $link . "'><h5 class='card-title'>".$nome."</h5></a>
								  		<p class='card-text'>".$resumo."</p>    
								  	</div>
								</div> ";
						}					 	
					}
					$ultima_posicao = $i;/*7*/					
					echo "</div>";
		for ($i=0; $i < $carousel_item; $i++) { 
			echo "<div class='carousel-item'>";
			$novo_ciclo = $ultima_posicao;
			if ($ultima_posicao === 7) {
				$novo_ciclo = $ultima_posicao + 1;	/*8*/
			}			
			$quebra = $novo_ciclo + $per_page;
				for ($j=$novo_ciclo; $j < $quebra; $j++) { 
					if (array_key_exists($j, $ids)) {
						$link = get_permalink($ids[$j]);
						$imagem = get_the_post_thumbnail( $ids[$j], 'thumbnail' );
						$resumo = get_the_excerpt( $ids[$j] );
						$nome = get_the_title( $ids[$j] );
						echo "<div class='card'>
							  	<a href='" . $link . "'>".$imagem."</a>	
							  	<div class='card-body'>
							    	<h5 class='card-title'>".$nome."</h5>
							    	<p class='card-text'>".$resumo."</p>    
							  	</div>
							</div> ";
					}					
				}
				$ultima_posicao = $j;
				echo "</div>";
		}
		echo "</div>";
		if ($carousel_item > 0) {
			echo " <a class='carousel-control-prev' href='#carouselDogsMobile' role='button' data-slide='prev'>
				    <span class='carousel-control-prev-icon' aria-hidden='true'></span>
				    	<i class='fas fa-chevron-circle-left'></i>
				    <span class='sr-only'>Anterior</span>
				  </a>
				  <a class='carousel-control-next' href='#carouselDogsMobile' role='button' data-slide='next'>
				    <span class='carousel-control-next-icon' aria-hidden='true'></span>
				    	<i class='fas fa-chevron-circle-right'></i>
				    <span class='sr-only'>Próximo</span>
				  </a> ";
		}
		echo "</div>";							
	} 			
	//return $post_list;
}
add_shortcode('get_dogs_mobile', 'get_dogs_mobile_shortcode');

function get_all_shortcode() {
	$per_page = 8;
    $args = array(
	  'numberposts' => -1,
	  'post_status' => 'publish'
	);
	$post_list = get_posts($args);
	foreach ($post_list as $post) {
		$categories = get_the_category( $post->ID );
		foreach ($categories as $category) {			
			$ids[] = $post->ID;			
		}
	}	
	if (!empty($ids)) {
		$total_posts = sizeof($ids);
		$total_paginas = intdiv($total_posts, $per_page);
		$resto = $total_posts % $per_page;
		if ($resto !== 0) {
			$total_paginas = $total_paginas + 1;
		}
		$carousel_item = $total_paginas - 1;
		echo "<div id='carouselAll' class='d-none d-md-block carousel carousel-animals slide' data-ride='false' data-interval='false'>
			  	<div class='carousel-inner'>
			    	<div class='carousel-item active'>";
					for ($i=0; $i < $per_page; $i++) { /*0 ao 7*/
						if (array_key_exists($i, $ids)) {
							$link = get_permalink($ids[$i]);
							$imagem = get_the_post_thumbnail( $ids[$i], 'thumbnail' );
							$resumo = get_the_excerpt( $ids[$i] );
							$nome = get_the_title( $ids[$i] );
							echo "<div class='card'>
								  	<a href='" . $link . "'>".$imagem."</a>	
								  	<div class='card-body'>
								  		<a href='" . $link . "'><h5 class='card-title'>".$nome."</h5></a>
								  		<p class='card-text'>".$resumo."</p>    
								  	</div>
								</div> ";
						}					 	
					}
					$ultima_posicao = $i;/*7*/					
					 echo "</div>";
		for ($i=0; $i < $carousel_item; $i++) { 
			echo "<div class='carousel-item'>";
			$novo_ciclo = $ultima_posicao;
			if ($ultima_posicao === 7) {
				$novo_ciclo = $ultima_posicao + 1;	/*8*/
			}			
			$quebra = $novo_ciclo + $per_page;
				for ($j=$novo_ciclo; $j < $quebra; $j++) { 
					if (array_key_exists($j, $ids)) {
						$link = get_permalink($ids[$j]);
						$imagem = get_the_post_thumbnail( $ids[$j], 'thumbnail' );
						$resumo = get_the_excerpt( $ids[$j] );
						$nome = get_the_title( $ids[$j] );
						echo "<div class='card'>
							  	<a href='" . $link . "'>".$imagem."</a>	
							  	<div class='card-body'>
							    	<h5 class='card-title'>".$nome."</h5>
							    	<p class='card-text'>".$resumo."</p>    
							  	</div>
							</div> ";
					}					
				}
				$ultima_posicao = $j;
				echo "</div>";
		}
		echo "</div>";
		if ($carousel_item > 0) {
			echo " <a class='carousel-control-prev' href='#carouselAll' role='button' data-slide='prev'>
				    <span class='carousel-control-prev-icon' aria-hidden='true'></span>
				    	<i class='fas fa-chevron-circle-left'></i>
				    <span class='sr-only'>Anterior</span>
				  </a>
				  <a class='carousel-control-next' href='#carouselAll' role='button' data-slide='next'>
				    <span class='carousel-control-next-icon' aria-hidden='true'></span>
				    	<i class='fas fa-chevron-circle-right'></i>
				    <span class='sr-only'>Próximo</span>
				  </a> ";
		}
		echo "</div>";							
	} 			
	//return $post_list;
}
add_shortcode('get_all', 'get_all_shortcode');

function get_all_mobile_shortcode() {
	$per_page = 1;
    $args = array(
	  'numberposts' => -1,
	  'post_status' => 'publish'
	);
	$post_list = get_posts($args);
	foreach ($post_list as $post) {
		$categories = get_the_category( $post->ID );
		foreach ($categories as $category) {			
			$ids[] = $post->ID;	
		}
	}	
	if (!empty($ids)) {
		$total_posts = sizeof($ids);
		$total_paginas = intdiv($total_posts, $per_page);
		$resto = $total_posts % $per_page;
		if ($resto !== 0) {
			$total_paginas = $total_paginas + 1;
		}
		$carousel_item = $total_paginas - 2;
		echo "<div id='carouselAllMobile' class='d-block d-md-none carousel-mobile carousel carousel-animals slide ' data-ride='false' data-interval='false'>
			  	<div class='carousel-inner'>
			    	<div class='carousel-item active'>";
					for ($i=0; $i < $per_page; $i++) { /*0 ao 7*/
						if (array_key_exists($i, $ids)) {
							$link = get_permalink($ids[$i]);
							$imagem = get_the_post_thumbnail( $ids[$i], 'thumbnail' );
							$resumo = get_the_excerpt( $ids[$i] );
							$nome = get_the_title( $ids[$i] );
							echo "<div class='card'>
								  	<a href='" . $link . "'>".$imagem."</a>	
								  	<div class='card-body'>
								  		<a href='" . $link . "'><h5 class='card-title'>".$nome."</h5></a>
								  		<p class='card-text'>".$resumo."</p>    
								  	</div>
								</div> ";
						}					 	
					}
					$ultima_posicao = $i;/*7*/					
					echo "</div>";
		for ($i=0; $i < $carousel_item; $i++) { 
			echo "<div class='carousel-item'>";
			$novo_ciclo = $ultima_posicao;
			if ($ultima_posicao === 7) {
				$novo_ciclo = $ultima_posicao + 1;	/*8*/
			}			
			$quebra = $novo_ciclo + $per_page;
				for ($j=$novo_ciclo; $j < $quebra; $j++) { 
					if (array_key_exists($j, $ids)) {
						$link = get_permalink($ids[$j]);
						$imagem = get_the_post_thumbnail( $ids[$j], 'thumbnail' );
						$resumo = get_the_excerpt( $ids[$j] );
						$nome = get_the_title( $ids[$j] );
						echo "<div class='card'>
							  	<a href='" . $link . "'>".$imagem."</a>	
							  	<div class='card-body'>
							    	<h5 class='card-title'>".$nome."</h5>
							    	<p class='card-text'>".$resumo."</p>    
							  	</div>
							</div> ";
					}					
				}
				$ultima_posicao = $j;
				echo "</div>";
		}
		echo "</div>";
		if ($carousel_item > 0) {
			echo " <a class='carousel-control-prev' href='#carouselAllMobile' role='button' data-slide='prev'>
				    <span class='carousel-control-prev-icon' aria-hidden='true'></span>
				    	<i class='fas fa-chevron-circle-left'></i>
				    <span class='sr-only'>Anterior</span>
				  </a>
				  <a class='carousel-control-next' href='#carouselAllMobile' role='button' data-slide='next'>
				    <span class='carousel-control-next-icon' aria-hidden='true'></span>
				    	<i class='fas fa-chevron-circle-right'></i>
				    <span class='sr-only'>Próximo</span>
				  </a> ";
		}
		echo "</div>";							
	} 			
	//return $post_list;
}
add_shortcode('get_all_mobile', 'get_all_mobile_shortcode');
?>