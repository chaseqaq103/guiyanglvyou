<!--form action="<?php echo home_url( '/' ); ?>" method="get">
    <input type="text" name="s" id="search" placeholder="站内搜索" value="<?php the_search_query(); ?>" />
</form-->
<form class="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
    <div class="searchform">
        <input type="text" value="" class="searchtext" name="s" id="s" />
        <input type="submit" class="submit" id="searchsubmit" value=" " />
    </div>
</form>