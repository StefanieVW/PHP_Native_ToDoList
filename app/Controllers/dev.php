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
    // require_once '../Config/database.php';
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
        $check = array('nama_task' => '', 'tipe_task' => '', 'nama_developer' => '');
        $check_match = count(array_intersect_key($_POST, $check));
        if($check_match == count($check))
        {
            //`development` (`id`, `nama_task`, `tipe _task`, `nama_developer`)
            $result = mysqli_query($koneksi, "INSERT INTO `development` SET
            `nama_task` = '$_POST[nama_task]',
            `tipe_task` = '$_POST[tipe_task]',
            `nama_developer` = '$_POST[nama_developer]'");
            
            if($result)
            {
                $response=array(
                    'status' => 1,
                    'message' =>'Insert Success'
                );
            }
            else
            {
                $response=array(
                    'status' => 0,
                    'message' =>'Insert Failed.'
                );
            }
        }else{
        $response=array(
                    'status' => 0,
                    'message' =>'Wrong Parameter'
                );
        }
        header('Content-Type: application/json');
        echo json_encode($response);
}
function update_development()
    {
        global $koneksi;
        if (!empty($_GET["id"])) {
        $id = $_GET["id"];      
    }   
        $check = array('nama_task' => '', 'tipe_task' => '', 'nama_developer' => '');
        $check_match = count(array_intersect_key($_POST, $check));         
        if($check_match == count($check)){
        
            $result = mysqli_query($koneksi, "UPDATE `development` SET               
            `nama_task` = '$_POST[nama_task]',
            `tipe_task` = '$_POST[tipe_task]',
            `nama_developer` = '$_POST[nama_developer]' WHERE `id` = $id");
        
        if($result)
        {
            $response=array(
                'status' => 1,
                'message' =>'Update Success'                  
            );
        }
        else
        {
            $response=array(
                'status' => 0,
                'message' =>'Update Failed'                  
            );
        }
        }else{
        $response=array(
                    'status' => 0,
                    'message' =>'Wrong Parameter',
                    'data'=> $id
                );
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }
function delete_development()
{
    global $koneksi;
    $id = $_GET['id'];
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
// if(isset($_POST["adTask"])) {
//     $task = mysqli_real_escape_string($koneksi, $_POST["nama_task"]);
//     $tipe = mysqli_real_escape_string($koneksi, $_POST["tipe_task"]);
//     $developer = mysqli_real_escape_string($koneksi, $_POST["nama_developer"]);

//     // Input id user yang berparent di id email
//     $sql="SELECT id FROM users WHERE email='{$_SESSION["user_email"]}'";
//     $res=mysqli_query($koneksi, $sql);
//     $count=mysqli_num_rows($res);

//     if ($count > 0) {
//         $row=mysqli_fetch_assoc($res);
//         $user_id=$row["id"];
//         die();
//     }

//     else {
//         $user_id=0;
//     }

//     $sql=null;
//     // Input task
//     $sql = "INSERT INTO development (nama_task,tipe_task,nama_developer,user_id) VALUES ('$task','$tipe','$developer','$user_id')";
//     $res = mysqli_query($koneksi, $sql);
//     if ($res) {
//         echo json_encode($res);
//         // echo ("<script LANGUAGE='JavaScript'>
//         //     window.alert('Data Ok');
//         //     </script>");
//         }

//         else {
//             echo json_encode($res);
//             // echo ("<script LANGUAGE='JavaScript'>
//             //     window.alert('Data Not Ok');
//             //     </script>");

//             }
//         }
?>