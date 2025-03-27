<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="theme-color" content="#4a8f29">
    <title>Exam Score System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/report.js'])
</head>

<body>
    <!-- Mobile Navigation -->
    <nav class="mobile-nav">
        <button class="mobile-nav-toggle" id="sidebarToggle">
            <i class="bi bi-list"></i>
        </button>

    </nav>

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-logo">
            <h2><i class="bi bi-journal-text"></i>G-SCORES</h2>
        </div>
        <ul class="sidebar-menu">
            <li>
                <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <i class="bi bi-speedometer2"></i>Dashboard
                </a>
            </li>
            <li>
                <a href="{{ route('check.score') }}" class="{{ request()->routeIs('check.score') ? 'active' : '' }}">
                    <i class="bi bi-search"></i>Search Scores
                </a>
            </li>
            <li>
                <a href="{{ route('scores.report') }}"
                    class="{{ request()->routeIs('scores.report') ? 'active' : '' }}">
                    <i class="bi bi-file-earmark-text"></i>Reports
                </a>
            </li>
            <li>
                <a href="{{ route('scores.top_group_a') }}"
                    class="{{ request()->routeIs('scores.top_group_a') ? 'active' : '' }}">
                    <i class="bi bi-award"></i>Top Group A
                </a>
            </li>
        </ul>
    </div>

    <!-- Main Content Area -->
    <div class="content">
        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif


        <div class="page-title">
            <i class="bi bi-graph-up"></i>
            <h1>@yield('page_title', 'Score Statistics')</h1>
        </div>

        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
