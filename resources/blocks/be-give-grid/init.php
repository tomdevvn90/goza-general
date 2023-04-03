<?php

function be_item_give($block){
    //var_dump($block);
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

    $is_style     = isset($block['className']) ? $block['className'] : "is-style-default";
    $post_img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); 
    ?>
    <div class="item-inner give-forms-grid-layout-default">
        <div class="featured-image">
        <img src="<?php echo esc_url($post_img_url) ?>" alt="<?php the_title() ?>"/>
        </div>
        <div class="entry-content">
            <div class="form-category"><a style="color:<?php echo $color ?>" href="<?php echo $give_forms_category_link ?>"><?php echo $give_forms_category_name ?></a></div>
            <a href="<?php echo get_permalink($form_id) ?>" class="title-link"><h4 class="title"><?php echo get_the_title($form_id) ?></h4></a>
            <div class="extra-meta">
              <div class="meta-item meta-author">By <?php echo get_the_author($form_id) ?></div>
              <div class="give-price-wrap"><sup>$</sup><?php echo $goal ?> <span>Collected</span></div>
            </div>
        </div>
        <div class="progress">
            <div class="bar" style="background-color:<?php echo $color ?>;width: <?php echo $progress ?>%;" ></div>
            <div class="form-percent" style="background:<?php echo $color ?>;left: calc(<?php echo $progress ?>%);"><span class="bt-arrow" style="background:<?php echo $color ?>"></span><?php echo $progress ?>%</div>
        </div>
    </div>
    <?php
}