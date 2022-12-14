<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <span class="sb-sidenav-menu-heading mt-3">Manajemen</span>
{{-- 

                @foreach($menus as $menu)

                @if($menu->has_param)
                <a class="nav-link @if($menu->status == 0) disabled @endif" href="{{ route($menu->route, $menu->model) }}" >
                @else
                <a class="nav-link @if($menu->status == 0) disabled @endif" href="{{ route($menu->route) }}" >
                @endif
                    <div class="sb-nav-link-icon"><i class="fas {{ $menu->icon }}"></i></div>
                    {{ $menu->name }}
                </a>

                @endforeach

--}}
                @foreach($menus as $menu)

                @if($menu->has_child)
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#menu{{ $menu->id }}" aria-expanded="false" aria-controls="menu{{ $menu->id }}">
                        <div class="sb-nav-link-icon"><i class="fas {{ $menu->icon }}"></i></div>
                        {{ $menu->name }}
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                @else
                    @if($menu->parent_id !== 0)
                        <div class="collapse" id="menu{{ $menu->parent_id }}" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                        @if($menu->has_param)
                            <a class="nav-link @if($menu->status == 0) disabled @endif" href="{{ route($menu->route, $menu->model) }}" >
                        @else
                            <a class="nav-link @if($menu->status == 0) disabled @endif" href="{{ route($menu->route) }}" >
                        @endif
                                <div class="sb-nav-link-icon"><i class="fas {{ $menu->icon }}"></i></div>
                                {{ $menu->name }}
                            </a>
                                </nav>
                            </div>
                    @else
                        @if($menu->has_param)
                            <a class="nav-link @if($menu->status == 0) disabled @endif" href="{{ route($menu->route, $menu->model) }}" >
                        @else
                            <a class="nav-link @if($menu->status == 0) disabled @endif" href="{{ route($menu->route) }}" >
                        @endif
                                <div class="sb-nav-link-icon"><i class="fas {{ $menu->icon }}"></i></div>
                                {{ $menu->name }}
                            </a>
                    @endif
                @endif
                @endforeach
            </div>
        </div>
            {{ Form::open(['route' => 'dashboard.search', 'class' => 'form form-inline d-inline-block']) }}
                <div class="input-group">
                    <input class="form-control" type="text" autocomplete="off" placeholder="Search" aria-label="Search" aria-describedby="btnNavbarSearch" name="search" />
                    <button class="btn btn-color" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            {{ Form::close() }}

        <div class="sb-sidenav-footer">
            <div class="d-flex align-items-start gap-12">
                <img src="{{ asset('img/default.png') }}" alt="Avatar">
                <div class="group">
                    <p>{{ Auth::user()->name; }}</p>
                </div>
            </div>
        </div>
    </nav>
</div>