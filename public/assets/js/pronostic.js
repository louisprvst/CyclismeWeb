document.addEventListener('DOMContentLoaded', () => {
    if (typeof top3Data !== 'undefined') {
        // Données pour le graphique Top 3
        const top3Labels = top3Data.map(row => row.nom);
        const top3Positions = top3Data.map(row => row.position);

        const top3Chart = new Chart(document.getElementById('top3Chart'), {
            type: 'bar',
            data: {
                labels: top3Labels,
                datasets: [{
                    label: 'Classement',
                    data: top3Positions,
                    backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56'],
                    hoverBackgroundColor: ['#FF6384', '#36A2EB', '#FFCE56']
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { display: false },
                    tooltip: {
                        callbacks: {
                            label: context => `Position ${context.raw}`
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        reverse: true // Classement inversé
                    }
                }
            }
        });
    }

    if (typeof specialityData !== 'undefined') {
        // Données pour le graphique par spécialité
        const specialityLabels = [...new Set(specialityData.map(row => row.specialite))];
        const datasets = specialityLabels.map(speciality => {
            const filtered = specialityData.filter(row => row.specialite === speciality);
            return {
                label: speciality,
                data: filtered.map(row => row.nom),
                backgroundColor: '#' + Math.floor(Math.random() * 16777215).toString(16)
            };
        });

        const specialityChart = new Chart(document.getElementById('specialityChart'), {
            type: 'pie',
            data: {
                labels: specialityLabels,
                datasets: datasets
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { position: 'top' }
                }
            }
        });
    }
});