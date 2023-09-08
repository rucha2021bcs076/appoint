 <?php  
 $connect = mysqli_connect("localhost", "rishabh", "manu123", "placement1");  
 
 $query = " SELECT count(*) as number from skills where C >= 7";
 $query1 = " SELECT count(*) as number1 from skills where CPP >= 7";
 $query2 = " SELECT count(*) as number2 from skills where Python >= 7";
 $query3 = " SELECT count(*) as number3 from skills where JAVA >= 7";
 
 $result = mysqli_query($connect, $query);
 $result1 = mysqli_query($connect, $query1);
 $result2 = mysqli_query($connect, $query2);
 $result3 = mysqli_query($connect, $query3);
 ?>

<!DOCTYPE HTML>
<HEAD>
	<TITLE>Statistics | Programming Languages</TITLE>

 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
 <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

 <script type="text/javascript">
  google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback(drawBasic);

function drawBasic() {

      var data = google.visualization.arrayToDataTable([
        ['Languages', 'No. of Students',],
        ['C', <?php while($row = mysqli_fetch_array($result))  
                          { echo $row["number"];} ?>],
        ['C++', <?php while($row1 = mysqli_fetch_array($result1))  
                          { echo $row1["number1"];} ?> ],
        ['Python', <?php while($row2 = mysqli_fetch_array($result2))  
                          { echo $row2["number2"];} ?>],
        ['Java', <?php while($row3 = mysqli_fetch_array($result3))  
                          { echo $row3["number3"];} ?>],
      
      ]);

      var options = {
        // title: 'Population of Largest U.S. Cities',
        chartArea: {width: '50%'},
        hAxis: {
          title: 'Language Stats',
          minValue: 0
        },
        vAxis: {
          title: 'Skills'
        }
      };

      var chart = new google.visualization.BarChart(document.getElementById('chart_div'));

      chart.draw(data, options);
    }
</script>
</HEAD>
<BODY>
	
<div id="chart_div"></div>
</BODY>