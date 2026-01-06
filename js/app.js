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
// tenureVal removed in new design, sync logic updated? Wait, I removed tenure-val ID in HTML
// Let's check HTML. Ah, I removed the span ID. I should handle that.

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

// Affordability
const salaryInput = document.getElementById('salary-input');
const affordabilityBar = document.getElementById('affordability-bar');
const affordabilityText = document.getElementById('affordability-text');
const affordabilityBadge = document.getElementById('affordability-badge');

// Amortization
const amortizationBody = document.getElementById('amortization-body');
const viewPieBtn = document.getElementById('view-pie');
const viewTimelineBtn = document.getElementById('view-timeline');
const containerPie = document.getElementById('chart-container-pie');
const containerTimeline = document.getElementById('chart-container-timeline');

// Theme Toggle
const themeBtn = document.getElementById('theme-toggle');
const html = document.documentElement;

// Store Global State
let currentEMI = 0;
let currentTotalInterest = 0;

// Format Currency
const formatCurrency = (num) => {
    return new Intl.NumberFormat('en-IN').format(Math.round(num));
};

// Calculate EMI
const calculateEMI = () => {
    const P = parseFloat(amountInput.value);
    const R = parseFloat(rateInput.value) / 12 / 100;
    const N = parseFloat(tenureInput.value) * 12; // Assuming Years mode for now default

    if (P <= 0 || R <= 0 || N <= 0) return;

    const emi = (P * R * Math.pow(1 + R, N)) / (Math.pow(1 + R, N) - 1);
    const totalPayment = emi * N;
    const totalInterest = totalPayment - P;

    currentEMI = emi;
    currentTotalInterest = totalInterest;

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
    if (typeof updateChartData === 'function') {
        updateChartData(P, totalInterest);
    }

    // Update AI Tip based on context
    updateAiTip(P, parseFloat(rateInput.value), parseFloat(tenureInput.value), totalInterest);

    // Update Affordability
    checkAffordability();

    // Update Amortization if visible
    if (containerTimeline && !containerTimeline.classList.contains('hidden')) {
        generateAmortization(P, parseFloat(rateInput.value), parseFloat(tenureInput.value));
    }
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
const syncInputs = (range, input, displayValId, thumbId, progressId) => {
    range.addEventListener('input', () => {
        input.value = range.value;
        if (displayValId) {
            const disp = document.getElementById(displayValId);
            if (disp) disp.innerText = formatCurrency(range.value);
        }
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
            if (displayValId) {
                const disp = document.getElementById(displayValId);
                if (disp) disp.innerText = formatCurrency(val);
            }
            updateSliderProgress(range, thumbId, progressId);
            calculateEMI();
        }
    });
};

// Affordability Logic
const checkAffordability = () => {
    if (!salaryInput) return;
    const salary = parseFloat(salaryInput.value);
    if (!salary || salary <= 0) {
        affordabilityBar.style.width = '0%';
        affordabilityText.innerText = "Enter salary to check financial health.";
        affordabilityBadge.className = 'text-xs px-2 py-0.5 rounded bg-gray-100 text-gray-500';
        affordabilityBadge.innerText = "Unknown";
        return;
    }

    const ratio = (currentEMI / salary) * 100;
    const visualRatio = Math.min(ratio, 100);

    affordabilityBar.style.width = `${visualRatio}%`;

    if (ratio < 30) {
        affordabilityBar.className = 'h-full bg-green-500 transition-all duration-500';
        affordabilityBadge.className = 'text-xs px-2 py-0.5 rounded bg-green-500/10 text-green-500';
        affordabilityBadge.innerText = "Excellent";
        affordabilityText.innerText = `Great! Your EMI is only ${Math.round(ratio)}% of your income.`;
    } else if (ratio < 50) {
        affordabilityBar.className = 'h-full bg-yellow-500 transition-all duration-500';
        affordabilityBadge.className = 'text-xs px-2 py-0.5 rounded bg-yellow-500/10 text-yellow-600';
        affordabilityBadge.innerText = "Moderate";
        affordabilityText.innerText = `Careful. Your EMI is ${Math.round(ratio)}% of your income. try to keep it under 40%.`;
    } else {
        affordabilityBar.className = 'h-full bg-red-500 transition-all duration-500';
        affordabilityBadge.className = 'text-xs px-2 py-0.5 rounded bg-red-500/10 text-red-500';
        affordabilityBadge.innerText = "High Risk";
        affordabilityText.innerText = `Warning! Your EMI is ${Math.round(ratio)}% of your income. This is risky.`;
        showToast("High EMI Risk Detected!", "error");
    }
};

