
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

    <?php
    session_start();
    ?>
</head>

<body>



      <?php
      if(isset($_SESSION['status']))
      {
        ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert" position-absolute top-50 start-50 translate-middle>
              <h1 class="fs-1">Please fill in BOTH boxes before submitting!</h1> 
              <?php echo $_SESSION['status']; ?>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php
        unset($_SESSION['status']);
      }
        ?>              

     
            <div class="btn-group-vertical float-end " style="width: 150px;">
                <button class="btn btn-success position-absolute top-50 start-0" type="button" >
                <a href="index.php"><i class="bi bi-arrow-left-square-fill fa-2x"></i></a>
                </button>
            </div>


      
    

</body>
</html>




      
