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
   
</style>
</head>

<?php
$ID=$_POST["id"];
$TITLE=$_POST["title"];
$PUBLISHER=$_POST["publisher"];
$EDITION=$_POST["edition"];
$PRICE=$_POST["price"];
$STOCK=$_POST["stock"];
$OperationType=$_POST['op'];
$Check=true;
$Check2=true;
$found=false;
$conn=mysqli_connect('localhost','root','','BookLibary');
if($conn)
{
 echo '<script language="javascript">';
echo 'alert("Connection Success")';
echo '</script>';
}
else
{
echo '<script language="javascript">';
echo 'alert("Failed")';
echo '</script>';
}

if($OperationType=="Add")
{
    $QueryCheck="Select ID from Book;";
  $QueryCheckRow =mysqli_query($conn,$QueryCheck);
    while($col=mysqli_fetch_row($QueryCheckRow))
    {
        if($ID==$col[0])
        {
            $Check=false;
        }
    }
    if($Check)
    {
    $Query1="Insert into Book values('$ID','$TITLE','$PUBLISHER','$EDITION','$PRICE','$STOCK');";
    $Result1=mysqli_query($conn,$Query1);
    }
    else
    {
        echo '<script language="javascript">';
        echo 'alert("Duplicate ID")';
        echo '</script>';
    }
}
if($OperationType=="DELETE")
{
     $QueryCheck="Select ID from Book;";
  $QueryCheckRow =mysqli_query($conn,$QueryCheck);
    while($col=mysqli_fetch_row($QueryCheckRow))
    {
        if($ID==$col[0])
        {
            $Check=false;
        }
    }
    if(!$Check)
    {
        $QueryDelete="Delete from Book where ID='$ID';";
        $ResultDelete=mysqli_query($conn,$QueryDelete);
         echo '<script language="javascript">';
        echo 'alert("Row Deleted")';
        echo '</script>';
    }
    else
    {
         echo '<script language="javascript">';
        echo 'alert("Book not found to delete")';
        echo '</script>';
    }
    
}
if($OperationType=="Update")
{
     $QueryCheck="Select ID from Book;";
  $QueryCheckRow =mysqli_query($conn,$QueryCheck);
    while($col=mysqli_fetch_row($QueryCheckRow))
    {
        if($ID==$col[0])
        {
            $Check=false;
        }
    }
    if(!$Check)
    {
    $Query2="Update Book set Title='$TITLE',Publisher='$PUBLISHER',Edition='$EDITION',Price='$PRICE',Stock='$STOCK' where ID='$ID';";
    $Result2=mysqli_query($conn,$Query2);
    }
    else
    {
         echo '<script language="javascript">';
        echo 'alert("ID not found")';
        echo '</script>';
    }
    
    
}
if($OperationType=="Search")
{
         $Query3="Select ID from Book where Title='$TITLE';";
  $QueryCheckRow =mysqli_query($conn, $Query3);
    while($col=mysqli_fetch_row($QueryCheckRow))
    {
        if($ID==null)
        {
        $Check2=false; 
        } 
    }
     
if(!$Check2)
{
     echo '<script language="javascript">';
        echo 'alert("Found !")';
        echo '</script>';
}
else
{
    echo '<script language="javascript">';
        echo 'alert("Not Found !")';
        echo '</script>';
}
}
if($OperationType=="DisplayALL")
{
    $Query5="Select * from Book;";
    $Result5=mysqli_query($conn,$Query5);
    echo "<table border ='1' id='customers' ><tr><th>ID </th><th>Title</th><th>Publisher</th><th>Edition</th><th>Price</th><th>Stock</th></tr>";
    while($row=mysqli_fetch_row($Result5))
    {
        echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td>$row[5]</td></tr>";	

    }
    echo "</table>";   
}
?>
</html>