<?php
$diretorio = "uploads/";
$target_file = $diretorio . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$fileExtension = pathinfo($target_file,PATHINFO_EXTENSION);
$fileExtension = strtoupper($fileExtension);

// Check if file already exists
if (file_exists($target_file)) {
    echo "Um arquivo com esse nome ja existe. Por favor renomeie o arquivo e tente novamente.";
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
    echo "Ocorreu um erro e infelizmente seu arquivo nao foi enviado.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "O arquivo  ". basename( $_FILES["fileToUpload"]["name"]). " foi enviado.";



        try {
            //Arquivo no mesmo diretorio que o arquivo PHP e com permissao 777
            $db = new PDO('sqlite:provas.db');
            $result = $db->query("INSERT INTO PROVAS ();");

            //$stmt = $pdo->prepare('SELECT * FROM employees WHERE name = :name');
            //$stmt->execute(array('name' => $name));
        }
        catch(PDOException $e) {
            print 'Exception : '.$e->getMessage();
        }



    } else {
        echo "Ocorreu um erro e infelizmente seu arquivo não foi enviado.";
    }
}
?>
