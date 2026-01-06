<?php include 'includes/header.php'; ?>

<!-- Hero Section -->
<div class="text-center mb-20 space-y-6 animate-fade-in-up pt-10">
    <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-brand-500/10 border border-brand-500/20 text-brand-500 text-sm font-semibold mb-6">
        <span class="relative flex h-2 w-2">
            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-brand-500 opacity-75"></span>
            <span class="relative inline-flex rounded-full h-2 w-2 bg-brand-500"></span>
        </span>
        AI-Powered Financial Planning
    </div>
    
    <h1 class="text-5xl md:text-7xl font-heading font-bold leading-tight tracking-tight">
        Master Your Finances <br>
        <span class="text-transparent bg-clip-text bg-gradient-to-r from-brand-500 via-purple-500 to-brand-accent">With Precision</span>
    </h1>
    
    <p class="text-gray-400 text-lg md:text-xl max-w-2xl mx-auto leading-relaxed">
        Stop guessing. Start planning. Interactive EMI calculations backed by intelligent AI insights to help you make smarter loan decisions.
    </p>

    <div class="flex flex-col sm:flex-row gap-4 justify-center mt-8">
        <a href="calculator.php" class="px-8 py-4 bg-brand-600 hover:bg-brand-500 text-white rounded-full font-semibold transition-all shadow-lg shadow-brand-500/25 flex items-center justify-center gap-2 group">
            Start Calculating
            <i class="fa-solid fa-arrow-right group-hover:translate-x-1 transition-transform"></i>
        </a>
        <a href="#features" class="px-8 py-4 bg-white/5 hover:bg-white/10 text-white rounded-full font-semibold border border-white/10 transition-all flex items-center justify-center">
            Learn More
        </a>
    </div>
</div>

<!-- Features Grid -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-20" id="features">
    <div class="bg-dark-card/50 backdrop-blur-md border border-white/5 rounded-3xl p-8 hover:border-brand-500/30 transition-all group">
        <div class="w-14 h-14 rounded-2xl bg-brand-500/10 flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
            <i class="fa-solid fa-calculator text-2xl text-brand-500"></i>
        </div>
        <h3 class="text-xl font-bold mb-3">Instant Calculations</h3>
        <p class="text-gray-400 text-sm leading-relaxed">Get real-time EMI breakdowns with visually rich sliders and instant chart updates.</p>
    </div>

    <div class="bg-dark-card/50 backdrop-blur-md border border-white/5 rounded-3xl p-8 hover:border-brand-500/30 transition-all group">
        <div class="w-14 h-14 rounded-2xl bg-purple-500/10 flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
            <i class="fa-solid fa-brain text-2xl text-purple-500"></i>
        </div>
        <h3 class="text-xl font-bold mb-3">AI Intelligence</h3>
        <p class="text-gray-400 text-sm leading-relaxed">Our AI analyzes your inputs to suggest tenure adjustments and prepayment strategies.</p>
    </div>

    <div class="bg-dark-card/50 backdrop-blur-md border border-white/5 rounded-3xl p-8 hover:border-brand-500/30 transition-all group">
        <div class="w-14 h-14 rounded-2xl bg-brand-accent/10 flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
            <i class="fa-solid fa-file-export text-2xl text-brand-accent"></i>
        </div>
        <h3 class="text-xl font-bold mb-3">Smart Reports</h3>
        <p class="text-gray-400 text-sm leading-relaxed">Download detailed PDF reports of your loan schedule and save history for later.</p>
    </div>
</div>

<!-- CTA Section -->
<div class="relative rounded-3xl overflow-hidden p-10 md:p-20 text-center border border-white/10">
    <div class="absolute inset-0 bg-gradient-to-r from-brand-600/20 to-brand-accent/20 backdrop-blur-xl -z-10"></div>
    <h2 class="text-3xl md:text-5xl font-heading font-bold mb-6">Ready to plan your future?</h2>
    <p class="text-gray-300 mb-8 max-w-xl mx-auto">Join thousands of users making smarter financial decisions today.</p>
    <a href="calculator.php" class="inline-flex px-8 py-4 bg-white text-dark-bg hover:bg-gray-100 rounded-full font-bold transition-all shadow-xl items-center gap-2">
        Launch Calculator <i class="fa-solid fa-rocket"></i>
    </a>
</div>

<?php include 'includes/footer.php'; ?>
