fetch('data.php')
    .then(response => response.json())
    .then(data => {
        const dates = Object.keys(data);
        const bpData = dates.map(date => data[date]);

        // Line Chart
        new Chart(document.getElementById('lineChart'), {
            type: 'line',
            data: {
                labels: dates,
                datasets: [{
                    label: 'Systolic',
                    data: bpData.map(bp => bp.systolic),
                    borderColor: 'rgba(75, 192, 192, 1)',
                    fill: false
                },
                {
                    label: 'Diastolic',
                    data: bpData.map(bp => bp.diastolic),
                    borderColor: 'rgba(255, 99, 132, 1)',
                    fill: false
                }]
            },
            options: {
                title: {
                    display: true,
                    text: 'Blood Pressure (Systolic & Diastolic)'
                }
            }
        });

        // Pie Chart
        const averageSystolic = bpData.reduce((acc, bp) => acc + bp.systolic, 0) / bpData.length;
        const averageDiastolic = bpData.reduce((acc, bp) => acc + bp.diastolic, 0) / bpData.length;

        new Chart(document.getElementById('pieChart'), {
            type: 'pie',
            data: {
                labels: ['Average Systolic (mmHg)', 'Average Diastolic (mmHg)'],
                datasets: [{
                    data: [averageSystolic, averageDiastolic],
                    backgroundColor: ['rgba(75, 192, 192, 0.5)', 'rgba(255, 99, 132, 0.5)']
                }]
            },
            options: {
                title: {
                    display: true,
                    text: 'Average Blood Pressure'
                }
            }
        });

        // Bar Chart
        new Chart(document.getElementById('barChart'), {
            type: 'bar',
            data: {
                labels: dates,
                datasets: [{
                    label: 'Systolic',
                    data: bpData.map(bp => bp.systolic),
                    backgroundColor: 'rgba(75, 192, 192, 0.5)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                },
                {
                    label: 'Diastolic',
                    data: bpData.map(bp => bp.diastolic),
                    backgroundColor: 'rgba(255, 99, 132, 0.5)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                title: {
                    display: true,
                    text: 'Blood Pressure (Systolic & Diastolic)'
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    })
    .catch(error => {
        console.error('Error fetching the data:', error);
    });


