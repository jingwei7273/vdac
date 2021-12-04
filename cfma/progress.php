
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">

    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>


    <!-- Add icon library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="16" fill="blue" class="bi bi-piggy-bank" viewBox="0 0 16 16">
      <path d="M5 6.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0zm1.138-1.496A6.613 6.613 0 0 1 7.964 4.5c.666 0 1.303.097 1.893.273a.5.5 0 0 0 .286-.958A7.602 7.602 0 0 0 7.964 3.5c-.734 0-1.441.103-2.102.292a.5.5 0 1 0 .276.962z"/>
      <path fill-rule="evenodd" d="M7.964 1.527c-2.977 0-5.571 1.704-6.32 4.125h-.55A1 1 0 0 0 .11 6.824l.254 1.46a1.5 1.5 0 0 0 1.478 1.243h.263c.3.513.688.978 1.145 1.382l-.729 2.477a.5.5 0 0 0 .48.641h2a.5.5 0 0 0 .471-.332l.482-1.351c.635.173 1.31.267 2.011.267.707 0 1.388-.095 2.028-.272l.543 1.372a.5.5 0 0 0 .465.316h2a.5.5 0 0 0 .478-.645l-.761-2.506C13.81 9.895 14.5 8.559 14.5 7.069c0-.145-.007-.29-.02-.431.261-.11.508-.266.705-.444.315.306.815.306.815-.417 0 .223-.5.223-.461-.026a.95.95 0 0 0 .09-.255.7.7 0 0 0-.202-.645.58.58 0 0 0-.707-.098.735.735 0 0 0-.375.562c-.024.243.082.48.32.654a2.112 2.112 0 0 1-.259.153c-.534-2.664-3.284-4.595-6.442-4.595zM2.516 6.26c.455-2.066 2.667-3.733 5.448-3.733 3.146 0 5.536 2.114 5.536 4.542 0 1.254-.624 2.41-1.67 3.248a.5.5 0 0 0-.165.535l.66 2.175h-.985l-.59-1.487a.5.5 0 0 0-.629-.288c-.661.23-1.39.359-2.157.359a6.558 6.558 0 0 1-2.157-.359.5.5 0 0 0-.635.304l-.525 1.471h-.979l.633-2.15a.5.5 0 0 0-.17-.534 4.649 4.649 0 0 1-1.284-1.541.5.5 0 0 0-.446-.275h-.56a.5.5 0 0 1-.492-.414l-.254-1.46h.933a.5.5 0 0 0 .488-.393zm12.621-.857a.565.565 0 0 1-.098.21.704.704 0 0 1-.044-.025c-.146-.09-.157-.175-.152-.223a.236.236 0 0 1 .117-.173c.049-.027.08-.021.113.012a.202.202 0 0 1 .064.199z"/>
    </svg>

    <style>
    #myProgress {
    width: 30%;
    background-color: rgb(202, 6, 6);
    }

    #myBar {
    width: 10%;
    height: 30px;
    background-color: #aa0404;
    text-align: center;
    line-height: 50px;
    color: rgb(7, 0, 0);
    }
    </style>
  
    <link rel="manifest" href="manifest.json" />

    <?php
    session_start();
    ?>

</head>

<body>

      <div class="icon-bar fixed-bottom">
        <a href="index.php"><i class="fa fa-home"></i></a>
        <a href="stat.php"><i class="bi bi-bar-chart-line"></i></a>
        <a href="week.php"><i class="bi bi-calendar-day"></i></a>
        <a href="month.php"><i class="bi bi-calendar-month"></i></a>
        <a class="active"href="progress.php"><i class="bi bi-bookmark-check"></i></a>
      </div>   

      <p5 class="center lead">My Savings Goal</p5>
     
      <!-- Button to add save amount -->
      <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#SaveAmount">Savings Goal 1</button>
        <div class="offcanvas offcanvas-top"  id="SaveAmount" aria-labelledby="offcanvasTopLabel">  
         
        <div class="offcanvas-header">
            <button type="button" class="btn-close text-reset btn-lg" data-mdb-dismiss="offcanvas" ></button>
            
            <form action="progressssg.php" method="post">
            <label for="Saveamount">Save Amount</label>
              <input type="number" class="form-control" id="Saveamount" min="0" step="0.01"  name="Saveamount" placeholder="Enter Amount">
            
              <div style="width: 150px;">
                <button class="btn btn-primary btn-lg mt-5" type="submit" value="Submit">Save</button>
              </div>
            </form>
        </div>

        </div>

      <div class="container">
        <span class="border-success">
          <h5 class="center lead ">Goal Amount</h5>
          <h5 class="center grey-text">  <i class="bi bi-coin"></i> RM </h5>
        </span>
      </div>

      <div class="container">
        <span class="border-success">
          <h5 class="center lead ">Saved Amount</h5>
          <h5 class="center grey-text">  <i class="bi bi-coin"></i> RM </h5>
        </span>

      </div>

      <div id="myProgress" class="btn btn-success position-absolute bottom-0 start-0 ">
        <div class="myBar">30%</div>
      </div>

      <?php
        //MySQLi information
        $db_host     = "localhost";
        $db_username = "zhe";
        $db_password = "1234";
        //connect to mysqli database (Host/Username/Password)
        $connection = mysqli_connect($db_host, $db_username, $db_password) or die("Error " . mysqli_error());
        //select MySQLi dabatase table
        $db = mysqli_select_db($connection, "cfma") or die("Error " . mysqli_error());

        ?>

      <!-- Button to set savings goal -->
      <button class="btn btn-success position-absolute top-0 end-0 " type="button" data-bs-toggle="offcanvas" data-bs-target="#ssg">
        <i class="bi bi-piggy-bank" text="Set Savings Goal"></i>
      </button>

      
      <div class="offcanvas offcanvas-end" id="ssg">
        <div class="offcanvas-header">
          <button type="button" class="btn-close text-reset btn-lg" data-bs-dismiss="offcanvas"></button>
        </div>
     
      <form action="progressssg.php" method="post">
        <label for="goalname">Goal name</label>
        <input type="text" class="form-control" id="goalname" name="goalname" placeholder="Your savings goal">
      
        <label for="Samount">Total Amount</label>
        <input type="number" class="form-control" id="Samount" min="0" step="0.01"  name="Samount" placeholder="Total Amount">
       
        <label for="enddate">End Date</label>   
        <input type="text" class="form-control" id="enddate" name="enddate" placeholder="Dec 31, 2021">   

        <div style="width: 150px;">
          <button class="btn btn-primary btn-lg mt-5" type="submit" value="Submit">Done</button>
        </div>
      </form>
        
</body>
</html>