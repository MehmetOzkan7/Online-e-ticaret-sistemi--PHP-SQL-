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
                <h3>Tedarikçi <small>İşlemleri</small></h3>
              </div>

              
            </div>

            <div class="clearfix"></div>

            <div class="row">
              

              

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Tedarikçi <small>Listesi</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                    <button type="button" class="btn btn-success btn-xs addNew">+ Yeni</button>
                     
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>Adi</th>
                          <th>Yetkili</th>
                          <th>Alımlar Toplamı</th>
                          <th>Ödemeler Toplamı</th>
                          <th>Bakiye</th>
                          <th>Ödeme Yap</th>
                          <th>Düzenle</th>
                          <th>Durum</th>
                          
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
postUrl = "qrry/tedarikci.php";

      function getList(){
        SendPostJson(postData,postUrl,addNewSplierSccs,addNewSplierErr);
      }
      
      function SetTable(resp){
        var alimArry = resp["respAlimTtl"];
        var odemeArry = resp["respOdemeTtl"];
        var farkArry = resp["respFarkTtl"];
        $('#datatable-responsive').DataTable().destroy();
        $('#datatable-responsive').find('tbody').html('');  
        for(var i = 0; i < veriArry.length; i++) 
                {  
                  var aktifBtn = '<button type="button" data-id="' + veriArry[i]["id"] + '" class="btn btn-danger btn-xs activeBtn">Pasif</button>';
                  if(veriArry[i]["durum"] == 1) {
                    aktifBtn = '<button type="button" data-id="' + veriArry[i]["id"] + '" class="btn btn-primary btn-xs activeBtn">Aktif</button>';
                  }
                  
                  var trLine = '<tr data-id="'+veriArry[i]["id"]+'">'+
                  '<td>' + veriArry[i]["adi"] + '</td>' +
                  '<td>' + veriArry[i]["yetkili"] + '</td>' +
                  '<td>' + alimArry[i] + '</td>' + '<td>' + odemeArry[i] + '</td>' + '<td>' + farkArry[i] + '</td>' +
                  '<td><button type="button" data-id="' + veriArry[i]["id"] + '" class="btn btn-warning btn-xs doPaymnt">Ödeme Yap</button></td>' +
                  '<td><button type="button" data-id="' + veriArry[i]["id"] + '" class="btn btn-info btn-xs updtBtn">Düzenle</button></td>' +
                  '<td>'+aktifBtn+'</td>';
                  $('#datatable-responsive').find('tbody').append(trLine);
                }

        $('#datatable-responsive').DataTable().draw();
      }

      function addNewSplierErr(err){
        $("#errPlace").html(err);
      }

      function addNewSplierSccs(resp){
        veriArry = resp["resp"];
        SetTable(resp);
        $("#newModal").modal('hide');
      }


      $(document).ready(function() {
        getList();
        
        $("#newModal .modal-footer").on("click", ".makePayment", function(){  
          var tarih = $("#tarih").val(); 
          var miktar = $("#miktar").val(); 
          var kullanici = $("#kullanici").val(); 
         
          
          postData.push({name: "tarih", value: tarih});
          postData.push({name: "miktar", value: miktar});
          postData.push({name: "kullanici", value: kullanici});
          postData.push({name: "tur", value: "1"});
          postData.push({name: "type", value: "makePayment"}); 
          SendPostJson(postData,postUrl,addNewSplierSccs,addNewSplierErr);

         }); 

        $("#datatable-responsive").on("click", ".doPaymnt", function(){  
          var userID = $(this).attr("data-id");
          var tarihOrn = '<?php echo date("Y-m-d"); ?>'; 
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
                    var modalNameText = 'Ödeme İşlemleri';
                    var btnArry = ["Ödeme Yap","İptal","",""];
                    var btnColorArry = ["btn-primary makePayment","btn-secondary","btn-secondary",""];
                    var btnCancel = "modalbttn2";
                    modalPlacement(btnArry,btnColorArry,btnCancel,modalNameText,modalBdy);
        });

        $("#newModal .modal-footer").on("click", ".addSplier", function(){  
          var adi = $("#adi").val(); 
          var yetkili = $("#yetkili").val(); 
          
          postData.push({name: "adi", value: adi});
          postData.push({name: "yetkili", value: yetkili});
          postData.push({name: "type", value: "Add"});
          SendPostJson(postData,postUrl,addNewSplierSccs,addNewSplierErr);

         }); 

         $("#datatable-responsive").on("click", ".activeBtn", function(){  
            var id = $(this).attr("data-id"); 
            postData.push({name: "id", value: id});
            postData.push({name: "type", value: "UpdtStts"});
            SendPostJson(postData,postUrl,addNewSplierSccs,addNewSplierErr);
          });

          $("#datatable-responsive").on("click", ".updtBtn", function(){  
            var id = $(this).attr("data-id"); 
            var adi = $(this).closest('tr').find('td:eq(0)').html(); 
            var yetkili = $(this).closest('tr').find('td:eq(1)').html(); 
            var modalBdy = '<div id="errPlace" style="width:100%; color:#e74a3b; text-align:center; margin-bottom:20px;"></div>'+
          '<div class="form-group" style="padding-bottom: 10px">'+
                       ' <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Üretici Adı <span class="required">*</span>' +
                        '</label>' +
                        '<div class="col-md-6 col-sm-6 col-xs-12">' +
                          '<input type="text" id="adi" required="required" class="form-control col-md-7 col-xs-12" style="margin-top:-12px;" value="'+adi+'">' +
                          '<input id="idsi" type="hidden" value="'+id+'">'+
                       ' </div><div class="clearfix"></div>' +
                       ' <label class="control-label col-md-3 col-sm-3 col-xs-12" for="yetkili">Yetkili Adı' +
                        '</label>' +
                       '<div class="col-md-6 col-sm-6 col-xs-12" style="margin-top: 12px;">' +
                          '<input type="text" id="yetkili" required="required" class="form-control col-md-7 col-xs-12" style="margin-top:-12px;" value="'+yetkili+'">' +
                       ' </div>' +
                      '</div>';
                    
                    var modalNameText = 'Üretici Düzenleme';
                    var btnArry = ["Güncelle","İptal","",""];
                    var btnColorArry = ["btn-primary updtNow","btn-secondary","btn-secondary",""];
                    var btnCancel = "modalbttn2";
                    modalPlacement(btnArry,btnColorArry,btnCancel,modalNameText,modalBdy);
            
          });

          $("#newModal .modal-footer").on("click", ".updtNow", function(){  
          var adi = $("#adi").val();
          var yetkili = $("#yetkili").val();
          var id = $("#idsi").val();
          
          postData.push({name: "adi", value: adi});
          postData.push({name: "yetkili", value: yetkili});
          postData.push({name: "id", value: id});
          postData.push({name: "type", value: "Update"});
          SendPostJson(postData,postUrl,addNewSplierSccs,addNewSplierErr);

         }); 

        $(".addNew").on("click",  function(){ 
          var modalBdy = '<div id="errPlace" style="width:100%; color:#e74a3b; text-align:center; margin-bottom:20px;"></div>'+
          '<div class="form-group" style="padding-bottom: 10px">'+
                       ' <label class="control-label col-md-3 col-sm-3 col-xs-12" for="adi">Tedarikçi Adı <span class="required">*</span>' +
                        '</label>' +
                        '<div class="col-md-6 col-sm-6 col-xs-12">' +
                          '<input type="text" id="adi" required="required" class="form-control col-md-7 col-xs-12" style="margin-top:-12px;">' +
                       ' </div><div class="clearfix"></div>' +
                       ' <label class="control-label col-md-3 col-sm-3 col-xs-12" for="yetkili">Yetkili Adı' +
                        '</label>' +
                        '<div class="col-md-6 col-sm-6 col-xs-12" style="margin-top: 12px;">' +
                          '<input type="text" id="yetkili" required="required" class="form-control col-md-7 col-xs-12" style="margin-top:-12px;">' +
                       ' </div>' +
                      '</div>';
                      
                    
                    var modalNameText = 'Tedariçi Ekleme';
                    var btnArry = ["Ekle","İptal","",""];
                    var btnColorArry = ["btn-primary addSplier","btn-secondary","btn-secondary",""];
                    var btnCancel = "modalbttn2";
                    modalPlacement(btnArry,btnColorArry,btnCancel,modalNameText,modalBdy);
        });
      });
    </script>
    <!-- /Datatables -->

  
  </body>
</html>