<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Información del Agente</title>
  <link rel="stylesheet" href="../styles.css">
</head>
<body>

<!-- Barra de menú -->
<div class="navbar">
  <a href="#" class="navbar-brand">Valorant Wiki</a>
  <div class="navbar-links">
    <a href="../paginaPrincipal.php" class="navbar-link">Agents</a>
    <a href="#" class="navbar-link">Weapons</a>
  </div>
</div>

<!-- Contenedor principal -->
<div class="container">
  <?php
  // Código PHP para mostrar la información del agente
  if(isset($_GET['uuid']) && !empty($_GET['uuid'])) {
    $uuid = $_GET['uuid'];
    $url = "https://valorant-api.com/v1/agents/$uuid";
    $response = file_get_contents($url);
    $data = json_decode($response, true);
    
    if(isset($data['data']) && !empty($data['data'])) {
      $nombre = $data['data']['displayName'];
      $descripcion = $data['data']['description'];
      $imagen = $data['data']['fullPortrait'];

      echo "<h1>$nombre</h1>";
      echo "<img src='$imagen' alt='$nombre'>";
      echo "<p>$descripcion</p>";
    } else {
      echo "<p>No se encontró información para el agente con UUID: $uuid</p>";
    }
  } else {
    echo "<p>No se proporcionó un UUID válido en la URL.</p>";
  }
  ?>
</div>

</body>
</html>
