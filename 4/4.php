<?php

/**
 * Реализовать проверку заполнения обязательных полей формы в предыдущей
 * с использованием Cookies, а также заполнение формы по умолчанию ранее
 * введенными значениями.
 */

// Отправляем браузеру правильную кодировку,
// файл index.php должен быть в кодировке UTF-8 без BOM.
header('Content-Type: text/html; charset=UTF-8');

// В суперглобальном массиве $_SERVER PHP сохраняет некторые заголовки запроса HTTP
// и другие сведения о клиненте и сервере, например метод текущего запроса $_SERVER['REQUEST_METHOD'].
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  // Массив для временного хранения сообщений пользователю.
  $messages = array();

  // В суперглобальном массиве $_COOKIE PHP хранит все имена и значения куки текущего запроса.
  // Выдаем сообщение об успешном сохранении.
  if (!empty($_COOKIE['save'])) {
    // Удаляем куку, указывая время устаревания в прошлом.
    setcookie('save', '', 100000);
    // Если есть параметр save, то выводим сообщение пользователю.
    $messages[] = 'Спасибо, результаты сохранены.';
  }

  // Складываем признак ошибок в массив.
  $errors = array();

  $errors['fio'] = !empty($_COOKIE['fio_error']);
  $errors['tel'] = !empty($_COOKIE['tel_error']);
  $errors['email'] = !empty($_COOKIE['email_error']);
  $errors['date'] = !empty($_COOKIE['date_error']);
  $errors['gender'] = !empty($_COOKIE['gender_error']);
  $errors['PL'] = !empty($_COOKIE['PL_error']);
  $errors['bio'] = !empty($_COOKIE['bio_error']);
  $errors['checkbox'] = !empty($_COOKIE['checkbox_error']);


  // Выдаем сообщения об ошибках.
  if ($errors['fio']) {
    // Удаляем куки, указывая время устаревания в прошлом.
    setcookie('fio_error', '', 100000);
    setcookie('fio_value', '', 100000);
    // Выводим сообщение.
    $messages[] = '<div class="error">Заполните имя кирилицей.</div>';
  }

  if ($errors['tel']) {
    setcookie('tel_error', '', 100000);
    setcookie('tel_value', '', 100000);
    $messages[] = '<div class="error">Заполните телефон.</div>';
  }

  if ($errors['email']) {
    setcookie('email_error', '', 100000);
    setcookie('email_value', '', 100000);
    $messages[] = '<div class="error">Заполните email.</div>';
  }

  if ($errors['date']) {
    setcookie('date_error', '', 100000);
    setcookie('date_value', '', 100000);
    $messages[] = '<div class="error">Заполните дату.</div>';
  }

  if ($errors['gender']) {
    setcookie('gender_error', '', 100000);
    setcookie('gender_value', '', 100000);
    $messages[] = '<div class="error">Заполните пол.</div>';
  }

  if ($errors['PL']) {
    setcookie('PL_error', '', 100000);
    setcookie('PL_value', '', 100000);
    $messages[] = '<div class="error">Заполните ЯП.</div>';
  }

  if ($errors['bio']) {
    setcookie('bio_error', '', 100000);
    setcookie('bio_value', '', 100000);
    $messages[] = '<div class="error">Заполните биографию.</div>';
  }

  if ($errors['checkbox']) {
    setcookie('checkbox_error', '', 100000);
    setcookie('checkbox_value', '', 100000);
    $messages[] = '<div class="error">Поставьте галочку.</div>';
  }

  // Складываем предыдущие значения полей в массив, если есть.
  $values = array();

  $values['fio'] = empty($_COOKIE['fio_value']) ? '' : $_COOKIE['fio_value'];
  $values['tel'] = empty($_COOKIE['tel_value']) ? '' : $_COOKIE['tel_value'];
  $values['email'] = empty($_COOKIE['email_value']) ? '' : $_COOKIE['email_value'];
  $values['date'] = empty($_COOKIE['date_value']) ? '' : $_COOKIE['date_value'];
  $values['gender'] = empty($_COOKIE['gender_value']) ? '' : $_COOKIE['gender_value'];
  $values['PL'] = empty($_COOKIE['PL_value']) ? '' : $_COOKIE['PL_value'];
  $values['bio'] = empty($_COOKIE['bio_value']) ? '' : $_COOKIE['bio_value'];
  $values['checkbox'] = empty($_COOKIE['checkbox_value']) ? '' : $_COOKIE['checkbox_value'];

  // Включаем содержимое файла form.php.
  // В нем будут доступны переменные $messages, $errors и $values для вывода 
  // сообщений, полей с ранее заполненными данными и признаками ошибок.
  include('form.php');
}
// Иначе, если запрос был методом POST, т.е. нужно проверить данные и сохранить их в XML-файл.
else {
  // Проверяем ошибки.
  $errors = FALSE;
  if (empty($_POST['fio'])) {
    // Выдаем куку на день с флажком об ошибке в поле fio.
    setcookie('fio_error', '1', time() + 24 * 60 * 60);
    $errors = TRUE;
  }
  // Сохраняем ранее введенное в форму значение на месяц.
  setcookie('fio_value', $_POST['fio'], time() + 30 * 24 * 60 * 60);

  if (empty($_POST['tel'])) {
    setcookie('tel_error', '1', time() + 24 * 60 * 60);
    $errors = TRUE;
  }
  setcookie('tel_value', $_POST['tel'], time() + 30 * 24 * 60 * 60);

  if (empty($_POST['email'])) {
    setcookie('email_error', '1', time() + 24 * 60 * 60);
    $errors = TRUE;
  }
  setcookie('email_value', $_POST['email'], time() + 30 * 24 * 60 * 60);

  if (empty($_POST['date'])) {
    setcookie('date_error', '1', time() + 24 * 60 * 60);
    $errors = TRUE;
  }
  setcookie('date_value', $_POST['date'], time() + 30 * 24 * 60 * 60);

  if (empty($_POST['gender'])) {
    setcookie('gender_error', '1', time() + 24 * 60 * 60);
    $errors = TRUE;
  }
  setcookie('gender_value', $_POST['gender'], time() + 30 * 24 * 60 * 60);

  if (empty($_POST['PL'])) {
    setcookie('PL_error', '1', time() + 24 * 60 * 60);
    $errors = TRUE;
  }
  setcookie('PL_value', $_POST['PL'], time() + 30 * 24 * 60 * 60);

  if (empty($_POST['bio'])) {
    setcookie('bio_error', '1', time() + 24 * 60 * 60);
    $errors = TRUE;
  }
  setcookie('bio_value', $_POST['bio'], time() + 30 * 24 * 60 * 60);

  if (empty($_POST['checkbox'])) {
    setcookie('checkbox_error', '1', time() + 24 * 60 * 60);
    $errors = TRUE;
  }
  setcookie('checkbox_value', $_POST['checkbox'], time() + 30 * 24 * 60 * 60);

  if ($errors) {
    // При наличии ошибок перезагружаем страницу и завершаем работу скрипта.
    header('Location: 4.php');
    exit();
  } else {
    // Удаляем Cookies с признаками ошибок.
    setcookie('fio_error', '', 100000);
    setcookie('tel_error', '', 100000);
    setcookie('email_error', '', 100000);
    setcookie('date_error', '', 100000);
    setcookie('gender_error', '', 100000);
    setcookie('PL_error', '', 100000);
    setcookie('bio_error', '', 100000);
    setcookie('checkbox_error', '', 100000);
  }

  // Сохранение в БД.
  $user = 'u67339';
  $pass = '2259576'; // Заменить на пароль, такой же, как от SSH
  $db = new PDO(
    'mysql:host=localhost;dbname=u67339',
    $user,
    $pass,
    [PDO::ATTR_PERSISTENT => true, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
  );

  $stmt = $db->prepare("INSERT INTO form ( fio, tel,email,date,gender,PL,bio,checkbox) VALUES ( :fio, :tel,:email,:date,:gender,:PL,:bio,:checkbox)");
  $stmt->bindParam(':fio', $fio);
  $stmt->bindParam(':tel', $tel);
  $stmt->bindParam(':email', $email);
  $stmt->bindParam(':date', $date);
  $stmt->bindParam(':gender', $gender);
  $stmt->bindParam(':PL', $PL);
  $stmt->bindParam(':bio', $bio);
  $stmt->bindParam(':checkbox', $checkbox);
  $fio = $_POST['fio'];
  $tel = $_POST['tel'];
  $email = $_POST['email'];
  $date = $_POST['date'];
  $gender = $_POST['gender'];
  $PL = $_POST['PL'];
  $bio = $_POST['bio'];
  $checkbox = $_POST['checkbox'];
  $stmt->execute();

  
  // Сохраняем куку с признаком успешного сохранения.
  setcookie('save', '1');

  // Делаем перенаправление.
  header('Location: 4.php');
}
