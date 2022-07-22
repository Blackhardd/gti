jQuery(document).ready(function($){
    let gti = {}

    gti.init = function(){
        // Commons
        this.initMobileServicesMenu()
        this.initSelectInputs()

        // Service
        this.initCarsCarousel()
    }


    // Commons
    gti.initMobileServicesMenu = function(){
        $('.menu--services-mobile .menu-item-trigger').on('click', function(){
            $(this).closest('.menu-item').toggleClass('menu-item--expanded')
        })
    }

    gti.initSelectInputs = function(){
        if(!$('.input--select').length) return

        $('.input--select').each(function(){
            const $wrapper = $(this)
            let $dropdown = null

            const options = JSON.parse($wrapper.find('.input__input').attr('data-options'))

            $(this).on('click', '.input__input', function(){
                $wrapper.toggleClass('input--expanded')

                if(!$dropdown){
                    let options_html = '<div class="select-dropdown">'

                    options.forEach(function(item){
                        const active_class = $wrapper.find('.input__input').val() == item ? 'select-option--active' : ''
                        options_html += '<div class="select-option ' + active_class + '" data-value="' + item + '">' + item + '</div>'
                    })

                    options_html += '</div>'

                    $dropdown = $(options_html).appendTo('body')

                    $dropdown.css({
                        width: $wrapper.width(),
                        top:  $wrapper.offset().top + $wrapper.outerHeight(),
                        left:  $wrapper.offset().left,
                    })

                    $dropdown.addClass('select-dropdown--visible')

                    $dropdown.on('click', '.select-option', function(){
                        $wrapper.find('.input__input').val($(this).attr('data-value'))
                        $wrapper.find('.input__input').trigger('input')

                        $dropdown.removeClass('select-dropdown--visible')
                    })
                }
                else{
                    $dropdown.removeClass('select-dropdown--visible')
                }

                $dropdown.one('transitionend', function(){
                    if(!$dropdown.hasClass('select-dropdown--visible')){
                        $dropdown.remove()
                        $dropdown = null
                    }
                })
            })

            $(window).resize(function(){
                if($dropdown){
                    $dropdown.css({
                        width: $wrapper.width(),
                        top:  $wrapper.offset().top + $wrapper.outerHeight(),
                        left:  $wrapper.offset().left,
                    })
                }
            })

            $('body').on('click', function(e){
                if($dropdown && !$(e.target).closest('.input--select').length){
                    $dropdown.removeClass('select-dropdown--visible')

                    $dropdown.one('transitionend', function(){
                        if(!$dropdown.hasClass('select-dropdown--visible')){
                            $dropdown.remove()
                            $dropdown = null
                        }
                    })
                }
            })
        })
    }


    // Service
    gti.initCarsCarousel = function(){
        if(!$('.trucks-carousel').length) return

        $('.trucks-carousel').each(function(){
            const $carousel = $(this)
            const $navigation = $carousel.find('.trucks-carousel__navigation')
            
            $navigation.css('top', ($carousel.find('.truck-card__image').height() / 2 - 20) + 'px')

            new Swiper($(this)[0], {
                slidesPerView: 1,
                effect: 'coverflow',
                grabCursor: true,
                navigation: {
                    nextEl: '.swiper-next__auto',
                    prevEl: '.swiper-prev__auto'
                }
            })

            $(window).resize(function(){
                $navigation.css('top', ($carousel.find('.truck-card__image').height() / 2 - 20) + 'px')
            })
        })
    }


    // Init
    gti.init()
})