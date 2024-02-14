<?php
include_once 'config.php';

$conn = mysqli_connect(DB_HOST, USERNAME, PASSWORD, DB_NAME);

if (!$conn) {
  echo json_encode(['error' => 'Error al conectar a la base de datos']);
  exit;
}

// For adding a task
$doneTask = json_decode(file_get_contents('php://input'), true);

// Accessing the data
if (!isset($doneTask['name']) || !isset($doneTask['date'])) {
  echo json_encode(['error' => 'No se han enviado los datos necesarios']);
  exit;
}

// Saving the data
$name = $doneTask['name'];
$date = $doneTask['date'];

// Preparing the query
$query = $conn->prepare("INSERT INTO doneTasks (name, date) VALUES (?, ?)");
$query->bind_param('ss', $name, $date);

// Executing the query
if ($query->execute()) {
  // Success
  echo json_encode(['succes' => true, 'message' => 'Tarea agregada']);
} else {
  // Error
  echo json_encode(['error' => 'Error al agregar la tarea']);
}

// Closing the connection
$query->close();
mysqli_close($conn);
