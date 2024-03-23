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
                    borderColor: '#a584e2',
                    fill: false
                },
                {
                    label: 'Diastolic',
                    data: bpData.map(bp => bp.diastolic),
                    borderColor: '#ffa0b4',
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
                    backgroundColor: '#a584e2',
                    borderColor: '#a584e2',
                    borderWidth: 1
                },
                {
                    label: 'Diastolic',
                    data: bpData.map(bp => bp.diastolic),
                    backgroundColor: '#ffa0b4',
                    borderColor: '#ffa0b4',
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


