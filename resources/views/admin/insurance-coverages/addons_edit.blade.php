<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Optional Add-Ons Insurance - ANI Motors</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --teal: #14b8a6;
            --teal-dark: #0d9488;
            --teal-light: #ccfbf1;
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
            background: linear-gradient(135deg, #f0fdfa 0%, #ccfbf1 100%);
            color: var(--grey-900);
            line-height: 1.6;
            padding: 40px 20px;
            min-height: 100vh;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        /* Insurance Panel */
        .insurance-panel {
            background: var(--white);
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-lg);
            overflow: hidden;
            margin-bottom: 30px;
            transition: var(--transition);
        }

        .insurance-panel:hover {
            box-shadow: 0 15px 40px rgba(20, 184, 166, 0.2);
        }

        /* Panel Header - Teal Theme for Optional Add-Ons */
        .panel-header {
            background: linear-gradient(135deg, var(--teal) 0%, var(--teal-dark) 100%);
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
            background: linear-gradient(135deg, var(--teal-dark) 0%, #0f766e 100%);
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

        /* Sections */
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

        .section-icon.teal { background: var(--teal-light); color: var(--teal); }
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

        /* Form Fields */
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
            border-color: var(--teal);
            box-shadow: 0 0 0 4px var(--teal-light);
        }

        .form-textarea {
            resize: vertical;
            min-height: 120px;
            line-height: 1.6;
        }

        .form-select[multiple] {
            min-height: 120px;
        }

        /* File Upload */
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
            border-color: var(--teal);
            background: var(--teal-light);
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

        /* Coverage Matrix */
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
            border-color: var(--teal);
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

        /* Financial Fields */
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
            border-color: var(--teal);
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

        /* Documents */
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
            border-color: var(--teal);
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
        .status-dot.expiring { background: var(--warning); }

        .document-actions {
            display: flex;
            gap: 8px;
        }

        /* Tabs */
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
            color: var(--teal);
        }

        .tab-button.active {
            color: var(--teal);
            border-bottom-color: var(--teal);
        }

        .tab-content {
            display: none;
        }

        .tab-content.active {
            display: block;
        }

        /* Buttons */
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
            background: var(--teal);
            color: var(--white);
        }

        .btn-primary:hover:not(:disabled) {
            background: var(--teal-dark);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(20, 184, 166, 0.3);
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

        .btn:disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }

        /* Checklist */
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

        /* Responsive */
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
        }

        .d-none {
            display: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Optional Add-Ons Panel -->
        <form action="{{ route('admin.insurance-coverages.update', $policy->id) }}" method="POST" class="insurance-panel" id="addonsPanel" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" name="policy_type" value="Addons">
            <input type="hidden" name="status" id="policyStatus" value="draft">
            <!-- Panel Header -->
            <div class="panel-header">
                <div class="panel-header-left">
                    <div class="panel-icon">🎁</div>
                    <div class="panel-title-group">
                        <div class="panel-title">Optional Add-Ons</div>
                        <div class="panel-subtitle">
                            Additional coverage for tyres, glass, keys, roadside assistance and more
                        </div>
                    </div>
                </div>
            </div>

            <!-- Panel Content -->
            <div class="panel-content">
                <!-- Section 1: Basic Details -->
                <div class="section">
                    <div class="section-header">
                        <div class="section-icon teal">📋</div>
                        <div>
                            <div class="section-title">Basic Details</div>
                            <div class="section-hint">Optional Add-Ons policy information and coverage period</div>
                        </div>
                    </div>
                    <div class="form-grid">
                        <div class="form-group">
                            <label class="form-label">
                                Policy Number
                                <span class="info-icon" data-tooltip="Unique Optional Add-Ons policy identifier">i</span>
                            </label>
                            <input type="text" class="form-input" placeholder="e.g., OA-2025-000123" name="policy_number" value="{{ old('policy_number', $policy->policy_number) }}">
                            @error('policy_number')
                                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label">
                                Insurer Name
                                <span class="info-icon" data-tooltip="Optional Add-Ons insurance provider">i</span>
                            </label>
                            <input type="text" class="form-input" placeholder="e.g., Allianz / AXA / Aviva" name="insurer_name" value="{{ old('insurer_name', $policy->insurer_name) }}">
                            @error('insurer_name')
                                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label">
                                Policy Start Date
                                <span class="info-icon" data-tooltip="Add-Ons coverage begins">i</span>
                            </label>
                            <input type="date" class="form-input" name="policy_start_date" value="{{ old('policy_start_date', $policy->policy_start_date) }}">
                            @error('policy_start_date')
                                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label">
                                Policy Expiry Date
                                <span class="info-icon" data-tooltip="Add-Ons coverage ends">i</span>
                            </label>
                            <input type="date" class="form-input" name="policy_end_date" value="{{ old('policy_end_date', $policy->policy_end_date) }}">
                            @error('policy_end_date')
                                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                        @php
                            $vehicleClasses = old('vehicle_classes', json_decode($policy->vehicle_classes ?? '[]', true));
                        @endphp
                        <div class="form-group">
                            <label class="form-label">
                                Vehicle Class Applicability
                                <span class="info-icon" data-tooltip="Vehicle types eligible for Add-Ons">i</span>
                            </label>
                            @error('vehicle_classes')
                                <span class="text-red-500 text-xs mt-1 block mb-2">{{ $message }}</span>
                            @enderror
                            <div class="form-checkbox-group">
                                <label class="form-checkbox">
                                    <input type="checkbox" name="vehicle_classes[]" value="economy" {{ in_array('economy', $vehicleClasses) ? 'checked' : '' }}>
                                    Economy
                                </label><br>
                                <label class="form-checkbox">
                                    <input type="checkbox" name="vehicle_classes[]" value="compact" {{ in_array('compact', $vehicleClasses) ? 'checked' : '' }}>
                                    Compact
                                </label><br>
                                <label class="form-checkbox">
                                    <input type="checkbox" name="vehicle_classes[]" value="suv" {{ in_array('suv', $vehicleClasses) ? 'checked' : '' }}>
                                    SUV
                                </label><br>
                                <label class="form-checkbox">
                                    <input type="checkbox" name="vehicle_classes[]" value="luxury" {{ in_array('luxury', $vehicleClasses) ? 'checked' : '' }}>
                                    Luxury
                                </label><br>
                                <label class="form-checkbox">
                                    <input type="checkbox" name="vehicle_classes[]" value="ev" {{ in_array('ev', $vehicleClasses) ? 'checked' : '' }}>
                                    EV / Hybrid
                                </label><br>
                                <label class="form-checkbox">
                                    <input type="checkbox" name="vehicle_classes[]" value="mpv" {{ in_array('mpv', $vehicleClasses) ? 'checked' : '' }}>
                                    MPV
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Section 2: Insurer Logo -->
                <div class="section">
                    <div class="section-header">
                        <div class="section-icon teal">🏢</div>
                        <div>
                            <div class="section-title">Insurer Logo</div>
                            <div class="section-hint">Upload Optional Add-Ons provider logo (PNG/JPG only)</div>
                        </div>
                    </div>
                    <div class="file-upload-area {{ $policy->insurer_logo ? 'd-none' : '' }}" xrole="logoUpload">
                        <input type="file" name="insurer_logo" id="insurerLogo" accept=".png,.jpg,.jpeg">
                        <div class="upload-icon">📷</div>
                        <div class="upload-text">Click to upload or drag and drop</div>
                        <div class="upload-hint">PNG or JPG (max 2MB)</div>
                    </div>
                    @error('insurer_logo')
                        <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                    @enderror
                    <div class="file-preview {{ $policy->insurer_logo ? 'active' : '' }}" id="logoPreview">
                        <div class="file-preview-icon">
                            @if($policy->insurer_logo)
                                <img src="{{ asset('storage/' . $policy->insurer_logo) }}" alt="Insurer Logo" style="width: 50px; height: 50px; object-fit: cover; border-radius: 8px;">
                            @else
                                🖼️
                            @endif
                        </div>
                        <div class="file-preview-info">
                            <div class="file-preview-name" xrole="file-name">{{ $policy->insurer_logo ? 'File Uploaded' : '' }}</div>
                            <div class="file-preview-size" xrole="file-size"></div>
                        </div>
                        <div class="file-preview-actions">
                            <button type="button" class="btn btn-small btn-secondary" onclick="replaceLogo()">Replace</button>
                            <button type="button" class="btn btn-small btn-danger" onclick="deleteLogo()">Delete</button>
                        </div>
                    </div>
                </div>

                <!-- Section 3: Optional Add-Ons Coverage Matrix -->
                <div class="section">
                    <div class="section-header">
                        <div class="section-icon green">✅</div>
                        <div>
                            <div class="section-title">Optional Add-Ons Coverage Matrix</div>
                            <div class="section-hint">Additional coverage items available as add-ons</div>
                        </div>
                    </div>
                    @php
                        $coverageMatrix = json_decode($policy->coverage_matrix ?? '[]', true);
                    @endphp
                    <div class="coverage-grid">
                        <!-- Item 1: Tyre & Wheel Damage -->
                        <div class="coverage-card">
                            <input type="hidden" name="coverage_matrix[0][name]" value="Tyre & Wheel Damage">
                            <input type="hidden" name="coverage_matrix[0][status]" class="coverage-item-status" value="{{ isset($coverageMatrix[0]['status']) ? $coverageMatrix[0]['status'] : 'covered' }}">
                            <div class="coverage-card-header">
                                <div class="coverage-name">Tyre & Wheel Damage</div>
                                <div class="toggle-3state">
                                    <span class="toggle-option covered {{ (isset($coverageMatrix[0]['status']) ? $coverageMatrix[0]['status'] : 'covered') === 'covered' ? 'active' : '' }}" onclick="selectToggle(this, 'covered')">Covered</span>
                                    <span class="toggle-option partial {{ (isset($coverageMatrix[0]['status']) ? $coverageMatrix[0]['status'] : '') === 'partial' ? 'active' : '' }}" onclick="selectToggle(this, 'partial')">Partial</span>
                                    <span class="toggle-option not-covered {{ (isset($coverageMatrix[0]['status']) ? $coverageMatrix[0]['status'] : '') === 'not' ? 'active' : '' }}" onclick="selectToggle(this, 'not')">Not</span>
                                </div>
                            </div>
                            <div class="partial-notes {{ (isset($coverageMatrix[0]['status']) ? $coverageMatrix[0]['status'] : '') === 'partial' ? 'active' : '' }}">
                                <input type="text" class="form-input" name="coverage_matrix[0][partial_notes]" placeholder="All 4 tyres & wheels covered" value="{{ isset($coverageMatrix[0]['partial_notes']) ? $coverageMatrix[0]['partial_notes'] : '' }}">
                            </div>
                        </div>

                        <!-- Item 2: Glass Damage (Full) -->
                        <div class="coverage-card">
                            <input type="hidden" name="coverage_matrix[1][name]" value="Glass Damage (Full Coverage)">
                            <input type="hidden" name="coverage_matrix[1][status]" class="coverage-item-status" value="{{ isset($coverageMatrix[1]['status']) ? $coverageMatrix[1]['status'] : 'covered' }}">
                            <div class="coverage-card-header">
                                <div class="coverage-name">Glass Damage (Full Coverage)</div>
                                <div class="toggle-3state">
                                    <span class="toggle-option covered {{ (isset($coverageMatrix[1]['status']) ? $coverageMatrix[1]['status'] : 'covered') === 'covered' ? 'active' : '' }}" onclick="selectToggle(this, 'covered')">Covered</span>
                                    <span class="toggle-option partial {{ (isset($coverageMatrix[1]['status']) ? $coverageMatrix[1]['status'] : '') === 'partial' ? 'active' : '' }}" onclick="selectToggle(this, 'partial')">Partial</span>
                                    <span class="toggle-option not-covered {{ (isset($coverageMatrix[1]['status']) ? $coverageMatrix[1]['status'] : '') === 'not' ? 'active' : '' }}" onclick="selectToggle(this, 'not')">Not</span>
                                </div>
                            </div>
                            <div class="partial-notes {{ (isset($coverageMatrix[1]['status']) ? $coverageMatrix[1]['status'] : '') === 'partial' ? 'active' : '' }}">
                                <input type="text" class="form-input" name="coverage_matrix[1][partial_notes]" placeholder="Windscreen, windows, mirrors covered" value="{{ isset($coverageMatrix[1]['partial_notes']) ? $coverageMatrix[1]['partial_notes'] : '' }}">
                            </div>
                        </div>

                        <!-- Item 3: Lost or Stolen Keys -->
                        <div class="coverage-card">
                            <input type="hidden" name="coverage_matrix[2][name]" value="Lost or Stolen Keys">
                            <input type="hidden" name="coverage_matrix[2][status]" class="coverage-item-status" value="{{ isset($coverageMatrix[2]['status']) ? $coverageMatrix[2]['status'] : 'covered' }}">
                            <div class="coverage-card-header">
                                <div class="coverage-name">Lost or Stolen Keys</div>
                                <div class="toggle-3state">
                                    <span class="toggle-option covered {{ (isset($coverageMatrix[2]['status']) ? $coverageMatrix[2]['status'] : 'covered') === 'covered' ? 'active' : '' }}" onclick="selectToggle(this, 'covered')">Covered</span>
                                    <span class="toggle-option partial {{ (isset($coverageMatrix[2]['status']) ? $coverageMatrix[2]['status'] : '') === 'partial' ? 'active' : '' }}" onclick="selectToggle(this, 'partial')">Partial</span>
                                    <span class="toggle-option not-covered {{ (isset($coverageMatrix[2]['status']) ? $coverageMatrix[2]['status'] : '') === 'not' ? 'active' : '' }}" onclick="selectToggle(this, 'not')">Not</span>
                                </div>
                            </div>
                            <div class="partial-notes {{ (isset($coverageMatrix[2]['status']) ? $coverageMatrix[2]['status'] : '') === 'partial' ? 'active' : '' }}">
                                <input type="text" class="form-input" name="coverage_matrix[2][partial_notes]" placeholder="Up to £400 replacement cost" value="{{ isset($coverageMatrix[2]['partial_notes']) ? $coverageMatrix[2]['partial_notes'] : '' }}">
                            </div>
                        </div>

                        <!-- Item 4: Roadside Assistance -->
                        <div class="coverage-card">
                            <input type="hidden" name="coverage_matrix[3][name]" value="24/7 Roadside Assistance">
                            <input type="hidden" name="coverage_matrix[3][status]" class="coverage-item-status" value="{{ isset($coverageMatrix[3]['status']) ? $coverageMatrix[3]['status'] : 'covered' }}">
                            <div class="coverage-card-header">
                                <div class="coverage-name">24/7 Roadside Assistance</div>
                                <div class="toggle-3state">
                                    <span class="toggle-option covered {{ (isset($coverageMatrix[3]['status']) ? $coverageMatrix[3]['status'] : 'covered') === 'covered' ? 'active' : '' }}" onclick="selectToggle(this, 'covered')">Covered</span>
                                    <span class="toggle-option partial {{ (isset($coverageMatrix[3]['status']) ? $coverageMatrix[3]['status'] : '') === 'partial' ? 'active' : '' }}" onclick="selectToggle(this, 'partial')">Partial</span>
                                    <span class="toggle-option not-covered {{ (isset($coverageMatrix[3]['status']) ? $coverageMatrix[3]['status'] : '') === 'not' ? 'active' : '' }}" onclick="selectToggle(this, 'not')">Not</span>
                                </div>
                            </div>
                            <div class="partial-notes {{ (isset($coverageMatrix[3]['status']) ? $coverageMatrix[3]['status'] : '') === 'partial' ? 'active' : '' }}">
                                <input type="text" class="form-input" name="coverage_matrix[3][partial_notes]" placeholder="Unlimited callouts" value="{{ isset($coverageMatrix[3]['partial_notes']) ? $coverageMatrix[3]['partial_notes'] : '' }}">
                            </div>
                        </div>

                        <!-- Item 5: Breakdown Recovery -->
                        <div class="coverage-card">
                            <input type="hidden" name="coverage_matrix[4][name]" value="Breakdown Recovery & Towing">
                            <input type="hidden" name="coverage_matrix[4][status]" class="coverage-item-status" value="{{ isset($coverageMatrix[4]['status']) ? $coverageMatrix[4]['status'] : 'covered' }}">
                            <div class="coverage-card-header">
                                <div class="coverage-name">Breakdown Recovery & Towing</div>
                                <div class="toggle-3state">
                                    <span class="toggle-option covered {{ (isset($coverageMatrix[4]['status']) ? $coverageMatrix[4]['status'] : 'covered') === 'covered' ? 'active' : '' }}" onclick="selectToggle(this, 'covered')">Covered</span>
                                    <span class="toggle-option partial {{ (isset($coverageMatrix[4]['status']) ? $coverageMatrix[4]['status'] : '') === 'partial' ? 'active' : '' }}" onclick="selectToggle(this, 'partial')">Partial</span>
                                    <span class="toggle-option not-covered {{ (isset($coverageMatrix[4]['status']) ? $coverageMatrix[4]['status'] : '') === 'not' ? 'active' : '' }}" onclick="selectToggle(this, 'not')">Not</span>
                                </div>
                            </div>
                            <div class="partial-notes {{ (isset($coverageMatrix[4]['status']) ? $coverageMatrix[4]['status'] : '') === 'partial' ? 'active' : '' }}">
                                <input type="text" class="form-input" name="coverage_matrix[4][partial_notes]" placeholder="Up to 100 miles" value="{{ isset($coverageMatrix[4]['partial_notes']) ? $coverageMatrix[4]['partial_notes'] : '' }}">
                            </div>
                        </div>

                        <!-- Item 6: Underbody Damage -->
                        <div class="coverage-card">
                            <input type="hidden" name="coverage_matrix[5][name]" value="Underbody Damage">
                            <input type="hidden" name="coverage_matrix[5][status]" class="coverage-item-status" value="{{ isset($coverageMatrix[5]['status']) ? $coverageMatrix[5]['status'] : 'covered' }}">
                            <div class="coverage-card-header">
                                <div class="coverage-name">Underbody Damage</div>
                                <div class="toggle-3state">
                                    <span class="toggle-option covered {{ (isset($coverageMatrix[5]['status']) ? $coverageMatrix[5]['status'] : 'covered') === 'covered' ? 'active' : '' }}" onclick="selectToggle(this, 'covered')">Covered</span>
                                    <span class="toggle-option partial {{ (isset($coverageMatrix[5]['status']) ? $coverageMatrix[5]['status'] : '') === 'partial' ? 'active' : '' }}" onclick="selectToggle(this, 'partial')">Partial</span>
                                    <span class="toggle-option not-covered {{ (isset($coverageMatrix[5]['status']) ? $coverageMatrix[5]['status'] : '') === 'not' ? 'active' : '' }}" onclick="selectToggle(this, 'not')">Not</span>
                                </div>
                            </div>
                            <div class="partial-notes {{ (isset($coverageMatrix[5]['status']) ? $coverageMatrix[5]['status'] : '') === 'partial' ? 'active' : '' }}">
                                <input type="text" class="form-input" name="coverage_matrix[5][partial_notes]" value="{{ isset($coverageMatrix[5]['partial_notes']) ? $coverageMatrix[5]['partial_notes'] : 'Covers sump & exhaust damage' }}">
                            </div>
                        </div>

                        <!-- Item 7: Roof Damage -->
                        <div class="coverage-card">
                            <input type="hidden" name="coverage_matrix[6][name]" value="Roof Damage">
                            <input type="hidden" name="coverage_matrix[6][status]" class="coverage-item-status" value="{{ isset($coverageMatrix[6]['status']) ? $coverageMatrix[6]['status'] : 'covered' }}">
                            <div class="coverage-card-header">
                                <div class="coverage-name">Roof Damage</div>
                                <div class="toggle-3state">
                                    <span class="toggle-option covered {{ (isset($coverageMatrix[6]['status']) ? $coverageMatrix[6]['status'] : 'covered') === 'covered' ? 'active' : '' }}" onclick="selectToggle(this, 'covered')">Covered</span>
                                    <span class="toggle-option partial {{ (isset($coverageMatrix[6]['status']) ? $coverageMatrix[6]['status'] : '') === 'partial' ? 'active' : '' }}" onclick="selectToggle(this, 'partial')">Partial</span>
                                    <span class="toggle-option not-covered {{ (isset($coverageMatrix[6]['status']) ? $coverageMatrix[6]['status'] : '') === 'not' ? 'active' : '' }}" onclick="selectToggle(this, 'not')">Not</span>
                                </div>
                            </div>
                            <div class="partial-notes {{ (isset($coverageMatrix[6]['status']) ? $coverageMatrix[6]['status'] : '') === 'partial' ? 'active' : '' }}">
                                <input type="text" class="form-input" name="coverage_matrix[6][partial_notes]" placeholder="Including sunroof damage" value="{{ isset($coverageMatrix[6]['partial_notes']) ? $coverageMatrix[6]['partial_notes'] : '' }}">
                            </div>
                        </div>

                        <!-- Item 8: Child Seats -->
                        <div class="coverage-card">
                            <input type="hidden" name="coverage_matrix[7][name]" value="Child Seats / Booster Seats">
                            <input type="hidden" name="coverage_matrix[7][status]" class="coverage-item-status" value="{{ isset($coverageMatrix[7]['status']) ? $coverageMatrix[7]['status'] : 'covered' }}">
                            <div class="coverage-card-header">
                                <div class="coverage-name">Child Seats / Booster Seats</div>
                                <div class="toggle-3state">
                                    <span class="toggle-option covered {{ (isset($coverageMatrix[7]['status']) ? $coverageMatrix[7]['status'] : 'covered') === 'covered' ? 'active' : '' }}" onclick="selectToggle(this, 'covered')">Covered</span>
                                    <span class="toggle-option partial {{ (isset($coverageMatrix[7]['status']) ? $coverageMatrix[7]['status'] : '') === 'partial' ? 'active' : '' }}" onclick="selectToggle(this, 'partial')">Partial</span>
                                    <span class="toggle-option not-covered {{ (isset($coverageMatrix[7]['status']) ? $coverageMatrix[7]['status'] : '') === 'not' ? 'active' : '' }}" onclick="selectToggle(this, 'not')">Not</span>
                                </div>
                            </div>
                            <div class="partial-notes {{ (isset($coverageMatrix[7]['status']) ? $coverageMatrix[7]['status'] : '') === 'partial' ? 'active' : '' }}">
                                <input type="text" class="form-input" name="coverage_matrix[7][partial_notes]" placeholder="Up to 2 seats per rental" value="{{ isset($coverageMatrix[7]['partial_notes']) ? $coverageMatrix[7]['partial_notes'] : '' }}">
                            </div>
                        </div>

                        <!-- Item 9: GPS / Sat Nav -->
                        <div class="coverage-card">
                            <input type="hidden" name="coverage_matrix[8][name]" value="GPS / Sat Nav Device">
                            <input type="hidden" name="coverage_matrix[8][status]" class="coverage-item-status" value="{{ isset($coverageMatrix[8]['status']) ? $coverageMatrix[8]['status'] : 'covered' }}">
                            <div class="coverage-card-header">
                                <div class="coverage-name">GPS / Sat Nav Device</div>
                                <div class="toggle-3state">
                                    <span class="toggle-option covered {{ (isset($coverageMatrix[8]['status']) ? $coverageMatrix[8]['status'] : 'covered') === 'covered' ? 'active' : '' }}" onclick="selectToggle(this, 'covered')">Covered</span>
                                    <span class="toggle-option partial {{ (isset($coverageMatrix[8]['status']) ? $coverageMatrix[8]['status'] : '') === 'partial' ? 'active' : '' }}" onclick="selectToggle(this, 'partial')">Partial</span>
                                    <span class="toggle-option not-covered {{ (isset($coverageMatrix[8]['status']) ? $coverageMatrix[8]['status'] : '') === 'not' ? 'active' : '' }}" onclick="selectToggle(this, 'not')">Not</span>
                                </div>
                            </div>
                            <div class="partial-notes {{ (isset($coverageMatrix[8]['status']) ? $coverageMatrix[8]['status'] : '') === 'partial' ? 'active' : '' }}">
                                <input type="text" class="form-input" name="coverage_matrix[8][partial_notes]" placeholder="Included in rental" value="{{ isset($coverageMatrix[8]['partial_notes']) ? $coverageMatrix[8]['partial_notes'] : '' }}">
                            </div>
                        </div>

                        <!-- Item 10: Additional Driver -->
                        <div class="coverage-card">
                            <input type="hidden" name="coverage_matrix[9][name]" value="Additional Driver Coverage">
                            <input type="hidden" name="coverage_matrix[9][status]" class="coverage-item-status" value="{{ isset($coverageMatrix[9]['status']) ? $coverageMatrix[9]['status'] : 'covered' }}">
                            <div class="coverage-card-header">
                                <div class="coverage-name">Additional Driver Coverage</div>
                                <div class="toggle-3state">
                                    <span class="toggle-option covered {{ (isset($coverageMatrix[9]['status']) ? $coverageMatrix[9]['status'] : 'covered') === 'covered' ? 'active' : '' }}" onclick="selectToggle(this, 'covered')">Covered</span>
                                    <span class="toggle-option partial {{ (isset($coverageMatrix[9]['status']) ? $coverageMatrix[9]['status'] : '') === 'partial' ? 'active' : '' }}" onclick="selectToggle(this, 'partial')">Partial</span>
                                    <span class="toggle-option not-covered {{ (isset($coverageMatrix[9]['status']) ? $coverageMatrix[9]['status'] : '') === 'not' ? 'active' : '' }}" onclick="selectToggle(this, 'not')">Not</span>
                                </div>
                            </div>
                            <div class="partial-notes {{ (isset($coverageMatrix[9]['status']) ? $coverageMatrix[9]['status'] : '') === 'partial' ? 'active' : '' }}">
                                <input type="text" class="form-input" name="coverage_matrix[9][partial_notes]" placeholder="Up to 3 additional drivers" value="{{ isset($coverageMatrix[9]['partial_notes']) ? $coverageMatrix[9]['partial_notes'] : '' }}">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Section 4: What is NOT Covered -->
                <div class="section">
                    <div class="section-header">
                        <div class="section-icon red">❌</div>
                        <div>
                            <div class="section-title">What is NOT Covered</div>
                            <div class="section-hint">Explicit Optional Add-Ons exclusions</div>
                        </div>
                    </div>
                    @php
                        $whatNotCovered = old('what_not_covered', json_decode($policy->what_not_covered ?? '[]', true));
                    @endphp
                    <div class="checklist">
                        <div class="checklist-item">
                            <input type="checkbox" id="excl1" name="what_not_covered[]" value="Wear and tear on tyres" {{ in_array('Wear and tear on tyres', $whatNotCovered) ? 'checked' : '' }}>
                            <label for="excl1">Wear and tear on tyres</label>
                        </div>
                        <div class="checklist-item">
                            <input type="checkbox" id="excl2" name="what_not_covered[]" value="Pre-existing damage to glass" {{ in_array('Pre-existing damage to glass', $whatNotCovered) ? 'checked' : '' }}>
                            <label for="excl2">Pre-existing damage to glass</label>
                        </div>
                        <div class="checklist-item">
                            <input type="checkbox" id="excl3" name="what_not_covered[]" value="Keys left inside vehicle (theft)" {{ in_array('Keys left inside vehicle (theft)', $whatNotCovered) ? 'checked' : '' }}>
                            <label for="excl3">Keys left inside vehicle (theft)</label>
                        </div>
                        <div class="checklist-item">
                            <input type="checkbox" id="excl4" name="what_not_covered[]" value="Breakdown due to lack of fuel" {{ in_array('Breakdown due to lack of fuel', $whatNotCovered) ? 'checked' : '' }}>
                            <label for="excl4">Breakdown due to lack of fuel</label>
                        </div>
                        <div class="checklist-item">
                            <input type="checkbox" id="excl5" name="what_not_covered[]" value="Negligent damage to underbody/roof" {{ in_array('Negligent damage to underbody/roof', $whatNotCovered) ? 'checked' : '' }}>
                            <label for="excl5">Negligent damage to underbody/roof</label>
                        </div>
                        <div class="checklist-item">
                            <input type="checkbox" id="excl6" name="what_not_covered[]" value="Damage to child seats by renter" {{ in_array('Damage to child seats by renter', $whatNotCovered) ? 'checked' : '' }}>
                            <label for="excl6">Damage to child seats by renter</label>
                        </div>
                        <div class="checklist-item">
                            <input type="checkbox" id="excl7" name="what_not_covered[]" value="GPS device theft (not reported)" {{ in_array('GPS device theft (not reported)', $whatNotCovered) ? 'checked' : '' }}>
                            <label for="excl7">GPS device theft (not reported)</label>
                        </div>
                        <div class="checklist-item">
                            <input type="checkbox" id="excl8" name="what_not_covered[]" value="Unauthorized additional driver" {{ in_array('Unauthorized additional driver', $whatNotCovered) ? 'checked' : '' }}>
                            <label for="excl8">Unauthorized additional driver</label>
                        </div>
                        <div class="checklist-item">
                            <input type="checkbox" id="excl9" name="what_not_covered[]" value="Racing or competitive driving" {{ in_array('Racing or competitive driving', $whatNotCovered) ? 'checked' : '' }}>
                            <label for="excl9">Racing or competitive driving</label>
                        </div>
                        <div class="checklist-item">
                            <input type="checkbox" id="excl10" name="what_not_covered[]" value="Personal belongings in vehicle" {{ in_array('Personal belongings in vehicle', $whatNotCovered) ? 'checked' : '' }}>
                            <label for="excl10">Personal belongings in vehicle</label>
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
                    <textarea class="form-textarea" name="key_exclusions">{{ old('key_exclusions', $policy->key_exclusions) }}</textarea>
                </div>

                <!-- Section 6: Financial Limits -->
                <div class="section">
                    <div class="section-header">
                        <div class="section-icon teal">💰</div>
                        <div>
                            <div class="section-title">Financial Limits</div>
                            <div class="section-hint">Optional Add-Ons pricing and coverage limits</div>
                        </div>
                    </div>
                    <div class="financial-grid">
                        <div class="financial-field">
                            <div class="financial-label">Excess Amount</div>
                            <div class="financial-value">
                                <span class="currency-symbol">{{ settings('currency_symbol') }}</span>
                                <input type="number" class="financial-input" name="excess_amount" value="{{ old('excess_amount', $policy->excess_amount) }}" min="0" id="excessInput">
                            </div>
                            <div style="margin-top: 16px; display: {{ (old('excess_amount', $policy->excess_amount) == 0) ? 'block' : 'none' }};" id="noExcessBadge">
                                <span class="no-excess-badge">NO EXCESS</span>
                            </div>
                        </div>
                        <div class="financial-field">
                            <div class="financial-label">Max Claim Limit (Per Item)</div>
                            <div class="financial-value">
                                <span class="currency-symbol">{{ settings('currency_symbol') }}</span>
                                <input type="number" class="financial-input" name="max_claim_limit" value="{{ old('max_claim_limit', $policy->max_claim_limit) }}" min="0">
                            </div>
                        </div>
                        <div class="financial-field">
                            <div class="financial-label">Daily Rate (All Add-Ons)</div>
                            <div class="financial-value">
                                <span class="currency-symbol">{{ settings('currency_symbol') }}</span>
                                <input type="number" class="financial-input" name="daily_rate" value="{{ old('daily_rate', $policy->daily_rate) }}" min="0" step="0.01">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Section 7: Document Uploads -->
                <div class="section">
                    <div class="section-header">
                        <div class="section-icon teal">📄</div>
                        <div>
                            <div class="section-title">Document Uploads</div>
                            <div class="section-hint">Upload all required Optional Add-Ons documents (PDF only)</div>
                        </div>
                    </div>
                    @php 
                        $documents = json_decode($policy->documents ?? '[]', true);
                    @endphp
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
                            <div class="document-icon">
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
                        <div class="section-icon teal">📞</div>
                        <div>
                            <div class="section-title">Optional Add-Ons Claim Instructions</div>
                            <div class="section-hint">Claims process for add-on coverage items</div>
                        </div>
                    </div>
                    
                    <!-- Tabs -->
                    <div class="tabs-nav">
                        <button type="button" class="tab-button active" onclick="switchTab(event, 'tab-instructions')">Customer Instructions</button>
                        <button type="button" class="tab-button" onclick="switchTab(event, 'tab-contact')">Claims Contact</button>
                        <button type="button" class="tab-button" onclick="switchTab(event, 'tab-documents')">Required Documents</button>
                    </div>

                    <!-- Tab 1 -->
                    <div class="tab-content active" id="tab-instructions">
                        <textarea class="form-textarea" name="customer_instruction">{{ old('customer_instruction', $policy->customer_instruction) }}</textarea>
                    </div>

                    <!-- Tab 2 -->
                    @php
                        $claims_contact = json_decode($policy->claims_contact ?? '[]', true);
                    @endphp
                    <div class="tab-content" id="tab-contact">
                        <div class="form-grid">
                            <div class="form-group">
                                <label class="form-label">Add-Ons Claims Email</label>
                                <input type="email" class="form-input" name="claims_contact[email]" value="{{ isset($claims_contact['email']) ? $claims_contact['email'] : old('claims_contact.email') }}">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Claims Phone </label>
                                <input type="tel" class="form-input" name="claims_contact[phone_main]" value="{{ isset($claims_contact['phone_main']) ? $claims_contact['phone_main'] : old('claims_contact.phone_main') }}">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Roadside Assistance </label>
                                <input type="tel" class="form-input" name="claims_contact[phone_roadside]" value="{{ isset($claims_contact['phone_roadside']) ? $claims_contact['phone_roadside'] : old('claims_contact.phone_roadside') }}">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Claims Address</label>
                                <input type="text" class="form-input" name="claims_contact[address]" value="{{ isset($claims_contact['address']) ? $claims_contact['address'] : old('claims_contact.address') }}">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Claims Portal URL</label>
                                <input type="url" class="form-input" name="claims_contact[portal_url]" value="{{ isset($claims_contact['portal_url']) ? $claims_contact['portal_url'] : old('claims_contact.portal_url') }}">
                            </div>
                        </div>
                    </div>

                    <!-- Tab 3 -->
                    <div class="tab-content" id="tab-documents">
                        @php
                            $requiredDocuments = old('required_documents', json_decode($policy->required_documents ?? '[]', true));
                        @endphp
                        <div class="checklist">
                            <div class="checklist-item">
                                <input type="checkbox" id="doc1" name="required_documents[]" value="Rental Agreement showing add-on(s) purchased" {{ in_array('Rental Agreement showing add-on(s) purchased', $requiredDocuments) ? 'checked' : '' }}>
                                <label for="doc1">Rental Agreement showing add-on(s) purchased</label>
                            </div>
                            <div class="checklist-item">
                                <input type="checkbox" id="doc2" name="required_documents[]" value="Photos of damage (tyres, glass, roof, underbody)" {{ in_array('Photos of damage (tyres, glass, roof, underbody)', $requiredDocuments) ? 'checked' : '' }}>
                                <label for="doc2">Photos of damage (tyres, glass, roof, underbody)</label>
                            </div>
                            <div class="checklist-item">
                                <input type="checkbox" id="doc3" name="required_documents[]" value="Inspection report (for tyre/glass claims)" {{ in_array('Inspection report (for tyre/glass claims)', $requiredDocuments) ? 'checked' : '' }}>
                                <label for="doc3">Inspection report (for tyre/glass claims)</label>
                            </div>
                            <div class="checklist-item">
                                <input type="checkbox" id="doc4" name="required_documents[]" value="Police report (for lost/stolen keys or GPS)" {{ in_array('Police report (for lost/stolen keys or GPS)', $requiredDocuments) ? 'checked' : '' }}>
                                <label for="doc4">Police report (for lost/stolen keys or GPS)</label>
                            </div>
                            <div class="checklist-item">
                                <input type="checkbox" id="doc5" name="required_documents[]" value="Completed add-on specific claim form" {{ in_array('Completed add-on specific claim form', $requiredDocuments) ? 'checked' : '' }}>
                                <label for="doc5">Completed add-on specific claim form</label>
                            </div>
                            <div class="checklist-item">
                                <input type="checkbox" id="doc6" name="required_documents[]" value="Driver\'s license copy" {{ in_array("Driver's license copy", $requiredDocuments) ? 'checked' : '' }}>
                                <label for="doc6">Driver's license copy</label>
                            </div>
                            <div class="checklist-item">
                                <input type="checkbox" id="doc7" name="required_documents[]" value="Roadside assistance callout record (if applicable)" {{ in_array('Roadside assistance callout record (if applicable)', $requiredDocuments) ? 'checked' : '' }}>
                                <label for="doc7">Roadside assistance callout record (if applicable)</label>
                            </div>
                            <div class="checklist-item">
                                <input type="checkbox" id="doc8" name="required_documents[]" value="Repair invoice/estimate" {{ in_array('Repair invoice/estimate', $requiredDocuments) ? 'checked' : '' }}>
                                <label for="doc8">Repair invoice/estimate</label>
                            </div>
                            <div class="checklist-item">
                                <input type="checkbox" id="doc9" name="required_documents[]" value="Additional driver documentation (if applicable)" {{ in_array('Additional driver documentation (if applicable)', $requiredDocuments) ? 'checked' : '' }}>
                                <label for="doc9">Additional driver documentation (if applicable)</label>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Save & Publish -->
                <div class="button-group">
                    <button type="button" class="btn btn-submit btn-secondary" onclick="setStatusAndPost('Draft')">
                        <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4" />
                        </svg>
                        Save Draft
                    </button>
                    <button type="button" class="btn btn-submit btn-primary" onclick="setStatusAndPost('Active')">
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
