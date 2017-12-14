/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function(){
    
        $(".loader").hide();
        $(".blinder").hide();
    $('#form_auth').on('submit',function(e){
        e.preventDefault();
        $.ajax(
        {
          url           : 'index.php?p=login&a=auth',
          type          : 'post',
          timeout       : 3000,
          data          : $(this).serialize(),
          dataType      : 'json',
          beforeSend    : function (xhr) {
                        $(".loader").show();
                        $(".blinder").show();
                        },
         success        : function (data, textStatus, jqXHR) {
                            $(".loader").hide();
                            $(".blinder").hide();
                            if(data['statut']=== 1){ $(".success").text("Successful");; window.location = data['redirect'];}
                            else{ $('.errors').text(data['response']); }
                        },
         error          : function (textStatus, errorThrown) {
                        $(".loader").hide();
                        $(".blinder").hide();
                        $('.errors').text("Warning!!!! There was an Error when Sending datas");
                        },
         complete       : function (jqXHR, textStatus) {
                        console.log('Completed Action  Statut --'+textStatus);
                        },
         statusCode     : {
                 404    : function(){console.log("404 Page Not found");
                          }
                         }
        })//fin ajax
        .fail(function AjaxFailed(e){$(".blinder").hide(); $(".loader").hide();$('.errors').text('Low debit of interner. Please try later')})
    }); //fin on submit  
});



