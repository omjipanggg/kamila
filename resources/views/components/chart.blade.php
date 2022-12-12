<div class="col col-md-12 col-lg-6 mb-4">
    <div class="card card-menu">
        <div class="card-header">
            <i class="fas fa-chart-{{ $variant }} me-1"></i>
            {{ $chartTitle }}
        </div>
        <div class="card-body"><canvas id="{{ $variant }}Chart" width="100%" height="40"></canvas></div>
    </div>
</div>