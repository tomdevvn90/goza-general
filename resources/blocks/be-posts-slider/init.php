<?php 
function be_item_post($block){
    $is_style     = isset($block['className']) ? $block['className'] : "is-style-default"; ?>

    <div class="item-post item post_recent"> 
        <div class="item-post-inner"> 
            <?php     
            switch ($is_style) {
                case "is-style-2":
                    be_template_post_style_2($block);
                break;
            default:
                be_template_post_default($block);
                break; 
            } ?>
        </div>
    </div>
    <?php
}

function be_template_post_style_2(){ 
    $post_img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); 
    $post_date    = get_the_date('d M, Y');
    $comment      = get_comments_number();
    $categories   = get_the_category();
    $day          = get_the_date('d');
    $post_date    = get_the_date('M Y');
    // echo "<pre>";
    // echo print_r($categories);
    // echo "</pre>";
?>

    <div class="item-post-thumbnail"> 
        <img src="<?php echo esc_url($post_img_url) ?>" alt="<?php the_title() ?>"/>
    </div>

    <div class="item-post-content post-caption"> 
        <span class="item-post-date edu-date"> 
                <span> <?php echo $day ?> </span> <br/> <?php echo $post_date ?>
        </span>

        <?php if(!empty($categories)): ?>
            <?php $num_of_items = count($categories); ?>
            <div class="item-post-category post-term-list"> 
                <?php foreach ($categories as $key => $value) : ?>
                    <?php $comma = $key + 1 < $num_of_items ? ',' : ''; ?>
                        <a class="item-category" href="<?php echo esc_url(get_category_link($value->term_id)) ?>">
                            <?php echo $value->name ?><?php echo $comma; echo " ";?>
                        </a>
                <?php endforeach; ?>    
            </div>
        <?php endif; ?>    

        <a class="post-title-link" href="<?php the_permalink() ?>"> 
            <h2 class="item-post-title post-title"> <?php the_title() ?> </h2>
        </a>

        <div class="item-post-excerpt post-excerpt"> <?php the_excerpt() ?> </div>

        <div class="item-post-button">  
            <a href="<?php the_permalink() ?>" class="post-more-link">
                 Learn More
                <i class="fa fa-arrow-right" aria-hidden="true"></i>
            </a>
        </div>
    </div>

<?php }

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