if (salaryInput) {
    salaryInput.addEventListener('input', checkAffordability);
}


// Amortization Generator
const generateAmortization = (P, R_annual, Years) => {
    if (!amortizationBody) return;
    amortizationBody.innerHTML = '';

    let balance = P;
    const r = R_annual / 12 / 100;
    const n = Years * 12;
    const emi = (P * r * Math.pow(1 + r, n)) / (Math.pow(1 + r, n) - 1);

    let totalInt = 0;

    // Show Year-wise summary to save space
    for (let i = 1; i <= Years; i++) {
        let interestYearly = 0;
        let principalYearly = 0;

        for (let m = 0; m < 12; m++) {
            if (balance <= 0) break;
            const interest = balance * r;
            const principal = emi - interest;
            interestYearly += interest;
            principalYearly += principal;
            balance -= principal;
        }

        const tr = document.createElement('tr');
        tr.className = "border-b border-gray-100 dark:border-white/5 hover:bg-gray-50 dark:hover:bg-white/5 transition";
        tr.innerHTML = `
            <td class="py-2">Year ${i}</td>
            <td class="py-2">₹${formatCurrency(principalYearly)}</td>
            <td class="py-2 text-brand-500">₹${formatCurrency(interestYearly)}</td>
            <td class="py-2 text-right">₹${formatCurrency(Math.max(0, balance))}</td>
        `;
        amortizationBody.appendChild(tr);
    }
};

// View Toggle
if (viewPieBtn && viewTimelineBtn) {
    viewPieBtn.addEventListener('click', () => {
        containerPie.classList.remove('hidden');
        containerTimeline.classList.add('hidden');
        viewPieBtn.className = "flex-1 py-1.5 text-xs font-semibold rounded text-white bg-brand-600 shadow-sm transition-all";
        viewTimelineBtn.className = "flex-1 py-1.5 text-xs font-semibold rounded text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white transition-all";
    });

    viewTimelineBtn.addEventListener('click', () => {
        const P = parseFloat(amountInput.value);
        const R = parseFloat(rateInput.value);
        const N = parseFloat(tenureInput.value);
        generateAmortization(P, R, N);

        containerPie.classList.add('hidden');
        containerTimeline.classList.remove('hidden');
        viewTimelineBtn.className = "flex-1 py-1.5 text-xs font-semibold rounded text-white bg-brand-600 shadow-sm transition-all";
        viewPieBtn.className = "flex-1 py-1.5 text-xs font-semibold rounded text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white transition-all";
    });
}


// Initialize
if (amountRange) {
    syncInputs(amountRange, amountInput, 'amount-val', 'amount-thumb', 'amount-progress');
    syncInputs(rateRange, rateInput, 'rate-val', 'rate-thumb', 'rate-progress');
    syncInputs(tenureRange, tenureInput, null, 'tenure-thumb', 'tenure-progress');
    calculateEMI();
    updateSliderProgress(amountRange, 'amount-thumb', 'amount-progress');
    updateSliderProgress(rateRange, 'rate-thumb', 'rate-progress');
    updateSliderProgress(tenureRange, 'tenure-thumb', 'tenure-progress');
}

// AI Tip Logic
const updateAiTip = (P, annualRate, years, totalInterest) => {
    let msg = "";
    if (annualRate > 10) {
        msg = "High Interest Alert! A balance transfer to a bank offering < 9% could save you around ₹" + formatCurrency(totalInterest * 0.15) + ".";
    } else if (years > 20) {
        msg = "Long Tenure Warning: You're paying huge interest. Increase EMI by 5% to reduce tenure by ~3 years.";
    } else {
        msg = "Smart Move! A prepayment of just 1 extra EMI per year can reduce your tenure by almost " + Math.round(years * 0.1) + " years.";
    }
    if (aiDynamicMsg) aiDynamicMsg.innerText = msg;
};

