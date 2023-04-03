<?php 

function be_item_event($block){

    $is_style = (isset($block['className']) && !empty($block['className'])) ? $block['className'] : "is-style-default";
  
    switch ($is_style) {
        case "is-style-2":
           
            break;

        case "is-style-3":
            
            break; 

        default:
            be_template_events_listing_default();
            break; 
    } 
}


function be_template_events_listing_default(){ ?>
    <div class="item-event"> 
        <div class="item-event-inner"> 
            <div class="item-event-inner-left"> 
                
            </div>
            <div class="item-event-inner-right"> </div>
            <span class="item-event--icon-toggle"></span>
        </div>
    </div>
<?php }

?>