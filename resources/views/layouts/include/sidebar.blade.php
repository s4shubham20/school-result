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
                <div class="parent-icon">
                    <i class='bx bx-home'></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon">
                    <i class='bx bx-spa'></i>
                </div>
                <div class="menu-title">Student</div>
            </a>
            <ul>
                <li>
                    <a href="{{ route('student.create') }}">
                        <i class="bx bx-right-arrow-circle"></i>
                        Add Student
                    </a>
                </li>
                <li>
                    <a href="{{ route('student.index') }}">
                        <i class="bx bx-right-arrow-circle"></i>
                        View Student
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon">
                    <i class='bx bx-spa'></i>
                </div>
                <div class="menu-title">Subject</div>
            </a>
            <ul>
                <li>
                    <a href="{{ route('subject.create') }}">
                        <i class="bx bx-right-arrow-circle"></i>
                        Add Subject
                    </a>
                </li>
                <li>
                    <a href="{{ route('subject.index') }}">
                        <i class="bx bx-right-arrow-circle"></i>
                        View Subject
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon">
                    <i class='bx bx-spa'></i>
                </div>
                <div class="menu-title">Result</div>
            </a>
            <ul>
                <li>
                    <a href="{{ route('result.index') }}">
                        <i class="bx bx-right-arrow-circle"></i>
                        View Marks
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('form').submit();" class="nav-link">
                <div class="parent-icon">
                    <i class="bx bx-log-out"></i>
                </div>
                <span class="menu-title">Logout</span>
            </a>
            <form class="d-none" action="{{ route('logout') }}" method="post" id="form">
                @csrf
            </form>
        </li>
    </ul>
    <!--end navigation-->
</div>
