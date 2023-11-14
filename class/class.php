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

    public function verad(){
        $sql="select * from administrador";
        $res=mysqli_query(Conectar::conec(),$sql) or die ("ERROR em la Consulta $sql".mysqli_error($link));
        //recorrer la tabla alumnos
        while($row=mysqli_fetch_assoc($res)){
            $this->nombre[]= $row;
        }
        return $this->nombre;       
    }

    public function verimp(){
        $sql="select * from impresora";
        $res=mysqli_query(Conectar::conec(),$sql) or die ("ERROR em la Consulta $sql".mysqli_error($link));
        //recorrer la tabla alumnos
        while($row=mysqli_fetch_assoc($res)){
            $this->nombre[]= $row;
        }
        return $this->nombre;       
    }

    public function insertusu($cod, $name, $namecom, $pass, $emai, $emaiins){
        $sql="insert into usuario values ('$cod','$name','$namecom','$pass','$emai','$emaiins')";
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

    public function insertusua($cod,$name,$namecom,$pass,$emai,$emaiins){
        $sql="insert into usuario values ('$cod','$name','$namecom','$pass','$emai','$emaiins')";
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

    public function insertada($name,$pass){
        $sql="insert into administrador values ('$name','$pass')";
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
                window.location='../Administrador/menuad.php';
            }
        });
        </script>";
    }

    public function insertimpa($id,$est,$idh){
        $sql="insert into impresora values ('$id','$est','$idh')";
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
                window.location='../Administrador/menuimp.php';
            }
        });
        </script>";
    }

    //metodo editar
    public function editaru($cod,$name,$namecon,$pass,$emai,$emains){
        $sql="update usuario set codigo='$cod',nombre='$name',nombrecompleto='$namecon',contraseña='$pass',correo='$emai',correo_inst='$emains' where codigo='$cod'";
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

    public function editarad($name,$pass){
        $sql="update administrador set nombre='$name',contraseña='$pass' where nombre='$name'";
        $res=mysqli_query(Conectar::conec(),$sql);
        echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
        echo "<script type='text/javascript'>
        Swal.fire({
            icon : 'success',
            title : 'Operacion Exitosa!!',
            text :  'Datos editados Correctamente'
        }).then((result) => {
            if(result.isConfirmed){
                window.location='../Administrador/menuad.php';
            }
        });
        </script>";
    }

    public function editarimp($id,$est,$idh){
        $sql="update impresora set estado='$est',id_horario='$idh' where id='$id'";
        $res=mysqli_query(Conectar::conec(),$sql);
        echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
        echo "<script type='text/javascript'>
        Swal.fire({
            icon : 'success',
            title : 'Operacion Exitosa!!',
            text :  'Datos editados Correctamente'
        }).then((result) => {
            if(result.isConfirmed){
                window.location='../Administrador/menuimp.php';
            }
        });
        </script>";
    }

 //metodo para traer el id del alumno

    public function get_idu($codigo){
        $sql="select * from usuario where codigo='$codigo'";
        $res=mysqli_query(Conectar::conec(),$sql);
        if($row=mysqli_fetch_assoc($res)){
            $this->alum[]=$row;
        }
        return $this->alum;
    }

    public function get_idad($nombre){
        $sql="select * from administrador where nombre='$nombre'";
        $res=mysqli_query(Conectar::conec(),$sql);
        if($row=mysqli_fetch_assoc($res)){
            $this->alum[]=$row;
        }
        return $this->alum;
    }

    public function get_idimp($id){
        $sql="select * from impresora where id='$id'";
        $res=mysqli_query(Conectar::conec(),$sql);
        if($row=mysqli_fetch_assoc($res)){
            $this->alum[]=$row;
        }
        return $this->alum;
    }

    //metodo eliminar
    public function eliminara($codigo){
        $sql="delete from usuario where codigo='$codigo'";
        $res=mysqli_query(Conectar::conec(),$sql);
        echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
        echo "
        <script type='text/javascript'>
        Swal.fire({
            icon : 'success',
            title : 'Operacion Exitosa!!',
            text :  'El usuario con codigo: $codigo fue eliminado Correctamente'
        }).then((result) => {
            if(result.isConfirmed){
                window.location='./menuusu.php';
            }
        }); </script>";
        }  

    public function eliminarad($name){
        $sql="delete from administrador where nombre='$name'";
        $res=mysqli_query(Conectar::conec(),$sql);
        echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
        echo "
       <script type='text/javascript'>
       Swal.fire({
          icon : 'success',
          title : 'Operacion Exitosa!!',
          text :  'El administrador con codigo: $name fue eliminado Correctamente'
       }).then((result) => {
           if(result.isConfirmed){
               window.location='./menuad.php';
           }
       }); </script>";
    }

    public function eliminarimp($id){
        $sql="delete from impresora where id='$id'";
        $res=mysqli_query(Conectar::conec(),$sql);
        echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
        echo "
       <script type='text/javascript'>
       Swal.fire({
          icon : 'success',
          title : 'Operacion Exitosa!!',
          text :  'La impresora con codigo: $id fue eliminado Correctamente'
       }).then((result) => {
           if(result.isConfirmed){
               window.location='./menuimp.php';
           }
       }); </script>";
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