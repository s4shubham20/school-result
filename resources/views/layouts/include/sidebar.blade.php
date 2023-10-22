<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{ asset('assets/images/logo/logo-icon.png') }}" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">Synadmin</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-first-page'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="{{ route('dashboard.index') }}" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-home'></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-spa'></i>
                </div>
                <div class="menu-title">Application</div>
            </a>
            <ul>
                <li> <a href="index.html"><i class="bx bx-right-arrow-alt"></i>Analytics</a>
                </li>
                <li> <a href="index2.html"><i class="bx bx-right-arrow-alt"></i>Sales</a>
                </li>
                <li> <a href="index3.html"><i class="bx bx-right-arrow-alt"></i>eCommerce</a>
                </li>
                <li> <a href="index4.html"><i class="bx bx-right-arrow-alt"></i>Alternate</a>
                </li>
                <li> <a href="index5.html"><i class="bx bx-right-arrow-alt"></i>Hospitality</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('form').submit();" class="nav-link">
                <div class="parent-icon"><i class="bx bx-log-out"></i></div>
                <span class="menu-title">Logout</span>
            </a>
            <form class="d-none" action="{{ route('logout') }}" method="post" id="form">
                @csrf
            </form>
        </li>
    </ul>
    <!--end navigation-->
</div>
