<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>4</title>
    <link rel="stylesheet" href="style.css">
</head>

<?php
if (!empty($messages)) {
  print('<div class="messages">');
  // Выводим все сообщения.
  foreach ($messages as $message) {
    print($message);
  }
  print('</div>');
}
?>

<body>
    <form method="POST" action="4.php">
        <input type="text" name="fio" placeholder="ФИО"  <?php if ($errors['fio']) {print 'class="error"';} ?> value="<?php print $values['fio']; ?>" >
        <input type="tel" name="tel"  placeholder="Телефон"  <?php if ($errors['tel']) {print 'class="error"';} ?> value="<?php print $values['tel']; ?>">
        <input type="email" name="email"  placeholder="email"  <?php if ($errors['email']) {print 'class="error"';} ?> value="<?php print $values['email']; ?>">
        <input type="date" name="date"  <?php if ($errors['date']) {print 'class="error"';} ?> value="<?php print $values['date']; ?>">
        <div><label><input type="radio" name="gender" value="male"   <?php if ($errors['gender']) {print 'class="error"';} ?> <?php if($values['gender']=='male'){print 'checked';} ?>>Муж</label>
        <label><input type="radio" name="gender" value="female" <?php if($values['gender']=='female'){print 'checked';} ?>>Жен</label></div>
        <select name="PL" multiple="multiple"  <?php if ($errors['PL']) {print 'class="error"';} ?>>
            <option disabled>Любимый ЯП</option>
            <option value="0" <?php if($values['PL']=='0'){print 'selected';} ?>> C</option>
            <option value="1" <?php if($values['PL']=='1'){print 'selected';} ?>> C++</option> 
            <option value="2" <?php if($values['PL']=='2'){print 'selected';} ?>>JavaScript</option>
            <option value="3" <?php if($values['PL']=='3'){print 'selected';} ?>>PHP</option>
            <option value="4" <?php if($values['PL']=='4'){print 'selected';} ?>> Python</option>
            <option value="5" <?php if($values['PL']=='5'){print 'selected';} ?>> Java</option>
            <option value="6" <?php if($values['PL']=='6'){print 'selected';} ?>>Haskel</option>
            <option value="7" <?php if($values['PL']=='7'){print 'selected';} ?>> Clojure</option>
            <option value="8" <?php if($values['PL']=='8'){print 'selected';} ?>> Prolog</option>
            <option value="9" <?php if($values['PL']=='9'){print 'selected';} ?>> Scala</option>
        </select>
        <textarea name="bio" cols="30" rows="2" placeholder="Биография"  <?php if ($errors['bio']) {print 'class="error"';} ?> ><?php print $values['bio']; ?></textarea>
        <label><input type="checkbox" name="checkbox"  <?php if ($errors['checkbox']) {print 'class="error"';} //Чекбокс не автозаполняем ?>>  Ознакомлен</label>
        <input class="submit" value="Сохранить" type="submit">
    </form>
</body>

<link rel="stylesheet" href="style.css">
</html>