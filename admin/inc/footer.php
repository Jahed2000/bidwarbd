<div style="clear: both;"></div>
</div>
<!-- /#wrap -->
<!--||||||||||||||||||||||||||||||||-->
<!--******FOOTER SECTION START******-->
<footer class="Footer bg-dark dker">
    <p>&copy; 2017 <a href="index.html" target="_blank" href="#" title="Bid War Bd">Bid War Bd</a>, All Rights Reserved.
    </p>
</footer>
<!--******FOOTER SECTION START END******-->


<!--***********REQUIRED JS SCRIPT START**************-->
<!--jQuery -->
<script src="assets/js/jquery.js"></script>
<!--Bootstrap -->
<script src="assets/js/moment.js"></script>
<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
<!--Bootstrap dataTable Script-->
<!--Bootstrap DateTimePicker SCRIPT-->
<script type="text/javascript" src="assets/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript">
//    $(function () {
//        $('#datetimepicker6').datetimepicker();
//        $('#datetimepicker7').datetimepicker({
//            useCurrent: false //Important! See issue #1075
//        });
//        $("#datetimepicker6").on("dp.change", function (e) {
//            $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
//        });
//        $("#datetimepicker7").on("dp.change", function (e) {
//            $('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
//        });
//    });
</script>


<script type="text/javascript">
                    $(function () {
                        $('.date1').datetimepicker();
                        $('.date2').datetimepicker({
                            useCurrent: false //Important! See issue #1075
                        });
                        $(".date1").on("dp.change", function (e) {
                            $('.date2').data("DateTimePicker").minDate(e.date);
                        });
                        $(".date2").on("dp.change", function (e) {
                            $('.date1').data("DateTimePicker").maxDate(e.date);
                        });
                    });
</script>
<!--Bootstrap DataTable SCRIPT-->
<script type="text/javascript" src="assets/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="assets/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/dataTables.responsive.min.js"></script>
<script type="text/javascript" src="assets/js/responsive.bootstrap.min.js"></script>

<script>
    $(document).ready(function () {
        $('#example').DataTable();

        $("#example #checkall").click(function () {
            if ($("#example #checkall").is(':checked')) {
                $("#example input[type=checkbox]").each(function () {
                    $(this).prop("checked", true);
                });

            } else {
                $("#example input[type=checkbox]").each(function () {
                    $(this).prop("checked", false);
                });
            }
        });

        $("[data-toggle=tooltip]").tooltip();
    });
</script>


<!--metisMenu Js -->
<script src="assets/js/metisMenu.js" type="text/javascript"></script>
<script src="assets/js/core.js" type="text/javascript"></script>
<script>
    $(function () {
        Metis.dashboard();
    });
</script>


<!--***********REQUIRED JS SCRIPT END**************-->
</body>

</html>
