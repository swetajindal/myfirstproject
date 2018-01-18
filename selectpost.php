<?php
include 'includes/config.php';
include 'includes/header.php';
include 'includes/aside.php';

?>

<!--main content start-->
<section id="main-content">
	<section class="wrapper">
<?php 
$displayquery= 'select id,title from post';
$displayres = mysqli_query($conn,$displayquery);

$display= 'select setmenuid from menu_arrange';
$displayresult = mysqli_query($conn,$display);

//$checkbox=$_POST['checkbox'];

if(isset($_POST["btnsubmit"]))
{  
//print_r($menu=implode(",",$_POST['menu']));  
 
if(isset($_POST["menu"]))
{
  $menu=implode(",",$_POST['menu']); 
  
 echo $update="update menu_arrange set setmenuid='$menu'";
//$insert="insert into menu_arrange(setmenuid) values('$menu') ON DUPLICATE KEY UPDATE setmenuid=setmenuid+$menu";
$ex=mysqli_query($conn,$update);
if($ex != 0){

  echo "<script> alert('Updated')</script>";
  header("refresh:0; url=selectpost.php");
}
else{
  echo "Something Wrong";
}
}
else
{

echo "<script> alert(' There is no input')</script>";

}


}
?>



  
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
  SELECTED MENU
    </div>

    <div class="table-responsive">
       
      <table class="table table-striped b-t b-light">
        
          <tr>
         
            <th>Si No</th>
            <th>Menu Title</th>
            
          </tr>
        
<?php
if(mysqli_num_rows($displayresult)>0)
{
while($row=mysqli_fetch_array($displayresult))
{  
?>

<?php $menuset = explode(",", $row['setmenuid']) ;
$count=1;
    foreach ($menuset as $setmenu  ) {
      $query="select * from post where id='$setmenu'";
       $exe=mysqli_query($conn,$query);
       
       while ($resultmenu=mysqli_fetch_array($exe)) {
         echo "<tr> <td>" .  $count . "</td><td>" . $resultmenu['title'] . "</td></tr>";
       $count++;
     }
    }
?>



 <?php
}
}

?> 
      
      </table>
    </div>

     <div class="panel-heading">
  SELECT MENU
    </div>

    <div class="table-responsive"> 
       
<table class="table table-striped b-t b-light">
  <form action="" method="post">
<tr>

<th>Id</th>
<th>Post Title</th>
<th>Select for Menu</th>

</tr>

<?php
if(mysqli_num_rows($displayres)>0)
{
while($row=mysqli_fetch_array($displayres))
{  
?>
<tr>

<td><?php echo $row['id']; ?></td> 
<td><?php echo $row['title']; ?></td>
<td>

  <input type="checkbox" name="menu[]"   value="<?php echo $row['id']; ?>"></td>

</tr>
<?php
}
}
?>
<tr><td>
<input type="submit" name="btnsubmit" value="APPLY">
</td></tr>
</form>
</table>
    </div>

  </div>
</div>




</section>

<?php
include 'includes/footer.php';
?>





