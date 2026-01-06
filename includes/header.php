<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart EMI | AI-Powered Financial Intelligence</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Outfit:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        brand: {
                            500: '#6366f1', // Indigo
                            600: '#4f46e5',
                            accent: '#10b981', // Emerald
                            dark: '#0f172a',
                        },
                        dark: {
                            bg: '#0f172a', // Slate 900
                            card: '#1e293b', // Slate 800
                            hover: '#334155',
                        }
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        heading: ['Outfit', 'sans-serif'],
                    },
                    animation: {
                        'float': 'float 6s ease-in-out infinite',
                        'pulse-slow': 'pulse 4s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                        'fade-in-up': 'fadeInUp 0.8s ease-out forwards',
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': { transform: 'translateY(0)' },
                            '50%': { transform: 'translateY(-20px)' },
                        },
                        fadeInUp: {
                            'from': { opacity: 0, transform: 'translate3d(0, 40px, 0)' },
                            'to': { opacity: 1, transform: 'translate3d(0, 0, 0)' }
                        }
                    }
                }
            }
        }
    </script>

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Export Libraries -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.29/jspdf.plugin.autotable.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css">
    
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-dark-bg text-white font-sans overflow-x-hidden relative min-h-screen flex flex-col">

    <!-- Background Gradients -->
    <div class="fixed inset-0 z-0 pointer-events-none">
        <div class="absolute top-[-10%] left-[-10%] w-[500px] h-[500px] bg-brand-500 rounded-full mix-blend-multiply filter blur-[128px] opacity-20 animate-pulse-slow"></div>
        <div class="absolute bottom-[-10%] right-[-10%] w-[600px] h-[600px] bg-brand-accent rounded-full mix-blend-multiply filter blur-[128px] opacity-20 animate-pulse-slow" style="animation-delay: 2s"></div>
    </div>

    <!-- Navbar -->
    <nav class="fixed w-full z-50 transition-all duration-300 backdrop-blur-md bg-dark-bg/70 border-b border-white/5" id="navbar">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                <a href="index.php" class="flex items-center gap-3 group">
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-tr from-brand-500 to-brand-accent flex items-center justify-center shadow-lg shadow-brand-500/20 group-hover:scale-110 transition-transform">
                        <i class="fa-solid fa-chart-pie text-white text-lg"></i>
                    </div>
                    <span class="font-heading font-bold text-2xl tracking-tight">Smart<span class="text-brand-500">EMI</span></span>
                </a>
                
                <!-- Desktop Menu -->
                <div class="hidden md:block">
                    <div class="flex items-center space-x-8">
                        <a href="index.php" class="font-medium text-gray-300 hover:text-white transition-colors relative group">
                            Home
                            <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-brand-500 transition-all group-hover:w-full"></span>
                        </a>
                        <a href="calculator.php" class="font-medium text-gray-300 hover:text-white transition-colors relative group">
                            Calculator
                            <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-brand-500 transition-all group-hover:w-full"></span>
                        </a>
                        <a href="history.php" class="font-medium text-gray-300 hover:text-white transition-colors relative group">
                            History (CRUD)
                            <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-brand-500 transition-all group-hover:w-full"></span>
                        </a>
                        <a href="features.php" class="font-medium text-gray-300 hover:text-white transition-colors">Features</a>
                        <a href="calculator.php#ai-insights" class="font-medium text-white px-5 py-2.5 rounded-full bg-gradient-to-r from-brand-600 to-brand-500 hover:shadow-lg hover:shadow-brand-500/25 transition-all transform hover:-translate-y-0.5">
                            AI Chat ✨
                        </a>
                    </div>
                </div>

                <!-- Mobile Menu Button -->
                <button class="md:hidden text-gray-300 hover:text-white focus:outline-none">
                    <i class="fa-solid fa-bars text-2xl"></i>
                </button>
            </div>
        </div>
    </nav>

    <!-- Main Content Wrapper -->
    <main class="relative z-10 pt-32 pb-20 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto flex-grow w-full">
