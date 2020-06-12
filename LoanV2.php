<html>  
<head>
  <link rel="stylesheet" href="SellBook.css">
</head>
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
<?php


$IDLoans=$_POST["IDLoan"];
$Number=$_POST["NumberLoan"];
$StartDate=$_POST["Start"];
$EndDate=$_POST["End"];
$QUANTITY=$_POST["quantity"];
$Check=false;
$Check2=true;
$conn=mysqli_connect('localhost','root','','BookLibary');
$QueryCheck="Select ID from Book;";
  $QueryCheckRow =mysqli_query($conn,$QueryCheck);
    while($col=mysqli_fetch_row($QueryCheckRow))
    {
        if($IDLoans==$col[0])
        {
            $Check=true;
        }
    }
    if($Check)
    {
        $QueryCheck2="Select Stock from Book where ID='$IDLoans';";
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
         $QueryUpdate="Update Book set Stock=Stock-'$QUANTITY' where ID='$IDLoans';";
$Result1=mysqli_query($conn,$QueryUpdate);
    echo "<div class='h1Header'><h2>Loaned books</h2><br></div>";
        $date = date('Y-m-d H:i:s');
  $Query1="insert into Loan values('$IDLoans','$Number','$StartDate','$EndDate')";
            $Result50=mysqli_query($conn,$Query1);

        $Query22="Select * from Loan;";
    $Result21=mysqli_query($conn,$Query22);
    echo "<table border ='1' id='customers' ><tr><th>ID </th><th>Borrwer Number</th><th>StartDate</th><th>EndDate</th></tr>";
    while($row=mysqli_fetch_row($Result21))
    {
        echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td></tr>";	

    }
    echo"</table>";
    
    echo "<div class='h1Header'><h2>List of Availabe books for Loan</h2><br></div>";
     
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