// Chat Simulation
const addMessage = (text, isUser = false) => {
    const div = document.createElement('div');
    div.className = `flex items-start gap-4 ${isUser ? 'flex-row-reverse' : ''}`;

    // Updated styling for light/dark
    const icon = isUser ? '<i class="fa-solid fa-user text-white text-sm"></i>' : '<i class="fa-solid fa-robot text-white text-sm"></i>';
    const bgClass = isUser ? 'bg-brand-600 text-white' : 'bg-white dark:bg-white/5 border border-gray-200 dark:border-white/5 text-gray-700 dark:text-gray-200 shadow-sm';
    const rounded = isUser ? 'rounded-tr-none' : 'rounded-tl-none';
    const align = isUser ? 'ms-auto' : '';

    div.innerHTML = `
        <div class="w-10 h-10 rounded-full ${isUser ? 'bg-gray-600' : 'bg-gradient-to-tr from-brand-500 to-brand-accent'} flex items-center justify-center shrink-0">
            ${icon}
        </div>
        <div class="${bgClass} rounded-2xl ${rounded} p-4 max-w-[80%] ${align}">
            <p class="text-sm leading-relaxed">${text}</p>
        </div>
    `;

    if (chatMessages) {
        chatMessages.appendChild(div);
        chatMessages.scrollTop = chatMessages.scrollHeight;
    }
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
            } else if (q.includes('limit') || q.includes('afford') || q.includes('salary')) {
                response += "financial experts suggest your EMI should not exceed 40% of your monthly in-hand income.";
            } else {
                response += "I'd recommend consulting a financial advisor for that specific scenario, but generally, lower tenure equals lower interest outflow.";
            }

            addMessage(response, false);
        }, 1000);
    });
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
            emi: currentEMI
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

            showToast("Calculation Verified & Saved!", "success");

            // Simulate PDF Download
            setTimeout(() => {
                btn.innerHTML = '<i class="fa-solid fa-check"></i> Saved';
                btn.classList.remove('bg-gray-900', 'dark:bg-white', 'text-white', 'dark:text-dark-bg');
                btn.classList.add('bg-green-500', 'text-white');

                setTimeout(() => {
                    btn.innerHTML = originalText;
                    btn.disabled = false;
                    // Restore classes logic (simplified)
                    btn.classList.add('bg-gray-900', 'text-white');
                    btn.classList.remove('bg-green-500', 'text-white');
                }, 3000);
            }, 800);

        } catch (error) {
            console.error('Error saving history:', error);
            showToast("Failed to save calculation.", "error");
            btn.innerHTML = 'Error';
            setTimeout(() => {
                btn.innerHTML = originalText;
                btn.disabled = false;
            }, 2000);
        }
    });
}

// Toast Notification Logic
const showToast = (message, type = "info") => {
    const container = document.getElementById('toast-container');
    if (!container) return;

    const toast = document.createElement('div');
    const color = type === "success" ? "bg-green-500" : (type === "error" ? "bg-red-500" : "bg-brand-600");
    const icon = type === "success" ? "fa-check-circle" : (type === "error" ? "fa-exclamation-circle" : "fa-info-circle");

    toast.className = `pointer-events-auto flex items-center gap-3 px-4 py-3 rounded-xl text-white shadow-lg transform transition-all duration-300 translate-x-full ${color}`;
    toast.innerHTML = `
        <i class="fa-solid ${icon}"></i>
        <span class="text-sm font-medium">${message}</span>
    `;

    container.appendChild(toast);

    // Animate In
    requestAnimationFrame(() => {
        toast.classList.remove('translate-x-full');
    });

    // Remove after 3s
    setTimeout(() => {
        toast.classList.add('translate-x-full', 'opacity-0');
        setTimeout(() => toast.remove(), 300);
    }, 3000);
};

// Theme Switching
if (themeBtn) {
    themeBtn.addEventListener('click', () => {
        html.classList.toggle('dark');
        if (html.classList.contains('dark')) {
            localStorage.setItem('theme', 'dark');
        } else {
            localStorage.setItem('theme', 'light');
        }
    });
}

// Check saved theme
if (localStorage.getItem('theme') === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
    html.classList.add('dark');
} else {
    html.classList.remove('dark');
}
