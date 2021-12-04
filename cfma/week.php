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
        $conn = mysqli_connect('localhost', 'zhe', '1234', 'cfma');
        if(!$conn){
          echo 'Connection error: '. mysqli_connect_error();   }
        $sql = mysqli_query($conn, "SELECT * FROM expense WHERE time  >= '2021-11-01' and time  <='2021-11-07' ORDER BY time ");
        //expense w1-------------------------------------------------
        $sqlw1 = 'SELECT *
                FROM expense 
                WHERE  time >= "2021-11-01" and time  <="2021-11-07" 
                ORDER BY time ';
        $resultw1 = mysqli_query($conn, $sqlw1);
        $expensew1 = mysqli_fetch_all($resultw1, MYSQLI_ASSOC);

        while($row = mysqli_fetch_array($sql)) {
          $amount_w1[] = $row['amount'];  }

        $total_w1 = array_sum($amount_w1);
        // close connection
        mysqli_close($conn);
        ?>

        <?php 
        $conn = mysqli_connect('localhost', 'zhe', '1234', 'cfma');
        if(!$conn){
          echo 'Connection error: '. mysqli_connect_error();   }
        $sql = mysqli_query($conn, "SELECT * FROM expense WHERE time  >= '2021-11-08' and time  <='2021-11-14' ORDER BY time ");
        //expense w2-------------------------------------------------
        $sqlw2 = 'SELECT *
                FROM expense 
                WHERE  time >= "2021-11-08" and time  <="2021-11-14" 
                ORDER BY time ';
        $resultw2 = mysqli_query($conn, $sqlw2);
        $expensew2 = mysqli_fetch_all($resultw2, MYSQLI_ASSOC);

        while($row = mysqli_fetch_array($sql)) {
          $amount_w2[] = $row['amount'];  }

        $total_w2 = array_sum($amount_w2);
        // close connection
        mysqli_close($conn);
        ?>

        <?php 
        $conn = mysqli_connect('localhost', 'zhe', '1234', 'cfma');
        if(!$conn){
          echo 'Connection error: '. mysqli_connect_error();   }
        $sql = mysqli_query($conn, "SELECT * FROM expense WHERE time  >= '2021-11-15' and time  <='2021-11-21' ORDER BY time ");
        //expense w3-------------------------------------------------
        $sqlw3 = 'SELECT *
                FROM expense 
                WHERE  time >= "2021-11-15" and time  <="2021-11-21" 
                ORDER BY time ';
        $resultw3 = mysqli_query($conn, $sqlw3);
        $expensew3 = mysqli_fetch_all($resultw3, MYSQLI_ASSOC);

        while($row = mysqli_fetch_array($sql)) {
          $amount_w3[] = $row['amount'];  }

        $total_w3 = array_sum($amount_w3);
        // close connection
        mysqli_close($conn);
        ?>

        <?php 
        $conn = mysqli_connect('localhost', 'zhe', '1234', 'cfma');
        if(!$conn){
          echo 'Connection error: '. mysqli_connect_error();   }
        $sql = mysqli_query($conn, "SELECT * FROM expense WHERE time  >= '2021-11-22' and time  <='2021-11-28' ORDER BY time ");
        //expense w4-------------------------------------------------
        $sqlw4 = 'SELECT *
                FROM expense 
                WHERE  time >= "2021-11-22" and time  <="2021-11-28" 
                ORDER BY time ';
        $resultw4 = mysqli_query($conn, $sqlw4);
        $expensew4 = mysqli_fetch_all($resultw4, MYSQLI_ASSOC);

        while($row = mysqli_fetch_array($sql)) {
          $amount_w4[] = $row['amount'];  }

        $total_w4 = array_sum($amount_w4);
        // close connection
        mysqli_close($conn);
        ?>     
        
        

        <div id="weekrecord" class="carousel slide w" data-bs-ride="carousel" data-bs-interval="false">
          <div class="carousel-inner">

            <div class="carousel-item active">
              <div >
              <h1>01 Nov - 07 Nov (Week 1)</h1>
              <table>
                  <thead>
                      <th>&nbsp;Date</th>
                      <th>&nbsp;Category</th>
                      <th>&nbsp;Name</th>
                      <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Amount</th>
                  <thead>
                  <tbody>
                      <?php
                      foreach ($expensew1 as $w1) {
                          echo '<tr>';
                          $w1['time']= date('M:d', strtotime($w1['time']));
                          echo '<td>'.$w1['time'].'</td>';                          
                          echo '<td>'.$w1['category'].'</td>';
                          echo '<td>'.$w1['tag'].'</td>';
                          $w1['amount'] = number_format($w1['amount'], 2, '.', '');
                          echo '<td align="right">'.$w1['amount'].'</td>';
                          echo '</tr>';
                      }
                      ?>
                  </tbody>
                  <tfoot>
                    <?php
                      $total_w1 = number_format($total_w1, 2, '.', '');
                    ?>
                    <th> </th>
                    <th> </th>
                    <th> <h2>TOTAL: </h2></th>
                    <th> <h5>RM<?php echo $total_w1;?></h5></th>
                  </tfoot>
              </table>
              </div>
            </div>

            <div class="carousel-item ">
              <div >
              <h1>08 Nov - 14 Nov (Week 2)</h1>
              <table>
                  <thead>
                      <th>&nbsp;Date</th>
                      <th>&nbsp;Category</th>
                      <th>&nbsp;Name</th>
                      <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Amount</th>
                  <thead>
                  <tbody>
                      <?php
                      foreach ($expensew2 as $w2) {
                          echo '<tr>';
                          $w2['time']= date('M:d', strtotime($w2['time']));
                          echo '<td>'.$w2['time'].'</td>';                          
                          echo '<td>'.$w2['category'].'</td>';
                          echo '<td>'.$w2['tag'].'</td>';
                          $w2['amount'] = number_format($w2['amount'], 2, '.', '');
                          echo '<td align="right">'.$w2['amount'].'</td>';
                          echo '</tr>';
                      }
                      ?>
                  </tbody>
                  <tfoot>
                    <?php
                      $total_w2 = number_format($total_w2, 2, '.', '');
                    ?>
                    <th> </th>
                    <th> </th>
                    <th> <h2>TOTAL: </h2></th>
                    <th> <h5>RM<?php echo $total_w2;?></h5></th>
                  </tfoot>
                </table>
                </div>              
              </div>

            <div class="carousel-item ">
              <div >
              <h1>15 Nov - 21 Nov (Week 3)</h1>
              <table>
                  <thead>
                      <th>&nbsp;Date</th>
                      <th>&nbsp;Category</th>
                      <th>&nbsp;Name</th>
                      <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Amount</th>
                  <thead>
                  <tbody>
                      <?php
                      foreach ($expensew3 as $w3) {
                          echo '<tr>';
                          $w3['time']= date('M:d', strtotime($w3['time']));
                          echo '<td>'.$w3['time'].'</td>';                          
                          echo '<td>'.$w3['category'].'</td>';
                          echo '<td>'.$w3['tag'].'</td>';
                          $w3['amount'] = number_format($w3['amount'], 2, '.', '');
                          echo '<td align="right">'.$w3['amount'].'</td>';
                          echo '</tr>';
                      }
                      ?>
                  </tbody>
                  <tfoot>
                    <?php
                      $total_w3 = number_format($total_w3, 2, '.', '');
                    ?>
                    <th> </th>
                    <th> </th>
                    <th> <h2>TOTAL: </h2></th>
                    <th> <h5>RM<?php echo $total_w3;?></h5></th>
                  </tfoot>
                </table>
                </div>              
              </div>

            <div class="carousel-item ">
              <div >
              <h1>22 Nov - 28 Nov (Week 4)</h1>
              <table>
                  <thead>
                      <th>&nbsp;Date</th>
                      <th>&nbsp;Category</th>
                      <th>&nbsp;Name</th>
                      <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Amount</th>
                  <thead>
                  <tbody>
                      <?php
                      foreach ($expensew4 as $w4) {
                          echo '<tr>';
                          $w4['time']= date('M:d', strtotime($w4['time']));
                          echo '<td>'.$w4['time'].'</td>';                          
                          echo '<td>'.$w4['category'].'</td>';
                          echo '<td>'.$w4['tag'].'</td>';
                          $w4['amount'] = number_format($w4['amount'], 2, '.', '');
                          echo '<td align="right">'.$w4['amount'].'</td>';
                          echo '</tr>';
                      }
                      ?>
                  </tbody>
                  <tfoot>
                    <?php
                      $total_w4 = number_format($total_w4, 2, '.', '');
                    ?>
                    <th> </th>
                    <th> </th>
                    <th> <h2>TOTAL: </h2></th>
                    <th> <h5>RM<?php echo $total_w4;?></h5></th>
                  </tfoot>
                </table>
                </div>              
              </div>


              </div>
            </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#weekrecord" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#weekrecord" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
          
        </div>




      <div class="icon-bar fixed-bottom">
        <a href="index.php"><i class="fa fa-home"></i></a>
        <a href="stat.php"><i class="bi bi-bar-chart-line"></i></a>
        <a class="active"href="week.php"><i class="bi bi-calendar-day"></i></a>
        <a href="month.php"><i class="bi bi-calendar-month"></i></a>
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