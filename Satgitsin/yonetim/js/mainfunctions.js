var postData = [];
var postUrl = "";
var orginalUrl = "";
function SendPostJson(data,url,respOkFnctn,respErrFnctn) 
{
    $.ajax({
                url: orginalUrl + url,
                type: 'POST',
                data: data,
                dataType: 'json',
                success: function(response)
                {
                    var err = response['ERR'];
                    postData = [];
                    if(err != '') { respErrFnctn(err); } else { respOkFnctn(response); }
                },
                error: function() { postData = []; regularPostErr(); }
        
            });

}

function regularPostErr()
{
    alert("Post Hatası");
    
}


function modalPlacement(buttonName,btnColorArry,btnCancel,modalNameText,modalBdy){
    //buton renkler btn-primary mavi, btn-success yeşil, btn-secondary gri, btn-info turkuaz, btn-warning sarı, btn-danger kırmızı
    // buton idler modalbttn1 , modalbttn2, modalbttn3, modalbttn4
    $('#newModal .modal-footer button').removeAttr('class');
    $('#newModal .modal-footer button').removeAttr('data-dismiss');
    $('#newModal .modal-footer button').attr('class', 'btn');
    $('#newModal .modal-footer button').hide();
    if(buttonName[0] != "") { $("#modalbttn1").html(buttonName[0]).addClass(btnColorArry[0]).show(); }
    if(buttonName[1] != "") { $("#modalbttn2").html(buttonName[1]).addClass(btnColorArry[1]).show(); }
    if(buttonName[2] != "") { $("#modalbttn3").html(buttonName[2]).addClass(btnColorArry[2]).show(); }
    if(buttonName[3] != "") { $("#modalbttn4").html(buttonName[3]).addClass(btnColorArry[3]).show(); }
    if(btnCancel != "") { $("#"+btnCancel).attr('data-dismiss','modal'); }
    $("#newModalLabel").html(modalNameText);
    $('.modal-body').html(modalBdy);

    $("#newModal").modal('show');
}



function generalReadImageURLWithSize(input,storage,MAX_WIDTH,MAX_HEIGHT,afterfunction) { 
    if (input.files && input.files[0]) {
    
        var reader = new FileReader(); 
        reader.onload = function(e) { 
            var uzantilar = ["jpeg","png","jpg"];
            var uzanti = e.target.result.split(";")[0].split(":")[1].split("/")[1];
            if(uzantilar.indexOf(uzanti) != -1){ 
             var img = new Image(); 
             img.src = e.target.result;  
             img.onload = function() {
    
    
    var width = img.width;
    var height = img.height; 

    if (width > height) {
        if (width > MAX_WIDTH) {
            height *= MAX_WIDTH / width;
            width = MAX_WIDTH;
        }
    } else {
        if (height > MAX_HEIGHT) {
            width *= MAX_HEIGHT / height;
            height = MAX_HEIGHT;
        }
    }

    var canvas = document.createElement("canvas");
    canvas.width = width;
    canvas.height = height; 
    canvas.getContext("2d").drawImage(img, 0, 0, canvas.width, canvas.height);
    var imageUpdateUrl =  canvas.toDataURL();
   
    $('#'+storage).val(imageUpdateUrl); 
    afterfunction();
    
    }
   
            } else {  $('#'+storage).val(""); afterfunction();  }
            
        }
        
        reader.readAsDataURL(input.files[0]); // convert to base64 string
       
    }  
    
}