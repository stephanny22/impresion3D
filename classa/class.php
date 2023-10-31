<!doctype html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">-->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../sw/dist/sweetalert2.min.css">
    <script type="text/javascript" language="Javascript" src="../js/funciones.js"></script>
   
    <title>ADMINISTRADOR</title>
</head>

<body>
    <?php
class Conectar{
    public static function conec(){
        $host="localhost";
        $user="root";
        $pass="";
        $db_name="bd_cine";
        //conectarnos a la BD
        $link=mysqli_connect($host,$user,$pass) 
         or die ("ERROR Al conectar la BD".mysqli_error($link));
         //seleccionar la BD
         mysqli_select_db($link,$db_name) 
          or die ("ERROR Al seleccionar la BD".mysqli_error($link));
          return $link;
    }   
}
class Administrador{
 private $alum;

 public function __construct(){
    $this->alum = array();
 }

 public function verusu(){
    $sql="select * from administrador";
    $res=mysqli_query(Conectar::conec(),$sql) or die ("ERROR em la Consulta $sql".mysqli_error($link));
    //recorrer la tabla alumnos
    while($row=mysqli_fetch_assoc($res)){
        $this->nombre[]= $row;
    }
    return $this->nombre;       
 }

 public function insertusu($name,$pass,$emai){
    $sql="insert into usuario values ('$name','$pass','$emai')";
    $res=mysqli_query(Conectar::conec(),$sql);
    echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
    echo "
    <script type='text/javascript'>
    Swal.fire({
       icon : 'success',
       title : 'Operacion Exitosa!!',
       text :  'Usuario creado Correctamente'
    }).then((result) => {
        if(result.isConfirmed){
            window.location='../LoginU.php';
        }
    });
    </script>";

 }
 //metodo editar
 public function editaru($name,$pass){
  $sql="update usuario set nombre='$name',contraseña='$pass'";
   $res=mysqli_query(Conectar::conec(),$sql);
   echo "<script type='text/javascript'>
   Swal.fire({
      icon : 'success',
      title : 'Operacion Exitosa!!',
      text :  'Datos editados Correctamente'
   }).then((result) => {
       if(result.isConfirmed){
           window.location='../menua.php';
       }
   });
   </script>";

 }

 //metodo para trar el id del alumno

 public function get_idu($name){
    $sql="select * from usuario where nombre='$name'";
    $res=mysqli_query(Conectar::conec(),$sql);
    if($row=mysqli_fetch_assoc($res)){
        $this->alum[]=$row;
    }
    return $this->alum;
 }

 //metodo eliminar
 public function eliminara($name){
    $sql="delete from usuario where nombre='$name'";
    $res=mysqli_query(Conectar::conec(),$sql);
    echo "
   <script type='text/javascript'>
   Swal.fire({
      icon : 'success',
      title : 'Operacion Exitosa!!',
      text :  'El usuario con nombre: $name fue eliminado Correctamente'
   }).then((result) => {
       if(result.isConfirmed){
           window.location='./menuusu.php';
       }
   }); </script>
   ";

 }
}
?>
<!--  -->
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>-->
    <script src="./bootstrap/js/bootstrap.min.js"></script>
    <script src="./sw/dist/sweetalert2.min.js"></script>
    <script src="./js/jquery-3.6.1.min.js"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>