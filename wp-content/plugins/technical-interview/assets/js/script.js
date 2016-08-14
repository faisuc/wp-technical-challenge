jQuery(document).ready(function($)
{
    $('#name').focus();

    $('#contact-form button').click(function()
    {
        var $ajaxUrl = $('#ajaxUrl').val();
        var $name = $.trim($('#name').val());
        var $email = $.trim($('#email').val());
        var $password = $.trim($('#password').val());

        $.ajax({
            url : $ajaxUrl ,
            type: "POST" ,
            dataType: "json" ,
            data: {
                action      : 'ajax_action' ,
                name        : $name ,
                email       : $email ,
                password    : $password ,
                form_sent   : true
            },
            success: function(data)
            {
                $('.messages').empty();

                if (data.status)
                {
                    $('.messages.top').append('<p class="message message-success">' + data.response + '</p>');
                }
                else
                {
                    if (data.name_err.length > 0)
                    {
                        var $name_err = "";
                        for (var i = 0; i < data.name_err.length; i++)
                        {
                            $name_err += '<p class="message message-error">' + data.name_err[i] + '</p>';
                        }
                        $('.messages.name').append($name_err);
                    }

                    if (data.email_err.length > 0)
                    {
                        var $email_err = "";
                        for (var i = 0; i < data.email_err.length; i++)
                        {
                            $email_err += '<p class="message message-error">' + data.email_err[i] + '</p>';
                        }
                        $('.messages.email').append($email_err);
                    }

                    if (data.pass_err.length > 0)
                    {
                        var $pass_err = "";
                        for (var i = 0; i < data.pass_err.length; i++)
                        {
                            $pass_err += '<p class="message message-error">' + data.pass_err[i] + '</p>';
                        }
                        $('.messages.password').append($pass_err);
                    }
                }
            }
        });

        return false;
    });
});
