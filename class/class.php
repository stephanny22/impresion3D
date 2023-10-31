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
   
    <title>USUARIOS</title>
</head>

<body>
<?php
$globals = $GLOBALS;
class Conectar{
    public static function conec(){
        $host="localhost";
        $user="root";
        $pass="";
        $db_name="bd_impresoras";
        //conectarnos a la BD
        $link=mysqli_connect($host,$user,$pass) 
         or die ("ERROR Al conectar la BD".mysqli_error($link));
         //seleccionar la BD
         mysqli_select_db($link,$db_name) 
          or die ("ERROR Al seleccionar la BD".mysqli_error($link));
          return $link;
    }   
}
class Usuario{
 private $alum;

 public function __construct(){
    $this->alum = array();
 }

 public function verusu(){
    $sql="select * from usuario";
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

 public function insertusua($name,$pass,$emai){
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
            window.location='../Administrador/menuusu.php';
        }
    });
    </script>";
 }

 public function inserthor($idh,$idp,$ids,$fecha,$idt,$hr1,$hr2,$hr3,$hr4){
    $sql="insert into horario values ('$idh','$idp','$ids','$fecha','$idt','$hr1','$hr2','$hr3','$hr4')" or die ("ERROR em la Consulta $sql".mysqli_error($link));
    $res=mysqli_query(Conectar::conec(),$sql);
    echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
    echo "
    <script type='text/javascript'>
    Swal.fire({
       icon : 'success',
       title : 'Operacion Exitosa!!',
       text :  'Horario asignado Correctamente'
    }).then((result) => {
        if(result.isConfirmed){
            window.location='../Administrador/menumodpeli.php';
        }
    });
    </script>";
 }

 public function insertcine($idc,$ncin,$dir,$tel,$hor){
    $sql="insert into cine values ('$idc','$ncin','$dir','$tel','$hor')";
    $res=mysqli_query(Conectar::conec(),$sql);
    echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
    echo "
    <script type='text/javascript'>
    Swal.fire({
       icon : 'success',
       title : 'Operacion Exitosa!!',
       text :  'Cine asignado Correctamente'
    }).then((result) => {
        if(result.isConfirmed){
            window.location='../Administrador/menumodhor.php';
        }
    });
    </script>";
 }

 public function editarhor($idh,$idp,$ids,$fecha,$idt,$hr1,$hr2,$hr3,$hr4){
    $sql="update horario set id_horario='$idh',id_pelicula='$idp',id_sala='$ids',fecha='$fecha',id_tarifa='$idt',hora1='$hr1',hora2='$hr2',hora3='$hr3',hora4='$hr4' where id_horario='$idh'";
     $res=mysqli_query(Conectar::conec(),$sql);
     echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
     echo "<script type='text/javascript'>
     Swal.fire({
        icon : 'success',
        title : 'Operacion Exitosa!!',
        text :  'Datos editados Correctamente'
     }).then((result) => {
         if(result.isConfirmed){
             window.location='../Administrador/menumodhor.php';
         }
     });
     </script>";
   }

   public function editarcine($idc,$ncin,$dir,$tel,$idh){
    $sql="update cine set id_cine='$idc',nombre_cine='$ncin',direccion='$dir',telefono='$tel',id_horario='$idh' where id_cine='$idc'";
     $res=mysqli_query(Conectar::conec(),$sql);
     echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
     echo "<script type='text/javascript'>
     Swal.fire({
        icon : 'success',
        title : 'Operacion Exitosa!!',
        text :  'Datos editados Correctamente'
     }).then((result) => {
         if(result.isConfirmed){
             window.location='../Administrador/menumodcine.php';
         }
     });
     </script>";
   }

   

   public function verhort(){
    $sql="select * from horario";
    $res=mysqli_query(Conectar::conec(),$sql) or die ("ERROR em la Consulta $sql".mysqli_error($link));
    //recorrer la tabla alumnos
    while($row=mysqli_fetch_assoc($res)){
        $this->nombre[]= $row;
    }
    return $this->nombre;       
 }

 public function vercine(){
    $sql="select * from cine";
    $res=mysqli_query(Conectar::conec(),$sql) or die ("ERROR em la Consulta $sql".mysqli_error($link));
    //recorrer la tabla alumnos
    while($row=mysqli_fetch_assoc($res)){
        $this->nombre[]= $row;
    }
    return $this->nombre;       
 }

 public function vercinet($id){
    $sql="select * from cine where id_horario='$id'";
    $res=mysqli_query(Conectar::conec(),$sql) or die ("ERROR em la Consulta $sql".mysqli_error($link));
    //recorrer la tabla alumnos
    while($row=mysqli_fetch_assoc($res)){
        $this->nombre[]= $row;
    }
    return $this->nombre;       
 }

 //metodo editar
 public function editaru($name,$pass,$emai){
  $sql="update usuario set nombre='$name',contraseña='$pass',correo='$emai' where nombre='$name'";
   $res=mysqli_query(Conectar::conec(),$sql);
   echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
   echo "<script type='text/javascript'>
   Swal.fire({
      icon : 'success',
      title : 'Operacion Exitosa!!',
      text :  'Datos editados Correctamente'
   }).then((result) => {
       if(result.isConfirmed){
           window.location='../Administrador/menuusu.php';
       }
   });
   </script>";

 }

 //metodo para traer el id del alumno

 public function get_idu($name){
    $sql="select * from usuario where nombre='$name'";
    $res=mysqli_query(Conectar::conec(),$sql);
    if($row=mysqli_fetch_assoc($res)){
        $this->alum[]=$row;
    }
    return $this->alum;
 }
 public function get_conu($name,$email){
    $sql="select contraseña from usuario where nombre='$name' and correo='$email'";
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
    echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
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
   }); </script>";
    }  

    public function verpeli(){
       $sql="select * from pelicula";
       $res=mysqli_query(Conectar::conec(),$sql) or die ("ERROR em la Consulta $sql".mysqli_error($link));
       //recorrer la tabla alumnos
       while($row=mysqli_fetch_assoc($res)){
           $this->nombre[]= $row;
       }
       return $this->nombre;       
    }

    public function get_idpeli($id){
        $sql="select * from pelicula where id_pelicula='$id'";
        $res=mysqli_query(Conectar::conec(),$sql);
        if($row=mysqli_fetch_assoc($res)){
            $this->alum[]=$row;
        }
        return $this->alum;
     }

    public function verhorario($id){
        $sql="select * from horario where id_pelicula='$id'";
       $res=mysqli_query(Conectar::conec(),$sql) or die ("ERROR em la Consulta $sql".mysqli_error($link));
       //recorrer la tabla alumnos
       while($row=mysqli_fetch_assoc($res)){
           $this->alum[]= $row;
       }
       return $this->alum;   
    }

    public function verhorariot($id){
        $sql="select * from horario where id_horario='$id'";
       $res=mysqli_query(Conectar::conec(),$sql) or die ("ERROR em la Consulta $sql".mysqli_error($link));
       //recorrer la tabla alumnos
       while($row=mysqli_fetch_assoc($res)){
           $this->alum[]= $row;
       }
       return $this->alum;   
    }
    
    public function vertarifa($id){
        $sql="select * from tarifa where id_tarifa='$id'";
       $res=mysqli_query(Conectar::conec(),$sql) or die ("ERROR em la Consulta $sql".mysqli_error($link));
       //recorrer la tabla alumnos
       while($row=mysqli_fetch_assoc($res)){
           $this->nombre[]= $row;
       }
       return $this->nombre;   
    }

    public function versalat(){
        $sql="select * from sala";
       $res=mysqli_query(Conectar::conec(),$sql) or die ("ERROR em la Consulta $sql".mysqli_error($link));
       //recorrer la tabla alumnos
       while($row=mysqli_fetch_assoc($res)){
           $this->nombre[]= $row;
       }
       return $this->nombre;   
    }

    public function vertarifat(){
        $sql="select * from tarifa";
       $res=mysqli_query(Conectar::conec(),$sql) or die ("ERROR em la Consulta $sql".mysqli_error($link));
       //recorrer la tabla alumnos
       while($row=mysqli_fetch_assoc($res)){
           $this->nombre[]= $row;
       }
       return $this->nombre;   
    }

    public function versala($id){
        $sql="select * from sala where id_sala='$id'";
       $res=mysqli_query(Conectar::conec(),$sql) or die ("ERROR em la Consulta $sql".mysqli_error($link));
       //recorrer la tabla alumnos
       while($row=mysqli_fetch_assoc($res)){
           $this->nombre[]= $row;
       }
       return $this->nombre;   
    }
   
    public function insertpeli($id_pelicula, $titulo, $director, $pro1, $pro2, $pro3, $genero, $clasificacion) {
        $sql = "INSERT INTO pelicula VALUES ('$id_pelicula', '$titulo', '$director', '$pro1', '$pro2', '$pro3', '$genero', '$clasificacion')";
        $res = mysqli_query(Conectar::conec(), $sql) or die ("ERROR em la Consulta $sql".mysqli_error($link));
    
        echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
        echo "<script type='text/javascript'>
            Swal.fire({
                icon: 'success',
                title: 'Operación Exitosa!',
                text: 'Película creada correctamente'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location='../Administrador/menumodpeli.php';
                }
            });
        </script>";
    }
    //metodo editar
    public function editarpeli($id_pelicula, $titulo, $director, $pro1, $pro2, $pro3, $genero, $clasificacion) {
        $sql = "UPDATE pelicula SET titulo = '$titulo', director = '$director', pro1 = '$pro1', pro2 = '$pro2', pro3 = '$pro3', genero = '$genero', clasificacion = '$clasificacion' WHERE id_pelicula = '$id_pelicula'";
        $res = mysqli_query(Conectar::conec(), $sql) or die ("ERROR em la Consulta $sql".mysqli_error($link));
        echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
        echo "<script type='text/javascript'>
            Swal.fire({
                icon: 'success',
                title: 'Operación Exitosa!',
                text: 'Datos editados correctamente'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location='../Administrador/menumodpeli.php';
                }
            });
        </script>";
    }
   
    //metodo para trar el id del alumno
   
    public function get_titu($id){
       $sql="select titulo from pelicula where id_pelicula='$id'";
       $res=mysqli_query(Conectar::conec(),$sql);
       if($row=mysqli_fetch_assoc($res)){
           $this->alum[]=$row;
       }
       return $this->alum;
    }
   
    //metodo eliminar
    public function eliminarpeli($id){
       $sql="delete from pelicula where id_pelicula='$id'";
       $res=mysqli_query(Conectar::conec(),$sql);
       echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
       echo "
      <script type='text/javascript'>
      Swal.fire({
         icon : 'success',
         title : 'Operacion Exitosa!!',
         text :  'El usuario con nombre: $id fue eliminado Correctamente'
      }).then((result) => {
          if(result.isConfirmed){
              window.location='../Administrador/menumodpeli.php';
          }
      }); </script>
      ";
   
    }

    //metodo eliminar
    public function eliminarcine($id){
        $sql="delete from cine where id_cine='$id'";
        $res=mysqli_query(Conectar::conec(),$sql);
        echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
        echo "
       <script type='text/javascript'>
       Swal.fire({
          icon : 'success',
          title : 'Operacion Exitosa!!',
          text :  'El cine con id: $id fue eliminado Correctamente'
       }).then((result) => {
           if(result.isConfirmed){
               window.location='../Administrador/menumodcine.php';
           }
       }); </script>
       ";
    
     }

     public function eliminarhor($id){
        $sql="delete from horario where id_horario='$id'";
        $res=mysqli_query(Conectar::conec(),$sql);
        echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
        echo "
       <script type='text/javascript'>
       Swal.fire({
          icon : 'success',
          title : 'Operacion Exitosa!!',
          text :  'El horario con id: $id fue eliminado Correctamente'
       }).then((result) => {
           if(result.isConfirmed){
               window.location='../Administrador/menumodhor.php';
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