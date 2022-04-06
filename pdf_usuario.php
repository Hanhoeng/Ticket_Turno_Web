
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Convertir HTML a PDF</title>
    <!-- El script de la librería-->
    <script src="html2pdf.bundle.min.js"></script>
    <!--Nuestro script, que se encarga de crear el PDF usando la librería-->
    <script src="script.js"></script>
    <!-- Algunos estilos -->
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1>EL PDF CON QR</h1>
    <strong>Presiona el siguiente botón para crear un PDF:</strong>
    <button id="btnCrearPdf">Click aquí </button>
    <h5>Estamos probando la creación de un PDF desde HTML usando JavaScript</h5>
    <p>ESTO ES UNA PAGINA DE PRUEBA</p>
    <h1>Otro encabezado</h1>
    <table>
        
        </tbody>
    </table>
</body>
</html>
<?php
	//Agregamos la libreria para genera códigos QR
	require "phpqrcode/qrlib.php";    
	
	//Declaramos una carpeta temporal para guardar la imagenes generadas
	$dir = 'temp/';
	
	//Si no existe la carpeta la creamos
	if (!file_exists($dir))
        mkdir($dir);
	
        //Declaramos la ruta y nombre del archivo a generar
	$filename = $dir.'test.png';

        //Parametros de Condiguración
	
	$tamaño = 10; //Tamaño de Pixel
	$level = 'L'; //Precisión Baja
	$framSize = 3; //Tamaño en blanco
	$contenido = "https://www.youtube.com/c/AnimePlay%E3%83%84"; //Texto
	
        //Enviamos los parametros a la Función para generar código QR 
	QRcode::png($contenido, $filename, $level, $tamaño, $framSize); 
	
        //Mostramos la imagen generada
	echo '<img src="'.$dir.basename($filename).'" /><hr/>';  
?>