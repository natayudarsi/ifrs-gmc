<?php
        foreach($data as $data){
            $merk[] = $data->nama_obat;
            $stok[] = (float) $data->jumlah;
        }
    ?>

    <script type="text/javascript" src="<?php echo base_url();?>assets/chartjs/Chart.js"></script>

    <script>
        <?php
        foreach($data as $data){
            $merk[] = $data->nama_obat;
            $stok[] = (float) $data->jumlah;
        }
    ?>

    <script>
        const brandProduct = 'rgba(0,181,233,0.8)'
    const brandService = 'rgba(0,173,95,0.8)'

    var elements = 10
    var data1 = <?php echo json_encode($stok);?>
    
    var ctx = document.getElementById("chart-laku");
    if (ctx) {
      ctx.height = 250;
      var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: <?php echo json_encode($merk);?>,
          datasets: [
            {
              label: 'My First dataset',
              backgroundColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(70, 130, 180, 1)',
                    'rgba(40, 178, 170, 1)',
                    'rgba(210, 105, 30, 1)',
                    'rgba(255, 159, 64, 1)'
                    ],
              borderColor: 'transparent',
              pointHoverBackgroundColor: '#fff',
              borderWidth: 0,
              data: data1

            }
          ]
        },
        options: {
          maintainAspectRatio: true,
          legend: {
            display: false
          },
          responsive: true,
          scales: {
            xAxes: [{
              gridLines: {
                drawOnChartArea: true,
                color: '#f2f2f2'
              },
              ticks: {
                fontFamily: "Poppins",
                fontSize: 12
              }
            }],
            yAxes: [{
              ticks: {
                beginAtZero: true,
                maxTicksLimit: 5,
                stepSize: 50,
                max: 150,
                fontFamily: "Poppins",
                fontSize: 12
              },
              gridLines: {
                display: true,
                color: '#f2f2f2'

              }
            }]
          },
          elements: {
            point: {
              radius: 0,
              hitRadius: 10,
              hoverRadius: 4,
              hoverBorderWidth: 3
            }
          }


        }
      });
    }
    </script>

    </script>
