<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <span class="sb-sidenav-menu-heading mt-4">Manajemen</span>
                
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt harum cumque quibusdam quis fugit iste similique facilis culpa, a atque assumenda, delectus dignissimos maxime laborum sequi sed veniam unde dicta vitae. Animi veritatis voluptas minus expedita voluptatem laborum odio, in sit aspernatur, aperiam. Consectetur, consequuntur non dicta fugiat ipsam! Quis minima impedit aliquam dolor minus beatae ipsam exercitationem alias quae, nostrum corporis eveniet quasi amet in voluptate velit suscipit nam dolore consectetur eaque praesentium porro id facilis quo. Voluptatum rerum provident nam aspernatur ea explicabo possimus. Accusamus autem illum dolore laboriosam, aspernatur eligendi recusandae, veniam aperiam quae vitae enim adipisci assumenda tenetur earum veritatis iste dolor quisquam quam possimus nostrum. Blanditiis sed voluptatem labore maxime sit assumenda dolore corrupti ratione tempore eaque at facere aliquam maiores quas incidunt officiis repellat, similique. Adipisci ex magni iste quisquam nulla enim blanditiis illum, dolore at. Ullam dolore modi nihil reprehenderit voluptates, qui laborum quo tempore soluta odio ducimus corporis ea facilis laudantium, ad vero et aperiam at sunt. Repudiandae quis cum excepturi totam, enim perspiciatis id itaque eos beatae quos laboriosam maxime distinctio rerum doloremque similique impedit quam, error provident optio explicabo illo earum tempora, quaerat eum! Incidunt exercitationem impedit ipsum, dolores dolore.</p>

                @foreach($menus as $menu)
                <a class="nav-link" href="{{ route($menu->route) }}">
                    <div class="sb-nav-link-icon"><i class="fas {{ $menu->icon }}"></i></div>
                    {{ $menu->name }}
                </a>
                @endforeach
                
                <a class="nav-link" href="{{ route('dashboard.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-house-chimney"></i></div>
                    Dashboard
                </a>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                    <div class="sb-nav-link-icon"><i class="fas fa-user-plus"></i></div>
                    Rekrutmen
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseOne" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ route('dashboard.show', 'applicant') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-address-card"></i></div>
                            Data Pelamar
                        </a>
                        <a class="nav-link" href="{{ route('dashboard.show', 'proposal') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-scroll"></i></div>
                            Lowongan Kerja
                        </a>
                        <a class="nav-link" href="#">
                            <div class="sb-nav-link-icon"><i class="fas fa-flask-vial"></i></div>
                            Seleksi
                        </a>
                        <a class="nav-link" href="#">
                            <div class="sb-nav-link-icon"><i class="fas fa-thumbs-up"></i></div>
                            Penilaian
                        </a>
                        <a class="nav-link" href="#">
                            <div class="sb-nav-link-icon"><i class="fas fa-envelope-open-text"></i></div>
                            Offering Letter
                        </a>
                    </nav>
                </div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    <div class="sb-nav-link-icon"><i class="fas fa-user-tie"></i></div>
                    Kepegawaian
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseTwo" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionTwo">
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseOne" aria-expanded="false" aria-controls="pagesCollapseOne">
                            <div class="sb-nav-link-icon"><i class="fas fa-briefcase"></i></div>
                            Master
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="pagesCollapseOne" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionTwo">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{ route('dashboard.show', 'employee') }}">Pribadi</a>
                                <a class="nav-link" href="#">Keluarga</a>
                                <a class="nav-link" href="#">Pendidikan</a>
                                <a class="nav-link" href="#">Keahlian</a>
                                <a class="nav-link" href="#">Akun Bank</a>
                                <a class="nav-link" href="#">Work Experience</a>
                                <a class="nav-link" href="#">Org. Experience</a>
                            </nav>
                        </div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseTwo" aria-expanded="false" aria-controls="pagesCollapseTwo">
                            <div class="sb-nav-link-icon"><i class="fas fa-calendar-check"></i></div>
                            Kehadiran
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="pagesCollapseTwo" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionTwo">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="#">Presensi</a>
                                <a class="nav-link" href="#">Lembur</a>
                                <a class="nav-link" href="#">Cuti</a>
                                <a class="nav-link" href="#">Timetable</a>
                                <a class="nav-link" href="#">Workplan</a>
                            </nav>
                        </div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseThree" aria-expanded="false" aria-controls="pagesCollapseThree">
                            <div class="sb-nav-link-icon"><i class="fas fa-sack-dollar"></i></div>
                            Penggajian
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="pagesCollapseThree" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionTwo">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="#">Payroll</a>
                                <a class="nav-link" href="#">Slip Gaji</a>
                                <a class="nav-link" href="#">PPh-21</a>
                            </nav>
                        </div>
                    </nav>
                </div>
                <span class="sb-sidenav-menu-heading">Lain-Lain</span>
                <a class="nav-link" href="{{ route('dashboard.show', 'vendor') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-landmark"></i></div>
                    Vendor
                </a>
                <a class="nav-link" href="{{ route('dashboard.show', 'vendor') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-screwdriver-wrench"></i></div>
                    Pengaturan
                </a>
                <a class="nav-link last" href="{{ URL::to('logs') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-file-circle-check"></i></div>
                    Activity Log
                </a>
            </div>
        </div>
            <form class="d-inline-block form form-inline" action="search" method="POST">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search" aria-label="Search" aria-describedby="btnNavbarSearch" name="search" />
                    <button class="btn btn-color" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>

        <div class="sb-sidenav-footer">
            <img src="{{ asset('img/default.png') }}" alt="Avatar">
            <div>
                <p>{{ Auth::user()->name; }}</p>
                <p>{{ Auth::user()->name; }}</p>
            </div>
        </div>
    </nav>
</div>