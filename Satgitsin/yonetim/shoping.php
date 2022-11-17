<?php include("header.php"); ?>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Bakkal Yönetim</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <!-- <div class="profile clearfix">
              <div class="profile_pic">
                <img src="images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>John Doe</h2>
              </div>
            </div> -->
            <!-- /menu profile quick info -->

            <br />

            <?php include("menu.php"); ?>

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <!-- <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a> -->
              <a data-toggle="tooltip" data-placement="top" title="Logout">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Alışveriş <small>İşlemleri</small></h3>
              </div>

              
            </div>

            <div class="clearfix"></div>

            <div class="row">
              

              

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Alışveriş <small>Listesi</small></h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Tarih</th>
                          <th>Kullanıcı</th>
                          <th>Tutar</th>
                          <th>Drumu</th>
                          <th>Detay</th>
                                                    
                          
                        </tr>
                      </thead>
                      <tbody>
                       
                        
                      </tbody>
                    </table>

                  </div>
                </div>
              </div>

              

              

              
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
          <a href="index.php" class="site_title"><i class="fa fa-paw"></i> <span>Bakkal Yönetim</span></a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>
    <?php include("modal.php"); ?>
    <!-- jQuery -->
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="vendors/nprogress/nprogress.js"></script>
    <!-- iCheck -->
    <script src="vendors/iCheck/icheck.min.js"></script>
    <!-- Datatables -->
    <script src="vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="vendors/datatables.net-scroller/js/datatables.scroller.min.js"></script>
    <script src="vendors/jszip/dist/jszip.min.js"></script>
    <script src="vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="vendors/pdfmake/build/vfs_fonts.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.min.js"></script>
    <script src="js/mainfunctions.js"></script>
    <script>
      $(document).ready(function() {
        var handleDataTableButtons = function() {
          if ($("#datatable-buttons").length) {
            $("#datatable-buttons").DataTable({
              dom: "Bfrtip",
              buttons: [
                {
                  extend: "copy",
                  className: "btn-sm"
                },
                {
                  extend: "csv",
                  className: "btn-sm"
                },
                {
                  extend: "excel",
                  className: "btn-sm"
                },
                {
                  extend: "pdfHtml5",
                  className: "btn-sm"
                },
                {
                  extend: "print",
                  className: "btn-sm"
                },
              ],
              responsive: true
            });
          }
        };

        TableManageButtons = function() {
          "use strict";
          return {
            init: function() {
              handleDataTableButtons();
            }
          };
        }();

        $('#datatable').dataTable();

        $('#datatable-keytable').DataTable({
          keys: true
        });

        $('#datatable-responsive').DataTable();

        $('#datatable-scroller').DataTable({
          ajax: "js/datatables/json/scroller-demo.json",
          deferRender: true,
          scrollY: 380,
          scrollCollapse: true,
          scroller: true
        });

        $('#datatable-fixed-header').DataTable({
          fixedHeader: true
        });

        var $datatable = $('#datatable-checkbox');

        $datatable.dataTable({
          'order': [[ 1, 'asc' ]],
          'columnDefs': [
            { orderable: false, targets: [0] }
          ]
        });
        $datatable.on('draw.dt', function() {
          $('input').iCheck({
            checkboxClass: 'icheckbox_flat-green'
          });
        });

        TableManageButtons.init();
      });

var veriArry = [];
var veriAdrsArry = [];
var veriKullaniciArry = [];

postUrl = "qrry/shoping.php";

function getlistSccsErr(err) {
    $("#errPlace").html(err);
}

function getlistSccs(resp) {
    veriArry = resp["resp"];
    SetTable(resp);
    $("#newModal").modal('hide');
}

function getList(){ 
    SendPostJson(postData,postUrl,getlistSccs,getlistSccsErr);
}

