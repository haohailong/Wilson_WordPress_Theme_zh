<form method="get" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" id="searchform">
	<input type="search" value="" placeholder="<?php _e('搜索：输入+回车', 'wilson'); ?>" name="s" id="s" /> 
	<a href="javascript:{}" onclick="document.getElementById('searchform').submit(); return false;" title="Search" class="searchsubmit">搜索</a>
</form>