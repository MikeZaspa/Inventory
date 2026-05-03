<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Manila Bay - Thread 120 TKT-3000M | Combat Inventory</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&family=Space+Grotesk:wght@500;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --sidebar-hover: #0f274f;
            --sidebar-border: #d9e2ec;
            --text-main: #0f172a;
            --text-soft: #64748b;
        }

        body {
            font-family: 'DM Sans', sans-serif;
            color: var(--text-main);
            background: linear-gradient(135deg, #f8fbff 0%, #eef5ff 100%);
            overflow: hidden;
        }

        .font-display {
            font-family: 'Space Grotesk', sans-serif;
        }

        .dashboard-shell {
            height: 100vh;
            min-height: 100vh;
            padding: 0;
            margin-left: 0;
            overflow: hidden;
        }

        .sidebar-panel {
            height: 100vh;
            min-height: 100vh;
            overflow-y: scroll;
            border-right: 1px solid var(--sidebar-border);
            box-shadow: 12px 0 24px -20px rgba(15, 23, 42, 0.28);
            width: 22%;
            flex: 0 0 22%;
            max-width: 22%;
            scrollbar-width: thin;
            scrollbar-color: rgba(15, 39, 79, 0.45) transparent;
        }

        .sidebar-panel::-webkit-scrollbar {
            width: 8px;
        }

        .sidebar-panel::-webkit-scrollbar-track {
            background: transparent;
        }

        .sidebar-panel::-webkit-scrollbar-thumb {
            background: rgba(15, 39, 79, 0.35);
            border-radius: 999px;
        }

        .main-panel {
            height: 100vh;
            overflow-y: scroll;
            width: 77%;
            flex: 0 0 77%;
            max-width: 77%;
            padding: 2rem;
            scrollbar-width: thin;
            scrollbar-color: rgba(15, 39, 79, 0.25) transparent;
        }

        .main-panel::-webkit-scrollbar {
            width: 8px;
        }

        .main-panel::-webkit-scrollbar-track {
            background: transparent;
        }

        .main-panel::-webkit-scrollbar-thumb {
            background: rgba(15, 39, 79, 0.22);
            border-radius: 999px;
        }

        .brand-logo {
            width: 110px;
            height: 150px;
            object-fit: cover;
            border-radius: 50%;
            display: block;
            margin: 0 auto 1rem;
        }

        .sidebar-link,
        .sidebar-sublink {
            display: flex;
            align-items: center;
            gap: 0.85rem;
            width: 100%;
            text-decoration: none;
            transition: background-color 0.2s ease, color 0.2s ease;
        }

        .sidebar-link {
            background: #fff;
            color: var(--text-main);
            border-radius: 20px;
            padding: 1rem 1.1rem;
        }

        .sidebar-link:hover,
        .sidebar-link:focus,
        .sidebar-link.active {
            background: var(--sidebar-hover);
            color: #fff;
        }

        .sidebar-group {
            display: grid;
            gap: 0.65rem;
        }

        .sidebar-submenu {
            display: none;
            gap: 0.45rem;
            padding-left: 1.1rem;
            border-left: 2px solid rgba(15, 39, 79, 0.12);
            margin-left: 0.7rem;
        }

        .sidebar-group:hover .sidebar-submenu,
        .sidebar-group:focus-within .sidebar-submenu {
            display: grid;
        }

        .sidebar-sublink {
            background: rgba(255, 255, 255, 0.88);
            color: var(--text-main);
            border-radius: 16px;
            padding: 0.85rem 1rem;
            font-size: 0.96rem;
        }

        .sidebar-sublink:hover,
        .sidebar-sublink:focus,
        .sidebar-sublink.active {
            background: rgba(15, 39, 79, 0.96);
            color: #fff;
        }

        .sidebar-icon {
            font-size: 1.1rem;
            line-height: 1;
            flex: 0 0 20px;
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

        .status-banner {
            display: none;
            border-radius: 16px;
            padding: 0.9rem 1rem;
            font-weight: 500;
        }

        .status-banner.show {
            display: block;
        }

        .status-banner.success {
            background: #dcfce7;
            color: #166534;
            border: 1px solid #86efac;
        }

        .status-banner.error {
            background: #fee2e2;
            color: #991b1b;
            border: 1px solid #fca5a5;
        }

        .panel-card {
            border: 1px solid rgba(217, 226, 236, 0.9);
            border-radius: 28px;
            background: rgba(255, 255, 255, 0.92);
            box-shadow: 0 18px 50px rgba(15, 23, 42, 0.08);
        }

        .table-wrap {
            overflow-x: auto;
        }

        .table-wrap table {
            min-width: 760px;
        }

        .table > :not(caption) > * > * {
            padding: 1rem 0.9rem;
        }

        .empty-state {
            text-align: center;
            padding: 2.8rem 1rem !important;
            color: var(--text-soft);
        }

        .btn-pill {
            border-radius: 999px;
            padding-inline: 1.1rem;
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
                    <div class="sidebar-group">
                        <a href="{{ route('thread-apple-brand') }}" class="sidebar-link">
                            <i class="bi bi-tag sidebar-icon" aria-hidden="true"></i>
                            <div class="fw-semibold">Brand</div>
                            <i class="bi bi-chevron-down ms-auto" aria-hidden="true"></i>
                        </a>
                        <div class="sidebar-submenu">
                            <a href="{{ route('thread-apple-brand') }}" class="sidebar-sublink">
                                <i class="bi bi-record-circle" aria-hidden="true"></i>
                                <span>Thread Apple</span>
                            </a>
                            <a href="{{ route('manila-bay-brand') }}" class="sidebar-sublink active" aria-current="page">
                                <i class="bi bi-record-circle" aria-hidden="true"></i>
                                <span>Manila Bay</span>
                            </a>
                        </div>
                    </div>
                </nav>
            </aside>

            <main class="main-panel">
                <div class="top-navbar">
                    <div>
                        <p class="top-navbar-title">Combat Inventory</p>
                        <p class="top-navbar-meta">Manila Bay - Thread 120 TKT-3000M records management</p>
                    </div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-outline-dark btn-pill">
                            <i class="bi bi-box-arrow-right me-2"></i>Logout
                        </button>
                    </form>
                </div>

                <div id="statusBanner" class="status-banner mb-4" role="status" aria-live="polite"></div>

                <section class="panel-card p-4">
                    <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3 mb-3">
                        <div>
                            <h1 class="h4 font-display mb-1">Manila Bay records</h1>
                            <p class="text-secondary mb-0">Thread 120 TKT - 3000M.</p>
                        </div>
                        <div class="d-flex flex-wrap gap-2">
                            <button type="button" class="btn btn-primary btn-pill" id="openCreateModalButton" data-bs-toggle="modal" data-bs-target="#manilaBayBrandModal">
                                <i class="bi bi-plus-circle me-2"></i>Add entry
                            </button>
                            <button type="button" class="btn btn-outline-primary btn-pill" id="refreshButton">
                                <i class="bi bi-arrow-clockwise me-2"></i>Refresh
                            </button>
                        </div>
                    </div>

                    <div class="table-wrap">
                        <table class="table align-middle mb-0">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Color</th>
                                    <th>Qty</th>
                                    <th>Created</th>
                                    <th class="text-end">Actions</th>
                                </tr>
                            </thead>
                            <tbody id="manilaBayBrandTableBody"></tbody>
                        </table>
                    </div>
                </section>
            </main>
        </div>
    </div>

    <div class="modal fade" id="manilaBayBrandModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0" style="border-radius: 28px;">
                <div class="modal-header border-0 px-4 pt-4 pb-2">
                    <div>
                        <h2 class="h4 font-display mb-1" id="formTitle">Add Manila Bay entry</h2>
                        <p class="text-secondary mb-0 small">Create or update a color and qty record here.</p>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body px-4 pb-4 pt-2">
                    <form id="manilaBayBrandForm" class="d-grid gap-3">
                        <input type="hidden" id="recordId">
                        <div>
                            <label for="color" class="form-label">Color</label>
                            <input type="text" class="form-control" id="color" name="color" placeholder="e.g. Red" required>
                        </div>
                        <div>
                            <label for="qty" class="form-label">Qty</label>
                            <input type="number" class="form-control" id="qty" name="qty" min="1" step="1" value="1" required>
                        </div>
                        <div class="d-flex flex-wrap justify-content-center gap-2 pt-2">
                            <button type="submit" class="btn btn-primary btn-pill" id="submitButton">
                                <i class="bi bi-plus-circle me-2"></i>Save entry
                            </button>
                            <button type="button" class="btn btn-outline-secondary btn-pill d-none" id="cancelEditButton">
                                Cancel edit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const csrfToken = document.querySelector('meta[name="csrf-token"]').content;
        const routes = {
            index: @json(route('manila-bay-brands.index')),
            store: @json(route('manila-bay-brands.store')),
            updateBase: @json(url('/manila-bay-brands')),
        };

        const state = {
            items: @json($manilaBayBrands),
            editingId: null,
        };

        const form = document.getElementById('manilaBayBrandForm');
        const formTitle = document.getElementById('formTitle');
        const recordIdInput = document.getElementById('recordId');
        const colorInput = document.getElementById('color');
        const qtyInput = document.getElementById('qty');
        const submitButton = document.getElementById('submitButton');
        const cancelEditButton = document.getElementById('cancelEditButton');
        const openCreateModalButton = document.getElementById('openCreateModalButton');
        const refreshButton = document.getElementById('refreshButton');
        const tableBody = document.getElementById('manilaBayBrandTableBody');
        const statusBanner = document.getElementById('statusBanner');
        const modal = new bootstrap.Modal(document.getElementById('manilaBayBrandModal'));

        function escapeHtml(value) {
            return String(value)
                .replaceAll('&', '&amp;')
                .replaceAll('<', '&lt;')
                .replaceAll('>', '&gt;')
                .replaceAll('"', '&quot;')
                .replaceAll("'", '&#039;');
        }

        function showStatus(message, type = 'success') {
            statusBanner.textContent = message;
            statusBanner.className = `status-banner show ${type}`;
        }

        function clearStatus() {
            statusBanner.className = 'status-banner';
            statusBanner.textContent = '';
        }

        async function request(url, options = {}) {
            const response = await fetch(url, {
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                    ...options.headers,
                },
                credentials: 'same-origin',
                ...options,
            });

            const payload = await response.json().catch(() => ({}));
            if (!response.ok) {
                const errors = payload.errors ? Object.values(payload.errors).flat().join(' ') : null;
                throw new Error(errors || payload.message || 'Something went wrong.');
            }

            return payload;
        }

        function setLoading(isLoading) {
            submitButton.disabled = isLoading;
            refreshButton.disabled = isLoading;
            submitButton.innerHTML = isLoading
                ? '<span class="spinner-border spinner-border-sm me-2" aria-hidden="true"></span>Saving...'
                : `<i class="bi ${state.editingId ? 'bi-check2-circle' : 'bi-plus-circle'} me-2"></i>${state.editingId ? 'Update entry' : 'Save entry'}`;
        }

        function resetForm() {
            state.editingId = null;
            recordIdInput.value = '';
            form.reset();
            qtyInput.value = '1';
            formTitle.textContent = 'Add Manila Bay entry';
            cancelEditButton.classList.add('d-none');
            submitButton.innerHTML = '<i class="bi bi-plus-circle me-2"></i>Save entry';
        }

        function formatDate(value) {
            if (!value) {
                return '-';
            }

            return new Date(value).toLocaleString('en-US', {
                year: 'numeric',
                month: 'short',
                day: 'numeric',
                hour: 'numeric',
                minute: '2-digit',
            });
        }

        function renderTable() {
            if (!state.items.length) {
                tableBody.innerHTML = `
                    <tr>
                        <td colspan="5" class="empty-state">
                            <i class="bi bi-inbox fs-2 d-block mb-2"></i>
                            No Manila Bay records yet.
                        </td>
                    </tr>
                `;
                return;
            }

            tableBody.innerHTML = state.items.map((item, index) => `
                <tr>
                    <td class="fw-semibold text-secondary">${index + 1}</td>
                    <td class="fw-semibold">${escapeHtml(item.color)}</td>
                    <td class="fw-semibold">${escapeHtml(item.qty)}</td>
                    <td class="text-secondary small">${formatDate(item.created_at)}</td>
                    <td class="text-end">
                        <div class="d-inline-flex gap-2">
                            <button type="button" class="btn btn-sm btn-outline-primary rounded-pill px-3" data-action="edit" data-id="${item.id}">Edit</button>
                            <button type="button" class="btn btn-sm btn-outline-danger rounded-pill px-3" data-action="delete" data-id="${item.id}">Delete</button>
                        </div>
                    </td>
                </tr>
            `).join('');
        }

        async function loadItems(showMessage = false) {
            state.items = await request(routes.index, { method: 'GET', headers: { 'Content-Type': 'application/json' } });
            renderTable();

            if (showMessage) {
                Swal.fire({ title: 'Manila Bay list refreshed.', icon: 'success', timer: 1200, showConfirmButton: false });
            }
        }

        function enterEditMode(item) {
            state.editingId = item.id;
            recordIdInput.value = item.id;
            colorInput.value = item.color;
            qtyInput.value = item.qty ?? 1;
            formTitle.textContent = `Edit ${item.color}`;
            cancelEditButton.classList.remove('d-none');
            submitButton.innerHTML = '<i class="bi bi-check2-circle me-2"></i>Update entry';
            modal.show();
        }

        async function confirmDelete(item) {
            const result = await Swal.fire({
                title: 'Delete Manila Bay entry?',
                text: `Delete the ${item.color} record?`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#dc2626',
                cancelButtonColor: '#94a3b8',
                confirmButtonText: 'Delete',
                cancelButtonText: 'Cancel',
            });

            return result.isConfirmed;
        }

        form.addEventListener('submit', async (event) => {
            event.preventDefault();
            clearStatus();
            setLoading(true);

            const payload = {
                color: colorInput.value.trim(),
                qty: qtyInput.value.trim(),
            };

            try {
                const isEditing = Boolean(state.editingId);
                const endpoint = isEditing ? `${routes.updateBase}/${state.editingId}` : routes.store;
                const method = isEditing ? 'PUT' : 'POST';
                const result = await request(endpoint, { method, body: JSON.stringify(payload) });
                await loadItems();
                resetForm();
                modal.hide();
                Swal.fire({
                    title: result.message || (isEditing ? 'Updated successfully.' : 'Created successfully.'),
                    icon: 'success',
                    timer: 1600,
                    showConfirmButton: false,
                });
            } catch (error) {
                showStatus(error.message, 'error');
            } finally {
                setLoading(false);
            }
        });

        cancelEditButton.addEventListener('click', () => {
            resetForm();
            modal.hide();
        });

        openCreateModalButton.addEventListener('click', () => {
            resetForm();
        });

        document.getElementById('manilaBayBrandModal').addEventListener('hidden.bs.modal', resetForm);

        refreshButton.addEventListener('click', async () => {
            clearStatus();
            try {
                await loadItems(true);
            } catch (error) {
                showStatus(error.message, 'error');
            }
        });

        tableBody.addEventListener('click', async (event) => {
            const button = event.target.closest('button[data-action]');
            if (!button) {
                return;
            }

            const item = state.items.find((entry) => entry.id === Number(button.dataset.id));
            if (!item) {
                return;
            }

            if (button.dataset.action === 'edit') {
                enterEditMode(item);
                return;
            }

            if (button.dataset.action === 'delete' && await confirmDelete(item)) {
                try {
                    const result = await request(`${routes.updateBase}/${item.id}`, { method: 'DELETE' });
                    if (state.editingId === item.id) {
                        resetForm();
                    }
                    await loadItems();
                    Swal.fire({
                        title: result.message || 'Deleted successfully.',
                        icon: 'success',
                        timer: 1400,
                        showConfirmButton: false,
                    });
                } catch (error) {
                    showStatus(error.message, 'error');
                }
            }
        });

        renderTable();
    </script>
</body>
</html>
