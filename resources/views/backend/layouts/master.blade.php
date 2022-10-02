
@include('backend.layouts.css')

    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
       @include('backend.layouts.sidebar')
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            @include('backend.layouts.header')

        </header><!-- /header -->
        <!-- Header-->

        

        <div class="content mt-3">

           @yield('content')

         
        </div> 

        @if(session()->has('success'))
          <script type="text/javascript">
              $(function(){
                $.notify("{{ session()->get('success') }}", {globalPosition: 'top right', className: 'success'});
              });
          </script>
        @endif

        @if(session()->has('error'))
          <script type="text/javascript">
              $(function(){
                $.notify("{{ session()->get('error') }}", {globalPosition: 'top right', className: 'danger'});
              });
          </script>
        @endif




        <!-- .content -->
    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    @include('backend.layouts.js')