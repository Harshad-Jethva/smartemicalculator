<?php include 'includes/header.php'; ?>

<!-- Calculator Grid -->
<div class="grid grid-cols-1 lg:grid-cols-12 gap-8" id="calculator">
    
    <!-- Left: Inputs -->
    <div class="lg:col-span-7 space-y-6">
        <div class="bg-dark-card/50 backdrop-blur-xl border border-white/5 rounded-3xl p-6 md:p-8 shadow-2xl relative overflow-hidden group hover:border-brand-500/30 transition-all duration-500">
            <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-brand-500 to-brand-accent opacity-0 group-hover:opacity-100 transition-opacity"></div>
            
            <h3 class="text-2xl font-heading font-semibold mb-6 flex items-center gap-2">
                <i class="fa-solid fa-sliders text-brand-500"></i> Loan Details
            </h3>

            <!-- Loan Amount -->
            <div class="mb-8 relative">
                <label class="block text-gray-400 text-sm font-medium mb-3 flex justify-between">
                    <span>Loan Amount</span>
                    <span class="text-white font-bold bg-white/5 px-2 py-1 rounded text-xs">₹ <span id="amount-val">10,00,000</span></span>
                </label>
                <div class="relative h-2 bg-dark-bg rounded-full">
                    <input type="range" min="10000" max="10000000" step="5000" value="1000000" id="amount" class="w-full h-full appearance-none bg-transparent absolute z-20 cursor-pointer opacity-0 text-brand-500">
                    <div class="absolute top-0 left-0 h-full bg-gradient-to-r from-brand-500 to-brand-accent rounded-full pointer-events-none" id="amount-progress" style="width: 10%;"></div>
                    <div class="thumb-indicator absolute top-1/2 -ml-3 -mt-3 w-6 h-6 bg-white border-4 border-brand-500 rounded-full shadow-lg z-10 pointer-events-none transition-all" id="amount-thumb" style="left: 10%;"></div>
                </div>
                <div class="flex justify-between mt-3">
                    <input type="number" id="amount-input" value="1000000" class="bg-dark-bg border border-white/10 rounded-lg px-4 py-2 text-white w-32 focus:outline-none focus:border-brand-500 transition-colors">
                    <span class="text-xs text-gray-500 self-center">Max: 1Cr</span>
                </div>
            </div>

            <!-- Interest Rate -->
            <div class="mb-8 relative">
                <label class="block text-gray-400 text-sm font-medium mb-3 flex justify-between">
                    <span>Interest Rate (%)</span>
                    <span class="text-white font-bold bg-white/5 px-2 py-1 rounded text-xs"><span id="rate-val">8.5</span>%</span>
                </label>
                <div class="relative h-2 bg-dark-bg rounded-full">
                    <input type="range" min="1" max="25" step="0.1" value="8.5" id="rate" class="w-full h-full appearance-none bg-transparent absolute z-20 cursor-pointer opacity-0">
                    <div class="absolute top-0 left-0 h-full bg-gradient-to-r from-brand-500 to-brand-accent rounded-full pointer-events-none" id="rate-progress" style="width: 30%;"></div>
                    <div class="thumb-indicator absolute top-1/2 -ml-3 -mt-3 w-6 h-6 bg-white border-4 border-brand-500 rounded-full shadow-lg z-10 pointer-events-none transition-all" id="rate-thumb" style="left: 30%;"></div>
                </div>
                    <div class="flex justify-between mt-3">
                    <input type="number" id="rate-input" value="8.5" step="0.1" class="bg-dark-bg border border-white/10 rounded-lg px-4 py-2 text-white w-24 focus:outline-none focus:border-brand-500 transition-colors">
                    <span class="text-xs text-gray-500 self-center">Max: 25%</span>
                </div>
            </div>

            <!-- Tenure -->
            <div class="mb-2 relative">
                <label class="block text-gray-400 text-sm font-medium mb-3 flex justify-between">
                    <span>Loan Tenure (Years)</span>
                    <span class="text-white font-bold bg-white/5 px-2 py-1 rounded text-xs"><span id="tenure-val">5</span> Years</span>
                </label>
                <div class="relative h-2 bg-dark-bg rounded-full">
                    <input type="range" min="1" max="30" step="1" value="5" id="tenure" class="w-full h-full appearance-none bg-transparent absolute z-20 cursor-pointer opacity-0">
                    <div class="absolute top-0 left-0 h-full bg-gradient-to-r from-brand-500 to-brand-accent rounded-full pointer-events-none" id="tenure-progress" style="width: 16%;"></div>
                    <div class="thumb-indicator absolute top-1/2 -ml-3 -mt-3 w-6 h-6 bg-white border-4 border-brand-500 rounded-full shadow-lg z-10 pointer-events-none transition-all" id="tenure-thumb" style="left: 16%;"></div>
                </div>
                    <div class="flex justify-between mt-3">
                    <input type="number" id="tenure-input" value="5" class="bg-dark-bg border border-white/10 rounded-lg px-4 py-2 text-white w-24 focus:outline-none focus:border-brand-500 transition-colors">
                    <span class="text-xs text-gray-500 self-center">Max: 30 Yrs</span>
                </div>
            </div>

        </div>

        <!-- AI Simulations / Tips (Visual Placeholder before calc) -->
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
        <div class="bg-dark-card/50 backdrop-blur-xl border border-white/5 rounded-3xl p-6 md:p-8 shadow-2xl h-full flex flex-col">
            <h3 class="text-2xl font-heading font-semibold mb-6 flex items-center gap-2">
                <i class="fa-solid fa-chart-simple text-brand-accent"></i> Breakdown
            </h3>
            
            <!-- Chart -->
            <div class="relative w-64 h-64 mx-auto mb-8">
                <canvas id="emiChart"></canvas>
                <!-- Center Text -->
                <div class="absolute inset-0 flex flex-col items-center justify-center pointer-events-none">
                    <span class="text-xs text-gray-400">Monthly EMI</span>
                    <span class="text-xl font-bold font-heading text-white" id="center-emi">₹0</span>
                </div>
            </div>

            <!-- Stats Grid -->
            <div class="grid grid-cols-2 gap-4 mt-auto">
                <div class="bg-dark-bg/50 p-4 rounded-2xl border border-white/5">
                    <p class="text-xs text-gray-400 mb-1">Monthly EMI</p>
                    <p class="text-2xl font-bold font-heading text-brand-500">₹<span id="stat-emi">0</span></p>
                </div>
                <div class="bg-dark-bg/50 p-4 rounded-2xl border border-white/5">
                    <p class="text-xs text-gray-400 mb-1">Principal Amount</p>
                    <p class="text-lg font-semibold text-white">₹<span id="stat-principal">0</span></p>
                </div>
                <div class="bg-dark-bg/50 p-4 rounded-2xl border border-white/5 col-span-2">
                    <div class="flex justify-between items-end">
                        <div>
                            <p class="text-xs text-gray-400 mb-1">Total Interest</p>
                            <p class="text-xl font-bold text-brand-accent">₹<span id="stat-interest">0</span></p>
                        </div>
                        <div class="text-right">
                            <p class="text-xs text-gray-400 mb-1">Total Payable</p>
                            <p class="text-xl font-bold text-white">₹<span id="stat-total">0</span></p>
                        </div>
                    </div>
                    <!-- Mini Bar -->
                    <div class="w-full h-1.5 bg-dark-bg mt-3 rounded-full overflow-hidden flex">
                        <div id="bar-principal" class="bg-brand-500 h-full" style="width: 70%"></div>
                        <div id="bar-interest" class="bg-brand-accent h-full" style="width: 30%"></div>
                    </div>
                    <div class="flex justify-between text-[10px] text-gray-500 mt-1">
                        <span>Principal</span>
                        <span>Interest</span>
                    </div>
                </div>
            </div>

            <div class="mt-6 pt-6 border-t border-white/5 flex gap-2">
                    <button id="get-report-btn" class="flex-1 py-3 rounded-xl bg-white text-dark-bg font-bold hover:bg-gray-100 transition-colors flex items-center justify-center gap-2 text-sm">
                    <i class="fa-solid fa-floppy-disk"></i> Save & Export
                </button>
            </div>
        </div>
    </div>
