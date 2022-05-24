<?php

include '../Config/database.php';
session_start();

if(function_exists($_GET['function'])) {
    $_GET['function']();
}

function get_users()
{
    // if(isset($_POST["submit"]))
    // {
        global $koneksi;      
        $query = $koneksi->query("SELECT * FROM users");            
        while($row=mysqli_fetch_object($query))
        {
            $data[] =$row;
        }
        $response=array(
            'status' => 1,
            'message' =>'Success',
            'data' => $data
        );
        header('Content-Type: application/json');
        echo json_encode($response);
    // }
    
} 
function insert_users()
{
        // json response array
    $response = array("error" => FALSE);
    
    
    if (isset($_POST['nama']) && isset($_POST['password']) && isset($_POST['email'])) {
    
        // menerima parameter POST ( nama, password, email )
        $nama = $_POST['nama'];
        $password = $_POST['password'];
        $email = $_POST['email'];
    
        //mengecek id apakah sudah pernah daftar atau belum
        if( cek_email($email) == 0 ){
        //mendaftarkan user baru
        $user = register_user($nama, $password, $email);
        if($user){
            // simpan user berhasil
            $response["error"] = FALSE;
            $response["user"]["nama"] = $user["nama"];
            $response["user"]["key"] = $user["unique_id"];
            echo json_encode($response);
        }else{
            // gagal menyimpan user
            $response["error"] = TRUE;
            $response["error_msg"] = "Terjadi kesalahan saat melakukan registrasi";
            echo json_encode($response);
        }
        }else{
        // user telah ada
        $response["error"] = TRUE;
        $response["error_msg"] = "Email telah ada ";
        echo json_encode($response);
        }
    }
}
function register_user($nama, $password, $email){
    global $koneksi;
        
    //mencegah sql injection
    $nama = escape($nama);
    $pass = escape($password);

    $hash = hashSSHA($pass); //mengencrypt password

    $salt = $hash["salt"]; //berisi kode string random yang nantinya digunakan saat proses decrypt pada proses validasi

    $encrypted_password = $hash["encrypted"]; //mengambil data password yang sudah di enkripsi untuk ditampung pada variabel encrypted_password

        
    $query = "INSERT INTO users(nama, password, unique_id, email) VALUES('$nama', '$encrypted_password', '$salt', '$email') ON DUPLICATE KEY UPDATE unique_id = '$salt'";

    $user_new = mysqli_query($koneksi, $query);
    if( $user_new ) {
        $usr = "SELECT * FROM users WHERE nama = '$nama'";
        $result = mysqli_query($koneksi, $usr);
        $user = mysqli_fetch_assoc($result);
        return $user;
    }else{
        return NULL;
    }
}
//-------------- *** end *** -------------------//
  
//---- mencegah sql injection -----//
function escape($data){
    global $koneksi;
    return mysqli_real_escape_string($koneksi, $data);
}
//----------- *** end *** ---------//
  
//--- mengecek nama apakah sudah terdaftar atau belum ---//
function cek_email($email){
    global $koneksi;
    $query = "SELECT * FROM users WHERE email = '$email'";
    if( $result = mysqli_query($koneksi, $query) ) return mysqli_num_rows($result);
}
//---------------- *** end ***-------------------------//
  
//------------ mengenkripsi password ----------------//
function hashSSHA($password) {
    $salt = sha1(rand());
    $salt = substr($salt, 0, 10);
    $encrypted = base64_encode(sha1($password . $salt, true) . $salt);
    $hash = array("salt" => $salt, "encrypted" => $encrypted);
    return $hash;
}
//------------ *** end *** -------------------------//
  
// -------- mengenkripsi password yang dimasukkan user saat login -->
function checkhashSSHA($salt, $password) {
 
    $hash = base64_encode(sha1($password . $salt, true) . $salt);
 
    return $hash;
}
//------------ *** end *** -------------------------//
//----------------- cek data user dan validasi------------------//
function cek_data_user($email,$password){
    global $koneksi;
    //mencegah sql injection
    $email = escape($email);
    $password = escape($password);
     
    $query  = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($koneksi, $query);
    $data = mysqli_fetch_assoc($result);
     
    $unique_id = $data['unique_id'];
    $encrypted_password = $data['password'];
    // mengencrypt password
    $hash = checkhashSSHA($unique_id, $password);
    //validasi password
    if($encrypted_password == $hash){
        return $data;
    }else{
        return false;
    }
}
//------------ *** Login User *** -------------------------//
function login_users()
{
    if (isset($_POST['email']) && isset($_POST['password'])) {
     
    //menampung parameter ke dalam variabel
    $email  = $_POST['email'];
    $password = $_POST['password'];
      
    $user = cek_data_user($email,$password);//validasi user
    if($user != false){
        //jika berhasil login
        $response["error"] = FALSE;
        $response["user"]["email"] = $user["email"];
        $response["user"]["user_key"] = $user["unique_id"];
        echo json_encode($response);
    }else{
        // user tidak ditemukan password/email salah
        $response["error"] = TRUE;
        $response["error_msg"] = "Login gagal. Email atau Password salah";
        echo json_encode($response);
    }
 
    }else{
        $response["error"] = TRUE;
        $response["error_msg"] = "Email atau Password tidak boleh kosong !";
        echo json_encode($response);
    }

}
?>