<?php include 'includes/header.php'; ?>

<div class="max-w-6xl mx-auto">
    <div class="flex flex-col md:flex-row justify-between items-end mb-8 gap-4">
        <div>
            <h1 class="text-3xl font-heading font-bold mb-2">Calculation History</h1>
            <p class="text-gray-400">View, manage, and export your past financial calculations.</p>
        </div>
        <div class="flex gap-2">
            <button onclick="exportToCSV()" class="px-4 py-2 bg-dark-card border border-white/10 hover:bg-dark-hover rounded-lg text-sm font-medium transition-colors flex items-center gap-2">
                <i class="fa-solid fa-file-csv text-green-500"></i> Export CSV
            </button>
             <button onclick="exportToPDF()" class="px-4 py-2 bg-dark-card border border-white/10 hover:bg-dark-hover rounded-lg text-sm font-medium transition-colors flex items-center gap-2">
                <i class="fa-solid fa-file-pdf text-red-500"></i> Export PDF
            </button>
        </div>
    </div>

    <!-- Table Container -->
    <div class="bg-dark-card/50 backdrop-blur-xl border border-white/5 rounded-2xl overflow-hidden shadow-2xl">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse" id="history-table">
                <thead>
                    <tr class="bg-white/5 border-b border-white/5 text-gray-400 text-sm uppercase tracking-wider">
                        <th class="p-4 font-medium">Date</th>
                        <th class="p-4 font-medium">Loan Amount</th>
                        <th class="p-4 font-medium">Interest Rate</th>
                        <th class="p-4 font-medium">Tenure</th>
                        <th class="p-4 font-medium text-brand-500">EMI</th>
                        <th class="p-4 font-medium text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-sm divide-y divide-white/5" id="history-body">
                    <!-- Rows will be injected by JS -->
                    <tr>
                        <td colspan="6" class="p-8 text-center text-gray-500">Loading history...</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    // Inline script for page-specific logic
    document.addEventListener('DOMContentLoaded', loadHistory);

    let historyData = [];

    async function loadHistory() {
        try {
            const res = await fetch('api/get_history.php');
            const data = await res.json();
            historyData = data;
            
            const tbody = document.getElementById('history-body');
            tbody.innerHTML = '';

            if (data.length === 0) {
                tbody.innerHTML = `<tr><td colspan="6" class="p-8 text-center text-gray-500">No history found. Go to Calculator to add some!</td></tr>`;
                return;
            }

            data.forEach(item => {
                const tr = document.createElement('tr');
                tr.className = 'hover:bg-white/5 transition-colors group';
                tr.innerHTML = `
                    <td class="p-4 text-gray-300">${new Date(item.timestamp).toLocaleDateString()}</td>
                    <td class="p-4 font-medium">₹${new Intl.NumberFormat('en-IN').format(item.amount)}</td>
                    <td class="p-4">${item.rate}%</td>
                    <td class="p-4">${item.tenure} Years</td>
                    <td class="p-4 font-bold text-brand-500">₹${new Intl.NumberFormat('en-IN').format(item.emi)}</td>
                    <td class="p-4 text-right">
                        <button onclick="deleteRecord(${item.id})" class="text-gray-500 hover:text-red-500 transition-colors p-2 rounded-lg hover:bg-red-500/10">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </td>
                `;
                tbody.appendChild(tr);
            });
        } catch (e) {
            console.error(e);
        }
    }

    async function deleteRecord(id) {
        if(!confirm('Are you sure you want to delete this record?')) return;
        
        try {
            const res = await fetch('api/delete_history.php', {
                method: 'POST',
                body: JSON.stringify({id: id}),
                headers: {'Content-Type': 'application/json'}
            });
            if(res.ok) {
                loadHistory(); 
            }
        } catch(e) {
            alert('Failed to delete');
        }
    }

    // Export Logic
    function exportToCSV() {
        if(!historyData.length) return alert('No data to export');
        
        const worksheet = XLSX.utils.json_to_sheet(historyData);
        const workbook = XLSX.utils.book_new();
        XLSX.utils.book_append_sheet(workbook, worksheet, "History");
        XLSX.writeFile(workbook, "EMI_History.csv");
    }

    function exportToPDF() {
        if(!historyData.length) return alert('No data to export');
        
        const { javascript } = window.jspdf; 
        // Note: jspdf.umd.min.js exports to window.jspdf.jsPDF usually, but specific call depends on version.
        // Using the global jsPDF object.
        const doc = new jspdf.jsPDF();
        
        doc.setFontSize(18);
        doc.text("Smart EMI - Calculation History", 14, 22);
        
        const tableColumn = ["Date", "Amount", "Rate (%)", "Tenure (Yrs)", "EMI"];
        const tableRows = [];

        historyData.forEach(item => {
            const row = [
                new Date(item.timestamp).toLocaleDateString(),
                item.amount,
                item.rate,
                item.tenure,
                item.emi
            ];
            tableRows.push(row);
        });

        doc.autoTable({
            head: [tableColumn],
            body: tableRows,
            startY: 30,
            theme: 'grid',
            styles: { fontSize: 10, cellPadding: 3 },
            headStyles: { fillColor: [79, 70, 229] } // Brand color
        });

        doc.save("EMI_History.pdf");
    }
</script>

<?php include 'includes/footer.php'; ?>
