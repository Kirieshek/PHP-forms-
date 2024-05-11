<form method="post">
    <input type="text" name="name" placeholder="Имя"><br>
    <input type="text" name="surname" placeholder="Фамилия"><br>
    <input type="text" name="inn" placeholder="ИНН"><br>
    <input type="text" name="snils" placeholder="СНИЛС"><br>
    <button type="submit">Отправить</button>
</form>

<?php

function validate_input($data) {
    $name = $data['name'];
    $surname = $data['surname'];
    $inn = $data['inn'];
    $snils = $data['snils'];

    $name = htmlspecialchars(strip_tags($name));
    $surname = htmlspecialchars(strip_tags($surname));
    $inn = htmlspecialchars(strip_tags($inn));
    $snils = htmlspecialchars(strip_tags($snils));

    if (!preg_match("/^[a-zA-Zа-яА-Я]+$/u", $name) || !preg_match("/^[a-zA-Zа-яА-Я]+$/u", $surname)) {
        echo "Имя и фамилия должны содержать только буквы.";
        return;
    }
    if (!preg_match("/^\d{12}$/", $inn)) {
        echo "ИНН должен состоять из 12 цифр.";
        return;
    }

    if (!preg_match("/^\d{3}-\d{3}-\d{3} \d{2}$/", $snils)) {
        echo "СНИЛС должен быть в формате xxx-xxx-xxx уу.";
        return;
    }

    echo "Данные успешно валидированы!";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    validate_input($_POST);
}

?>