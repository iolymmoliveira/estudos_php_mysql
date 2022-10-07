<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Clients List</title>
</head>
<body>
  <h1>Clientes List</h1>
  <div class="content">
    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>E-mail</th>
          <th>Senha</th>
          <th>Nome</th>
          <th>Endereço</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($resultData as $data): ?>
        <tr>
          <td><?= $data['id'] ?></td>
          <td><?= $data['email'] ?></td>
          <td><?= $data['senha'] ?></td>
          <td><?= $data['nome'] ?></td>
          <td><?= $data['endereco'] ?></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</body>
</html>
