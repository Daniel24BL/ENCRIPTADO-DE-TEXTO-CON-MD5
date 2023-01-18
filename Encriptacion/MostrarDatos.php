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
        window.location = 'Desencriptar.html'
        </script>";
        
    }else{
        $base=mysqli_select_db($conectar,$basededatos);
        if(!$base){
            echo "
            <script type='text/javascript'>
            alert('no se encontro la base de datos');
            window.location = 'Desencriptar.html'
            </script>";
            

            
        }
    }

    //<!--------------------------------Recuperar variables------------------------------------------->
    $contrasena=$_POST['contraDesc'];
    $textoencriptado=$_POST['textencrip'];

     //<!-------------------------------Consultas------------------------------------------->   

$sql = "SELECT * FROM MD5 WHERE Contraseña = '$contrasena' AND TextoEncriptado = '$textoencriptado'";
$sql2 ="SELECT * FROM MD5 WHERE Contraseña = '$contrasena' ";

    //<!--------------------------------Ejecutar la sentencia sql------------------------------------------->
    $ejecutar= mysqli_query($conectar,$sql);

    if($user = mysqli_fetch_assoc($ejecutar)){
    $contraEnc = $user['Contraseña'];
    $TextNorma = $user['TextoNormal'];
    $TextEncri = $user['TextoEncriptado'];
            
    }else{
        $ejecutar2= mysqli_query($conectar,$sql2);
        if ($user = mysqli_fetch_assoc($ejecutar2)) {
            echo "
                    <script type='text/javascript'>
                    alert('El texto encriptado que ingresaste no corresponde a la contraseña que proporcionaste');
                    window.location = 'Desencriptar.html'
                    </script>";
            
        } else {
            echo "
                <script type='text/javascript'>
                alert('La contraseña que ingresaste es incorrecta');
                window.location = 'Desencriptar.html'
                </script>";
        }
        
    }

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="./Assets/cifrado.png">
        <title>Desencriptación de texto</title>
        <!--------------------------------------SCRIPT----------------------------------------->
        <script type="text/javascript" src="script.js"></script> 
        <!-------------------------------------------CCS------------------------------------------->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">    
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
        <link rel="stylesheet" href="./Style.css">
</head>
<body>
    <!--------------------------------CABECERA------------------------------------------->
    <div>
        <nav class="navbar navbar-dark bg-dark">
            <div class="container-fluid">
            <a class="navbar-brand" href="./Desencriptar.html">
                <img src="./Assets/cifrado.png" alt="" width="30" height="24" class="d-inline-block align-text-top">
                Desenriptado de texto con MD5
            </a>
            <a class="navbar-brand" target="_blank" href="https://docs.informatica.com/integration-cloud/cloud-data-integration/current-version/function-reference/functions/md5.html"><i class="bi bi-chat-left-text"></i>MD5</a>
            <li >
                <a class="btn btn-outline-light " href="./index.html">Inicio</a>
            </li>
            </div>
        </nav>
    </div>
    <!-----------------------------------------CUERPO ENCRIPTADO DE DATOS------------------------------------------------>
    <br><br>
    <h1 class=" text-center " style="color: rgb(255, 255, 255);">Desencriptar</h1>
    <br>

    <main class="form-signin">
        <form id="formularioR"  >
            
        
                    <div class="form-floating">
                        <input type="password" class="form-control" id="ContraseñaDesc" name ="contraDesc"  <?php if(isset($contraEnc)) { ?> value="<?php echo $contraEnc; ?>" <?php } ?> >
                        <label for="password">Contraseña del texto encriptado</label>
                    </div>
                    
                    <br>
                    <div class="form-floating">
                        <input type="text" class="form-control" id="InfoDesc" name ="textencrip" <?php if(isset($TextEncri)) { ?> value="<?php echo $TextEncri; ?>" <?php } ?>  >
                        <label for="textencrip">Ingrese la texto encriptado</label>
                    </div>
        
                    <br>
                    <div class="form-floating" id="Result">
                        <input type="text" class="form-control" id="InfoResult" name ="textnorm" <?php if(isset($TextNorma)) { ?> value="<?php echo $TextNorma; ?>" <?php } ?> >
                        <label for="textnorm">Texto desencriptado</label>
                    <br>
                    
                    
                    </div>
                    
                    <a href="./Desencriptar.html" class="w-100 btn btn-lg btn-primary"  type="button"  >Regresar</a>
                    <br>
                    

                    
            </form>
    </main>
<br><br>
    <footer class="row">
        
            <p class="mb-0 w-100 text-center col-12" style="color: white;">
            &copy; Seguridad de la información Septimo "B" </p>
          </footer>
</body>
</html>