<?php

	header("Content-Type: application/json; charset=UTF-8");
	header("Access-Control-Allow-Methods: POST");

if($_SERVER['REQUEST_METHOD']=='POST') {

	$bid = $_POST['bid'];
	$bnama = $_POST['bnama'];
	$bsatuan = $_POST['bsatuan'];
	$bharga_jual = $_POST['bharga_jual'];
	$bharga_jual_grosir = $_POST['bharga_jual_grosir'];
	$bstok = $_POST['bstok'];
	
	$sql = "INSERT INTO barang (bid,bnama,bsatuan,bharga_jual,bharga_jual_grosir,bstok) VALUES ('$bid','$bnama','$bsatuan','$bharga_jual','$bharga_jual_grosir','$bstok')";

	require_once('connect.php');

	if(mysqli_query($conn,$sql)){
		echo 'Barang Berhasil dimasukkan!';
	}else{
		echo 'Barang Gagal dimasukkan!';
	}

	mysqli_close($conn);
}

// require_once('connect.php');$bid = $_POST['bid'];

// $bnama = $_POST['bnama'];
// $bsatuan = $_POST['bsatuan'];
// $bharga_pokok = $_POST['bharga_pokok'];
// $bharga_jual = $_POST['bharga_jual'];
// $bstok = $_POST['bstok'];

// 	if(!$bid || !$bnama || !$bsatuan || !$bharga_pokok || !$bharga_jual || !$bstok){

//   		echo json_encode(array('message'=>'required field is empty.'));
	
// 	}else{
// 		$query = mysqli_query($conn, "INSERT INTO barang VALUES ('$bid','$bnama','$bsatuan','$bharga_pokok','$bharga_jual','$bstok')");
// 		if($query){
// 			echo json_encode(array('message'=>'barang data successfully added.'));
//   }else{
//     echo json_encode(array('message'=>'barang data failed to add.'));
//   }
// }

?>











	// include "connect.php";
	
	// $bid 	= $_POST['bid'];
    // $bnama = $_POST['bnama'];
    // $bsatuan = $_POST['bsatuan'];
	// $bharga_pokok = $_POST['bharga_pokok'];
	// $bharga_jual = $_POST['bharga_jual'];
	// $bstok = $_POST['bstok'];
	
	// class emp{}
	
    // if (empty($bid) || empty($bnama) || empty($bsatuan) || empty($bharga_pokok) || empty($bharga_jual) || empty($bstok)) { 
	// 	$response = new emp();
	// 	$response->success = 0;
	// 	$response->message = "Kolom isian tidak boleh kosong"; 
	// 	die(json_encode($response));
	// } else {
	// 	$query = mysql_query("INSERT INTO barang (bid,bnama,bsatuan,bharga_pokok,bharga_jual,bstok) VALUES('".$bid."','".$bnama."','".$bsatuan."','".$bharga_pokok."','".$bharga_jual."','".$bstok."')");
		
	// 	if ($query) {
	// 		$response = new emp();
	// 		$response->success = 1;
	// 		$response->message = "Data berhasil di simpan";
	// 		die(json_encode($response));
	// 	} else{ 
	// 		$response = new emp();
	// 		$response->success = 0;
	// 		$response->message = "Error simpan Data";
	// 		die(json_encode($response)); 
	// 	}	
	// }



// 	require_once('connect.php');
	
// 	$sql = "SELECT * FROM barang";
	
// 	$r = mysqli_query($conn,$sql);
	
// 	$result = array();

// 	while($row = mysqli_fetch_array($r))
// 	{
// 		array_push($result,array("bid"=>$row['bid'],"bnama"=>$row['bnama']));
// 	}
	
// 	echo json_encode(array('result'=>$result));
	
// 	mysqli_close($conn);
// }

//     $response = array();
//     //mendapatkan data
//     $bid = $_POST['bid'];
//     $bnama = $_POST['bnama'];
//     $bsatuan = $_POST['bsatuan'];
//     $bharga_pokok = $_POST['bharga_pokok'];
//     $bharga_jual = $_POST['bharga_jual'];
//     $bstok = $_POST['bstok'];
 
//     require_once('connect.php');
    
//     $sql = "SELECT * FROM barang WHERE bid ='$bid'";
//     $check = mysqli_fetch_array(mysqli_query($con,$sql));

//     if(isset($check)){
//       $response["value"] = 0;
//       $response["message"] = "oops! ID sudah terdaftar!";
//       echo json_encode($response);

//     } else {
//       $sql = "INSERT INTO barang (bid,bnama,bsatuan,bharga_pokok,bharga_jual,bstok) 
//       VALUES('$bid','$bnama','$bsatuan','$bharga_pokok','$bharga_jual','$bstok')";

//       if(mysqli_query($con,$sql)) {
//         $response["value"] = 1;
//         $response["message"] = "Sukses menambahkan";
//         echo json_encode($response);

//       } else {
//         $response["value"] = 0;
//         $response["message"] = "oops! Belum ke input!";
//         echo json_encode($response);
//       }
//     }
    
//     // tutup database
//     mysqli_close($con);
//     } else {
//     $response["value"] = 0;
//     $response["message"] = "oops! Coba lagi deh!";
//     echo json_encode($response);
//  }