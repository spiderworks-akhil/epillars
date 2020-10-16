
<!-- get jQuery from the google apis -->
<script type="text/javascript" src="{{asset('old')}}/js/universal/jquery.js"></script>

<!-- style switcher -->
<script src="{{asset('old')}}/js/style-switcher/jquery-1.js"></script>
<script src="{{asset('old')}}/js/style-switcher/styleselector.js"></script>

<!-- animations -->
<script src="{{asset('old')}}/js/animations/js/animations.min.js" type="text/javascript"></script>
<script src="{{asset('old')}}/js/animations/js/smoothscroll.js" type="text/javascript"></script>

<!-- slide panel -->
<script type="text/javascript" src="{{asset('old')}}/js/slidepanel/slidepanel.js"></script>

<!-- mega menu -->
<script src="{{asset('old')}}/js/mainmenu/bootstrap.min.js"></script>
<script src="{{asset('old')}}/js/mainmenu/customeUI.js"></script>

<!-- jquery jcarousel -->
<script type="text/javascript" src="{{asset('old')}}/js/carousel/jquery.jcarousel.min.js"></script>

<!-- scroll up -->
<script src="{{asset('old')}}/js/scrolltotop/totop.js" type="text/javascript"></script>

<!-- tabs -->
<script src="{{asset('old')}}/js/tabs/assets/js/responsive-tabs.min.js" type="text/javascript"></script>

<!-- jquery jcarousel -->
<script type="text/javascript">
    (function($) {
        "use strict";

        jQuery(document).ready(function() {
            jQuery('#mycarouselthree').jcarousel();
        });

    })(jQuery);
</script>

<!-- accordion -->
<script type="text/javascript" src="{{asset('old')}}/js/accordion/custom.js"></script>

<!-- sticky menu -->
<script type="text/javascript" src="{{asset('old')}}/js/mainmenu/sticky.js"></script>
<script type="text/javascript" src="{{asset('old')}}/js/mainmenu/modernizr.custom.75180.js"></script>

<!-- cubeportfolio -->
<script type="text/javascript" src="{{asset('old')}}/js/cubeportfolio/jquery.cubeportfolio.min.js"></script>
<script type="text/javascript" src="{{asset('old')}}/js/cubeportfolio/main.js"></script>
<script type="text/javascript" src="{{asset('old')}}/js/cubeportfolio/main5.js"></script>
<script type="text/javascript" src="{{asset('old')}}/js/cubeportfolio/main6.js"></script>

<!-- carousel -->
<script defer src="{{asset('old')}}/js/carousel/jquery.flexslider.js"></script>
<script defer src="{{asset('old')}}/js/carousel/custom.js"></script>

<!-- lightbox -->
<script type="text/javascript" src="{{asset('old')}}/js/lightbox/jquery.fancybox.js"></script>
<script type="text/javascript" src="{{asset('old')}}/js/lightbox/custom.js"></script>


<script src="{{asset('old')}}/js/masterslider/masterslider.min.js"></script>
<script type="text/javascript">
    (function($) {
        "use strict";

        var slider = new MasterSlider();
        slider.setup('masterslider' , {
            width: 1400,    // slider standard width
            height:720,   // slider standard height
            space:0,
            speed:45,
            fullwidth:true,
            loop:true,
            preload:0,
            autoplay:true,
            view:"basic"
        });
// adds Arrows navigation control to the slider.
        slider.control('arrows');
        slider.control('bullets');

    })(jQuery);
</script>