<?php
/**
 * Created by PhpStorm.
 * User: DNOJ
 * Date: 3/29/2016
 * Time: 9:41 PM
 */ ?>

<!-- jQuery -->
<script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- djQueryUI -->
<script src="plugins/jQueryUI/jquery-ui.min.js"></script>
<!-- bootstrap -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- moment -->
<script src="plugins/moment/moment.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<script src="dist/js/pages/dashboard.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>

<script>
    $(function () {

        //Date range picker
        $('#reservation').daterangepicker({format: 'YYYY/MM/DD'});


        //Date picker
        $('#datepicker').datepicker({
            autoclose: true
        });

        $("#memberTable").DataTable();


    });
</script>


