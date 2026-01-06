let emiChart = null;

const initChart = (principal, totalInterest) => {
    const ctx = document.getElementById('emiChart').getContext('2d');

    // Chart.js requires specific config
    Chart.defaults.color = '#94a3b8';
    Chart.defaults.font.family = 'Inter';

    const data = {
        labels: ['Principal Amount', 'Total Interest'],
        datasets: [{
            data: [principal, totalInterest],
            backgroundColor: [
                '#4f46e5', // Brand 600 (Indigo)
                '#10b981'  // Green/Emerald
            ],
            borderWidth: 0,
            hoverOffset: 4
        }]
    };

    const config = {
        type: 'doughnut',
        data: data,
        options: {
            responsive: true,
            maintainAspectRatio: false,
            cutout: '75%', // Thinner ring
            plugins: {
                legend: {
                    display: false // Custom legend built in HTML
                },
                tooltip: {
                    backgroundColor: 'rgba(15, 23, 42, 0.9)',
                    titleColor: '#fff',
                    bodyColor: '#fff',
                    padding: 12,
                    cornerRadius: 8,
                    displayColors: true,
                    callbacks: {
                        label: function(context) {
                            let label = context.label || '';
                            if (label) {
                                label += ': ';
                            }
                            if (context.parsed !== null) {
                                label += new Intl.NumberFormat('en-IN', { style: 'currency', currency: 'INR' }).format(context.parsed);
                            }
                            return label;
                        }
                    }
                }
            },
            animation: {
                animateScale: true,
                animateRotate: true
            }
        }
    };

    emiChart = new Chart(ctx, config);
};

const updateChartData = (principal, totalInterest) => {
    if (emiChart) {
        emiChart.data.datasets[0].data = [principal, totalInterest];
        emiChart.update();
    } else {
        initChart(principal, totalInterest);
    }
};
