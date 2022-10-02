 <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="{{ route('home') }}">POS</a>
                <a class="navbar-brand hidden" href="./"><img src="{{asset('public/BackEnd/images/logo2.png')}}" alt="Logo"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="#"> <img style="height: 50px;width: 50px;border-radius: 50%;margin-right: 15px;" src="{{ asset('public/BackEnd/uploads/users_images/'.Auth::user()->image) }}"> {{ Auth::user()->name }} </a>
                    </li>
                    <h3 class="menu-title">UI elements</h3><!-- /.menu-title -->

                    <li class="active" style="border-bottom: 1px solid #4e4e52">
                        <a href="{{ route('home') }}" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dashboard</a>
                    </li>

                    @if(Auth::user()->user_type == 'Admin')
                    <li class="menu-item-has-children dropdown" style="border-bottom: 1px solid #4e4e52">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Manage User</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><a href="{{ route('users.view') }}">View User</a></li>
                            
                        </ul>
                    </li>
                    @endif

                    <li class="active menu-item-has-children dropdown" style="border-bottom: 1px solid #4e4e52">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Manage Profile</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li class="active"><a href="{{ route('profile.view') }}">View Profile</a></li>
                            <li><a href="{{ route('password.view') }}">Change Password</a></li>
                        </ul>
                    </li>

                    <li class="menu-item-has-children dropdown" style="border-bottom: 1px solid #4e4e52">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Manage Suppliers</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><a href="{{ route('suppliers.view') }}">View Suppliers</a></li>
                            
                        </ul>
                    </li>

                    <li class="menu-item-has-children dropdown" style="border-bottom: 1px solid #4e4e52">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Manage Customer</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><a href="{{ route('customer.view') }}">View Customer</a></li>
                            
                        </ul>
                    </li>

                    <li class="menu-item-has-children dropdown" style="border-bottom: 1px solid #4e4e52">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Manage Units</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><a href="{{ route('units.view') }}">View Units</a></li>
                            
                        </ul>
                    </li>

                    <li class="menu-item-has-children dropdown" style="border-bottom: 1px solid #4e4e52">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Manage Category</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><a href="{{ route('category.view') }}">View Category</a></li>
                            
                        </ul>
                    </li>

                    <li class="menu-item-has-children dropdown" style="border-bottom: 1px solid #4e4e52">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Manage Product</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><a href="{{ route('product.view') }}">View Product</a></li>
                            
                        </ul>
                    </li>

                    <li class="menu-item-has-children dropdown" style="border-bottom: 1px solid #4e4e52">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Manage Purchase</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><a href="{{ route('purchase.view') }}">View Purchase</a></li>
                             <li><a href="{{ route('purchase.pending') }}">Approval Purchase</a></li>
                        </ul>
                    </li>

                    <li class="menu-item-has-children dropdown" style="border-bottom: 1px solid #4e4e52">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Manage Invoice</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><a href="{{ route('invoice.view') }}">View Invoice</a></li>
                            <li><a href="{{ route('invoice.pending') }}">Approve Invoice</a></li>
                        </ul>
                    </li>


                 </ul>
            </div><!-- /.navbar-collapse -->
        </nav>