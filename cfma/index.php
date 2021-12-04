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

    <link rel="manifest" href="manifest.json" />

    <?php
    session_start();
    ?>

</head>

<body>


      <div class="fixed-top ">
      <h2 class="display-6 text-muted"><span id="clock"></span></h2>
         
      </div>

      <div class="icon-bar fixed-bottom">
        <a class="active" href="index.php"><i class="fa fa-home"></i></a>
        <a href="stat.php"><i class="bi bi-bar-chart-line"></i></a>
        <a href="week.php"><i class="bi bi-calendar-day"></i></a>
        <a href="month.php"><i class="bi bi-calendar-month"></i></a>
        <a href="progress.php"><i class="bi bi-bookmark-check"></i></a>
      </div>   
      
      <div>
          <img src="css/icon.png" alt="icon" class="center">
      </div>

      <!-- Progress -->
      <div>
          <h5 class="center lead ">   Current Goal: 5K </h5>
      </div>     



      <div class="progress" style="height: 30px;">
        <div class="progress-bar bg-danger progress-bar-striped progress-bar-animated" role="progressbar" style="width: 51%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?php echo $_SESSION['goal'];?>%
        </div>
      </div>

      <!---------------------- Balance ---------------------->
        <?php
        //MySQLi information
        $db_host     = "localhost";
        $db_username = "zhe";
        $db_password = "1234";
        //connect to mysqli database (Host/Username/Password)
        $connection = mysqli_connect($db_host, $db_username, $db_password) or die("Error " . mysqli_error());
        //select MySQLi dabatase table
        $db = mysqli_select_db($connection, "cfma") or die("Error " . mysqli_error());

        //expense
        $sql = mysqli_query($connection, "SELECT * FROM expense");
        while($row = mysqli_fetch_array($sql)) {
        $category_e[] = $row['category'];
        $tags_e[] = $row['tag'];
        $amount_e[] = $row['amount'];
        }
        $expense = array_sum($amount_e);
        //print nl2br(print_r($category, true));
        //print nl2br(print_r($tags, true));
        //print nl2br(print_r($amount, true));
        

        //income
        $sql = mysqli_query($connection, "SELECT * FROM income");
        while($row = mysqli_fetch_array($sql)) {
        $category_i[] = $row['category'];
        $tags_i[] = $row['tag'];
        $amount_i[] = $row['amount'];
        }
        $income = array_sum($amount_i);

        $total = $income - $expense;
        $total = number_format($total, 2, '.', '');
        $goal = ($total / 5000 )*100 ;
        $_SESSION['goal'] = round($goal);
        ?>


      <!-- Balance -->
      <div class="container">
        <span class="border-success">
          <h5 class="center lead ">current balance</h5>
          <h5 class="center grey-text">  <i class="bi bi-coin"></i>      RM <?php echo $total;?></h5>
        </span>

      </div>
      
      <!-- Button to add expense -->
      <button class="btn btn-success position-absolute top-50 end-0 " type="button" data-bs-toggle="offcanvas" data-bs-target="#expense">
        <i class="bi bi-folder-plus fa-2x"></i>
      </button>

      <!-- Add expense menu -->
      <div class="offcanvas offcanvas-end" id="expense">
        <div class="offcanvas-header">
          <h2 class="offcanvas-title">So,what did you buy today?</h2>
          <button type="button" class="btn-close text-reset btn-lg" data-bs-dismiss="offcanvas"></button>
        </div>

        <div class="offcanvas-body">
          <p>Your last expense: &nbsp; <?php echo $_SESSION['lastexpensetag'];?> &nbsp;- RM <?php echo $_SESSION['lastexpenseamount'];?></p>
          <p>Your available balance:   &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; RM <?php echo $total;?></p>
          <div class="btn-group-vertical gap-1 float-end" style="width: 200px;">
            <button class="btn btn-primary btn-lg" type="button" data-bs-toggle="offcanvas" data-bs-target="#food">Food</button>
            <button class="btn btn-primary btn-lg" type="button" data-bs-toggle="offcanvas" data-bs-target="#transport">Transport</button>
            <button class="btn btn-primary btn-lg" type="button" data-bs-toggle="offcanvas" data-bs-target="#clothing">Clothing</button>
            <button class="btn btn-primary btn-lg" type="button" data-bs-toggle="offcanvas" data-bs-target="#daily_supplies">Daily Supplies</button>
            <button class="btn btn-primary btn-lg" type="button" data-bs-toggle="offcanvas" data-bs-target="#groceries">Groceries</button>
            <button class="btn btn-primary btn-lg" type="button" data-bs-toggle="offcanvas" data-bs-target="#entertainment">Entertainment</button>
            <button class="btn btn-primary btn-lg" type="button" data-bs-toggle="offcanvas" data-bs-target="#medical">Medical</button>
            <button class="btn btn-primary btn-lg" type="button" data-bs-toggle="offcanvas" data-bs-target="#bill">Bill</button>
            <button class="btn btn-primary btn-lg" type="button" data-bs-toggle="offcanvas" data-bs-target="#other">Other</button>
          </div>

        </div>
      </div>


      <!-- Button to add income -->
      <button class="btn btn-danger position-absolute top-50 start-0 " type="button" data-bs-toggle="offcanvas" data-bs-target="#income">
        <i class="bi bi-bank2 fa-2x"></i>
      </button>

      <!-- Add income menu-->
      <div class="offcanvas offcanvas-start" id="income">
        <div class="offcanvas-header">
          <h3 class="offcanvas-title">So, how much have you earn?</h3>
          <button type="button" class="btn-close text-reset btn-lg" data-bs-dismiss="offcanvas"></button>
        </div>
        <div class="offcanvas-body">
          <p>Your last income: &nbsp; <?php echo $_SESSION['lastincometag'];?> &nbsp;- RM <?php echo $_SESSION['lastincomeamount'];?></p>
          <p>Your available balance: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;   RM <?php echo $total;?></p>
          <div class="btn-group-vertical gap-1 float-end" style="width: 200px;">
            <button class="btn btn-danger btn-lg" type="button" data-bs-toggle="offcanvas" data-bs-target="#pocket_money">Pocket Money</button>
            <button class="btn btn-danger btn-lg" type="button" data-bs-toggle="offcanvas" data-bs-target="#salary">Salary</button>
            <button class="btn btn-danger btn-lg" type="button" data-bs-toggle="offcanvas" data-bs-target="#allowance">Allowance</button>
            <button class="btn btn-danger btn-lg" type="button" data-bs-toggle="offcanvas" data-bs-target="#bonus">Bonus</button>
            <button class="btn btn-danger btn-lg" type="button" data-bs-toggle="offcanvas" data-bs-target="#side_hustle">Side Hustle</button>
            <button class="btn btn-danger btn-lg" type="button" data-bs-toggle="offcanvas" data-bs-target="#earned_interest">Earned Interest</button>
            <button class="btn btn-danger btn-lg" type="button" data-bs-toggle="offcanvas" data-bs-target="#investment_dividend">Investment Dividend</button>
          </div>
        </div>
      </div>



