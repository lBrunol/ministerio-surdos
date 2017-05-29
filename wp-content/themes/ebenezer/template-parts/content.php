<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ebenezer
 */

?>
<?php 
	
?>
<article>
	<?php 
		$post_content = wp_trim_words( get_the_excerpt(), 100, ' [..]' );
		$post_title = get_the_title();
		
		if ( !$post_content ) {
			$post_content = wp_trim_words( get_the_content(), 100, ' [..]' );
		}
		$post_link = esc_url( get_permalink() );
	?>
	
	<header class="post-summary -single">
		<?php if ( 'post' === get_post_type() ) : $post_dates = ebenezer_get_post_date(); ?>
			<div class="date">
				<span class="icon-calendar-empty"></span>
				<span>
					<time datetime="<?php echo $post_dates['date_complete']; ?>"><?php echo $post_dates['date_friendly']; ?></time>
				</span>			
			</div>
		<?php endif; ?>
		<h1 class="title"><?php echo $post_title; ?></h1>
		<?php if( get_the_tag_list() ) : ?>			
			<?php echo $tags_list = get_the_tag_list( '<ul class="list-categories"><li class="list-categories-item">', '</li><li class="list-categories-item">', '</li></ul>' ); ?>	
		<?php endif; ?>
	</header>

	<div>
		<?php
			the_content();	
		?>
	</div>
	<?php 
		if ( comments_open() || get_comments_number() ) :
			echo '<div class="_section-site"><h2>Comentários</h2>';
			comments_template();
			echo '</div>';
		endif;
	?>
</article>