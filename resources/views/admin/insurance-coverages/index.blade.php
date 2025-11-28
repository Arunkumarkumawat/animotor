<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insurance Management Dashboard - {{ settings('site_name') }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --ani-blue: #003c7e;
            --ani-blue-dark: #002856;
            --ani-blue-light: #f0f7ff;
            --blue: #1e40af;
            --purple: #7c3aed;
            --red: #dc2626;
            --teal: #14b8a6;
            --slate: #475569;
            --success: #16a34a;
            --success-light: #dcfce7;
            --warning: #f59e0b;
            --warning-light: #fef9c3;
            --danger: #dc2626;
            --danger-light: #fee2e2;
            --grey-50: #f9fafb;
            --grey-100: #f3f4f6;
            --grey-200: #e5e7eb;
            --grey-300: #d1d5db;
            --grey-400: #9ca3af;
            --grey-500: #6b7280;
            --grey-600: #4b5563;
            --grey-700: #374151;
            --grey-900: #111827;
            --white: #ffffff;
            --radius-sm: 8px;
            --radius-md: 12px;
            --radius-lg: 16px;
            --shadow-sm: 0 1px 3px rgba(0, 0, 0, 0.05);
            --shadow-md: 0 4px 12px rgba(0, 0, 0, 0.08);
            --shadow-lg: 0 10px 30px rgba(0, 0, 0, 0.12);
            --transition: all 0.3s ease;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            background: linear-gradient(135deg, #f0f7ff 0%, #e0effe 100%);
            color: var(--grey-900);
            line-height: 1.6;
            min-height: 100vh;
        }

        /* Dashboard Header */
        .dashboard-header {
            background: linear-gradient(135deg, var(--ani-blue) 0%, var(--ani-blue-dark) 100%);
            color: var(--white);
            padding: 24px 40px;
            box-shadow: var(--shadow-lg);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .header-content {
            max-width: 1400px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header-title {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .logo {
            width: 48px;
            height: 48px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: var(--radius-md);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            backdrop-filter: blur(10px);
        }

        .title-text h1 {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 4px;
        }

        .title-text p {
            font-size: 14px;
            opacity: 0.9;
        }

        .header-actions {
            display: flex;
            gap: 12px;
        }

        /* Main Container */
        .container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 40px 40px;
        }

        /* Stats Bar */
        .stats-bar {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 20px;
            margin-bottom: 32px;
        }

        .stat-card {
            background: var(--white);
            border-radius: var(--radius-lg);
            padding: 24px;
            box-shadow: var(--shadow-md);
            transition: var(--transition);
        }

        .stat-card:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-lg);
        }

        .stat-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 12px;
        }

        .stat-icon {
            width: 48px;
            height: 48px;
            border-radius: var(--radius-md);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
        }

        .stat-icon.blue {
            background: var(--ani-blue-light);
        }

        .stat-icon.green {
            background: var(--success-light);
        }

        .stat-icon.yellow {
            background: var(--warning-light);
        }

        .stat-icon.red {
            background: var(--danger-light);
        }

        .stat-value {
            font-size: 32px;
            font-weight: 800;
            color: var(--grey-900);
            line-height: 1;
            margin-bottom: 4px;
        }

        .stat-label {
            font-size: 14px;
            color: var(--grey-600);
            font-weight: 500;
        }

        /* Control Bar */
        .control-bar {
            background: var(--white);
            border-radius: var(--radius-lg);
            padding: 20px 24px;
            margin-bottom: 24px;
            box-shadow: var(--shadow-sm);
            display: flex;
            flex-wrap: wrap;
            gap: 16px;
            align-items: center;
            justify-content: space-between;
        }

        .search-box {
            flex: 1;
            min-width: 300px;
            position: relative;
        }

        .search-box input {
            width: 100%;
            padding: 12px 16px 12px 44px;
            border: 2px solid var(--grey-200);
            border-radius: var(--radius-sm);
            font-size: 14px;
            transition: var(--transition);
        }

        .search-box input:focus {
            outline: none;
            border-color: var(--ani-blue);
            box-shadow: 0 0 0 4px var(--ani-blue-light);
        }

        .search-icon {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--grey-400);
        }

        .filter-group {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
        }

        .filter-btn {
            padding: 10px 20px;
            border: 2px solid var(--grey-200);
            border-radius: var(--radius-sm);
            background: var(--white);
            color: var(--grey-700);
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
        }

        .filter-btn:hover {
            border-color: var(--ani-blue);
            color: var(--ani-blue);
        }

        .filter-btn.active {
            background: var(--ani-blue);
            color: var(--white);
            border-color: var(--ani-blue);
        }

        .sort-select {
            padding: 10px 16px;
            border: 2px solid var(--grey-200);
            border-radius: var(--radius-sm);
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            background: var(--white);
        }

        /* Insurance Grid */
        .insurance-grid {
            display: grid;
            gap: 24px;
        }

        /* Insurance Card */
        .insurance-card {
            background: var(--white);
            border-radius: var(--radius-lg);
            overflow: hidden;
            box-shadow: var(--shadow-md);
            transition: var(--transition);
        }

        .insurance-card:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
        }

        .card-header {
            padding: 24px 28px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            cursor: pointer;
            position: relative;
            overflow: hidden;
        }

        .card-header::before {
            content: '';
            position: absolute;
            inset: 0;
            opacity: 0.05;
            z-index: 0;
        }

        .card-header.full-protection {
            background: linear-gradient(135deg, var(--ani-blue) 0%, var(--ani-blue-dark) 100%);
            color: var(--white);
        }

        .card-header.cdw {
            background: linear-gradient(135deg, var(--blue) 0%, #1e3a8a 100%);
            color: var(--white);
        }

        .card-header.excess {
            background: linear-gradient(135deg, var(--purple) 0%, #6d28d9 100%);
            color: var(--white);
        }

        .card-header.theft {
            background: linear-gradient(135deg, var(--red) 0%, #b91c1c 100%);
            color: var(--white);
        }

        .card-header.addons {
            background: linear-gradient(135deg, var(--teal) 0%, #0d9488 100%);
            color: var(--white);
        }

        .card-header.basic {
            background: linear-gradient(135deg, var(--slate) 0%, #334155 100%);
            color: var(--white);
        }

        .card-left {
            display: flex;
            align-items: center;
            gap: 16px;
            flex: 1;
            position: relative;
            z-index: 1;
        }

        .card-icon {
            width: 56px;
            height: 56px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: var(--radius-md);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            backdrop-filter: blur(10px);
        }

        .card-info h3 {
            font-size: 20px;
            font-weight: 700;
            margin-bottom: 4px;
        }

        .card-info p {
            font-size: 13px;
            opacity: 0.9;
        }

        .card-right {
            display: flex;
            align-items: center;
            gap: 16px;
            position: relative;
            z-index: 1;
        }

        .status-badge {
            padding: 6px 14px;
            border-radius: 999px;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .status-badge.active {
            background: var(--success);
            color: var(--white);
        }

        .status-badge.expired {
            background: var(--danger);
            color: var(--white);
        }

        .status-badge.expiring {
            background: var(--warning);
            color: var(--grey-900);
        }

        .status-badge::before {
            content: '';
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: currentColor;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {

            0%,
            100% {
                opacity: 1;
            }

            50% {
                opacity: 0.5;
            }
        }

        .insurer-badge {
            padding: 8px 16px;
            background: rgba(255, 255, 255, 0.9);
            color: var(--grey-900);
            border-radius: var(--radius-sm);
            font-size: 12px;
            font-weight: 700;
            backdrop-filter: blur(10px);
        }

        .expand-icon {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            transition: var(--transition);
            backdrop-filter: blur(10px);
        }

        .expand-icon svg {
            width: 20px;
            height: 20px;
            stroke: currentColor;
            transition: var(--transition);
        }

        .insurance-card.collapsed .expand-icon svg {
            transform: rotate(180deg);
        }

        /* Card Body */
        .card-body {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .insurance-card:not(.collapsed) .card-body {
            max-height: 500px;
        }

        .card-content {
            padding: 28px;
            background: var(--grey-50);
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 24px;
        }

        .info-item {
            background: var(--white);
            padding: 16px;
            border-radius: var(--radius-sm);
            border-left: 4px solid var(--ani-blue);
        }

        .info-label {
            font-size: 12px;
            color: var(--grey-600);
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 6px;
        }

        .info-value {
            font-size: 16px;
            font-weight: 700;
            color: var(--grey-900);
        }

        .actions-row {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
        }

        /* Buttons */
        .btn {
            padding: 12px 24px;
            border-radius: var(--radius-sm);
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            border: 2px solid transparent;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            text-decoration: none;
        }

        .btn-primary {
            background: var(--ani-blue);
            color: var(--white);
        }

        .btn-primary:hover {
            background: var(--ani-blue-dark);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(0, 60, 126, 0.3);
        }

        .btn-secondary {
            background: var(--white);
            color: var(--grey-700);
            border-color: var(--grey-300);
        }

        .btn-secondary:hover {
            background: var(--grey-50);
            border-color: var(--grey-400);
        }

        .btn-success {
            background: var(--success);
            color: var(--white);
        }

        .btn-danger {
            background: var(--danger);
            color: var(--white);
        }

        .btn-small {
            padding: 8px 16px;
            font-size: 13px;
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 80px 20px;
            background: var(--white);
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-sm);
        }

        .empty-icon {
            width: 80px;
            height: 80px;
            margin: 0 auto 24px;
            background: var(--grey-100);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 40px;
        }

        .empty-state h3 {
            font-size: 20px;
            margin-bottom: 8px;
            color: var(--grey-900);
        }

        .empty-state p {
            color: var(--grey-600);
            margin-bottom: 24px;
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .container {
                padding: 30px 20px;
            }

            .dashboard-header {
                padding: 20px;
            }

            .stats-bar {
                grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            }
        }

        @media (max-width: 768px) {
            .header-content {
                flex-direction: column;
                gap: 16px;
                align-items: flex-start;
            }

            .control-bar {
                flex-direction: column;
                align-items: stretch;
            }

            .search-box {
                width: 100%;
            }

            .filter-group {
                justify-content: center;
            }

            .card-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 16px;
            }

            .card-right {
                width: 100%;
                justify-content: space-between;
            }

            .info-grid {
                grid-template-columns: 1fr;
            }

            .actions-row {
                flex-direction: column;
            }

            .btn {
                width: 100%;
                justify-content: center;
            }
        }

        /* Loading State */
        .loading {
            text-align: center;
            padding: 40px;
        }

        .spinner {
            width: 40px;
            height: 40px;
            border: 4px solid var(--grey-200);
            border-top-color: var(--ani-blue);
            border-radius: 50%;
            animation: spin 0.8s linear infinite;
            margin: 0 auto 16px;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }

        .dropdown {
            position: relative;
            display: inline-block;
            margin-right: 10px;
        }

        .dropdown-toggle {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .dropdown-arrow {
            margin-left: 4px;
            transition: transform 0.2s ease;
        }

        .dropdown-menu {
            display: none;
            position: absolute;
            background-color: white;
            min-width: 220px;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            padding: 8px 0;
            z-index: 1000;
            margin-top: 4px;
            border: 1px solid rgba(0, 0, 0, 0.1);
        }

        .dropdown:hover .dropdown-menu {
            display: block;
        }

        .dropdown-item {
            display: block;
            padding: 8px 16px;
            color: #333;
            text-decoration: none;
            transition: background-color 0.2s;
        }

        .dropdown-item:hover {
            background-color: #f8f9fa;
            color: #0d6efd;
        }

        /* Make sure the dropdown works on mobile */
        @media (max-width: 768px) {
            .dropdown-menu {
                position: static;
                box-shadow: none;
                border: none;
                padding: 0;
            }
        }
    </style>
</head>

<body>
    <!-- Dashboard Header -->
    <div class="dashboard-header">
        <div class="header-content">
            <div class="header-title">
                <div class="logo">🏢</div>
                <div class="title-text">
                    <h1>Insurance Management Dashboard</h1>
                    <p>{{ settings('site_name') }} Fleet Insurance Portfolio</p>
                </div>
            </div>
            <div class="header-actions">
                <div class="dropdown">
                    <button class="btn btn-secondary btn-small dropdown-toggle" type="button" id="policyDropdown"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                        Add New Policy
                        <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            stroke-width="2" class="dropdown-arrow">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="policyDropdown">
                        <li><a class="dropdown-item"
                                href="{{ route('admin.insurance-coverages.create', ['type' => 'full_protection']) }}">Full
                                Protection</a></li>
                        <li><a class="dropdown-item"
                                href="{{ route('admin.insurance-coverages.create', ['type' => 'cdw']) }}">Collision
                                Damage Waiver (CDW)</a></li>
                        <li><a class="dropdown-item"
                                href="{{ route('admin.insurance-coverages.create', ['type' => 'excess_protection']) }}">Excess
                                Protection</a></li>
                        <li><a class="dropdown-item"
                                href="{{ route('admin.insurance-coverages.create', ['type' => 'theft_protection']) }}">Theft
                                Protection</a></li>
                        <li><a class="dropdown-item"
                                href="{{ route('admin.insurance-coverages.create', ['type' => 'addons']) }}">Addons</a></li>
                    </ul>
                </div>
                {{-- <button class="btn btn-primary btn-small">
                    <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                    </svg>
                    Export All
                </button> --}}
            </div>
        </div>
    </div>

    <!-- Main Container -->
    <div class="container">
        <!-- Stats Bar -->
        <div class="stats-bar">
            <div class="stat-card">
                <div class="stat-header">
                    <div class="stat-icon blue">📊</div>
                </div>
                <div class="stat-value" id="totalPolicies">{{ $totalPolicies }}</div>
                <div class="stat-label">Total Insurance Policies</div>
            </div>
            <div class="stat-card">
                <div class="stat-header">
                    <div class="stat-icon green">✅</div>
                </div>
                <div class="stat-value" id="activePolicies">{{ $activePolicies }}</div>
                <div class="stat-label">Active Policies</div>
            </div>
            <div class="stat-card">
                <div class="stat-header">
                    <div class="stat-icon yellow">⏰</div>
                </div>
                <div class="stat-value" id="expiringPolicies">{{ $expiringSoonPolicies }}</div>
                <div class="stat-label">Expiring Soon</div>
            </div>
            <div class="stat-card">
                <div class="stat-header">
                    <div class="stat-icon red">❌</div>
                </div>
                <div class="stat-value" id="expiredPolicies">{{ $expiredPolicies }}</div>
                <div class="stat-label">Expired Policies</div>
            </div>
        </div>

        <!-- Control Bar -->
        <div class="control-bar">
            <div class="search-box">
                <svg class="search-icon" width="20" height="20" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
                <input type="text" id="searchInput" placeholder="Search insurance policies...">
            </div>
            <div class="filter-group">
                <button class="filter-btn active" data-filter="all">All</button>
                <button class="filter-btn" data-filter="active">Active</button>
                <button class="filter-btn" data-filter="expiring">Expiring</button>
                <button class="filter-btn" data-filter="expired">Expired</button>
            </div>
            <select class="sort-select" id="sortSelect">
                <option value="name">Sort by Name</option>
                <option value="status">Sort by Status</option>
                <option value="expiry">Sort by Expiry Date</option>
            </select>
        </div>

        <!-- Insurance Grid -->
        <div class="insurance-grid" id="insuranceGrid">
            <!-- Full Protection -->
            @foreach ($policies as $policy)
                @php
                    $isExpired = $policy->policy_end_date < now();
                @endphp
                <div class="insurance-card" data-status="{{ $isExpired ? 'expired' : 'active' }}"
                    data-name="{{ $policy->policy_type }}" data-expiry="{{ $policy->policy_end_date }}">
                    <div class="card-header full-protection" onclick="toggleCard(this)">
                        <div class="card-left">
                            <div class="card-icon">🌟</div>
                            <div class="card-info">
                                <h3>{{ $policy->policy_type }}</h3>
                                <p>Comprehensive zero-excess coverage</p>
                            </div>
                        </div>
                        <div class="card-right">
                            <span
                                class="status-badge {{ $isExpired ? 'expired' : 'active' }}">{{ $isExpired ? 'Expired' : 'Active' }}</span>
                            <span class="insurer-badge">{{ $policy->insurer_name }}</span>
                            <div class="expand-icon">
                                <svg fill="none" viewBox="0 0 24 24" stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card-content">
                            <div class="info-grid">
                                <div class="info-item">
                                    <div class="info-label">Policy Number</div>
                                    <div class="info-value">{{ $policy->policy_number }}</div>
                                </div>
                                <div class="info-item">
                                    <div class="info-label">Expiry Date</div>
                                    <div class="info-value">{{ $policy->policy_end_date }}</div>
                                </div>
                                <div class="info-item">
                                    <div class="info-label">Excess Amount</div>
                                    <div class="info-value">{{ settings('currency_symbol', '$') }}
                                        {{ $policy->excess_amount }}</div>
                                </div>
                                <div class="info-item">
                                    <div class="info-label">Daily Rate</div>
                                    <div class="info-value">{{ settings('currency_symbol', '$') }}
                                        {{ $policy->daily_rate }}</div>
                                </div>
                            </div>
                            <div class="actions-row">
                                @if ($isExpired)
                                    <a class="btn btn-primary"
                                        href="{{ route('admin.insurance-coverages.edit', $policy->id) }}">Renew
                                        Policy</a>
                                @else
                                    <a class="btn btn-primary"
                                        href="{{ route('admin.insurance-coverages.edit', $policy->id) }}">Edit
                                        Policy</a>
                                @endif
                                {{-- <a class="btn btn-secondary"
                                    href="{{ route('admin.insurance-coverages.show', $policy->id) }}">View Details</a> --}}
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script>
        // Toggle Card Expansion
        function toggleCard(header) {
            const card = header.closest('.insurance-card');
            card.classList.toggle('collapsed');
        }

        // Search Functionality
        const searchInput = document.getElementById('searchInput');
        searchInput.addEventListener('input', filterCards);

        // Filter Buttons
        const filterButtons = document.querySelectorAll('.filter-btn');
        filterButtons.forEach(btn => {
            btn.addEventListener('click', () => {
                filterButtons.forEach(b => b.classList.remove('active'));
                btn.classList.add('active');
                filterCards();
            });
        });

        // Sort Functionality
        const sortSelect = document.getElementById('sortSelect');
        sortSelect.addEventListener('change', sortCards);

        function filterCards() {
            const searchTerm = searchInput.value.toLowerCase();
            const activeFilter = document.querySelector('.filter-btn.active').dataset.filter;
            const cards = document.querySelectorAll('.insurance-card');

            let visibleCount = 0;

            cards.forEach(card => {
                const name = card.dataset.name.toLowerCase();
                const status = card.dataset.status;

                const matchesSearch = name.includes(searchTerm);
                const matchesFilter = activeFilter === 'all' || status === activeFilter;

                if (matchesSearch && matchesFilter) {
                    card.style.display = 'block';
                    visibleCount++;
                } else {
                    card.style.display = 'none';
                }
            });

            // Show/hide empty state
            if (visibleCount === 0) {
                showEmptyState();
            } else {
                hideEmptyState();
            }
        }

        function sortCards() {
            const sortBy = sortSelect.value;
            const grid = document.getElementById('insuranceGrid');
            const cards = Array.from(document.querySelectorAll('.insurance-card'));

            cards.sort((a, b) => {
                if (sortBy === 'name') {
                    return a.dataset.name.localeCompare(b.dataset.name);
                } else if (sortBy === 'status') {
                    const statusOrder = {
                        active: 1,
                        expiring: 2,
                        expired: 3
                    };
                    return statusOrder[a.dataset.status] - statusOrder[b.dataset.status];
                } else if (sortBy === 'expiry') {
                    return new Date(a.dataset.expiry) - new Date(b.dataset.expiry);
                }
            });

            cards.forEach(card => grid.appendChild(card));
        }

        function showEmptyState() {
            const grid = document.getElementById('insuranceGrid');
            if (!document.querySelector('.empty-state')) {
                const emptyState = document.createElement('div');
                emptyState.className = 'empty-state';
                emptyState.innerHTML = `
                    <div class="empty-icon">🔍</div>
                    <h3>No Policies Found</h3>
                    <p>Try adjusting your search or filter criteria</p>
                    <button class="btn btn-primary" onclick="resetFilters()">Reset Filters</button>
                `;
                grid.appendChild(emptyState);
            }
        }

        function hideEmptyState() {
            const emptyState = document.querySelector('.empty-state');
            if (emptyState) {
                emptyState.remove();
            }
        }

        function resetFilters() {
            searchInput.value = '';
            filterButtons[0].click();
            sortSelect.value = 'name';
            filterCards();
        }

        // Initialize - collapse all cards
        document.addEventListener('DOMContentLoaded', () => {
            document.querySelectorAll('.insurance-card').forEach(card => {
                card.classList.add('collapsed');
            });
        });
    </script>
</body>

</html>
