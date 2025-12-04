class OnboardingManager {
    constructor() {
        this.currentStep = (window.savedData?.currentStep || 1) - 1; // Convert 1-based to 0-based
        this.totalSteps = 7;
        this.formData = {};
        this.branches = window.savedData?.branches || [];
        this.chauffeurs = window.savedData?.chauffeurs || [];
        
        this.init();
    }

    init() {
        this.setupEventListeners();
        this.loadSavedBranches();
        this.loadSavedChauffeurs();
        this.updateUI();
    }

    setupEventListeners() {
        // Navigation buttons
        document.getElementById('nextBtn').addEventListener('click', () => this.nextStep());
        document.getElementById('prevBtn').addEventListener('click', () => this.previousStep());
        document.getElementById('saveDraftBtn').addEventListener('click', () => this.saveDraft());
        // document.getElementById('submitBtn').addEventListener('click', () => this.submitApplication());

        // Step navigation
        document.querySelectorAll('.step').forEach(step => {
            step.addEventListener('click', (e) => {
                const stepNumber = parseInt(e.currentTarget.dataset.step);
                this.goToStep(stepNumber);
            });
        });

        // Toggle switches
        document.getElementById('branchesToggle').addEventListener('click', () => this.toggleBranches());
        document.getElementById('chauffeursToggle').addEventListener('click', () => this.toggleChauffeurs());

        // Add buttons
        document.getElementById('addBranchBtn').addEventListener('click', () => this.addBranch());
        document.getElementById('addChauffeurBtn').addEventListener('click', () => this.addChauffeur());

        // Auto-save on input change
        // document.getElementById('onboardingForm').addEventListener('input', () => {
        //     clearTimeout(this.autoSaveTimeout);
        //     this.autoSaveTimeout = setTimeout(() => this.autoSave(), 2000);
        // });

        // Form submission
        document.getElementById('onboardingForm').addEventListener('submit', (e) => {
            e.preventDefault();
            this.submitApplication();
        });
    }

    async nextStep() {
        if (this.validateCurrentStep()) {
            if (this.currentStep < this.totalSteps - 1) {
                // Save current step data and wait for server response
                const saveResult = await this.saveDraft();
                
                // Only proceed to next step if save was successful
                if (saveResult && saveResult.success) {
                    this.currentStep++;
                    this.updateUI();
                } else {
                    // Stay on current step if server validation failed
                    this.showError(saveResult?.message || 'Please fix the errors before proceeding.');
                }
            }
        }
    }

    previousStep() {
        if (this.currentStep > 0) {
            this.currentStep--;
            this.updateUI();
        }
    }

    goToStep(stepNumber) {
        if (stepNumber >= 0 && stepNumber < this.totalSteps) {
            this.currentStep = stepNumber;
            this.updateUI();
        }
    }

    validateCurrentStep() {
        const currentStepElement = document.querySelector(`.form-step[data-step="${this.currentStep}"]`);
        if (!currentStepElement) return true;
        
        const requiredFields = currentStepElement.querySelectorAll('[required]');
        let isValid = true;
        let firstInvalidField = null;

        // Clear previous validation states
        currentStepElement.querySelectorAll('.is-invalid').forEach(field => {
            field.classList.remove('is-invalid');
        });

        requiredFields.forEach(field => {
            const value = field.value.trim();
            if (!value) {
                field.classList.add('is-invalid');
                isValid = false;
                if (!firstInvalidField) {
                    firstInvalidField = field;
                }
            }
        });

        // Step-specific validations
        if (this.currentStep === 0) {
            // Step 1: Legal Details - all fields are required
            isValid = this.validateStep1() && isValid;
        } else if (this.currentStep === 1) {
            // Step 2: Contacts - validate email formats
            isValid = this.validateStep2() && isValid;
        } else if (this.currentStep === 2) {
            // Step 3: Address
            isValid = this.validateStep3() && isValid;
        } else if (this.currentStep === 3) {
            // Step 4: Finance
            isValid = this.validateStep4() && isValid;
        } else if (this.currentStep === 5) {
            // Step 6: Review - GDPR consent
            isValid = this.validateStep6() && isValid;
        }

        if (!isValid) {
            this.showError('Please fill in all required fields correctly.');
            if (firstInvalidField) {
                firstInvalidField.focus();
            }
        }

        return isValid;
    }

    validateStep1() {
        const requiredFields = ['legal_company_name', 'registration_number', 'jurisdiction', 'incorporation_date', 'company_type', 'business_email'];
        let isValid = true;

        requiredFields.forEach(fieldName => {
            const field = document.querySelector(`[name="${fieldName}"]`);
            if (field && !field.value.trim()) {
                field.classList.add('is-invalid');
                this.showFieldError(field, `${this.getFieldLabel(fieldName)} is required.`);
                isValid = false;
            }
        });

        // Enhanced validations
        const companyNameField = document.querySelector('[name="legal_company_name"]');
        if (companyNameField && companyNameField.value) {
            if (companyNameField.value.length < 2 || companyNameField.value.length > 100) {
                companyNameField.classList.add('is-invalid');
                this.showFieldError(companyNameField, 'Company name must be between 2-100 characters.');
                isValid = false;
            }
        }

        const regNumberField = document.querySelector('[name="registration_number"]');
        if (regNumberField && regNumberField.value) {
            if (!/^[A-Z0-9]{6,12}$/i.test(regNumberField.value)) {
                regNumberField.classList.add('is-invalid');
                this.showFieldError(regNumberField, 'Registration number must be 6-12 alphanumeric characters.');
                isValid = false;
            }
        }

        const emailField = document.querySelector('[name="business_email"]');
        if (emailField && emailField.value) {
            if (!this.isValidBusinessEmail(emailField.value)) {
                emailField.classList.add('is-invalid');
                this.showFieldError(emailField, 'Please enter a valid business email address.');
                isValid = false;
            }
        }

        const dateField = document.querySelector('[name="incorporation_date"]');
        if (dateField && dateField.value) {
            const date = new Date(dateField.value);
            const today = new Date();
            if (date >= today) {
                dateField.classList.add('is-invalid');
                this.showFieldError(dateField, 'Incorporation date cannot be in the future.');
                isValid = false;
            }
        }

        return isValid;
    }

    validateStep2() {
        const requiredFields = ['primary_contact_name', 'primary_contact_email', 'primary_contact_phone', 'finance_contact_name', 'finance_contact_email', 'finance_contact_phone'];
        let isValid = true;

        requiredFields.forEach(fieldName => {
            const field = document.querySelector(`[name="${fieldName}"]`);
            if (field && !field.value.trim()) {
                field.classList.add('is-invalid');
                this.showFieldError(field, `${this.getFieldLabel(fieldName)} is required.`);
                isValid = false;
            }
        });

        // Validate name fields
        const nameFields = ['primary_contact_name', 'finance_contact_name', 'support_contact_name'];
        nameFields.forEach(fieldName => {
            const field = document.querySelector(`[name="${fieldName}"]`);
            if (field && field.value) {
                if (!/^[a-zA-Z\s]{2,50}$/.test(field.value)) {
                    field.classList.add('is-invalid');
                    this.showFieldError(field, 'Name must be 2-50 characters and contain only letters.');
                    isValid = false;
                }
            }
        });

        // Validate email formats
        const emailFields = ['primary_contact_email', 'finance_contact_email', 'support_contact_email'];
        emailFields.forEach(fieldName => {
            const field = document.querySelector(`[name="${fieldName}"]`);
            if (field && field.value && !this.isValidEmail(field.value)) {
                field.classList.add('is-invalid');
                this.showFieldError(field, 'Please enter a valid email address.');
                isValid = false;
            }
        });

        // Validate phone numbers
        const phoneFields = ['primary_contact_phone', 'finance_contact_phone', 'support_contact_phone'];
        phoneFields.forEach(fieldName => {
            const field = document.querySelector(`[name="${fieldName}"]`);
            if (field && field.value && !this.isValidPhone(field.value)) {
                field.classList.add('is-invalid');
                this.showFieldError(field, 'Please enter a valid phone number with country code.');
                isValid = false;
            }
        });

        return isValid;
    }

    validateStep3() {
        const requiredFields = ['hq_address', 'postcode', 'timezone'];
        let isValid = true;

        requiredFields.forEach(fieldName => {
            const field = document.querySelector(`[name="${fieldName}"]`);
            if (field && !field.value.trim()) {
                field.classList.add('is-invalid');
                this.showFieldError(field, `${this.getFieldLabel(fieldName)} is required.`);
                isValid = false;
            }
        });

        // Validate address length
        const addressField = document.querySelector('[name="hq_address"]');
        if (addressField && addressField.value) {
            if (addressField.value.length < 10 || addressField.value.length > 500) {
                addressField.classList.add('is-invalid');
                this.showFieldError(addressField, 'Address must be between 10-500 characters.');
                isValid = false;
            }
        }

        // Validate postcode
        const postcodeField = document.querySelector('[name="postcode"]');
        if (postcodeField && postcodeField.value) {
            if (!/^[A-Z0-9\s\-]{3,10}$/i.test(postcodeField.value)) {
                postcodeField.classList.add('is-invalid');
                this.showFieldError(postcodeField, 'Please enter a valid postcode.');
                isValid = false;
            }
            // Check for dummy postcodes
            const dummyPostcodes = ['00000', '12345', 'aaaaa'];
            if (dummyPostcodes.includes(postcodeField.value.toLowerCase())) {
                postcodeField.classList.add('is-invalid');
                this.showFieldError(postcodeField, 'Please enter a valid postcode.');
                isValid = false;
            }
        }

        return isValid;
    }

    validateStep4() {
        const requiredFields = ['currency', 'tax_profile'];
        let isValid = true;

        requiredFields.forEach(fieldName => {
            const field = document.querySelector(`[name="${fieldName}"]`);
            if (field && !field.value.trim()) {
                field.classList.add('is-invalid');
                isValid = false;
            }
        });

        return isValid;
    }

    validateStep6() {
        const gdprField = document.querySelector('[name="gdpr_consent"]');
        if (gdprField && !gdprField.checked) {
            gdprField.classList.add('is-invalid');
            return false;
        }
        return true;
    }

    isValidEmail(email) {
        const emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
        
        // Check basic format
        if (!emailRegex.test(email)) return false;
        
        // Check for consecutive dots
        if (email.includes('..')) return false;
        
        // Check for multiple domain extensions
        if (/\.[a-zA-Z]{2,6}\.[a-zA-Z]{2,6}/.test(email)) return false;
        
        // Check for leading/trailing dots
        if (email.startsWith('.') || email.endsWith('.')) return false;
        
        return true;
    }

    isValidBusinessEmail(email) {
        if (!this.isValidEmail(email)) return false;
        
        // Check against disposable email domains
        const disposableDomains = ['10minutemail.com', 'tempmail.org', 'guerrillamail.com', 'mailinator.com'];
        const domain = email.split('@')[1]?.toLowerCase();
        
        return !disposableDomains.includes(domain);
    }

    isValidPhone(phone) {
        // Remove all non-digit characters except +
        const cleanPhone = phone.replace(/[^\d+]/g, '');
        
        // Check format: optional + followed by 10-15 digits
        if (!/^\+?[1-9]\d{9,14}$/.test(cleanPhone)) return false;
        
        // Check for dummy patterns
        const dummyPatterns = ['0000000000', '1234567890', '1111111111', '9999999999'];
        const digitsOnly = cleanPhone.replace(/[^\d]/g, '');
        
        if (dummyPatterns.includes(digitsOnly)) return false;
        
        // Check for repeated digits (more than 6 in a row)
        if (/(\d)\1{6,}/.test(digitsOnly)) return false;
        
        return true;
    }

    getFieldLabel(fieldName) {
        const labels = {
            'legal_company_name': 'Company Name',
            'registration_number': 'Registration Number',
            'jurisdiction': 'Jurisdiction',
            'incorporation_date': 'Incorporation Date',
            'company_type': 'Company Type',
            'business_email': 'Business Email',
            'primary_contact_name': 'Primary Contact Name',
            'primary_contact_email': 'Primary Contact Email',
            'primary_contact_phone': 'Primary Contact Phone',
            'finance_contact_name': 'Finance Contact Name',
            'finance_contact_email': 'Finance Contact Email',
            'finance_contact_phone': 'Finance Contact Phone',
            'hq_address': 'Headquarters Address',
            'postcode': 'Postcode',
            'timezone': 'Timezone',
            'currency': 'Currency',
            'tax_profile': 'Tax Profile'
        };
        return labels[fieldName] || fieldName.replace('_', ' ').replace(/\b\w/g, l => l.toUpperCase());
    }

    showFieldError(field, message) {
        // Remove existing error message
        const existingError = field.parentNode.querySelector('.field-error');
        if (existingError) {
            existingError.remove();
        }
        
        // Add new error message
        const errorDiv = document.createElement('div');
        errorDiv.className = 'field-error text-danger small mt-1';
        errorDiv.textContent = message;
        field.parentNode.appendChild(errorDiv);
    }

    clearFieldErrors() {
        document.querySelectorAll('.field-error').forEach(error => error.remove());
        document.querySelectorAll('.is-invalid').forEach(field => field.classList.remove('is-invalid'));
    }

    async handleCsvImport(file) {
        const formData = new FormData();
        formData.append('csv_file', file);
        formData.append('_token', document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '');

        try {
            const response = await fetch('/admin/onboarding/chauffeurs/import', {
                method: 'POST',
                body: formData
            });

            const result = await response.json();

            if (result.success) {
                // Clear existing chauffeurs and add imported ones
                document.getElementById('chauffeurContainer').innerHTML = '';
                this.chauffeurs = [];
                
                result.chauffeurs.forEach((chauffeur, index) => {
                    this.addChauffeurWithData(chauffeur, index);
                    this.chauffeurs.push(chauffeur);
                });

                this.showCsvStatus(`✅ Successfully imported ${result.imported} chauffeurs`, 'success');
            } else {
                let errorMessage = result.message;
                if (result.errors && result.errors.length > 0) {
                    errorMessage += '\n\nErrors:\n' + result.errors.join('\n');
                }
                this.showCsvStatus(`❌ ${errorMessage}`, 'error');
            }
        } catch (error) {
            console.error('CSV import error:', error);
            this.showCsvStatus('❌ Failed to import CSV file', 'error');
        }
    }

    showCsvStatus(message, type) {
        const statusDiv = document.getElementById('csvStatus');
        statusDiv.style.display = 'block';
        statusDiv.className = `alert alert-${type === 'success' ? 'success' : 'danger'} mt-2`;
        statusDiv.innerHTML = message.replace(/\n/g, '<br>');
        
        setTimeout(() => {
            statusDiv.style.display = 'none';
        }, 10000);
    }

    updateUI() {
        // Update step indicators
        document.querySelectorAll('.step').forEach((step, index) => {
            if (index <= this.currentStep) {
                step.classList.add('active');
            } else {
                step.classList.remove('active');
            }
        });

        // Update progress bar
        const progressPercentage = (this.currentStep / (this.totalSteps - 1)) * 100;
        document.querySelector('.progress-fill').style.width = `${progressPercentage}%`;

        // Show/hide form steps
        document.querySelectorAll('.form-step').forEach((step, index) => {
            if (index === this.currentStep) {
                step.classList.add('active');
                step.style.display = 'block';
            } else {
                step.classList.remove('active');
                step.style.display = 'none';
            }
        });

        // Update navigation buttons
        const prevBtn = document.getElementById('prevBtn');
        const nextBtn = document.getElementById('nextBtn');
        const submitBtn = document.getElementById('submitBtn');

        prevBtn.style.display = this.currentStep > 0 ? 'block' : 'none';
        
        if (this.currentStep === this.totalSteps - 2) { // Review step
            nextBtn.style.display = 'none';
            submitBtn.style.display = 'block';
        } else if (this.currentStep === this.totalSteps - 1) { // Success step
            nextBtn.style.display = 'none';
            submitBtn.style.display = 'none';
        } else {
            nextBtn.style.display = 'block';
            submitBtn.style.display = 'none';
        }

        // Update review content
        if (this.currentStep === 5) {
            this.updateReviewContent();
        }
    }

    collectFormData() {
        const formData = new FormData(document.getElementById('onboardingForm'));
        const data = {};
        
        for (let [key, value] of formData.entries()) {
            data[key] = value;
        }

        // Add branches and chauffeurs
        data.branches = this.branches;
        data.chauffeurs = this.chauffeurs;
        data.step = this.currentStep + 1; // Convert 0-based to 1-based

        return data;
    }

    async saveDraft() {
        try {
            const data = this.collectFormData();
            
            const response = await fetch('/admin/onboarding/store', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || ''
                },
                body: JSON.stringify(data)
            });

            const result = await response.json();

            if (response.ok && result.success) {
                this.showAutoSave();
                return { success: true };
            } else {
                // Handle validation errors from server
                if (response.status === 422) {
                    // Validation error
                    this.handleServerValidationErrors(result);
                } else {
                    // Other server error
                    this.showError(result.message || 'An error occurred while saving.');
                }
                return { success: false, message: result.message };
            }
        } catch (error) {
            console.error('Save draft error:', error);
            this.showError('Network error occurred. Please try again.');
            return { success: false, message: 'Network error' };
        }
    }

    async autoSave() {
        await this.saveDraft();
    }

    async submitApplication() {
        if (!this.validateCurrentStep()) {
            return;
        }

        try {
            const data = this.collectFormData();
            
            const response = await fetch('/admin/onboarding/complete', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || ''
                },
                body: JSON.stringify(data)
            });

            const result = await response.json();

            if (result.success) {
                // document.getElementById('referenceId').textContent = result.reference_id;
                document.getElementById('saveDraftBtn').style.display = 'none';
                document.getElementById('prevBtn').style.display = 'none';
                document.getElementById('submissionTime').textContent = new Date().toLocaleString();
                this.currentStep = this.totalSteps - 1;
                this.updateUI();
            } else {
                this.showError(result.message || 'Failed to submit application');
            }
        } catch (error) {
            console.error('Submit error:', error);
            this.showError('An error occurred while submitting the application');
        }
    }

    toggleBranches() {
        const toggle = document.getElementById('branchesToggle');
        const section = document.getElementById('branchesSection');
        
        toggle.classList.toggle('active');
        
        if (toggle.classList.contains('active')) {
            section.style.display = 'block';
            if (this.branches.length === 0) {
                this.addBranch();
            }
        } else {
            section.style.display = 'none';
        }
    }

    toggleChauffeurs() {
        const toggle = document.getElementById('chauffeursToggle');
        const section = document.getElementById('chauffeursSection');
        
        toggle.classList.toggle('active');
        
        if (toggle.classList.contains('active')) {
            section.style.display = 'block';
            if (this.chauffeurs.length === 0) {
                this.addChauffeur();
            }
        } else {
            section.style.display = 'none';
        }
    }

    addBranch() {
        const branchIndex = this.branches.length;
        this.addBranchWithData({}, branchIndex);
        this.branches.push({});
    }

    addBranchWithData(branchData, branchIndex) {
        const branchHtml = `
            <div class="branch-entry" data-index="${branchIndex}">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <h6>Branch ${branchIndex + 1}</h6>
                    <button type="button" class="remove-branch btn btn-sm btn-outline-danger" onclick="onboarding.removeBranch(${branchIndex})">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="branches[${branchIndex}][name]" placeholder="Branch Name" value="${branchData.branch_name || ''}" />
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="branches[${branchIndex}][phone]" placeholder="Phone" value="${branchData.branch_phone || ''}" />
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="branches[${branchIndex}][address]" placeholder="Address" value="${branchData.branch_address || ''}" />
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="branches[${branchIndex}][postcode]" placeholder="Postcode" value="${branchData.branch_postcode || ''}" />
                    </div>
                </div>
            </div>
        `;

        document.getElementById('branchContainer').insertAdjacentHTML('beforeend', branchHtml);
    }

    removeBranch(index) {
        document.querySelector(`[data-index="${index}"]`).remove();
        this.branches.splice(index, 1);
        this.updateBranchIndices();
    }

    updateBranchIndices() {
        document.querySelectorAll('.branch-entry').forEach((entry, index) => {
            entry.dataset.index = index;
            entry.querySelector('h6').textContent = `Branch ${index + 1}`;
        });
    }

    addChauffeur() {
        const chauffeurIndex = this.chauffeurs.length;
        this.addChauffeurWithData({}, chauffeurIndex);
        this.chauffeurs.push({});
    }

    addChauffeurWithData(chauffeurData, chauffeurIndex) {
        const chauffeurHtml = `
            <div class="branch-entry" data-index="${chauffeurIndex}">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <h6>Chauffeur ${chauffeurIndex + 1}</h6>
                    <button type="button" class="remove-branch btn btn-sm btn-outline-danger" onclick="onboarding.removeChauffeur(${chauffeurIndex})">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="chauffeurs[${chauffeurIndex}][name]" placeholder="Full Name" value="${chauffeurData.name || ''}" />
                    </div>
                    <div class="col-md-6">
                        <input type="email" class="form-control" name="chauffeurs[${chauffeurIndex}][email]" placeholder="Email" value="${chauffeurData.email || ''}" />
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6">
                        <input type="tel" class="form-control" name="chauffeurs[${chauffeurIndex}][phone]" placeholder="Phone" value="${chauffeurData.phone || ''}" />
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="chauffeurs[${chauffeurIndex}][license]" placeholder="License Number" value="${chauffeurData.license || ''}" />
                    </div>
                </div>
            </div>
        `;

        document.getElementById('chauffeurContainer').insertAdjacentHTML('beforeend', chauffeurHtml);
    }

    removeChauffeur(index) {
        document.querySelector(`[data-index="${index}"]`).remove();
        this.chauffeurs.splice(index, 1);
        this.updateChauffeurIndices();
    }

    updateChauffeurIndices() {
        document.querySelectorAll('#chauffeurContainer .branch-entry').forEach((entry, index) => {
            entry.dataset.index = index;
            entry.querySelector('h6').textContent = `Chauffeur ${index + 1}`;
        });
    }

    updateReviewContent() {
        const data = this.collectFormData();
        
        // Get branches data
        let branchesHtml = '';
        const branchElements = document.querySelectorAll('#branchContainer .branch-entry');
        if (branchElements.length > 0) {
            branchesHtml = '<div class="review-item"><h6><i class="fas fa-building"></i> Branches</h6>';
            branchElements.forEach((branch, index) => {
                const name = branch.querySelector('input[name*="[name]"]')?.value || 'Unnamed Branch';
                const address = branch.querySelector('input[name*="[address]"]')?.value || 'No address';
                branchesHtml += `<p><strong>Branch ${index + 1}:</strong> ${name} - ${address}</p>`;
            });
            branchesHtml += '</div>';
        }
        
        // Get chauffeurs data
        let chauffeursHtml = '';
        const chauffeurElements = document.querySelectorAll('#chauffeurContainer .branch-entry');
        if (chauffeurElements.length > 0) {
            chauffeursHtml = '<div class="review-item"><h6><i class="fas fa-user-check"></i> Chauffeurs</h6>';
            chauffeurElements.forEach((chauffeur, index) => {
                const name = chauffeur.querySelector('input[name*="[name]"]')?.value || 'Unnamed Chauffeur';
                const email = chauffeur.querySelector('input[name*="[email]"]')?.value || 'No email';
                chauffeursHtml += `<p><strong>Chauffeur ${index + 1}:</strong> ${name} (${email})</p>`;
            });
            chauffeursHtml += '</div>';
        }
        
        const reviewHtml = `
            <div class="review-section">
                <div class="review-item">
                    <h6><i class="fas fa-building"></i> Legal Details</h6>
                    <p><strong>Company:</strong> ${data.legal_company_name || 'Not provided'}</p>
                    <p><strong>Trading Name:</strong> ${data.trading_name || 'Not provided'}</p>
                    <p><strong>Registration:</strong> ${data.registration_number || 'Not provided'}</p>
                    <p><strong>Type:</strong> ${data.company_type || 'Not provided'}</p>
                    <p><strong>Business Email:</strong> ${data.business_email || 'Not provided'}</p>
                </div>
                <div class="review-item">
                    <h6><i class="fas fa-users"></i> Contacts</h6>
                    <p><strong>Primary:</strong> ${data.primary_contact_name || 'Not provided'} (${data.primary_contact_email || 'Not provided'})</p>
                    <p><strong>Finance:</strong> ${data.finance_contact_name || 'Not provided'} (${data.finance_contact_email || 'Not provided'})</p>
                    <p><strong>Support:</strong> ${data.support_contact_name || 'Not provided'} (${data.support_contact_email || 'Not provided'})</p>
                </div>
                <div class="review-item">
                    <h6><i class="fas fa-map-marker-alt"></i> Address</h6>
                    <p><strong>Headquarters:</strong> ${data.hq_address || 'Not provided'}</p>
                    <p><strong>Postcode:</strong> ${data.postcode || 'Not provided'}</p>
                    <p><strong>Timezone:</strong> ${data.timezone || 'Not provided'}</p>
                    <p><strong>Operating License:</strong> ${data.operating_license || 'Not provided'}</p>
                </div>
                ${branchesHtml}
                <div class="review-item">
                    <h6><i class="fas fa-credit-card"></i> Finance</h6>
                    <p><strong>Currency:</strong> ${data.currency || 'Not provided'}</p>
                    <p><strong>Tax Profile:</strong> ${data.tax_profile || 'Not provided'}</p>
                    <p><strong>Tax ID:</strong> ${data.tax_id || 'Not provided'}</p>
                    <p><strong>Payout Type:</strong> ${data.payout_type || 'Not provided'}</p>
                    <p><strong>IBAN:</strong> ${data.iban || 'Not provided'}</p>
                </div>
                ${chauffeursHtml}
            </div>
        `;
        
        document.getElementById('reviewContent').innerHTML = reviewHtml;
    }

    loadSavedBranches() {
        // Load saved branches if any exist
        if (this.branches && this.branches.length > 0) {
            // Show branches section if there are saved branches
            const branchesToggle = document.getElementById('branchesToggle');
            const branchesSection = document.getElementById('branchesSection');
            
            branchesToggle.classList.add('active');
            branchesSection.style.display = 'block';
            
            // Add each saved branch to the UI
            this.branches.forEach((branch, index) => {
                this.addBranchWithData(branch, index);
            });
        }
    }

    loadSavedChauffeurs() {
        // Load saved chauffeurs if any exist
        if (this.chauffeurs && this.chauffeurs.length > 0) {
            // Show chauffeurs section if there are saved chauffeurs
            const chauffeursToggle = document.getElementById('chauffeursToggle');
            const chauffeursSection = document.getElementById('chauffeursSection');
            
            chauffeursToggle.classList.add('active');
            chauffeursSection.style.display = 'block';
            
            // Add each saved chauffeur to the UI
            this.chauffeurs.forEach((chauffeur, index) => {
                this.addChauffeurWithData(chauffeur, index);
            });
        }
    }

    populateForm(data) {
        Object.keys(data).forEach(key => {
            const field = document.querySelector(`[name="${key}"]`);
            if (field) {
                field.value = data[key];
            }
        });
    }

    showAutoSave() {
        const indicator = document.getElementById('autoSaveIndicator');
        indicator.style.display = 'block';
        setTimeout(() => {
            indicator.style.display = 'none';
        }, 3000);
    }

    handleServerValidationErrors(result) {
        // Clear previous validation states
        this.clearFieldErrors();

        // Handle field-specific errors
        if (result.errors) {
            let hasErrors = false;
            Object.keys(result.errors).forEach(fieldName => {
                const field = document.querySelector(`[name="${fieldName}"]`);
                if (field) {
                    field.classList.add('is-invalid');
                    // Show the first error message for this field
                    const errorMessage = Array.isArray(result.errors[fieldName]) 
                        ? result.errors[fieldName][0] 
                        : result.errors[fieldName];
                    this.showFieldError(field, errorMessage);
                    hasErrors = true;
                }
            });
            
            if (hasErrors) {
                // Focus on first invalid field
                const firstInvalidField = document.querySelector('.is-invalid');
                if (firstInvalidField) {
                    firstInvalidField.focus();
                    firstInvalidField.scrollIntoView({ behavior: 'smooth', block: 'center' });
                }
            }
        }

        // Show general error message
        this.showError(result.message || 'Please fix the validation errors and try again.');
    }

    showError(message) {
        // Create or update error message
        let errorDiv = document.getElementById('error-message');
        if (!errorDiv) {
            errorDiv = document.createElement('div');
            errorDiv.id = 'error-message';
            errorDiv.className = 'alert alert-danger';
            errorDiv.style.cssText = 'margin-bottom: 1rem; padding: 0.75rem 1rem; border-radius: 0.5rem; background-color: #fee2e2; border: 1px solid #fecaca; color: #dc2626;';
            document.querySelector('.form-container').prepend(errorDiv);
        }
        
        errorDiv.innerHTML = `<i class="fas fa-exclamation-triangle me-2"></i>${message}`;
        errorDiv.style.display = 'block';
        
        // Scroll to top to show error
        errorDiv.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
        
        setTimeout(() => {
            errorDiv.style.display = 'none';
        }, 8000);
    }
}

// Initialize onboarding manager
const onboarding = new OnboardingManager();

// Global function for CSV upload
function handleCsvUpload(input) {
    if (input.files && input.files[0]) {
        const file = input.files[0];
        
        // Validate file type
        if (!file.name.toLowerCase().endsWith('.csv') && !file.name.toLowerCase().endsWith('.txt')) {
            onboarding.showCsvStatus('❌ Please select a CSV file', 'error');
            return;
        }
        
        // Validate file size (2MB max)
        if (file.size > 2 * 1024 * 1024) {
            onboarding.showCsvStatus('❌ File size must be less than 2MB', 'error');
            return;
        }
        
        onboarding.handleCsvImport(file);
    }
}

// Add CSRF token to all requests
document.addEventListener('DOMContentLoaded', function() {
    const token = document.querySelector('meta[name="csrf-token"]');
    if (!token) {
        const meta = document.createElement('meta');
        meta.name = 'csrf-token';
        meta.content = document.querySelector('input[name="_token"]')?.value || '';
        document.head.appendChild(meta);
    }
});