<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package Fara
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<div class="toggles">
	<div class="sidebar-toggle">
		<i class="fa fa-plus"></i>
	</div>
</div>	

<div id="secondary" class="widget-area" role="complementary">
	<div class="sidebar-toggle-inside">
		<i class="fa fa-close"></i>
	</div>		
	<div class="widget-area-inner">		
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
	</div>
</div><!-- #secondary -->
