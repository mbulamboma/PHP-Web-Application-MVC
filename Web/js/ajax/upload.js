$(document).ready(function(){
    /*
        Fullscreen background
    */
    $.backstretch("./images/default/american.jpg");
    
    $('.avatar-error').hide();
        $(".progress").hide();

        $("#image-uploader").on('dragover',function(e){
                e.stopPropagation();
                e.preventDefault();
                $(this).css('border','2px solid #1abc9c');
        });

        $("#image-uploader").on('drop',function(e){
                e.stopPropagation();
                e.preventDefault();
                $(this).css('border','1px dotted #555');

                var files = e.originalEvent.dataTransfer.files;
                var file = files[0];
                console.log(file);				
                upload(file);
        });
});

function upload(file){
        var name = file.name;
        var ext = name.substr(name.lastIndexOf(".")+1).toLowerCase();
        var heavy = file.size;
        if(ext === 'jpg' || ext === 'jpeg' || ext === 'gif' || ext === 'png'){
            if(heavy > 1500000){$('.avatar-error').show(); $('.avatar-error').text('The file must not be heavier than 1MB'+heavy);}
            else{
                $('.avatar-error').hide();
                var formdata = new FormData();
                formdata.append('file',file);
                console.log(formdata);

                $.ajax({
                        method: 'POST',
                         url: 'index.php?p=profil&a=avatar',
                         xhr: function(){
                                var xhr = new window.XMLHttpRequest();
                                xhr.upload.addEventListener("progress", function(evt){
                                if(evt.lengthComputable) {
                                    var percentComplete = (evt.loaded / evt.total)*100;
                                $(".progress").show();
                                $(".progress-bar").css("width", percentComplete + "%");
                                $(".progress-bar").text(parseInt(percentComplete) + "%");    
                                  }
                             }, false);       
                                return xhr;
                            },
                        contentType:false,
                        processData: false,
                        dataType: 'json',
                        data: formdata,
                        success: function(data){
                                    console.log(data.path);
                                    $("#image").html('<img class="img-responsive" width= "120" src="'+data.path+'">');
                                }

                    });
                }
        }
        else{
                alert("You can only upload image file");
        }
}