google.charts.load('current', {'packages':['line']});
      google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

      var data = new google.visualization.DataTable();
      data.addColumn('number', 'Grafik Visual');
      data.addColumn('number', 'Suhu');
      data.addColumn('number', 'Cuaca');
      data.addColumn('number', 'Transformers: Age of Extinction');
      data.addColumn('number', 'Transformers: Age of Extinction 2');

      data.addRows([
        [1,  37.8, 80.8, 41.8, 20.2],
        [2,  37.8, 78.8, 41.8, 30.9],
        [3,  37.8, 80.8, 41.8, 40.9],
        [4,  37.8, 80.8, 41.8, 50.1],
        [5,  37.8, 80.8, 41.8, 60.7]
 
      ]);

      var options = {

        width: '100%',
        height: '100%',
        axes: {
          x: {
            0: {side: 'top'}
          }
        }
      };

      var chart = new google.charts.Line(document.getElementById('line_top_x'));

      chart.draw(data, google.charts.Line.convertOptions(options));
    }
