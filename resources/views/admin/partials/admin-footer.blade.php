  <footer class="main-footer f_footer admin_footer">
    <strong>Copyright &copy; {{ date('Y') }} All rights
    reserved.
  </footer>

  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->


<!-- jQuery 2.2.3 -->
<script src="{{ asset('public/admin/plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="{{ asset('public/admin/bootstrap/js/bootstrap.min.js') }}"></script>
<!-- Morris.js') }} charts -->
<script src="{{ asset('public/admin/js/raphael-min.js') }}"></script>
<!-- <script src="{{ asset('public/admin/plugins/morris/morris.min.js') }}"></script> -->
<!-- Sparkline -->
<script src="{{ asset('public/admin/plugins/sparkline/jquery.sparkline.min.js') }}"></script>
<!-- jvectormap -->
<script src="{{ asset('public/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ asset('public/admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('public/admin/plugins/knob/jquery.knob.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('public/admin/js/moment.min.js') }}"></script>
<script src="{{ asset('public/admin/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- datepicker -->
<script src="{{ asset('public/admin/plugins/datepicker/bootstrap-datepicker.js') }}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{ asset('public/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
<!-- Slimscroll -->
<script src="{{ asset('public/admin/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('public/admin/plugins/fastclick/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('public/admin/dist/js/app.min.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="{{ asset('public/admin/dist/js/pages/dashboard.js') }}"></script> -->

<!-- DataTables -->
<script src="{{ asset('public/admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('public/admin/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>

<!-- ckeditor JS -->
<script src="{{ asset('public/admin/js/ckeditor.js') }}"></script>

<!-- Toaster Alert Files -->
<script src="{{ asset('admin/js/toastr.min.js') }}"></script>

<!-- Custom JS -->
<script src="{{ asset('public/admin/js/custom.js') }}"></script>


<script>
//$('textarea.ckeditor').ckeditor();
</script>
<!-- AdminLTE for demo purposes -->
<!-- <script src="{{ asset('public/admin/dist/js/demo.js') }}"></script> -->

@yield('custom-script')

</body>
</html>
