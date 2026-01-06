// Elements
const amountRange = document.getElementById('amount');
const amountInput = document.getElementById('amount-input');
const rateRange = document.getElementById('rate');
const rateInput = document.getElementById('rate-input');
const tenureRange = document.getElementById('tenure');
const tenureInput = document.getElementById('tenure-input');

// Display Values
const amountVal = document.getElementById('amount-val');
const rateVal = document.getElementById('rate-val');
const tenureVal = document.getElementById('tenure-val');

// Result Elements
const statEmi = document.getElementById('stat-emi');
const statPrincipal = document.getElementById('stat-principal');
const statInterest = document.getElementById('stat-interest');
const statTotal = document.getElementById('stat-total');
const centerEmi = document.getElementById('center-emi');

// Progress Bars
const barPrincipal = document.getElementById('bar-principal');
const barInterest = document.getElementById('bar-interest');

// AI Elements
const chatForm = document.getElementById('chat-form');
const chatInput = document.getElementById('chat-input');
const chatMessages = document.getElementById('chat-messages');
const aiTipCard = document.getElementById('ai-tip-card');
const aiDynamicMsg = document.getElementById('ai-dynamic-msg');

// Format Currency
const formatCurrency = (num) => {
    return new Intl.NumberFormat('en-IN').format(Math.round(num));
};

// Calculate EMI
const calculateEMI = () => {
    const P = parseFloat(amountInput.value);
    const R = parseFloat(rateInput.value) / 12 / 100;
    const N = parseFloat(tenureInput.value) * 12;

    if (P <= 0 || R <= 0 || N <= 0) return;

    const emi = (P * R * Math.pow(1 + R, N)) / (Math.pow(1 + R, N) - 1);
    const totalPayment = emi * N;
    const totalInterest = totalPayment - P;

    // Update UI
    statEmi.innerText = formatCurrency(emi);
    centerEmi.innerText = '₹' + formatCurrency(emi);
    statPrincipal.innerText = formatCurrency(P);
    statInterest.innerText = formatCurrency(totalInterest);
    statTotal.innerText = formatCurrency(totalPayment);

    // Update Bars
    const total = totalPayment;
    const principalPct = (P / total) * 100;
    const interestPct = (totalInterest / total) * 100;

    barPrincipal.style.width = `${principalPct}%`;
    barInterest.style.width = `${interestPct}%`;

    // Update Chart
    updateChartData(P, totalInterest);

    // Update AI Tip based on context
    updateAiTip(P, R * 12 * 100, N / 12, totalInterest);
};

// Update Progress Bars for Sliders
const updateSliderProgress = (range, thumbId, progressId) => {
    const min = range.min ? parseFloat(range.min) : 0;
    const max = range.max ? parseFloat(range.max) : 100;
    const val = parseFloat(range.value);
    const pct = ((val - min) / (max - min)) * 100;

    document.getElementById(progressId).style.width = `${pct}%`;
    document.getElementById(thumbId).style.left = `${pct}%`;
};

// Sync Logic
const syncInputs = (range, input, displayVal, thumbId, progressId, suffix = '') => {
    range.addEventListener('input', () => {
        input.value = range.value;
        displayVal.innerText = suffix === '' ? formatCurrency(range.value) : range.value;
        updateSliderProgress(range, thumbId, progressId);
        calculateEMI();
    });

    input.addEventListener('input', () => {
        // Validate max/min
        const val = parseFloat(input.value);
        const min = parseFloat(range.min);
        const max = parseFloat(range.max);

        if (val >= min && val <= max) {
            range.value = val;
            displayVal.innerText = suffix === '' ? formatCurrency(val) : val;
            updateSliderProgress(range, thumbId, progressId);
            calculateEMI();
        }
    });
};

// Initialize
syncInputs(amountRange, amountInput, amountVal, 'amount-thumb', 'amount-progress');
syncInputs(rateRange, rateInput, rateVal, 'rate-thumb', 'rate-progress');
syncInputs(tenureRange, tenureInput, tenureVal, 'tenure-thumb', 'tenure-progress', ' Years');

// AI Tip Logic
const updateAiTip = (P, annualRate, years, totalInterest) => {
    let msg = "";
    if (annualRate > 10) {
        msg = "Your interest rate is a bit high. A balance transfer to a bank offering < 9% could save you around ₹" + formatCurrency(totalInterest * 0.15) + ".";
    } else if (years > 20) {
        msg = "A tenure of over 20 years increases your interest burden significantly. If possible, increase EMI by 10% to reduce tenure.";
    } else {
        msg = "Your plan looks solid! A prepayment of just 1 extra EMI per year can reduce your tenure by almost " + Math.round(years * 0.1) + " years.";
    }
    aiDynamicMsg.innerText = msg;
};

