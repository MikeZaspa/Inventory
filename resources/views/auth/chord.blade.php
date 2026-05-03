<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Chord | Combat Inventory</title>
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
            --surface: #ffffff;
            --success-bg: #dcfce7;
            --success-text: #166534;
            --danger-bg: #fee2e2;
            --danger-text: #991b1b;
        }

        body {
            margin: 0;
            font-family: 'DM Sans', sans-serif;
            color: var(--text-main);
            background: linear-gradient(180deg, #f8fbff 0%, #ffffff 28%);
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
            flex: 0 0 20px;
        }

        .page-content {
            padding: 2rem;
        }

        .top-navbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            margin-bottom: 1.5rem;
            padding: 1rem 1.25rem;
            background: rgba(255, 255, 255, 0.9);
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

        .panel-card {
            background: var(--surface);
            border: 1px solid rgba(217, 226, 236, 0.9);
            border-radius: 10px;
            box-shadow: 0 20px 45px rgba(15, 23, 42, 0.08);
        }

        .form-control,
        .form-control:focus {
            border-radius: 16px;
            box-shadow: none;
        }

        .form-control {
            border: 1px solid var(--sidebar-border);
            padding: 0.85rem 1rem;
        }

        .form-label {
            font-size: 0.92rem;
            font-weight: 700;
        }

        .btn-pill {
            border-radius: 999px;
            padding: 0.8rem 1.25rem;
            font-weight: 700;
        }

        .table-wrap {
            overflow-x: auto;
        }

        .table thead th {
            color: var(--text-soft);
            font-size: 0.82rem;
            text-transform: uppercase;
            letter-spacing: 0.06em;
            white-space: nowrap;
        }

        .value-chip {
            display: inline-flex;
            align-items: center;
            padding: 0.35rem 0.7rem;
            border-radius: 999px;
            background: #eff6ff;
            color: #1d4ed8;
            font-weight: 700;
        }

        .status-banner {
            display: none;
            border-radius: 18px;
            padding: 0.95rem 1rem;
            font-weight: 600;
        }

        .status-banner.show {
            display: block;
        }

        .status-banner.success {
            background: var(--success-bg);
            color: var(--success-text);
        }

        .status-banner.error {
            background: var(--danger-bg);
            color: var(--danger-text);
        }

        .empty-state {
            text-align: center;
            color: var(--text-soft);
            padding: 2.5rem 1rem;
        }

        @media (max-width: 991.98px) {
            .sidebar-panel {
                min-height: auto;
                width: 100%;
                flex-basis: 100%;
                max-width: 100%;
            }

            .main-panel {
                width: 100%;
                flex-basis: 100%;
                max-width: 100%;
            }

            .page-content {
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
                    <a href="{{ route('dashboard') }}" class="sidebar-link">
                        <i class="bi bi-speedometer2 sidebar-icon" aria-hidden="true"></i>
                        <div class="fw-semibold">Dashboard</div>
                    </a>
                    <a href="{{ route('chord') }}" class="sidebar-link active" aria-current="page">
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
                    <a href="{{ route('thread-apple-brand') }}" class="sidebar-link">
                        <i class="bi bi-tag sidebar-icon" aria-hidden="true"></i>
                        <div class="fw-semibold">Thread Apple Brand</div>
                    </a>
                </nav>
            </aside>

            <main class="page-content main-panel">
                <div class="top-navbar">
                    <div>
                        <p class="top-navbar-title">Combat Inventory</p>
                        <p class="top-navbar-meta">Chord records management</p>
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
                            <h1 class="h4 font-display mb-1">Chord records</h1>
                        </div>
                        <div class="d-flex flex-wrap gap-2">
                            <button type="button" class="btn btn-primary btn-pill" id="openCreateModalButton" data-bs-toggle="modal" data-bs-target="#chordModal">
                                <i class="bi bi-plus-circle me-2"></i>Add chord entry
                            </button>
                            <button type="button" class="btn btn-outline-primary btn-pill" id="refreshButton">
                                <i class="bi bi-arrow-clockwise me-2"></i>Refresh
                            </button>
                        </div>
                    </div>

                    <div class="table-wrap">
                        <table id="chordTable" class="table align-middle mb-0">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Size</th>
                                    <th>Chord</th>
                                    <th>Quantity</th>
                                    <th>Created</th>
                                    <th class="text-end">Actions</th>
                                </tr>
                            </thead>
                            <tbody id="chordTableBody"></tbody>
                        </table>
                    </div>
                </section>
            </main>
        </div>
    </div>

    <div class="modal fade" id="chordModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0" style="border-radius: 28px;">
                <div class="modal-header border-0 px-4 pt-4 pb-2">
                    <div>
                        <h2 class="h4 font-display mb-1" id="formTitle">Add chord entry</h2>
                        <p class="text-secondary mb-0 small">Create or update a chord record here.</p>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body px-4 pb-4 pt-2">
                    <form id="chordForm" class="d-grid gap-3">
                        <input type="hidden" id="recordId">
                        <div>
                            <label for="size" class="form-label">Size</label>
                            <select class="form-control" id="size" name="size" required>
                                <option value="">Select size</option>
                                <option value="Small">Small</option>
                                <option value="Medium">Medium</option>
                                <option value="Large">Large</option>
                                <option value="XL">XL</option>
                            </select>
                        </div>
                        <div>
                            <label for="chord" class="form-label">Chord</label>
                            <input type="text" class="form-control" id="chord" name="chord" placeholder="e.g. 1/2" required>
                        </div>
                        <div>
                            <label for="quantity" class="form-label">Quantity</label>
                            <input type="number" class="form-control" id="quantity" name="quantity" min="1" step="1" value="1" required>
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
            index: @json(route('chords.index')),
            store: @json(route('chords.store')),
            updateBase: @json(url('/chords')),
        };

        const state = {
            items: @json($chords),
            editingId: null,
        };

	        const form = document.getElementById('chordForm');
	        const formTitle = document.getElementById('formTitle');
	        const recordIdInput = document.getElementById('recordId');
	        const sizeInput = document.getElementById('size');
	        const chordInput = document.getElementById('chord');
	        const quantityInput = document.getElementById('quantity');
	        const submitButton = document.getElementById('submitButton');
	        const cancelEditButton = document.getElementById('cancelEditButton');
	        const openCreateModalButton = document.getElementById('openCreateModalButton');
	        const refreshButton = document.getElementById('refreshButton');
	        const chordTableBody = document.getElementById('chordTableBody');
	        const statusBanner = document.getElementById('statusBanner');
	        const chordModalElement = document.getElementById('chordModal');
	        const chordModal = new bootstrap.Modal(chordModalElement);

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

	        function showSweetAlert(title, icon = 'success') {
	            Swal.fire({
	                title,
	                icon,
	                iconColor: icon === 'success' ? '#16a34a' : '#2563eb',
	                confirmButtonColor: '#0f274f',
	                timer: 1800,
	                showConfirmButton: false,
	            });
	        }

	        function showCreateSuccessAlert() {
	            Swal.fire({
	                title: 'Chord entry created successfully.',
	                icon: 'success',
	                iconColor: '#16a34a',
	                confirmButtonColor: '#0f274f',
	                timer: 1800,
	                showConfirmButton: false,
	            });
	        }

	        function showRefreshAlert() {
	            Swal.fire({
	                title: 'Chord list refreshed.',
	                icon: 'success',
	                iconColor: '#2563eb',
	                confirmButtonColor: '#0f274f',
	                timer: 1600,
	                showConfirmButton: false,
	            });
	        }

	        function syncChordWithSize(size) {
	            const chordBySize = {
	                Medium: '1/4',
	                Large: '1/2',
	            };

	            if (chordBySize[size]) {
	                chordInput.value = chordBySize[size];
	                chordInput.dataset.autoFilled = 'true';
	                return;
	            }

	            if (chordInput.dataset.autoFilled === 'true') {
	                chordInput.value = '';
	            }

	            delete chordInput.dataset.autoFilled;
	        }

	        async function confirmDelete(item) {
	            const result = await Swal.fire({
	                title: 'Delete chord entry?',
	                icon: 'warning',
	                showCancelButton: true,
	                confirmButtonColor: '#dc2626',
	                cancelButtonColor: '#94a3b8',
	                confirmButtonText: 'Delete',
	                cancelButtonText: 'Cancel',
	            });

	            return result.isConfirmed;
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
	            delete chordInput.dataset.autoFilled;
	            formTitle.textContent = 'Add chord entry';
	            cancelEditButton.classList.add('d-none');
	            submitButton.innerHTML = '<i class="bi bi-plus-circle me-2"></i>Save entry';
	        }

	        function enterEditMode(item) {
	            state.editingId = item.id;
	            recordIdInput.value = item.id;
	            sizeInput.value = item.size;
	            chordInput.value = item.chord;
	            quantityInput.value = item.quantity ?? 1;
	            delete chordInput.dataset.autoFilled;
	            formTitle.textContent = `Edit ${item.size}`;
	            cancelEditButton.classList.remove('d-none');
	            submitButton.innerHTML = '<i class="bi bi-check2-circle me-2"></i>Update entry';
	            clearStatus();
	            chordModal.show();
	            sizeInput.focus();
	        }

	        sizeInput.addEventListener('change', () => {
	            syncChordWithSize(sizeInput.value);
	        });

	        chordInput.addEventListener('input', () => {
	            delete chordInput.dataset.autoFilled;
	        });

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
	                chordTableBody.innerHTML = `
	                    <tr>
	                        <td colspan="6" class="empty-state">
	                            <i class="bi bi-inbox fs-2 d-block mb-2"></i>
	                            No chord records yet. Add your first size, chord, and quantity values.
	                        </td>
	                    </tr>
	                `;
                return;
            }

	            chordTableBody.innerHTML = state.items.map((item, index) => `
	                <tr>
	                    <td class="fw-semibold text-secondary">${index + 1}</td>
	                    <td class="fw-semibold">${escapeHtml(item.size)}</td>
	                    <td><span class="value-chip">${escapeHtml(item.chord)}</span></td>
	                    <td class="fw-semibold">${escapeHtml(item.quantity)}</td>
	                    <td class="text-secondary small">${formatDate(item.created_at)}</td>
	                    <td class="text-end">
                        <div class="d-inline-flex gap-2">
                            <button type="button" class="btn btn-sm btn-outline-primary rounded-pill px-3" data-action="edit" data-id="${item.id}">
                                <i class="bi bi-pencil-square me-1"></i>Edit
                            </button>
                            <button type="button" class="btn btn-sm btn-outline-danger rounded-pill px-3" data-action="delete" data-id="${item.id}">
                                <i class="bi bi-trash3 me-1"></i>Delete
                            </button>
                        </div>
                    </td>
                </tr>
            `).join('');
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
                const validationErrors = payload.errors ? Object.values(payload.errors).flat().join(' ') : null;
                throw new Error(validationErrors || payload.message || 'Something went wrong.');
            }

            return payload;
        }

        async function loadChords(showMessage = false) {
            const items = await request(routes.index, { method: 'GET', headers: { 'Content-Type': 'application/json' } });
            state.items = items;
            renderTable();

            if (showMessage) {
                showRefreshAlert();
            }
        }

        form.addEventListener('submit', async (event) => {
            event.preventDefault();
            clearStatus();
            setLoading(true);

	            const payload = {
	                size: sizeInput.value.trim(),
	                chord: chordInput.value.trim(),
	                quantity: quantityInput.value.trim(),
	            };

            try {
                const isEditing = Boolean(state.editingId);
                const endpoint = isEditing ? `${routes.updateBase}/${state.editingId}` : routes.store;
                const method = isEditing ? 'PUT' : 'POST';

                const result = await request(endpoint, {
                    method,
                    body: JSON.stringify(payload),
                });

                await loadChords();
                resetForm();
                chordModal.hide();
                if (!isEditing) {
                    showCreateSuccessAlert();
                } else {
                    showSweetAlert(result.message || 'Saved successfully.', 'success');
                }
            } catch (error) {
                showStatus(error.message, 'error');
            } finally {
                setLoading(false);
            }
        });

        cancelEditButton.addEventListener('click', () => {
            resetForm();
            clearStatus();
            chordModal.hide();
        });

        openCreateModalButton.addEventListener('click', () => {
            resetForm();
            clearStatus();
        });

        chordModalElement.addEventListener('hidden.bs.modal', () => {
            resetForm();
        });

        refreshButton.addEventListener('click', async () => {
            clearStatus();

            try {
                await loadChords(true);
            } catch (error) {
                showStatus(error.message, 'error');
            }
        });

        chordTableBody.addEventListener('click', async (event) => {
            const button = event.target.closest('button[data-action]');

            if (!button) {
                return;
            }

            const item = state.items.find((entry) => entry.id === Number(button.dataset.id));

            if (!item) {
                return;
            }

            const action = button.dataset.action;

            if (action === 'edit') {
                enterEditMode(item);
                return;
            }

            if (action === 'delete') {
                const confirmed = await confirmDelete(item);

                if (!confirmed) {
                    return;
                }

                clearStatus();

                try {
                    const result = await request(`${routes.updateBase}/${item.id}`, {
                        method: 'DELETE',
                    });

                    if (state.editingId === item.id) {
                        resetForm();
                    }

                    await loadChords();
                    showSweetAlert(result.message || 'Deleted successfully.', 'success');
                } catch (error) {
                    showStatus(error.message, 'error');
                }
            }
        });

        renderTable();
    </script>
</body>
</html>
