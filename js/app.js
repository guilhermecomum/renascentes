// Foundation JavaScript
// Documentation can be found at: http://foundation.zurb.com/docs
$(document).foundation();


$('.large-centered').css({ height: $(window).innerHeight() })
$('.download').flexVerticalCenter({ cssAttribute: 'padding-top' });
$('.format').flexVerticalCenter({ cssAttribute: 'padding-top' });
$('.stream').flexVerticalCenter({ cssAttribute: 'padding-top' });
$('.calendar').flexVerticalCenter({ cssAttribute: 'padding-top' });
$('.form').flexVerticalCenter({ cssAttribute: 'padding-top' });

$(window).resize(function(){
    $('.large-centered').css({ height: $(window).innerHeight() })
    $('.download').flexVerticalCenter({ cssAttribute: 'padding-top' });
    $('.format').flexVerticalCenter({ cssAttribute: 'padding-top' });
    $('.stream').flexVerticalCenter({ cssAttribute: 'padding-top' });
    $('.calendar').flexVerticalCenter({ cssAttribute: 'padding-top' });
    $('.form').flexVerticalCenter({ cssAttribute: 'padding-top' });
});

$(function() {
  $('a[href*=#]:not([href=#])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html,body').animate({
          scrollTop: target.offset().top
        }, 1000);
        return false;
      }
    }
  });
});

(function($){
    $.extend($.validator.messages, {
        required: 'Todos os campos são obrigatórios!',
        email: 'Preencha com um e-mail válido.'
    });

    $('#contact-form').validate({
        showErrors: function(){
            $('#error-msg').remove();
            this.defaultShowErrors();
        },
        errorPlacement: function(error, element) {
            $('#error-msg').remove();
            $('<p class="error-msg" id="error-msg">' + error.text() + '</p>').insertAfter('#send-form');
        },
        submitHandler: function(form) {
            var $form = $(form),
            data = $form.serialize()+'&ajax=true',
            target = $form.attr('action');

            $.post(target, data, function(data) {
                if(data == '1') {
                    $form.addClass('success');
                    $('.std-input').val('');
                }
            });
        }
    });
    $('input.std-input, textarea.std-input').placeholder();
    $('#reset-form').on('click', function(e){
        $(this).parent().parent().removeClass('success');
        e.preventDefault();
    });
});