// Chat Simulation
const addMessage = (text, isUser = false) => {
    const div = document.createElement('div');
    div.className = `flex items-start gap-4 ${isUser ? 'flex-row-reverse' : ''}`;

    const icon = isUser ? '<i class="fa-solid fa-user text-white text-sm"></i>' : '<i class="fa-solid fa-robot text-white text-sm"></i>';
    const bgClass = isUser ? 'bg-brand-600 text-white' : 'bg-white/5 border border-white/5 text-gray-200';
    const rounded = isUser ? 'rounded-tr-none' : 'rounded-tl-none';
    const align = isUser ? 'ms-auto' : ''; // Just to be safe with flex

    div.innerHTML = `
        <div class="w-10 h-10 rounded-full ${isUser ? 'bg-gray-600' : 'bg-gradient-to-tr from-brand-500 to-brand-accent'} flex items-center justify-center shrink-0">
            ${icon}
        </div>
        <div class="${bgClass} rounded-2xl ${rounded} p-4 max-w-[80%] ${align}">
            <p class="text-sm leading-relaxed">${text}</p>
        </div>
    `;

    chatMessages.appendChild(div);
    chatMessages.scrollTop = chatMessages.scrollHeight;
};

if (chatForm) {
    chatForm.addEventListener('submit', (e) => {
        e.preventDefault();
        const query = chatInput.value.trim();
        if (!query) return;

        addMessage(query, true);
        chatInput.value = '';

        // Simulate AI typing delay
        setTimeout(() => {
            let response = "That's a great question. Based on your current EMI of ₹" + statEmi.innerText + ", ";

            const q = query.toLowerCase();
            if (q.includes('reduce') || q.includes('save') || q.includes('interest')) {
                response += "the best way to reduce interest is to make part-prepayments. Even paying ₹50,000 extra annually can save you lakhs in the long run.";
            } else if (q.includes('limit') || q.includes('afford')) {
                response += "financial experts suggest your EMI should not exceed 40% of your monthly in-hand income.";
            } else {
                response += "I'd recommend consulting a financial advisor for that specific scenario, but generally, lower tenure equals lower interest outflow.";
            }

            addMessage(response, false);
        }, 1000);
    });
}


// Initial Calc only if on simulator page
if (document.getElementById('amount')) {
    calculateEMI();
    updateSliderProgress(amountRange, 'amount-thumb', 'amount-progress');
    updateSliderProgress(rateRange, 'rate-thumb', 'rate-progress');
    updateSliderProgress(tenureRange, 'tenure-thumb', 'tenure-progress');
}

// Generate Report Handler (Connects to Backend)
const finalReportBtn = document.getElementById('get-report-btn');
if (finalReportBtn) {
    finalReportBtn.addEventListener('click', async () => {
        const btn = finalReportBtn;
        const originalText = btn.innerHTML;

        // Loading State
        btn.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> Saving...';
        btn.disabled = true;

        const payload = {
            amount: parseFloat(amountInput.value),
            rate: parseFloat(rateInput.value),
            tenure: parseFloat(tenureInput.value),
            emi: parseFloat(statEmi.innerText.replace(/,/g, ''))
        };

        try {
            // Attempt to save to backend
            const response = await fetch('api/save_history.php', {
                method: 'POST',
                body: JSON.stringify(payload),
                headers: { 'Content-Type': 'application/json' }
            });

            const result = await response.json();
            console.log('Saved:', result);

            // Simulate PDF Generation
            setTimeout(() => {
                btn.innerHTML = '<i class="fa-solid fa-check"></i> Report Downloaded';
                btn.classList.remove('bg-white', 'text-dark-bg');
                btn.classList.add('bg-green-500', 'text-white');

                setTimeout(() => {
                    btn.innerHTML = originalText;
                    btn.disabled = false;
                    btn.classList.add('bg-white', 'text-dark-bg');
                    btn.classList.remove('bg-green-500', 'text-white');
                }, 3000);
            }, 800);

        } catch (error) {
            console.error('Error saving history:', error);
            btn.innerHTML = 'Error Saving';
            setTimeout(() => {
                btn.innerHTML = originalText;
                btn.disabled = false;
            }, 2000);
        }
    });
}

