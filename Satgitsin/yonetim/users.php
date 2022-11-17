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
                <h3>Kullanıcı <small>İşlemleri</small></h3>
              </div>

              
            </div>

            <div class="clearfix"></div>

            <div class="row">
              

              

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Kullanıcılar <small>Listesi</small></h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>Adı Soyadı</th>
                          <th>Eposta</th>
                          <th>Telefon</th>
                          <th>Kayıt Tarihi</th>
                          <th>Adres Bilgisi</th>
                          <th>Alışveriş Toplamı</th>
                          <th>Yüklenen Bakiye Toplamı</th>
                          <th>Bakiye</th>
                          <th>Bakiye Yükle</th>
                          
                          
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
var verishopArry = [];
var vericuzdanArry = [];
var verikalanArry = [];
postUrl = "qrry/users.php";

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
        veriAdrsArry = resp["adresArry"];
        verishopArry = resp["shopArry"];
        vericuzdanArry = resp["cuzdanArry"];
        verikalanArry = resp["kalanArry"];
        $('#datatable-responsive').DataTable().destroy();
        $('#datatable-responsive').find('tbody').html('');   
        for(var i = 0; i < veriArry.length; i++) 
        {  
            var trLine = '<tr>'+
            '<td>' + veriArry[i]["isim"] + ' '+ veriArry[i]["soyad"] +'</td>' +
            '<td>' + veriArry[i]["mail"] + '</td>' +
            '<td>' + veriArry[i]["tel"] + '</td>' +
            '<td>' + veriArry[i]["tarih"] + '</td>' +
            '<td><button type="button" data-id="' + i + '" class="btn btn-info btn-xs adressBtn">Adres Bilgisi</button></td>' +
            '<td>' + verishopArry[i] +'</td>' +
            '<td>' + vericuzdanArry[i] +'</td>' +
            '<td>' + verikalanArry[i] +'</td>' +
            '<td><button type="button" data-id="' + veriArry[i]["id"] + '" class="btn btn-warning btn-xs doPaymnt">Bakiye Yükle</button></td>'; 
            $('#datatable-responsive').find('tbody').append(trLine); 
        }

        $('#datatable-responsive').DataTable().draw();

}
      

      $(document).ready(function() { 
        getList();

        $("#datatable-responsive").on("click", ".adressBtn", function(){  
            var dgri = $(this).attr("data-id");
            var adi = $(this).closest('tr').find('td:eq(0)').html(); 
            var sirketAdi = "Bilinmiyor"; console.log(veriAdrsArry[dgri][0]["adres"]);
            if(veriAdrsArry[dgri][0]["sirket"] != "") { sirketAdi = veriAdrsArry[dgri][0]["sirket"]; }
            var modalBdy = '<div id="errPlace" style="width:100%; color:#e74a3b; text-align:center; margin-bottom:20px;"></div>'+
            '<div class="col-md-3 col-sm-3 col-xs-3"> Şirket </div><div class="col-md-9 col-sm-9 col-xs-9"> '+sirketAdi+' </div><div class="clearfix"></div>' +
            '<div class="col-md-3 col-sm-3 col-xs-3"> Adres </div><div class="col-md-9 col-sm-9 col-xs-9"> '+veriAdrsArry[dgri][0]["adres"]+' </div><div class="clearfix"></div>' +
            '<div class="col-md-3 col-sm-3 col-xs-3"> Posta Kodu </div><div class="col-md-9 col-sm-9 col-xs-9"> '+veriAdrsArry[dgri][0]["postakodu"]+' </div><div class="clearfix"></div>' +
            '<div class="col-md-3 col-sm-3 col-xs-3"> İlçe </div><div class="col-md-9 col-sm-9 col-xs-9"> '+veriAdrsArry[dgri][0]["sehir"]+' </div><div class="clearfix"></div>' +
            '<div class="col-md-3 col-sm-3 col-xs-3"> Şehir </div><div class="col-md-9 col-sm-9 col-xs-9"> '+veriAdrsArry[dgri][0]["ulke"]+' </div><div class="clearfix"></div>' +


                       '</div>';
                    var modalNameText = 'Adres Bilgisi ('+adi+')';
                    var btnArry = ["","Kapat","",""];
                    var btnColorArry = ["btn-primary makePayment","btn-secondary","btn-secondary",""];
                    var btnCancel = "modalbttn2";
                    modalPlacement(btnArry,btnColorArry,btnCancel,modalNameText,modalBdy);

        });


        $("#datatable-responsive").on("click", ".doPaymnt", function(){  
          var userID = $(this).attr("data-id");
          var tarihOrn = '<?php echo date("Y-m-d"); ?>'; 
          var adi = $(this).closest('tr').find('td:eq(0)').html(); 
          var modalBdy = '<div id="errPlace" style="width:100%; color:#e74a3b; text-align:center; margin-bottom:20px;"></div>'+
          '<div class="form-group" style="padding-bottom: 10px">'+
                        ' <label class="control-label col-md-3 col-sm-3 col-xs-12" for="adi">Ödeme Tarihi <span class="required">*</span>' +
                        '</label>' +
                        '<div class="col-md-6 col-sm-6 col-xs-12">' +
                          '<input type="date" id="tarih" required="required" class="form-control col-md-7 col-xs-12" style="margin-top:-12px;" value="'+tarihOrn+'">' +
                       ' </div><div class="clearfix"></div>' +

                       ' <label class="control-label col-md-3 col-sm-3 col-xs-12" for="adi" style="margin-top: 10px;">Tutar<span class="required">*</span>' +
                        '</label>' +
                        '<div class="col-md-6 col-sm-6 col-xs-12">' +
                          '<input type="number" id="miktar" required="required" class="form-control col-md-7 col-xs-12" style="margin-top:12px;">' +
                          '<input id="kullanici" type="hidden" value="'+userID+'">'+
                       ' </div><div class="clearfix"></div>' +
                       '</div>';
                    var modalNameText = 'Bakiye İşlemleri ('+adi+')';
                    var btnArry = ["Bakiye Yükle","İptal","",""];
                    var btnColorArry = ["btn-primary makePayment","btn-secondary","btn-secondary",""];
                    var btnCancel = "modalbttn2";
                    modalPlacement(btnArry,btnColorArry,btnCancel,modalNameText,modalBdy);
        });


        $("#newModal .modal-footer").on("click", ".makePayment", function(){  
          var tarih = $("#tarih").val(); 
          var miktar = $("#miktar").val(); 
          var kullanici = $("#kullanici").val(); 
         
          
          postData.push({name: "tarih", value: tarih});
          postData.push({name: "miktar", value: miktar});
          postData.push({name: "kullanici", value: kullanici});
          postData.push({name: "tur", value: "2"});
          postData.push({name: "type", value: "makePayment"}); 
          SendPostJson(postData,postUrl,getlistSccs,getlistSccsErr);

         }); 

       
      });
    </script>
    <!-- /Datatables -->

  
  </body>
</html>