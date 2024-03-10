<?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  echo 'Error: El método de envío debe ser POST.';
  exit;
}

$allowed_types = array('image/jpeg', 'image/png');
if (!in_array($_FILES['foto']['name'], $allowed_types)) {
  echo 'Error: El tipo de archivo no es válido.';
  exit;
}

$max_size = 1048576;
if ($_FILES['foto']['size'] > $max_size) {
  echo 'Error: El tamaño del archivo supera el límite permitido.';
  exit;
}

$tmp_name = $_FILES['foto']['tmp_name'];

$filename = "perfil" . '.' . pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);

$upload_dir = '../../'.$_SESSION['fotoPerfil'];
move_uploaded_file($tmp_name, $upload_dir . $filename);
?>