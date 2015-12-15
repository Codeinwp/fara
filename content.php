<?php
/**
 * @package Fara
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('item-sizer'); ?>>
	<div class="post-inner clearfix">
		<?php if ( has_post_thumbnail() ) : ?>
			<div class="entry-thumb">
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" >
					<?php the_post_thumbnail('fara-entry-thumb'); ?>
				</a>			
			</div>
		<?php endif; ?>

		<div class="post-content clearfix">
			<?php if ( 'post' == get_post_type() ) : ?>
			<div class="post-meta col-md-3 col-sm-3 col-xs-12">
					<?php fara_posted_on(); ?>
			</div><!-- .entry-meta -->
			<?php endif; ?>
			<div class="content-inner col-md-9 col-sm-9 col-xs-12">
				<header class="entry-header">
					<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>

				</header><!-- .entry-header -->

				<div class="entry-content">
					<?php
						the_excerpt();
					?>

					<?php
						wp_link_pages( array(
							'before' => '<div class="page-links">' . __( 'Pages:', 'fara' ),
							'after'  => '</div>',
						) );
					?>
				</div><!-- .entry-content -->
			</div>
		</div>
	</div>
</article><!-- #post-## -->