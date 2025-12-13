<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxHZo4ZfiS0oFY6+ZjiDlOqHp4W5n3KLB+n7Wl7xjfKvmVvN" crossorigin="anonymous">
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
        margin-top: 0;
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
    
    .text-red-500 {
        color: red;
        font-size: 12px;
    }
</style>

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
                <div class="form-value">{{ $policy->policy_number ?? 'Not set' }}</div>
            </div>
            <div class="form-group">
                <label class="form-label">
                    Insurer Name
                    <span class="info-icon" data-tooltip="Optional Add-Ons insurance provider">i</span>
                </label>
                <div class="form-value">{{ $policy->insurer_name ?? 'Not set' }}</div>
            </div>
            <div class="form-group">
                <label class="form-label">
                    Policy Start Date
                    <span class="info-icon" data-tooltip="Add-Ons coverage begins">i</span>
                </label>
                <div class="form-value">{{ $policy->policy_start_date ? date('M d, Y', strtotime($policy->policy_start_date)) : 'Not set' }}</div>
            </div>
            <div class="form-group">
                <label class="form-label">
                    Policy Expiry Date
                    <span class="info-icon" data-tooltip="Add-Ons coverage ends">i</span>
                </label>
                <div class="form-value">{{ $policy->policy_end_date ? date('M d, Y', strtotime($policy->policy_end_date)) : 'Not set' }}</div>
            </div>
            @php
                $vehicleClasses = json_decode($policy->vehicle_classes ?? '[]', true);
            @endphp
            <div class="form-group">
                <label class="form-label">
                    Vehicle Class Applicability
                    <span class="info-icon" data-tooltip="Vehicle types eligible for Add-Ons">i</span>
                </label>
                <div class="form-value">
                    @if(!empty($vehicleClasses))
                        @foreach($vehicleClasses as $class)
                            <span class="badge badge-primary">{{ ucfirst($class) }}</span>
                        @endforeach
                    @else
                        <span class="text-muted">No vehicle classes specified</span>
                    @endif
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
                <div class="section-hint">Optional Add-Ons provider logo</div>
            </div>
        </div>
        <div class="file-preview" id="logoPreview">
            <div class="file-preview-icon">
                @if($policy->insurer_logo)
                    <img src="{{ asset('storage/' . $policy->insurer_logo) }}" alt="Insurer Logo" style="width: 100px; height: 100px; object-fit: cover; border-radius: 8px;">
                @else
                    <div class="no-logo-placeholder">🖼️ No logo uploaded</div>
                @endif
            </div>
            <div class="file-preview-info">
                <div class="file-preview-name">{{ $policy->insurer_logo ? 'Logo uploaded' : 'No logo available' }}</div>
            </div>
        </div>
    </div>

    <!-- Section 3: Coverage Matrix -->
    <div class="section">
        <div class="section-header">
            <div class="section-icon green">✅</div>
            <div>
                <div class="section-title">Coverage Matrix</div>
                <div class="section-hint">Coverage details for each add-on</div>
            </div>
        </div>
        @php
            $coverageMatrix = json_decode($policy->coverage_matrix ?? '[]', true);
        @endphp
        <div class="coverage-grid">
            @foreach($coverageMatrix as $index => $item)
                <div class="coverage-card">
                    <div class="coverage-card-header">
                        <div class="coverage-name">{{ $item['name'] ?? 'Unnamed Coverage' }}</div>
                        <div class="coverage-status">
                            @php
                                $status = $item['status'] ?? 'not_covered';
                                $statusClass = $status === 'covered' ? 'status-covered' : 
                                            ($status === 'partial' ? 'status-partial' : 'status-not-covered');
                                $statusText = $status === 'covered' ? 'Covered' : 
                                            ($status === 'partial' ? 'Partial' : 'Not Covered');
                            @endphp
                            <span class="status-badge {{ $statusClass }}">{{ $statusText }}</span>
                        </div>
                    </div>
                    @if(!empty($item['notes']))
                        <div class="coverage-notes">
                            <strong>Notes:</strong> {{ $item['notes'] }}
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
    </div>

    <!-- Section 4: What is NOT Covered -->
    <div class="section">
        <div class="section-header">
            <div class="section-icon red">❌</div>
            <div>
                <div class="section-title">What is NOT Covered</div>
                <div class="section-hint">Exclusions that apply to all coverages</div>
            </div>
        </div>
        @php
            $whatNotCovered = json_decode($policy->what_not_covered ?? '[]', true) ?: [];
        @endphp
        <ul class="checklist">
            @forelse($whatNotCovered as $item)
                <li class="checklist-item">{{ $item }}</li>
            @empty
                <li class="text-muted">No exclusions specified</li>
            @endforelse
        </ul>
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
        <div class="form-textarea readonly">
            {{ $policy->key_exclusions ?: 'No key exclusions specified.' }}
        </div>
    </div>

    <!-- Section 6: Financial Limits -->
    <div class="section">
        <div class="section-header">
            <div class="section-icon teal">💰</div>
            <div>
                <div class="section-title">Financial Limits</div>
                <div class="section-hint">Financial terms and conditions</div>
            </div>
        </div>
        <div class="financial-grid">
            <div class="financial-field">
                <div class="financial-label">Excess Amount</div>
                <div class="financial-value">
                    <span class="currency-symbol">{{ settings('currency_symbol') }}</span>
                    <span class="financial-display">
                        {{ $policy->excess_amount !== null ? number_format($policy->excess_amount, 2) : 'N/A' }}
                    </span>
                </div>
                @if(($policy->excess_amount ?? 0) == 0)
                    <div class="no-excess-badge">NO EXCESS</div>
                @endif
            </div>
            <div class="financial-field">
                <div class="financial-label">Max Claim Limit (Per Item)</div>
                <div class="financial-value">
                    <span class="currency-symbol">{{ settings('currency_symbol') }}</span>
                    <span class="financial-display">
                        {{ $policy->max_claim_limit !== null ? number_format($policy->max_claim_limit, 2) : 'N/A' }}
                    </span>
                </div>
            </div>
            <div class="financial-field">
                <div class="financial-label">Daily Rate</div>
                <div class="financial-value">
                    <span class="currency-symbol">{{ settings('currency_symbol') }}</span>
                    <span class="financial-display">
                        {{ $policy->daily_rate !== null ? number_format($policy->daily_rate, 2) : 'N/A' }}
                    </span>
                </div>
            </div>
        </div>
    </div>

    <!-- Section 7: Documents -->
    <div class="section">
        <div class="section-header">
            <div class="section-icon blue">📄</div>
            <div>
                <div class="section-title">Policy Documents</div>
                <div class="section-hint">Documents available for download</div>
            </div>
        </div>
        @php
            $documents = json_decode($policy->documents ?? '[]', true);
        @endphp
        <div class="documents-grid">
            @foreach([
                'policy_schedule' => 'Policy Schedule',
                'terms_conditions' => 'Terms & Conditions',
                'policy_wording' => 'Policy Wording',
                'insurance_certificate' => 'Insurance Certificate'
            ] as $key => $label)
                <div class="document-item">
                    <div class="document-icon">
                        @if(!empty($documents[$key]))
                            <a href="{{ asset('storage/' . $documents[$key]) }}" target="_blank">📄</a>
                        @else
                            📄
                        @endif
                    </div>
                    <div class="document-info">
                        <div class="document-name">{{ $label }}</div>
                        <div class="document-status">
                            @if(!empty($documents[$key]))
                                <span class="status-dot uploaded"></span>
                                <span>Uploaded</span>
                            @else
                                <span class="status-dot missing"></span>
                                <span>Not uploaded</span>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Section 8: Claim Instructions -->
    <div class="section">
        <div class="section-header">
            <div class="section-icon purple">📝</div>
            <div>
                <div class="section-title">Claim Instructions</div>
                <div class="section-hint">Information for customers making a claim</div>
            </div>
        </div>
        <div class="tabs">
            <div class="tab-buttons">
                <button type="button" class="tab-button active" data-tab="instructions">Instructions</button>
                <button type="button" class="tab-button" data-tab="contact">Contact Info</button>
                <button type="button" class="tab-button" data-tab="documents">Required Documents</button>
            </div>
            
            <div class="tab-content active" id="tab-instructions">
                <div class="form-textarea readonly">
                    {{ $policy->claim_instructions ?? 'No claim instructions provided.' }}
                </div>
            </div>
            
            <div class="tab-content" id="tab-contact">
                @php
                    $claimContact = json_decode($policy->claim_contact ?? '[]', true);
                @endphp
                <div class="form-grid">
                    <div class="form-group">
                        <label class="form-label">Claims Email</label>
                        <div class="form-value">{{ $claimContact['email'] ?? 'N/A' }}</div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Claims Phone</label>
                        <div class="form-value">{{ $claimContact['phone'] ?? 'N/A' }}</div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Emergency Number</label>
                        <div class="form-value">{{ $claimContact['emergency_phone'] ?? 'N/A' }}</div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Business Hours</label>
                        <div class="form-value">{{ $claimContact['business_hours'] ?? 'N/A' }}</div>
                    </div>
                </div>
            </div>
            
            <div class="tab-content" id="tab-documents">
                @php
                    $requiredDocs = json_decode($policy->required_documents ?? '[]', true) ?: [];
                @endphp
                <ul class="checklist">
                    @forelse($requiredDocs as $doc)
                        <li class="checklist-item">{{ $doc }}</li>
                    @empty
                        <li class="text-muted">No required documents specified</li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
