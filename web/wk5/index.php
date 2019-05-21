<?php

foreach ($db->query('SELECT username, password FROM note_user') as $row)
{
  echo 'user: ' . $row['username'];
  echo ' password: ' . $row['password'];
  echo '<br/>';
}

$statement = $db->query('SELECT username, password FROM note_user');
while ($row = $statement->fetch(PDO::FETCH_ASSOC))
{
  echo 'user: ' . $row['username'] . ' password: ' . $row['password'] . '<br/>';
}

$statement = $db->query('SELECT username, password FROM note_user');
$results = $statement->fetchAll(PDO::FETCH_ASSOC);

$stmt = $db->prepare('SELECT * FROM table WHERE id=:id AND name=:name');
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

$stmt = $db->prepare('SELECT * FROM table WHERE id=:id AND name=:name');
$stmt->execute(array(':name' => $name, ':id' => $id));
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
