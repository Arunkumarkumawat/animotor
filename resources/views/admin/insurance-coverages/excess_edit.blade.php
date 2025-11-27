<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excess Protection Insurance - {{ config('app.name') }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --ani-blue: #003c7e;
            --ani-blue-dark: #002856;
            --ani-blue-light: #f0f7ff;
            --purple: #7c3aed;
            --purple-dark: #6d28d9;
            --purple-light: #f5f3ff;
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
            background: linear-gradient(135deg, #faf5ff 0%, #f3e8ff 100%);
            color: var(--grey-900);
            line-height: 1.6;
            padding: 40px 20px;
            min-height: 100vh;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .insurance-panel {
            background: var(--white);
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-lg);
            overflow: hidden;
            margin-bottom: 30px;
            transition: var(--transition);
        }

        .insurance-panel:hover {
            box-shadow: 0 15px 40px rgba(124, 58, 237, 0.2);
        }

        .panel-header {
            background: linear-gradient(135deg, var(--purple) 0%, var(--purple-dark) 100%);
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
            background: linear-gradient(135deg, var(--purple-dark) 0%, #5b21b6 100%);
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

        .section-icon.purple { background: var(--purple-light); color: var(--purple); }
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
            border-color: var(--purple);
            box-shadow: 0 0 0 4px var(--purple-light);
        }

        .form-textarea {
            resize: vertical;
            min-height: 120px;
            line-height: 1.6;
        }

        .form-select[multiple] {
            min-height: 120px;
        }

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
            border-color: var(--purple);
            background: var(--purple-light);
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
            border-color: var(--purple);
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
            border-color: var(--purple);
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
            border-color: var(--purple);
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
            color: var(--purple);
        }

        .tab-button.active {
            color: var(--purple);
            border-bottom-color: var(--purple);
        }

        .tab-content {
            display: none;
        }

        .tab-content.active {
            display: block;
        }

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
            background: var(--purple);
            color: var(--white);
        }

        .btn-primary:hover:not(:disabled) {
            background: var(--purple-dark);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(124, 58, 237, 0.3);
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
        <form action="{{ route('admin.insurance-coverages.update', $policy->id) }}" method="POST" class="insurance-panel" id="excessPanel" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" name="policy_type" value="Excess">
            <input type="hidden" name="status" id="policyStatus" value="draft">

            @if($errors->any())
            <div class="alert alert-danger mb-6 p-4 rounded-md bg-red-50 border-l-4 border-red-500">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-red-500" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <h3 class="text-sm font-medium text-red-800">There {{ $errors->count() > 1 ? 'are' : 'is' }} {{ $errors->count() }} {{ Str::plural('error', $errors->count()) }} with your submission</h3>
                        <div class="mt-2 text-sm text-red-700">
                            <ul class="list-disc pl-5 space-y-1">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            <div class="panel-header">
                <div class="panel-header-left">
                    <div class="panel-icon">🔰</div>
                    <div class="panel-title-group">
                        <div class="panel-title">Excess Protection</div>
                        <div class="panel-subtitle">
                            Reduces or eliminates the renter's payable excess in case of damage
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel-content">
                <div class="section">
                    <div class="section-header">
                        <div class="section-icon purple">📋</div>
                        <div>
                            <div class="section-title">Basic Details</div>
                            <div class="section-hint">Excess Protection policy information and coverage period</div>
                        </div>
                    </div>
                    <div class="form-grid">
                        <div class="form-group">
                            <label class="form-label">
                                Policy Number
                                <span class="info-icon" data-tooltip="Unique Excess Protection policy identifier">i</span>
                            </label>
                            <input type="text" class="form-input" placeholder="e.g., EP-2025-000123" name="policy_number" value="{{ $policy->policy_number }}">
                            @error('policy_number')
                                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label">
                                Insurer Name
                                <span class="info-icon" data-tooltip="Excess Protection insurance provider">i</span>
                            </label>
                            <input type="text" class="form-input" placeholder="e.g., Aviva / AXA / Zurich" name="insurer_name" value="{{ $policy->insurer_name }}">
                            @error('insurer_name')
                                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label">
                                Policy Start Date
                                <span class="info-icon" data-tooltip="Excess Protection coverage begins">i</span>
                            </label>
                            <input type="date" class="form-input" name="policy_start_date" value="{{ $policy->policy_start_date }}">
                            @error('policy_start_date')
                                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label">
                                Policy Expiry Date
                                <span class="info-icon" data-tooltip="Excess Protection coverage ends">i</span>
                            </label>
                            <input type="date" class="form-input" name="policy_end_date" value="{{ $policy->policy_end_date }}">
                            @error('policy_end_date')
                                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                        @php
                            $vehicleClasses = json_decode($policy->vehicle_classes ?? '[]', true);
                        @endphp
                        <div class="form-group">
                            <label class="form-label">
                                Vehicle Class Applicability
                                <span class="info-icon" data-tooltip="Vehicle types eligible for Excess Protection">i</span>
                            </label>
                            @error('vehicle_classes')
                                <span class="text-red-500 text-xs mt-1 block mb-2">{{ $message }}</span>
                            @enderror
                            <div class="checklist">
                                <div class="checklist-item">
                                    <input type="checkbox" id="vehicle_economy" name="vehicle_classes[]" value="economy" {{ in_array('economy', $vehicleClasses) ? 'checked' : '' }}>
                                    <label for="vehicle_economy">Economy</label>
                                </div>
                                <div class="checklist-item">
                                    <input type="checkbox" id="vehicle_compact" name="vehicle_classes[]" value="compact" {{ in_array('compact', $vehicleClasses) ? 'checked' : '' }}>
                                    <label for="vehicle_compact">Compact</label>
                                </div>
                                <div class="checklist-item">
                                    <input type="checkbox" id="vehicle_suv" name="vehicle_classes[]" value="suv" {{ in_array('suv', $vehicleClasses) ? 'checked' : '' }}>
                                    <label for="vehicle_suv">SUV</label>
                                </div>
                                <div class="checklist-item">
                                    <input type="checkbox" id="vehicle_luxury" name="vehicle_classes[]" value="luxury" {{ in_array('luxury', $vehicleClasses) ? 'checked' : '' }}>
                                    <label for="vehicle_luxury">Luxury</label>
                                </div>
                                <div class="checklist-item">
                                    <input type="checkbox" id="vehicle_ev" name="vehicle_classes[]" value="ev" {{ in_array('ev', $vehicleClasses) ? 'checked' : '' }}>
                                    <label for="vehicle_ev">EV / Hybrid</label>
                                </div>
                                <div class="checklist-item">
                                    <input type="checkbox" id="vehicle_mpv" name="vehicle_classes[]" value="mpv" {{ in_array('mpv', $vehicleClasses) ? 'checked' : '' }}>
                                    <label for="vehicle_mpv">MPV</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

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

                <div class="section">
                    <div class="section-header">
                        <div class="section-icon green">✅</div>
                        <div>
                            <div class="section-title">Excess Protection Coverage Matrix</div>
                            <div class="section-hint">What excess amounts are covered or reduced</div>
                        </div>
                    </div>
                    @php
                        $coverageMatrix = json_decode($policy->coverage_matrix ?? '[]', true);
                    @endphp
                    <div class="coverage-grid">
                        <div class="coverage-card">
                            <div class="coverage-card-header">
                                <input type="hidden" name="coverage_matrix[0][name]" value="Excess Reduction">
                                <input type="hidden" name="coverage_matrix[0][status]" class="coverage-item-status" value="{{ isset($coverageMatrix[0]['status']) ? $coverageMatrix[0]['status'] : 'covered' }}">
                                <div class="coverage-name">Excess Reduction</div>
                                <div class="toggle-3state">
                                    <span class="toggle-option covered {{ (isset($coverageMatrix[0]['status']) ? $coverageMatrix[0]['status'] : 'covered') === 'covered' ? 'active' : '' }}" onclick="selectToggle(this, 'covered')">Covered</span>
                                    <span class="toggle-option partial {{ (isset($coverageMatrix[0]['status']) ? $coverageMatrix[0]['status'] : '') === 'partial' ? 'active' : '' }}" onclick="selectToggle(this, 'partial')">Partial</span>
                                    <span class="toggle-option not-covered {{ (isset($coverageMatrix[0]['status']) ? $coverageMatrix[0]['status'] : '') === 'not' ? 'active' : '' }}" onclick="selectToggle(this, 'not')">Not</span>
                                </div>
                            </div>
                            <div class="partial-notes {{ (isset($coverageMatrix[0]['status']) ? $coverageMatrix[0]['status'] : '') === 'partial' ? 'active' : '' }}">
                                <input type="text" class="form-input" name="coverage_matrix[0][partial_notes]" placeholder="e.g., Reduces excess from £1200 → £250" value="{{ isset($coverageMatrix[0]['partial_notes']) ? $coverageMatrix[0]['partial_notes'] : '' }}">
                            </div>
                        </div>

                        <div class="coverage-card">
                            <div class="coverage-card-header">
                                <input type="hidden" name="coverage_matrix[1][name]" value="Full Excess Waiver">
                                <input type="hidden" name="coverage_matrix[1][status]" class="coverage-item-status" value="{{ isset($coverageMatrix[1]['status']) ? $coverageMatrix[1]['status'] : 'covered' }}">
                                <div class="coverage-name">Full Excess Waiver</div>
                                <div class="toggle-3state">
                                    <span class="toggle-option covered {{ (isset($coverageMatrix[1]['status']) ? $coverageMatrix[1]['status'] : 'covered') === 'covered' ? 'active' : '' }}" onclick="selectToggle(this, 'covered')">Covered</span>
                                    <span class="toggle-option partial {{ (isset($coverageMatrix[1]['status']) ? $coverageMatrix[1]['status'] : '') === 'partial' ? 'active' : '' }}" onclick="selectToggle(this, 'partial')">Partial</span>
                                    <span class="toggle-option not-covered {{ (isset($coverageMatrix[1]['status']) ? $coverageMatrix[1]['status'] : '') === 'not' ? 'active' : '' }}" onclick="selectToggle(this, 'not')">Not</span>
                                </div>
                            </div>
                            <div class="partial-notes {{ (isset($coverageMatrix[1]['status']) ? $coverageMatrix[1]['status'] : '') === 'partial' ? 'active' : '' }}">
                                <input type="text" class="form-input" name="coverage_matrix[1][partial_notes]" placeholder="e.g., Removes entire excess" value="{{ isset($coverageMatrix[1]['partial_notes']) ? $coverageMatrix[1]['partial_notes'] : '' }}">
                            </div>
                        </div>

                        <div class="coverage-card">
                            <div class="coverage-card-header">
                                <input type="hidden" name="coverage_matrix[2][name]" value="Single Incident Excess Cover">
                                <input type="hidden" name="coverage_matrix[2][status]" class="coverage-item-status" value="{{ isset($coverageMatrix[2]['status']) ? $coverageMatrix[2]['status'] : 'covered' }}">
                                <div class="coverage-name">Single Incident Excess Cover</div>
                                <div class="toggle-3state">
                                    <span class="toggle-option covered {{ (isset($coverageMatrix[2]['status']) ? $coverageMatrix[2]['status'] : 'covered') === 'covered' ? 'active' : '' }}" onclick="selectToggle(this, 'covered')">Covered</span>
                                    <span class="toggle-option partial {{ (isset($coverageMatrix[2]['status']) ? $coverageMatrix[2]['status'] : '') === 'partial' ? 'active' : '' }}" onclick="selectToggle(this, 'partial')">Partial</span>
                                    <span class="toggle-option not-covered {{ (isset($coverageMatrix[2]['status']) ? $coverageMatrix[2]['status'] : '') === 'not' ? 'active' : '' }}" onclick="selectToggle(this, 'not')">Not</span>
                                </div>
                            </div>
                            <div class="partial-notes {{ (isset($coverageMatrix[2]['status']) ? $coverageMatrix[2]['status'] : '') === 'partial' ? 'active' : '' }}">
                                <input type="text" class="form-input" name="coverage_matrix[2][partial_notes]" placeholder="e.g., Up to £2500" value="{{ isset($coverageMatrix[2]['partial_notes']) ? $coverageMatrix[2]['partial_notes'] : '' }}">
                            </div>
                        </div>

                        <div class="coverage-card">
                            <div class="coverage-card-header">
                                <input type="hidden" name="coverage_matrix[3][name]" value="Multiple Incidents Cover">
                                <input type="hidden" name="coverage_matrix[3][status]" class="coverage-item-status" value="{{ isset($coverageMatrix[3]['status']) ? $coverageMatrix[3]['status'] : 'covered' }}">
                                <div class="coverage-name">Multiple Incidents Cover</div>
                                <div class="toggle-3state">
                                    <span class="toggle-option covered {{ (isset($coverageMatrix[3]['status']) ? $coverageMatrix[3]['status'] : 'covered') === 'covered' ? 'active' : '' }}" onclick="selectToggle(this, 'covered')">Covered</span>
                                    <span class="toggle-option partial {{ (isset($coverageMatrix[3]['status']) ? $coverageMatrix[3]['status'] : '') === 'partial' ? 'active' : '' }}" onclick="selectToggle(this, 'partial')">Partial</span>
                                    <span class="toggle-option not-covered {{ (isset($coverageMatrix[3]['status']) ? $coverageMatrix[3]['status'] : '') === 'not' ? 'active' : '' }}" onclick="selectToggle(this, 'not')">Not</span>
                                </div>  
                            </div>
                            <div class="partial-notes {{ (isset($coverageMatrix[3]['status']) ? $coverageMatrix[3]['status'] : '') === 'partial' ? 'active' : '' }}">
                                <input type="text" class="form-input" name="coverage_matrix[3][partial_notes]" placeholder="Maximum 2 incidents per rental period" value="{{ isset($coverageMatrix[3]['partial_notes']) ? $coverageMatrix[3]['partial_notes'] : '' }}">
                            </div>
                        </div>

                        <div class="coverage-card">
                            <div class="coverage-card-header">
                                <input type="hidden" name="coverage_matrix[4][name]" value="Requires CDW Active?">
                                <input type="hidden" name="coverage_matrix[4][status]" class="coverage-item-status" value="{{ isset($coverageMatrix[4]['status']) ? $coverageMatrix[4]['status'] : 'covered' }}">
                                <div class="coverage-name">Requires CDW Active?</div>
                                <div class="toggle-3state">
                                    <span class="toggle-option covered {{ (isset($coverageMatrix[4]['status']) ? $coverageMatrix[4]['status'] : 'covered') === 'covered' ? 'active' : '' }}" onclick="selectToggle(this, 'covered')">Yes</span>
                                    <span class="toggle-option partial {{ (isset($coverageMatrix[4]['status']) ? $coverageMatrix[4]['status'] : '') === 'partial' ? 'active' : '' }}" onclick="selectToggle(this, 'partial')">Optional</span>
                                    <span class="toggle-option not-covered {{ (isset($coverageMatrix[4]['status']) ? $coverageMatrix[4]['status'] : '') === 'not' ? 'active' : '' }}" onclick="selectToggle(this, 'not')">No</span>
                                </div>
                            </div>
                            <div class="partial-notes {{ (isset($coverageMatrix[4]['status']) ? $coverageMatrix[4]['status'] : '') === 'partial' ? 'active' : '' }}">
                                <input type="text" class="form-input" name="coverage_matrix[4][partial_notes]" placeholder="e.g., Must be combined with CDW" value="{{ isset($coverageMatrix[4]['partial_notes']) ? $coverageMatrix[4]['partial_notes'] : '' }}">
                            </div>
                        </div>

                        <div class="coverage-card">
                            <div class="coverage-card-header">
                                <input type="hidden" name="coverage_matrix[5][name]" value="Collision Excess Coverage">
                                <input type="hidden" name="coverage_matrix[5][status]" class="coverage-item-status" value="{{ isset($coverageMatrix[5]['status']) ? $coverageMatrix[5]['status'] : 'covered' }}">
                                <div class="coverage-name">Collision Excess Coverage</div>
                                <div class="toggle-3state">
                                    <span class="toggle-option covered {{ (isset($coverageMatrix[5]['status']) ? $coverageMatrix[5]['status'] : 'covered') === 'covered' ? 'active' : '' }}" onclick="selectToggle(this, 'covered')">Covered</span>
                                    <span class="toggle-option partial {{ (isset($coverageMatrix[5]['status']) ? $coverageMatrix[5]['status'] : '') === 'partial' ? 'active' : '' }}" onclick="selectToggle(this, 'partial')">Partial</span>
                                    <span class="toggle-option not-covered {{ (isset($coverageMatrix[5]['status']) ? $coverageMatrix[5]['status'] : '') === 'not' ? 'active' : '' }}" onclick="selectToggle(this, 'not')">Not</span>
                                </div>
                            </div>
                            <div class="partial-notes {{ (isset($coverageMatrix[5]['status']) ? $coverageMatrix[5]['status'] : '') === 'partial' ? 'active' : '' }}">
                                <input type="text" class="form-input" name="coverage_matrix[5][partial_notes]" placeholder="Covers excess on collision claims" value="{{ isset($coverageMatrix[5]['partial_notes']) ? $coverageMatrix[5]['partial_notes'] : '' }}">
                            </div>
                        </div>

                        <div class="coverage-card">
                            <div class="coverage-card-header">
                                <input type="hidden" name="coverage_matrix[6][name]" value="Theft Excess Coverage">
                                <input type="hidden" name="coverage_matrix[6][status]" class="coverage-item-status" value="{{ isset($coverageMatrix[6]['status']) ? $coverageMatrix[6]['status'] : 'covered' }}">
                                <div class="coverage-name">Theft Excess Coverage</div>
                                <div class="toggle-3state">
                                    <span class="toggle-option covered {{ (isset($coverageMatrix[6]['status']) ? $coverageMatrix[6]['status'] : 'covered') === 'covered' ? 'active' : '' }}" onclick="selectToggle(this, 'covered')">Covered</span>
                                    <span class="toggle-option partial {{ (isset($coverageMatrix[6]['status']) ? $coverageMatrix[6]['status'] : '') === 'partial' ? 'active' : '' }}" onclick="selectToggle(this, 'partial')">Partial</span>
                                    <span class="toggle-option not-covered {{ (isset($coverageMatrix[6]['status']) ? $coverageMatrix[6]['status'] : '') === 'not' ? 'active' : '' }}" onclick="selectToggle(this, 'not')">Not</span>
                                </div>
                            </div>
                            <div class="partial-notes {{ (isset($coverageMatrix[6]['status']) ? $coverageMatrix[6]['status'] : '') === 'partial' ? 'active' : '' }}">
                                <input type="text" class="form-input" name="coverage_matrix[6][partial_notes]" placeholder="Covers excess on theft claims" value="{{ isset($coverageMatrix[6]['partial_notes']) ? $coverageMatrix[6]['partial_notes'] : '' }}">
                            </div>
                        </div>

                        <div class="coverage-card">
                            <div class="coverage-card-header">
                                <input type="hidden" name="coverage_matrix[7][name]" value="Windscreen Excess Coverage">
                                <input type="hidden" name="coverage_matrix[7][status]" class="coverage-item-status" value="{{ isset($coverageMatrix[7]['status']) ? $coverageMatrix[7]['status'] : 'covered' }}">
                                <div class="coverage-name">Windscreen Excess Coverage</div>
                                <div class="toggle-3state">
                                    <span class="toggle-option covered {{ (isset($coverageMatrix[7]['status']) ? $coverageMatrix[7]['status'] : 'covered') === 'covered' ? 'active' : '' }}" onclick="selectToggle(this, 'covered')">Covered</span>
                                    <span class="toggle-option partial {{ (isset($coverageMatrix[7]['status']) ? $coverageMatrix[7]['status'] : '') === 'partial' ? 'active' : '' }}" onclick="selectToggle(this, 'partial')">Partial</span>
                                    <span class="toggle-option not-covered {{ (isset($coverageMatrix[7]['status']) ? $coverageMatrix[7]['status'] : '') === 'not' ? 'active' : '' }}" onclick="selectToggle(this, 'not')">Not</span>
                                </div>
                            </div>
                            <div class="partial-notes {{ (isset($coverageMatrix[7]['status']) ? $coverageMatrix[7]['status'] : '') === 'partial' ? 'active' : '' }}">
                                <input type="text" class="form-input" name="coverage_matrix[7][partial_notes]" placeholder="Up to £150 excess covered" value="{{ isset($coverageMatrix[7]['partial_notes']) ? $coverageMatrix[7]['partial_notes'] : '' }}">
                            </div>
                        </div>

                        <div class="coverage-card">
                            <div class="coverage-card-header">
                                <input type="hidden" name="coverage_matrix[8][name]" value="Tyre Damage Excess">
                                <input type="hidden" name="coverage_matrix[8][status]" class="coverage-item-status" value="{{ isset($coverageMatrix[8]['status']) ? $coverageMatrix[8]['status'] : 'covered' }}">
                                <div class="coverage-name">Tyre Damage Excess</div>
                                <div class="toggle-3state">
                                    <span class="toggle-option covered {{ (isset($coverageMatrix[8]['status']) ? $coverageMatrix[8]['status'] : 'covered') === 'covered' ? 'active' : '' }}" onclick="selectToggle(this, 'covered')">Covered</span>
                                    <span class="toggle-option partial {{ (isset($coverageMatrix[8]['status']) ? $coverageMatrix[8]['status'] : '') === 'partial' ? 'active' : '' }}" onclick="selectToggle(this, 'partial')">Partial</span>
                                    <span class="toggle-option not-covered {{ (isset($coverageMatrix[8]['status']) ? $coverageMatrix[8]['status'] : '') === 'not' ? 'active' : '' }}" onclick="selectToggle(this, 'not')">Not</span>
                                </div>
                            </div>
                            <div class="partial-notes {{ (isset($coverageMatrix[8]['status']) ? $coverageMatrix[8]['status'] : '') === 'partial' ? 'active' : '' }}">
                                <input type="text" class="form-input" name="coverage_matrix[8][partial_notes]" placeholder="Up to £100 per tyre" value="{{ isset($coverageMatrix[8]['partial_notes']) ? $coverageMatrix[8]['partial_notes'] : '' }}">
                            </div>
                        </div>

                        <div class="coverage-card">
                            <div class="coverage-card-header">
                                <input type="hidden" name="coverage_matrix[9][name]" value="Admin Fee Waiver">
                                <input type="hidden" name="coverage_matrix[9][status]" class="coverage-item-status" value="{{ isset($coverageMatrix[9]['status']) ? $coverageMatrix[9]['status'] : 'covered' }}">
                                <div class="coverage-name">Admin Fee Waiver</div>
                                <div class="toggle-3state">
                                    <span class="toggle-option covered {{ (isset($coverageMatrix[9]['status']) ? $coverageMatrix[9]['status'] : 'covered') === 'covered' ? 'active' : '' }}" onclick="selectToggle(this, 'covered')">Covered</span>
                                    <span class="toggle-option partial {{ (isset($coverageMatrix[9]['status']) ? $coverageMatrix[9]['status'] : '') === 'partial' ? 'active' : '' }}" onclick="selectToggle(this, 'partial')">Partial</span>
                                    <span class="toggle-option not-covered {{ (isset($coverageMatrix[9]['status']) ? $coverageMatrix[9]['status'] : '') === 'not' ? 'active' : '' }}" onclick="selectToggle(this, 'not')">Not</span>
                                </div>
                            </div>
                            <div class="partial-notes {{ (isset($coverageMatrix[9]['status']) ? $coverageMatrix[9]['status'] : '') === 'partial' ? 'active' : '' }}">
                                <input type="text" class="form-input" name="coverage_matrix[9][partial_notes]" placeholder="All admin fees waived on claims" value="{{ isset($coverageMatrix[9]['partial_notes']) ? $coverageMatrix[9]['partial_notes'] : '' }}">
                            </div>
                        </div>
                    </div>
                </div>

                @php
                    $whatNotCovered = json_decode($policy->what_not_covered ?? '[]', true);
                @endphp
                <div class="section">
                    <div class="section-header">
                        <div class="section-icon red">❌</div>
                        <div>
                            <div class="section-title">What is NOT Covered</div>
                            <div class="section-hint">Explicit Excess Protection exclusions</div>
                        </div>
                    </div>
                    @error('what_not_covered')
                        <span class="text-red-500 text-xs mt-1 block mb-2">{{ $message }}</span>
                    @enderror
                    <div class="checklist">
                        <div class="checklist-item">
                            <input type="checkbox" id="excl1" name="what_not_covered[]" value="Negligent driving / reckless behaviour" {{ in_array('Negligent driving / reckless behaviour', $whatNotCovered) ? 'checked' : '' }}>
                            <label for="excl1">Negligent driving / reckless behaviour</label>
                        </div>
                        <div class="checklist-item">
                            <input type="checkbox" id="excl2" name="what_not_covered[]" value="DUI / driving under influence" {{ in_array('DUI / driving under influence', $whatNotCovered) ? 'checked' : '' }}>
                            <label for="excl2">DUI / driving under influence</label>
                        </div>
                        <div class="checklist-item">
                            <input type="checkbox" id="excl3" name="what_not_covered[]" value="Tyres, wheels (unless separate product added)" {{ in_array('Tyres, wheels (unless separate product added)', $whatNotCovered) ? 'checked' : '' }}>
                            <label for="excl3">Tyres, wheels (unless separate product added)</label>
                        </div>
                        <div class="checklist-item">
                            <input type="checkbox" id="excl4" name="what_not_covered[]" value="Lost keys (separate coverage)" {{ in_array('Lost keys (separate coverage)', $whatNotCovered) ? 'checked' : '' }}>
                            <label for="excl4">Lost keys (separate coverage)</label>
                        </div>
                        <div class="checklist-item">
                            <input type="checkbox" id="excl5" name="what_not_covered[]" value="Theft without police report" {{ in_array('Theft without police report', $whatNotCovered) ? 'checked' : '' }}>
                            <label for="excl5">Theft without police report</label>
                        </div>
                        <div class="checklist-item">
                            <input type="checkbox" id="excl6" name="what_not_covered[]" value="Off-road usage" {{ in_array('Off-road usage', $whatNotCovered) ? 'checked' : '' }}>
                            <label for="excl6">Off-road usage</label>
                        </div>
                        <div class="checklist-item">
                            <input type="checkbox" id="excl7" name="what_not_covered[]" value="Unauthorized driver use" {{ in_array('Unauthorized driver use', $whatNotCovered) ? 'checked' : '' }}>
                            <label for="excl7">Unauthorized driver use</label>
                        </div>
                        <div class="checklist-item">
                            <input type="checkbox" id="excl8" name="what_not_covered[]" value="Mechanical breakdown" {{ in_array('Mechanical breakdown', $whatNotCovered) ? 'checked' : '' }}>
                            <label for="excl8">Mechanical breakdown</label>
                        </div>
                        <div class="checklist-item">
                            <input type="checkbox" id="excl9" name="what_not_covered[]" value="Pre-existing damage" {{ in_array('Pre-existing damage', $whatNotCovered) ? 'checked' : '' }}>
                            <label for="excl9">Pre-existing damage</label>
                        </div>
                        <div class="checklist-item">
                            <input type="checkbox" id="excl10" name="what_not_covered[]" value="Interior damage (burns, tears)" {{ in_array('Interior damage (burns, tears)', $whatNotCovered) ? 'checked' : '' }}>
                            <label for="excl10">Interior damage (burns, tears)</label>
                        </div>
                    </div>
                </div>

                <div class="section">
                    <div class="section-header">
                        <div class="section-icon yellow">⚠️</div>
                        <div>
                            <div class="section-title">Key Exclusions</div>
                            <div class="section-hint">These exclusions appear on customer certificates</div>
                        </div>
                    </div>
                    <textarea class="form-textarea" name="key_exclusions" placeholder="Excess Protection exclusions wording for certificates...">{{ $policy->key_exclusions }}</textarea>
                    @error('key_exclusions')
                        <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <div class="section">
                    <div class="section-header">
                        <div class="section-icon purple">💰</div>
                        <div>
                            <div class="section-title">Financial Limits</div>
                            <div class="section-hint">Excess Protection amounts and rates</div>
                        </div>
                    </div>
                    <div class="financial-grid">
                        <div class="financial-field">
                            <div class="financial-label">Excess After Protection</div>
                            <div class="financial-value">
                                <span class="currency-symbol">£</span>
                                <input type="number" class="financial-input" name="excess_amount" min="0" id="excessAfter" value="{{ $policy->excess_amount }}">
                            </div>
                            <div class="mt-2" id="noExcessBadge" style="display: {{ $policy->excess_amount == 0 ? 'block' : 'none' }};">
                                <span class="no-excess-badge">NO EXCESS</span>
                            </div>
                            @error('excess_amount')
                                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="financial-field">
                            <div class="financial-label">Max Payable Excess</div>
                            <div class="financial-value">
                                <span class="currency-symbol">£</span>
                                <input type="number" class="financial-input" name="max_claim_limit" min="0" value="{{ $policy->max_claim_limit }}">
                            </div>
                            @error('max_claim_limit')
                                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="financial-field">
                            <div class="financial-label">Daily Rate</div>
                            <div class="financial-value">
                                <span class="currency-symbol">£</span>
                                <input type="number" class="financial-input" name="daily_rate" min="0" step="0.01" value="{{ $policy->daily_rate }}">
                            </div>
                            @error('daily_rate')
                                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                @php 
                    $documents = json_decode($policy->documents ?? '[]', true);
                @endphp
                <div class="section">
                    <div class="section-header">
                        <div class="section-icon purple">📄</div>
                        <div>
                            <div class="section-title">Document Uploads</div>
                            <div class="section-hint">Upload all required Excess Protection documents (PDF only)</div>
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

                <div class="section">
                    <div class="section-header">
                        <div class="section-icon purple">📞</div>
                        <div>
                            <div class="section-title">Excess Protection Claim Instructions</div>
                            <div class="section-hint">Claims process and required documentation</div>
                        </div>
                    </div>
                    <div class="tabs-nav">
                        <button type="button" class="tab-button active" onclick="switchTab(event, 'tab-instructions')">Customer Instructions</button>
                        <button type="button" class="tab-button" onclick="switchTab(event, 'tab-contact')">Claims Contact</button>
                        <button type="button" class="tab-button" onclick="switchTab(event, 'tab-documents')">Required Documents</button>
                    </div>

                    <div class="tab-content active" id="tab-instructions">
                        <textarea class="form-textarea" name="customer_instruction" placeholder="Enter step-by-step claims instructions for customers...">{{ $policy->customer_instruction }}</textarea>
                        @error('customer_instruction')
                            <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                        @enderror
                    </div>

                    @php
                        $claims_contact = json_decode($policy->claims_contact ?? '[]', true);
                    @endphp

                    <div class="tab-content" id="tab-contact">
                        <div class="form-grid">
                            <div class="form-group">
                                <label class="form-label">Excess Protection Claims Email</label>
                                <input type="email" class="form-input" name="claims_contact[email]" value="{{ isset($claims_contact['email']) ? $claims_contact['email'] : old('claims_contact.email') }}">
                                @error('claims_contact.email')
                                    <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-label">Claims Phone</label>
                                <input type="tel" class="form-input" name="claims_contact[phone]" value="{{ isset($claims_contact['phone']) ? $claims_contact['phone'] : old('claims_contact.phone') }}">
                                @error('claims_contact.phone')
                                    <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-label">Claims Address</label>
                                <input type="text" class="form-input" name="claims_contact[address]" value="{{ isset($claims_contact['address']) ? $claims_contact['address'] : old('claims_contact.address') }}">
                                @error('claims_contact.address')
                                    <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-label">Claims Portal URL</label>
                                <input type="url" class="form-input" name="claims_contact[portal_url]" value="{{ isset($claims_contact['portal_url']) ? $claims_contact['portal_url'] : old('claims_contact.portal_url') }}">
                                @error('claims_contact.portal_url')
                                    <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    @php 
                        $required_documents = json_decode($policy->required_documents ?? '[]', true);
                    @endphp
                    <div class="tab-content" id="tab-documents">
                        @error('required_documents')
                            <span class="text-red-500 text-xs mt-1 block mb-2">{{ $message }}</span>
                        @enderror
                        <div class="checklist">
                            <div class="checklist-item">
                                <input type="checkbox" id="doc1" name="required_documents[]" value="Rental Agreement showing Excess Protection purchased" {{ in_array('Rental Agreement showing Excess Protection purchased', $required_documents) ? 'checked' : '' }}>
                                <label for="doc1">Rental Agreement showing Excess Protection purchased</label>
                            </div>
                            <div class="checklist-item">
                                <input type="checkbox" id="doc2" name="required_documents[]" value="Primary CDW/Theft claim settlement letter" {{ in_array('Primary CDW/Theft claim settlement letter', $required_documents) ? 'checked' : '' }}>
                                <label for="doc2">Primary CDW/Theft claim settlement letter</label>
                            </div>
                            <div class="checklist-item">
                                <input type="checkbox" id="doc3" name="required_documents[]" value="Proof of excess payment (bank statement/receipt)" {{ in_array('Proof of excess payment (bank statement/receipt)', $required_documents) ? 'checked' : '' }}>
                                <label for="doc3">Proof of excess payment (bank statement/receipt)</label>
                            </div>
                            <div class="checklist-item">
                                <input type="checkbox" id="doc4" name="required_documents[]" value="Completed Excess Protection reimbursement form" {{ in_array('Completed Excess Protection reimbursement form', $required_documents) ? 'checked' : '' }}>
                                <label for="doc4">Completed Excess Protection reimbursement form</label>
                            </div>
                            <div class="checklist-item">
                                <input type="checkbox" id="doc5" name="required_documents[]" value="Original incident photos and police report" {{ in_array('Original incident photos and police report', $required_documents) ? 'checked' : '' }}>
                                <label for="doc5">Original incident photos and police report</label>
                            </div>
                            <div class="checklist-item">
                                <input type="checkbox" id="doc6" name="required_documents[]" value="Driver's license copy" {{ in_array("Driver's license copy", $required_documents) ? 'checked' : '' }}>
                                <label for="doc6">Driver's license copy</label>
                            </div>
                            <div class="checklist-item">
                                <input type="checkbox" id="doc7" name="required_documents[]" value="Repair invoice (if available)" {{ in_array('Repair invoice (if available)', $required_documents) ? 'checked' : '' }}>
                                <label for="doc7">Repair invoice (if available)</label>
                            </div>
                            <div class="checklist-item">
                                <input type="checkbox" id="doc8" name="required_documents[]" value="Insurance correspondence" {{ in_array('Insurance correspondence', $required_documents) ? 'checked' : '' }}>
                                <label for="doc8">Insurance correspondence</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="button-group">
                    <button type="button" class="btn btn-submit btn-secondary" onclick="setStatusAndPost('Draft')">
                        <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4" />
                        </svg>
                        Save as Draft
                    </button>
                    <button type="submit" class="btn btn-submit btn-primary" onclick="setStatusAndPost('Active')">
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
