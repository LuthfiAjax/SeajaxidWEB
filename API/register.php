<?php 
include "connection.php";
header('Content-Type: application/json');

    if($_POST){

    //POST DATA
    $nama_cust = $_POST['nama_cust'];
    $username = $_POST['username'];
    $email_cust = $_POST['email_cust'];
    $no_cust = $_POST['no_cust'];
    $password = $_POST['password'];
    $alamat_cust = $_POST['alamat_cust'];
    
    $response = [];

    //Cek username didalam databse
    $userQuery = $connection->prepare("SELECT * FROM customer where username = ?");
    $userQuery->execute(array($username));

    // Cek username apakah ada tau tidak
    if($userQuery->rowCount() !=0 ){
        // Beri Response
        $response['status']= false;
        $response['message']='Akun sudah digunakan';
    } else {
        $insertAccount = 'INSERT INTO customer (username, password, nama_cust, email_cust, no_cust, alamat_cust) VALUES (:username, :password, :nama_cust, :email_cust, :no_cust, :alamat_cust)';
        $statement = $connection->prepare($insertAccount);

        try{
            //Eksekusi statement db
            $statement->execute([
                ':username' => $username,
                ':password' => $password,
                ':nama_cust' => $nama_cust,
                ':email_cust' => $email_cust,
                ':no_cust' => $no_cust,
                ':alamat_cust' => $alamat_cust
            ]);

            //Beri response
            $response['status']= true;
            $response['message']='Akun berhasil didaftar';
            $response['data'] = [
                'username' => $username,
                'nama_cust' => $nama_cust,
                'email_cust' => $nama_cust,
                'no_cust' => $nama_cust,
                'alamat_cust' => $alamat_cust
            ];
        } catch (Exception $e){
            die($e->getMessage());
        }

    }
    
    //Jadikan data JSON
    $json = json_encode($response, JSON_PRETTY_PRINT);

    //Print JSON
    echo $json;
}

?>