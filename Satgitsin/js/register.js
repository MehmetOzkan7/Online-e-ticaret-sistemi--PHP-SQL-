postUrl = "qrry/login.php";

function okim(resp) { window.location.href = 'index.php'; }

function err(resp){ $("#errPlace").html(resp); }

function loginerr(resp){ $("#loginErrPlace").html(resp); }


function productIndexScss(resp){
    var altiliSeri = resp["respUrnAltili"];
    var yediliSeri = resp["respUrnYedili"];
    //$("#product-carousel").html("");
    
    
}


function getIndexProductList(){ 
    var productUrl = "qrry/product.php";
    SendPostJson(postData,productUrl,productIndexScss,err);    
}

function setdivHeightIndex(){
    var maxHeight = 0;
    $('#product-carousel .owl-item').each(function(){ 
        //$(this).height('auto'); 
        console.log($(this).height())
        //if (maxHeight < $(this).height()) {maxHeight = $(this).height()}
    });
    // $('#product-carousel .item').each(function(){
    //     $(this).height(maxHeight);
    // });
}

function addLineScss(resp){ 
    var message = resp["msg"];
    $("#genMessage").css("background","#39b3ca");
    $("#genMessage").html(message);
    $("#genMessageArea").slideDown(300).delay(1000).slideUp();
    getSepetDeatilsScss(resp);
}

function addLineErr(err){ 
    $("#genMessage").css("background","#be3935");
    $("#genMessage").html(err);
    $("#genMessageArea").slideDown(300).delay(1000).slideUp();
}

function getSepetDeatils(){
    var sepetUrl = "qrry/sepet.php";
    SendPostJson(postData,sepetUrl,getSepetDeatilsScss,addLineErr);
}

function getSepetDeatilsScss(resp){
    var sepetTplm = resp["sptTplm"];
    var sptDtyArry = resp["sptDtyArry"]; 
    var resimArray = resp["resimArray"];
    var isimArray = resp["isimArray"]; 
    var kodArray = resp["kodArray"]; 
    $(".sptTplBedel").html(sepetTplm + ' TL');
    $(".table-condensed tbody").html("");
    for(var i = 0; i < sptDtyArry.length; i++) 
        {  
            var line = '<tr>' +
            '<td>'+
                '<a><img src="productImages/'+resimArray[i]+'" alt="" class="img-responsive"></a>' +
            '</td>' +
           ' <td><a style="padding-right: 2px;">'+isimArray[i]+'</a></td>' +
            '<td>'+sptDtyArry[i]["adet"]+'X</td>' +
            '<td>'+sptDtyArry[i]["fiyat"]+' TL</td>' +
            '<td class=""><i class="fa fa-plus-circle fa-2x oneUpLine" data-id="'+sptDtyArry[i]["id"]+'" style="cursor:pointer; padding:0px 2px;"></i></td>' +
            '<td><i class="fa fa-minus-circle fa-2x oneDownLine" data-id="'+sptDtyArry[i]["id"]+'" style="cursor:pointer; padding:0px 2px;"></i></td>' +
            '<td><i class="fa fa-times-circle fa-2x cancelLine" data-id="'+sptDtyArry[i]["id"]+'" style="cursor:pointer; padding:0px 2px;"></i></td>' +
            '</tr>';

            $('.table-condensed tbody').append(line); 
        }
        if($(".sepetTabloDetay").length >0 )
        { 
            $(".sepetTabloDetay tbody").html("");
            for(var s = 0; s < sptDtyArry.length; s++)  
                { 
                    var line = '<tr>' +
                    '<td><i class="fa fa-times fa-2x cancelLine" data-id="'+sptDtyArry[s]["id"]+'" style="cursor:pointer; padding:0px 2px;"></i></td>' +
                    '<td><img src="productImages/'+resimArray[s]+'" width="100" alt=""></td>' +
                    '<td>'+isimArray[s]+'</td>' +
                    '<td>'+kodArray[s]+'</td>' +
                   ' <td><i class="fa fa-minus-circle fa-2x oneDownLine" data-id="'+sptDtyArry[s]["id"]+'" style="cursor:pointer; padding:0px 4px;"></i>'+sptDtyArry[s]["adet"]+
                   '<i class="fa fa-plus-circle fa-2x oneUpLine" data-id="'+sptDtyArry[s]["id"]+'" style="cursor:pointer; padding-left:12px;"></i></td>'+
                    '<td>'+sptDtyArry[s]["fiyat"]+' TL</td>'+
                    '<td>'+sptDtyArry[s]["toplam"]+' TL</td>'+
                   '</tr>';
                   $('.sepetTabloDetay tbody').append(line); 
                }

         } 
}
function doPaymentScss(resp){
    getSepetDeatilsScss(resp);
    window.location.href = "gecmis.php";
}

$(document).ready(function() {
    var userIDsi = $("#userPerm").val();
    if(userIDsi == "1") {
        getSepetDeatils();
    }
 $(".sendRqst").on("click",  function(){ 
        postData = $('#registerForm').serializeArray();
        SendPostJson(postData,postUrl,okim,err);
 });

 $(".urnAktifOturumYok").on("click",  function(){  
    $("#genMessage").css("background","#be3935");
    $("#genMessage").html('Önce Oturum Açmanız Gerekir');
    $("#genMessageArea").slideDown(300).delay(1000).slideUp();
    
 });

 $(".urnAktif").on("click",  function(){  
    var sepetUrl = "qrry/sepet.php";
    var urun = $(this).attr("data-id");
    postData.push({name: "urun", value: urun});
    postData.push({name: "type", value: "AddLine"});
    SendPostJson(postData,sepetUrl,addLineScss,addLineErr);
    
 });

 $(".doPayment").on("click",  function(){  
    var sepetUrl = "qrry/sepet.php";
    postData.push({name: "type", value: "doPayment"});
    SendPostJson(postData,sepetUrl,doPaymentScss,addLineErr);
    
 });
 
 $(".btnIcinSptDty tbody").on("click", "tr td .oneUpLine", function(){  
    var sepetUrl = "qrry/sepet.php";
    var lineId = $(this).attr("data-id");
    postData.push({name: "lineId", value: lineId});
    postData.push({name: "type", value: "updtLine"});
    postData.push({name: "tur", value: "plus"});
    SendPostJson(postData,sepetUrl,getSepetDeatilsScss,addLineErr);
    
 });

 $(".btnIcinSptDty tbody").on("click",  "tr td .oneDownLine", function(){  
    var sepetUrl = "qrry/sepet.php";
    var lineId = $(this).attr("data-id");
    postData.push({name: "lineId", value: lineId});
    postData.push({name: "type", value: "updtLine"});
    postData.push({name: "tur", value: "minus"});
    SendPostJson(postData,sepetUrl,getSepetDeatilsScss,addLineErr);
    
 });
  
 $(".btnIcinSptDty tbody").on("click",  "tr td .cancelLine", function(){  
    var sepetUrl = "qrry/sepet.php";
    var lineId = $(this).attr("data-id");
    postData.push({name: "lineId", value: lineId});
    postData.push({name: "type", value: "updtLine"});
    postData.push({name: "tur", value: "delLine"});
    SendPostJson(postData,sepetUrl,getSepetDeatilsScss,addLineErr);
    
 });


 $(".loginBtn").on("click",  function(){ 
    postData = $('#loginForm').serializeArray();
    SendPostJson(postData,postUrl,okim,loginerr);
});

 
});