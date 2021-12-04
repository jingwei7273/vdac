<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">

    <!-- Add icon library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <link rel="manifest" href="manifest.json" />

    <title>JavaScript Pie Chart</title>
    <script src="https://cdn.anychart.com/releases/8.0.1/js/anychart-core.min.js"></script>
    <script src="https://cdn.anychart.com/releases/8.0.1/js/anychart-pie.min.js"></script>
    <div id="container"></div>


</head>

<body>

      <div class="icon-bar fixed-bottom">
        <a href="index.php"><i class="fa fa-home"></i></a>
        <a class="active"href="stat.php"><i class="bi bi-bar-chart-line"></i></a>
        <a href="week.php"><i class="bi bi-calendar-day"></i></a>
        <a href="month.php"><i class="bi bi-calendar-month"></i></a>
        <a href="progress.php"><i class="bi bi-bookmark-check"></i></a>
      </div>   

      <script src="js/app.js"></script>

      <div id="container" style="width: 100%; height: 100%"></div>
     
      <script>
      anychart.onDocumentReady(function() {

      // set the data
      var data = [
          {x: "Food", value: 223553265},
          {x: "Transport", value: 38929319},
          {x: "Clothing", value: 2932248},
          {x: "Daily Supplies", value: 14674252},
          {x: "Gloceries", value: 540013},
          {x: "Entertainment", value: 19107368},
          {x: "Medical", value: 9009073},
          {x: "Bill", value: 9009073},
          {x: "Others", value: 9009073}
      ];

      // create the chart
      var chart = anychart.pie();

      // set the chart title
      chart.title("Expenditure");

      // add the data
      chart.data(data);
      
      // sort elements
      chart.sort("desc");  
      
      // set legend position
      chart.legend().position("right");
      // set items layout
      chart.legend().itemsLayout("vertical");  

      // display the chart in the container
      chart.container('container');
      chart.draw();

    });
      </script>


    <script>
      anychart.onDocumentReady(function() {

      // set the data
      var data = [
          {x: "Pocket Money", value: 223553265},
          {x: "Salary", value: 38929319},
          {x: "Allowance", value: 2932248},
          {x: "Bonus", value: 14674252},
          {x: "Side Hustle", value: 540013},
          {x: "Earned Interest", value: 19107368},
          {x: "Investment Dividend", value: 9009073},
      ];

      // create the chart
      var chart = anychart.pie();

      // set the chart title
      chart.title("Available Balance");

      // add the data
      chart.data(data);
      
      // sort elements
      chart.sort("desc");  
      
      // set legend position
      chart.legend().position("right");
      // set items layout
      chart.legend().itemsLayout("vertical");  

      // display the chart in the container
      chart.container('container');
      chart.draw();

    });
      </script>
        
</body>
</html>