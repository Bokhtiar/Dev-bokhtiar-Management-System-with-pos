<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="{{ url('/') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->


        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#member-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-journal-text"></i><span>Members</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="member-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                @isset(auth()->user()->role->permission['permission']['user']['list'])
                <li>
                    <a href="@route('user.index')">
                        <i class="bi bi-circle"></i><span>List of members</span>
                    </a>
                </li>
                @endisset

                @isset(auth()->user()->role->permission['permission']['user']['add'])
                <li>
                    <a href="@route('user.create')">
                        <i class="bi bi-circle"></i><span>Create of member</span>
                    </a>
                </li>
                @endisset
            </ul>
        </li><!-- End user Nav -->

        <!--start bed manager -->
         @isset(auth()->user()->role->permission['permission']['category']['list'])
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#Bed-manager-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>Bed Manager</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="Bed-manager-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
              
                @isset(auth()->user()->role->permission['permission']['category']['list'])
                <li>
                    <a href="@route('category.index')">
                        <i class="bi bi-circle"></i><span>Category</span>
                    </a>
                </li>
                @endisset

                @isset(auth()->user()->role->permission['permission']['room']['list'])
                <li>
                    <a href="@route('room.index')">
                        <i class="bi bi-circle"></i><span>Room</span>
                    </a>
                </li>
                @endisset

                @isset(auth()->user()->role->permission['permission']['bed']['list'])
                <li>
                    <a href="@route('bed.index')">
                        <i class="bi bi-circle"></i><span>Bed</span>
                    </a>
                </li>
                @endisset

                @isset(auth()->user()->role->permission['permission']['bedAssign']['list'])
                <li>
                    <a href="@route('bed-assign.index')">
                        <i class="bi bi-circle"></i><span>Bed Assign</span>
                    </a>
                </li>
                @endisset

                @isset(auth()->user()->role->permission['permission']['bedAssign']['add'])
                <li>
                    <a href="@route('bed-assign.create')">
                        <i class="bi bi-circle"></i><span>Bed Assign Create</span>
                    </a>
                </li>
                @endisset

            </ul>
        </li>
        @endisset
        <!-- End Bed-manager Nav -->


        <!--food meal system -->
          @isset(auth()->user()->role->permission['permission']['pos']['list'])
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#food-meal-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-layout-text-window-reverse"></i><span>Food Meal</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="food-meal-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    @isset(auth()->user()->role->permission['permission']['foodCategory']['list'])
                    <li>
                        <a href="@route('food-category.index')">
                            <i class="bi bi-circle"></i><span>Food Category</span>
                        </a>
                    </li>
                    @endisset
                    @isset(auth()->user()->role->permission['permission']['foodSubCategory']['list'])
                    <li>
                        <a href="@route('food-sub-category.index')">
                            <i class="bi bi-circle"></i><span>Food Sub Category</span>
                        </a>
                    </li>
                    @endisset
                    @isset(auth()->user()->role->permission['permission']['product']['list'])
                    <li>
                        <a href="@route('product.index')">
                            <i class="bi bi-circle"></i><span>Product</span>
                        </a>
                    </li>
                    @endisset
                    @isset(auth()->user()->role->permission['permission']['product']['add'])
                    <li>
                        <a href="@route('product.create')">
                            <i class="bi bi-circle"></i><span>Product Create</span>
                        </a>
                    </li>
                    @endisset
                    @isset(auth()->user()->role->permission['permission']['pos']['list'])
                    <li>
                        <a href="@route('pos.create')">
                            <i class="bi bi-circle"></i><span>POS</span>
                        </a>
                    </li>
                    @endisset
                    @isset(auth()->user()->role->permission['permission']['order']['list'])
                    <li>
                        <a href="@route('order.index')">
                            <i class="bi bi-circle"></i><span>Order</span>
                        </a>
                    </li>
                    @endisset
                </ul>
            </li>
          @endisset
        <!-- End food-meal Nav -->

        @isset(auth()->user()->role->permission['permission']['bill']['list'])
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#bill-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-journal-text"></i><span>Bill</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="bill-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                @isset(auth()->user()->role->permission['permission']['bill']['list'])
                <li>
                    <a href="@route('bill.index')">
                        <i class="bi bi-circle"></i><span>List of Bill</span>
                    </a>
                </li>
                @endisset
            </ul>
        </li><!-- End user Nav -->
        @endisset

        @isset(auth()->user()->role->permission['permission']['alert']['list'])
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#alert-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-journal-text"></i><span>alert</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="alert-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                @isset(auth()->user()->role->permission['permission']['alert']['list'])
                <li>
                    <a href="@route('alert.index')">
                        <i class="bi bi-circle"></i><span>List of alert</span>
                    </a>
                </li>
                @endisset
            
            </ul>
        </li><!-- End user Nav -->
        @endisset

        @isset(auth()->user()->role->permission['permission']['visitor']['list'])
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#visitor-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-journal-text"></i><span>Visitor</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="visitor-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                @isset(auth()->user()->role->permission['permission']['visitor']['list'])
                <li>
                    <a href="@route('visitor.index')">
                        <i class="bi bi-circle"></i><span>List of visitor</span>
                    </a>
                </li>
                @endisset
                @isset(auth()->user()->role->permission['permission']['visitor']['list'])
                <li>
                    <a href="@route('visitor.create')">
                        <i class="bi bi-circle"></i><span>List of visitor</span>
                    </a>
                </li>
                @endisset
            </ul>
        </li><!-- End user Nav -->
        @endisset
        
       @isset(auth()->user()->role->permission['permission']['permission']['list'])
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#setting-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-journal-text"></i><span>Settings</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="setting-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                @isset(auth()->user()->role->permission['permission']['role']['list'])
                <li>
                    <a href="@route('role.index')">
                        <i class="bi bi-circle"></i><span>List of Role</span>
                    </a>
                </li>
                @endisset

                @isset(auth()->user()->role->permission['permission']['permission']['list'])
                <li>
                    <a href="@route('permission.index')">
                        <i class="bi bi-circle"></i><span>List of permission</span>
                    </a>
                </li>
                @endisset
                @isset(auth()->user()->role->permission['permission']['permission']['add'])
                <li>
                    <a href="@route('permission.create')">
                        <i class="bi bi-circle"></i><span>Permission Create</span>
                    </a>
                </li>
                @endisset
            </ul>
        </li><!-- End user Nav -->
        @endisset


        <li class="nav-item">
            <a class="nav-link " href="@route('logouts')">
                <i class="bi bi-grid"></i>
                <span>Logout</span>
            </a>
        </li><!-- End Dashboard Nav -->
        
    </ul>
</aside>
