<form role="search" method="get" id="searchform" action="<?php echo esc_url(home_url( '/' )); ?>" >
    <div>
    	<label class="screen-reader-text" for="s"><?php esc_attr_e('Search for: ', 'pado'); ?></label>
	    <input type="text" value="<?php echo get_search_query() ?>" name="s" id="s" placeholder="<?php esc_attr_e('enter keyword', 'pado'); ?>" />
	    <input type="submit" id="searchsubmit" value="<?php esc_attr_e('Search', 'pado'); ?>" />
    </div>
</form>	