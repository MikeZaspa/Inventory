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
            --sidebar-hover: #0f274f;
            --sidebar-border: #d9e2ec;
            --text-main: #0f172a;
            --text-soft: #64748b;
            --surface: #ffffff;
            --surface-soft: #f8fafc;
            --accent: #1d4ed8;
            --danger: #dc2626;
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

        .page-shell {
            min-height: 100vh;
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
            transition: background-color 0.2s ease, color 0.2s ease;
        }

        .sidebar-link:hover,
        .sidebar-link:focus,
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

        .panel-card {
            background: var(--surface);
            border: 1px solid rgba(217, 226, 236, 0.9);
            border-radius: 28px;
            box-shadow: 0 20px 45px rgba(15, 23, 42, 0.08);
        }

        .hero-note {
            border: 1px dashed rgba(29, 78, 216, 0.24);
            background: linear-gradient(135deg, rgba(219, 234, 254, 0.5), rgba(255, 255, 255, 0.92));
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
            }

            .page-content {
                padding: 1.25rem;
            }
        }
    </style>
</head>
<body>
    <div class="container-fluid page-shell">
        <div class="row g-0">
            <aside class="col-12 col-lg-3 col-xl-2 px-4 py-4 sidebar-panel">
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

            <main class="col-12 col-lg-9 col-xl-10 page-content">
                <div class="d-flex flex-column flex-lg-row align-items-lg-center justify-content-between gap-3 mb-4">
                    <div>
                        <p class="text-uppercase fw-semibold text-primary mb-2 small">Chord Management</p>
                        <h1 class="font-display fw-bold mb-2">Size and chord CRUD</h1>
                        <p class="text-secondary mb-0">Manage entries like <strong>Large - 1/2</strong> and <strong>Medium - 1/4</strong> with JavaScript and Laravel.</p>
                    </div>
                </div>

                <div id="statusBanner" class="status-banner mb-4" role="status" aria-live="polite"></div>

                <div class="row g-4">
                    <div class="col-12 col-xl-4">
                        <section class="panel-card p-4 h-100">
                            <div class="hero-note rounded-4 p-4 mb-4">
                                <div class="d-flex align-items-center gap-3 mb-3">
                                    <div class="rounded-circle bg-white shadow-sm d-inline-flex align-items-center justify-content-center" style="width: 52px; height: 52px;">
                                        <i class="bi bi-journal-text fs-4 text-primary"></i>
                                    </div>
                                    <div>
                                        <div class="fw-bold">Quick reference</div>
                                        <div class="text-secondary small">Based on your handwritten sample</div>
                                    </div>
                                </div>
                                <div class="small text-secondary">Examples: <strong>Large</strong> with chord <strong>1/2</strong>, and <strong>Medium</strong> with chord <strong>1/4</strong>.</div>
                            </div>

                            <h2 class="h4 font-display mb-3" id="formTitle">Add chord entry</h2>
                            <form id="chordForm" class="d-grid gap-3">
                                <input type="hidden" id="recordId">
                                <div>
                                    <label for="size" class="form-label">Size</label>
                                    <input type="text" class="form-control" id="size" name="size" placeholder="e.g. Large" required>
                                </div>
                                <div>
                                    <label for="chord" class="form-label">Chord</label>
                                    <input type="text" class="form-control" id="chord" name="chord" placeholder="e.g. 1/2" required>
                                </div>
                                <div class="d-flex flex-wrap gap-2 pt-2">
                                    <button type="submit" class="btn btn-primary btn-pill" id="submitButton">
                                        <i class="bi bi-plus-circle me-2"></i>Save entry
                                    </button>
                                    <button type="button" class="btn btn-outline-secondary btn-pill d-none" id="cancelEditButton">
                                        Cancel edit
                                    </button>
                                </div>
                            </form>
                        </section>
                    </div>

                    <div class="col-12 col-xl-8">
                        <section class="panel-card p-4">
                            <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3 mb-3">
                                <div>
                                    <h2 class="h4 font-display mb-1">Chord records</h2>
                                    <p class="text-secondary mb-0">Create, update, and delete your size measurements here.</p>
                                </div>
                                <button type="button" class="btn btn-outline-primary btn-pill" id="refreshButton">
                                    <i class="bi bi-arrow-clockwise me-2"></i>Refresh
                                </button>
                            </div>

                            <div class="table-wrap">
                                <table class="table align-middle mb-0">
                                    <thead>
                                        <tr>
                                            <th>Size</th>
                                            <th>Chord</th>
                                            <th>Created</th>
                                            <th class="text-end">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody id="chordTableBody"></tbody>
                                </table>
                            </div>
                        </section>
                    </div>
                </div>
            </main>
        </div>
    </div>

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
        const submitButton = document.getElementById('submitButton');
        const cancelEditButton = document.getElementById('cancelEditButton');
        const refreshButton = document.getElementById('refreshButton');
        const chordTableBody = document.getElementById('chordTableBody');
        const statusBanner = document.getElementById('statusBanner');

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
            formTitle.textContent = 'Add chord entry';
            cancelEditButton.classList.add('d-none');
            submitButton.innerHTML = '<i class="bi bi-plus-circle me-2"></i>Save entry';
        }

        function enterEditMode(item) {
            state.editingId = item.id;
            recordIdInput.value = item.id;
            sizeInput.value = item.size;
            chordInput.value = item.chord;
            formTitle.textContent = `Edit ${item.size}`;
            cancelEditButton.classList.remove('d-none');
            submitButton.innerHTML = '<i class="bi bi-check2-circle me-2"></i>Update entry';
            clearStatus();
            sizeInput.focus();
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
                chordTableBody.innerHTML = `
                    <tr>
                        <td colspan="4" class="empty-state">
                            <i class="bi bi-inbox fs-2 d-block mb-2"></i>
                            No chord records yet. Add your first size and chord value.
                        </td>
                    </tr>
                `;
                return;
            }

            chordTableBody.innerHTML = state.items.map((item) => `
                <tr>
                    <td class="fw-semibold">${escapeHtml(item.size)}</td>
                    <td><span class="value-chip">${escapeHtml(item.chord)}</span></td>
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
                showStatus('Chord list refreshed.');
            }
        }

        form.addEventListener('submit', async (event) => {
            event.preventDefault();
            clearStatus();
            setLoading(true);

            const payload = {
                size: sizeInput.value.trim(),
                chord: chordInput.value.trim(),
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
                showStatus(result.message || 'Saved successfully.');
            } catch (error) {
                showStatus(error.message, 'error');
            } finally {
                setLoading(false);
            }
        });

        cancelEditButton.addEventListener('click', () => {
            resetForm();
            clearStatus();
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
                const confirmed = window.confirm(`Delete the ${item.size} chord entry?`);

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
                    showStatus(result.message || 'Deleted successfully.');
                } catch (error) {
                    showStatus(error.message, 'error');
                }
            }
        });

        renderTable();
    </script>
</body>
</html>
