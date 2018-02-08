<?php
include("inc/session.php");
//SETTING THE ORDERID VARIABLE
	$sql="SELECT orderId FROM stockorder ORDER BY orderId DESC LIMIT 1 ";
	$result=mysqli_query($conn, $sql);
	$orderId;
	if($row=mysqli_fetch_array($result)){
	$orderId=++$row[0];
	}else{
		$orderId='O001'; 
	}
	//INSERT RECORD INTO DATABASE
	$sql="INSERT INTO stockorder (orderId,managerId,supplierId)
	VALUES
	('$orderId','$manager[id]','$_POST[supplierName]')";
	if (mysqli_query($conn,$sql)){ 
		foreach($_POST['bookid'] as $id => $value ){
            if($value>0) {
                $sql2 = "INSERT INTO stockorderinfo (orderId, bookId,orderQuantity)
                VALUES
                ('$orderId','$id','$value')";
                if(mysqli_query($conn, $sql2)) {
                    echo '<script type="text/javascript">
                    alert("We will look into it soon");
                    window.location.replace("bookRequest.php"); 					
                    </script>';
                }
            }
        }

	
	}
	else{
	die('Error: ' . mysqli_error($conn));   
	mysqli_close($conn);
				}
