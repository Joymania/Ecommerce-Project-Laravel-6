<footer class="main-footer">
    <strong>Copyright &copy; Joymania.</strong>

    <div class="float-right d-none d-sm-inline-block">
      <b>Designed & Developed by</b> JOy
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('Backend') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Sparkline -->
<script src="{{ asset('Backend') }}/select2/js/select2.full.min.js"></script>

<script src="{{ asset('Backend') }}/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="{{ asset('Backend') }}/plugins/sparklines/sparkline.js"></script>

<script src="{{ asset('Backend') }}/plugins/jqvmap/jquery.vmap.min.js"></script>

<script src="{{ asset('Backend') }}/plugins/jquery-knob/jquery.knob.min.js"></script>

<script src="{{ asset('Backend') }}/plugins/moment/moment.min.js"></script>

<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('Backend') }}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="{{ asset('Backend') }}/plugins/summernote/summernote-bs4.min.js"></script>

<!-- AdminLTE App -->
<script src="{{ asset('Backend') }}/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('Backend') }}/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('Backend') }}/dist/js/pages/dashboard.js"></script>

<script src="{{ asset('Backend') }}/plugins/jqvmap/jquery.vmap.min.js"></script>


<script src="{{ asset('Backend') }}/plugins/daterangepicker/daterangepicker.js"></script>


<script src="{{ asset('Backend') }}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="{{ asset('Backend') }}/dist/js/adminlte.js"></script>
<script src="{{ asset('Backend') }}/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="{{ asset('Backend') }}/plugins/jquery-validation/additional-methods.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="{{ asset('Backend') }}/dist/js/pages/dashboard.js"></script>



<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>

<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true,
        "autoWidth": false,
      });
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>
  <script type="text/javascript">
    $(function(){
        $(document).on('click','#delete',function(e){
            e.preventDefault();
            var link=$(this).attr("href");
            Swal.fire({
            title: 'Are you sure?',
            text: "Delete it!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if(result.value){
                    window.location.href=link;
                }
            if (result.isConfirmed) {
                Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
                )
            }
})
        })
    });
  </script>
  <script type="text/javascript">
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader=new FileReader();
            reader.onload=function(e){
                $('#showImage').attr('src',e.target.result);
            };
            reader.readAsDataURL(e.target.files['0']);
        });
    });
  </script>
  <script>
      $(function(){
        //Initialize Select2 Elements
    $('.select2').select2();
      });
  </script>
</body>
</html>