</div>

<!-- AI Insights & Chat Section -->
<div class="mt-16" id="ai-insights">
    <div class="border border-white/10 rounded-3xl overflow-hidden bg-dark-card/30 backdrop-blur-sm">
        <div class="p-8 border-b border-white/10 flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
            <div>
                <h2 class="text-3xl font-heading font-bold mb-2">AI Financial Assistant</h2>
                <p class="text-gray-400">Ask questions about your EMI, prepayments, or financial planning.</p>
            </div>
            <div class="flex gap-2">
                    <span class="px-3 py-1 rounded-full bg-green-500/20 text-green-400 text-xs font-semibold border border-green-500/20 flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-green-500 animate-pulse"></span> Online
                    </span>
            </div>
        </div>
        
        <div class="bg-dark-bg/50 h-[400px] overflow-y-auto p-6 space-y-4" id="chat-messages">
            <!-- Welcome Message -->
            <div class="flex items-start gap-4">
                <div class="w-10 h-10 rounded-full bg-gradient-to-tr from-brand-500 to-brand-accent flex items-center justify-center shrink-0">
                    <i class="fa-solid fa-robot text-white text-sm"></i>
                </div>
                <div class="bg-white/5 border border-white/5 rounded-2xl rounded-tl-none p-4 max-w-[80%]">
                    <p class="text-gray-200 text-sm">Hello! I'm your AI Financial planner. I've analyzed your current inputs. Based on a <span id="chat-rate" class="text-brand-accent font-bold">8.5%</span> interest rate, would you like to know how much you can save by prepaying?</p>
                </div>
            </div>
        </div>

        <div class="p-4 border-t border-white/10 bg-dark-card/50">
            <form id="chat-form" class="flex gap-4">
                <input type="text" id="chat-input" placeholder="Type your question here... (e.g. 'How can I reduce my interest?')" class="flex-1 bg-dark-bg border border-white/10 rounded-xl px-6 py-3 text-white focus:outline-none focus:border-brand-500 transition-colors placeholder-gray-600">
                <button type="submit" class="bg-brand-600 hover:bg-brand-500 text-white px-8 py-3 rounded-xl font-medium transition-colors">
                    <i class="fa-solid fa-paper-plane"></i>
                </button>
            </form>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
