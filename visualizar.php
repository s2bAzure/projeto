<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title>Provas disponíveis</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
  <h2>Provas disponíveis</h2>
  <table class="table table-striped table-bordered table-hover">
    <thead>
      <tr>
        <th>Instituição</th>
        <th>Disciplina</th>
        <th>Ano</th>
        <th>Semestre</th>
        <th>Pessoa</th>
      </tr>
    </thead>
    <tbody>
<?php
try {
      //Arquivo no mesmo diretorio que o arquivo PHP e com permissao 777
      $db = new PDO('sqlite:provas.db');

// CREATE TABLE IF NOT EXISTS PROVAS (
// Universidade TEXT,
// Disciplina TEXT,
// Ano INTEGER,
// Semestre INTEGER,
// Usuario TEXT,
// NomeArquivo TEXT
// );
//
// insert into Provas
// (Universidade, Disciplina, Ano, Semestre, Usuario)
// values
// ('UFRGS', 'Métodos numéricos', 2015, 1, 'Fulano');
//
// insert into Provas
// (Universidade, Disciplina, Ano, Semestre, Usuario)
// values
// ('PUC', 'IA', 2014, 2, 'Ciclano');

// insert into Provas
// (Universidade, Disciplina, Ano, Semestre, Usuario)
// values
// ('Uniritter', 'Cálculo', 2013, 2, 'Deltrano');

      $result = $db->query("Select * from PROVAS;");
      foreach($result as $row) {
?>
      <tr>
        <td><?php echo $row["Universidade"]?></td>
        <td><?php echo $row["Disciplina"]?></td>
        <td><?php echo $row["Ano"]?></td>
        <td><?php echo $row["Semestre"]?></td>
        <td><?php echo $row["Usuario"]?></td>
        <td><a href="<?php echo $row["NomeArquivo"]?>">Ver</a></td>
      </tr>
<?php
      }
}
catch(PDOException $e) {
  print 'Exception : '.$e->getMessage();
}
?>
    </tbody>
  </table>
</div>
</body>
</html>