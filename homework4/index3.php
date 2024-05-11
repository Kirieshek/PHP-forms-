<!DOCTYPE html>
<html>
<head>
    <title>Форма регистрации</title>
</head>
<body>
    <h2>Форма регистрации</h2>
    <form method="POST">
        <label for="login">Логин:</label><br>
        <input type="text" id="login" name="login"><br><br>
        
        <label for="password">Пароль:</label><br>
        <input type="password" id="password" name="password"><br><br>
        
        <label for="confirm_password">Повторите пароль:</label><br>
        <input type="password" id="confirm_password" name="confirm_password"><br><br>
        
        <label for="secret_phrase">Секретная фраза (5 букв):</label><br>
        <input type="text" id="secret_phrase" name="secret_phrase"><br><br>
        
        <input type="submit" value="Отправить">
    </form>
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    function validate_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
    $login = validate_input($_POST["login"]);
    $password = validate_input($_POST["password"]);
    $confirm_password = validate_input($_POST["confirm_password"]);
    $secret_phrase = validate_input($_POST["secret_phrase"]);
    
    if (strlen($login) < 3 || strlen($login) > 16) {
        echo "Логин должен быть больше 3 и меньше 16 символов <br>";
    } elseif ($password != $confirm_password || strlen($password) < 8) {
        echo "Пароль должен совпадать с повтором и быть больше 8 символов <br>";
    } elseif (strlen($secret_phrase) != 5) {
        echo "Секретная фраза должна состоять ровно из 5 букв <br>";
    }else {
        echo "Данные прошли валидацию";
    }
}
?>