</div>

<style>
    /* Add these styles to make it look clean */
    .form-value {
        padding: 8px 0;
        min-height: 38px;
        display: flex;
        align-items: center;
    }
    .readonly {
        background: #f8f9fa;
        border: 1px solid #e9ecef;
        border-radius: 4px;
        padding: 12px;
        min-height: 100px;
        white-space: pre-line;
    }
    .status-badge {
        padding: 4px 8px;
        border-radius: 12px;
        font-size: 12px;
        font-weight: 600;
    }
    .status-covered {
        background: #d4edda;
        color: #155724;
    }
    .status-partial {
        background: #fff3cd;
        color: #856404;
    }
    .status-not-covered {
        background: #f8d7da;
        color: #721c24;
    }
    .no-excess-badge {
        display: inline-block;
        background: #e2e3e5;
        color: #383d41;
        padding: 4px 8px;
        border-radius: 4px;
        font-size: 12px;
        font-weight: 600;
        margin-top: 8px;
    }
    .document-item {
        display: flex;
        align-items: center;
        padding: 12px;
        border: 1px solid #e9ecef;
        border-radius: 4px;
        margin-bottom: 8px;
    }
    .document-icon {
        font-size: 24px;
        margin-right: 12px;
    }
    .document-info {
        flex: 1;
    }
    .document-name {
        font-weight: 500;
        margin-bottom: 4px;
    }
    .document-status {
        display: flex;
        align-items: center;
        font-size: 13px;
        color: #6c757d;
    }
    .status-dot {
        width: 8px;
        height: 8px;
        border-radius: 50%;
        display: inline-block;
        margin-right: 6px;
    }
    .status-dot.uploaded {
        background: #28a745;
    }
    .status-dot.missing {
        background: #dc3545;
    }
    .checklist {
        list-style: none;
        padding: 0;
        margin: 0;
    }
    .checklist-item {
        padding: 8px 0;
        border-bottom: 1px solid #f1f1f1;
    }
    .checklist-item:last-child {
        border-bottom: none;
    }
</style>

<script>
    // Simple tab functionality
    document.addEventListener('DOMContentLoaded', function() {
        const tabButtons = document.querySelectorAll('.tab-button');
        tabButtons.forEach(button => {
            button.addEventListener('click', function() {
                // Remove active class from all buttons and contents
                document.querySelectorAll('.tab-button').forEach(btn => btn.classList.remove('active'));
                document.querySelectorAll('.tab-content').forEach(content => content.classList.remove('active'));
                
                // Add active class to clicked button
                this.classList.add('active');
                
                // Show corresponding content
                const tabId = this.getAttribute('data-tab');
                document.getElementById(`tab-${tabId}`).classList.add('active');
            });
        });
    });
</script>