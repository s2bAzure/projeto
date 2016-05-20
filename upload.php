<?php
$diretorio = "uploads/";
$target_file = $diretorio . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$fileExtension = pathinfo($target_file,PATHINFO_EXTENSION);
$fileExtension = strtoupper($fileExtension);

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    /*
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
    */
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Um arquivo com esse nome já existe. Por favor renomeie o arquivo e tente novamente.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 5000000) {
    echo "Os arquivos precisam ser menores que 5MB.";
    $uploadOk = 0;
}
// Allow certain file formats
if($fileExtension != "JPG" && $fileExtension != "PNG" && $fileExtension != "JPEG"
&& $fileExtension != "GIF" && $fileExtension != "PDF" ) {
    echo "Apenas arquivos PDF, JPG, JPEG, PNG e GIF são permitidos.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Ocorreu um erro e infelizmente seu arquivo não foi enviado.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "O arquivo  ". basename( $_FILES["fileToUpload"]["name"]). " foi enviado.";
    } else {
        echo "Ocorreu um erro e infelizmente seu arquivo não foi enviado.";
    }
}
?>