<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Combat Inventory</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&family=Space+Grotesk:wght@500;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --page-blue: #dbeafe;
            --sidebar-hover: #0f274f;
            --sidebar-border: #d9e2ec;
            --text-main: #0f172a;
            --text-soft: #64748b;
        }

        body {
            font-family: 'DM Sans', sans-serif;
            color: var(--text-main);
        }

        .font-display {
            font-family: 'Space Grotesk', sans-serif;
        }

        .dashboard-shell {
            min-height: 100vh;
            padding: 0;
            margin-left: 0;
        }

        .sidebar-panel {
            min-height: 100vh;
            border-right: 1px solid var(--sidebar-border);
            box-shadow: 12px 0 24px -20px rgba(15, 23, 42, 0.28);
            width: 22%;
            flex: 0 0 22%;
            max-width: 22%;
        }

        .main-panel {
            width: 77%;
            flex: 0 0 77%;
            max-width: 77%;
            padding: 2rem;
        }

        .brand-logo {
            width: 110px;
            height: 150px;
            object-fit: cover;
            border-radius: 50%;
            display: block;
            margin: 0 auto 1rem;
        }

        .brand-title {
            margin-top: 1.5rem;
        }

        .content-card {
            background: rgba(255, 255, 255, 0.78);
            border: 1px solid rgba(255, 255, 255, 0.7);
            border-radius: 32px;
            box-shadow: 0 24px 80px rgba(59, 130, 246, 0.12);
            backdrop-filter: blur(8px);
        }

        .top-navbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            margin-bottom: 1.5rem;
            padding: 1rem 1.25rem;
            background: rgba(255, 255, 255, 0.92);
            border: 1px solid rgba(217, 226, 236, 0.9);
            border-radius: 10px;
            box-shadow: 0 12px 30px rgba(15, 23, 42, 0.06);
        }

        .top-navbar-title {
            margin: 0;
            font-size: 1.05rem;
            font-weight: 700;
        }

        .top-navbar-meta {
            margin: 0;
            color: var(--text-soft);
            font-size: 0.92rem;
        }

        .sidebar-link {
            display: flex;
            align-items: center;
            gap: 0.85rem;
            width: 100%;
            background: #fff;
            color: var(--text-main);
            text-decoration: none;
            border-radius: 20px;
            padding: 1rem 1.1rem;
            transition: background-color 0.2s ease, color 0.2s ease, border-color 0.2s ease;
        }

        .sidebar-link:hover,
        .sidebar-link:focus {
            background: var(--sidebar-hover);
            border-color: var(--sidebar-hover);
            color: #fff;
        }

        .sidebar-link.active {
            background: var(--sidebar-hover);
            color: #fff;
        }

        .sidebar-icon {
            font-size: 1.1rem;
            line-height: 1;
            flex: 0 0 20px;
        }

        .sidebar-link .sidebar-meta {
            color: var(--text-soft);
            transition: color 0.2s ease;
        }

        .sidebar-link:hover .sidebar-meta,
        .sidebar-link:focus .sidebar-meta {
            color: #dbeafe;
        }

        .logout-btn {
            background: #0f172a;
            border: none;
            border-radius: 20px;
            padding: 0.95rem 1rem;
            font-weight: 700;
        }

        .logout-btn:hover,
        .logout-btn:focus {
            background: var(--sidebar-hover);
        }

        .stat-card {
            border: 1px solid var(--sidebar-border);
            border-radius: 24px;
            background: #f8fafc;
        }

        .status-badge {
            background: #eff6ff;
            border-radius: 24px;
        }

        .count-card {
            background: #fff;
            border: 1px solid var(--sidebar-border);
            border-radius: 28px;
            box-shadow: 0 18px 40px rgba(15, 23, 42, 0.06);
        }

        .count-label {
            color: var(--text-soft);
            text-transform: uppercase;
            letter-spacing: 0.08em;
            font-size: 0.78rem;
            font-weight: 700;
        }

        .count-value {
            font-family: 'Space Grotesk', sans-serif;
            font-size: 2.4rem;
            font-weight: 700;
            line-height: 1;
        }

        @media (max-width: 991.98px) {
            .sidebar-panel,
            .main-panel {
                width: 100%;
                flex-basis: 100%;
                max-width: 100%;
            }

            .main-panel {
                padding: 1.25rem;
            }
        }

    </style>
</head>
<body>
    <div class="container-fluid dashboard-shell">
        <div class="row g-0">
         <aside class="px-4 py-4 sidebar-panel">
            <img src="{{ asset('images/combat-transparent.png') }}" alt="Combat logo" class="brand-logo">

            <nav class="mt-4 d-grid gap-3">
                <a href="{{ route('dashboard') }}" class="sidebar-link active" aria-current="page">
                    <i class="bi bi-speedometer2 sidebar-icon" aria-hidden="true"></i>
                    <div class="fw-semibold">Dashboard</div>
                </a>
                <a href="{{ route('chord') }}" class="sidebar-link">
                    <i class="bi bi-bounding-box sidebar-icon" aria-hidden="true"></i>
                    <div class="fw-semibold">Chord</div>
                </a>
                <a href="#" class="sidebar-link">
                    <i class="bi bi-square sidebar-icon" aria-hidden="true"></i>
                    <div class="fw-semibold">Garter Black Edge</div>
                </a>
                    <a href="{{ route('peactwill') }}" class="sidebar-link">
                        <i class="bi bi-columns-gap sidebar-icon" aria-hidden="true"></i>
                        <div class="fw-semibold">Peactwill Color</div>
                    </a>
            </nav>
        </aside>
        <main class="main-panel">
            <div class="top-navbar">
                <div>
                    <p class="top-navbar-title">Combat Inventory</p>
                    <p class="top-navbar-meta">Dashboard overview</p>
                </div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-outline-dark btn-pill">
                        <i class="bi bi-box-arrow-right me-2"></i>Logout
                    </button>
                </form>
            </div>

            <section class="content-card p-4 p-lg-5">
                <div class="mb-4">
                    <p class="text-uppercase fw-semibold text-primary small mb-2">Dashboard</p>
                    <h1 class="font-display fw-bold mb-2">Inventory counts</h1>
                    <p class="text-secondary mb-0">Quick totals from your current chord records.</p>
                </div>

                <div class="row g-4">
                    <div class="col-12 col-md-4">
                        <div class="count-card p-4 h-100">
                            <div class="count-label mb-3">Total Chord Records</div>
                            <div class="count-value">{{ $totalChords }}</div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="count-card p-4 h-100">
                            <div class="count-label mb-3">Total Sizes</div>
                            <div class="count-value">{{ $totalSizes }}</div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="count-card p-4 h-100">
                            <div class="count-label mb-3">Latest Chord</div>
                            <div class="count-value">{{ $latestChord }}</div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</html>
