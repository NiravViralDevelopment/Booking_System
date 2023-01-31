<!DOCTYPE html>
<html lang="en">

    @include('front.layouts.head')

    <body>  

        @include('front.layouts.header')

        @include('front.layouts.sidebarr')

        @yield('content')

        <!-- Button trigger modal -->


  
  
  
    <!-- Vendor JS Files -->
    <script src="{{ asset('front/assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('front/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('front/assets/vendor/chart.js/chart.min.js') }}"></script>
    <script src="{{ asset('front/assets/vendor/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset('front/assets/vendor/quill/quill.min.js') }}"></script>
    <script src="{{ asset('front/assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{ asset('front/assets/vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('front/assets/vendor/php-email-form/validate.js') }}"></script>
  
    <!-- Template Main JS File -->
    <script src="{{ asset('front/assets/js/main.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>

    <script src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.print.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/js/toastr.js"></script>
    

    <script>
      
      $(document ).ready(function() {

        @if(Session::has('success'))
          toastr.options =
          {
            "closeButton" : true,
            "progressBar" : true
          }
            toastr.success("{{ session('success') }}");
        @endif

        @if(Session::has('error'))
            toastr.options =
            {
              "closeButton" : true,
              "progressBar" : true
            }
            toastr.error("{{ session('error') }}");
        @endif


        var oTable =$('#front_example').DataTable({
          "dom": 'rtip',
          "buttons": ['excel'],

          

          language: {
                
                paginate: {
                    // previous: "<",
                    // next: ">",
                    // sNext: '<i class="fa fa-forward"></i>',
                    // sPrevious: '<i class="fa fa-backward"></i>',
                    // sFirst: '<i class="fa fa-step-backward"></i>',
                    // sLast: '<i class="fa fa-step-forward"></i>'
                }
            },
            
        });
        
        
        // $(".form-select").select2({
        //     allowClear: true
        // });


        $('#myInputTextFieldFront').keyup(function(){
          oTable.search( $(this).val() ).draw();
        })
        $("#statusFilter").change(function (e){
          // alert($(this).val());
          oTable.search( $(this).val() ).draw();
          // oTable.columns( 8 ).search( $(this).val() ).draw();
        });

        $("#statusFilter_first").change(function (e){
          oTable.columns( 8 ).search( $(this).val() ).draw();
        });

        


        $("#FacilityFilter").change(function (e) {
          oTable.columns( 0 ).search( $(this).val() ).draw();
        });

        

        $("#statusTower").change(function (e) {
          oTable.columns( 1 ).search( $(this).val() ).draw();
        });

        $("#statusFloor").change(function (e) {
          oTable.columns( 2 ).search( $(this).val() ).draw();
        });
        $("#statusUnit").change(function (e) {
          oTable.columns( 3 ).search( $(this).val() ).draw();
        });
        
        $("#ExportReporttoExcel").on("click", function() {
          oTable.button( '.buttons-excel' ).trigger();
        });

        //recordes fillter
        $("#recored_statusTower").change(function (e) {
          oTable.columns( 3 ).search( $(this).val() ).draw();
        });

        $("#recored_statusFloor").change(function (e) {
          oTable.columns( 4 ).search( $(this).val() ).draw();
        });
        $("#recored_statusUnit").change(function (e) {
          oTable.columns( 5 ).search( $(this).val() ).draw();
        });
        $("#record_date").change(function (e) {
          oTable.columns( 1 ).search( $(this).val() ).draw();
        });

        


        //tack_attendance_detailsfacility_id_data

        // var conceptName = $('#tack_attendance_detailsfacility_id_data').find(":selected").val();
        $("#tack_attendance_detailsfacility_id_data").change(function (e) {
          oTable.columns( 0 ).search( $(this).val() ).draw();
        });

        $("#date_in").change(function (e) {
          oTable.columns( 7 ).search( $('#date_in').val()).draw();
        });
        //edit time directlly serch
        oTable.columns( 0 ).search( $('#tack_attendance_detailsfacility_id_data').find(":selected").val() ).draw();
        oTable.columns( 7 ).search( $('#date_in').val() ).draw();
      
        var url = "{{ route('LangChange') }}";
        $(".Langchange").change(function(){
            window.location.href = url + "?lang="+ $(this).val();
        });
        
        $(".record_date").change(function() {
          var Date = $('#record_date').val();
          var FacilityFilter  = $('#FacilityFilter').val();
          $.ajax({
            type: 'get',
            url: '{{ url("get_record_date_session") }}',
            data: {Date:Date,FacilityFilter:FacilityFilter},
            success: function(arraytimeSlot) {
              
              $('#select_session').html('');
              $('#select_session').append('<option value="null">please select</option>');
              $.each(arraytimeSlot, function(key, value) {
                
                $("#select_session").append('<option value="' + value
                  .id + '">' + value + '</option>');
              });
            }
          });
        });

    });  
</script>
  </body>
  
  </html>

  