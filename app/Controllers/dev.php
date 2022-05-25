<?php 
include '../Config/database.php';

if(function_exists($_GET['function'])) {
    $_GET['function']();
}

function get_development()
{
    // if(isset($_POST["submit"]))
    // {
        global $koneksi;      
        $query = $koneksi->query("SELECT * FROM development");            
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
function get_development_id()
{        
        global $koneksi;
        if (!empty($_GET["id"]))
        {
            $id = $_GET["id"];      
        }            
        $query ="SELECT * FROM development WHERE id= $id";      
        $result = $koneksi->query($query);
        while($row = mysqli_fetch_object($result))
        {
            $data[] = $row;
        }            
        if($data)
        {
            $response = array(
                'status' => 1,
                'message' =>'Success',
                'data' => $data
            );               
        }else {
            $response=array(
            'status' => 0,
            'message' =>'No Data Found'
            );
        }

        header('Content-Type: application/json');
        echo json_encode($response);

}
function insert_development()
{
        global $koneksi;   
        $check = array('nama_task' => '', 'isi_task' => '', 'tipe_task' => '', 'nama_developer' => '');
        $check_match = count(array_intersect_key($_POST, $check));
        if($check_match == count($check))
        {
            $result = mysqli_query($koneksi, "INSERT INTO `development` SET
            `nama_task` = '$_POST[nama_task]',
            `tipe_task` = '$_POST[tipe_task]',
            `isi_task` = '$_POST[isi_task]',
            `nama_developer` = '$_POST[nama_developer]'");
            
            if($result)
            {
                // echo ("<script LANGUAGE='JavaScript'>
                // window.alert('Data Sukses Diupdate');
                // document.location.href='../../resources/views/Dev.php';
                // </script>");
                // Cek data melalui POSTMAN
                $response=array(
                    'status' => 1,
                    'message' =>'Insert Success'
                );
            }
            else
            {
                // echo ("<script LANGUAGE='JavaScript'>
                // window.alert('Insert Failed');
                // </script>");
                // cek di postman POSTMAN
                $response=array(
                    'status' => 0,
                    'message' =>'Insert Failed.'
                );
            }
        }else{
            // echo ("<script LANGUAGE='JavaScript'>
            //     window.alert('Paramater salah');
            //     </script>");
            // CEK di postman
            $response=array(
                'status' => 0,
                'message' =>'Wrong Parameter'
            );
        }
        // Header untuk jika cek di postman
        header('Content-Type: application/json');
        echo json_encode($response);
}
function updates($data)
{
    global $koneksi;
    $id = $data['id'];
    $nama = $data['nama_task'];
    $tipe = $data['tipe_task'];
    $developer = $data['nama_developer'];
    mysqli_query($koneksi, "UPDATE development SET
                    nama_task = '$nama',
                    tipe_task = '$tipe',
                    nama_developer = '$developer'
                    WHERE id = $id");
    return mysqli_affected_rows($koneksi);
}
function update_development()
{
    // if(isset($_POST['update'])){
        if (updates($_POST) > 0){
            // echo ("<script LANGUAGE='JavaScript'>
            //     window.alert('Data Sukses Diupdate');
            //     document.location.href='../../resources/views/Dev.php';
            //     </script>");
            // Cek data Di POSTMAN
            $response=array(
                'status' => 1,
                'message' =>'Update Success'                  
            );
        } else {
            // echo ("<script LANGUAGE='JavaScript'>
            //     window.alert('Gagal Update Data');
            //     document.location.href='../../resources/views/Dev.php';
            //     </script>");
                // Cek data Di POSTMAN
           $response=array(
                'status' => 0,
                'message' =>'Update Failed'                  
            );
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    // }
}
function delete_development()
{
    global $koneksi;
    // $id = $_POST['delete_id'];
    $id = $_POST['id'];
    $query = "DELETE FROM development WHERE id=".$id;
    if(mysqli_query($koneksi, $query))
    {
        $response=array(
        'status' => 1,
        'message' =>'Delete Success'
        );
    }
    else
    {
        $response=array(
        'status' => 0,
        'message' =>'Delete Fail.'
        );
    }
    header('Content-Type: application/json');
    echo json_encode($response);
}
?>