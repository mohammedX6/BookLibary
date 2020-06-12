<?php
$Number=$_POST["num"];
$Name=$_POST["name"];
$Phone=$_POST["phone"];
$BirthDate=$_POST["Bdate"];
$OperationType=$_POST['op'];
$Check=true;

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
if($OperationType=="Register")
{
    $QueryCheck="Select BorrowerNumber from borrower;";
  $QueryCheckRow =mysqli_query($conn,$QueryCheck);
    while($col=mysqli_fetch_row($QueryCheckRow))
    {
        if($Number==$col[0])
        {
            $Check=false;
        }
    }
    if($Check)
    {
    $Query1="Insert into borrower values('$Number','$Name','$Phone','$BirthDate');";
    $Result1=mysqli_query($conn,$Query1);
    }
    else
    {
        echo '<script language="javascript">';
        echo 'alert("Duplicate Number")';
        echo '</script>';
    }
}
if($OperationType=="DELETE")
{
     $QueryCheck="Select BorrowerNumber from borrower;";
  $QueryCheckRow =mysqli_query($conn,$QueryCheck);
    while($col=mysqli_fetch_row($QueryCheckRow))
    {
        if($Number==$col[0])
        {
            $Check=false;
        }
    }
    if(!$Check)
    {
        $QueryDelete="Delete from borrower where BorrowerNumber='$Number';";
        $ResultDelete=mysqli_query($conn,$QueryDelete);
         echo '<script language="javascript">';
        echo 'alert("Row Deleted")';
        echo '</script>';
    }
    else
    {
         echo '<script language="javascript">';
        echo 'alert("Borrower not found to delete")';
        echo '</script>';
    }
    
}













?>