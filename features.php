<?php include 'includes/header.php'; ?>

<div class="max-w-4xl mx-auto">
    <div class="text-center mb-12">
        <h1 class="text-4xl font-heading font-bold mb-4">Features that empower you</h1>
        <p class="text-gray-400">Everything you need to make the best financial decisions.</p>
    </div>

    <div class="space-y-20">
        <!-- Feature 1 -->
        <div class="flex flex-col md:flex-row items-center gap-12 group">
            <div class="flex-1 order-2 md:order-1">
                <div class="w-16 h-16 rounded-2xl bg-brand-500/10 flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                     <i class="fa-solid fa-wand-magic-sparkles text-3xl text-brand-500"></i>
                </div>
                <h3 class="text-2xl font-bold mb-4">AI-Driven Insights</h3>
                <p class="text-gray-400 leading-relaxed mb-6">
                    Our advanced algorithms analyze your loan parameters in real-time to suggest the most optimal tenure and EMI combinations. 
                    It's like having a financial advisor in your pocket 24/7.
                </p>
                <ul class="space-y-3 text-gray-300">
                    <li class="flex items-center gap-2"><i class="fa-solid fa-check text-brand-accent"></i> Real-time tenure optimization</li>
                    <li class="flex items-center gap-2"><i class="fa-solid fa-check text-brand-accent"></i> Prepayment impact analysis</li>
                    <li class="flex items-center gap-2"><i class="fa-solid fa-check text-brand-accent"></i> Interest saving recommendations</li>
                </ul>
            </div>
            <div class="flex-1 order-1 md:order-2">
                <div class="aspect-video bg-gradient-to-br from-brand-500 to-indigo-600 rounded-3xl opacity-20 animate-pulse-slow"></div>
                <!-- Placeholder for a nice graphic if we had images -->
            </div>
        </div>

        <!-- Feature 2 -->
        <div class="flex flex-col md:flex-row items-center gap-12 group">
            <div class="flex-1">
                 <div class="aspect-video bg-gradient-to-br from-emerald-500 to-teal-600 rounded-3xl opacity-20 animate-pulse-slow" style="animation-delay: 1s;"></div>
            </div>
            <div class="flex-1">
                <div class="w-16 h-16 rounded-2xl bg-emerald-500/10 flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                     <i class="fa-solid fa-chart-pie text-3xl text-emerald-500"></i>
                </div>
                <h3 class="text-2xl font-bold mb-4">Visual Data Representation</h3>
                <p class="text-gray-400 leading-relaxed mb-6">
                    Numbers can be confusing. We visualize your loan breakdown using interactive doughnut charts and progress bars so you know exactly where your money is going.
                </p>
                <ul class="space-y-3 text-gray-300">
                    <li class="flex items-center gap-2"><i class="fa-solid fa-check text-brand-accent"></i> Interactive Charts</li>
                    <li class="flex items-center gap-2"><i class="fa-solid fa-check text-brand-accent"></i> Principle vs Interest breakdown</li>
                    <li class="flex items-center gap-2"><i class="fa-solid fa-check text-brand-accent"></i> PDF Report Generation</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
