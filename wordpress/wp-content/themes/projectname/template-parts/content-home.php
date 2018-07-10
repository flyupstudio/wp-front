<?php
/**
 * Template part for displaying page content in page-home.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ProjectName
 */

?>

		<!-- about section -->
		<div id="about" class="about-section">
			<div class="container">	
				<div class="about-section__header">
				<?php
					$about_title = get_field('about_title');
					if($about_title):
				?>
				<div class="title"><?=$about_title?></div>
				<?php endif; ?>
				</div>	
				<div class="about-section__wrap">
				<?php
					$about_text = get_field('about_text');
					if($about_text):
						echo $about_text;
					endif;
				?>
				</div>
			</div>
		</div>
		<!-- advantages section -->
		<div class="advantages-section">
			<div class="container">		
				<?php
					$advantages_title = get_field('advantages_title');
					if($advantages_title):
				?>
				<div class="title"><?=$advantages_title?></div>
				<?php endif; ?>
				<?php if( have_rows('advantages_list') ): ?>
				<div class="advantages-section__items">	
					<?php while( have_rows('advantages_list') ): the_row(); 
						$advantage_icon = get_sub_field('advantage_icon');
						$advantage_title = get_sub_field('advantage_title');
						$advantage_text = get_sub_field('advantage_text');
						?>
						<div class="advantages-section__item">		
						<?php if( $advantage_icon ): ?>
							<div class="advantages-section__image">
								<img src="<?=$advantage_icon['url']?>" alt="<?=$advantage_icon['alt']?>"/>	
							</div>	
						<?php endif; ?>	
						<?php if( $advantage_title ): ?>
							<div class="advantages-section__title"><?=$advantage_title?></div>									
						<?php endif; ?>					
						<?php if( $advantage_text ): ?>
							<div class="advantages-section__descr"><?=$advantage_text?></div>									
						<?php endif; ?>	
						</div>	
					<?php endwhile; ?>
				</div>	
				<?php endif; ?>	
			</div>
		</div>	
		<!-- model section -->		
		<div class="model-section">
			<div class="container">
				<div class="model-section__header">
					<h2 class="title">модельный ряд</h2>
				</div>	
				<div class="model-section__models slick">
					<?php
					$args = array( 'posts_per_page' => 12 );
					$lastposts = get_posts( $args );

					foreach( $lastposts as $post ){ ?>
						<div class="model-section__model">
							<?php
							setup_postdata($post); // устанавливаем данные
							if ( has_post_thumbnail()) { ?>
							<div class="model-section__photo">
								<?php the_post_thumbnail('medium'); ?>
							</div>		
							<?php
							}					
							?>
							<h4 class="model-section__name"><?php the_title(); ?></h4>
							<div class="model-section__text">
							<?php the_content(); ?>
							</div>
							<a href="#" class="button">Подробнее</a>	
						</div>
						<?php
					}
					wp_reset_postdata(); // сброс
					?>		
				</div>
				<div class="model-section__controls">
					<div class="model-section__prev"></div>
					<div class="model-section__next"></div>
				</div>
			</div>	
		</div>		