function SetTable(resp){ 
        veriKullaniciArry = resp["kullaniciArray"];
        
        $('#datatable-responsive').DataTable().destroy();
        $('#datatable-responsive').find('tbody').html('');   
        for(var i = 0; i < veriArry.length; i++) 
        {  
            var durum = "Ödeme Alındı";
            if(veriArry[i]["durum"] == 2) { durum = "Hazırlanıyor"; }
            if(veriArry[i]["durum"] == 3) { durum = "Kargoya Verildi"; }
            if(veriArry[i]["durum"] == 4) { durum = "Teslim Edildi"; }
            var trLine = '<tr>'+
            '<td>' + veriArry[i]["no"] + '</td>' +
            '<td>' + veriArry[i]["tarih"] + '</td>' +
            '<td>' + veriKullaniciArry[i][0]["isim"] + ' ' +veriKullaniciArry[i][0]["soyad"] + '</td>' +
            '<td>' + veriArry[i]["tutar"] + '</td>' +
            '<td>' + durum + '</td>' +
            '<td><button type="button" data-id="' + veriArry[i]["no"] + '" data-user="' + veriArry[i]["kullanici"] + '" class="btn btn-info btn-xs adressBtn">Detay</button></td>';
            
            $('#datatable-responsive').find('tbody').append(trLine); 
        }

        $('#datatable-responsive').DataTable().draw();

}
// getSptSccs getSptErr
function getSptSccs(resp){ 
    var kllnicArry = resp["isim"];
    var adresArry = resp["adres"]; 
    var sptArry = resp["sepet"]; 
    var urunArray = resp["urun"]; 
    var alverDrm = resp["alverDrm"];  
    var modalBdy = '<div id="errPlace" style="width:100%; color:#e74a3b; text-align:center; margin-bottom:20px;"></div>'+
            '<div class="col-md-3 col-sm-3 col-xs-3"> Kullanici </div><div class="col-md-9 col-sm-9 col-xs-9"> '+kllnicArry[0]["isim"]+' ' + kllnicArry[0]["soyad"]+  '</div><div class="clearfix"></div>' +
            '<div class="col-md-3 col-sm-3 col-xs-3"> Adres </div><div class="col-md-9 col-sm-9 col-xs-9"> '+adresArry[0]["sirket"]+'<br>'+adresArry[0]["adres"]+
            ''+adresArry[0]["postakodu"]+' '+adresArry[0]["sehir"]+' / '+adresArry[0]["ulke"]+' </div><div class="clearfix" style="margin-bottom:20px;"></div>' + 
            '<input id="alver" type="hidden" value="'+alverDrm[0]["no"]+'">'+
            '<input id="user" type="hidden" value="'+kllnicArry[0]["id"]+'">';
            
            for(var i = 0; i < sptArry.length; i++) 
            {  
                modalBdy = modalBdy + 
                '<div class="col-md-12 col-sm-12 col-xs-12">'+sptArry[i]["adet"]+' Adt X ' +sptArry[i]["fiyat"]+ ' TL '+urunArray[i][0]["kod"]+' '+urunArray[i][0]["urunadi"]+' <b>Ara Toplam :</b> '+sptArry[i]["toplam"]+' TL</div><div class="clearfix"></div>';
            }
            modalBdy = modalBdy + '<div class="clearfix" style="margin-bottom:20px;"></div>';

            for(var s = 1; s <= 4; s++) 
            {  
                var btnDeger = "Ödeme Alındı";
                var checkPstn = "";
                if(alverDrm[0]["durum"] == s) { checkPstn = "CHECKED"; }
                if(s == 2){ btnDeger = "Hazırlanıyor"; }
                if(s == 3){ btnDeger = "Kargoya Verildi"; }
                if(s == 4){ btnDeger = "Teslim Edildi"; }
                modalBdy = modalBdy + 
                '<div class="form-check form-check-inline" style="float:left; margin-left:15px;">'+
                    '<input class="form-check-input" type="radio" name="inlineRadioOptions"  value="'+s+'" '+checkPstn+'>'+
                    '<label class="form-check-label" for="inlineRadio1">'+btnDeger+'</label>'+
                '</div>';
            }
            
            modalBdy = modalBdy + '</div>';
                    var modalNameText = 'Alışveriş Sepeti';
                    var btnArry = ["Durum Güncelle","İptal","",""];
                    var btnColorArry = ["btn-primary update","btn-secondary","btn-secondary",""];
                    var btnCancel = "modalbttn2";
                    modalPlacement(btnArry,btnColorArry,btnCancel,modalNameText,modalBdy);
}

function getSptErr(err){ 
    var modalBdy = '<div id="errPlace" style="width:100%; color:#e74a3b; text-align:center; margin-bottom:20px;">'+err+'</div>';
                    var modalNameText = 'Alışveriş Sepeti';
                    var btnArry = ["","Kapat","",""];
                    var btnColorArry = ["btn-primary makePayment","btn-secondary","btn-secondary",""];
                    var btnCancel = "modalbttn2";
                    modalPlacement(btnArry,btnColorArry,btnCancel,modalNameText,modalBdy);
}
      

      $(document).ready(function() { 
        getList();

        
        $("#newModal .modal-footer").on("click", ".update", function(){  
            var alverNo = $("#alver").val();
            var user = $("#user").val();
            var drm = $("#newModal input[type='radio']:checked").val(); 
            postData.push({name: "alverNo", value: alverNo});
            postData.push({name: "user", value: user});
            postData.push({name: "drm", value: drm});
            postData.push({name: "type", value: "updt"}); 
            SendPostJson(postData,postUrl,getlistSccs,getlistSccsErr); 
        });


        
            $("#datatable-responsive").on("click", ".adressBtn", function(){  
            var alverID = $(this).attr("data-id");
            var user = $(this).attr("data-user");
            postData.push({name: "alverID", value: alverID});
            postData.push({name: "user", value: user});
            postData.push({name: "type", value: "getDetail"}); 
            SendPostJson(postData,postUrl,getSptSccs,getSptErr); 
         }); 

       
      });
    </script>
    <!-- /Datatables -->

  
  </body>
</html>