<form method="get" class="searchform" action="<?php echo home_url(); ?>" id="searchform">
    <input type="search" value="" placeholder="<?php _e( '搜索：输入+回车', 'wilson' ); ?>" name="s" id="s" />
    <a href="javascript:{}" onclick="document.getElementById( 'searchform' ).submit(); return false;" title="Search" class="searchsubmit"><?php _e( '提交', 'wilson' ); ?></a>
</form>
