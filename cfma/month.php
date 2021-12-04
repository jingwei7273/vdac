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
</head>

<body>

        <?php 
        // connect to the database
        $conn = mysqli_connect('localhost', 'zhe', '1234', 'cfma');

        // check connection
        if(!$conn){
          echo 'Connection error: '. mysqli_connect_error();
        }
        
        $sql = mysqli_query($conn, "SELECT * FROM expense WHERE time  >= '2021-12-01' and time  <='2021-12-31' ORDER BY time ");

        //expense Dec-------------------------------------------------
        $sqldec = 'SELECT *
                FROM expense 
                WHERE  time >= "2021-12-01" and time  <="2021-12-31" 
                ORDER BY time ';

        $resultdec = mysqli_query($conn, $sqldec);
        // fetch the resulting rows as an array
        $expensedec = mysqli_fetch_all($resultdec, MYSQLI_ASSOC);
        
        while($row = mysqli_fetch_array($sql)) {
          $amount_dec[] = $row['amount'];
        }
        $total_dec = array_sum($amount_dec);

        // close connection
        mysqli_close($conn);
        ?>

        <?php 
        // connect to the database
        $conn = mysqli_connect('localhost', 'zhe', '1234', 'cfma');

        // check connection
        if(!$conn){
          echo 'Connection error: '. mysqli_connect_error();
        }
        
        $sql = mysqli_query($conn, "SELECT * FROM expense WHERE time  >= '2021-11-01' and time  <='2021-11-30' ORDER BY time ");

        //expense Nov-------------------------------------------------
        $sqlnov = 'SELECT *
                FROM expense 
                WHERE  time >= "2021-11-01" and time  <="2021-11-30" 
                ORDER BY time ';

        $resultnov = mysqli_query($conn, $sqlnov);
        // fetch the resulting rows as an array
        $expensenov = mysqli_fetch_all($resultnov, MYSQLI_ASSOC);
        
        while($row = mysqli_fetch_array($sql)) {
          $amount_nov[] = $row['amount'];
        }
        $total_nov = array_sum($amount_nov);

        // close connection
        mysqli_close($conn);
        ?>

        <?php 
        // connect to the database
        $conn = mysqli_connect('localhost', 'zhe', '1234', 'cfma');

        // check connection
        if(!$conn){
          echo 'Connection error: '. mysqli_connect_error();
        }

        $sql = mysqli_query($conn, "SELECT * FROM expense WHERE time  >= '2021-10-01' and time  <='2021-10-31' ORDER BY time ");

        //expense Oct-------------------------------------------------
        $sqloct = 'SELECT *
                FROM expense 
                WHERE  time >= "2021-10-01" and time  <="2021-10-31" 
                ORDER BY time ';

        $resultoct = mysqli_query($conn, $sqloct);
        // fetch the resulting rows as an array
        $expenseoct = mysqli_fetch_all($resultoct, MYSQLI_ASSOC);
        
        while($row = mysqli_fetch_array($sql)) {
          $amount_oct[] = $row['amount'];
        }
        $total_oct = array_sum($amount_oct);

        // close connection
        mysqli_close($conn);
        ?>


        <div id="monthrecord" class="carousel slide w" data-bs-ride="carousel" data-bs-interval="false">
          <div class="carousel-inner">

            <div class="carousel-item">
              <div >
                <h1>OCTOBER RECORD</h1>
                <table>
                    <thead>
                        <th>&nbsp;Date</th>
                        <th>&nbsp;Category</th>
                        <th>&nbsp;Name</th>
                        <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Amount</th>
                    <thead>
                    <tbody>
                        <?php
                        foreach ($expenseoct as $oct) {
                            echo '<tr>';
                            $oct['time']= date('M:d', strtotime($oct['time']));
                            echo '<td>'.$oct['time'].'</td>';                          
                            echo '<td>'.$oct['category'].'</td>';
                            echo '<td>'.$oct['tag'].'</td>';
                            $oct['amount'] = number_format($oct['amount'], 2, '.', '');
                            echo '<td align="right">'.$oct['amount'].'</td>';
                            echo '</tr>';
                        }
                        ?>
                    </tbody>
                    <tfoot>
                      <?php
                        $total_oct = number_format($total_oct, 2, '.', '');
                      ?>
                      <th> </th>
                      <th> </th>
                      <th> <h2>TOTAL: </h2></th>
                      <th> <h5>RM<?php echo $total_oct;?></h5></th>
                    </tfoot>
                </table>
                </div>
            </div>
          

              <div class="carousel-item">
                  <div >
                    <h1>NOVEMBER RECORD</h1>
                    <table>
                        <thead>
                            <th>&nbsp;Date</th>
                            <th>&nbsp;Category</th>
                            <th>&nbsp;Name</th>
                            <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Amount</th>
                        <thead>
                        <tbody>
                            <?php
                            foreach ($expensenov as $nov) {
                                echo '<tr>';
                                $nov['time']= date('M:d', strtotime($nov['time']));
                                echo '<td>'.$nov['time'].'</td>';                          
                                echo '<td>'.$nov['category'].'</td>';
                                echo '<td>'.$nov['tag'].'</td>';
                                $nov['amount'] = number_format($nov['amount'], 2, '.', '');
                                echo '<td align="right">'.$nov['amount'].'</td>';
                                echo '</tr>';
                            }
                            ?>
                        </tbody>
                        <tfoot>
                          <?php
                            $total_nov = number_format($total_nov, 2, '.', '');
                          ?>
                          <th> </th>
                          <th> </th>
                          <th> <h2>TOTAL: </h2></th>
                          <th> <h5>RM<?php echo $total_nov;?></h5></th>
                        </tfoot>
                    </table>
                    </div>
              </div>

            <div class="carousel-item active">
              <div >
              <h1>DECEMBER RECORD</h1>
              <table>
                  <thead>
                      <th>&nbsp;Date</th>
                      <th>&nbsp;Category</th>
                      <th>&nbsp;Name</th>
                      <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Amount</th>
                  <thead>
                  <tbody>
                      <?php
                      foreach ($expensedec as $dec) {
                          echo '<tr>';
                          $dec['time']= date('M:d', strtotime($dec['time']));
                          echo '<td>'.$dec['time'].'</td>';                          
                          echo '<td>'.$dec['category'].'</td>';
                          echo '<td>'.$dec['tag'].'</td>';
                          $dec['amount'] = number_format($dec['amount'], 2, '.', '');
                          echo '<td align="right">'.$dec['amount'].'</td>';
                          echo '</tr>';
                      }
                      ?>
                  </tbody>
                  <tfoot>
                    <?php
                      $total_dec = number_format($total_dec, 2, '.', '');
                    ?>
                    <th> </th>
                    <th> </th>
                    <th> <h2>TOTAL: </h2></th>
                    <th> <h5>RM<?php echo $total_dec;?></h5></th>
                  </tfoot>
              </table>
              </div>
            </div>
          
          <button class="carousel-control-prev" type="button" data-bs-target="#monthrecord" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#monthrecord" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>

        </div>
        



      <div class="icon-bar fixed-bottom">
        <a href="index.php"><i class="fa fa-home"></i></a>
        <a href="stat.php"><i class="bi bi-bar-chart-line"></i></a>
        <a href="week.php"><i class="bi bi-calendar-day"></i></a>
        <a class="active"href="month.php"><i class="bi bi-calendar-month"></i></a>
        <a href="progress.php"><i class="bi bi-bookmark-check"></i></a>
      </div>   

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
      </script>
      
      <style type="text/css">
        td {
          padding: 0 5px;
        }
      </style>                  


</body>
</html>

