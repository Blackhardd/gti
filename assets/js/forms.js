jQuery(document).ready(function($){
    // RegExp
    const regexp_name = /^[\wа-яА-ЯіїєІЇЄ]{3,32}$/
    const regexp_phone = /^\+38 \(0(\d{2})\) \d{3} \d{2} \d{2}/
    const regexp_words = /^[\wа-яА-ЯіїєІЇЄ ]{3,64}$/
    const regexp_message = /^[\wа-яА-ЯіїєІЇЄ ]{3,300}$/

    
    // Event listeners
    $('form').on('submit', submitForm)


    // Validation
    function validateForm(form){
        let is_form_valid = true

        const $form = $(form)
        const $fields = $form.find('.form__fields input, .form__fields textarea')

        $fields.each(function(){
            const $field = $(this)
            const $wrapper = $field.closest('.input')

            let is_field_valid = true
            const value = $field.val()

            if($wrapper.hasClass('input--required') && value.length === 0){
                is_field_valid = false
            }
            else{
                switch($field.prop('tagName')){
                    case 'INPUT':
                        switch($field.attr('type')){
                            case 'text':
                                switch($field.attr('name')){
                                    case 'name':
                                        if(!regexp_name.test(value)){
                                            is_field_valid = false
                                        }
                                        break
                                    
                                    case 'cargo':
                                    case 'direction':
                                        if(!value.trim().length || !regexp_words.test(value.trim())){
                                            is_field_valid = false
                                        }
                                        break
    
                                    default:
                                        break
                                }
                                break
    
                            case 'tel':
                                if(!regexp_phone.test(value)){
                                    is_field_valid = false
                                }
                                break

                            default:
                                break
                        }
                        break
                    
                    case 'TEXTAREA':
                        switch($field.attr('name')){
                            case 'message':
                                if(value.length && (!value.trim().length || !regexp_message.test(value.trim()))){
                                    is_field_valid = false
                                }
                                break
                        
                            default:
                                break
                        }
                        break

                    default:
                        break
                }
            }

            if(!is_field_valid){
                is_form_valid = false

                $wrapper.addClass('input--not-valid')
                
                $wrapper.one('input', function(){
                    $(this).removeClass('input--not-valid')
                })
            }
        })

        return is_form_valid
    }


    // Functions
    function submitForm(e){
        e.preventDefault()

        if(validateForm(e.target)){
            const $form = $(e.target)

            const fd = new FormData(e.target)

            $.ajax({
                type: 'POST',
                url: gti_ajax_data.ajax_url,
                data: fd,
                processData: false,
                contentType: false,
                beforeSend: function(){
                    $form.addClass('form--loading')
                },
                success: function(res){
                    $form.removeClass('form--loading')
                    $form.addClass('form--submited')

                    switch(res.status){
                        case 'redirect':
                            window.location.href = res.message
                            break

                        case 'error':
                            $form.find('.form__response').html('<div class="form__message form__message--error">' + res.message + '</div>')
                            break

                        case 'success':
                            $form.find('.form__response').html('<div class="form__message form__message--success">' + res.message + '</div>')
                            break

                        default:
                            break
                    }
                }
            })
        }

        return false
    }
})