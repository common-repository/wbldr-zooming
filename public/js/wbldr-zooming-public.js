(function($) {
	'use strict';

    $(document).ready(function() {
        var $onContentClick = ( zooming_settings['onclick'] == 'closePopup' ) ? true : false,
            $navigateByImgClick = ( zooming_settings['onclick'] == 'nextImg' ) ? true : false,
            $speed = ( zooming_settings['speed'] ) ? zooming_settings['speed'] : '400',
            $animation = ( zooming_settings['animation'] ) ? zooming_settings['animation'] : 'ease-in-out',
            $gallery = ( zooming_settings['gallery'] == "true" ) ? true : false,
            $filename = ( zooming_settings['filename'] == "true" ) ? true : false;

        $('a')
            .filter(function() { return $(this).attr('href').match(/\.(jpg|jpeg|png|gif)/i); })
            .magnificPopup({
                preloader: false,
                mainClass: 'mfp-fade',
                type: 'image',
                closeOnContentClick: $onContentClick,
                gallery: {
                    enabled: $gallery,
                    navigateByImgClick: $navigateByImgClick,
                    preload: [0, 2],
                    tCounter: '',
                },
                zoom: {
                    enabled: true,
                    duration: $speed,
                    easing: $animation,
                    opener: function(openerElement) {
                        return openerElement.is('img') ? openerElement : openerElement.find('img');
                    }
                },
                image: {
                    verticalFit: true,
                    markup: '<div class="mfp-figure">'+
                    '<div class="mfp-close"></div>'+
                    '<div class="mfp-img"></div>'+
                    '<div class="mfp-bottom-bar">'+
                    '<div class="mfp-title"></div>'+
                    '</div>'+
                    '</div>',
                    titleSrc: function (item) {
                        var title = ($filename) ? item.src.match(/[\w-]+\.(jpg|jpeg|png|gif)/g) : '';
                        return title;
                    },
                }
            });
    });
})(jQuery);