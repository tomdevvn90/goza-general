(function ($) {
    "use strict";
  
    const beProgressbarBlock = () => {
      const $progressbar = $('.be-progressbar-block');
      if ($progressbar.length === 0) return;
      let ProgressBar = require('progressbar.js');
  
      $progressbar.each(function () {
        let $idProgressbar = $(this).find('.be-progressbar-block-warp').attr('id'),
          $shape = $(this).data('shape'),
          $value = $(this).data('value') / 100,
          $height = $(this).data('height'),
          $strokeColor = $(this).data('stroke-color'),
          $trailColor = $(this).data('trail-color'),
          $duration = $(this).data('duration');
  
        if ($value > 0) {
          if ($shape == 'circle') {
            var cirle = new ProgressBar.Circle(`#${$idProgressbar}`, {
              strokeWidth: $height,
              easing: 'easeInOut',
              duration: $duration,
              color: $strokeColor,
              trailColor: $trailColor,
              trailWidth: $height,
              svgStyle: null
            });
  
            var waypoint = new Waypoint({
              element: this,
              handler: function (direction) {
                if (direction === 'down' && !cirle.path.classList.contains('in-view')) {
                  cirle.animate($value);
                  cirle.path.classList.add('in-view');
                }
              },
              offset: '80%'
            });
          } else {
            var line = new ProgressBar.Line(`#${$idProgressbar}`, {
              easing: 'easeInOut',
              duration: $duration,
              color: `${$strokeColor}`,
              trailColor: `${$trailColor}`,
            });
  
            var waypoint = new Waypoint({
              element: this,
              handler: function (direction) {
                if (direction === 'down' && !line.path.classList.contains('in-view')) {
                  line.animate($value);
                  line.path.classList.add('in-view');
                }
              },
              offset: '80%'
            });
  
            $(this).find('.be-progressbar-block-warp svg').css("height", $height);
          }
        }
      });
    }
  
    $(window).on("load", function () {
      beProgressbarBlock();
    });
  
  })(jQuery);
  