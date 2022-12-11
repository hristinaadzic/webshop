<!-- Scripts -->
<!-- Bootstrap core JavaScript -->
{{--<script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>--}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<script src="{{asset('assets/js/isotope.min.js')}}"></script>
<script src="{{asset('assets/js/owl-carousel.js')}}"></script>
<script src="{{asset('assets/js/lightbox.js')}}"></script>
<script src="{{asset('assets/js/tabs.js')}}"></script>
<script src="{{asset('assets/js/video.js')}}"></script>
<script src="{{asset('assets/js/slick-slider.js')}}"></script>
<script src="{{asset('assets/js/custom.js')}}"></script>
<script>
    //according to loftblog tut
    $('.nav li:first').addClass('active');

    var showSection = function showSection(section, isAnimate) {
        var
            direction = section.replace(/#/, ''),
            reqSection = $('.section').filter('[data-section="' + direction + '"]'),
            reqSectionPos = reqSection.offset().top - 0;

        if (isAnimate) {
            $('body, html').animate({
                    scrollTop: reqSectionPos },
                800);
        } else {
            $('body, html').scrollTop(reqSectionPos);
        }

    };

    var checkSection = function checkSection() {
        $('.section').each(function () {
            var
                $this = $(this),
                topEdge = $this.offset().top - 80,
                bottomEdge = topEdge + $this.height(),
                wScroll = $(window).scrollTop();
            if (topEdge < wScroll && bottomEdge > wScroll) {
                var
                    currentId = $this.data('section'),
                    reqLink = $('a').filter('[href*=\\#' + currentId + ']');
                reqLink.closest('li').addClass('active').
                siblings().removeClass('active');
            }
        });
    };

    $('.main-menu, .responsive-menu, .scroll-to-section').on('click', 'a', function (e) {
        e.preventDefault();
        showSection($(this).attr('href'), true);
    });

    $(window).scroll(function () {
        checkSection();
    });

    var token = '{{csrf_token()}}'

    // function addToCart(id){
    //     $.ajax({
    //         url: "/addtocart/" + id,
    //         method:'POST',
    //         data:{
    //             _token: token,
    //         },
    //         headers:{
    //             'Accept':'application/json'
    //         },
    //         success: function (data){
    //             alert('Added to cart');
    //         },
    //         error: function (err){
    //             console.log(err)
    //         }
    //     })
    // }

    // $('.volumes').change(isVolumeSelected)
    //
    // function isVolumeSelected(){
    //     console.log('cao')
    //
    //     let volumesSelected = [];
    //     if(volumesSelected.length != 0){
    //     $('.volumes:checked').each(function (el) {
    //         volumesSelected.push(parseInt($(this).val()));
    //     })
    //         $('.cart-btn').removeAttr('disabled')
    //     }
    //     else {
    //         volumesSelected = [];
    //         $('cart-btn').attr("disabled")
    //     }










</script>