<!-------------------------------- ALL EXPENSES ------------------------------------->


      <!-- Add food-->
      <div class="offcanvas offcanvas-end "  id="food">
        <div class="offcanvas-header ">
          <h1 class="offcanvas-title mt-5 mb-3">New Expense</h1>
        </div>
        <div class="offcanvas-body">

          <form action="connect.php" method="post">
            <div class="form-floating mb-3">
              <select class="form-select" id="category" name="category" aria-label="Floating label select example">
                <option value="food">FOOD</option>
              </select>
              <label for="category">Category</label>
            </div>

            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="tag" name="tag" >
              <label for="tag">Name of Item</label>
            </div>
            <div class="form-floating">
              <input type="number" class="form-control" id="amount" min="0" step="0.01"  name="amount">
              <label for="amount">Price of Item</label>
            </div>

            <div class="btn-group-vertical float-end" style="width: 150px;">
              <button class="btn btn-primary btn-lg mt-5" type="submit" value="Submit">Add</button>
            </div>
          
            <div class="btn-group-vertical float-start" style="width: 150px;">
              <button class="btn btn-secondary btn-lg mt-5" type="button" data-bs-dismiss="offcanvas">Back</button>
            </div>
          </form>
        </div>
      </div>


      <!-- Add transport-->
      <div class="offcanvas offcanvas-end "  id="transport">
        <div class="offcanvas-header ">
          <h1 class="offcanvas-title mt-5 mb-3">New Expense</h1>
        </div>
        <div class="offcanvas-body">

          <form action="connect.php" method="post">
            <div class="form-floating mb-3">
              <select class="form-select" id="category" name="category" aria-label="Floating label select example">
                <option value="transport">TRANSPORT</option>
              </select>
              <label for="category">Category</label>
            </div>

            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="tag" name="tag" >
              <label for="tag">Name of Item</label>
            </div>
            <div class="form-floating">
              <input type="number" class="form-control" id="amount" min="0" step="0.01"  name="amount">
              <label for="amount">Price of Item</label>
            </div>

            <div class="btn-group-vertical float-end" style="width: 150px;">
              <button class="btn btn-primary btn-lg mt-5" type="submit" value="Submit">Add</button>
            </div>
          
            <div class="btn-group-vertical float-start" style="width: 150px;">
              <button class="btn btn-secondary btn-lg mt-5" type="button" data-bs-dismiss="offcanvas">Back</button>
            </div>
          </form>
        </div>
      </div>
    
      <!-- Add clothing-->
      <div class="offcanvas offcanvas-end "  id="clothing">
        <div class="offcanvas-header ">
          <h1 class="offcanvas-title mt-5 mb-3">New Expense</h1>
        </div>
        <div class="offcanvas-body">

          <form action="connect.php" method="post">
            <div class="form-floating mb-3">
              <select class="form-select" id="category" name="category" aria-label="Floating label select example">
                <option value="clothing">CLOTHING</option>
              </select>
              <label for="category">Category</label>
            </div>

            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="tag" name="tag" >
              <label for="tag">Name of Item</label>
            </div>
            <div class="form-floating">
              <input type="number" class="form-control" id="amount" min="0" step="0.01"  name="amount">
              <label for="amount">Price of Item</label>
            </div>

            <div class="btn-group-vertical float-end" style="width: 150px;">
              <button class="btn btn-primary btn-lg mt-5" type="submit" value="Submit">Add</button>
            </div>
          
            <div class="btn-group-vertical float-start" style="width: 150px;">
              <button class="btn btn-secondary btn-lg mt-5" type="button" data-bs-dismiss="offcanvas">Back</button>
            </div>
          </form>
        </div>
      </div>      

      <!-- Add daily_supplies-->
      <div class="offcanvas offcanvas-end "  id="daily_supplies">
        <div class="offcanvas-header ">
          <h1 class="offcanvas-title mt-5 mb-3">New Expense</h1>
        </div>
        <div class="offcanvas-body">

          <form action="connect.php" method="post">
            <div class="form-floating mb-3">
              <select class="form-select" id="category" name="category" aria-label="Floating label select example">
                <option value="daily_supplies">DAILY SUPPLIES</option>
              </select>
              <label for="category">Category</label>
            </div>

            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="tag" name="tag" >
              <label for="tag">Name of Item</label>
            </div>
            <div class="form-floating">
              <input type="number" class="form-control" id="amount" min="0" step="0.01"  name="amount">
              <label for="amount">Price of Item</label>
            </div>

            <div class="btn-group-vertical float-end" style="width: 150px;">
              <button class="btn btn-primary btn-lg mt-5" type="submit" value="Submit">Add</button>
            </div>
          
            <div class="btn-group-vertical float-start" style="width: 150px;">
              <button class="btn btn-secondary btn-lg mt-5" type="button" data-bs-dismiss="offcanvas">Back</button>
            </div>
          </form>
        </div>
      </div>      


      <!-- Add Groceries-->
      <div class="offcanvas offcanvas-end "  id="groceries">
        <div class="offcanvas-header ">
          <h1 class="offcanvas-title mt-5 mb-3">New Expense</h1>
        </div>
        <div class="offcanvas-body">

          <form action="connect.php" method="post">
            <div class="form-floating mb-3">
              <select class="form-select" id="category" name="category" aria-label="Floating label select example">
                <option value="groceries">GROCERIES</option>
              </select>
              <label for="category">Category</label>
            </div>

            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="tag" name="tag" >
              <label for="tag">Name of Item</label>
            </div>
            <div class="form-floating">
              <input type="number" class="form-control" id="amount" min="0" step="0.01"  name="amount">
              <label for="amount">Price of Item</label>
            </div>

            <div class="btn-group-vertical float-end" style="width: 150px;">
              <button class="btn btn-primary btn-lg mt-5" type="submit" value="Submit">Add</button>
            </div>
          
            <div class="btn-group-vertical float-start" style="width: 150px;">
              <button class="btn btn-secondary btn-lg mt-5" type="button" data-bs-dismiss="offcanvas">Back</button>
            </div>
          </form>
        </div>
      </div>      

      <!-- Add Entertainment-->
      <div class="offcanvas offcanvas-end "  id="entertainment">
        <div class="offcanvas-header ">
          <h1 class="offcanvas-title mt-5 mb-3">New Expense</h1>
        </div>
        <div class="offcanvas-body">

          <form action="connect.php" method="post">
            <div class="form-floating mb-3">
              <select class="form-select" id="category" name="category" aria-label="Floating label select example">
                <option value="entertainment">ENTERTAINMENT</option>
              </select>
              <label for="category">Category</label>
            </div>

            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="tag" name="tag" >
              <label for="tag">Name of Item</label>
            </div>
            <div class="form-floating">
              <input type="number" class="form-control" id="amount" min="0" step="0.01"  name="amount">
              <label for="amount">Price of Item</label>
            </div>

            <div class="btn-group-vertical float-end" style="width: 150px;">
              <button class="btn btn-primary btn-lg mt-5" type="submit" value="Submit">Add</button>
            </div>
          
            <div class="btn-group-vertical float-start" style="width: 150px;">
              <button class="btn btn-secondary btn-lg mt-5" type="button" data-bs-dismiss="offcanvas">Back</button>
            </div>
          </form>
        </div>
      </div>   
    
      <!-- Add Medical-->
      <div class="offcanvas offcanvas-end "  id="medical">
        <div class="offcanvas-header ">
          <h1 class="offcanvas-title mt-5 mb-3">New Expense</h1>
        </div>
        <div class="offcanvas-body">

          <form action="connect.php" method="post">
            <div class="form-floating mb-3">
              <select class="form-select" id="category" name="category" aria-label="Floating label select example">
                <option value="medical">MEDICAL</option>
              </select>
              <label for="category">Category</label>
            </div>

            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="tag" name="tag" >
              <label for="tag">Name of Item</label>
            </div>
            <div class="form-floating">
              <input type="number" class="form-control" id="amount" min="0" step="0.01"  name="amount">
              <label for="amount">Price of Item</label>
            </div>

            <div class="btn-group-vertical float-end" style="width: 150px;">
              <button class="btn btn-primary btn-lg mt-5" type="submit" value="Submit">Add</button>
            </div>
          
            <div class="btn-group-vertical float-start" style="width: 150px;">
              <button class="btn btn-secondary btn-lg mt-5" type="button" data-bs-dismiss="offcanvas">Back</button>
            </div>
          </form>
        </div>
      </div>   

      <!-- Add Bill-->
      <div class="offcanvas offcanvas-end "  id="bill">
        <div class="offcanvas-header ">
          <h1 class="offcanvas-title mt-5 mb-3">New Expense</h1>
        </div>
        <div class="offcanvas-body">

          <form action="connect.php" method="post">
            <div class="form-floating mb-3">
              <select class="form-select" id="category" name="category" aria-label="Floating label select example">
                <option value="bill">BILL</option>
              </select>
              <label for="category">Category</label>
            </div>

            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="tag" name="tag" >
              <label for="tag">Name of Item</label>
            </div>
            <div class="form-floating">
              <input type="number" class="form-control" id="amount" min="0" step="0.01"  name="amount">
              <label for="amount">Price of Item</label>
            </div>

            <div class="btn-group-vertical float-end" style="width: 150px;">
              <button class="btn btn-primary btn-lg mt-5" type="submit" value="Submit">Add</button>
            </div>
          
            <div class="btn-group-vertical float-start" style="width: 150px;">
              <button class="btn btn-secondary btn-lg mt-5" type="button" data-bs-dismiss="offcanvas">Back</button>
            </div>
          </form>
        </div>
      </div>  

      <!-- Add Other-->
      <div class="offcanvas offcanvas-end "  id="other">
        <div class="offcanvas-header ">
          <h1 class="offcanvas-title mt-5 mb-3">New Expense</h1>
        </div>
        <div class="offcanvas-body">

          <form action="connect.php" method="post">
            <div class="form-floating mb-3">
              <select class="form-select" id="category" name="category" aria-label="Floating label select example">
                <option value="other">OTHER</option>
              </select>
              <label for="category">Category</label>
            </div>

            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="tag" name="tag" >
              <label for="tag">Name of Item</label>
            </div>
            <div class="form-floating">
              <input type="number" class="form-control" id="amount" min="0" step="0.01"  name="amount">
              <label for="amount">Price of Item</label>
            </div>

            <div class="btn-group-vertical float-end" style="width: 150px;">
              <button class="btn btn-primary btn-lg mt-5" type="submit" value="Submit">Add</button>
            </div>
          
            <div class="btn-group-vertical float-start" style="width: 150px;">
              <button class="btn btn-secondary btn-lg mt-5" type="button" data-bs-dismiss="offcanvas">Back</button>
            </div>
          </form>
        </div>
      </div>  



