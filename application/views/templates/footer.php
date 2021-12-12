        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Template by Blangkon</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
        
        </div>
    </div>
    <!-- jQuery -->
    <script src="<?= base_url('assets/backend/vendors/jquery/dist/jquery.min.js')?>"></script>
    <!-- Bootstrap -->
    <script src="<?= base_url('assets/backend/vendors/bootstrap/dist/js/bootstrap.min.js')?>"></script>
    <!-- FastClick -->
    <script src="<?= base_url('assets/backend/vendors/fastclick/lib/fastclick.js')?>"></script>
    <!-- NProgress -->
    <script src="<?= base_url('assets/backend/vendors/nprogress/nprogress.js')?>"></script>
    <!-- Chart.js -->
    <script src="<?= base_url('assets/backend/vendors/Chart.js/dist/Chart.min.js')?>"></script>
    <!-- gauge.js -->
    <script src="<?= base_url('assets/backend/vendors/gauge.js/dist/gauge.min.js')?>"></script>
    <!-- bootstrap-progressbar -->
    <script src="<?= base_url('assets/backend/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js')?>"></script>
    <!-- iCheck -->
    <script src="<?= base_url('assets/backend/vendors/iCheck/icheck.min.js')?>"></script>
    <!-- Skycons -->
    <script src="<?= base_url('assets/backend/vendors/skycons/skycons.js')?>"></script>
    <!-- Flot -->
    <script src="<?= base_url('assets/backend/vendors/Flot/jquery.flot.js')?>"></script>
    <script src="<?= base_url('assets/backend/vendors/Flot/jquery.flot.pie.js')?>"></script>
    <script src="<?= base_url('assets/backend/vendors/Flot/jquery.flot.time.js')?>"></script>
    <script src="<?= base_url('assets/backend/vendors/Flot/jquery.flot.stack.js')?>"></script>
    <script src="<?= base_url('assets/backend/vendors/Flot/jquery.flot.resize.js')?>"></script>
    <!-- Flot plugins -->
    <script src="<?= base_url('assets/backend/vendors/flot.orderbars/js/jquery.flot.orderBars.js')?>"></script>
    <script src="<?= base_url('assets/backend/vendors/flot-spline/js/jquery.flot.spline.min.js')?>"></script>
    <script src="<?= base_url('assets/backend/vendors/flot.curvedlines/curvedLines.js')?>"></script>
    <!-- DateJS -->
    <script src="<?= base_url('assets/backend/vendors/DateJS/build/date.js')?>"></script>
    <!-- JQVMap -->
    <script src="<?= base_url('assets/backend/vendors/jqvmap/dist/jquery.vmap.js')?>"></script>
    <script src="<?= base_url('assets/backend/vendors/jqvmap/dist/maps/jquery.vmap.world.js')?>"></script>
    <script src="<?= base_url('assets/backend/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js')?>"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="<?= base_url('assets/backend/vendors/moment/min/moment.min.js')?>"></script>
    <script src="<?= base_url('assets/backend/vendors/bootstrap-daterangepicker/daterangepicker.js')?>"></script>

    <!-- bootstrap-wysiwyg -->
    <script src="<?= base_url('assets/backend/vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js')?>"></script>
    <script src="<?= base_url('assets/backend/vendors/jquery.hotkeys/jquery.hotkeys.js')?>"></script>
    <script src="<?= base_url('assets/backend/vendors/google-code-prettify/src/prettify.js')?>"></script>
    <!-- jQuery Tags Input -->
    <script src="<?= base_url('assets/backend/vendors/jquery.tagsinput/src/jquery.tagsinput.js')?>"></script>
    <!-- Switchery -->
    <script src="<?= base_url('assets/backend/vendors/switchery/dist/switchery.min.js')?>"></script>
    <!-- Select2 -->
    <script src="<?= base_url('assets/backend/vendors/select2/dist/js/select2.full.min.js')?>"></script>
        <script src="<?= base_url('assets/backend/vendors/bootstrap-daterangepicker/daterangepicker.js')?>"></script>
    <!-- bootstrap-datetimepicker -->    
    <script src="<?= base_url('assets/backend/vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js')?>"></script>
    <!-- Parsley -->
    <script src="<?= base_url('assets/backend/vendors/parsleyjs/dist/parsley.min.js')?>"></script>
    <!-- Autosize -->
    <script src="<?= base_url('assets/backend/vendors/autosize/dist/autosize.min.js')?>"></script>
    <!-- jQuery autocomplete -->
    <script src="<?= base_url('assets/backend/vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js')?>"></script>
    <!-- starrr -->
    <script src="<?= base_url('assets/backend/vendors/starrr/dist/starrr.js')?>"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>


    <!-- Custom Theme Scripts -->
    <script src="<?= base_url('assets/backend/build/js/custom.min.js')?>"></script>

    <script type="text/javascript" language="JavaScript">
        function konfirmasi()
        {
        tanya = confirm("Anda Yakin Akan Menghapus Data ?");
        if (tanya == true) return true;
        else return false;
        }
    </script>
    <!-- script untuk Surat Masuk -->
    <script>
    $('#myDatepicker').datetimepicker();
    
    $('#myDatepicker2').datetimepicker({
        format: 'DD.MM.YYYY'
    });
    
    $('#myDatepicker3').datetimepicker({
        format: 'hh:mm A'
    });
    
    $('#myDatepicker4').datetimepicker({
        ignoreReadonly: true,
        allowInputToggle: true
    });

    $('#datetimepicker6').datetimepicker();
    
    $('#datetimepicker7').datetimepicker({
        useCurrent: false
    });
    
    $("#datetimepicker6").on("dp.change", function(e) {
        $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
    });
    
    $("#datetimepicker7").on("dp.change", function(e) {
        $('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
    });

    $(document).ready(function() {
         
        $('#example').DataTable( {
            deferRender:    true,
            scrollY:        10,
            scrollCollapse: true,
            scroller:       true
        } );
    } );
    </script>
    <!-- tutup surat masuk -->
    <script language='javascript'>
        function validAngka(a)
        {
            if(!/^[0-9.]+$/.test(a.value))
            {
            a.value = a.value.substring(0,a.value.length-1000);
            }
        }
    </script>
  </body>
</html>