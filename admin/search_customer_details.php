<?php require_once "./adminProcess.php";?>
<!DOCTYPE html>
<html>
  <head>
    <title>Threshold | Search</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!--bootstrap-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <style>
      table {
        text-align: center;
        margin-top: 135px;
        margin-left: auto;
        margin-right: auto;
      }

      thead {
        background-color: black;
        color: white;
      }

      th {
        text-align: center;
      }

      tbody {
        background: white;
        color: black;
      }

      body {
        background-color: #ECE5DD;
        overflow: hidden;
      }

      center img{
      max-width:50%;
      max-height: 30%;
      height:auto;
      }

     footer {
      background-color: #D0C6BA;
      text-align: center;
      font-family: Tahoma;
      float: bottom;
      position: fixed;
      bottom: 0;
      left: 0;
      right: 0;
      padding: 10px;
     }

      .search {
        display: flex;   
        margin-top: 410px; 
        align-content: center;    
      }

      .searchTerm {
        border: 3px solid #807E7D;
        border-right: none;
        padding: 5px;
        height: 40px;
        width:  0px;
        border-radius: 5px 0 0 5px;
        outline: none;
        background-color: black;
        color: white;
        transition:  0.4s;
      }

      .search:hover > .searchTerm {
        width: 240px;
        height:  40px;
        padding: 0 6px;
      }
      .search:hover > .searchButton {
        background: #807E7D;
        color: white;
        height: 40px;
      }
     
      .searchButton {
        height: 40px;
        border: 1px solid #807E7D;
        background: #807E7D;
        text-align: center;
        color: #eeeeee;
        border-radius: 0 5px 5px 0;
        cursor: pointer;
        font-size: 20px;
        transition:  0.4s;
      }

       #title {
          font-size: 21px;
        }

      .wrap {
        position: absolute;
        top: 20%;
        left: 50%;
        transform: translate(-50%, -50%);
        display:  flex;
        justify-content:  space-between;
      }

      ::placeholder {
        color: white;
        opacity: 0.6;
        font-size: 13px;
      }

      .dropbtn {
        background-color: black;
        color: white;
        padding: 16px;
        font-size: 16px;
        border: none;
    }

    .dropdown {
        position: relative;
        bottom: 5px;
        right: 20px;
        display: inline-block;    
    }

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f1f1f1;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
    }

    .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }

    .dropdown-content a:hover {
        background-color: white;
    }

    .dropdown:hover .dropdown-content {
        display: block;
    }

    .dropdown:hover .dropbtn {
        background-color: grey;
    }

    @media only screen and (max-width: 700px) {
        .search{
          margin-bottom: 110px;
        }

    }

    @media only screen and (min-width: 700px) {
        .search{
          margin-bottom: 70px;
        }
    }

    @media only screen and (max-width: 600px) {
        .search{
          margin-bottom: 250px;
        }
    }

    @media only screen and (max-width: 400px) {
        .search{
          margin-bottom: 300px;
        }
    }

    @media only screen and (max-width: 486px) {
        .dropbtn {
          font-size: 8px;
        }
        #title{
          font-size: 12px;
        }
    }
    
  </style>
  </head>
  <body>
    <center><img src="../image/logo.png"></center>

      <div style="padding: 2%; background-color:#807E7D;">
        <div style="height:45px;">
          <b id="title">SEARCH CUSTOMER DETAILS</b>

          <div class="dropdown" style="float: right;">

            <button class="dropbtn"><i class="fa fa-user-circle" aria-hidden="true">&nbsp&nbsp<?php echo $_SESSION['admin_name'];?></i></button>

            <div class="dropdown-content">

              <a href="./admin.php"><i  class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></i> product list</a>

              <a href="./upd_and_add.php"><i class="fa fa-plus-square" aria-hidden="true"></i> add product</a>
          
              <a href="../server/logoutProcess.php"><i class="fa fa-sign-out" aria-hidden="true"></i> log out</a>

            </div>
          </div>
        </div>
      </div>

    <form action="" method="POST">
      <div class="wrap">
        <div class="search">
          <input type="text" class="searchTerm" name="details" placeholder="Enter customer's name or ID">
          <button type="submit" name="search" class="searchButton">
          <i class="fa fa-search"></i>
          </button>
        </div>
      </div>
    </form>

      <div class ="container" style="overflow-x:auto;">
        <table class="table table-striped table-bordered table-hover" style="max-width:50%;">
          <thead>
            <th>Username</th>
            <th>Full Name</th>
            <th>ID</th>
            <th>H/P Number</th>
            <th>Email</th>
          </thead>
          <tbody>
            <?php 
              if(!isset($_POST['details']))
              {
                  $sql = "SELECT * FROM customer";
                  $result = mysqli_query($conn, $sql);
                  if(mysqli_num_rows($result) > 0)
                  {
                    while($row = mysqli_fetch_assoc($result))
                    {
                      echo "<tr><td>".$row["Customer_Name"]."</td><td>".$row["Customer_FullName"]."</td><td>".$row["Customer_Id"]."</td><td>0".$row["Customer_Phone"]."</td><td>".$row["Customer_Email"]."</td></tr>";
                    }
                  }
                  else
                  {
                      echo "<tr><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td></tr>";
                  }
              }
              else
              {
                if(isset($_POST['details']))
                {
                  $detail = $_POST['details'];
                  $sql = "SELECT * FROM customer WHERE Customer_Name = '$detail' OR Customer_FullName = '$detail' OR Customer_Id = '$detail'";
                  $result = mysqli_query($conn, $sql);
                  if(mysqli_num_rows($result) > 0)
                  {
                    while($row = mysqli_fetch_assoc($result))
                    {
                      echo "<tr><td>".$row["Customer_Name"]."</td><td>".$row["Customer_FullName"]."</td><td>".$row["Customer_Id"]."</td><td>0".$row["Customer_Phone"]."</td><td>".$row["Customer_Email"]."</td></tr>";
                    }
                  }
                  else
                  {
                      echo "<tr><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td></tr>";
                  }
                }
              }
            ?>
          </tbody>
        </table>
      </div>
      <footer><b>Copyright @Threshold Food</b></footer>
  </body>
</html>