<div id="meta_data" class="postmetadata">

    <?php the_tags('<span id="meta_tags">', ' ', '</span><br />'); ?>
    <span id="categories">
    Posted in <?php the_category(', ') ?>
    </span> 
    <span id="comments_count">&nbsp; 
    <?php comments_popup_link('0', ' 1', ' %'); ?>
    <span id="comments_ico" class="icon-comment"></span>
    </span>
    
</div>
