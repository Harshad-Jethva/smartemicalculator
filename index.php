<?php include 'includes/header.php'; ?>

<!-- Hero Section -->
<div class="relative overflow-hidden min-h-screen flex items-center justify-center">
    <!-- 3D Background Container -->
    <div id="three-bg" class="absolute inset-0 z-0"></div>

    <!-- Gradient Overlay (Pastel) -->
    <div class="absolute inset-0 z-0 bg-pastel-gradient opacity-30 dark:opacity-10 mix-blend-overlay pointer-events-none"></div>
    
    <div class="relative z-10 text-center space-y-8 max-w-5xl mx-auto px-4">
        <div class="inline-flex items-center gap-2 px-6 py-2 rounded-full bg-white/50 dark:bg-white/5 border border-white/60 dark:border-white/10 text-brand-dark dark:text-pastel-blue text-sm font-bold shadow-sm backdrop-blur-md animate-fade-in-up">
            <span class="relative flex h-2 w-2">
                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-pastel-rose opacity-75"></span>
                <span class="relative inline-flex rounded-full h-2 w-2 bg-pastel-rose"></span>
            </span>
            <span>Now with AI Financial Assistant</span>
        </div>
        
        <h1 class="text-6xl md:text-8xl font-heading font-bold leading-tight tracking-tight text-gray-900 dark:text-white drop-shadow-sm animate-fade-in-up">
            Master Your Loans <br>
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-brand-500 via-pastel-mauve to-brand-600">With Intelligence</span>
        </h1>
        
        <p class="text-gray-600 dark:text-gray-400 text-lg md:text-xl max-w-2xl mx-auto leading-relaxed animate-fade-in-up" style="animation-delay: 0.2s">
            Don't just calculate EMI. Understand the impact of tenure, prepayments, and interest rates with our Pro-Grade Financial Planner.
        </p>

        <div class="flex flex-col sm:flex-row gap-4 justify-center mt-8 animate-fade-in-up" style="animation-delay: 0.3s">
            <a href="calculator.php" class="px-8 py-4 bg-brand-600 hover:bg-brand-500 text-white rounded-full font-semibold transition-all shadow-lg shadow-brand-500/25 flex items-center justify-center gap-2 group">
                Launch Calculator
                <i class="fa-solid fa-arrow-right group-hover:translate-x-1 transition-transform"></i>
            </a>
            <a href="chatbot.php" class="px-8 py-4 bg-white dark:bg-white/10 hover:bg-gray-50 dark:hover:bg-white/20 text-gray-900 dark:text-white rounded-full font-semibold border border-gray-200 dark:border-white/10 transition-all flex items-center justify-center gap-2">
                <i class="fa-solid fa-robot text-brand-500"></i> Talk to AI
            </a>
        </div>
    </div>
</div>

<!-- Stats / Credibility -->
<div class="grid grid-cols-2 md:grid-cols-4 gap-8 max-w-6xl mx-auto mb-20 border-y border-gray-100 dark:border-white/5 py-12">
    <div class="text-center">
        <h3 class="text-3xl font-bold text-gray-900 dark:text-white mb-1">50k+</h3>
        <p class="text-gray-500 text-sm uppercase tracking-wide">Calculations Run</p>
    </div>
    <div class="text-center">
        <h3 class="text-3xl font-bold text-brand-500 mb-1">99.9%</h3>
        <p class="text-gray-500 text-sm uppercase tracking-wide">Accuracy</p>
    </div>
    <div class="text-center">
        <h3 class="text-3xl font-bold text-gray-900 dark:text-white mb-1">0%</h3>
        <p class="text-gray-500 text-sm uppercase tracking-wide">Hidden Fees</p>
    </div>
    <div class="text-center">
        <h3 class="text-3xl font-bold text-brand-accent mb-1">24/7</h3>
        <p class="text-gray-500 text-sm uppercase tracking-wide">AI Availability</p>
    </div>
</div>

