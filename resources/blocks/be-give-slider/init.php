<?php 
function be_item_give_slider($block){
    $is_style     = isset($block['className']) ? $block['className'] : "is-style-default"; ?>

    <div class="item-give item give_recent"> 
        <div class="item-give-inner"> 
            <?php     
            switch ($is_style) {
                case "is-style-2":
                    be_template_give_style_2();
                    break;
 
                case "is-style-3":
                    be_template_give_style_3();
                    break; 
                    
                case "is-style-4":
                    be_template_give_style_4();
                    break; 
                    
                case "is-style-5":
                    be_template_give_style_5();
                    break;     

                default:
                    be_template_give_default();
                    break; 
            } ?>
        </div>
    </div>
    <?php
}

function be_template_give_style_5(){ 
    $give_img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); 
    $comment      = get_comments_number();
    $give_date    = get_the_date('d M, Y');
    $categories   = get_the_category();
?>

    <div class="item-give-thumbnail"> 
        <img src="<?php echo esc_url($give_img_url) ?>" alt="<?php the_title() ?>"/>
    </div>

    <div class="item-give-content give-caption">
        <div class="item-give-meta"> 
            <?php if(!empty($categories)): ?>
                <?php $num_of_items = count($categories); ?>
                <div class="item-give-category give-term-list"> 
                    <?php foreach ($categories as $key => $value) : ?>
                        <?php $comma = $key + 1 < $num_of_items ? ',' : ''; ?>
                            <a class="item-category" href="<?php echo esc_url(get_category_link($value->term_id)) ?>">
                                <?php echo $value->name ?><?php echo $comma; echo " ";?>
                            </a>
                    <?php endforeach; ?>    
                </div>
            <?php endif; ?>

            <span class="item-give-date"> <?php echo $give_date ?> </span>
        </div>

        <h2 class="item-give-title"> 
            <a href="<?php the_permalink() ?>"> <?php the_title() ?> </a>
        </h2>

        <div class="item-give-excerpt give-excerpt"> <?php the_excerpt() ?> </div>

        <div class="item-give-button">  
            <a href="<?php the_permalink() ?>" class="give-more-link"> Learn More </a>
        </div>
    </div>    

<?php }

function be_template_give_style_4(){ 
    $give_img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); 
    $categories   = get_the_category();
    
?>

    <div class="item-give-thumbnail"> 
        <img src="<?php echo esc_url($give_img_url) ?>" alt="<?php the_title() ?>"/>

        <a href="<?php the_permalink() ?>" class="item-give-button"> <i class="fa fa-angle-right" aria-hidden="true"></i> </a>
    </div>

    <div class="item-give-content give-caption"> 
        <?php if(!empty($categories)): ?>
            <?php $num_of_items = count($categories); ?>
            <div class="item-give-category give-term-list"> 
                <?php foreach ($categories as $key => $value) : ?>
                    <?php $comma = $key + 1 < $num_of_items ? ',' : ''; ?>
                        <a class="item-category" href="<?php echo esc_url(get_category_link($value->term_id)) ?>">
                            <?php echo $value->name ?><?php echo $comma; echo " ";?>
                        </a>
                <?php endforeach; ?>    
            </div>
        <?php endif; ?>

        <h2 class="item-give-title"> 
            <a href="<?php the_permalink() ?>"> <?php the_title() ?> </a>
        </h2>
    </div>    

<?php }

function be_template_give_style_3(){ 
    $give_img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); 
    $comment      = get_comments_number();
    $give_date    = get_the_date('d M, Y');
?>

    <div class="item-give-thumbnail"> 
        <img src="<?php echo esc_url($give_img_url) ?>" alt="<?php the_title() ?>"/>
    </div>

    <div class="item-give-content give-caption"> 
        <div class="item-give-meta"> 
            <span class="item-give-author"> <?php echo get_the_author_meta('display_name', get_the_author_ID()); echo " " ?></span>
            <span class="item-give-comment edu-cmt">  - <?php echo $comment ?> Comments</span>
        </div>

        <h2 class="item-give-title"> 
            <a href="<?php the_permalink() ?>"> <?php the_title() ?> </a>
        </h2>

        <div class="item-give-excerpt give-excerpt"> <?php the_excerpt() ?> </div>

        <span class="item-give-date edu-date"> 
            <?php echo $give_date ?>
        </span>
    </div>
<?php }

function be_template_give_style_2(){ 
    $give_img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); 
    $give_date    = get_the_date('d M, Y');
    $comment      = get_comments_number();
    $categories   = get_the_category();
    $day          = get_the_date('d');
    $give_date    = get_the_date('M Y');
