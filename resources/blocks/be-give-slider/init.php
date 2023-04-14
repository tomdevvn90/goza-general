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

                default:
                    be_template_give_default();
                    break; 
            } ?>
        </div>
    </div>
    <?php
}

function be_template_give_style_3(){ 
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

    <div class="featured-image" style="background-image: url(<?php echo esc_url($post_img_url) ?>);background-position: center center;background-repeat: no-repeat;background-size: cover;"></div>
    <div class="entry-content ">
        <div class="entry-content-inner">
            <div class="form-category form-category-style3"><a href="<?php echo $give_forms_category_link ?>"><?php echo $give_forms_category_name ?></a></div>
			<a href="<?php echo get_permalink($form_id) ?>" class="title-link"><h4 class="title"><?php echo get_the_title($form_id) ?></h4></a>
            <div class="excerpt"><?php echo get_the_excerpt($form_id); ?></div>
            <div class="give-goal-progress-wrap">
                <div class="goal_progress_full"></div>
                <div class="progress"><div class="bar" style="background-color:<?php echo $color ?>;width: <?php echo $progress ?>%;" ></div></div>
                <div class="give-price-wrap">
                    <div><span class="title">Raised:</span> <span class="raised">$<?php echo $goal ?></span></div>
                    <div><span class="title">Collect:</span> <span class="income">$<?php echo $income ?></span></div>
                </div>
            </div>
        </div>
    </div>
<?php }

function be_template_give_style_2(){ 
    $form_id = get_the_ID() ;
    
    $goal_option = get_post_meta( $form_id, '_give_goal_option', true );
    $form        = new Give_Donate_Form( $form_id );
    $goal        = $form->goal;
    //$goal_p      = floatval($goal);
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
        
      $button_donate = implode('', array(
        '<div class="give-button-donate">',
          do_shortcode('[give_form id="'. $form_id .'" show_title="true" show_goal="false" show_content="none" display_style="button"]'),
        '</div>',
      ));

    $post_img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); 
  ?>

    <div class="featured-image">
      <a href="<?php echo get_permalink($form_id) ?>">
        <img src="<?php echo esc_url($post_img_url) ?>" alt="#">
      </a>
    </div>
    <div class="entry-content ">
      <div class="entry-content-inner">
			  <div class="extra-meta">
          <div class="meta-item meta-date"><span class="ion-android-calendar"></span><?php echo get_the_date('d M, Y',$form_id) ?></div>
        </div>
			  <a href="<?php echo get_permalink($form_id) ?>" class="title-link"><h4 class="title"><?php echo get_the_title($form_id) ?></h4></a>
        <div class="give-goal-progress-wrap">
          <div class="progress"><div class="bar" style="background-color:<?php echo $color ?>;width: <?php echo $progress ?>%;" ></div></div>
            <div class="bt-com">Donation Completed</div>
        </div>
        <div class="entry-bot">
          <div class="give-price-raised"><span>Raised</span><strong>$</strong><?php echo $income ?></div>
          <div class="give-price-goal"><span>Group Goal</span><strong>$</strong><?php echo $goal ?></div>
        </div>
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
