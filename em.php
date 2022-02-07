<html>
<head>
    
<style>
body {background-color: tomato;
  font-family: verdana;
  
}

  </style>
</head>
<body>

    
<form name="f1" method="POST">
    <h3 align="center"><u>EMPLOYEE DETAILS</u></h3>
  <table align="center">
<tr>
  <td>Employee ID:</td>
  <td><input type="number" name="emid" value=""/></td>
</tr>
<tr>
<td>Employee Name:</td>
<td><input type="text" name="emp" value=""></td>
</tr>
<tr>
<td>Job name:</td>
<td><input type="text" name="jname" value=""></td>
</tr>
<tr>
<td>Manager ID:</td>
<td><input type="number" name="mid" value=""></td>
</tr>
<tr>
<td>Salary:</td>
<td><input type="number" name="salary" value=""></td>
</tr>
<tr>
<td><input type="submit" name="submit"></td>
</tr>
</table>
</form>

<?php
if(isset($_POST['submit']))                                      
{
    $empid=$_POST['emid'];                                       
    $empname=$_POST['emp'];
    $jname=$_POST['jname'];
    $mid=$_POST['mid'];
    $salary=$_POST['salary'];
    $conn=mysqli_connect("localhost","root","","employee");      
    if($conn)                                                   
    {
        echo("Successfully connected");
        echo "<br>";
    }
    else
    {
        echo("connection error");
    }
    $query="INSERT INTO emp_table(ID,Name,Jobname,Managerid,Salary)VALUES('{$empid}','{$empname}','{$jname}','{$mid}','{$salary}')";     
  
if(mysqli_query($conn,$query))              
{
    echo("successfully inserted");
    echo "<br>";
}
else
{
    echo("insertion failed");
}
?>
    <h2>Employees with salary greater than 35000</h2>
<table border="1">
<tr>
<th> Name</th>
<th>Salary</th>
</tr>
<?php
$s="SELECT Name,Salary FROM emp_table WHERE Salary>35000";                        
$data=mysqli_query($conn,$s);
while($res=mysqli_fetch_assoc($data))                  
{
    ?>
   <tr>
    <td><?php echo $res['Name'];?></td>
    <td><?php echo $res['Salary'];?></td>
</tr>
<?php

}
}
?>
</table>
</body>
</html>
