<?php

$bid = $_GET['bid'];
	
	require_once('../connect.php');
	
	$sql = "SELECT * FROM barang WHERE bid=$bid";
	
	$r = mysqli_query($con,$sql);
	
	$result = array();

	$row = mysqli_fetch_array($r);
	
	array_push($result,array("bid"=>$row['bid'], 
							"bnama"=>$row['bnama'], 
							"bsatuan"=>$row['bsatuan'], 
                            "bharga_pokok"=>$row['bharga_pokok'],
                            "bharga_jual"=>$row['bharga_jual'],
                            "bharga_jual_grosir"=>$row['bharga_jual_grosir'],
                            "bstok"=>$row['bstok']));

	echo json_encode(array('result'=>$result));
	
	mysqli_close($con);

// require_once 'connect.php';

// $type = $_GET['item_type']; //untuk memeriksa data yang dikirim melalui GET
// // $type = "barang";
// if($type == barang){
        
//         $query = "SELECT * FROM barang";
//         $result = mysqli_query($conn, $query);

//         $response = array();

//         while($row = mysqli_fetch_assoc($result)){

//             array_push($response,
//             array(
//                 'bid'=>$row['bid'],
//                 'bnama'=>$row['bnama'],
//                 'bsatuan'=>$row['bsatuan'],
//                 'bharga_pokok'=>$row['bharga_pokok'],
//                 'bharga_jual'=>$row['bharga_jual'],
//                 'bharga_jual_grosir'=>$row['bharga_jual_grosir'],
//                 'bstok'=>$row['bstok'],
//                 'btgl_masuk'=>$row['btgl_masuk'],
//                 'bkategori_id'=>$row['bkategori_id']
//             ));
//         }

//         echo json_encode($response);
//     }

//     mysqli_close($conn);;
?>