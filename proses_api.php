<?php
header('Access-Control-Allow-Origin: *');  
/*header('Access-Control-Allow-Origin: http://localhost:8100');*/
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Methods: PUT, GET, POST, DELETE');
/*header('Access-Control-Allow-Methods: PUT, GET, POST, DELETE, OPTIONS');*/
header('Access-Control-Allow-Headers: Origin, Conten-Type, Authorization, Accept, X-Requested-With, x-xsrf-token');
header('Content-Type: application/json; charset=utf-8');
/* application/x-www-form-urlencoded
headers.append('Access-Control-Allow-Origin', 'http://localhost:3000');
 */
include 'config.php';
$postjson = json_decode(file_get_contents('php://input'), true);
$today = date('Y-m-d H:i:s')

if( $postjson['aksi'] == 'proses_register' ) {
    $password = md5($postjson['password']);
    $insert = mysqli_query($mysqli, "INSERT INTO usuario SET correo = '$postjson[email]', telefono = '$postjson[telefono]', usuario = '$postjson[nombre]', contrasena = '$password'");
    if($insert){ 
        $result = json_encode(array('success' =>true, 'msg'=>'Usuario Registrado'));
    }else{
        $result = json_encode(array('success' =>false, 'msg'=>'Error al registrar usuario'));
    }
    echo $result;
}

?>