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
                <h3>Fatura <small>İşlemleri</small></h3>
              </div>

              
            </div>

            <div class="clearfix"></div>

            <div class="row">
              

              

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Fatura <small>Listesi</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                    <button type="button" class="btn btn-success btn-xs addNew">+ Yeni</button>
                     
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>Fatura Tarihi</th>
                          <th>Fatura No</th>
                          <th>Tedarikçi</th>
                          <th>Fatura Bedeli</th>
                          <th>İncele</th>
                          
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
var veriArryTdrk = [];
postUrl = "qrry/fatura.php";

      function getList(){
        SendPostJson(postData,postUrl,addNewSplierSccs,addNewSplierErr);
      }

      function SetTable(){
        $('#datatable-responsive').DataTable().destroy();
        $('#datatable-responsive').find('tbody').html('');  
        for(var i = 0; i < veriArry.length; i++) 
                {  
                  var tedarikIsi =  veriArryTdrk.map(function(o) { return o.id; }).indexOf(veriArry[i]["tedarikci"]);
                  var trLine = '<tr data-id="'+veriArry[i]["id"]+'">'+
                  '<td>' + veriArry[i]["tarih"] + '</td>' +
                  '<td>' + veriArry[i]["no"] + '</td>' +
                  '<td>' + veriArryTdrk[tedarikIsi]["adi"] + ' - '+ veriArryTdrk[tedarikIsi]["yetkili"] +'</td>' +
                  '<td>' + veriArry[i]["toplam"] + ' TL</td>' +
                  '<td><button type="button" data-id="' + veriArry[i]["id"] + '" class="btn btn-info btn-xs ftrDty">Detay</button></td>';
                  $('#datatable-responsive').find('tbody').append(trLine);
                }

        $('#datatable-responsive').DataTable().draw();
      }

      function addNewSplierErr(err){
        $("#errPlace").html(err);
      }

      function addNewSplierSccs(resp){
        veriArry = resp["respInv"];
        veriArryTdrk = resp["respTdrk"]; 
        SetTable();
        $("#newModal").modal('hide');
      } 
      function addNewLineOk(resp){
        veriArry = resp["respInv"];
        veriArryTdrk = resp["respTdrk"]; 
        SetTable(); 
        invoiceDetail(resp);
      }  

      function invoiceDetail(resp){ 
          var urunArry = resp["respUrun"];
          var ftrId = resp["respftrId"];
          var ftrLineArry = resp["respftrDty"]; 
          var ftrArry = resp["respInv"]; 
          var ftrIsi =  ftrArry.map(function(o) { return o.id; }).indexOf(ftrId);
          var tdrkIsi = veriArryTdrk.map(function(o) { return o.id; }).indexOf(ftrArry[ftrIsi]["tedarikci"]);
                        var tdrkAdi = veriArryTdrk[tdrkIsi]["adi"] + ' - '+ veriArryTdrk[tdrkIsi]["yetkili"];
          var select = '<select id="urnEkleScm" class="form-select" aria-label="Default select example" style="height: 28px;margin-top: -5px;">'+
                            '<option value="0" selected>Seçiniz</option>';
                            for(var i = 0; i < urunArry.length; i++) 
                            {  
                               
                                select = select + '<option value="'+urunArry[i]["id"]+'" >'+urunArry[i]["kod"]+' - '+urunArry[i]["urunadi"]+'</option>';
                                
                            }
                            select = select +'</select>';

        var modalBdy = '<div id="errPlace" style="width:100%; color:#e74a3b; text-align:center; margin-bottom:20px;"></div>'+
        '<div class="col-md-6 col-sm-6 col-xs-6"><b>Fatura No : </b>'+ftrArry[ftrIsi]["no"]+'</div>' +
        '<div class="col-md-6 col-sm-6 col-xs-6 text-right"><b>Fatura Tarihi : </b>'+ftrArry[ftrIsi]["tarih"]+'</div>' +
        '<div class="col-md-8 col-sm-8 col-xs-8"><b>Tedarikçi : </b>'+tdrkAdi+'</div><div class="col-md-4 col-sm-4 col-xs-4"><b>Genel Toplam : </b>'+ftrArry[ftrIsi]["toplam"]+' TL</div>' +
        '<div class="col-md-12 col-sm-12 col-xs-12" style="margin-bottom: 30px;margin-top: 5px;border: 1px solid #cecece;">'+

        '<div class="col-md-3 col-sm-3 col-xs-3">Ürün Kodu</div><div class="col-md-3 col-sm-3 col-xs-3">Ürün Adı</div>'+
        '<div class="col-md-2 col-sm-2 col-xs-2">Adet</div><div class="col-md-2 col-sm-2 col-xs-2">Fiyat</div>'+
        '<div class="col-md-2 col-sm-2 col-xs-2">Toplam</div>';
        for(var i = 0; i < ftrLineArry.length; i++) 
        {  
            var urnIsi = urunArry.map(function(o) { return o.id; }).indexOf(ftrLineArry[i]["urun"]);
            
            modalBdy = modalBdy + '<div class="col-md-3 col-sm-3 col-xs-3">'+urunArry[urnIsi]["kod"]+'</div><div class="col-md-3 col-sm-3 col-xs-3">'+urunArry[urnIsi]["urunadi"]+'</div>'+
            '<div class="col-md-2 col-sm-2 col-xs-2">'+ftrLineArry[i]["adet"]+'</div><div class="col-md-2 col-sm-2 col-xs-2">'+ftrLineArry[i]["fiyat"]+'</div>'+
            '<div class="col-md-2 col-sm-2 col-xs-2">'+ftrLineArry[i]["tplm"]+' <i data-id="'+ftrLineArry[i]["id"]+'" data-ftr="'+ftrId+'" class="fa fa-times-circle delInvLine" style="color:red; cursor:pointer; float:right"></i></div>'+
            '<div class="clearfix"></div>';
        }
        

        modalBdy = modalBdy + '</div>' +
          '<div class="form-group" style="padding-bottom: 10px">'+
          '<div class="col-md-2 col-sm-2 col-xs-2" style="margin-bottom:5px;">Ürün</div><div class="col-md-10 col-sm-10 col-xs-10" style="margin-bottom:5px;">'+select+'<input id="urnId" type="hidden" value="0"></div>' +
          '<div class="col-md-2 col-sm-2 col-xs-2">Fiyat</div><div class="col-md-3 col-sm-3 col-xs-3"><input type="number" id="fyt"></div>' +
          '<div class="col-md-2 col-sm-2 col-xs-2 text-right">Adet</div><div class="col-md-3 col-sm-3 col-xs-3"><input type="number" id="adet"></div>' +
          '<div class="col-md-12 col-sm-12 col-xs-12 text-center"><button type="button" data-id="'+ftrId+'" class="btn btn-primary btn-xs addLine" style="margin-top: 6px;">Ekle</button></div>'+
                      '</div>';
                      
                    
                    var modalNameText = 'Fatura Detayı';
                    var btnArry = ["","Kapat","",""];
                    var btnColorArry = ["btn-primary addSplier","btn-secondary","btn-secondary",""];
                    var btnCancel = "modalbttn2";
                    modalPlacement(btnArry,btnColorArry,btnCancel,modalNameText,modalBdy);
      }


      $(document).ready(function() {
        getList();
        $("#newModal").on("click", ".addLine", function(){  
          var fatura = $(this).attr("data-id");
          var urun = $("#urnId").val(); 
          var adet = $("#adet").val(); 
          var fiyat = $("#fyt").val(); 
           
          postData.push({name: "fiyat", value: fiyat});
          postData.push({name: "adet", value: adet});
          postData.push({name: "fatura", value: fatura});
          postData.push({name: "urun", value: urun});
          postData.push({name: "type", value: "Add"});
          SendPostJson(postData,postUrl,addNewLineOk,addNewSplierErr);

         }); 
         $("#newModal").on("click", ".delInvLine", function(){   
             var id = $(this).attr("data-id"); 
             var ftr = $(this).attr("data-ftr"); 
             postData.push({name: "id", value: id});
             postData.push({name: "fatura", value: ftr});
            postData.push({name: "type", value: "Del"});
            SendPostJson(postData,postUrl,addNewLineOk,addNewSplierErr);
         });

         $("#datatable-responsive").on("click", ".ftrDty", function(){  
            var id = $(this).attr("data-id"); 
            postData.push({name: "id", value: id});
            postData.push({name: "type", value: "InvLineList"});
            SendPostJson(postData,postUrl,invoiceDetail,addNewSplierErr);
          });

          

          $("#newModal .modal-footer").on("click", ".addSplier", function(){  
          var no = $("#no").val();
          var tedarikci = $("#tdrkci").val();
          var tarih = $("#tarih").val();
                   
          postData.push({name: "no", value: no});
          postData.push({name: "tedarikci", value: tedarikci});
          postData.push({name: "tarih", value: tarih});
          postData.push({name: "type", value: "New"});
          SendPostJson(postData,postUrl,addNewSplierSccs,addNewSplierErr);

         }); 

         $("#newModal").on("change", "#urnEkleScm", function(){  
             var val = $(this,':selected').val(); 
             $("#urnId").val(val);
          }); 

         $("#newModal").on("change", "#tdrkScm", function(){  
             var val = $(this,':selected').val(); 
             $("#tdrkci").val(val);
          }); 
        $(".addNew").on("click",  function(){ 
            var tarihOrn = '<?php echo date("Y-m-d"); ?>'; 
            var select = '<select id="tdrkScm" class="form-select" aria-label="Default select example" style="height: 28px;margin-top: -5px;">'+
                            '<option value="0" selected>Seçiniz</option>';
                            for(var i = 0; i < veriArryTdrk.length; i++) 
                            {  
                               
                                select = select + '<option value="'+veriArryTdrk[i]["id"]+'" >'+veriArryTdrk[i]["adi"]+'</option>';
                                
                            }
                            select = select +'</select>';
          var modalBdy = '<div id="errPlace" style="width:100%; color:#e74a3b; text-align:center; margin-bottom:20px;"></div>'+
          '<div class="form-group" style="padding-bottom: 10px">'+
                        ' <label class="control-label col-md-3 col-sm-3 col-xs-12" for="adi">Fatura Tarihi <span class="required">*</span>' +
                        '</label>' +
                        '<div class="col-md-6 col-sm-6 col-xs-12">' +
                          '<input type="date" id="tarih" required="required" class="form-control col-md-7 col-xs-12" style="margin-top:-12px;" value="'+tarihOrn+'">' +
                       ' </div><div class="clearfix"></div>' +

                       ' <label class="control-label col-md-3 col-sm-3 col-xs-12" for="adi" style="margin-top: 10px;">Fatura No <span class="required">*</span>' +
                        '</label>' +
                        '<div class="col-md-6 col-sm-6 col-xs-12">' +
                          '<input type="text" id="no" required="required" class="form-control col-md-7 col-xs-12" style="margin-top:12px;">' +
                       ' </div><div class="clearfix"></div>' +
                       ' <label class="control-label col-md-3 col-sm-3 col-xs-12" for="yetkili" style="margin-top: 10px;">Tedarikçi Adı' +
                        '</label>' +
                        '<div class="col-md-6 col-sm-6 col-xs-12" style="margin-top: 12px;">' + select +
                        '<input id="tdrkci" type="hidden" value="0">'+
                       ' </div>' +
                      '</div>';
                      
                    
                    var modalNameText = 'Yeni Fatura Ekleme';
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