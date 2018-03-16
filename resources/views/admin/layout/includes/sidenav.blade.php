{{-- Side Navigation --}}
<div class="col-md-2">
    <div class="sidebar content-box" style="display: block;">
        <ul class="nav">
            <!-- Main menu -->
            <li class="current"><a href="{{route('admin.index')}}">
                    Dashboard</a></li> 

            <li class="submenu"> <!--- this parent li -->
                <a href="#"> 
                     Products
                    <span class="caret pull-right"></span>
                </a>
                <!-- Sub menu -->
                <ul> 
                    <li><a href="{{route('product.index')}}">Products</a></li> <!--- ProductsController  -->
                    <li><a href="{{route('product.create')}}">Add Product</a></li> <!--- ProductsController  -->
                </ul>
            </li>
            <li class="submenu"> <!--- this parent li -->
                <a href="#">
                    Category
                    <span class="caret pull-right"></span>
                </a>
                <!-- Sub menu -->
                <ul>
                    <li><a href="{{route('category.index')}}">Create Category</a></li>
                </ul>
            </li>
            <li class="submenu"> <!--- this parent li -->
                <a href="#">
                    Orders
                    <span class="caret pull-right"></span>
                </a>
                <!-- Sub menu -->
                <ul>
                    <li><a href="{{url('admin/orders/pending')}}">Pending Orders</a></li>
                    <li><a href="{{url('admin/orders/delivered')}}">Delivered Orders</a></li>
                    <li><a href="{{url('admin/orders')}}">All Orders</a></li>
                </ul>
            </li>
        </ul> <!-- ul.nav -->
    </div>
</div> <!-- ADMIN SIDE NAV-->