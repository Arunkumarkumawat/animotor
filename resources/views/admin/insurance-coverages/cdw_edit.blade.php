<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CDW Insurance - {{ config('app.name') }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --ani-blue: #003c7e;
            --ani-blue-dark: #002856;
            --ani-blue-light: #f0f7ff;
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
            --spacing: 20px;
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
            background: linear-gradient(135deg, #f5f7fa 0%, #e8eef5 100%);
            color: var(--grey-900);
            line-height: 1.6;
            padding: 40px 20px;
            min-height: 100vh;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        /* ========================================
           INSURANCE PANEL CARD
           ======================================== */
        .insurance-panel {
            background: var(--white);
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-lg);
            overflow: hidden;
            margin-bottom: 30px;
            transition: var(--transition);
        }

        .insurance-panel:hover {
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
        }

        /* Panel Header */
        .panel-header {
            background: linear-gradient(135deg, #1e40af 0%, #1e3a8a 100%);
            color: var(--white);
            padding: 24px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            cursor: pointer;
            user-select: none;
            transition: var(--transition);
        }

        .panel-header:hover {
            background: linear-gradient(135deg, #1e3a8a 0%, #1e293b 100%);
        }

        .panel-header-left {
            display: flex;
            align-items: center;
            gap: 20px;
            flex: 1;
        }

        .panel-icon {
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

        .panel-title-group {
            flex: 1;
        }

        .panel-title {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 4px;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .panel-subtitle {
            font-size: 14px;
            opacity: 0.9;
            font-weight: 400;
        }

        .panel-header-right {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        /* Status Badge */
        .status-badge {
            padding: 8px 16px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 600;
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
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: currentColor;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.5; }
        }

        /* Insurer Logo Thumbnail */
        .insurer-logo-thumb {
            width: 80px;
            height: 56px;
            background: var(--white);
            border-radius: var(--radius-sm);
            padding: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .insurer-logo-thumb img {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
        }

        /* Expand/Collapse Icon */
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
            stroke: var(--white);
            transition: var(--transition);
        }

        .insurance-panel.collapsed .expand-icon svg {
            transform: rotate(180deg);
        }

        /* Panel Content */
        .panel-content {
            padding: 0;
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .insurance-panel:not(.collapsed) .panel-content {
            max-height: 10000px;
            padding: 30px;
        }

        /* ========================================
           SECTION STYLES
           ======================================== */
        .section {
            background: var(--grey-50);
            border: 1px solid var(--grey-200);
            border-radius: var(--radius-md);
            padding: 24px;
            margin-bottom: 24px;
            transition: var(--transition);
        }

        .section:hover {
            box-shadow: var(--shadow-sm);
            border-color: var(--grey-300);
        }

        .section-header {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 20px;
            padding-bottom: 16px;
            border-bottom: 2px solid var(--grey-200);
        }

        .section-icon {
            width: 40px;
            height: 40px;
            border-radius: var(--radius-sm);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            flex-shrink: 0;
        }

        .section-icon.blue { background: var(--ani-blue-light); color: var(--ani-blue); }
        .section-icon.green { background: var(--success-light); color: var(--success); }
        .section-icon.yellow { background: var(--warning-light); color: var(--warning); }
        .section-icon.red { background: var(--danger-light); color: var(--danger); }

        .section-title {
            font-size: 18px;
            font-weight: 700;
            color: var(--grey-900);
            flex: 1;
        }

        .section-hint {
            font-size: 13px;
            color: var(--grey-500);
            margin-top: 4px;
        }

        /* ========================================
           FORM FIELDS
           ======================================== */
        .form-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 20px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .form-label {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 14px;
            font-weight: 600;
            color: var(--grey-700);
        }

        .info-icon {
            width: 18px;
            height: 18px;
            background: var(--grey-200);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 11px;
            font-weight: 700;
            color: var(--grey-600);
            cursor: help;
            position: relative;
        }

        .info-icon:hover::after {
            content: attr(data-tooltip);
            position: absolute;
            bottom: calc(100% + 8px);
            left: 50%;
            transform: translateX(-50%);
            background: var(--grey-900);
            color: var(--white);
            padding: 8px 12px;
            border-radius: var(--radius-sm);
            font-size: 12px;
            font-weight: 400;
            white-space: nowrap;
            z-index: 100;
            box-shadow: var(--shadow-md);
        }

        .form-input,
        .form-select,
        .form-textarea {
            width: 100%;
            padding: 12px 16px;
            border: 2px solid var(--grey-200);
            border-radius: var(--radius-sm);
            font-size: 14px;
            font-family: inherit;
            background: var(--white);
            transition: var(--transition);
        }

        .form-input:focus,
        .form-select:focus,
        .form-textarea:focus {
            outline: none;
            border-color: var(--ani-blue);
            box-shadow: 0 0 0 4px var(--ani-blue-light);
        }

        .form-input::placeholder,
        .form-textarea::placeholder {
            color: var(--grey-400);
        }

        .form-textarea {
            resize: vertical;
            min-height: 120px;
            line-height: 1.6;
        }

        .form-select[multiple] {
            min-height: 120px;
        }

        /* ========================================
           FILE UPLOAD
           ======================================== */
        .file-upload-area {
            border: 2px dashed var(--grey-300);
            border-radius: var(--radius-md);
            padding: 32px;
            text-align: center;
            background: var(--white);
            transition: var(--transition);
            cursor: pointer;
            position: relative;
        }

        .file-upload-area:hover {
            border-color: var(--ani-blue);
            background: var(--ani-blue-light);
        }

        .file-upload-area input[type="file"] {
            position: absolute;
            inset: 0;
            opacity: 0;
            cursor: pointer;
        }

        .upload-icon {
            width: 64px;
            height: 64px;
            margin: 0 auto 16px;
            background: var(--grey-100);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
        }

        .upload-text {
            font-weight: 600;
            color: var(--grey-900);
            margin-bottom: 4px;
        }

        .upload-hint {
            font-size: 13px;
            color: var(--grey-500);
        }

        .file-preview {
            display: none;
            margin-top: 16px;
            padding: 16px;
            background: var(--grey-50);
            border-radius: var(--radius-sm);
        }

        .file-preview.active {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .file-preview-icon {
            width: 48px;
            height: 48px;
            background: var(--white);
            border-radius: var(--radius-sm);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
        }

        .file-preview-info {
            flex: 1;
        }

        .file-preview-name {
            font-weight: 600;
            font-size: 14px;
            color: var(--grey-900);
        }

        .file-preview-size {
            font-size: 12px;
            color: var(--grey-500);
        }

        .file-preview-actions {
            display: flex;
            gap: 8px;
        }

        /* ========================================
           COVERAGE MATRIX - 2 COLUMN CARDS
           ======================================== */
        .coverage-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 16px;
        }

        .coverage-card {
            background: var(--white);
            border: 2px solid var(--grey-200);
            border-radius: var(--radius-md);
            padding: 18px;
            transition: var(--transition);
        }

        .coverage-card:hover {
            border-color: var(--ani-blue);
            box-shadow: var(--shadow-sm);
        }

        .coverage-card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 12px;
        }

        .coverage-name {
            font-weight: 600;
            font-size: 15px;
            color: var(--grey-900);
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .coverage-name::before {
            content: '';
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: var(--grey-300);
        }

        /* 3-State Toggle */
        .toggle-3state {
            display: flex;
            gap: 6px;
        }

        .toggle-option {
            padding: 6px 12px;
            border-radius: var(--radius-sm);
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            opacity: 0.4;
            user-select: none;
            border: 2px solid transparent;
        }

        .toggle-option:hover {
            opacity: 0.7;
        }

        .toggle-option.active {
            opacity: 1;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
            border-color: currentColor;
        }

        .toggle-option.covered {
            background: var(--success-light);
            color: var(--success);
        }

        .toggle-option.partial {
            background: var(--warning-light);
            color: var(--warning);
        }

        .toggle-option.not-covered {
            background: var(--danger-light);
            color: var(--danger);
        }

        .partial-notes {
            display: none;
            margin-top: 10px;
        }

        .partial-notes.active {
            display: block;
        }

        /* ========================================
           FINANCIAL FIELDS
           ======================================== */
        .financial-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 20px;
        }

        .financial-field {
            background: var(--white);
            border: 2px solid var(--grey-200);
            border-radius: var(--radius-md);
            padding: 20px;
            transition: var(--transition);
        }

        .financial-field:hover {
            border-color: var(--ani-blue);
        }

        .financial-label {
            font-size: 13px;
            color: var(--grey-600);
            margin-bottom: 8px;
            font-weight: 500;
        }

        .financial-value {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .currency-symbol {
            font-size: 20px;
            font-weight: 700;
            color: var(--grey-400);
        }

        .financial-input {
            flex: 1;
            font-size: 28px;
            font-weight: 700;
            border: none;
            background: transparent;
            color: var(--grey-900);
            padding: 0;
        }

        .financial-input:focus {
            outline: none;
        }

        .no-excess-badge {
            background: var(--success);
            color: var(--white);
            padding: 4px 12px;
            border-radius: 999px;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        /* ========================================
           DOCUMENT UPLOADS
           ======================================== */
        .documents-list {
            display: grid;
            gap: 16px;
        }

        .document-item {
            background: var(--white);
            border: 2px solid var(--grey-200);
            border-radius: var(--radius-md);
            padding: 20px;
            display: flex;
            align-items: center;
            gap: 16px;
            transition: var(--transition);
        }

        .document-item:hover {
            border-color: var(--ani-blue);
        }

        .document-icon {
            width: 48px;
            height: 48px;
            background: var(--grey-100);
            border-radius: var(--radius-sm);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            flex-shrink: 0;
        }

        .document-info {
            flex: 1;
        }

        .document-name {
            font-weight: 600;
            font-size: 15px;
            color: var(--grey-900);
            margin-bottom: 4px;
        }

        .document-status {
            font-size: 13px;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .status-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
        }

        .status-dot.uploaded { background: var(--success); }
        .status-dot.missing { background: var(--danger); }
        .status-dot.expiring { background: var(--warning); }

        .document-actions {
            display: flex;
            gap: 8px;
        }

        /* ========================================
           TABS
           ======================================== */
        .tabs-nav {
            display: flex;
            gap: 4px;
            border-bottom: 2px solid var(--grey-200);
            margin-bottom: 20px;
        }

        .tab-button {
            padding: 12px 20px;
            background: transparent;
            border: none;
            border-bottom: 3px solid transparent;
            font-size: 14px;
            font-weight: 600;
            color: var(--grey-600);
            cursor: pointer;
            transition: var(--transition);
            position: relative;
            bottom: -2px;
        }

        .tab-button:hover {
            color: var(--ani-blue);
        }

        .tab-button.active {
            color: var(--ani-blue);
            border-bottom-color: var(--ani-blue);
        }

        .tab-content {
            display: none;
        }

        .tab-content.active {
            display: block;
        }

        /* ========================================
           BUTTONS
           ======================================== */
        .button-group {
            display: flex;
            justify-content: space-between;
            gap: 16px;
            margin-top: 32px;
            padding-top: 32px;
            border-top: 2px solid var(--grey-200);
        }

        .btn {
            padding: 14px 28px;
            border-radius: var(--radius-sm);
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            border: 2px solid transparent;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-primary {
            background: var(--ani-blue);
            color: var(--white);
        }

        .btn-primary:hover:not(:disabled) {
            background: var(--ani-blue-dark);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(0, 60, 126, 0.3);
        }

        .btn-secondary {
            background: var(--white);
            color: var(--grey-700);
            border-color: var(--grey-300);
        }

        .btn-secondary:hover:not(:disabled) {
            background: var(--grey-50);
            border-color: var(--grey-400);
        }

        .btn-small {
            padding: 8px 16px;
            font-size: 13px;
        }

        .btn-danger {
            background: var(--danger);
            color: var(--white);
        }

        .btn-danger:hover:not(:disabled) {
            background: #b91c1c;
        }

        .btn:disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }

        /* ========================================
           CHECKLIST
           ======================================== */
        .checklist {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .checklist-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px;
            background: var(--white);
            border-radius: var(--radius-sm);
            transition: var(--transition);
        }

        .checklist-item:hover {
            background: var(--grey-50);
        }

        .checklist-item input[type="checkbox"] {
            width: 20px;
            height: 20px;
            cursor: pointer;
        }

        .checklist-item label {
            flex: 1;
            cursor: pointer;
            font-size: 14px;
        }

        /* ========================================
           RESPONSIVE
           ======================================== */
        @media (max-width: 768px) {
            body {
                padding: 20px 16px;
            }

            .panel-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 16px;
            }

            .panel-header-right {
                width: 100%;
                justify-content: space-between;
            }

            .insurance-panel:not(.collapsed) .panel-content {
                padding: 20px;
            }

            .form-grid,
            .coverage-grid,
            .financial-grid {
                grid-template-columns: 1fr;
            }

            .button-group {
                flex-direction: column;
            }

            .toggle-3state {
                flex-wrap: wrap;
            }
        }

        /* ========================================
           UTILITY CLASSES
           ======================================== */
        .mt-2 { margin-top: 16px; }
        .mb-2 { margin-bottom: 16px; }
        .text-muted { color: var(--grey-500); }
        .text-small { font-size: 13px; }
        .flex { display: flex; }
        .gap-2 { gap: 16px; }
        .items-center { align-items: center; }
        .d-none {
            display: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- CDW Insurance Panel -->
        <form action="{{ route('admin.insurance-coverages.update', $policy->id) }}" method="POST" class="insurance-panel" id="cdwPanel" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" name="policy_type" value="CDW">
            <input type="hidden" name="status" id="policyStatus" value="draft">
            
            <!-- Panel Header -->
            <div class="panel-header">
                <div class="panel-header-left">
                    <div class="panel-icon">🚗</div>
                    <div class="panel-title-group">
                        <div class="panel-title">
                            CDW – Collision Damage Waiver
                        </div>
                        <div class="panel-subtitle">
                            Protects rental vehicle against collision damage (subject to excess & terms)
                        </div>
                    </div>
                </div>
            </div>

            <!-- Panel Content -->
            <div class="panel-content">
                <!-- Section 1: Basic Details -->
                <div class="section">
                    <div class="section-header">
                        <div class="section-icon blue">📋</div>
                        <div>
                            <div class="section-title">Basic Details</div>
                            <div class="section-hint">CDW policy information and coverage period</div>
                        </div>
                    </div>
                    <div class="form-grid">
                        <div class="form-group">
                            <label class="form-label">
                                Policy Number
                                <span class="info-icon" data-tooltip="Unique policy identifier">i</span>
                            </label>
                            <input type="text" class="form-input" placeholder="e.g., FP-2025-000123" value="{{ $policy->policy_number }}" name="policy_number" required>
                            @error('policy_number')
                                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label">
                                Insurer Name
                                <span class="info-icon" data-tooltip="Insurance provider company">i</span>
                            </label>
                            <input type="text" class="form-input" placeholder="e.g., RSA Insurance" value="{{ $policy->insurer_name }}" name="insurer_name" required>
                            @error('insurer_name')
                                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label">
                                Policy Start Date
                                <span class="info-icon" data-tooltip="Coverage begins on this date">i</span>
                            </label>
                            <input type="date" class="form-input" value="{{ $policy->policy_start_date }}" name="policy_start_date" required>
                            @error('policy_start_date')
                                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label">
                                Policy Expiry Date
                                <span class="info-icon" data-tooltip="Coverage ends on this date">i</span>
                            </label>
                            <input type="date" class="form-input" value="{{ $policy->policy_end_date }}" name="policy_end_date" required>
                            @error('policy_end_date')
                                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                        @php
                            $vehicle_classes = json_decode($policy->vehicle_classes ?? '[]', true);
                        @endphp
                        <div class="form-group">
                            <label class="form-label">
                                Vehicle Class Applicability
                                <span class="info-icon" data-tooltip="Select all applicable vehicle categories">i</span>
                            </label>
                            <div class="form-checkbox-group">
                                <label class="form-checkbox">
                                    <input type="checkbox" name="vehicle_classes[]" value="compact" {{ in_array('compact', $vehicle_classes) ? 'checked' : '' }}>
                                    Compact
                                </label><br>
                                <label class="form-checkbox">
                                    <input type="checkbox" name="vehicle_classes[]" value="suv" {{ in_array('suv', $vehicle_classes) ? 'checked' : '' }}>
                                    SUV
                                </label><br>
                                <label class="form-checkbox">
                                    <input type="checkbox" name="vehicle_classes[]" value="luxury"{{ in_array('luxury', $vehicle_classes) ? 'checked' : '' }}>
                                    Luxury
                                </label><br>
                                <label class="form-checkbox">
                                    <input type="checkbox" name="vehicle_classes[]" value="ev" {{ in_array('ev', $vehicle_classes) ? 'checked' : '' }}>
                                    EV / Hybrid
                                </label><br>
                                <label class="form-checkbox">
                                    <input type="checkbox" name="vehicle_classes[]" value="mpv" {{ in_array('mpv', $vehicle_classes) ? 'checked' : '' }}>
                                    MPV
                                </label><br>
                                <label class="form-checkbox">
                                    <input type="checkbox" name="vehicle_classes[]" value="economy" {{ in_array('economy', $vehicle_classes) ? 'checked' : '' }}>
                                    Economy
                                </label>
                            </div>
                            @error('vehicle_classes')
                                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Section 2: Insurer Logo -->
                <div class="section">
                    <div class="section-header">
                        <div class="section-icon blue">🏢</div>
                        <div>
                            <div class="section-title">Insurer Logo</div>
                            <div class="section-hint">Upload official company logo (PNG/JPG only)</div>
                        </div>
                    </div>
                    <div class="file-upload-area d-none" xrole="logoUpload">
                        <input type="file" accept=".png,.jpg,.jpeg" name="insurer_logo" id="insurerLogo">
                        <div class="upload-icon">📷</div>
                        <div class="upload-text">Click to upload or drag and drop</div>
                        <div class="upload-hint">PNG or JPG (max 2MB)</div>
                    </div>
                    @error('insurer_logo')
                        <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                    @enderror
                    <div class="file-preview active" id="logoPreview">
                        <div class="file-preview-icon">
                            @if($policy->insurer_logo)
                                <img src="{{ asset('storage/' . $policy->insurer_logo) }}" alt="Insurer Logo" style="width:100%; height: auto;">
                            @else
                                🖼️
                            @endif
                        </div>
                        <div class="file-preview-info">
                            <div class="file-preview-name" xrole="file-name">File Uploaded</div>
                            <div class="file-preview-size" xrole="file-size"></div>
                        </div>
                        <div class="file-preview-actions">
                            <button type="button" class="btn btn-small btn-secondary" onclick="replaceLogo()">Replace</button>
                            <button type="button" class="btn btn-small btn-danger" onclick="deleteLogo()">Delete</button>
                        </div>
                    </div>
                </div>

                <!-- Section 3: CDW Coverage Matrix (What IS Covered) -->
                <div class="section">
                    <div class="section-header">
                        <div class="section-icon green">✅</div>
                        <div>
                            <div class="section-title">CDW Coverage Matrix - What IS Covered</div>
                            <div class="section-hint">Collision Damage Waiver coverage items</div>
                        </div>
                    </div>
                    @php
                        $coverageMatrix = json_decode($policy->coverage_matrix ?? '[]', true);
                    @endphp
                    <div class="coverage-grid">
                        <!-- Coverage Item 1: Collision Damage -->
                        <div class="coverage-card">
                            <div class="coverage-card-header">
                                <input type="hidden" name="coverage_matrix[0][name]" value="Collision Damage">
                                <input type="hidden" name="coverage_matrix[0][status]" class="coverage-item-status" value="{{ isset($coverageMatrix[0]['status']) ? $coverageMatrix[0]['status'] : 'not' }}">
                                <div class="coverage-name">Collision Damage</div>
                                <div class="toggle-3state">
                                    <span class="toggle-option covered {{ isset($coverageMatrix[0]['status']) && $coverageMatrix[0]['status'] === 'covered' ? 'active' : '' }}" onclick="selectToggle(this, 'covered')">Covered</span>
                                    <span class="toggle-option partial {{ isset($coverageMatrix[0]['status']) && $coverageMatrix[0]['status'] === 'partial' ? 'active' : '' }}" onclick="selectToggle(this, 'partial')">Partial</span>
                                    <span class="toggle-option not-covered {{ isset($coverageMatrix[0]['status']) && $coverageMatrix[0]['status'] === 'not' ? 'active' : '' }}" onclick="selectToggle(this, 'not')">Not</span>
                                </div>
                            </div>
                            <div class="partial-notes {{ isset($coverageMatrix[0]['status']) && $coverageMatrix[0]['status'] === 'partial' ? 'active' : '' }}">
                                <input type="text" class="form-input" name="coverage_matrix[0][partial_notes]" placeholder="e.g., Covered subject to excess" value="{{ isset($coverageMatrix[0]['partial_notes']) ? $coverageMatrix[0]['partial_notes'] : '' }}">
                            </div>
                        </div>

                        <!-- Coverage Item 2: Single Vehicle Accident -->
                        <div class="coverage-card">
                            <div class="coverage-card-header">
                                <div class="coverage-name">Single Vehicle Accident</div>
                                <input type="hidden" name="coverage_matrix[1][name]" value="Single Vehicle Accident">
                                <input type="hidden" name="coverage_matrix[1][status]" class="coverage-item-status" value="{{ isset($coverageMatrix[1]['status']) ? $coverageMatrix[1]['status'] : 'not' }}">
                                <div class="toggle-3state">
                                    <span class="toggle-option covered {{ isset($coverageMatrix[1]['status']) && $coverageMatrix[1]['status'] === 'covered' ? 'active' : '' }}" onclick="selectToggle(this, 'covered')">Covered</span>
                                    <span class="toggle-option partial {{ isset($coverageMatrix[1]['status']) && $coverageMatrix[1]['status'] === 'partial' ? 'active' : '' }}" onclick="selectToggle(this, 'partial')">Partial</span>
                                    <span class="toggle-option not-covered {{ isset($coverageMatrix[1]['status']) && $coverageMatrix[1]['status'] === 'not' ? 'active' : '' }}" onclick="selectToggle(this, 'not')">Not</span>
                                </div>
                            </div>
                            <div class="partial-notes {{ isset($coverageMatrix[1]['status']) && $coverageMatrix[1]['status'] === 'partial' ? 'active' : '' }}">
                                <input type="text" class="form-input" name="coverage_matrix[1][partial_notes]" placeholder="e.g., Covered unless negligent" value="{{ isset($coverageMatrix[1]['partial_notes']) ? $coverageMatrix[1]['partial_notes'] : '' }}">
                            </div>
                        </div>

                        <!-- Coverage Item 3: Multi-Vehicle Accident -->
                        <div class="coverage-card">
                            <div class="coverage-card-header">
                                <input type="hidden" name="coverage_matrix[2][name]" value="Multi-Vehicle Accident">
                                <input type="hidden" name="coverage_matrix[2][status]" class="coverage-item-status" value="{{ isset($coverageMatrix[2]['status']) ? $coverageMatrix[2]['status'] : 'not' }}">
                                <div class="coverage-name">Multi-Vehicle Accident</div>
                                <div class="toggle-3state">
                                    <span class="toggle-option covered {{ isset($coverageMatrix[2]['status']) && $coverageMatrix[2]['status'] === 'covered' ? 'active' : '' }}" onclick="selectToggle(this, 'covered')">Covered</span>
                                    <span class="toggle-option partial {{ isset($coverageMatrix[2]['status']) && $coverageMatrix[2]['status'] === 'partial' ? 'active' : '' }}" onclick="selectToggle(this, 'partial')">Partial</span>
                                    <span class="toggle-option not-covered {{ isset($coverageMatrix[2]['status']) && $coverageMatrix[2]['status'] === 'not' ? 'active' : '' }}" onclick="selectToggle(this, 'not')">Not</span>
                                </div>
                            </div>
                            <div class="partial-notes {{ isset($coverageMatrix[2]['status']) && $coverageMatrix[2]['status'] === 'partial' ? 'active' : '' }}">
                                <input type="text" class="form-input" name="coverage_matrix[2][partial_notes]" placeholder="e.g., Third-party details required" value="{{ isset($coverageMatrix[2]['partial_notes']) ? $coverageMatrix[2]['partial_notes'] : '' }}">
                            </div>
                        </div>

                        <!-- Coverage Item 4: Third-Party Damage -->
                        <div class="coverage-card">
                            <div class="coverage-card-header">
                                <input type="hidden" name="coverage_matrix[3][name]" value="Third-Party Damage">
                                <input type="hidden" name="coverage_matrix[3][status]" class="coverage-item-status" value="{{ isset($coverageMatrix[3]['status']) ? $coverageMatrix[3]['status'] : 'not' }}">
                                <div class="coverage-name">Third-Party Damage</div>
                                <div class="toggle-3state">
                                    <span class="toggle-option covered {{ isset($coverageMatrix[3]['status']) && $coverageMatrix[3]['status'] === 'covered' ? 'active' : '' }}" onclick="selectToggle(this, 'covered')">Covered</span>
                                    <span class="toggle-option partial {{ isset($coverageMatrix[3]['status']) && $coverageMatrix[3]['status'] === 'partial' ? 'active' : '' }}" onclick="selectToggle(this, 'partial')">Partial</span>
                                    <span class="toggle-option not-covered {{ isset($coverageMatrix[3]['status']) && $coverageMatrix[3]['status'] === 'not' ? 'active' : '' }}" onclick="selectToggle(this, 'not')">Not</span>
                                </div>
                            </div>
                            <div class="partial-notes {{ isset($coverageMatrix[3]['status']) && $coverageMatrix[3]['status'] === 'partial' ? 'active' : '' }}">
                                <input type="text" class="form-input" name="coverage_matrix[3][partial_notes]" placeholder="As per Road Traffic Act" value="{{ isset($coverageMatrix[3]['partial_notes']) ? $coverageMatrix[3]['partial_notes'] : '' }}">
                            </div>
                        </div>

                        <!-- Coverage Item 5: Towing After Accident -->
                        <div class="coverage-card">
                            <div class="coverage-card-header">
                                <input type="hidden" name="coverage_matrix[4][name]" value="Towing After Accident">
                                <input type="hidden" name="coverage_matrix[4][status]" class="coverage-item-status" value="{{ isset($coverageMatrix[4]['status']) ? $coverageMatrix[4]['status'] : 'not' }}">
                                <div class="coverage-name">Towing After Accident</div>
                                <div class="toggle-3state">
                                    <span class="toggle-option covered {{ isset($coverageMatrix[4]['status']) && $coverageMatrix[4]['status'] === 'covered' ? 'active' : '' }}" onclick="selectToggle(this, 'covered')">Covered</span>
                                    <span class="toggle-option partial {{ isset($coverageMatrix[4]['status']) && $coverageMatrix[4]['status'] === 'partial' ? 'active' : '' }}" onclick="selectToggle(this, 'partial')">Partial</span>
                                    <span class="toggle-option not-covered {{ isset($coverageMatrix[4]['status']) && $coverageMatrix[4]['status'] === 'not' ? 'active' : '' }}" onclick="selectToggle(this, 'not')">Not</span>
                                </div>
                            </div>
                            <div class="partial-notes {{ isset($coverageMatrix[4]['status']) && $coverageMatrix[4]['status'] === 'partial' ? 'active' : '' }}"  style="display: {{ isset($coverageMatrix[4]['status']) && $coverageMatrix[4]['status'] === 'partial' ? 'block' : 'none' }}">
                                <input type="text" class="form-input" name="coverage_matrix[4][partial_notes]" placeholder="As per Road Traffic Act" value="{{ isset($coverageMatrix[4]['partial_notes']) ? $coverageMatrix[4]['partial_notes'] : '' }}">
                            </div>
                        </div>

                        <!-- Coverage Item 6: Glass / Windscreen -->
                        <div class="coverage-card">
                            <div class="coverage-card-header">
                                <input type="hidden" name="coverage_matrix[5][name]" value="Glass / Windscreen">
                                <input type="hidden" name="coverage_matrix[5][status]" class="coverage-item-status" value="{{ isset($coverageMatrix[5]['status']) ? $coverageMatrix[5]['status'] : 'not' }}">
                                <div class="coverage-name">Glass / Windscreen</div>
                                <div class="toggle-3state">
                                    <span class="toggle-option covered {{ isset($coverageMatrix[5]['status']) && $coverageMatrix[5]['status'] === 'covered' ? 'active' : '' }}" onclick="selectToggle(this, 'covered')">Covered</span>
                                    <span class="toggle-option partial {{ isset($coverageMatrix[5]['status']) && $coverageMatrix[5]['status'] === 'partial' ? 'active' : '' }}" onclick="selectToggle(this, 'partial')">Partial</span>
                                    <span class="toggle-option not-covered {{ isset($coverageMatrix[5]['status']) && $coverageMatrix[5]['status'] === 'not' ? 'active' : '' }}" onclick="selectToggle(this, 'not')">Not</span>
                                </div>
                            </div>
                            <div class="partial-notes {{ isset($coverageMatrix[5]['status']) && $coverageMatrix[5]['status'] === 'partial' ? 'active' : '' }}" style="display: {{ isset($coverageMatrix[5]['status']) && $coverageMatrix[5]['status'] === 'partial' ? 'block' : 'none' }}">
                                <input type="text" class="form-input" name="coverage_matrix[5][partial_notes]" placeholder="As per Road Traffic Act" value="{{ isset($coverageMatrix[5]['partial_notes']) ? $coverageMatrix[5]['partial_notes'] : '' }}">
                            </div>
                        </div>

                        <!-- Coverage Item 7: Bodywork Damage -->
                        <div class="coverage-card">
                            <div class="coverage-card-header">
                                <input type="hidden" name="coverage_matrix[6][name]" value="Bodywork Damage">
                                <input type="hidden" name="coverage_matrix[6][status]" class="coverage-item-status" value="{{ isset($coverageMatrix[6]['status']) ? $coverageMatrix[6]['status'] : 'not' }}">
                                <div class="coverage-name">Bodywork Damage</div>
                                <div class="toggle-3state">
                                    <span class="toggle-option covered {{ isset($coverageMatrix[6]['status']) && $coverageMatrix[6]['status'] === 'covered' ? 'active' : '' }}" onclick="selectToggle(this, 'covered')">Covered</span>
                                    <span class="toggle-option partial {{ isset($coverageMatrix[6]['status']) && $coverageMatrix[6]['status'] === 'partial' ? 'active' : '' }}" onclick="selectToggle(this, 'partial')">Partial</span>
                                    <span class="toggle-option not-covered {{ isset($coverageMatrix[6]['status']) && $coverageMatrix[6]['status'] === 'not' ? 'active' : '' }}" onclick="selectToggle(this, 'not')">Not</span>
                                </div>
                            </div>
                            <div class="partial-notes {{ isset($coverageMatrix[6]['status']) && $coverageMatrix[6]['status'] === 'partial' ? 'active' : '' }}" style="display: {{ isset($coverageMatrix[6]['status']) && $coverageMatrix[6]['status'] === 'partial' ? 'block' : 'none' }}">
                                <input type="text" class="form-input" name="coverage_matrix[6][partial_notes]" placeholder="Notes for partial coverage..." value="{{ isset($coverageMatrix[6]['partial_notes']) ? $coverageMatrix[6]['partial_notes'] : '' }}">
                            </div>
                        </div>

                        <!-- Coverage Item 8: Fire Damage -->
                        <div class="coverage-card">
                            <div class="coverage-card-header">
                                <input type="hidden" name="coverage_matrix[7][name]" value="Fire Damage">
                                <input type="hidden" name="coverage_matrix[7][status]" class="coverage-item-status" value="{{ isset($coverageMatrix[7]['status']) ? $coverageMatrix[7]['status'] : 'not' }}">
                                <div class="coverage-name">Fire Damage</div>
                                <div class="toggle-3state">
                                    <span class="toggle-option covered {{ isset($coverageMatrix[7]['status']) && $coverageMatrix[7]['status'] === 'covered' ? 'active' : '' }}" onclick="selectToggle(this, 'covered')">Covered</span>
                                    <span class="toggle-option partial {{ isset($coverageMatrix[7]['status']) && $coverageMatrix[7]['status'] === 'partial' ? 'active' : '' }}" onclick="selectToggle(this, 'partial')">Partial</span>
                                    <span class="toggle-option not-covered {{ isset($coverageMatrix[7]['status']) && $coverageMatrix[7]['status'] === 'not' ? 'active' : '' }}" onclick="selectToggle(this, 'not')">Not</span>
                                </div>
                            </div>
                            <div class="partial-notes {{ isset($coverageMatrix[7]['status']) && $coverageMatrix[7]['status'] === 'partial' ? 'active' : '' }}" style="display: {{ isset($coverageMatrix[7]['status']) && $coverageMatrix[7]['status'] === 'partial' ? 'block' : 'none' }}   ">
                                <input type="text" class="form-input" name="coverage_matrix[7][partial_notes]" placeholder="Subject to investigation" value="{{ isset($coverageMatrix[7]['partial_notes']) ? $coverageMatrix[7]['partial_notes'] : '' }}">
                            </div>
                        </div>

                        <!-- Coverage Item 9: Vandalism -->
                        <div class="coverage-card">
                            <div class="coverage-card-header">
                                <input type="hidden" name="coverage_matrix[8][name]" value="Vandalism">
                                <input type="hidden" name="coverage_matrix[8][status]" class="coverage-item-status" value="{{ isset($coverageMatrix[8]['status']) ? $coverageMatrix[8]['status'] : 'not' }}">
                                <div class="coverage-name">Vandalism</div>
                                <div class="toggle-3state">
                                    <span class="toggle-option covered {{ isset($coverageMatrix[8]['status']) && $coverageMatrix[8]['status'] === 'covered' ? 'active' : '' }}" onclick="selectToggle(this, 'covered')">Covered</span>
                                    <span class="toggle-option partial {{ isset($coverageMatrix[8]['status']) && $coverageMatrix[8]['status'] === 'partial' ? 'active' : '' }}" onclick="selectToggle(this, 'partial')">Partial</span>
                                    <span class="toggle-option not-covered {{ isset($coverageMatrix[8]['status']) && $coverageMatrix[8]['status'] === 'not' ? 'active' : '' }}" onclick="selectToggle(this, 'not')">Not</span>
                                </div>
                            </div>
                            <div class="partial-notes {{ isset($coverageMatrix[8]['status']) && $coverageMatrix[8]['status'] === 'partial' ? 'active' : '' }}" style="display: {{ isset($coverageMatrix[8]['status']) && $coverageMatrix[8]['status'] === 'partial' ? 'block' : 'none' }}   ">
                                <input type="text" class="form-input" name="coverage_matrix[8][partial_notes]" placeholder="Police report required" value="{{ isset($coverageMatrix[8]['partial_notes']) ? $coverageMatrix[8]['partial_notes'] : '' }}">
                            </div>
                        </div>

                        <!-- Coverage Item 10: Admin Fees -->
                        <div class="coverage-card">
                            <div class="coverage-card-header">
                                <input type="hidden" name="coverage_matrix[9][name]" value="Admin Fees (Claims Processing)">
                                <input type="hidden" name="coverage_matrix[9][status]" class="coverage-item-status" value="{{ isset($coverageMatrix[9]['status']) ? $coverageMatrix[9]['status'] : 'not' }}">
                                <div class="coverage-name">Admin Fees (Claims Processing)</div>
                                <div class="toggle-3state">
                                    <span class="toggle-option covered {{ isset($coverageMatrix[9]['status']) && $coverageMatrix[9]['status'] === 'covered' ? 'active' : '' }}" onclick="selectToggle(this, 'covered')">Covered</span>
                                    <span class="toggle-option partial {{ isset($coverageMatrix[9]['status']) && $coverageMatrix[9]['status'] === 'partial' ? 'active' : '' }}" onclick="selectToggle(this, 'partial')">Partial</span>
                                    <span class="toggle-option not-covered {{ isset($coverageMatrix[9]['status']) && $coverageMatrix[9]['status'] === 'not' ? 'active' : '' }}" onclick="selectToggle(this, 'not')">Not</span>
                                </div>
                            </div>
                            <div class="partial-notes {{ isset($coverageMatrix[9]['status']) && $coverageMatrix[9]['status'] === 'partial' ? 'active' : '' }}" style="display: {{ isset($coverageMatrix[9]['status']) && $coverageMatrix[9]['status'] === 'partial' ? 'block' : 'none' }}   ">
                                <input type="text" class="form-input" name="coverage_matrix[9][partial_notes]" value="{{ isset($coverageMatrix[9]['partial_notes']) ? $coverageMatrix[9]['partial_notes'] : '' }}">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Section 4: What is NOT Covered -->
                @php
                    $whatNotCovered = json_decode($policy->what_not_covered ?? '[]', true);
                @endphp
                <div class="section">
                    <div class="section-header">
                        <div class="section-icon red">❌</div>
                        <div>
                            <div class="section-title">What is NOT Covered</div>
                            <div class="section-hint">Explicit CDW exclusions</div>
                        </div>
                    </div>
                    <div class="checklist">
                        <div class="checklist-item">
                            <input type="checkbox" id="excl1" name="what_not_covered[]" value="Tyres / Wheels (separate product required)" {{ in_array('Tyres / Wheels (separate product required)', $whatNotCovered) ? 'checked' : '' }}>
                            <label for="excl1">Tyres / Wheels (separate product required)</label>
                        </div>
                        <div class="checklist-item">
                            <input type="checkbox" id="excl2" name="what_not_covered[]" value="Underbody damage" {{ in_array('Underbody damage', $whatNotCovered) ? 'checked' : '' }}>
                            <label for="excl2">Underbody damage</label>
                        </div>
                        <div class="checklist-item">
                            <input type="checkbox" id="excl3" name="what_not_covered[]" value="Roof damage" {{ in_array('Roof damage', $whatNotCovered) ? 'checked' : '' }}>
                            <label for="excl3">Roof damage</label>
                        </div>
                        <div class="checklist-item">
                            <input type="checkbox" id="excl4" name="what_not_covered[]" value="Interior damage (burns, tears)" {{ in_array('Interior damage (burns, tears)', $whatNotCovered) ? 'checked' : '' }}>
                            <label for="excl4">Interior damage (burns, tears)</label>
                        </div>
                        <div class="checklist-item">
                            <input type="checkbox" id="excl5" name="what_not_covered[]" value="Water ingress / flood damage" {{ in_array('Water ingress / flood damage', $whatNotCovered) ? 'checked' : '' }}>
                            <label for="excl5">Water ingress / flood damage</label>
                        </div>
                        <div class="checklist-item">
                            <input type="checkbox" id="excl6" name="what_not_covered[]" value="Negligence / reckless driving" {{ in_array('Negligence / reckless driving', $whatNotCovered) ? 'checked' : '' }}>
                            <label for="excl6">Negligence / reckless driving</label>
                        </div>
                        <div class="checklist-item">
                            <input type="checkbox" id="excl7" name="what_not_covered[]" value="Off-road usage" {{ in_array('Off-road usage', $whatNotCovered) ? 'checked' : '' }}>
                            <label for="excl7">Off-road usage</label>
                        </div>
                        <div class="checklist-item">
                            <input type="checkbox" id="excl8" name="what_not_covered[]" value="Driving under influence (DUI)" {{ in_array('Driving under influence (DUI)', $whatNotCovered) ? 'checked' : '' }}>
                            <label for="excl8">Driving under influence (DUI)</label>
                        </div>
                        <div class="checklist-item">
                            <input type="checkbox" id="excl9" name="what_not_covered[]" value="Keys and locks (separate coverage available)"     {{ in_array('Keys and locks (separate coverage available)', $whatNotCovered) ? 'checked' : '' }}>
                            <label for="excl9">Keys and locks (separate coverage available)</label>
                        </div>
                        <div class="checklist-item">
                            <input type="checkbox" id="excl10" name="what_not_covered[]" value="Theft (requires separate Theft Protection)" {{ in_array('Theft (requires separate Theft Protection)', $whatNotCovered) ? 'checked' : '' }}>
                            <label for="excl10">Theft (requires separate Theft Protection)</label>
                        </div>
                    </div>
                </div>

                <!-- Section 5: Key Exclusions -->
                <div class="section">
                    <div class="section-header">
                        <div class="section-icon yellow">⚠️</div>
                        <div>
                            <div class="section-title">Key Exclusions</div>
                            <div class="section-hint">These exclusions appear on customer certificates</div>
                        </div>
                    </div>
                    <textarea class="form-textarea" placeholder="CDW exclusions wording for certificates..." name="key_exclusions">{{ $policy->key_exclusions }}</textarea>
                </div>

                <!-- Section 6: Financial Limits -->
                <div class="section">
                    <div class="section-header">
                        <div class="section-icon blue">💰</div>
                        <div>
                            <div class="section-title">Financial Limits</div>
                            <div class="section-hint">CDW coverage amounts and daily rates</div>
                        </div>
                    </div>
                    <div class="financial-grid">
                        <div class="financial-field">
                            <div class="financial-label">Excess Amount</div>
                            <div class="financial-value">
                                <span class="currency-symbol">£</span>
                                <input type="number" class="financial-input" name="excess_amount" min="0" id="excessInput" value="{{ $policy->excess_amount }}">
                            </div>
                            <div class="mt-2" id="noExcessBadge" style="display: none;">
                                <span class="no-excess-badge">NO EXCESS</span>
                            </div>
                        </div>
                        <div class="financial-field">
                            <div class="financial-label">Max Claim Limit</div>
                            <div class="financial-value">
                                <span class="currency-symbol">£</span>
                                <input type="number" class="financial-input" name="max_claim_limit" min="0" value="{{ $policy->max_claim_limit }}">
                            </div>
                        </div>
                        <div class="financial-field">
                            <div class="financial-label">Daily Rate</div>
                            <div class="financial-value">
                                <span class="currency-symbol">£</span>
                                <input type="number" class="financial-input" name="daily_rate" min="0" step="0.01" value="{{ $policy->daily_rate }}">
                            </div>
                        </div>
                    </div>
                </div>

                @php 
                    $documents = json_decode($policy->documents ?? '[]', true);
                @endphp 
                <!-- Section 7: Document Uploads -->
                <div class="section">
                    <div class="section-header">
                        <div class="section-icon blue">📄</div>
                        <div>
                            <div class="section-title">Document Uploads</div>
                            <div class="section-hint">Upload all required policy documents (PDF only)</div>
                        </div>
                    </div>
                    <div class="documents-list">
                        <div class="document-item">
                            <input type="file" name="documents[policy_schedule]" accept=".pdf,.doc,.docx" class="d-none" id="policySchedule">
                            <div class="document-icon">
                                @if(isset($documents['policy_schedule']))
                                    <a href="{{ asset('storage/' . $documents['policy_schedule']) }}" target="_blank">📋</a>
                                @else
                                    📋
                                @endif
                            </div>
                            <div class="document-info">
                                <div class="document-name">Policy Schedule</div>
                                <div class="document-status">
                                    <span class="status-dot {{ isset($documents['policy_schedule']) ? 'uploaded' : 'missing' }}"></span>
                                    <span class="document-status-text">{{ isset($documents['policy_schedule']) ? 'Uploaded' : 'Upload' }}</span>
                                </div>
                            </div>
                            <div class="document-actions">
                                <button class="btn btn-small btn-secondary" type="button" onclick="updateDoc('#policySchedule', this)">{{ isset($documents['policy_schedule']) ? 'Replace' : 'Upload' }}</button>
                            </div>
                        </div>

                        <div class="document-item">
                            <input type="file" name="documents[terms_and_conditions]" accept=".pdf,.doc,.docx" class="d-none" id="termsAndConditions">
                            <div class="document-icon">
                                @if(isset($documents['terms_and_conditions']))
                                    <a href="{{ asset('storage/' . $documents['terms_and_conditions']) }}" target="_blank">📑</a>
                                @else
                                    📑
                                @endif
                            </div>
                            <div class="document-info">
                                <div class="document-name">Terms & Conditions</div>
                                <div class="document-status">
                                    <span class="status-dot {{ isset($documents['terms_and_conditions']) ? 'uploaded' : 'missing' }}"></span>
                                    <span class="document-status-text">{{ isset($documents['terms_and_conditions']) ? 'Uploaded' : 'Upload' }}</span>
                                </div>
                            </div>
                            <div class="document-actions">
                                <button class="btn btn-small btn-secondary" type="button" onclick="updateDoc('#termsAndConditions', this)">{{ isset($documents['terms_and_conditions']) ? 'Replace' : 'Upload' }}</button>
                            </div>
                        </div>

                        <div class="document-item">
                            <input type="file" name="documents[ipid]" accept=".pdf,.doc,.docx" class="d-none" id="ipid">
                            <div class="document-icon">
                                @if(isset($documents['ipid']))
                                    <a href="{{ asset('storage/' . $documents['ipid']) }}" target="_blank">📄</a>
                                @else
                                    📄
                                @endif
                            </div>
                            <div class="document-info">
                                <div class="document-name">IPID (Insurance Product Information Document)</div>
                                <div class="document-status">
                                    <span class="status-dot {{ isset($documents['ipid']) ? 'uploaded' : 'missing' }}"></span>
                                    <span class="document-status-text">{{ isset($documents['ipid']) ? 'Uploaded' : 'Upload' }}</span>
                                </div>
                            </div>
                            <div class="document-actions">
                                <button class="btn btn-small btn-secondary" type="button" onclick="updateDoc('#ipid', this)">{{ isset($documents['ipid']) ? 'Replace' : 'Upload' }}</button>
                            </div>
                        </div>

                        <div class="document-item">
                            <input type="file" name="documents[insurer_certificate]" accept=".pdf,.doc,.docx" class="d-none" id="insurerCertificate">
                            <div class="document-icon">x
                                @if(isset($documents['insurer_certificate']))
                                    <a href="{{ asset('storage/' . $documents['insurer_certificate']) }}" target="_blank">🏢</a>
                                @else
                                    🏢
                                @endif
                            </div>
                            <div class="document-info">
                                <div class="document-name">Insurer Certificate</div>
                                <div class="document-status">
                                    <span class="status-dot {{ isset($documents['insurer_certificate']) ? 'uploaded' : 'missing' }}"></span>
                                    <span class="document-status-text">{{ isset($documents['insurer_certificate']) ? 'Uploaded' : 'Upload' }}</span>
                                </div>
                            </div>
                            <div class="document-actions">
                                <button class="btn btn-small btn-secondary" type="button" onclick="updateDoc('#insurerCertificate', this)">{{ isset($documents['insurer_certificate']) ? 'Replace' : 'Upload' }}</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Section 8: Claim Instructions -->
                <div class="section">
                    <div class="section-header">
                        <div class="section-icon blue">📞</div>
                        <div>
                            <div class="section-title">CDW Claim Instructions</div>
                            <div class="section-hint">CDW claims process and required documentation</div>
                        </div>
                    </div>
                    
                    <!-- Tabs Navigation -->
                    <div class="tabs-nav">
                        <button type="button" class="tab-button active" onclick="switchTab(event, 'tab-instructions')">Customer Instructions</button>
                        <button type="button" class="tab-button" onclick="switchTab(event, 'tab-contact')">Claims Contact</button>
                        <button type="button" class="tab-button" onclick="switchTab(event, 'tab-documents')">Required Documents</button>
                    </div>

                    <!-- Tab 1: Customer Instructions -->
                    <div class="tab-content active" id="tab-instructions">
                        <textarea class="form-textarea" placeholder="Enter step-by-step claims instructions for customers..." name="customer_instruction" id="claim_instructions">{{ isset($policy->customer_instruction) ? $policy->customer_instruction : '' }}</textarea>
                    </div>

                    @php 
                    $claims_contact = json_decode($policy->claims_contact ?? '[]', true);
                    @endphp
                    <!-- Tab 2: Claims Contact -->
                    <div class="tab-content" id="tab-contact">
                        <div class="form-grid">
                            <div class="form-group">
                                <label class="form-label">Claims Email</label>
                                <input type="email" class="form-input" name="claims_contact[email]" id="claims_email" placeholder="claims@rsa.com" value="{{ isset($claims_contact['email']) ? $claims_contact['email'] : '' }}">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Claims Phone (24/7)</label>
                                <input type="tel" class="form-input" name="claims_contact[phone]" id="claims_phone" placeholder="0800 123 4567" value="{{ isset($claims_contact['phone']) ? $claims_contact['phone'] : '' }}">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Claims Address</label>
                                <input type="text" class="form-input" name="claims_contact[address]" id="claims_address" placeholder="RSA Claims Department, London" value="{{ isset($claims_contact['address']) ? $claims_contact['address'] : '' }}">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Claims Portal URL</label>
                                <input type="url" class="form-input" name="claims_contact[portal_url]" id="claims_portal_url" placeholder="https://claims.rsa.com" value="{{ isset($claims_contact['portal_url']) ? $claims_contact['portal_url'] : '' }}">
                            </div>
                        </div>
                    </div>

                    @php 
                    $required_documents = json_decode($policy->required_documents ?? '[]', true);
                    @endphp
                    <!-- Tab 3: Required Documents -->
                    <div class="tab-content" id="tab-documents">
                        <div class="checklist">
                            <div class="checklist-item">
                                <input type="checkbox" id="doc1" name="required_documents[]" value="Rental Agreement / Invoice with CDW selected" {{ in_array('Rental Agreement / Invoice with CDW selected', $required_documents) ? 'checked' : '' }}>
                                <label for="doc1">Rental Agreement / Invoice with CDW selected</label>
                            </div>
                            <div class="checklist-item">
                                <input type="checkbox" id="doc2" name="required_documents[]" value="Photographs of collision damage (minimum 6 angles)" {{ in_array('Photographs of collision damage (minimum 6 angles)', $required_documents) ? 'checked' : '' }}>
                                <label for="doc2">Photographs of collision damage (minimum 6 angles)</label>
                            </div>
                            <div class="checklist-item">
                                <input type="checkbox" id="doc3" name="required_documents[]" value="Police report (mandatory for third-party accidents)" {{ in_array('Police report (mandatory for third-party accidents)', $required_documents) ? 'checked' : '' }}>
                                <label for="doc3">Police report (mandatory for third-party accidents)</label>
                            </div>
                            <div class="checklist-item">
                                <input type="checkbox" id="doc4" name="required_documents[]" value="Third-party details (name, insurance, contact info)" {{ in_array('Third-party details (name, insurance, contact info)', $required_documents) ? 'checked' : '' }}>
                                <label for="doc4">Third-party details (name, insurance, contact info)</label>
                            </div>
                            <div class="checklist-item">
                                <input type="checkbox" id="doc5" name="required_documents[]" value="Completed CDW incident report form" {{ in_array('Completed CDW incident report form', $required_documents) ? 'checked' : '' }}>
                                <label for="doc5">Completed CDW incident report form</label>
                            </div>
                            <div class="checklist-item">
                                <input type="checkbox" id="doc6" name="required_documents[]" value="Driver's license copy (both sides)" {{ in_array('Driver\'s license copy (both sides)', $required_documents) ? 'checked' : '' }}>
                                <label for="doc6">Driver's license copy (both sides)</label>
                            </div>
                            <div class="checklist-item">
                            <input type="checkbox" id="doc7" name="required_documents[]" value="Witness statements (if available)" {{ in_array('Witness statements (if available)', $required_documents) ? 'checked' : '' }}>
                                <label for="doc7">Witness statements (if available)</label>
                            </div>
                            <div class="checklist-item">
                                <input type="checkbox" id="doc8" name="required_documents[]" value="Repair estimates (optional - we will arrange assessment)" {{ in_array('Repair estimates (optional - we will arrange assessment)', $required_documents) ? 'checked' : '' }}>
                                <label for="doc8">Repair estimates (optional - we will arrange assessment)</label>
                            </div>
                            <div class="checklist-item">
                                <input type="checkbox" id="doc9" name="required_documents[]" value="Scene diagram or sketch" {{ in_array('Scene diagram or sketch', $required_documents) ? 'checked' : '' }}>
                                <label for="doc9">Scene diagram or sketch</label>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Save & Publish Buttons -->
                <div class="button-group">
                    <button class="btn btn-submit btn-secondary" onclick="setStatusAndPost('Draft')">
                        <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4" />
                        </svg>
                        Save Draft
                    </button>
                    <button class="btn btn-submit btn-primary" onclick="setStatusAndPost('Active')">
                        <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Save & Publish
                    </button>
                </div>
            </div>
        </form>
    </div>

    <script>
        // Toggle Panel Accordion
        function togglePanel() {
            const panel = document.getElementById('fullProtectionPanel');
            panel.classList.toggle('collapsed');
        }

        // 3-State Toggle
        function selectToggle(element, state) {
            const toggleGroup = element.parentElement;
            const allOptions = toggleGroup.querySelectorAll('.toggle-option');
            
            // Remove active class from all
            allOptions.forEach(opt => opt.classList.remove('active'));
            
            // Add active class to clicked
            element.classList.add('active');
            
            // Show/hide partial notes
            const card = element.closest('.coverage-card');
            const partialNotes = card.querySelector('.partial-notes');
            
            if (state === 'partial') {
                partialNotes.classList.add('active');
            } else {
                partialNotes.classList.remove('active');
            }

            card.querySelector('.coverage-item-status').value = state;
        }

        // Tab Switching
        function switchTab(event, tabId) {
            // Remove active class from all tabs
            document.querySelectorAll('.tab-button').forEach(btn => {
                btn.classList.remove('active');
            });
            document.querySelectorAll('.tab-content').forEach(content => {
                content.classList.remove('active');
            });
            
            // Add active class to clicked tab
            event.target.classList.add('active');
            document.getElementById(tabId).classList.add('active');
        }

        // File Upload Preview (Demo)
        document.querySelectorAll('.file-upload-area input[type="file"]').forEach(input => {
            input.addEventListener('change', function() {
                if (this.files && this.files[0]) {
                    const preview = this.closest('.section').querySelector('.file-preview');
                    if (preview) {
                        preview.classList.add('active');
                        preview.querySelector('[xrole="file-name"]').innerText = this.files[0].name;
                        const fileSize = (this.files[0].size / 1024 / 1024).toFixed(2);
                        preview.querySelector('[xrole="file-size"]').innerText = `${fileSize} MB`;

                        const fileReader = new FileReader();
                        fileReader.onload = function(e) {
                            preview.querySelector('.file-preview-icon').innerHTML = `<img src="${e.target.result}" alt="File Preview" style="width: 50px; height: 50px; object-fit: cover; border-radius: 8px;">`;
                        };
                        fileReader.readAsDataURL(this.files[0]);

                        const uploadArea = this.closest('[xrole="logoUpload"]');
                        uploadArea.classList.add('d-none');
                    }
                }
            });
        });

        // Enable/Disable Publish Button based on validation
        function validateForm() {
            const requiredFields = document.querySelectorAll('.form-input[required]');
            const publishBtns = document.querySelectorAll('.btn-submit');
            
            let allValid = true;
            requiredFields.forEach(field => {
                if (!field.value.trim()) {
                    allValid = false;
                }
            });
            
            publishBtns.forEach(btn => {
                btn.disabled = !allValid;
            });
        }

        // Check validation on input
        document.querySelectorAll('.form-input').forEach(input => {
            input.addEventListener('input', validateForm);
        });

        // Initial validation check
        validateForm();

        // NO EXCESS Badge toggle
        document.querySelector('.financial-field input[type="number"]').addEventListener('input', function() {
            const badge = this.closest('.financial-field').querySelector('.no-excess-badge');
            if (badge) {
                const badgeContainer = badge.parentElement;
                if (parseFloat(this.value) === 0) {
                    badgeContainer.style.display = 'block';
                } else {
                    badgeContainer.style.display = 'none';
                }
            }
        });

        function replaceLogo() {
            document.querySelector('#insurerLogo').click();
        }

        function deleteLogo() {
            const uploadArea = document.querySelector('[xrole="logoUpload"]');
            uploadArea.classList.remove('d-none');

            const logoPreview = document.querySelector('#logoPreview');
            logoPreview.classList.remove('active');

            logoPreview.querySelector('[xrole="file-name"]').innerText = '';
            logoPreview.querySelector('[xrole="file-size"]').innerText = '';
            logoPreview.querySelector('.file-preview-icon').innerHTML = '';
        }

        function updateDoc(selector, initiator){
            document.querySelector(selector).click();
        }

        document.querySelectorAll('#policySchedule, #termsAndConditions, #ipid, #insurerCertificate').forEach((fileInput) => {
            fileInput.addEventListener('change', () => {
                var documentItem = fileInput.closest('.document-item');
                var statusDot = documentItem.querySelector('.status-dot')
                
                if(fileInput.files.length > 0){
                    statusDot.classList.remove('missing');
                    statusDot.classList.add('uploaded');

                    documentItem.querySelector('.document-status-text').innerText = 'Uploaded';
                    documentItem.querySelector('.document-actions button').innerText = 'Replace';
                } else {
                    statusDot.classList.remove('uploaded');
                    statusDot.classList.add('missing');

                    documentItem.querySelector('.document-status-text').innerText = 'Upload';
                    documentItem.querySelector('.document-actions button').innerText = 'Upload';
                }
            });
        });

        function setStatusAndPost(status){
            document.querySelector('#policyStatus').value = status;
            document.querySelector('#fullProtectionPanel').submit();
        }
    </script>
</body>
</html>
