<?php include 'includes/header.php'; ?>

<!-- Calculator Grid -->
<div class="grid grid-cols-1 lg:grid-cols-12 gap-8" id="calculator">
    
    <!-- Left: Inputs -->
    <div class="lg:col-span-7 space-y-6">
        
        <!-- Main Logic Card -->
        <div class="bg-white/80 dark:bg-dark-card/50 backdrop-blur-xl border border-gray-200 dark:border-white/5 rounded-3xl p-6 md:p-8 shadow-xl dark:shadow-2xl relative overflow-hidden group hover:border-brand-500/30 transition-all duration-500">
            <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-brand-500 to-brand-accent opacity-0 group-hover:opacity-100 transition-opacity"></div>
            
            <div class="flex justify-between items-center mb-6">
                 <h3 class="text-2xl font-heading font-semibold text-gray-800 dark:text-white flex items-center gap-2">
                    <i class="fa-solid fa-sliders text-brand-500"></i> Loan Parameters
                </h3>
                <div class="flex gap-2">
                    <button class="text-xs font-semibold px-3 py-1 rounded bg-brand-50 text-brand-600 dark:bg-brand-500/20 dark:text-brand-300 border border-brand-200 dark:border-brand-500/30">Home Loan</button>
                    <button class="text-xs font-semibold px-3 py-1 rounded bg-gray-100 text-gray-500 dark:bg-white/5 dark:text-gray-400 border border-transparent hover:bg-gray-200 dark:hover:bg-white/10 transition-colors">Personal</button>
                    <button class="text-xs font-semibold px-3 py-1 rounded bg-gray-100 text-gray-500 dark:bg-white/5 dark:text-gray-400 border border-transparent hover:bg-gray-200 dark:hover:bg-white/10 transition-colors">Car</button>
                </div>
            </div>

            <!-- Loan Amount -->
            <div class="mb-8 relative">
                <label class="block text-gray-500 dark:text-gray-400 text-sm font-medium mb-3 flex justify-between">
                    <span>Loan Amount</span>
                    <span class="text-brand-600 dark:text-white font-bold bg-brand-50 dark:bg-white/5 px-2 py-1 rounded text-xs">₹ <span id="amount-val">10,00,000</span></span>
                </label>
                <div class="relative h-2 bg-gray-200 dark:bg-dark-bg rounded-full">
                    <input type="range" min="10000" max="10000000" step="5000" value="1000000" id="amount" class="w-full h-full appearance-none bg-transparent absolute z-20 cursor-pointer opacity-0 text-brand-500">
                    <div class="absolute top-0 left-0 h-full bg-gradient-to-r from-brand-500 to-brand-accent rounded-full pointer-events-none" id="amount-progress" style="width: 10%;"></div>
                    <div class="thumb-indicator absolute top-1/2 -ml-3 -mt-3 w-6 h-6 bg-white border-4 border-brand-500 rounded-full shadow-lg z-10 pointer-events-none transition-all" id="amount-thumb" style="left: 10%;"></div>
                </div>
                <div class="flex justify-between mt-3">
                    <div class="relative">
                        <span class="absolute left-3 top-2 text-gray-400 text-xs">₹</span>
                        <input type="number" id="amount-input" value="1000000" class="pl-6 bg-gray-50 dark:bg-dark-bg border border-gray-200 dark:border-white/10 rounded-lg px-4 py-2 text-gray-800 dark:text-white w-36 focus:outline-none focus:border-brand-500 transition-colors text-sm font-semibold">
                    </div>
                </div>
            </div>

            <!-- Interest Rate -->
            <div class="mb-8 relative">
                <label class="block text-gray-500 dark:text-gray-400 text-sm font-medium mb-3 flex justify-between">
                    <span>Interest Rate (%)</span>
                    <span class="text-brand-600 dark:text-white font-bold bg-brand-50 dark:bg-white/5 px-2 py-1 rounded text-xs"><span id="rate-val">8.5</span>%</span>
                </label>
                <div class="relative h-2 bg-gray-200 dark:bg-dark-bg rounded-full">
                    <input type="range" min="1" max="25" step="0.1" value="8.5" id="rate" class="w-full h-full appearance-none bg-transparent absolute z-20 cursor-pointer opacity-0">
                    <div class="absolute top-0 left-0 h-full bg-gradient-to-r from-brand-500 to-brand-accent rounded-full pointer-events-none" id="rate-progress" style="width: 30%;"></div>
                    <div class="thumb-indicator absolute top-1/2 -ml-3 -mt-3 w-6 h-6 bg-white border-4 border-brand-500 rounded-full shadow-lg z-10 pointer-events-none transition-all" id="rate-thumb" style="left: 30%;"></div>
                </div>
                 <div class="flex justify-between mt-3">
                    <input type="number" id="rate-input" value="8.5" step="0.1" class="bg-gray-50 dark:bg-dark-bg border border-gray-200 dark:border-white/10 rounded-lg px-4 py-2 text-gray-800 dark:text-white w-24 focus:outline-none focus:border-brand-500 transition-colors text-sm font-semibold">
                </div>
            </div>

            <!-- Tenure -->
            <div class="mb-8 relative">
                <label class="block text-gray-500 dark:text-gray-400 text-sm font-medium mb-3 flex justify-between">
                    <span>Loan Tenure</span>
                    <div class="flex items-center gap-2">
                        <button class="text-[10px] font-bold px-2 py-0.5 rounded bg-brand-500 text-white transition-all shadow-sm" id="tenure-mode-yr">Yr</button>
                        <button class="text-[10px] font-medium px-2 py-0.5 rounded bg-gray-200 dark:bg-white/10 text-gray-500 dark:text-gray-400 hover:bg-gray-300 dark:hover:bg-white/20 transition-all" id="tenure-mode-mo">Mo</button>
                    </div>
                </label>
                <div class="relative h-2 bg-gray-200 dark:bg-dark-bg rounded-full">
                    <input type="range" min="1" max="30" step="1" value="5" id="tenure" class="w-full h-full appearance-none bg-transparent absolute z-20 cursor-pointer opacity-0">
                    <div class="absolute top-0 left-0 h-full bg-gradient-to-r from-brand-500 to-brand-accent rounded-full pointer-events-none" id="tenure-progress" style="width: 16%;"></div>
                    <div class="thumb-indicator absolute top-1/2 -ml-3 -mt-3 w-6 h-6 bg-white border-4 border-brand-500 rounded-full shadow-lg z-10 pointer-events-none transition-all" id="tenure-thumb" style="left: 16%;"></div>
                </div>
                 <div class="flex justify-between mt-3">
                    <input type="number" id="tenure-input" value="5" class="bg-gray-50 dark:bg-dark-bg border border-gray-200 dark:border-white/10 rounded-lg px-4 py-2 text-gray-800 dark:text-white w-24 focus:outline-none focus:border-brand-500 transition-colors text-sm font-semibold">
                    <span class="text-xs text-gray-400 self-center" id="tenure-max-label">Max: 30 Yrs</span>
                </div>
            </div>

            <!-- Affordability Section (New) -->
            <div class="pt-6 border-t border-gray-200 dark:border-white/5">
                <div class="flex justify-between items-center mb-4 cursor-pointer" onclick="document.getElementById('affordability-panel').classList.toggle('hidden')">
                     <h4 class="text-sm font-bold text-gray-600 dark:text-gray-300 flex items-center gap-2">
                        <i class="fa-solid fa-wallet text-brand-accent"></i> Affordability Check
                        <i class="fa-solid fa-chevron-down text-xs ml-1"></i>
                     </h4>
                     <span class="text-xs px-2 py-0.5 rounded bg-green-500/10 text-green-500" id="affordability-badge">Healthy</span>
                </div>
                <div id="affordability-panel" class="hidden transition-all">
                    <label class="block text-gray-400 text-xs mb-2">Monthly In-hand Salary</label>
                    <div class="flex gap-4 items-center mb-2">
                        <input type="number" id="salary-input" placeholder="e.g. 50000" class="bg-gray-50 dark:bg-dark-bg border border-gray-200 dark:border-white/10 rounded-lg px-4 py-2 text-gray-800 dark:text-white w-full text-sm focus:outline-none focus:border-brand-500">
                    </div>
                    <!-- Gauge Bar -->
                    <div class="w-full h-2 bg-gray-200 dark:bg-dark-bg rounded-full overflow-hidden relative">
                        <div id="affordability-bar" class="h-full bg-green-500 transition-all duration-500" style="width: 0%"></div>
                        <div class="absolute top-0 left-[40%] h-full w-0.5 bg-red-500/50 z-10" title="Recommended Limit (40%)"></div>
                    </div>
                     <p class="text-[10px] text-gray-500 mt-1" id="affordability-text">Enter salary to check financial health.</p>
                </div>
            </div>

        </div>

        <!-- AI Simulations / Tips -->
        <div id="ai-tip-card" class="bg-gradient-to-br from-brand-600 to-indigo-800 rounded-3xl p-6 text-white relative overflow-hidden shadow-lg transition-all duration-500 transform hover:-translate-y-1">
            <div class="absolute -right-10 -bottom-10 opacity-20 text-9xl">
                <i class="fa-solid fa-robot"></i>
            </div>
            <div class="relative z-10 flex gap-4">
                <div class="w-12 h-12 rounded-full bg-white/20 flex items-center justify-center shrink-0">
                    <i class="fa-solid fa-lightbulb text-yellow-300"></i>
                </div>
                <div>
                    <h4 class="font-heading font-semibold text-lg mb-1">AI Pro Tip</h4>
                    <p class="text-indigo-100 text-sm leading-relaxed" id="ai-dynamic-msg">
                        Adjusting your tenure from 20 to 15 years can often save you roughly 25% in total interest payments. Try moving the slider to see!
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Right: Results & Chart -->
    <div class="lg:col-span-5 space-y-6">
        <div class="bg-white/80 dark:bg-dark-card/50 backdrop-blur-xl border border-gray-200 dark:border-white/5 rounded-3xl p-6 md:p-8 shadow-xl dark:shadow-2xl h-full flex flex-col">
            <h3 class="text-2xl font-heading font-semibold text-gray-800 dark:text-white mb-6 flex items-center gap-2">
                <i class="fa-solid fa-chart-pie text-brand-accent"></i> Breakdown
            </h3>
            
            <!-- Tabs for Chart View -->
            <div class="flex rounded-lg bg-gray-100 dark:bg-white/5 p-1 mb-6">
                <button class="flex-1 py-1.5 text-xs font-semibold rounded text-white bg-brand-600 shadow-sm transition-all" id="view-pie">Pie Chart</button>
                <button class="flex-1 py-1.5 text-xs font-semibold rounded text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white transition-all" id="view-timeline">Amortization</button>
            </div>

            <!-- Chart Container -->
            <div class="relative w-full h-64 mx-auto mb-8" id="chart-container-pie">
                <canvas id="emiChart"></canvas>
                <!-- Center Text -->
                <div class="absolute inset-0 flex flex-col items-center justify-center pointer-events-none">
                    <span class="text-xs text-gray-500 dark:text-gray-400">Monthly EMI</span>
                    <span class="text-xl font-bold font-heading text-brand-600 dark:text-white" id="center-emi">₹0</span>
                </div>
            </div>

             <!-- Amortization Container (Hidden by default) -->
            <div class="relative w-full h-64 mx-auto mb-8 hidden overflow-y-auto custom-scrollbar" id="chart-container-timeline">
                <table class="w-full text-left border-collapse text-xs">
                    <thead class="sticky top-0 bg-white dark:bg-dark-card z-10">
                        <tr class="text-gray-400 border-b border-gray-200 dark:border-white/10">
                            <th class="py-2 font-medium">Year</th>
                            <th class="py-2 font-medium">Principal</th>
                            <th class="py-2 font-medium">Interest</th>
                            <th class="py-2 font-medium text-right">Balance</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-white/5 text-gray-600 dark:text-gray-300" id="amortization-body">
                        <!-- JS Injected -->
                    </tbody>
                </table>
            </div>

            <!-- Stats Grid -->
            <div class="grid grid-cols-2 gap-4 mt-auto">
                <div class="bg-gray-50 dark:bg-dark-bg/50 p-4 rounded-2xl border border-gray-200 dark:border-white/5">
                    <p class="text-xs text-gray-500 dark:text-gray-400 mb-1">Monthly EMI</p>
                    <p class="text-2xl font-bold font-heading text-brand-600 dark:text-brand-500">₹<span id="stat-emi">0</span></p>
                </div>
                <div class="bg-gray-50 dark:bg-dark-bg/50 p-4 rounded-2xl border border-gray-200 dark:border-white/5">
                    <p class="text-xs text-gray-500 dark:text-gray-400 mb-1">Principal Amount</p>
                    <p class="text-lg font-semibold text-gray-800 dark:text-white">₹<span id="stat-principal">0</span></p>
                </div>
                <div class="bg-gray-50 dark:bg-dark-bg/50 p-4 rounded-2xl border border-gray-200 dark:border-white/5 col-span-2">
                    <div class="flex justify-between items-end">
                        <div>
                            <p class="text-xs text-gray-500 dark:text-gray-400 mb-1">Total Interest</p>
                            <p class="text-xl font-bold text-brand-accent">₹<span id="stat-interest">0</span></p>
                        </div>
                        <div class="text-right">
                            <p class="text-xs text-gray-500 dark:text-gray-400 mb-1">Total Payable</p>
                            <p class="text-xl font-bold text-gray-800 dark:text-white">₹<span id="stat-total">0</span></p>
                        </div>
                    </div>
                    <!-- Mini Bar -->
                    <div class="w-full h-1.5 bg-gray-200 dark:bg-dark-bg mt-3 rounded-full overflow-hidden flex">
                        <div id="bar-principal" class="bg-brand-500 h-full" style="width: 70%"></div>
                        <div id="bar-interest" class="bg-brand-accent h-full" style="width: 30%"></div>
                    </div>
                    <div class="flex justify-between text-[10px] text-gray-500 mt-1">
                        <span>Principal</span>
                        <span>Interest</span>
                    </div>
                </div>
            </div>

            <div class="mt-6 pt-6 border-t border-gray-200 dark:border-white/5 flex gap-2">
                    <button id="get-report-btn" class="flex-1 py-3 rounded-xl bg-gray-900 dark:bg-white text-white dark:text-dark-bg font-bold hover:bg-gray-800 dark:hover:bg-gray-200 transition-colors flex items-center justify-center gap-2 text-sm shadow-lg">
                    <i class="fa-solid fa-floppy-disk"></i> Save & Export
                </button>
            </div>
        </div>
    </div>
