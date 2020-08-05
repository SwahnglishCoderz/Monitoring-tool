<?php  
$connect = mysqli_connect("localhost", "root", "", "ci_db");
$sql = "SELECT center_id, center_name from centers";
$result = mysqli_query($connect,$sql);
$center_info = '<option value="">None </option>';
if(mysqli_num_rows($result)>0)
{
    while($rows=mysqli_fetch_assoc($result))
    {
        $center_id=$rows['center_id'];
        $center_name=$rows['center_name'];
        $center_info .="<option value=$center_id> $center_name </option>";
    }
}

$sql = "SELECT cluster_id, cluster_name from clusters";
$result = mysqli_query($connect,$sql);
$cluster_info = '<option value="">None </option>';
if(mysqli_num_rows($result)>0)
{
    while($rows=mysqli_fetch_assoc($result))
    {
        $cluster_id=$rows['cluster_id'];
        $cluster_name=$rows['cluster_name'];
        $cluster_info .="<option value=$cluster_id> $cluster_name </option>";
    }
}

$sql = "SELECT base_id, base_name from bases";
$result = mysqli_query($connect,$sql);
$base_info = '<option value="">None </option>';
if(mysqli_num_rows($result)>0)
{
    while($rows=mysqli_fetch_assoc($result))
    {
        $base_id=$rows['base_id'];
        $base_name=$rows['base_name'];
        $base_info .="<option value=$base_id> $base_name </option>";
    }
}

if(isset($_POST["submit"]))
    
{
    
 if($_FILES['file']['name'])
 {
  $filename = explode(".", $_FILES['file']['name']);
  if($filename[1] == 'csv')
  {
   $handle = fopen($_FILES['file']['tmp_name'], "r");
   while($data = fgetcsv($handle))
   {
    $application = mysqli_real_escape_string($connect, $data[0]);  
    $user_name = mysqli_real_escape_string($connect, $data[1]);
    $start_time = mysqli_real_escape_string($connect, $data[2]);
    $end_time = mysqli_real_escape_string($connect, $data[3]);
    $Total_system_hours = mysqli_real_escape_string($connect, $data[4]);
    $clusters_cluster_id = mysqli_real_escape_string($connect, $_POST["cluster_id"]);
    $centers_center_id = mysqli_real_escape_string($connect, $_POST["center_id"]);;
    $bases_base_id = mysqli_real_escape_string($connect, $_POST["base_id"]);
                $query = "INSERT into monitored_info"
                        . "(user_name, application, start_time, end_time,Total_system_hours,clusters_cluster_id,centers_center_id,bases_base_id) "
                        . "values('$user_name','$application','$start_time','$end_time','$Total_system_hours','$cluster_id','$center_id','$base_id')";
                mysqli_query($connect, $query);
   }
   fclose($handle);
   echo "<script>alert('Import done');</script>";
  }
 }
}
?>  
<!DOCTYPE html>  
<html>  
 <head>  
  <title>CSV</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        
 </head>  
 <body>  
     
     <div class="details">
         <img src="avatar.png" class="avatar">
  <h2 align="center">Please fill the Information Below</h2><br />
  <form method="post" enctype="multipart/form-data"action="Report1General.php">
        
       <h2><bold><label>Cluster Name</label>
               <select name="cluster_id" value="<?php echo $cluster_id?>">
           <?php  echo $cluster_info;?>
                   
       </select></bold></h2>
       <br>
       </br>
         
      
    <h2><bold><input type="submit" name="submit" value="Generate Report" class="btn btn-info" /><h2></bold>
   </div>
       
  </form>
  
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
 </body>  
</html>





