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

    </style>
</head>
<body>
    <div class="container dashboard-shell">
         <aside class="col-12 col-lg-4 col-xl-3 px-4 py-4 sidebar-panel">
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
                    <i class="bi bi-diagram-3 sidebar-icon" aria-hidden="true"></i>
                    <div class="fw-semibold">Garter</div>
                </a>
                <a href="#" class="sidebar-link">
                    <i class="bi bi-square sidebar-icon" aria-hidden="true"></i>
                    <div class="fw-semibold">Black Edge</div>
                </a>
                <a href="#" class="sidebar-link">
                    <i class="bi bi-columns-gap sidebar-icon" aria-hidden="true"></i>
                    <div class="fw-semibold">Peactwill</div>
                </a>
            </nav>
        </aside>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
