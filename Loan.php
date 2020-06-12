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
</head>

<?php
$Check=true;
$conn=mysqli_connect('localhost','root','','BookLibary');
echo "<div class='h1Header'><h2>Available Books for loan</h2><br></div>";
  $Query1="Select * from Book;";
    $Result5=mysqli_query($conn,$Query1);
    echo "<table border ='1' id='customers' ><tr><th>ID </th><th>Title</th><th>Publisher</th><th>Edition</th><th>Price</th><th>Stock</th></tr>";
    while($row=mysqli_fetch_row($Result5))
    {
        echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td>$row[5]</td></tr>";	

    }
    echo"</table>";
        $query="select BorrowerNumber from borrower";
$Result6=mysqli_query($conn,$query);
    echo "<table border ='1' id='customers' ><tr><th>Borrower Number </th></tr>";
    while($row=mysqli_fetch_row($Result6))
    {
        echo "<tr><td>$row[0]</td></tr>";	

    }
    echo"</table>";
   echo" <br><div class='h2Header'><h2>Please select a book from the table to LOAN above by entering the book ID and number</h2><br></div>";
    ?>  
<div>
 <div class="form">
<div class='h1Header'><h2>Select one of the operations</h2><br></div>
<form class="Book-form" method="POST"  action="http://localhost/WepAppProject/LoanV2.php">
<input type="text" placeholder="Enter id" name="IDLoan"/>
<input type="text" placeholder="Enter Your Number" name="NumberLoan"/>
    <input type="text" placeholder="StartDate" name="Start"/>
<input type="text" placeholder="EndDate" name="End"/>
<input type="text" placeholder="Enter Quantity" name="quantity"/>
 <br>
<input type = "Submit" value = "Loan"> 
<input type = "reset" value = "Clear">    
</form>
</div>
</div>
</html>