?>

    <div class="item-give-thumbnail"> 
        <img src="<?php echo esc_url($give_img_url) ?>" alt="<?php the_title() ?>"/>
    </div>

    <div class="item-give-content give-caption"> 
        <span class="item-give-date edu-date"> 
                <span> <?php echo $day ?> </span> <br/> <?php echo $give_date ?>
        </span>

        <?php if(!empty($categories)): ?>
            <?php $num_of_items = count($categories); ?>
            <div class="item-give-category give-term-list"> 
                <?php foreach ($categories as $key => $value) : ?>
                    <?php $comma = $key + 1 < $num_of_items ? ',' : ''; ?>
                        <a class="item-category" href="<?php echo esc_url(get_category_link($value->term_id)) ?>">
                            <?php echo $value->name ?><?php echo $comma; echo " ";?>
                        </a>
                <?php endforeach; ?>    
            </div>
        <?php endif; ?>    

        <a class="give-title-link" href="<?php the_permalink() ?>"> 
            <h2 class="item-give-title give-title"> <?php the_title() ?> </h2>
        </a>

        <div class="item-give-excerpt give-excerpt"> <?php the_excerpt() ?> </div>

        <div class="item-give-button">  
            <a href="<?php the_permalink() ?>" class="give-more-link">
                 Learn More
                <i class="fa fa-arrow-right" aria-hidden="true"></i>
            </a>
        </div>
    </div>

<?php }

function be_template_give_default(){ 
    $is_style     = isset($block['className']) ? $block['className'] : "is-style-default";
    $form_id = get_the_ID() ;
    
    $goal_option = get_post_meta( $form_id, '_give_goal_option', true );
    $form        = new Give_Donate_Form( $form_id );
    $goal        = $form->goal;
    $goal_format = get_post_meta( $form_id, '_give_goal_format', true );
    $income      = $form->get_earnings();
    $color       = get_post_meta( $form_id, '_give_goal_color', true );
    $give_forms_category = (wp_get_post_terms( $form_id, 'give_forms_category'));

    foreach($give_forms_category as $give_forms_category1) {
        $give_forms_category_name = $give_forms_category1->name; //do something here
        $give_forms_category_link = get_term_link($give_forms_category1->slug, 'give_forms_category'); //do something here
        //var_dump($give_forms_category_link );
        }
        if (empty($give_forms_category_name)) {
          $give_forms_category_name = '';
        }
      // set color if empty
      if(empty($color)) $color = '#01FFCC';
      $progress = ($goal === 0) ? 0 : round( ( $income / $goal ) * 100, 2 );

      if ( $income >= $goal ) { $progress = 100; }
      $class_none = '';
      if ( $goal_option == 'disabled' ) { $class_none = 'class-none'; }
      // Get formatted amount.
      $income = give_human_format_large_amount( give_format_amount( $income ) );
      $goal = give_human_format_large_amount( give_format_amount( $goal ) );

      //var_dump($progress);
      $button_donate = implode('', array(
        '<div class="give-button-donate">',
          do_shortcode('[give_form id="'. $form_id .'" show_title="true" show_goal="false" show_content="none" display_style="button"]'),
        '</div>',
      ));

    $post_img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); 
  ?>

    <div class="featured-image" style="background-image: url(<?php echo esc_url($post_img_url) ?>);background-position: center center;background-repeat: no-repeat;background-size: cover;">
      <div class="form-category form-category-style1"><a style="background-color:<?php echo $color ?>" href="<?php echo $give_forms_category_link ?>"><?php echo $give_forms_category_name ?></a></div>
    </div>
    <div class="entry-content">
      <a href="<?php echo get_permalink($form_id) ?>" class="title-link"><h4 class="title bt-title-style1"><?php echo get_the_title($form_id) ?></h4></a>
      <div class="extra-meta bt-extra-meta-style1">
        <div class="give-price-wrap">
          <p style="color:<?php echo $color ?>"> <sup>$</sup><?php echo $goal ?> <span>Collected</span> </p>
        </div>
      </div>
        <div class="give-goal-progress-wrap">
          <div class="bar" style="background-color:<?php echo $color ?>;width: <?php echo $progress ?>%;" ></div>
          <div class="form-percent" style="background:<?php echo $color ?>;right: calc(100% - <?php echo $progress ?>%);"><span class="bt-arrow" style="background:<?php echo $color ?>"></span><?php echo $progress ?>%</div>
        </div>
    </div>

<?php }
