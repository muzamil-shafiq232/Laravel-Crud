<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'E-Commerce Dashboard')</title>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&family=IBM+Plex+Sans:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/modern-style.css') }}">
</head>
<body class="app-body">
    <div class="app-grid">
        <aside class="app-sidebar" id="appSidebar">
            <div class="sidebar-brand">
                <span class="brand-badge"><i class="bi bi-stars"></i></span>
                <div>
                    <strong>Muz Commerce</strong>
                    <p>Control Center</p>
                </div>
            </div>

            <nav class="sidebar-nav">
                <a class="sidebar-link {{ request()->routeIs('customers.*') ? 'active' : '' }}" href="{{ route('customers.index') }}">
                    <i class="bi bi-people"></i>
                    <span>
                        Customers
                        <small>Directory and contacts</small>
                    </span>
                </a>
                <a class="sidebar-link {{ request()->routeIs('products.*') ? 'active' : '' }}" href="{{ route('products.index') }}">
                    <i class="bi bi-box-seam"></i>
                    <span>
                        Products
                        <small>Catalog and stock</small>
                    </span>
                </a>
                <a class="sidebar-link {{ request()->routeIs('orders.*') ? 'active' : '' }}" href="{{ route('orders.index') }}">
                    <i class="bi bi-receipt-cutoff"></i>
                    <span>
                        Orders
                        <small>Transactions timeline</small>
                    </span>
                </a>
                <a class="sidebar-link {{ request()->routeIs('order-details.*') ? 'active' : '' }}" href="{{ route('order-details.index') }}">
                    <i class="bi bi-list-check"></i>
                    <span>
                        Order Details
                        <small>Line items and totals</small>
                    </span>
                </a>
            </nav>

            <div class="sidebar-footer">
                <p>Live workspace</p>
                <strong>{{ now()->format('M d, Y') }}</strong>
            </div>
        </aside>

        <div class="app-main">
            <header class="app-topbar">
                <div class="topbar-title">
                    <button type="button" class="btn btn-topbar d-lg-none" id="sidebarToggle" aria-label="Toggle navigation">
                        <i class="bi bi-list"></i>
                    </button>
                    <div>
                        <p class="kicker">Operations</p>
                        <h1>@yield('title', 'Overview')</h1>
                    </div>
                </div>

                <div class="topbar-actions">
                    <a href="{{ route('orders.create') }}" class="btn btn-cta">
                        <i class="bi bi-plus-circle"></i> Quick Order
                    </a>
                </div>
            </header>

            <section class="insight-strip">
                <article>
                    <small>Focus</small>
                    <strong>Daily Operations</strong>
                </article>
                <article>
                    <small>Modules</small>
                    <strong>4 Connected Areas</strong>
                </article>
                <article>
                    <small>Mode</small>
                    <strong>Live CRUD Workspace</strong>
                </article>
            </section>

            <main class="content-wrapper fade-in">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="bi bi-check-circle-fill me-2"></i>
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @if($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="bi bi-exclamation-triangle-fill me-2"></i>
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const sidebar = document.getElementById('appSidebar');
        const sidebarToggle = document.getElementById('sidebarToggle');

        if (sidebar && sidebarToggle) {
            sidebarToggle.addEventListener('click', () => {
                sidebar.classList.toggle('is-open');
            });

            document.addEventListener('click', (event) => {
                if (!sidebar.classList.contains('is-open')) {
                    return;
                }

                if (!sidebar.contains(event.target) && !sidebarToggle.contains(event.target)) {
                    sidebar.classList.remove('is-open');
                }
            });
        }
    </script>
</body>
</html>
