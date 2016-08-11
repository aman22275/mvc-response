<?php
require_once 'classes/Database.php';
$database = new Database;
$database->query("select * from channel_data");
$rows= $database->resultSet();

    
?>


<html>
      <head>
        <!--Load the AJAX API-->
        <script type="text/javascript" src="https://www.google.com/jsapi"></script>
        <script type="text/javascript">

          // Load the Visualization API and the piechart package.
          google.load('visualization', '1.0', {'packages':['corechart']});

          // Set a callback to run when the Google Visualization API is loaded.
          google.setOnLoadCallback(drawChart);

          // Callback that creates and populates a data table,
          // instantiates the pie chart, passes in the data and
          // draws it.
          function drawChart() {

            // Create the data table.
            
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Year');
            data.addColumn('number', 'Sales');
            data.addColumn('number', 'Expenses');
            data.addRows([        
        <?php 
foreach ($rows as $row){
echo "['".$row["f1"]."',".$row["f1"].",".$row["f3"]."],"; } ?>             
        ]);
            // Create the data table.
            
            var data2 = new google.visualization.DataTable();
          //  data2.addColumn('string', 'Year');
            data2.addColumn('number', 'Sales');
            //data2.addColumn('number', 'Expenses');
            data2.addRows([
              [1000],
              [1170],
              [860],
              [1030]
            ]);
            var data3 = new google.visualization.DataTable();
            data3.addColumn('string', 'Year');
            data3.addColumn('number', 'Sales');
            data3.addColumn('number', 'Expenses');
            data3.addRows([
              ['2004', 1000, 400],
              ['2005', 1170, 460],
              ['2006',  860, 580],
              ['2007', 1030, 540]
            ]);

            // Set chart options
            var options = {'title':'sensor 1',
                           'width':400,
                           'height':300};
            // Set chart options
            var options2 = {'title':'sensor 2',
                           'width':400,
                           'height':300};
            // Set chart options
            var options3 = {'title':'sensor3',
                           'width':400,
                           'height':300};

            // Instantiate and draw our chart, passing in some options.
            var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
            chart.draw(data, options);
            var chart2 = new google.visualization.LineChart(document.getElementById('chart_div2'));
            chart2.draw(data2, options2);
            var chart3 = new google.visualization.LineChart(document.getElementById('chart_div3'));
            chart3.draw(data3, options3);

          }
        </script>
      </head>

      <body>
        <!--Divs that will hold the charts-->
        <div id="chart_div"></div>
        <div id="chart_div2"></div>
        <div id="chart_div3"></div>
      </body>
    </html>