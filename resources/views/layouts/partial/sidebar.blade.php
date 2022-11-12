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
                <li>
                    <a href="@route('user.index')">
                        <i class="bi bi-circle"></i><span>List of members</span>
                    </a>
                </li>
                <li>
                    <a href="@route('user.create')">
                        <i class="bi bi-circle"></i><span>Create of member</span>
                    </a>
                </li>
            </ul>
        </li><!-- End user Nav -->


        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#Bed-manager-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>Bed Manager</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="Bed-manager-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="@route('category.index')">
                        <i class="bi bi-circle"></i><span>Category</span>
                    </a>
                </li>
                <li>
                    <a href="@route('room.index')">
                        <i class="bi bi-circle"></i><span>Room</span>
                    </a>
                </li>
                <li>
                    <a href="@route('bed.index')">
                        <i class="bi bi-circle"></i><span>Bed</span>
                    </a>
                </li>
                <li>
                    <a href="@route('bed-assign.index')">
                        <i class="bi bi-circle"></i><span>Bed Assign</span>
                    </a>
                </li>
                <li>
                    <a href="@route('bed-assign.create')">
                        <i class="bi bi-circle"></i><span>Bed Assign Create</span>
                    </a>
                </li>

            </ul>
        </li><!-- End Bed-manager Nav -->


        <!--food meal system -->
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#food-meal-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-layout-text-window-reverse"></i><span>Food Meal</span><i
                    class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="food-meal-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="@route('food-category.index')">
                        <i class="bi bi-circle"></i><span>Food Category</span>
                    </a>
                </li>
                <li>
                    <a href="@route('food-sub-category.index')">
                        <i class="bi bi-circle"></i><span>Food Sub Category</span>
                    </a>
                </li>
                <li>
                    <a href="@route('product.index')">
                        <i class="bi bi-circle"></i><span>Product</span>
                    </a>
                </li>
                <li>
                    <a href="@route('product.create')">
                        <i class="bi bi-circle"></i><span>Product Create</span>
                    </a>
                </li>
                <li>
                    <a href="@route('pos.create')">
                        <i class="bi bi-circle"></i><span>POS</span>
                    </a>
                </li>

                <li>
                    <a href="">
                        <i class="bi bi-circle"></i><span>Order</span>
                    </a>
                </li>
            </ul>
        </li><!-- End food-meal Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#bill-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-journal-text"></i><span>Bill</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="bill-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="@route('bill.index')">
                        <i class="bi bi-circle"></i><span>List of Bill</span>
                    </a>
                </li>
                <li>
                    <a href="@route('bill.create')">
                        <i class="bi bi-circle"></i><span>Create of Bill</span>
                    </a>
                </li>
            </ul>
        </li><!-- End user Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#alert-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-journal-text"></i><span>alert</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="alert-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="@route('alert.index')">
                        <i class="bi bi-circle"></i><span>List of alert</span>
                    </a>
                </li>
            </ul>
        </li><!-- End user Nav -->

        
       
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#setting-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-journal-text"></i><span>Settings</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="setting-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="@route('role.index')">
                        <i class="bi bi-circle"></i><span>List of Role</span>
                    </a>
                </li>

                <li>
                    <a href="@route('permission.index')">
                        <i class="bi bi-circle"></i><span>List of permission</span>
                    </a>
                </li>
                <li>
                    <a href="@route('permission.create')">
                        <i class="bi bi-circle"></i><span>Permission Create</span>
                    </a>
                </li>
            </ul>
        </li><!-- End user Nav -->



        <li class="nav-item">
            <a class="nav-link " href="@route('logouts')">
                <i class="bi bi-grid"></i>
                <span>Logout</span>
            </a>
        </li><!-- End Dashboard Nav -->
        
    </ul>
</aside>
