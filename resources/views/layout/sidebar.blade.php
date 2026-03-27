<nav class="pc-sidebar">
    <div class="navbar-wrapper">
        <div class="m-header">
            <a href="{{ url('/') }}" class="b-brand text-primary">
                <!-- ========   Change your logo from here   ============ -->
                <img src="{{ asset('template/assets/images/logo-white.svg') }}" alt="logo image" class="logo-lg" />
            </a>
        </div>
        <div class="navbar-content">
            <ul class="pc-navbar">
                <li class="pc-item">
                    <a href="{{ url('/') }}" class="pc-link"><span class="pc-micon"><i
                                class="material-icons-two-tone">home</i> </span><span
                            class="pc-mtext">Dashboard</span></a>
                </li>
                <li class="pc-item">
                    <a href="{{ url('/kategori') }}" class="pc-link"><span class="pc-micon"><i
                                class="ph-duotone ph-list-dashes"></i>
                        </span><span class="pc-mtext">Kategori</span></a>
                </li>
                <li class="pc-item">
                    <a href="{{ url('/course') }}" class="pc-link"><span class="pc-micon"><i
                                class="ph-duotone ph-compass-tool"></i></span><span class="pc-mtext">Course</span></a>
                </li>
                <li class="pc-item">
                    <a href="{{ url('/my-course') }}" class="pc-link"><span class="pc-micon"><i
                                class="ph-duotone ph-keyboard"></i> </span><span class="pc-mtext">My
                            Course</span></a>
                </li>
                <li class="pc-item">
                    <a href="{{ url('/profil') }}" class="pc-link"><span class="pc-micon"><i
                                class="material-icons-two-tone">account_circle</i> </span><span
                            class="pc-mtext">Profil</span></a>
                </li>
            </ul>
        </div>
    </div>
</nav>