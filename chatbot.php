<?php include 'includes/header.php'; ?>

<div class="h-[calc(100vh-80px)] flex flex-col pt-6 pb-6 w-full max-w-5xl mx-auto">
    <!-- Header Area -->
    <div class="text-center mb-6 px-4">
        <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-gradient-to-tr from-brand-600 to-brand-accent mb-4 shadow-lg shadow-brand-500/30 animate-float">
            <i class="fa-solid fa-robot text-3xl text-white"></i>
        </div>
        <h1 class="text-3xl font-heading font-bold text-gray-900 dark:text-white">FinBuddy AI</h1>
        <p class="text-gray-500 dark:text-gray-400 text-sm max-w-lg mx-auto mt-2">
            Your personal financial assistant. Ask me about EMI reduction, prepayment strategies, or home loan eligibility.
        </p>
    </div>

    <!-- Chat Container -->
    <div class="flex-1 bg-white dark:bg-dark-card/50 backdrop-blur-md rounded-3xl border border-gray-200 dark:border-white/5 shadow-2xl overflow-hidden flex flex-col mx-4 mb-4 relative">
        
        <!-- Messages Area -->
        <div class="flex-1 overflow-y-auto p-6 space-y-6 custom-scrollbar scroll-smooth" id="full-chat-messages">
            <!-- Intro Message -->
            <div class="flex items-start gap-4 animate-fade-in-up">
                <div class="w-10 h-10 rounded-full bg-gradient-to-tr from-brand-500 to-brand-accent flex items-center justify-center shrink-0 shadow-md">
                    <i class="fa-solid fa-robot text-white text-sm"></i>
                </div>
                <div class="bg-gray-100 dark:bg-white/5 border border-gray-200 dark:border-white/5 rounded-2xl rounded-tl-none p-5 max-w-[85%] shadow-sm">
                    <p class="text-gray-800 dark:text-gray-200 text-sm leading-relaxed">
                        Hello! 👋 I'm FinBuddy. I can help you plan your loans better. <br><br>
                        Try asking:
                        <ul class="mt-2 space-y-1 list-disc list-inside text-gray-600 dark:text-gray-400">
                            <li>"How do I reduce my home loan interest?"</li>
                            <li>"Is it better to reduce tenure or EMI?"</li>
                            <li>"Calculate EMI for 50 Lakhs at 8.5% for 20 years"</li>
                        </ul>
                    </p>
                </div>
            </div>
        </div>

        <!-- Input Area -->
        <div class="p-4 bg-gray-50 dark:bg-dark-bg/80 border-t border-gray-200 dark:border-white/5">
            <form id="full-chat-form" class="relative flex items-end gap-2 max-w-4xl mx-auto">
                <div class="relative flex-1">
                    <textarea id="full-chat-input" rows="1" placeholder="Type your financial question..." class="w-full bg-white dark:bg-dark-card border border-gray-300 dark:border-white/10 rounded-2xl py-3.5 pl-5 pr-12 text-gray-900 dark:text-white focus:outline-none focus:border-brand-500 focus:ring-1 focus:ring-brand-500 transition-all resize-none shadow-sm text-sm" style="min-height: 50px; max-height: 120px;"></textarea>
                    
                    <!-- Quick Actions (Hidden for now, could be added later) -->
                </div>
                <button type="submit" class="h-[50px] w-[50px] bg-brand-600 hover:bg-brand-500 text-white rounded-2xl flex items-center justify-center shadow-lg shadow-brand-500/20 transition-transform active:scale-95">
                    <i class="fa-solid fa-paper-plane text-lg"></i>
                </button>
            </form>
            <div class="text-center mt-2">
                <p class="text-[10px] text-gray-400">AI can make mistakes. Please verify financial figures with a bank.</p>
            </div>
        </div>
    </div>
</div>

<script src="js/chatbot.js"></script>
<?php include 'includes/footer.php'; ?>
