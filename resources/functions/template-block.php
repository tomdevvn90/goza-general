<?php 
function be_item_post($block){

    $is_style     = isset($block['className']) ? $block['className'] : "is-style-default";
    $post_img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); 
    ?>
    <div class="item-post item post_recent"> 
        <div class="item-post-inner"> 
            <?php     
            switch ($is_style) {
                case "is-style-2":
                    echo "aaaa";
                break;
            default: ?>
                <div class="item-post-thumbnail"> 
                    <img src="<?php echo esc_url($post_img_url) ?>" alt="<?php the_title() ?>"/>
                </div>
            <?php } ?>
        </div>
    </div>
    <?php
}
