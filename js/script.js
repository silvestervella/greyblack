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
 * 1.3 Home thumbs click
 * 1.4 IMenu button click
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

/* 0.2 Functions */

var myScrollFunction = function() {
  var header = jQuery("#header"),
    top_of_screen = jQuery(window).scrollTop();

  /* 0.2.2.1 Sticky heder */
  if (top_of_screen >= 150) {
    header.addClass("fixed");
  } else {
    header.removeClass("fixed");
  }
};


jQuery(document).ready(function() {
  /* 1.1 Function calls */

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

    bkImgOuter.first().fadeIn(800);

    setInterval(function() {
      if (bkImgCOunt == bkImgOuterLen) {
        bkImgOuter.first().fadeIn(0, function() {
          jQuery(this).addClass("current");
        });
        bkImgOuter.last().fadeOut(800, function() {
          jQuery(this).removeClass("current");
        });
        bkImgCOunt = 0;
      } else {
        bkImgCurrent
          .next(".product-item")
          .fadeIn(0, function() {
            jQuery(this).addClass("current");
          })
          .prev(".product-item")
          .fadeOut(800)
          .removeClass("current");
        bkImgCOunt++;
      }
    }, 6000);
  }
  if (jQuery("body.home").length > 0) {
    homeBackImgs();
  }

  /* 1.3 Home thumbs click */
  jQuery(".prod-thumbs .thumb-wrap img").on("click", function() {
    var thumbSrc = jQuery(this).attr("fullurl");
    jQuery("#large-img > img")
      .attr("src", thumbSrc)
      .parent()
      .fadeIn(800)
      .on("click", function() {
        jQuery(this).fadeOut(800, function() {
          jQuery(this)
            .children("img")
            .attr("src", "");
        });
      });
  });

  /* 1.4 Menu button click */
  jQuery("#menu-button").on("click", function() {
    if (jQuery("#nav-collapse").hasClass("open")) {
      jQuery("#nav-collapse")
        .removeClass("open")
        .fadeOut("300");
      jQuery("body").css({
        overflow: "visible"
      });
      jQuery(this).html("MENU");
    } else {
      jQuery("#nav-collapse")
        .fadeIn("300")
        .addClass("open");
      jQuery("body").css({
        overflow: "hidden"
      });
      jQuery(this).html("CLOSE");
    }
  });
});





/**
 * 3. Event listenners
 */
window.addEventListener("scroll", myScrollFunction);
