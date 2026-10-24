/**
 * Jan Seva Kendra - Ultra High-Performance Core Scripts
 * Vanilla ES6+, Zero external libraries, async-friendly, mobile-first
 */

document.addEventListener('DOMContentLoaded', () => {
    'use strict';

    const CONFIG = window.JSK_APP || {
        rest_url: '/wp-json/jsk/v1/',
        nonce: '',
        whatsapp: '919876543210'
    };

    /* ==========================================================================
       1. MOBILE DRAWER NAVIGATION
       ========================================================================== */
    const mobileMenuBtn = document.getElementById('mobileMenuBtn');
    const drawerCloseBtn = document.getElementById('drawerCloseBtn');
    const mobileNavDrawer = document.getElementById('mobileNavDrawer');
    const drawerOverlay = document.getElementById('drawerOverlay');
    const mobileLinks = document.querySelectorAll('.mobile-nav-link, .mobile-nav-drawer a');

    function openMobileDrawer() {
        if (!mobileNavDrawer) return;
        mobileNavDrawer.classList.add('open');
        if (drawerOverlay) drawerOverlay.classList.add('open');
        if (mobileMenuBtn) mobileMenuBtn.setAttribute('aria-expanded', 'true');
        mobileNavDrawer.setAttribute('aria-hidden', 'false');
        document.body.classList.add('drawer-locked');
    }

    function closeMobileDrawer() {
        if (!mobileNavDrawer) return;
        mobileNavDrawer.classList.remove('open');
        if (drawerOverlay) drawerOverlay.classList.remove('open');
        if (mobileMenuBtn) mobileMenuBtn.setAttribute('aria-expanded', 'false');
        mobileNavDrawer.setAttribute('aria-hidden', 'true');
        document.body.classList.remove('drawer-locked');
    }

    if (mobileMenuBtn && mobileNavDrawer) {
        mobileMenuBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            if (mobileNavDrawer.classList.contains('open')) {
                closeMobileDrawer();
            } else {
                openMobileDrawer();
            }
        });

        if (drawerCloseBtn) {
            drawerCloseBtn.addEventListener('click', closeMobileDrawer);
        }

        if (drawerOverlay) {
            drawerOverlay.addEventListener('click', closeMobileDrawer);
        }

        mobileLinks.forEach(link => {
            link.addEventListener('click', closeMobileDrawer);
        });

        // Close on Escape key
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && mobileNavDrawer.classList.contains('open')) {
                closeMobileDrawer();
            }
        });
    }

    /* ==========================================================================
       2. INSTANT SEARCH & CATEGORY FILTERING (High Concurrency / Client-Side)
       ========================================================================== */
    const searchInput = document.getElementById('heroSearchInput');
    const searchClearBtn = document.getElementById('searchClearBtn');
    const tabButtons = document.querySelectorAll('.tab-btn');
    const serviceCards = document.querySelectorAll('.service-card');
    const resultsCountEl = document.getElementById('serviceResultsCount');
    const noResultsEl = document.getElementById('noSearchResults');
    const resetSearchBtn = document.getElementById('resetSearchBtn');
    const quickTagBtns = document.querySelectorAll('.quick-tag-btn');

    let currentFilter = 'all';
    let searchQuery = '';

    function filterServices() {
        let visibleCount = 0;
        const query = searchQuery.trim().toLowerCase();

        serviceCards.forEach(card => {
            const category = card.getAttribute('data-category');
            const title = card.getAttribute('data-title') || '';
            const docs = card.getAttribute('data-docs') || '';
            const desc = card.getAttribute('data-desc') || '';

            const matchesCategory = (currentFilter === 'all' || category === currentFilter);
            const matchesQuery = !query || title.includes(query) || docs.includes(query) || desc.includes(query);

            if (matchesCategory && matchesQuery) {
                card.style.display = 'flex';
                visibleCount++;
            } else {
                card.style.display = 'none';
            }
        });

        // Update count text
        if (resultsCountEl) {
            resultsCountEl.innerHTML = `कुल <strong>${visibleCount}</strong> सेवाएं उपलब्ध हैं`;
        }

        // Toggle empty state
        if (noResultsEl) {
            noResultsEl.style.display = visibleCount === 0 ? 'block' : 'none';
        }

        // Clear button display
        if (searchClearBtn) {
            searchClearBtn.style.display = query ? 'block' : 'none';
        }
    }

    // Category Tabs click
    tabButtons.forEach(btn => {
        btn.addEventListener('click', () => {
            tabButtons.forEach(b => {
                b.classList.remove('active');
                b.setAttribute('aria-selected', 'false');
            });
            btn.classList.add('active');
            btn.setAttribute('aria-selected', 'true');
            currentFilter = btn.getAttribute('data-filter') || 'all';
            filterServices();
        });
    });

    // Search Input with Debounce
    if (searchInput) {
        let debounceTimer;
        searchInput.addEventListener('input', (e) => {
            clearTimeout(debounceTimer);
            debounceTimer = setTimeout(() => {
                searchQuery = e.target.value;
                filterServices();
            }, 120);
        });

        if (searchClearBtn) {
            searchClearBtn.addEventListener('click', () => {
                searchInput.value = '';
                searchQuery = '';
                filterServices();
                searchInput.focus();
            });
        }
    }

    // Quick Search Tags
    quickTagBtns.forEach(tagBtn => {
        tagBtn.addEventListener('click', () => {
            const query = tagBtn.getAttribute('data-search') || '';
            if (searchInput) {
                searchInput.value = query;
                searchQuery = query;
                filterServices();
                // Smooth scroll to services
                const servicesSec = document.getElementById('services');
                if (servicesSec) {
                    servicesSec.scrollIntoView({ behavior: 'smooth' });
                }
            }
        });
    });

    // Reset Search Button
    if (resetSearchBtn) {
        resetSearchBtn.addEventListener('click', () => {
            if (searchInput) searchInput.value = '';
            searchQuery = '';
            currentFilter = 'all';
            tabButtons.forEach((b, i) => {
                if (i === 0) {
                    b.classList.add('active');
                    b.setAttribute('aria-selected', 'true');
                } else {
                    b.classList.remove('active');
                    b.setAttribute('aria-selected', 'false');
                }
            });
            filterServices();
        });
    }

    // Footer Links with category filter
    document.querySelectorAll('.footer-links a[data-filter]').forEach(link => {
        link.addEventListener('click', (e) => {
            e.preventDefault();
            const filter = link.getAttribute('data-filter');
            const targetTab = document.querySelector(`.tab-btn[data-filter="${filter}"]`);
            if (targetTab) {
                targetTab.click();
            }
            const servicesSec = document.getElementById('services');
            if (servicesSec) {
                servicesSec.scrollIntoView({ behavior: 'smooth' });
            }
        });
    });

    /* ==========================================================================
       3. SERVICE DETAIL MODAL HANDLERS
       ========================================================================== */
    const serviceModal = document.getElementById('serviceModal');
    const modalCloseBtn = document.getElementById('modalCloseBtn');
    const modalCloseBtn2 = document.getElementById('modalCloseBtn2');
    const modalBackdrop = document.getElementById('modalBackdrop');
    const modalApplyBtn = document.getElementById('modalApplyBtn');

    let currentModalServiceId = '';
    let currentModalServiceTitle = '';
    let currentModalServiceData = null;

    const DOC_DICTIONARY = {
        'आधार कार्ड': 'Aadhaar Card',
        'फोटो': 'Passport Photo',
        'पासपोर्ट साइज फोटो': 'Passport Size Photo',
        'स्वप्रमाणित घोषणा पत्र': 'Self-Declaration Form',
        'राशन कार्ड': 'Ration Card',
        'बिजली बिल': 'Electricity Bill',
        'वोटर आईडी': 'Voter ID',
        'वोटर कार्ड': 'Voter ID',
        'पुराना जाति प्रमाण': 'Old Caste Certificate',
        'वेतन पर्ची': 'Salary Slip',
        'खतौनी': 'Land Record (Khatauni)',
        'जमीन की खतौनी': 'Land Record (Khatauni)',
        '10वीं अंकपत्र': '10th Marksheet',
        'निवास प्रमाण': 'Domicile Certificate',
        'बैंक पासबुक': 'Bank Passbook',
        'हस्ताक्षर': 'Signature',
        'पैन कार्ड': 'PAN Card',
        'बायोमेट्रिक': 'Biometric e-KYC',
        'मोबाइल नंबर': 'Active Mobile Number'
    };

    function openServiceModal(data) {
        if (!serviceModal) return;
        currentModalServiceData = data;

        const isEn = (selectedLang === 'en');
        const title = (isEn && data.titleEn) ? data.titleEn : (data.title || (isEn ? 'Service Details' : 'सेवा विवरण'));
        const fee = (isEn && data.feeEn) ? data.feeEn : (data.fee || '₹50');
        const time = (isEn && data.timeEn) ? data.timeEn : (data.time || (isEn ? '3 to 5 Days' : '3 से 5 दिन'));
        const badge = (isEn && data.badgeEn) ? data.badgeEn : (data.badge || (isEn ? 'Details' : 'सेवा विवरण'));

        const modalTitle = document.getElementById('modalServiceTitle');
        if (modalTitle) modalTitle.textContent = title;

        const modalFee = document.getElementById('modalServiceFee');
        if (modalFee) modalFee.textContent = fee;

        const modalTime = document.getElementById('modalServiceTime');
        if (modalTime) modalTime.textContent = time;

        const modalDesc = document.getElementById('modalServiceDesc');
        if (modalDesc) modalDesc.textContent = data.desc || '';

        const modalBadge = document.getElementById('modalServiceBadge');
        if (modalBadge) modalBadge.textContent = badge;

        // Required docs checklist
        const docsList = document.getElementById('modalServiceDocsList');
        if (docsList) {
            docsList.innerHTML = '';
            const docs = (data.docs || '').split(',');
            docs.forEach(doc => {
                const trimmed = doc.trim();
                let docLabel = trimmed;
                if (isEn && DOC_DICTIONARY[trimmed]) {
                    docLabel = DOC_DICTIONARY[trimmed];
                }
                const li = document.createElement('li');
                li.innerHTML = `✓ ${docLabel}`;
                docsList.appendChild(li);
            });
        }

        currentModalServiceId = data.id || '';
        currentModalServiceTitle = title;

        serviceModal.classList.add('show');
        serviceModal.setAttribute('aria-hidden', 'false');
        document.body.style.overflow = 'hidden';
    }

    function closeServiceModal() {
        if (!serviceModal) return;
        serviceModal.classList.remove('show');
        serviceModal.setAttribute('aria-hidden', 'true');
        document.body.style.overflow = '';
    }

    // Detail button clicks on service cards
    document.querySelectorAll('.btn-card-details').forEach(btn => {
        btn.addEventListener('click', () => {
            openServiceModal({
                id: btn.getAttribute('data-service-id'),
                title: btn.getAttribute('data-title'),
                titleEn: btn.getAttribute('data-title-en'),
                fee: btn.getAttribute('data-fee'),
                feeEn: btn.getAttribute('data-fee-en'),
                time: btn.getAttribute('data-time'),
                timeEn: btn.getAttribute('data-time-en'),
                docs: btn.getAttribute('data-docs'),
                desc: btn.getAttribute('data-desc'),
                badge: btn.getAttribute('data-badge'),
                badgeEn: btn.getAttribute('data-badge-en')
            });
        });
    });

    if (modalCloseBtn) modalCloseBtn.addEventListener('click', closeServiceModal);
    if (modalCloseBtn2) modalCloseBtn2.addEventListener('click', closeServiceModal);
    if (modalBackdrop) modalBackdrop.addEventListener('click', closeServiceModal);

    // Modal Apply Button
    if (modalApplyBtn) {
        modalApplyBtn.addEventListener('click', () => {
            closeServiceModal();
            selectServiceInForm(currentModalServiceId, currentModalServiceTitle);
        });
    }

    /* ==========================================================================
       4. QUICK APPLY BUTTON & FORM PRE-SELECTION
       ========================================================================== */
    function selectServiceInForm(serviceId, serviceTitle) {
        const select = document.getElementById('applyServiceSelect');
        const hiddenName = document.getElementById('applyServiceName');
        const formSection = document.getElementById('apply-form-section');
        const nameInput = document.getElementById('applyName');

        if (select) {
            if (serviceId) {
                select.value = serviceId;
            }
            if (hiddenName) {
                hiddenName.value = serviceTitle || '';
            }
        }

        if (formSection) {
            formSection.scrollIntoView({ behavior: 'smooth' });
            setTimeout(() => {
                if (nameInput) nameInput.focus();
            }, 500);
        }
    }

    document.querySelectorAll('.btn-card-apply').forEach(btn => {
        btn.addEventListener('click', () => {
            const sId = btn.getAttribute('data-service-id');
            const sTitle = btn.getAttribute('data-service-title');
            selectServiceInForm(sId, sTitle);
        });
    });

    // Update hidden input on manual dropdown select
    const applySelect = document.getElementById('applyServiceSelect');
    if (applySelect) {
        applySelect.addEventListener('change', () => {
            const selectedOption = applySelect.options[applySelect.selectedIndex];
            const title = selectedOption ? selectedOption.getAttribute('data-title') : '';
            const hiddenName = document.getElementById('applyServiceName');
            if (hiddenName) hiddenName.value = title;
        });
    }

    /* ==========================================================================
       5. ONLINE APPLICATION FORM SUBMISSION (AJAX via REST API)
       ========================================================================== */
    const applyForm = document.getElementById('citizenApplyForm');
    const applyAlert = document.getElementById('applyAlert');
    const applySubmitBtn = document.getElementById('applySubmitBtn');
    const receiptModal = document.getElementById('receiptModal');
    const receiptCloseBtn = document.getElementById('receiptCloseBtn');
    const receiptCloseBtn2 = document.getElementById('receiptCloseBtn2');
    const receiptBackdrop = document.getElementById('receiptBackdrop');

    if (applyForm) {
        applyForm.addEventListener('submit', async (e) => {
            e.preventDefault();

            const serviceId = document.getElementById('applyServiceSelect').value;
            const serviceName = document.getElementById('applyServiceName').value || '';
            const name = document.getElementById('applyName').value.trim();
            const mobile = document.getElementById('applyMobile').value.trim();
            const village = document.getElementById('applyVillage').value.trim();
            const district = document.getElementById('applyDistrict').value.trim();
            const aadhaar = document.getElementById('applyAadhaar').value.trim();
            const notes = document.getElementById('applyNotes').value.trim();
            const consent = document.getElementById('applyConsent').checked;

            if (!serviceId) {
                showAlert(applyAlert, 'कृपया पहले एक सेवा का चयन करें।', 'alert-error');
                return;
            }
            if (!name || name.length < 3) {
                showAlert(applyAlert, 'कृपया अपना पूरा नाम सही दर्ज करें।', 'alert-error');
                return;
            }
            if (!/^[6-9]\d{9}$/.test(mobile)) {
                showAlert(applyAlert, 'कृपया 10 अंकों का वैध भारतीय मोबाइल नंबर दर्ज करें (6, 7, 8 या 9 से शुरू)।', 'alert-error');
                return;
            }
            if (!consent) {
                showAlert(applyAlert, 'कृपया सत्यापन सहमति बॉक्स पर टिक करें।', 'alert-error');
                return;
            }

            // Set loading
            setBtnLoading(applySubmitBtn, true, 'आवेदन दर्ज हो रहा है...');
            hideAlert(applyAlert);

            try {
                const response = await fetch(`${CONFIG.rest_url}apply`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-WP-Nonce': CONFIG.nonce
                    },
                    body: JSON.stringify({
                        service_id: serviceId,
                        service_name: serviceName,
                        name: name,
                        mobile: mobile,
                        village_city: village,
                        district: district,
                        aadhaar_last: aadhaar,
                        notes: notes
                    })
                });

                const data = await response.json();

                if (response.ok && data.success) {
                    // Success! Show receipt modal
                    applyForm.reset();
                    showReceiptModal(data);
                } else {
                    showAlert(applyAlert, data.message || 'आवेदन सबमिट करने में कोई त्रुटि हुई। कृपया पुनः प्रयास करें।', 'alert-error');
                }
            } catch (err) {
                showAlert(applyAlert, 'इंटरनेट कनेक्टिविटी समस्या। कृपया अपना नेटवर्क जांचें या सीधे फोन/व्हाट्सएप करें।', 'alert-error');
            } finally {
                setBtnLoading(applySubmitBtn, false, 'आवेदन दर्ज करें (सबमिट)');
            }
        });
    }

    function showReceiptModal(data) {
        if (!receiptModal) return;

        document.getElementById('receiptTrackingId').textContent = data.tracking_id || 'JSK-2026-00000';
        document.getElementById('receiptName').textContent = data.applicant_name || '-';
        document.getElementById('receiptMobile').textContent = data.mobile || '-';
        document.getElementById('receiptService').textContent = data.service_name || '-';
        document.getElementById('receiptDate').textContent = data.date || new Date().toLocaleDateString('hi-IN');
        document.getElementById('receiptEstTime').textContent = data.est_time || '1 से 3 कार्य दिवस';

        // Pre-fill WhatsApp share
        const whatsappBtn = document.getElementById('whatsappShareBtn');
        if (whatsappBtn) {
            const text = encodeURIComponent(
                `नमस्ते जन सेवा केंद्र,\nमैंने सेवा के लिए ऑनलाइन आवेदन किया है:\nसंदर्भ ID: ${data.tracking_id}\nआवेदक: ${data.applicant_name}\nसेवा: ${data.service_name}\nकृपया मेरे आवेदन की पुष्टि करें।`
            );
            whatsappBtn.href = `https://wa.me/${CONFIG.whatsapp}?text=${text}`;
        }

        receiptModal.classList.add('show');
        receiptModal.setAttribute('aria-hidden', 'false');
        document.body.style.overflow = 'hidden';
    }

    function closeReceiptModal() {
        if (!receiptModal) return;
        receiptModal.classList.remove('show');
        receiptModal.setAttribute('aria-hidden', 'true');
        document.body.style.overflow = '';
    }

    if (receiptCloseBtn) receiptCloseBtn.addEventListener('click', closeReceiptModal);
    if (receiptCloseBtn2) receiptCloseBtn2.addEventListener('click', closeReceiptModal);
    if (receiptBackdrop) receiptBackdrop.addEventListener('click', closeReceiptModal);

    // Copy Ref Button
    const copyRefBtn = document.getElementById('copyRefBtn');
    if (copyRefBtn) {
        copyRefBtn.addEventListener('click', () => {
            const refCode = document.getElementById('receiptTrackingId').textContent;
            navigator.clipboard.writeText(refCode).then(() => {
                copyRefBtn.textContent = 'कॉपी हो गया! ✓';
                setTimeout(() => {
                    copyRefBtn.textContent = 'कॉपी करें';
                }, 2000);
            });
        });
    }

    // Print Receipt
    const printReceiptBtn = document.getElementById('printReceiptBtn');
    if (printReceiptBtn) {
        printReceiptBtn.addEventListener('click', () => {
            window.print();
        });
    }

    /* ==========================================================================
       6. APPLICATION TRACKER (Live Status with Stepper)
       ========================================================================== */
    const trackForm = document.getElementById('trackForm');
    const trackRefInput = document.getElementById('trackRefInput');
    const trackSubmitBtn = document.getElementById('trackSubmitBtn');
    const trackAlert = document.getElementById('trackAlert');
    const trackResultBox = document.getElementById('trackResultBox');

    if (trackForm) {
        trackForm.addEventListener('submit', async (e) => {
            e.preventDefault();

            const query = (trackRefInput ? trackRefInput.value : '').trim();
            if (!query) {
                showAlert(trackAlert, 'कृपया अपना संदर्भ नंबर (उदा. JSK-2026-XXXXX) या मोबाइल नंबर दर्ज करें।', 'alert-error');
                return;
            }

            setBtnLoading(trackSubmitBtn, true, 'खोजा जा रहा है...');
            hideAlert(trackAlert);
            if (trackResultBox) trackResultBox.style.display = 'none';

            try {
                const response = await fetch(`${CONFIG.rest_url}track?ref=${encodeURIComponent(query)}`);
                const data = await response.json();

                if (response.ok && data.success) {
                    renderTrackingResult(data);
                } else {
                    showAlert(trackAlert, data.message || 'कोई रिकॉर्ड नहीं मिला। कृपया नंबर जांचें।', 'alert-error');
                }
            } catch (err) {
                showAlert(trackAlert, 'स्थिति जांचने में सर्वर त्रुटि हुई। कृपया पुनः प्रयास करें।', 'alert-error');
            } finally {
                setBtnLoading(trackSubmitBtn, false, 'स्थिति जांचें');
            }
        });
    }

    let latestTrackingData = null;

    const STATUS_MAP = {
        'प्रक्रियाधीन': 'In Progress',
        'स्वीकृत एवं जारी': 'Approved & Issued',
        'दस्तावेज आवश्यक': 'Documents Pending',
        'निरस्त': 'Rejected'
    };

    const TIMELINE_TITLE_MAP = {
        'आवेदन प्राप्त हुआ': 'Application Received',
        'दस्तावेज सत्यापन': 'Document Verification',
        'अधिकारी जांच': 'Officer Verification',
        'प्रमाण पत्र जारी': 'Certificate Issued'
    };

    function renderTrackingResult(data) {
        if (!trackResultBox) return;
        latestTrackingData = data;
        const isEn = (selectedLang === 'en');

        document.getElementById('trackResId').textContent = data.tracking_id;
        document.getElementById('trackResName').textContent = data.applicant;
        document.getElementById('trackResService').textContent = data.service;

        const badge = document.getElementById('trackResBadge');
        if (badge) {
            const rawStatus = data.status_text || 'प्रक्रियाधीन';
            badge.textContent = isEn ? (STATUS_MAP[rawStatus] || rawStatus) : rawStatus;
            badge.className = `status-badge ${data.badge || 'status-blue'}`;
        }

        // Render Animated Progress Stepper
        const stepsContainer = document.getElementById('stepperSteps');
        if (stepsContainer && data.timeline) {
            stepsContainer.innerHTML = '';
            const currentStep = data.current_step || 1;

            data.timeline.forEach((step, idx) => {
                const stepNum = idx + 1;
                const isCompleted = stepNum < currentStep || (stepNum === currentStep && currentStep === 4);
                const isActive = stepNum === currentStep && currentStep < 4;

                let stateClass = '';
                if (isCompleted) stateClass = 'completed';
                else if (isActive) stateClass = 'active';

                const rawTitle = step.title;
                const translatedTitle = isEn ? (TIMELINE_TITLE_MAP[rawTitle] || rawTitle) : rawTitle;

                const stepDiv = document.createElement('div');
                stepDiv.className = `step-node ${stateClass}`;
                stepDiv.innerHTML = `
                    <div class="node-circle">${isCompleted ? '✓' : stepNum}</div>
                    <span class="node-title">${translatedTitle}</span>
                    <span class="node-desc">${step.desc}</span>
                `;
                stepsContainer.appendChild(stepDiv);
            });
        }

        trackResultBox.style.display = 'block';
        trackResultBox.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
    }

    /* ==========================================================================
       7. FAQ ACCORDION HANDLERS
       ========================================================================== */
    const faqItems = document.querySelectorAll('.faq-item');
    faqItems.forEach(item => {
        const questionBtn = item.querySelector('.faq-question');
        if (questionBtn) {
            questionBtn.addEventListener('click', () => {
                const isActive = item.classList.contains('active');
                faqItems.forEach(i => i.classList.remove('active'));
                if (!isActive) {
                    item.classList.add('active');
                    questionBtn.setAttribute('aria-expanded', 'true');
                } else {
                    questionBtn.setAttribute('aria-expanded', 'false');
                }
            });
        }
    });

    /* ==========================================================================
       8. UTILITY HELPERS
       ========================================================================== */
    function showAlert(el, msg, typeClass) {
        if (!el) return;
        el.textContent = msg;
        el.className = `form-alert ${typeClass}`;
        el.style.display = 'block';
    }

    function hideAlert(el) {
        if (!el) return;
        el.style.display = 'none';
        el.textContent = '';
    }

    function setBtnLoading(btn, isLoading, text) {
        if (!btn) return;
        btn.disabled = isLoading;
        const spinner = btn.querySelector('.btn-spinner, .track-spinner');
        const textSpan = btn.querySelector('.btn-text') || btn.querySelector('span:not(.btn-spinner):not(.track-spinner)');

        if (spinner) spinner.style.display = isLoading ? 'inline-block' : 'none';
        if (textSpan) textSpan.textContent = text;
    }

    /* ==========================================================================
       9. LANGUAGE PREFERENCE & UNIVERSAL TRANSLATION ENGINE
       ========================================================================== */
    const languageModal = document.getElementById('languageModal');
    const langModalBackdrop = document.getElementById('langModalBackdrop');
    const chooseLangHi = document.getElementById('chooseLangHi');
    const chooseLangEn = document.getElementById('chooseLangEn');
    const confirmLangBtn = document.getElementById('confirmLangBtn');
    const topLangBtn = document.getElementById('topLangBtn');
    const navLangBtn = document.getElementById('navLangBtn');
    const drawerLangBtn = document.getElementById('drawerLangBtn');
    const topLangLabel = document.getElementById('topLangLabel');
    const navLangLabel = document.getElementById('navLangLabel');
    const drawerLangLabel = document.getElementById('drawerLangLabel');

    let selectedLang = localStorage.getItem('jsk_user_lang') || 'hi';

    const JSK_PLACEHOLDERS = {
        heroSearchInput: {
            hi: 'सेवा का नाम खोजें (उदा. आधार, पैन कार्ड, आय प्रमाण पत्र, पेंशन, बिजली बिल)...',
            en: 'Search service name (e.g. Aadhaar, PAN Card, Income Certificate, Pension)...'
        },
        serviceSearchInput: {
            hi: 'सेवा का नाम खोजें (उदा. आधार, जाति प्रमाण, पैन कार्ड, खतौनी)...',
            en: 'Search service name (e.g. Aadhaar, Caste, PAN Card, Land Record)...'
        },
        trackRefInput: {
            hi: 'संदर्भ नंबर (उदा. JSK-2026-AB12C) या 10 अंकों का मोबाइल दर्ज करें...',
            en: 'Reference number (e.g. JSK-2026-AB12C) or 10-digit mobile number...'
        },
        applyName: {
            hi: 'उदा. रमेश कुमार शर्मा',
            en: 'e.g. Ramesh Kumar Sharma'
        },
        applyMobile: {
            hi: 'उदा. 9876543210',
            en: 'e.g. 9876543210'
        },
        applyVillage: {
            hi: 'उदा. रामपुर / वार्ड संख्या 5',
            en: 'e.g. Rampur / Ward No. 5'
        },
        applyDistrict: {
            hi: 'उदा. मेरठ, उत्तर प्रदेश',
            en: 'e.g. Meerut, Uttar Pradesh'
        },
        applyAadhaar: {
            hi: 'XXXX XXXX 1234',
            en: 'XXXX XXXX 1234'
        },
        applyNotes: {
            hi: 'उदा. मुझे तत्काल प्रमाण पत्र की आवश्यकता है / मोबाइल नंबर लिंक है...',
            en: 'e.g. Need certificate urgently / Mobile is linked...'
        },
        inqName: {
            hi: 'उदा. अमित कुमार',
            en: 'e.g. Amit Kumar'
        },
        inqMobile: {
            hi: 'उदा. 9876543210',
            en: 'e.g. 9876543210'
        },
        inqService: {
            hi: 'उदा. नया पैन कार्ड / आय प्रमाण पत्र',
            en: 'e.g. New PAN Card / Income Certificate'
        },
        inqMessage: {
            hi: 'अपनी समस्या या आवश्यकता विस्तार से लिखें...',
            en: 'Describe your query or requirement in detail...'
        }
    };

    function applyLanguage(lang) {
        selectedLang = lang;
        localStorage.setItem('jsk_user_lang', lang);

        // Keep server-side PHP in sync for seamless page reloads and cross-page navigation
        document.cookie = `jsk_user_lang=${lang}; path=/; max-age=31536000; SameSite=Lax`;

        document.documentElement.lang = lang;
        document.body.classList.remove('lang-hi', 'lang-en');
        document.body.classList.add(`lang-${lang}`);

        const labelText = (lang === 'en') ? 'English' : 'हिंदी';
        if (topLangLabel) topLangLabel.textContent = labelText;
        if (navLangLabel) navLangLabel.textContent = labelText;
        if (drawerLangLabel) drawerLangLabel.textContent = labelText;

        // Update cards in language modal
        if (chooseLangHi && chooseLangEn) {
            if (lang === 'hi') {
                chooseLangHi.classList.add('active');
                chooseLangEn.classList.remove('active');
            } else {
                chooseLangEn.classList.add('active');
                chooseLangHi.classList.remove('active');
            }
        }

        // 1. Dynamically update all elements with .lang-text
        document.querySelectorAll('.lang-text').forEach(el => {
            const translated = el.getAttribute(`data-${lang}`);
            if (translated !== null && translated !== undefined) {
                if (translated.includes('<') && translated.includes('>')) {
                    el.innerHTML = translated;
                } else {
                    el.textContent = translated;
                }
            }
        });

        // 2. Dynamically update all elements with data-placeholder-hi / data-placeholder-en
        document.querySelectorAll(`[data-placeholder-${lang}]`).forEach(el => {
            const ph = el.getAttribute(`data-placeholder-${lang}`);
            if (ph) el.placeholder = ph;
        });

        // 3. Fallback placeholder dictionary for all known form fields
        Object.keys(JSK_PLACEHOLDERS).forEach(id => {
            const el = document.getElementById(id);
            if (el && JSK_PLACEHOLDERS[id][lang]) {
                el.placeholder = JSK_PLACEHOLDERS[id][lang];
            }
        });

        // 4. Update dropdown options in #applyServiceSelect
        document.querySelectorAll('#applyServiceSelect').forEach(select => {
            Array.from(select.options).forEach(opt => {
                if (!opt.value) {
                    opt.textContent = (lang === 'en') ? '-- Please Select a Service --' : '-- कृपया एक सेवा चुनें --';
                } else {
                    const titleEn = opt.getAttribute('data-title-en');
                    const catEn = opt.getAttribute('data-cat-en');
                    const titleHi = opt.getAttribute('data-title');
                    const catHi = opt.getAttribute('data-cat');

                    if (lang === 'en' && titleEn) {
                        opt.textContent = `${titleEn}${catEn ? ` (${catEn})` : ''}`;
                    } else if (titleHi) {
                        opt.textContent = `${titleHi}${catHi ? ` (${catHi})` : ''}`;
                    }
                }
            });
        });

        // 5. Re-render service details modal if currently open
        if (serviceModal && serviceModal.classList.contains('show') && currentModalServiceData) {
            openServiceModal(currentModalServiceData);
        }

        // 6. Re-render application tracking result if currently displayed
        if (trackResultBox && trackResultBox.style.display !== 'none' && latestTrackingData) {
            renderTrackingResult(latestTrackingData);
        }
    }

    function openLanguageModal() {
        if (!languageModal) return;
        languageModal.classList.add('show');
        languageModal.setAttribute('aria-hidden', 'false');
        document.body.style.overflow = 'hidden';
    }

    function closeLanguageModal() {
        if (!languageModal) return;
        languageModal.classList.remove('show');
        languageModal.setAttribute('aria-hidden', 'true');
        document.body.style.overflow = '';
    }

    // Modal card selection
    if (chooseLangHi) {
        chooseLangHi.addEventListener('click', () => {
            selectedLang = 'hi';
            chooseLangHi.classList.add('active');
            if (chooseLangEn) chooseLangEn.classList.remove('active');
        });
    }

    if (chooseLangEn) {
        chooseLangEn.addEventListener('click', () => {
            selectedLang = 'en';
            chooseLangEn.classList.add('active');
            if (chooseLangHi) chooseLangHi.classList.remove('active');
        });
    }

    if (confirmLangBtn) {
        confirmLangBtn.addEventListener('click', () => {
            applyLanguage(selectedLang);
            closeLanguageModal();
        });
    }

    // Open modal via buttons
    if (topLangBtn) topLangBtn.addEventListener('click', openLanguageModal);
    if (navLangBtn) navLangBtn.addEventListener('click', openLanguageModal);
    if (drawerLangBtn) drawerLangBtn.addEventListener('click', openLanguageModal);

    if (langModalBackdrop) {
        langModalBackdrop.addEventListener('click', () => {
            // Allow closing by clicking backdrop if user has already set a language
            if (localStorage.getItem('jsk_user_lang')) {
                closeLanguageModal();
            }
        });
    }

    // First-visit check: Prompt user to choose language if not set
    const userLangStored = localStorage.getItem('jsk_user_lang');
    if (!userLangStored) {
        setTimeout(() => {
            openLanguageModal();
        }, 350);
    } else {
        applyLanguage(userLangStored);
    }

    /* ==========================================================================
       10. CONTACT / INQUIRY CALLBACK FORM HANDLER
       ========================================================================== */
    const contactInquiryForm = document.getElementById('contactInquiryForm');
    const inqAlert = document.getElementById('inqAlert');

    if (contactInquiryForm) {
        contactInquiryForm.addEventListener('submit', (e) => {
            e.preventDefault();

            const name = (document.getElementById('inqName') ? document.getElementById('inqName').value : '').trim();
            const mobile = (document.getElementById('inqMobile') ? document.getElementById('inqMobile').value : '').trim();
            const service = (document.getElementById('inqService') ? document.getElementById('inqService').value : '').trim();
            const msg = (document.getElementById('inqMessage') ? document.getElementById('inqMessage').value : '').trim();

            if (!name || name.length < 3) {
                showAlert(inqAlert, 'कृपया अपना पूरा नाम सही दर्ज करें।', 'alert-error');
                return;
            }
            if (!/^[6-9]\d{9}$/.test(mobile)) {
                showAlert(inqAlert, 'कृपया 10 अंकों का वैध भारतीय मोबाइल नंबर दर्ज करें।', 'alert-error');
                return;
            }

            const successMsg = `धन्यवाद ${name}! आपका संदेश जन सेवा केंद्र को प्राप्त हो गया है। हमारा प्रतिनिधि 30 मिनट में मोबाइल नंबर ${mobile} पर संपर्क करेगा।`;
            showAlert(inqAlert, successMsg, 'alert-success');
            contactInquiryForm.reset();

            // WhatsApp direct fallback link if user wants instant reply
            const whatsappText = encodeURIComponent(`नमस्ते जन सेवा केंद्र,\nमेरा नाम: ${name}\nमोबाइल: ${mobile}\nसेवा पूछताछ: ${service || 'सामान्य जानकारी'}\nसंदेश: ${msg || 'कृपया मुझसे संपर्क करें'}`);
            setTimeout(() => {
                if (confirm('क्या आप यह संदेश सीधे संचालक के व्हाट्सएप पर भी भेजना चाहते हैं?')) {
                    window.open(`https://wa.me/${CONFIG.whatsapp}?text=${whatsappText}`, '_blank');
                }
            }, 600);
        });
    }
});

