<?php
        foreach($data as $data){
            $merk[] = $data->nama_obat;
            $stok[] = (float) $data->jumlah;
        }
    ?>

    <script type="text/javascript" src="<?php echo base_url();?>assets/chartjs/Chart.js"></script>

    <script>
        var ctx = document.getElementById("myChart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($merk);?>,
                datasets: [{
                    label: 'Terjual',
                    data: <?php echo json_encode($stok);?>,
                    backgroundColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(70, 130, 180, 1)',
                    'rgba(40, 178, 170, 1)',
                    'rgba(210, 105, 30, 1)',
                    'rgba(210, 105, 30, 1)',
                    'rgba(255, 159, 64, 1)'
                    ],
                    borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(70, 130, 180, 1)',
                    'rgba(40, 178, 170, 1)',
                    'rgba(210, 105, 30, 1)',
                    'rgba(210, 105, 30, 1)',
                    'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                }
            }
        });
    </script>
