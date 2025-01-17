<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link href="{{ asset('assets-ruang-admin/img/logo/logo-edurisk.PNG') }}" rel="icon" />
    <title>
      @section('title')
      @show
    </title>
    @include('dist.css')
  </head>

  <body id="page-top">
    <div id="wrapper">

      <!-- Sidebar -->
      @section('menu')
      @show

      <!-- Sidebar -->
      <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
          <!-- TopBar -->
          @include('dist.header')
          <!-- Topbar -->

          <!-- Container Fluid-->
          <div class="container-fluid" id="container-wrapper">

            @section('content-header-info')
            @show

            <!-- Content Body -->

            @section('content')
            @show
            
            {{-- NOTIFICATION ? --}}
            <?php if (isset($crud_result)) {
				if ($crud_result == 1) { ?>
            <div class="alert alert-success alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              <h6><i class="fas fa-check"></i><b> Success!</b></h6>
              <?php echo $crud_message ?>
            </div>
            <?php } else if($crud_result == 0) { ?>
            <div class="alert alert-danger alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              <h6><i class="fas fa-ban"></i><b> Failed!</b></h6>
              <?php echo $crud_message ?>
            </div>
            <?php }} ?>

            <!-- End Content Body -->
          </div>
          <!---Container Fluid-->
        </div>

        @include('dist.footer')
        <!-- End Footer -->
      </div>
    </div>
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>
  </body>

  <script src="{{ asset('assets-ruang-admin/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('assets-ruang-admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets-ruang-admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
  <!-- Select2 -->
  <script src="{{ asset('assets-ruang-admin/vendor/select2/dist/js/select2.min.js') }}"></script>
  <!-- Datatables -->
  <script src="{{ asset('assets-ruang-admin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('assets-ruang-admin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('assets-ruang-admin/js/ruang-admin.min.js') }}"></script>
  <script src="{{ asset('assets-ruang-admin/vendor/export_datatables/dataTables.buttons.min.js') }}"></script>
  <script src="{{ asset('assets-ruang-admin/vendor/export_datatables/buttons.html5.min.js') }}"></script>
  <script src="{{ asset('assets-ruang-admin/vendor/export_datatables/buttons.print.min.js') }}"></script>
  <script src="{{ asset('assets-ruang-admin/vendor/export_datatables/jszip.min.js') }}"></script>
  <script src="{{ asset('assets-ruang-admin/vendor/export_datatables/pdfmake.min.js') }}"></script>
  <script src="{{ asset('assets-ruang-admin/vendor/export_datatables/vfs_fonts.js') }}"></script>
  <!-- ChartJS -->
  <script src="{{ asset('assets-ruang-admin/vendor/chart.js/Chart.min.js') }}"></script>

  <!-- Page level custom scripts -->
  <script>
    $(document).ready(function () {
      $("#dataTable").DataTable(); // ID From dataTable
      $("#dataTableHover").DataTable({
        fixedColumns: true,
        dom: "Bfrtip",
        buttons: ["copy", "csv", "excel", "pdf", "print"],
      }); // ID From dataTable with Hover

      // Select2 Single  with Placeholder
      $(".select2-single-placeholder").select2({
        placeholder: "-- Select One --",
        allowClear: true,
      });
    });
  </script>

  <script>
    $(document).ready(function () {
      $("#password_new").on("keyup", function () {
        var password_new = $("#password_new").val();
        var password_confirm = $("#password_confirm").val();
        if (password_new == password_confirm) {
          $("#password_notif").html("");
        } else {
          $("#password_notif").html("New password and password confirmation incorrect.");
        }
      });
      $("#password_confirm").on("keyup", function () {
        var password_new = $("#password_new").val();
        var password_confirm = $("#password_confirm").val();
        if (password_new == password_confirm) {
          $("#password_notif").html("");
        } else {
          $("#password_notif").html("New password and password confirmation incorrect.");
        }
      });
    });

    function hanyaAngka(evt) {
      var charCode = evt.which ? evt.which : event.keyCode;
      if (charCode > 31 && (charCode < 48 || (charCode > 57 && charCode != 8))) {
        return false;
      } else {
        return true;
      }
    }
    function hanyaHuruf(evt) {
      var charCode = evt.which ? evt.which : event.keyCode;
      if ((charCode > 95 && charCode < 123) || (charCode > 64 && charCode < 91) || charCode == 32 || charCode == 8) {
        return true;
      } else {
        return false;
      }
    }
  </script>
</html>
