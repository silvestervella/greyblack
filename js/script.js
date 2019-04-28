/**
 *
 * 0. Generic
 *
 * 0.1 Variables
 *
 * 0.2 Functions
 *
 *
 *
 * 1. document.ready
 *
 * 1.1 Function calls
 * 1.2 Home top fader
 *
 *
 * 2. window.load
 *
 *
 *
 * 3. Event listenners
 *
 * 4. window.load
 *
 *
 */

jQuery(document).ready(function() {
  /* 1.2 Home top fader */
  var homeProdOuter = jQuery(".product-item");
  jQuery(homeProdOuter)
    .first()
    .addClass("current")
    .fadeIn();
  function homeBackImgs() {
    var bkImgCurrent = jQuery(".current"),
      bkImgOuter = jQuery(".product-item"),
      bkImgCOunt = 0,
      bkImgOuterLen = bkImgOuter.length - 1;

    setInterval(function() {
      if (bkImgCOunt == bkImgOuterLen) {
        bkImgOuter.last().fadeOut(800, function() {
          jQuery(this).removeClass("current");
          bkImgOuter.first().fadeIn(800, function() {
            jQuery(this).addClass("current");
          });
        });
        bkImgCOunt = 0;
      } else {
        bkImgCurrent.fadeOut(800, function() {
          jQuery(this)
            .removeClass("current")
            .next(".product-item")
            .fadeIn(800, function() {
              jQuery(this).addClass("current");
            });
          bkImgCOunt++;
        });
      }
    }, 6000);
  }
  if (jQuery("body.home").length > 0) {
    homeBackImgs();
  }
});
