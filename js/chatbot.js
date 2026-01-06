const chatForm = document.getElementById('full-chat-form');
const chatInput = document.getElementById('full-chat-input');
const chatMessages = document.getElementById('full-chat-messages');

// Auto-resize textarea
if (chatInput) {
    chatInput.addEventListener('input', function () {
        this.style.height = 'auto';
        this.style.height = (this.scrollHeight) + 'px';
        if (this.value === '') this.style.height = '50px';
    });
}

// Knowledge Base (Simple Intents)
const knowledgeBase = [
    {
        keywords: ['hello', 'hi', 'hey', 'start'],
        response: "Hello! Ready to save some money? What's your current loan scenario?",
        followUp: ["I have a home loan", "I want to take a new loan"]
    },
    {
        keywords: ['reduce', 'interest', 'save'],
        response: "To reduce interest outflow, you have two powerful options:<br>1. **Prepayment:** Paying just 5% of loan amount every year can clear a 20-year loan in ~12 years.<br>2. **Tenure Reduction:** Ask your bank to reduce tenure instead of EMI when rates drop.",
        followUp: null
    },
    {
        keywords: ['prepayment', 'prepay', 'part payment'],
        response: "Prepayment hits the principal directly. Even small part-payments (like an annual bonus) significantly reduce the compounding interest effect. Do you want to calculate how much you'd save?",
        followUp: ["Yes, calculate savings", "No, tell me about tenure"]
    },
    {
        keywords: ['tenure', 'years', 'time'],
        response: "Shorter tenure = Higher EMI but LOWER Total Interest.<br>Longer tenure = Lower EMI but HIGHER Total Interest.<br><br><b>Pro Tip:</b> Always try to keep tenure under 15 years to avoid paying more interest than the principal amount.",
        followUp: null
    },
    {
        keywords: ['calculate', 'calc', 'emi for'],
        response: "I can help with that! Please tell me the amount, rate, and tenure like this: <br><i>'50 lakhs at 8.5% for 20 years'</i>",
        followUp: null
    },
    {
        keywords: ['affordable', 'salary', 'income', 'limit', 'ratio'],
        response: "Financial prudence suggests your total EMIs should not exceed **40-50%** of your net monthly income. If you earn ₹1 Lakh/month, your total EMIs should ideally be under ₹40k-50k.",
        followUp: null
    },
    {
        keywords: ['document', 'paper', 'requirement'],
        response: "Common documents for loans include:<br>✅ Identity Proof (Aadhaar/PAN)<br>✅ Address Proof<br>✅ Income Proof (3 months payslips + 2 years ITR)<br>✅ Bank Statements (6 months)",
        followUp: null
    }
];

// Parser Logic
const getBotResponse = (input) => {
    const lowerInput = input.toLowerCase();

    // Check for specific calculation pattern: "X at Y% for Z years"
    // Very basic regex for demo
    const calcMatch = lowerInput.match(/(\d+).*?(\d+\.?\d*).*?(\d+)/);
    if (lowerInput.includes('calculate') && calcMatch) {
        // This is a naive extraction for demo purposes
        return "I see numbers! To get an exact calculation, please use our <a href='calculator.php' class='text-brand-500 underline font-bold'>Advanced Calculator</a> page which has precise sliders and charts.";
    }

    // Keyword matching
    for (let item of knowledgeBase) {
        if (item.keywords.some(k => lowerInput.includes(k))) {
            return item.response;
        }
    }

    return "That's an interesting question. While I'm still learning, I'd suggest focusing on keeping your **Debt-to-Income Ratio** below 40%. Would you like to check our Affordability Calculator?";
};

// UI Functions
const appendMessage = (text, isUser) => {
    const div = document.createElement('div');
    div.className = `flex items-start gap-4 animate-fade-in-up ${isUser ? 'flex-row-reverse' : ''}`;

    const icon = isUser ? '<i class="fa-solid fa-user text-white text-xs"></i>' : '<i class="fa-solid fa-robot text-white text-xs"></i>';
    const bgClass = isUser ? 'bg-brand-600 text-white' : 'bg-gray-100 dark:bg-white/5 border border-gray-200 dark:border-white/5 text-gray-800 dark:text-gray-200 shadow-sm';
    const rounded = isUser ? 'rounded-tr-none' : 'rounded-tl-none';
    const align = isUser ? 'ms-auto' : '';

    div.innerHTML = `
        <div class="w-8 h-8 rounded-full ${isUser ? 'bg-gray-400 dark:bg-gray-600' : 'bg-gradient-to-tr from-brand-500 to-brand-accent'} flex items-center justify-center shrink-0 shadow-md">
            ${icon}
        </div>
        <div class="${bgClass} rounded-2xl ${rounded} p-4 max-w-[85%] text-sm leading-relaxed shadow-sm">
            <p>${text}</p>
        </div>
    `;

    chatMessages.appendChild(div);
    chatMessages.scrollTop = chatMessages.scrollHeight; // Auto scroll
};

const showTypingIndicator = () => {
    const id = 'typing-' + Date.now();
    const div = document.createElement('div');
    div.id = id;
    div.className = 'flex items-center gap-2 mb-4 ml-12';
    div.innerHTML = `
        <div class="w-2 h-2 bg-gray-400 rounded-full animate-bounce"></div>
        <div class="w-2 h-2 bg-gray-400 rounded-full animate-bounce" style="animation-delay: 0.2s"></div>
        <div class="w-2 h-2 bg-gray-400 rounded-full animate-bounce" style="animation-delay: 0.4s"></div>
    `;
    chatMessages.appendChild(div);
    chatMessages.scrollTop = chatMessages.scrollHeight;
    return id;
};

// Event Listeners
if (chatForm) {
    chatForm.addEventListener('submit', (e) => {
        e.preventDefault();
        const msg = chatInput.value.trim();
        if (!msg) return;

        // User Message
        appendMessage(msg, true);
        chatInput.value = '';
        chatInput.style.height = '50px'; // Reset height

        // Typing effect
        const typingId = showTypingIndicator();

        // Bot Response Delay
        setTimeout(() => {
            document.getElementById(typingId).remove();
            const response = getBotResponse(msg);
            appendMessage(response, false);
        }, 1200);
    });

    // Enter key to submit
    chatInput.addEventListener('keydown', (e) => {
        if (e.key === 'Enter' && !e.shiftKey) {
            e.preventDefault();
            chatForm.dispatchEvent(new Event('submit'));
        }
    });
}