</div>

<!-- AI Insights & Chat Section -->
<div class="mt-16" id="ai-insights">
    <div class="border border-gray-200 dark:border-white/10 rounded-3xl overflow-hidden bg-white/80 dark:bg-dark-card/30 backdrop-blur-sm shadow-xl">
        <div class="p-8 border-b border-gray-200 dark:border-white/10 flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
            <div>
                <h2 class="text-3xl font-heading font-bold text-gray-900 dark:text-white mb-2">AI Financial Assistant</h2>
                <p class="text-gray-500 dark:text-gray-400">Ask questions about your EMI, prepayments, or financial planning.</p>
            </div>
            <div class="flex gap-2">
                    <span class="px-3 py-1 rounded-full bg-green-500/10 text-green-600 dark:text-green-400 text-xs font-semibold border border-green-500/20 flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-green-500 animate-pulse"></span> Online
                    </span>
            </div>
        </div>
        
        <div class="bg-gray-50 dark:bg-dark-bg/50 h-[400px] overflow-y-auto p-6 space-y-4" id="chat-messages">
            <!-- Welcome Message -->
            <div class="flex items-start gap-4">
                <div class="w-10 h-10 rounded-full bg-gradient-to-tr from-brand-500 to-brand-accent flex items-center justify-center shrink-0">
                    <i class="fa-solid fa-robot text-white text-sm"></i>
                </div>
                <div class="bg-white dark:bg-white/5 border border-gray-200 dark:border-white/5 rounded-2xl rounded-tl-none p-4 max-w-[80%] shadow-sm">
                    <p class="text-gray-700 dark:text-gray-200 text-sm">Hello! I'm your AI Financial planner. I've analyzed your current inputs. Based on a <span id="chat-rate" class="text-brand-accent font-bold">8.5%</span> interest rate, would you like to know how much you can save by prepaying?</p>
                </div>
            </div>
        </div>

        <div class="p-4 border-t border-gray-200 dark:border-white/10 bg-white dark:bg-dark-card/50">
            <form id="chat-form" class="flex gap-4">
                <input type="text" id="chat-input" placeholder="Type your question here..." class="flex-1 bg-gray-100 dark:bg-dark-bg border border-gray-200 dark:border-white/10 rounded-xl px-6 py-3 text-gray-900 dark:text-white focus:outline-none focus:border-brand-500 transition-colors placeholder-gray-500">
                <button type="submit" class="bg-brand-600 hover:bg-brand-500 text-white px-8 py-3 rounded-xl font-medium transition-colors shadow-lg shadow-brand-500/20">
                    <i class="fa-solid fa-paper-plane"></i>
                </button>
            </form>
        </div>
    </div>
</div>

<!-- Modal for Notifications (Hidden) -->
<!-- Uses JS Toast -->

<?php include 'includes/footer.php'; ?>
