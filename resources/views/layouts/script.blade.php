<?php
/**
 * Created by PhpStorm.
 * User: DNOJ
 * Date: 3/29/2016
 * Time: 9:41 PM
 */ ?>

<!-- jQuery -->
<script src="/packages/jQuery/jQuery-2.1.4.min.js"></script>
<!-- djQueryUI -->
<script src="/packages/jQueryUI/jquery-ui.min.js"></script>
<!-- bootstrap -->
<script src="/packages/bootstrap/js/bootstrap.min.js"></script>
<!-- moment -->
<script src="/packages/moment/moment.min.js"></script>

<!-- daterangepicker -->
<script src="/packages/daterangepicker/daterangepicker.js"></script>

<!-- datepicker -->
<script src="/packages/datepicker/bootstrap-datepicker.js"></script>

<!-- Bootstrap WYSIHTML5 -->
<script src="/packages/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>

<!-- Slimscroll -->
<script src="/packages/slimScroll/jquery.slimscroll.min.js"></script>

<!-- FastClick -->
<script src="/packages/fastclick/fastclick.min.js"></script>

<!-- iCheck -->
<script src="/packages/iCheck/icheck.min.js"></script>

<!-- AdminLTE App -->
<script src="/packages/bootstrapLTE/dist/js/app.min.js"></script>
<script src="/packages/bootstrapLTE/dist/js/pages/dashboard.js"></script>

<!-- DataTables -->
<script src="/packages/datatables/jquery.dataTables.min.js"></script>
<script src="/packages/datatables/dataTables.bootstrap.min.js"></script>

<!--  Autocomplete -->
<script src="/packages/EasyAutocomplete-1.3.5/jquery.easy-autocomplete.min.js"></script>


<script>
    $(document).ready(function () {

        //Date range picker
        $('#reservation').daterangepicker({format: 'YYYY/MM/DD'});


        //Date picker
        $('#datepicker').datepicker({
            autoclose: true
        });

        $("#example1").DataTable();


    });
</script>


<!--  Autocomplete -->
<script>
    $(document).ready(function () {

        var options = {
            url: "/autocomplete/member",

            getValue: "email",
            placeholder: "Email",

            template: {
                type: "description",
                fields: {
                    description: "name"
                }
            },

            list: {
                match: {
                    enabled: true
                },onSelectItemEvent: function() {
                    var index = $("#autocomplete").getSelectedItemData().id;

                    $("#index").val(index).trigger("change");
                },
                maxNumberOfElements: 10,

                showAnimation: {
                    type: "slide",
                    time: 300
                },
                hideAnimation: {
                    type: "slide",
                    time: 300
                }
            }

        };

        $("#autocomplete").easyAutocomplete(options);


    });
</script>


