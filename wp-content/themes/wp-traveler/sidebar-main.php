<?php
/**
 * wp-traveler WordPress Theme, ordasvit.com
 * wp-traveler is distributed under the terms of the GNU GPL
 * Copyright: OrdaSvit, Andrey Kvasnevskiy, ordasvit.com
 */

if (!wp_traveler_show_position_preview("sidebar_right", "span4 side_bar_single") && wp_traveler_is_active_sidebar("sidebar_right")) { ?>
	<div class="span4 side_bar_single">
		<?php if (function_exists('dynamic_sidebar'))
			dynamic_sidebar('sidebar_right'); ?>
	</div>
<?php }
; ?>