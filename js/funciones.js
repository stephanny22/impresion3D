function limpiar(){
    document.formu.reset();
    document.formu.name.focus();
}
function validar(){
    var form = document.formu;
    if(formu.name.value==0){
        Swal.fire({
            icon:'error',
            title:'ERROR!!',
            text : 'Debe digitar el nombre'
         });
         formu.name.value="";
         formu.name.focus();
         return false;
    }
    if(formu.pass.value==0){
        Swal.fire({
            icon:'error',
            title:'ERROR!!',
            text : 'Debe digitar la contraseña'
         });
         formu.pass.value="";
         formu.pass.focus();
         return false;
    }
    form.submit();
}
function validarf(){
    var form = document.formu;
    form.submit();
}
//funcion eliminar
function eliminar(url){
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {
         window.location=url;
        }
      })
}