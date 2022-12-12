<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Headings</div>
                <a class="nav-link" href="{{ route('dashboard') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-house-chimney"></i></div>
                    Dashboard
                </a>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Rekrutmen
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseOne" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ route('applicant.index') }}">Data Pelamar</a>
                        <a class="nav-link" href="{{ route('vacancy.index') }}">Lowongan Kerja</a>
                        <a class="nav-link" href="#">Seleksi</a>
                        <a class="nav-link" href="#">Penilaian</a>
                        <a class="nav-link" href="#">Offering Letter</a>
                    </nav>
                </div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                    Kepegawaian
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseTwo" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionTwo">
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseOne" aria-expanded="false" aria-controls="pagesCollapseOne">Data Master<div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="pagesCollapseOne" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionTwo">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{ route('applicant.index') }}">Pribadi</a>
                                <a class="nav-link" href="#">Keluarga</a>
                                <a class="nav-link" href="#">Pendidikan</a>
                                <a class="nav-link" href="#">Keahlian</a>
                                <a class="nav-link" href="#">Akun Bank</a>
                                <a class="nav-link" href="#">Work Experience</a>
                                <a class="nav-link" href="#">Org. Experience</a>
                            </nav>
                        </div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseTwo" aria-expanded="false" aria-controls="pagesCollapseTwo">
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
                <div class="sb-sidenav-menu-heading">Headings</div>
                <a class="nav-link" href="{{ URL::to('settings') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                    Pengaturan
                </a>
                <a class="nav-link" href="{{ URL::to('logs') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
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
            </div>
        </div>
    </nav>
</div>