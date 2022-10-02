<script src="{{asset('public/BackEnd/vendors/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('public/BackEnd/vendors/popper.js/dist/umd/popper.min.js')}}"></script>
    <script src="{{asset('public/BackEnd/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('public/BackEnd/assets/js/main.js')}}"></script>


    <script src="{{asset('public/BackEnd/vendors/chart.js/dist/Chart.bundle.min.js')}}"></script>
    <script src="{{asset('public/BackEnd/assets/js/dashboard.js')}}"></script>
    <script src="{{asset('public/BackEnd/assets/js/widgets.js')}}"></script>
    <script src="{{asset('public/BackEnd/vendors/jqvmap/dist/jquery.vmap.min.js')}}"></script>
    <script src="{{asset('public/BackEnd/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js')}}"></script>
    <script src="{{asset('public/BackEnd/vendors/jqvmap/dist/maps/jquery.vmap.world.js')}}"></script>

    <script src="{{asset('public/BackEnd/vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('public/BackEnd/vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('public/BackEnd/vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('public/BackEnd/vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('public/BackEnd/vendors/jszip/dist/jszip.min.js')}}"></script>
    <script src="{{asset('public/BackEnd/vendors/pdfmake/build/pdfmake.min.js')}}"></script>
    <script src="{{asset('public/BackEnd/vendors/pdfmake/build/vfs_fonts.js')}}"></script>
    <script src="{{asset('public/BackEnd/vendors/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('public/BackEnd/vendors/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('public/BackEnd/vendors/datatables.net-buttons/js/buttons.colVis.min.js')}}"></script>
    <script src="{{asset('public/BackEnd/assets/js/init-scripts/data-table/datatables-init.js')}}"></script>
    <script src="{{asset('public/BackEnd/assets/js/toaster.js')}}"></script>
    <script src="{{asset('public/BackEnd/assets/js/handlebar.min.js')}}"></script>


    <script>
        (function($) {
            "use strict";

            jQuery('#vmap').vectorMap({
                map: 'world_en',
                backgroundColor: null,
                color: '#ffffff',
                hoverOpacity: 0.7,
                selectedColor: '#1de9b6',
                enableZoom: true,
                showTooltip: true,
                values: sample_data,
                scaleColors: ['#1de9b6', '#03a9f5'],
                normalizeFunction: 'polynomial'
            });
        })(jQuery);
    </script>

    <script type="text/javascript">
        $(function(){
            $(document).on('click', '#delete', function(e){
                e.preventDefault();
                var link = $(this).attr("href");
                Swal.fire({
                  title: 'Are you sure?',
                  text: "Delete this data!",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                  if (result.isConfirmed) {
                    window.location.href = link;
                    Swal.fire(
                      'Deleted!',
                      'Your file has been deleted.',
                      'success'
                    )
                  }
                })
            });
        });
    </script>

    <script type="text/javascript">
        $(function(){
            $(document).on('click', '#approve_btn', function(e){
                e.preventDefault();
                var link = $(this).attr("href");
                Swal.fire({
                  title: 'Are you sure?',
                  text: "Approve this data!",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Yes, approve it!'
                }).then((result) => {
                  if (result.isConfirmed) {
                    window.location.href = link;
                    Swal.fire(
                      'Deleted!',
                      'Your file has been Approved.',
                      'success'
                    )
                  }
                })
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function(){
            $('#image').change(function(e){
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#show_img').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>

  <!--   <script type="text/javascript">
    @if(Session::has('message'))
    var type = "{{ Session::get('alert-type','info') }}"
    switch(type){
        case 'info':
            toastr.info("{{ Session::get('message') }}");
            break;
        case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;
        case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;
        case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
    }
    @endif

</script> -->

</body>

</html>
