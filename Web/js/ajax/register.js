
jQuery(document).ready(function() {
        
    /*
        Fullscreen background
    */
    $.backstretch("./images/default/american.jpg");
    
    /*
        Form validation
    */
    $('.registration-form input[type="text"], .registration-form input[type="password"]').on('focus', function() {
    	$(this).removeClass('input-error');
    });
    
    //check the form
    $('#form-first-name').focusout(function (){
        if(!isGoodInputlength($(this))){ $('#firstname-error').text('Schould be between 5-20 caracteres');  $('#firstname-error').show();}else{$('#firstname-error').hide();};
    });
    $('#form-last-name').focusout(function (){
        if(!isGoodInputlength($(this))){ $('#lastname-error').text('Schould be between 5-20 caracteres');  $('#lastname-error').show();}else{$('#lastname-error').hide();};
    });
    $('#form-password').focusout(function (){
        if(!isGoodInputlength($(this))){ $('#password-error').text('Schould be between 5-20 caracteres');  $('#password-error').show();}else{$('#password-error').hide();};
    });
    $('#form-confirm').focusout(function (){
        if(!isMatchedPassword()){ $('#confirm-error').text('Password does not match');  $('#confirm-error').show();}else{$('#confirm-error').hide();};
    });
    $('#form-email').focusout(function (){
        if(!isgoodEmail()){ $('#email-error').text('Provide a valid email');  $('#email-error').show();}
        else{
            isFreeEmail($(this));
        };
    });
    
    
    $('.registration-form').on('submit', function(e) {
    	e.preventDefault();
                        //let's send the form here
                        sendValues($(this));
    	$(this).find('input[type="text"], input[type="password"]').each(function(){
    		if( $(this).val() === "" || !isGoodInputlength($('#form-first-name')) || !isGoodInputlength($('#form-last-name')) || !isGoodInputlength($('#form-password')) || !isMatchedPassword() || !isgoodEmail()) {
    			e.preventDefault();
    			$(this).addClass('input-error');
    		}
    		else {
    			$(this).removeClass('input-error');
    		}
    	});
    	
    });
    
    
    
    
    
    //general functions
    function isMatchedPassword(){
        var password = $('#form-password').val();
        var confirm = $('#form-confirm').val();
        if(password !== confirm){ return false;}
        else{return true;}
    }
    function isGoodInputlength(data){
        var iLength = data.val().length;
        if(iLength < 5 || iLength >25){
            return false;
        }else{ return true;}
    }
    function isgoodEmail(){
        var pattern = new RegExp(/^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i);
        if(pattern.test($('#form-email').val())){return true;}
        else{return false;}
    }
    function isFreeEmail(field){
        $.ajax(
        {
          url           : 'index.php?p=register&a=freemail',
          type          : 'post',
          timeout       : 3000,
          data          : field.serialize(),
          dataType      : 'json',
         beforeSend: function (xhr) {
                            $('#email-error').show(); $('#email-error').text('Checking...');
                        },
         success        : function (data, textStatus, jqXHR) {
                            if(data === true){$('#email-error').show(); $('#email-error').text('This email is already taken');}
                            else{$('#email-error').hide(); }
                        },
         statusCode     : {
                 404    : function(){console.log("404 Page Not found");
                          }
                         }
        })//fin ajax
        .fail(function AjaxFailed(e){$('#email-error').text('Low debit of interner. Please try later');});
    }
    function sendValues(form){
        $.ajax(
        {
          url           : 'index.php?p=register&a=reg',
          type          : 'post',
          timeout       : 3000,
          data          : form.serialize(),
          dataType      : 'json',
          beforeSend    : function (xhr) {
                        console.log('registering...');
                        },
         success        : function (data, textStatus, jqXHR) {
                            console.log('datas :'+data);
                            if(data === true){window.location = 'index.php?p=register&a=step2'}
                        },
         error          : function (textStatus, errorThrown) {
                        $('#captcha-error').text("Warning!!!! There was an Error when Sending datas");
                        },
         complete       : function (jqXHR, textStatus) {
                        console.log('Completed Action  Statut --'+textStatus);
                        },
         statusCode     : {
                 404    : function(){console.log("404 Page Not found");
                          }
                         }
        })//fin ajax
        .fail(function AjaxFailed(e){$('#captcha-error').text('Low debit of interner. Please try later');});
        
    }
});
