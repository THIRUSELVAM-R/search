<?php

if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `altitude` WHERE CONCAT(`operation_id`) LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    
}
 else {
    $query = "SELECT * FROM `altitude`";
    $search_result = filterTable($query);
}

// function to connect and execute the query
function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "", "drone");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>PHP HTML TABLE DATA SEARCH</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <style type="text/css">
            form
            {
                margin-left: 500px;
                margin-top: 20px;
            }
        </style>
    </head>
    <body>
        
        <form action="php_html_table_data_filter.php" method="post">
            <input type="text" name="valueToSearch" placeholder="Enter the date"><br><br>
            <input type="submit" name="search" value="Filter" style="background-color:green;color: white;border-radius: 5px;"><br><br>
        </form> 
            <div class="container" style="background-color: white;">
           <table class="table table-bordered  table-striped">
           <thead>
          <tr>
           <th>Height</th>
           <th>timer</th>
           <th>operation Id</th>
           </tr>
       </thead>
           <tbody>
                <?php while($row = mysqli_fetch_array($search_result)):?>
                <tr>
                 <td><?php echo $row['height']?></td>
                 <td><?php echo $row['timer']?></td>
                 <td><?php echo $row['operation_id']?></td>
                </tr>  
               <?php endwhile;?>
           </tbody>
         </table>
     </div>   
    </body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Export data to excel in PHP</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <style type="text/css">
      .btn{
      float:right;
      color: white;
      background-color: green;
      margin-bottom: 20px;
      margin-top: 20px;
      margin-right: 45%;
      padding: 10px;
}
  </style>
</head>
<body>
<div class="container" style="background-color: white;">
  <a href="export.php"><button type="button" class="btn btn-primary";>Export</button></a>
</div>
</body>
</html>