<!-- Features Grid -->
<div class="max-w-7xl mx-auto mb-20 px-4">
    <h2 class="text-3xl font-heading font-bold text-center mb-12 text-gray-900 dark:text-white">Everything you need to plan</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8" id="features">
        <div class="bg-white dark:bg-dark-card/50 backdrop-blur-md border border-gray-200 dark:border-white/5 rounded-3xl p-8 hover:border-brand-500/30 hover:shadow-xl transition-all group">
            <div class="w-14 h-14 rounded-2xl bg-brand-500/10 flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                <i class="fa-solid fa-calculator text-2xl text-brand-500"></i>
            </div>
            <h3 class="text-xl font-bold mb-3 text-gray-900 dark:text-white">Smart Calculator</h3>
            <p class="text-gray-500 dark:text-gray-400 text-sm leading-relaxed">Get real-time EMI breakdowns with visually rich sliders. See changes instantly as you adjust tenure or rules.</p>
        </div>

        <div class="bg-white dark:bg-dark-card/50 backdrop-blur-md border border-gray-200 dark:border-white/5 rounded-3xl p-8 hover:border-brand-500/30 hover:shadow-xl transition-all group">
            <div class="w-14 h-14 rounded-2xl bg-purple-500/10 flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                <i class="fa-solid fa-brain text-2xl text-purple-500"></i>
            </div>
            <h3 class="text-xl font-bold mb-3 text-gray-900 dark:text-white">AI Assistant</h3>
            <p class="text-gray-500 dark:text-gray-400 text-sm leading-relaxed">Not sure about tenure? Ask our AI. It analyzes your inputs to suggest interest-saving strategies.</p>
        </div>

        <div class="bg-white dark:bg-dark-card/50 backdrop-blur-md border border-gray-200 dark:border-white/5 rounded-3xl p-8 hover:border-brand-500/30 hover:shadow-xl transition-all group">
            <div class="w-14 h-14 rounded-2xl bg-brand-accent/10 flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                <i class="fa-solid fa-file-export text-2xl text-brand-accent"></i>
            </div>
            <h3 class="text-xl font-bold mb-3 text-gray-900 dark:text-white">Pro Reports</h3>
            <p class="text-gray-500 dark:text-gray-400 text-sm leading-relaxed">Download detailed PDF reports of your loan schedule. Export to CSV for Excel analysis. Keep comprehensive records.</p>
        </div>
    </div>
</div>

<!-- Testimonials Section (New Content) -->
<div class="bg-gray-50 dark:bg-white/5 py-20 mb-20">
    <div class="max-w-7xl mx-auto px-4">
        <h2 class="text-3xl font-heading font-bold text-center mb-12 text-gray-900 dark:text-white">Trusted by Smart Planners</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Review 1 -->
            <div class="bg-white dark:bg-dark-card p-6 rounded-2xl shadow-sm border border-gray-100 dark:border-white/5">
                <div class="flex items-center gap-1 text-yellow-500 mb-4 text-xs">
                    <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                </div>
                <p class="text-gray-600 dark:text-gray-300 text-sm mb-6 leading-relaxed">"The tenure optimization tip saved me nearly 2 Lakhs in interest. I didn't realize a small EMI bump could save so much time!"</p>
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-full bg-gray-200 overflow-hidden">
                        <img src="https://ui-avatars.com/api/?name=Rahul+K&background=random" alt="User">
                    </div>
                    <div>
                        <h4 class="text-sm font-bold text-gray-900 dark:text-white">Rahul Kumar</h4>
                        <p class="text-xs text-gray-500">Home Loan User</p>
                    </div>
                </div>
            </div>
            <!-- Review 2 -->
            <div class="bg-white dark:bg-dark-card p-6 rounded-2xl shadow-sm border border-gray-100 dark:border-white/5">
                <div class="flex items-center gap-1 text-yellow-500 mb-4 text-xs">
                     <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                </div>
                <p class="text-gray-600 dark:text-gray-300 text-sm mb-6 leading-relaxed">"Visualizing the Principal vs Interest timeline really opened my eyes. Fantastic UI and very easy to use."</p>
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-full bg-gray-200 overflow-hidden">
                        <img src="https://ui-avatars.com/api/?name=Sneha+P&background=random" alt="User">
                    </div>
                    <div>
                        <h4 class="text-sm font-bold text-gray-900 dark:text-white">Sneha Patel</h4>
                        <p class="text-xs text-gray-500">Car Loan User</p>
                    </div>
                </div>
            </div>
             <!-- Review 3 -->
             <div class="bg-white dark:bg-dark-card p-6 rounded-2xl shadow-sm border border-gray-100 dark:border-white/5">
                <div class="flex items-center gap-1 text-yellow-500 mb-4 text-xs">
                     <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star-half-stroke"></i>
                </div>
                <p class="text-gray-600 dark:text-gray-300 text-sm mb-6 leading-relaxed">"I love the PDF export feature. It made it so easy to share the plan with my spouse before we approached the bank."</p>
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-full bg-gray-200 overflow-hidden">
                        <img src="https://ui-avatars.com/api/?name=Amit+S&background=random" alt="User">
                    </div>
                    <div>
                        <h4 class="text-sm font-bold text-gray-900 dark:text-white">Amit Singh</h4>
                        <p class="text-xs text-gray-500">Personal Loan User</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- CTA Section -->
<div class="relative rounded-3xl overflow-hidden p-10 md:p-20 text-center border border-white/10 mx-4 md:mx-auto max-w-7xl mb-20 bg-dark-bg text-white">
    <div class="absolute inset-0 bg-gradient-to-r from-brand-600/90 to-brand-accent/90 backdrop-blur-xl -z-10"></div>
    <h2 class="text-3xl md:text-5xl font-heading font-bold mb-6">Ready to plan your future?</h2>
    <p class="text-gray-200 mb-8 max-w-xl mx-auto">Join thousands of users making smarter, data-driven financial decisions today.</p>
    <a href="calculator.php" class="inline-flex px-8 py-4 bg-white text-brand-600 hover:bg-gray-100 rounded-full font-bold transition-all shadow-xl items-center gap-2">
        Start Calculating Now <i class="fa-solid fa-rocket"></i>
    </a>
</div>

<?php include 'includes/footer.php'; ?>
