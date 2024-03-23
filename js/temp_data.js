 
    fetch('temp_data.php')
    .then(response => response.json())
    .then(data => {
        const months = Object.keys(data);
        const temperatureData = months.map(month => data[month]);

        // Line Chart
        new Chart(document.getElementById('TemplineChart'), {
            type: 'line',
            data: {
                labels: months,
                datasets: [{
                    label: 'Temperature (°C)',
                    data: temperatureData,
                    borderColor: '#5214c47b',
                    fill: false
                }]
            },
            options: {
                title: {
                    display: true,
                    text: 'Temperature (°C)'
                }
            }
        });

        // Pie Chart


        // Bar Chart
    
    });
