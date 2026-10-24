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
    const mobileLinks = document.querySelectorAll('.mobile-nav-link, .mobile-nav-drawer a');

    if (mobileMenuBtn && mobileNavDrawer) {
        mobileMenuBtn.addEventListener('click', () => {
            const isOpen = mobileNavDrawer.classList.toggle('open');
            mobileMenuBtn.setAttribute('aria-expanded', isOpen);
            mobileNavDrawer.setAttribute('aria-hidden', !isOpen);
        });

        if (drawerCloseBtn) {
            drawerCloseBtn.addEventListener('click', () => {
                mobileNavDrawer.classList.remove('open');
                mobileMenuBtn.setAttribute('aria-expanded', 'false');
                mobileNavDrawer.setAttribute('aria-hidden', 'true');
            });
        }

        mobileLinks.forEach(link => {
            link.addEventListener('click', () => {
                mobileNavDrawer.classList.remove('open');
                mobileMenuBtn.setAttribute('aria-expanded', 'false');
                mobileNavDrawer.setAttribute('aria-hidden', 'true');
            });
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

    function openServiceModal(data) {
        if (!serviceModal) return;

        document.getElementById('modalServiceTitle').textContent = data.title || 'सेवा विवरण';
        document.getElementById('modalServiceFee').textContent = data.fee || '₹50';
        document.getElementById('modalServiceTime').textContent = data.time || '3 से 5 दिन';
        document.getElementById('modalServiceDesc').textContent = data.desc || '';
        document.getElementById('modalServiceBadge').textContent = data.badge || 'सेवा विवरण';

        // Required docs checklist
        const docsList = document.getElementById('modalServiceDocsList');
        if (docsList) {
            docsList.innerHTML = '';
            const docs = (data.docs || '').split(',');
            docs.forEach(doc => {
                const li = document.createElement('li');
                li.innerHTML = `✓ ${doc.trim()}`;
                docsList.appendChild(li);
            });
        }

        currentModalServiceId = data.id || '';
        currentModalServiceTitle = data.title || '';

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
                fee: btn.getAttribute('data-fee'),
                time: btn.getAttribute('data-time'),
                docs: btn.getAttribute('data-docs'),
                desc: btn.getAttribute('data-desc'),
                badge: btn.getAttribute('data-badge')
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

    function renderTrackingResult(data) {
        if (!trackResultBox) return;

        document.getElementById('trackResId').textContent = data.tracking_id;
        document.getElementById('trackResName').textContent = data.applicant;
        document.getElementById('trackResService').textContent = data.service;

        const badge = document.getElementById('trackResBadge');
        if (badge) {
            badge.textContent = data.status_text;
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

                const stepDiv = document.createElement('div');
                stepDiv.className = `step-node ${stateClass}`;
                stepDiv.innerHTML = `
                    <div class="node-circle">${isCompleted ? '✓' : stepNum}</div>
                    <span class="node-title">${step.title}</span>
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
       9. LANGUAGE PREFERENCE & FIRST-VISIT POPUP MODAL
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

    function applyLanguage(lang) {
        selectedLang = lang;
        localStorage.setItem('jsk_user_lang', lang);

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

        // Dynamically update all elements with .lang-text
        document.querySelectorAll('.lang-text').forEach(el => {
            const translated = el.getAttribute(`data-${lang}`);
            if (translated) {
                el.textContent = translated;
            }
        });
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

