<?php
    //<!--------------------------------Conexion con el servidor------------------------------------------->
    $usuario = "root";
    $password = "";
    $servidor = "localhost";
    $basededatos = "encriptardatos";
    
    $conectar= @mysqli_connect($servidor, $usuario,$password);
    if(!$conectar){
        echo "
        <script type='text/javascript'>
        alert('No se pudo conectar con el servidor');
        window.location = 'index.html'
        </script>";
        
    }else{
        $base=mysqli_select_db($conectar,$basededatos);
        if(!$base){
            echo "
            <script type='text/javascript'>
            alert('no se encontro la base de datos');
            window.location = 'index.html'
            </script>";
            

            
        }
    }

    //<!--------------------------------Recuperar variables------------------------------------------->
    $contrasena=$_POST['contra'];
    $textonormal=$_POST['textnorm'];
    $textoencriptado=$_POST['textencrip'];

    $sql= "INSERT INTO MD5 VALUES ('$contrasena','$textonormal','$textoencriptado')";

    //<!--------------------------------Ejecutar la sentencia sql------------------------------------------->
    $ejecutar= mysqli_query($conectar,$sql);
    if(!$ejecutar){
        echo "
        <script type='text/javascript'>
        alert('Hubo algun error al guardar los datos');
        window.location = 'index.html'
        </script>";
    }else{
        echo "
        <script type='text/javascript'>
        alert('Datos guardados correctamente');
        window.location = 'index.html'
        </script>";
    }
?>