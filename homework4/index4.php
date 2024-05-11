<form method="post">
        <label>Год: </label>
        <input type="text" name="year" value="<?php echo date('Y'); ?>"><br>
        <label>Месяц: </label>
        <input type="text" name="month" value="<?php echo date('m'); ?>"><br>
        <label>День: </label>
        <input type="text" name="day" value="<?php echo date('d'); ?>"><br>
        <input type="submit" value="Посчитать">
</form>

<?php

    if ($_POST) {
        $targetDate = strtotime($_POST['year'] . '-' . $_POST['month'] . '-' . $_POST['day']);
        $newYear = strtotime(date('Y') + 1 . '-01-01');
        $daysLeft = ceil(($newYear - $targetDate) / (60 * 60 * 24));
        echo 'До Нового Года осталось ' . $daysLeft . ' дней.';
    }
    
?>
