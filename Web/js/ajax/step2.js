
jQuery(document).ready(function() {
        
    /*
        Fullscreen background
    */
    $.backstretch("./images/default/american.jpg");
    
    /*
        Form validation
    */
    $('.step2-form input[type="text"]').on('focus', function() {
    	$(this).removeClass('input-error');
    });
    
    //check the form
    $('#form-city').focusout(function (){
        if(!isGoodInputlength($(this))){ $('#city-error').text('Schould be between 3-25 caracteres');  $('#city-error').show();}else{$('#city-error').hide();};
    });
    $('#form-motivation').focusout(function (){
        if(!isGoodInputlength($(this))){ $('#motivation-error').text('Schould be between 5-250 caracteres');  $('#motivation-error').show();}else{$('#motivation-error').hide();};
    });
    $('#form-phone').focusout(function (){
        if(!isgoodPhone()){ $('#phone-error').text('The right format is 001-5551245');  $('#phone-error').show();}
        else{
            $('#phone-error').text('Good!');  $('#phone-error').show();
        };
    });
    
    
    $('.step2-form').on('submit', function(e) {
    	e.preventDefault();
                        //let's send the form here
                        sendValues($(this));
    	$(this).find('input[type="text"], textarea').each(function(){
    		if( $(this).val() === "" || !isGoodInputlength($('#form-first-name')) || !isGoodInputlength($('#form-last-name')) || !isGoodInputlength($('#form-password')) || !isMatchedPassword() || !isgoodEmail()) {
    			e.preventDefault();
    			$(this).addClass('input-error');
    		}
    		else {
    			$(this).removeClass('input-error');
    		}
    	});
    	
    });
    
    
     function isGoodInputlength(data){
        var iLength = data.val().length;
        if(iLength < 3 || iLength >250){
            return false;
        }else{ return true;}
    }
    function isgoodPhone(){
        var pattern = new RegExp(/^[0-9]+-[0-9]/i);
        if(pattern.test($('#form-phone').val())){return true;}
        else{return false;}
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
