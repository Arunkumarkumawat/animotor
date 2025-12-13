<footer>
    <div class="container">
        <div class="footer-grid">
            <div class="footer-col">
                <a class="brandMark" href="#top" aria-label="ANI Motors home">
                    <div class="logo" aria-hidden="true" style="width:34px;height:34px;border-radius:12px">
                        <svg viewBox="0 0 24 24" fill="none">
                            <path d="M4 14l2-6h12l2 6" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M6 14h12" stroke="white" stroke-width="2" stroke-linecap="round"/>
                            <path d="M7 18h0M17 18h0" stroke="white" stroke-width="2" stroke-linecap="round"/>
                        </svg>
                    </div>
                    <div style="font-size:16px">{{ settings('site_name') }}</div>
                </a>
                <p class="legal" style="max-width:38ch;margin-top:10px">
                    {{ settings('site_name') }} is a leading vehicle mobility marketplace, connecting customers to trusted suppliers for car hire, PHV/PCO, and chauffeur services worldwide.
                </p>
            </div>
            
            <div class="footer-col">
                <h4>Company</h4>
                <a href="#about">About Us</a>
                <a href="#how">How It Works</a>
                <a href="#join">Partner with Us</a>
                <a href="#">Careers</a>
            </div>

            <div class="footer-col">
                <h4>Support & Legal</h4>
                <a href="#">Contact Support</a>
                <a href="#">Terms & Conditions</a>
                <a href="#">Privacy Policy</a>
                <a href="#">Supplier T&Cs</a>
            </div>
        </div>

        <div class="legal">
            &copy; {{ date('Y') }} {{ settings('site_name') }}. All rights reserved. Registered in the UK.
        </div>

    </div>
</footer>

<script>
    function scrollToId(id) {
        document.getElementById(id).scrollIntoView({ behavior: 'smooth' });
    }

    function toggleSwitch(switchElement){
        const cb = switchElement.querySelector('input[type="checkbox"]');
        if (cb) {
            cb.checked = !cb.checked;
            // Trigger change event to update any associated logic
            cb.dispatchEvent(new Event('change', { bubbles: true }));

            if(cb.checked){
                switchElement.classList.add('on');
            } else {
                switchElement.classList.remove('on');
            }
        }
    }

    document.addEventListener('DOMContentLoaded', () => {
        const tabs = document.querySelectorAll('.tab');
        const forms = {
            'standard': document.getElementById('standardForm'),
            'phv': document.getElementById('phvForm'),
            'chauffeur': document.getElementById('chauffeurForm')
        };
        const phvBanner = document.getElementById('phvBanner');
        const dropField = document.getElementById('dropField');
        const sameDropSwitch = document.getElementById('sameDropSwitch');
        const retDate = document.getElementById('retDate').closest('.field');
        const retTime = document.getElementById('retTime').closest('.field');

        function setActiveTab(tabKey) {
            // Deactivate all tabs and hide all forms/banners
            tabs.forEach(t => t.classList.remove('active'));
            Object.values(forms).forEach(f => f.style.display = 'none');
            phvBanner.style.display = 'none';

            // Activate selected tab and show form
            const activeTab = document.querySelector(`.tab[data-tab="${tabKey}"]`);
            if (activeTab) {
                activeTab.classList.add('active');
                forms[tabKey].style.display = 'block';
            }

            // Handle specific form displays
            if (tabKey === 'phv') {
                phvBanner.style.display = 'block';
            }
        }

        if(tabs){
            // Event Listeners for tabs
            tabs.forEach(tab => {
                tab.addEventListener('click', () => {
                    setActiveTab(tab.getAttribute('data-tab'));
                });
            });

            // Set initial state
            setActiveTab('standard'); 
        }
    });
</script>
