
<?php 
	require_once('../admin/conn/koneksi.php');
    header('Content-Type: application/json');
    parse_str(file_get_contents('php://input'),$value);

    if (isset($value['id_cust'])){

        $id_cust  = $value['id_cust'];
        $username  = $value['username'];
        $password  = $value['password'];
        $nama_cust = $value['nama_cust'];
		$email_cust = $value['email_cust'];
		$no_cust = $value['no_cust'];
		$alamat_cust = $value['alamat_cust'];

        $sql=$koneksi->prepare("UPDATE customer SET username=?, password=?, nama_cust=?, email_cust=?, no_cust=?,  alamat_cust=? WHERE id_cust = ?");
        $sql->bind_param('ssssssd', $username, $password, $nama_cust, $email_cust, $no_cust, $alamat_cust, $id_cust);
        $sql->execute();

        if ($sql) {
            echo json_encode(array(
                'RESPONSE' => 'SUCCES'
            ));
        }else{
            echo json_encode(array(
                'RESPONSE' => 'FAILED'
            ));
        }
    }

