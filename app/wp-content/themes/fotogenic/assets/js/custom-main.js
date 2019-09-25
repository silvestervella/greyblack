jQuery(document).ready(function($){
     
    /*
     * Sticky menu script
     */
    $(function(){
        var shrinkHeader = 10;
        var wpAdminBar = $('#wpadminbar');
        var wpAdminBarHeight = $('#wpadminbar').height();
        $(window).scroll(function() {
            var scroll = getCurrentScroll();
            if ( scroll >= shrinkHeader ) {
                $('.header_sticky').addClass('shrink');
                if(wpAdminBar.length) {
                    $('.header_sticky').css('top',wpAdminBarHeight+'px');
                }
            } else {
                $('.header_sticky').removeClass('shrink');
            }
        });
        function getCurrentScroll() {
            return window.pageYOffset || document.documentElement.scrollTop;
        }
    });

    /*
     * jQuery home page masonry
     */
    $('.mt-fotogenic-masonry-wrap').imagesLoaded().done( function( instance ) {
        var container = document.querySelector('.fotogenic_masonry_images');
        var msnry = new Masonry( container, {
            itemSelector: '.masonry_item',
            columnWidth: '.masonry_item', 
            percentPosition: true
        }); 
    });

    /*
     * Gallery template masonry
     */  
    $('.photo_masonry .gallery').imagesLoaded().done( function( instance ) {
        var container = document.querySelector('.photo_masonry .gallery');
        var msnry = new Masonry( container, {
            itemSelector: '.gallery-item',
            columnWidth: '.gallery-item', 
            percentPosition: true
        }); 
    });

    /**
     * Header Search script
     */
    $('.mt-search-social-wrapper .fotogenic-search-icon').click(function() {
        $('.mt-search-social-wrapper .fotogenic-form-wrap').toggleClass('search-activate');
    });
      
    $('.mt-search-social-wrapper .fotogenic-form-close').click(function() {
        $('.mt-search-social-wrapper .fotogenic-form-wrap').removeClass('search-activate');
    });

    /*
     * bg video js
	 */
    $(function(){
        $('.bg-video').YTPlayer({
            containment: '#hero_video-bg',
            showControls: false,
            ratio: 'auto',
            loop: true,
            mute: true,
            opacity: 1,
            startAt: 5,
            stopAt: 0,
            autoPlay: true,
            optimizeDisplay: true,
            quality: 'auto',
            showYTLogo: false,
            anchor: 'center,top',
            useOnMobile: false,
        });
    });

    /* 
     * Hero image background height
     */
    function setHeight() {
        windowHeight = $(window).innerHeight();
        $('.mt-fotogenic-content-wrapper,.mt-thumb-title-wrapper').css('min-height', windowHeight);
    };
    setHeight();
    
    $(window).resize(function() {
        setHeight();
    });

    /*
     * Testimonial slider
     */
    $(".testimonial_slider").lightSlider({
        item:1,
        autoWidth: false,
        slideMove: 1,  // slidemove will be 1 if loop is true
        slideMargin: 10,
        controls: true,
        auto: true,
        pager: false,
        loop: true,
        speed: 1800,
        pause: 4000
    });

    /**
     * pretty photo in gallery item
     */
    $('.gallery-item a').each(function() {
        var galId = $(this).parents().eq(2).attr('id');
        $(this).attr('rel', 'prettyPhoto['+galId+']');
    });

    /*
     * Homepage masonry pretty photo
     */
    $("a[rel^='prettyPhoto']").prettyPhoto({
        show_title: false,
        deeplinking: false,
        social_tools: ''
    });

    /* 
     * Scroll To Top
     */
    $(window).scroll(function() {
        if ($(this).scrollTop() > 1000) {
            $('.mt-scroll-up').fadeIn('slow');
        } else {
           $('.mt-scroll-up').fadeOut('slow');
        }
    });

    $('.mt-scroll-up').click(function() {
        $("html, body").animate({
            scrollTop: 0
        }, 600);
        return false;
    });
    
    //responsive menu toggle
    $('#masthead .menu-toggle').click(function(event) {
        $('#masthead #site-navigation').slideToggle('slow');
    });

    //responsive sub menu toggle
    $('#site-navigation .menu-item-has-children, #site-navigation .page_item_has_children').append('<span class="sub-toggle"> <i class="fa fa-angle-right"></i> </span>');

    $('#site-navigation .sub-toggle').click(function() {
        $(this).parent('.menu-item-has-children').children('ul.sub-menu').first().slideToggle('1000');
        $(this).parent('.page_item_has_children').children('ul.children').first().slideToggle('1000');
        $(this).children('.fa-angle-right').first().toggleClass('fa-angle-down');
    });

    // Scroll to next section
    $(".icon-scroll").click(function() {
        var cls = $(this).closest("section").next().offset().top;
        $("html, body").animate({scrollTop: cls}, "slow");
    });

    /** 
     *  Sticky Sidebar in innerpages
     *
     */
    $('#primary, #secondary').theiaStickySidebar({
        additionalMarginTop: 30
    });

    
});