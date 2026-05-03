<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thread Apple Brand | Combat Inventory</title>
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
            background: linear-gradient(135deg, #f8fbff 0%, #eef5ff 100%);
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

        .hero-card {
            border: 1px solid rgba(217, 226, 236, 0.9);
            border-radius: 28px;
            background: rgba(255, 255, 255, 0.92);
            box-shadow: 0 18px 50px rgba(15, 23, 42, 0.08);
            overflow: hidden;
        }

        .hero-accent {
            background: linear-gradient(135deg, #dbeafe 0%, #eff6ff 100%);
        }

        @media (max-width: 991.98px) {
            .sidebar-panel,
            .main-panel {
                width: 100%;
                max-width: 100%;
                flex: 0 0 100%;
            }

            .sidebar-panel {
                min-height: auto;
                border-right: 0;
                border-bottom: 1px solid var(--sidebar-border);
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
                    <a href="{{ route('dashboard') }}" class="sidebar-link">
                        <i class="bi bi-speedometer2 sidebar-icon" aria-hidden="true"></i>
                        <div class="fw-semibold">Dashboard</div>
                    </a>
                    <a href="{{ route('chord') }}" class="sidebar-link">
                        <i class="bi bi-bounding-box sidebar-icon" aria-hidden="true"></i>
                        <div class="fw-semibold">Chord</div>
                    </a>
                    <a href="{{ route('garter') }}" class="sidebar-link">
                        <i class="bi bi-square sidebar-icon" aria-hidden="true"></i>
                        <div class="fw-semibold">Garter Black Edge</div>
                    </a>
                    <a href="{{ route('peactwill') }}" class="sidebar-link">
                        <i class="bi bi-columns-gap sidebar-icon" aria-hidden="true"></i>
                        <div class="fw-semibold">Peactwill Color</div>
                    </a>
                    <a href="{{ route('thread-apple-brand') }}" class="sidebar-link active" aria-current="page">
                        <i class="bi bi-tag sidebar-icon" aria-hidden="true"></i>
                        <div class="fw-semibold">Thread Apple Brand</div>
                    </a>
                </nav>
            </aside>

            <main class="main-panel">
                <div class="top-navbar">
                    <div>
                        <p class="top-navbar-title">Combat Inventory</p>
                        <p class="top-navbar-meta">Thread Apple Brand records management</p>
                    </div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-outline-dark btn-pill">
                            <i class="bi bi-box-arrow-right me-2"></i>Logout
                        </button>
                    </form>
                </div>

                
            </main>
        </div>
    </div>
</body>
</html>
