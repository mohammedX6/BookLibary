<html>
    <head>
    
    <style>
#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
    
}
        .h1Header
{
    font-family:Georgia,serif;
 color:#4E443C;
    text-align: center;
 font-variant: small-caps; text-transform: none; font-weight: 100; margin-bottom: 0;
}
    .h2Header
{
    font-family:Georgia,serif;
 color:#4E443C;
    text-align: left;
 font-variant: small-caps; text-transform: none; font-weight: 100; margin-bottom: 0;
}
   
</style>
    </head>
<?php

$ID=$_POST["IDSell"];
$Number=$_POST["NumberSell"];
$QUANTITY=$_POST["quantity"];
$Check=false;
$Check2=true;
$conn=mysqli_connect('localhost','root','','BookLibary');
$QueryCheck="Select ID from Book;";
  $QueryCheckRow =mysqli_query($conn,$QueryCheck);
    while($col=mysqli_fetch_row($QueryCheckRow))
    {
        if($ID==$col[0])
        {
            $Check=true;
        }
    }
    if($Check)
    {
        $QueryCheck2="Select Stock from Book where ID='$ID';";
  $QueryCheckRow2 =mysqli_query($conn,$QueryCheck2);
    while($col=mysqli_fetch_row($QueryCheckRow2))
    {
        if($col[0]==0)
        {
            $Check2=false;
        }
    }
        
        if($Check2)
        {
         $QueryUpdate="Update Book set Stock=Stock-'$QUANTITY' where ID='$ID';";
$Result1=mysqli_query($conn,$QueryUpdate);
             echo "<div class='h1Header'><h2>Sold books</h2><br></div>";
        $date = date('Y-m-d H:i:s');
  $Query1="insert into soldbooks values('$ID','$Number','$date')";
            $Result50=mysqli_query($conn,$Query1);

        $Query22="Select * from soldbooks;";
    $Result21=mysqli_query($conn,$Query22);
    echo "<table border ='1' id='customers' ><tr><th>ID </th><th>Borrower Number</th><th>Time of sale</th></tr>";
    while($row=mysqli_fetch_row($Result21))
    {
        echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td></tr>";	

    }
    echo"</table>";
    
    echo "<div class='h1Header'><h2>List of Availabe books</h2><br></div>";
     
  $Query1="Select * from Book;";
    $Result5=mysqli_query($conn,$Query1);
    echo "<table border ='1' id='customers' ><tr><th>ID </th><th>Title</th><th>Publisher</th><th>Edition</th><th>Price</th><th>Stock</th></tr>";
    while($row=mysqli_fetch_row($Result5))
    {
        echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td>$row[5]</td></tr>";	

    }
    echo"</table>";
    }
      else
      {
            echo '<script language="javascript">';
      echo 'alert("Soory out of stock :(")';
        echo '</script>';
    }
    }
    else
    {
        echo '<script language="javascript">';
        echo 'alert("Soory Book not found :(")';
        echo '</script>';
    }
   


   

?>
</html>