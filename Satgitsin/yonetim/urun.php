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
                <h3>Ürün <small>İşlemleri</small></h3>
              </div>

              
            </div>

            <div class="clearfix"></div>

            <div class="row">
              

              

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Ürünler <small>Listesi</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                    <button type="button" class="btn btn-success btn-xs addNew">+ Yeni</button>
                     
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>Ürün Kodu</th>
                          <th>Adi</th>
                          <th>Kategori</th>
                          <th>Üretici</th>
                          <th>Satış Fiyatı</th>
                          <th>Stok</th>
                          <th>Detay</th>
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
var veriArryKtgr = [];
var veriArryUrtci = [];
postUrl = "qrry/urun.php";

      function getList(){
        SendPostJson(postData,postUrl,addNewSplierSccs,addNewSplierErr);
      }

      function SetTable(){
        $('#datatable-responsive').DataTable().destroy();
        $('#datatable-responsive').find('tbody').html('');  
        
        for(var i = 0; i < veriArry.length; i++) 
                {  
                  var aktifBtn = '<button type="button" data-id="' + veriArry[i]["id"] + '" class="btn btn-danger btn-xs activeBtn">Pasif</button>';
                  if(veriArry[i]["durum"] == 1) {
                    aktifBtn = '<button type="button" data-id="' + veriArry[i]["id"] + '" class="btn btn-primary btn-xs activeBtn">Aktif</button>';
                  }
                  var ureticiIsi = veriArryUrtci.map(function(o) { return o.id; }).indexOf(veriArry[i]["uretici"]);
                  var ureticiAdi = veriArryUrtci[ureticiIsi]["adi"];
                  var kategoriIsi = veriArryKtgr.map(function(o) { return o.id; }).indexOf(veriArry[i]["kategori"]);
                  var ktgrBag = veriArryKtgr[kategoriIsi]["bag"];
                  var ktgrAdi = veriArryKtgr[kategoriIsi]["adi"];
                  if(veriArry[i]["altkategori"] != 0) 
                  { 
                      var ustKategoriIsi = veriArryKtgr.map(function(o) { return o.id; }).indexOf(veriArry[i]["altkategori"]);
                      ktgrAdi = veriArryKtgr[ustKategoriIsi]["adi"] + "/" + ktgrAdi;
                  }
                  var trLine = '<tr data-id="'+veriArry[i]["id"]+'">'+
                  '<td>' + veriArry[i]["kod"] + '</td>' +
                  '<td>' + veriArry[i]["urunadi"] + '</td>' +
                  '<td>' + ktgrAdi + '</td>' +
                  '<td>' + ureticiAdi + '</td>' +
                  '<td>' + veriArry[i]["satisfiyat"] + '</td>' +
                  '<td>' + veriArry[i]["stok"] + '</td>' +
                  '<td><button type="button" data-id="' + veriArry[i]["id"] + '" class="btn btn-success  btn-xs dtyBtn">Detay</button></td>'+
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
        veriArryKtgr = resp["respKtgr"]; 
        veriArryUrtci =resp["respUretici"]; 
        SetTable();
        $("#newModal").modal('hide');
      }


      $(document).ready(function() {
        getList();

        $("#datatable-responsive").on("click", ".dtyBtn", function(){
            var id = $(this).attr("data-id"); 
            var urunIsi = veriArry.map(function(o) { return o.id; }).indexOf(id);
            var KtgrIsi = veriArryKtgr.map(function(o) { return o.id; }).indexOf(veriArry[urunIsi]["kategori"]);
            var ktgrName = veriArryKtgr[KtgrIsi]["adi"];
            var ureticiIsi = veriArryUrtci.map(function(o) { return o.id; }).indexOf(veriArry[urunIsi]["uretici"]);
            var urtciName = veriArryUrtci[ureticiIsi]["adi"];
            if(veriArry[urunIsi]["altkategori"] != 0) { 
                var altKtgrIsi = veriArryKtgr.map(function(o) { return o.id; }).indexOf(veriArry[urunIsi]["altkategori"]);
                ktgrName = ktgrName + " / " + veriArryKtgr[altKtgrIsi]["adi"];
            }
            var image = "noImage.png";
            if(veriArry[urunIsi]["resim"] != "") {
                image = veriArry[urunIsi]["resim"];
            }
            var modalBdy = '<div class="col-md-12 col-sm-12 col-xs-12 text-center"><img src="../productImages/'+image+'" width="150"></div>'+
            '<div class="col-md-6 col-sm-6 col-xs-6 text-right"><b>Ürün Kodu :</b></div><div class="col-md-6 col-sm-6 col-xs-6">'+veriArry[urunIsi]["kod"]+'</div>'+
            '<div class="col-md-6 col-sm-6 col-xs-6 text-right"><b>Ürün Adı :</b></div><div class="col-md-6 col-sm-6 col-xs-6">'+veriArry[urunIsi]["urunadi"]+'</div>'+
            '<div class="col-md-6 col-sm-6 col-xs-6 text-right"><b>Ürün Üretici :</b></div><div class="col-md-6 col-sm-6 col-xs-6">'+urtciName+'</div>'+
            '<div class="col-md-6 col-sm-6 col-xs-6 text-right"><b>Ürün Kategorisi :</b></div><div class="col-md-6 col-sm-6 col-xs-6">'+ktgrName+'</div>'+
            '<div class="col-md-6 col-sm-6 col-xs-6 text-right"><b>Son Alış Fiyatı :</b></div><div class="col-md-6 col-sm-6 col-xs-6">'+veriArry[urunIsi]["alisfiyat"]+' TL</div>'+
            '<div class="col-md-6 col-sm-6 col-xs-6 text-right"><b>Satış Fiyatı :</b></div><div class="col-md-6 col-sm-6 col-xs-6">'+veriArry[urunIsi]["satisfiyat"]+' TL</div>'+
            '<div class="col-md-6 col-sm-6 col-xs-6 text-right"><b>Stok :</b></div><div class="col-md-6 col-sm-6 col-xs-6">'+veriArry[urunIsi]["stok"]+'</div>'+
            '<div class="col-md-6 col-sm-6 col-xs-6 text-right"><b>Detay :</b></div><div class="col-md-6 col-sm-6 col-xs-6">'+veriArry[urunIsi]["detay"]+'</div>'+
                      
                      '</div>';
                      
                    
                    var modalNameText = 'Ürün Detay';
                    var btnArry = ["","Kapat","",""];
                    var btnColorArry = ["btn-primary ","btn-secondary","btn-secondary",""];
                    var btnCancel = "modalbttn2";
                    modalPlacement(btnArry,btnColorArry,btnCancel,modalNameText,modalBdy);
        }); 


        $("#newModal .modal-footer").on("click", ".addSplier", function(){  
          var kod = $("#kod").val(); 
          var urunadi = $("#urunadi").val(); 
          var kategori = $("#ustktgr").val(); 
          var uretici = $("#ureticiId").val(); 
          
          postData.push({name: "kod", value: kod});
          postData.push({name: "urunadi", value: urunadi});
          postData.push({name: "kategori", value: kategori});
          postData.push({name: "uretici", value: uretici});
          postData.push({name: "type", value: "Add"});
          SendPostJson(postData,postUrl,addNewSplierSccs,addNewSplierErr);

         }); 

         $("#datatable-responsive").on("click", ".activeBtn", function(){  
            var id = $(this).attr("data-id"); 
            postData.push({name: "id", value: id});
            postData.push({name: "type", value: "UpdtStts"});
            SendPostJson(postData,postUrl,addNewSplierSccs,addNewSplierErr);
          });

          $("#newModal").on("change", "#myFile", function(){  
            var file = document.getElementById('myFile').files[0];
                var reader = new FileReader();
                reader.addEventListener('load', function() {
                    var res = reader.result; 
                     $('#imageText').val(res);
                });

                reader.readAsDataURL(file);

         });

          $("#datatable-responsive").on("click", ".updtBtn", function(){  
            var id = $(this).attr("data-id"); 
            var adi = $(this).closest('tr').find('td:eq(0)').html(); 
            var bag = $(this).closest('tr').find('td:eq(1)').attr("data-bag"); 
            var bagAdi = $(this).closest('tr').find('td:eq(1)').html();
            var urunIsi = veriArry.map(function(o) { return o.id; }).indexOf(id);
            var KtgrIsi = veriArryKtgr.map(function(o) { return o.id; }).indexOf(veriArry[urunIsi]["kategori"]);
            var ktgrName = veriArryKtgr[KtgrIsi]["adi"];
            var ureticiIsi = veriArryUrtci.map(function(o) { return o.id; }).indexOf(veriArry[urunIsi]["uretici"]);
            var urtciName = veriArryUrtci[ureticiIsi]["adi"];
            var selectUretici = '<select id="ureticiScm" class="form-select" aria-label="Default select example" style="height: 28px;margin-top: -5px;">';
            selectUretici = selectUretici + '<option value="'+veriArryUrtci[ureticiIsi]["id"]+'" >'+veriArryUrtci[ureticiIsi]["adi"]+'</option>';
                            for(var i = 0; i < veriArryUrtci.length; i++) 
                            {  
                               if(veriArryUrtci[i]["id"] != veriArryUrtci[ureticiIsi]["id"]) {
                                selectUretici = selectUretici + '<option value="'+veriArryUrtci[i]["id"]+'" >'+veriArryUrtci[i]["adi"]+'</option>';
                                
                            } }
                            selectUretici = selectUretici +'</select>';

                            var selectKtgr = '<select id="ktgrScm" class="form-select" aria-label="Default select example" style="height: 28px;margin-top: -5px;">';
            selectKtgr = selectKtgr + '<option value="'+veriArryKtgr[KtgrIsi]["id"]+'" >'+veriArryKtgr[KtgrIsi]["adi"]+'</option>';
                            for(var i = 0; i < veriArryKtgr.length; i++) 
                            {  
                                if(veriArryKtgr[i]["id"] != veriArryKtgr[KtgrIsi]["id"]) {
                                selectKtgr = selectKtgr + '<option value="'+veriArryKtgr[i]["id"]+'" >'+veriArryKtgr[i]["adi"]+'</option>';
                                
                            } }
                            selectKtgr = selectKtgr +'</select>';


                            var modalBdy = '<div id="errPlace" style="width:100%; color:#e74a3b; text-align:center; margin-bottom:20px;"></div>'+
                            '<div class="col-md-12 col-sm-12 col-xs-12 text-center"><input type="file" id="myFile" name="filename">'+
                            '<input id="imageText" type="hidden" value=""></div>'+
            '<div class="col-md-6 col-sm-6 col-xs-6 text-right"><b>Ürün Kodu :</b></div><div class="col-md-6 col-sm-6 col-xs-6"><input type="text" id="kod"  class="form-control col-md-7 col-xs-12" value="'+veriArry[urunIsi]["kod"]+'"></div>'+
            '<div class="col-md-6 col-sm-6 col-xs-6 text-right"><b>Ürün Adı :</b></div><div class="col-md-6 col-sm-6 col-xs-6"><input type="text" id="urunadi"  class="form-control col-md-7 col-xs-12" value="'+veriArry[urunIsi]["urunadi"]+'"></div>'+
            '<div class="col-md-6 col-sm-6 col-xs-6 text-right" style="margin-top: 8px;"><b>Ürün Üretici :</b></div><div class="col-md-6 col-sm-6 col-xs-6" style="margin-top: 8px;">'+selectUretici+'</div>'+
            '<input id="ureticiId" type="hidden" value="'+veriArryUrtci[ureticiIsi]["id"]+'">'+
            '<div class="col-md-6 col-sm-6 col-xs-6 text-right" style="margin-top: 8px;"><b>Ürün Kategorisi :</b></div><div class="col-md-6 col-sm-6 col-xs-6" style="margin-top: 8px;">'+selectKtgr+'</div>'+
            '<input id="ustktgr" type="hidden" value="'+veriArryKtgr[KtgrIsi]["id"]+'">'+
            '<input id="idsi" type="hidden" value="'+id+'">'+
            '<div class="col-md-6 col-sm-6 col-xs-6 text-right"><b>Satış Fiyatı :</b></div><div class="col-md-6 col-sm-6 col-xs-6"><input type="number" id="satisfiyat" class="form-control col-md-7 col-xs-12" value="'+veriArry[urunIsi]["satisfiyat"]+'"></div>'+
            '<div class="col-md-6 col-sm-6 col-xs-6 text-right"><b>Detay :</b></div><div class="col-md-6 col-sm-6 col-xs-6"><textarea id="detay" name="detay" rows="4" cols="50">'+
            veriArry[urunIsi]["detay"] + '</textarea> </div>'+
                      
                      '</div>';
                    
                    var modalNameText = 'Ürün Düzenleme';
                    var btnArry = ["Güncelle","İptal","",""];
                    var btnColorArry = ["btn-primary updtNow","btn-secondary","btn-secondary",""];
                    var btnCancel = "modalbttn2";
                    modalPlacement(btnArry,btnColorArry,btnCancel,modalNameText,modalBdy);
            
          });

          $("#newModal .modal-footer").on("click", ".updtNow", function(){  
          var kod = $("#kod").val();
          var urunadi = $("#urunadi").val();
          var resim = $("#imageText").val();
          var kategori = $("#ustktgr").val();
          var uretici = $("#ureticiId").val(); 
          var satisfiyat = $("#satisfiyat").val();
          var detay = $("#detay").val(); 
          var id = $("#idsi").val();
          
          postData.push({name: "kod", value: kod});
          postData.push({name: "urunadi", value: urunadi});
          postData.push({name: "resim", value: resim});
          postData.push({name: "kategori", value: kategori});
          postData.push({name: "uretici", value: uretici});
          postData.push({name: "satisfiyat", value: satisfiyat});
          postData.push({name: "detay", value: detay});
          postData.push({name: "id", value: id});
          postData.push({name: "type", value: "Update"});
          SendPostJson(postData,postUrl,addNewSplierSccs,addNewSplierErr);

         }); 


         $("#newModal").on("change", "#ktgrScm", function(){  
             var val = $(this,':selected').val(); 
             $("#ustktgr").val(val);
          }); 

          $("#newModal").on("change", "#ureticiScm", function(){  
             var val = $(this,':selected').val(); 
             $("#ureticiId").val(val);
          }); 

        $(".addNew").on("click",  function(){ 
            var selectKtgr = '<select id="ktgrScm" class="form-select" aria-label="Default select example" style="height: 28px;margin-top: -5px;">';
            selectKtgr = selectKtgr + '<option value="0" selected>Seçiniz</option>';
                            for(var i = 0; i < veriArryKtgr.length; i++) 
                            {  
                                selectKtgr = selectKtgr + '<option value="'+veriArryKtgr[i]["id"]+'" >'+veriArryKtgr[i]["adi"]+'</option>';
                                
                            }
                            selectKtgr = selectKtgr +'</select>';

            var selectUretici = '<select id="ureticiScm" class="form-select" aria-label="Default select example" style="height: 28px;margin-top: -5px;">';
            selectUretici = selectUretici + '<option value="0" selected>Seçiniz</option>';
                            for(var i = 0; i < veriArryUrtci.length; i++) 
                            {  
                                selectUretici = selectUretici + '<option value="'+veriArryUrtci[i]["id"]+'" >'+veriArryUrtci[i]["adi"]+'</option>';
                                
                            }
                            selectUretici = selectUretici +'</select>';
          var modalBdy = '<div id="errPlace" style="width:100%; color:#e74a3b; text-align:center; margin-bottom:20px;"></div>'+
          '<div class="form-group" style="padding-bottom: 10px">'+

          ' <label class="control-label col-md-3 col-sm-3 col-xs-12" for="adi">Ürün Kodu  <span class="required">*</span>' +
                        '</label>' +
                        '<div class="col-md-6 col-sm-6 col-xs-12">' +
                          '<input type="text" id="kod" required="required" class="form-control col-md-7 col-xs-12">' +
                       ' </div><div class="clearfix" style="margin-bottom:3px;"></div>' +

                       ' <label class="control-label col-md-3 col-sm-3 col-xs-12" for="urunadi">Ürün Adı <span class="required">*</span>' +
                        '</label>' +
                        '<div class="col-md-6 col-sm-6 col-xs-12">' +
                          '<input type="text" id="urunadi" required="required" class="form-control col-md-7 col-xs-12">' +
                       ' </div><div class="clearfix" style="margin-bottom:8px;"></div>' +

                       ' <label class="control-label col-md-3 col-sm-3 col-xs-12" for="adi">Kategori Adı <span class="required">*</span>' +
                        '</label>' +
                        '<div class="col-md-6 col-sm-6 col-xs-12">' +
                        selectKtgr  +
                        '<input id="ustktgr" type="hidden" value="0">'+
                       ' </div><div class="clearfix" style="margin-bottom:8px;"></div>' +

                       ' <label class="control-label col-md-3 col-sm-3 col-xs-12" for="adi">Ürün üreticisi <span class="required">*</span>' +
                        '</label>' +
                        '<div class="col-md-6 col-sm-6 col-xs-12">' +
                        selectUretici  +
                        '<input id="ureticiId" type="hidden" value="0">'+
                       ' </div><div class="clearfix" style="margin-bottom:8px;"></div>' +
                      
                      '</div>';
                      
                    
                    var modalNameText = 'Ürün Ekleme';
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