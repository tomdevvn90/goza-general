<?php 
function be_item_post($block){
    $is_style     = isset($block['className']) ? $block['className'] : "is-style-default"; ?>

    <div class="item-post item post_recent"> 
        <div class="item-post-inner"> 
            <?php     
            switch ($is_style) {
                case "is-style-2":
                break;
            default:
                be_template_post_default($block);
                break; 
            } ?>
        </div>
    </div>
    <?php
}


function be_template_post_default(){ 
    $is_style     = isset($block['className']) ? $block['className'] : "is-style-default";
    $post_img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); 
    $post_date    = get_the_date('d M, Y');
    $comment      = get_comments_number();

    ?>

    <div class="item-post-thumbnail"> 
        <img src="<?php echo esc_url($post_img_url) ?>" alt="<?php the_title() ?>"/>
    </div>

    <div class="item-post-content post-caption"> 
        <a class="post-title-link" href="<?php the_permalink() ?>"> 
            <h2 class="item-post-title post-title"> <?php the_title() ?> </h2>
        </a>

        <div class="item-post-excerpt post-excerpt"> <?php the_excerpt() ?> </div>

        <div class="item-post-meta"> 
            <span class="item-post-date edu-date"> 
                <i class="fa fa-calendar" aria-hidden="true"></i>
                <?php echo $post_date ?>
            </span>

            <span class="item-post-comment edu-cmt"> <?php echo $comment ?> </span>
        </div>
    </div>

<?php }
