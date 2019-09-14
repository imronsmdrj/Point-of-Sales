<?php 

if($_SERVER['REQUEST_METHOD']=='POST') {

    $response = array();
    //mendapatkan data
    $bid = $_POST['bid'];
    $bnama = $_POST['bnama'];
    $bsatuan = $_POST['bsatuan'];
    $bharga_pokok = $_POST['bharga_pokok'];
    $bharga_jual = $_POST['bharga_jual'];
    $bstok = $_POST['bstok'];
 
    require_once('connect.php');
    //Cek npm sudah terdaftar apa belum
    $sql = "SELECT * FROM barang WHERE bid ='$bid'";
    $check = mysqli_fetch_array(mysqli_query($con,$sql));

    if(isset($check)){
      $response["value"] = 0;
      $response["message"] = "oops! ID sudah terdaftar!";
      echo json_encode($response);

    } else {
      $sql = "INSERT INTO barang (bid,bnama,bsatuan,bharga_pokok,bharga_jual,bstok) 
      VALUES('$bid','$bnama','$bsatuan','$bharga_pokok','$bharga_jual','$bstok')";

      if(mysqli_query($con,$sql)) {
        $response["value"] = 1;
        $response["message"] = "Sukses menambahkan";
        echo json_encode($response);

      } else {
        $response["value"] = 0;
        $response["message"] = "oops! Coba lagi!";
        echo json_encode($response);
      }
    }
    
    // tutup database
    mysqli_close($con);
    } else {
    $response["value"] = 0;
    $response["message"] = "oops! Coba lagi!";
    echo json_encode($response);
 }








	// require_once('../connect.php');
	
	// $sql = "SELECT * FROM barang";
	
	// $r = mysqli_query($con,$sql);
	
	// $result = array();

	// while($row = mysqli_fetch_array($r))
	// {
	// 	array_push($result,array("bid"=>$row['bid'],"bnama"=>$row['bnama']));
	// }
	
	// echo json_encode(array('result'=>$result));
	
	// mysqli_close($con);
