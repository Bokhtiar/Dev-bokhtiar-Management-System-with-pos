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
                    <a href="=food-meal-general.html">
                        <i class="bi bi-circle"></i><span>General food-meal</span>
                    </a>
                </li>
                <li>
                    <a href="=food-meal-data.html">
                        <i class="bi bi-circle"></i><span>Data food-meal</span>
                    </a>
                </li>
            </ul>
        </li><!-- End food-meal Nav -->
    </ul>
</aside>
