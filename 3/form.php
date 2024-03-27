<?php
print_r($_GET);


$user = 'u67339';
$pass = '2259576'; // Заменить на пароль, такой же, как от SSH
$db = new PDO('mysql:host=localhost;dbname=u67339', $user, $pass,
  [PDO::ATTR_PERSISTENT => true, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
  

  $stmt = $db->prepare("INSERT INTO form ( fio, tel,email,date,gender,PL,bio,checkbox) VALUES ( :fio, :tel,:email,:date,:gender,:PL,:bio,:checkbox)");
$stmt->bindParam(':fio', $fio);
$stmt->bindParam(':tel', $tel);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':date', $date);
$stmt->bindParam(':gender', $gender);
$stmt->bindParam(':PL', $PL);
$stmt->bindParam(':bio', $bio);
$stmt->bindParam(':checkbox', $checkbox);
$fio = $_GET['fio'];
$tel = $_GET['tel'];
$email = $_GET['email'];
$date = $_GET['date'];
$gender = $_GET['gender'];
$PL = $_GET['PL'];
$bio = $_GET['bio'];
$checkbox = $_GET['checkbox'];
$stmt->execute();
  ?>