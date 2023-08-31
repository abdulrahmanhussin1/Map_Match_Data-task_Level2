<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('home') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>Data</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('mainData') }}">
                        <i class="bi bi-circle"></i><span>Main Data</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('mappingData') }}">
                        <i class="bi bi-circle"></i><span>Mapping Data</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link collapsed"  href="{{ route('matchingData') }}">
                        <i class="bi bi-circle"></i><span>Matching Data</span></i>
                    </a>
                </li>
{{-- <li class="nav-item">
                    <a class="nav-link collapsed" data-bs-target="#components-nav1" data-bs-toggle="collapse" href="#">
                        <i class="bi bi-circle"></i><span>Matching Data columns</span><i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="components-nav1" class="nav-content collapse " data-bs-parent="#sidebar-nav1">
                        <li>
                            <a  href ="{{ route('matchedData','ar') }}">
                                <i class="bi bi-circle"></i><span>Arabic</span>
                            </a>
                        </li>
                        <li>
                            <a  href ="{{ route('matchedData','en') }}">
                                <i class="bi bi-circle"></i><span>English</span>
                            </a>
                        </li>
                        <li>
                            <a href ="{{ route('matchedData','lat') }}">
                                <i class="bi bi-circle" ></i><span>Latin</span>
                            </a>
                        </li>

                    </ul>
                </li> --}}
            </ul>
        </li><!-- End Components Nav -->
</aside><!-- End Sidebar-->