<!-------------------------------- ALL INCOME ------------------------------------->

     <!-- Add Pocket Money-->
     <div class="offcanvas offcanvas-end "  id="pocket_money">
        <div class="offcanvas-header ">
          <h1 class="offcanvas-title mt-5 mb-3">New Income</h1>
        </div>
        <div class="offcanvas-body">

          <form action="connect2.php" method="post">
            <div class="form-floating mb-3">
              <select class="form-select" id="category" name="category" aria-label="Floating label select example">
                <option value="pocket_money">POCKET MONEY</option>
              </select>
              <label for="category">Category</label>
            </div>

            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="tag" name="tag" >
              <label for="tag">Name of Item</label>
            </div>
            <div class="form-floating">
              <input type="number" class="form-control" id="amount" min="0" step="0.01"  name="amount">
              <label for="amount">Price of Item</label>
            </div>

            <div class="btn-group-vertical float-end" style="width: 150px;">
              <button class="btn btn-primary btn-lg mt-5" type="submit" value="Submit">Add</button>
            </div>
          
            <div class="btn-group-vertical float-start" style="width: 150px;">
              <button class="btn btn-secondary btn-lg mt-5" type="button" data-bs-dismiss="offcanvas">Back</button>
            </div>
          </form>
        </div>
      </div>  

     <!-- Add Salary-->
     <div class="offcanvas offcanvas-end "  id="salary">
        <div class="offcanvas-header ">
          <h1 class="offcanvas-title mt-5 mb-3">New Income</h1>
        </div>
        <div class="offcanvas-body">

          <form action="connect2.php" method="post">
            <div class="form-floating mb-3">
              <select class="form-select" id="category" name="category" aria-label="Floating label select example">
                <option value="salary">SALARY</option>
              </select>
              <label for="category">Category</label>
            </div>

            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="tag" name="tag" >
              <label for="tag">Name of Item</label>
            </div>
            <div class="form-floating">
              <input type="number" class="form-control" id="amount" min="0" step="0.01"  name="amount">
              <label for="amount">Price of Item</label>
            </div>

            <div class="btn-group-vertical float-end" style="width: 150px;">
              <button class="btn btn-primary btn-lg mt-5" type="submit" value="Submit">Add</button>
            </div>
          
            <div class="btn-group-vertical float-start" style="width: 150px;">
              <button class="btn btn-secondary btn-lg mt-5" type="button" data-bs-dismiss="offcanvas">Back</button>
            </div>
          </form>
        </div>
      </div>  

     <!-- Add Allowance-->
     <div class="offcanvas offcanvas-end "  id="allowance">
        <div class="offcanvas-header ">
          <h1 class="offcanvas-title mt-5 mb-3">New Income</h1>
        </div>
        <div class="offcanvas-body">

          <form action="connect2.php" method="post">
            <div class="form-floating mb-3">
              <select class="form-select" id="category" name="category" aria-label="Floating label select example">
                <option value="allowance">ALLOWANCE</option>
              </select>
              <label for="category">Category</label>
            </div>

            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="tag" name="tag" >
              <label for="tag">Name of Item</label>
            </div>
            <div class="form-floating">
              <input type="number" class="form-control" id="amount" min="0" step="0.01"  name="amount">
              <label for="amount">Price of Item</label>
            </div>

            <div class="btn-group-vertical float-end" style="width: 150px;">
              <button class="btn btn-primary btn-lg mt-5" type="submit" value="Submit">Add</button>
            </div>
          
            <div class="btn-group-vertical float-start" style="width: 150px;">
              <button class="btn btn-secondary btn-lg mt-5" type="button" data-bs-dismiss="offcanvas">Back</button>
            </div>
          </form>
        </div>
      </div>  

     <!-- Add Bonus-->
     <div class="offcanvas offcanvas-end "  id="bonus">
        <div class="offcanvas-header ">
          <h1 class="offcanvas-title mt-5 mb-3">New Income</h1>
        </div>
        <div class="offcanvas-body">

          <form action="connect2.php" method="post">
            <div class="form-floating mb-3">
              <select class="form-select" id="category" name="category" aria-label="Floating label select example">
                <option value="bonus">BONUS</option>
              </select>
              <label for="category">Category</label>
            </div>

            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="tag" name="tag" >
              <label for="tag">Name of Item</label>
            </div>
            <div class="form-floating">
              <input type="number" class="form-control" id="amount" min="0" step="0.01"  name="amount">
              <label for="amount">Price of Item</label>
            </div>

            <div class="btn-group-vertical float-end" style="width: 150px;">
              <button class="btn btn-primary btn-lg mt-5" type="submit" value="Submit">Add</button>
            </div>
          
            <div class="btn-group-vertical float-start" style="width: 150px;">
              <button class="btn btn-secondary btn-lg mt-5" type="button" data-bs-dismiss="offcanvas">Back</button>
            </div>
          </form>
        </div>
      </div>  

    <!-- Add Side Hustle-->
    <div class="offcanvas offcanvas-end "  id="side_hustle">
        <div class="offcanvas-header ">
          <h1 class="offcanvas-title mt-5 mb-3">New Income</h1>
        </div>
        <div class="offcanvas-body">

          <form action="connect2.php" method="post">
            <div class="form-floating mb-3">
              <select class="form-select" id="category" name="category" aria-label="Floating label select example">
                <option value="side_hustle">SIDE HUSTLE</option>
              </select>
              <label for="category">Category</label>
            </div>

            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="tag" name="tag" >
              <label for="tag">Name of Item</label>
            </div>
            <div class="form-floating">
              <input type="number" class="form-control" id="amount" min="0" step="0.01"  name="amount">
              <label for="amount">Price of Item</label>
            </div>

            <div class="btn-group-vertical float-end" style="width: 150px;">
              <button class="btn btn-primary btn-lg mt-5" type="submit" value="Submit">Add</button>
            </div>
          
            <div class="btn-group-vertical float-start" style="width: 150px;">
              <button class="btn btn-secondary btn-lg mt-5" type="button" data-bs-dismiss="offcanvas">Back</button>
            </div>
          </form>
        </div>
      </div>             

     <!-- Add Earned Interest-->
     <div class="offcanvas offcanvas-end "  id="earned_interest">
        <div class="offcanvas-header ">
          <h1 class="offcanvas-title mt-5 mb-3">New Income</h1>
        </div>
        <div class="offcanvas-body">

          <form action="connect2.php" method="post">
            <div class="form-floating mb-3">
              <select class="form-select" id="category" name="category" aria-label="Floating label select example">
                <option value="earned_interest">EARNED INTEREST</option>
              </select>
              <label for="category">Category</label>
            </div>

            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="tag" name="tag" >
              <label for="tag">Name of Item</label>
            </div>
            <div class="form-floating">
              <input type="number" class="form-control" id="amount" min="0" step="0.01"  name="amount">
              <label for="amount">Price of Item</label>
            </div>

            <div class="btn-group-vertical float-end" style="width: 150px;">
              <button class="btn btn-primary btn-lg mt-5" type="submit" value="Submit">Add</button>
            </div>
          
            <div class="btn-group-vertical float-start" style="width: 150px;">
              <button class="btn btn-secondary btn-lg mt-5" type="button" data-bs-dismiss="offcanvas">Back</button>
            </div>
          </form>
        </div>
      </div>  

     <!-- Add Investment Dividend-->
     <div class="offcanvas offcanvas-end "  id="investment_dividend">
        <div class="offcanvas-header ">
          <h1 class="offcanvas-title mt-5 mb-3">New Income</h1>
        </div>
        <div class="offcanvas-body">

          <form action="connect2.php" method="post">
            <div class="form-floating mb-3">
              <select class="form-select" id="category" name="category" aria-label="Floating label select example">
                <option value="investment_dividend">INVESTMENT DIVIDEND</option>
              </select>
              <label for="category">Category</label>
            </div>

            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="tag" name="tag" >
              <label for="tag">Name of Item</label>
            </div>
            <div class="form-floating">
              <input type="number" class="form-control" id="amount" min="0" step="0.01"  name="amount">
              <label for="amount">Price of Item</label>
            </div>

            <div class="btn-group-vertical float-end" style="width: 150px;">
              <button class="btn btn-primary btn-lg mt-5" type="submit" value="Submit">Add</button>
            </div>
          
            <div class="btn-group-vertical float-start" style="width: 150px;">
              <button class="btn btn-secondary btn-lg mt-5" type="button" data-bs-dismiss="offcanvas">Back</button>
            </div>
          </form>
        </div>
      </div>  


      <script src="js/app.js"></script>
      <script src="js/script.js"></script>
    <script type="text/javascript">
        var clockElement = document.getElementById('clock');

        function clock() {
            var date = new Date();

            // Replace '400px' below with where you want the format to change.
            if (window.matchMedia('(max-width: 400px)').matches) {
                // Use this format for windows with a width up to the value above.
                clockElement.textContent = date.toLocaleString();
            } else {
                // While this format will be used for larger windows.
                clockElement.textContent = date.toString();
            }
        }

        setInterval(clock, 1000);
    </script>


</body>
</html>