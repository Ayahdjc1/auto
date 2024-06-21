<?php
// Проверяем, был ли передан параметр ID в запросе
if (isset($_POST['car_id'])) {
    // Получаем ID автомобиля из параметра запроса
    $car_id = $_POST['car_id'];

    // Загружаем текущие данные из файла JSON
    $currentData = file_get_contents('cars.json');
    $cars = json_decode($currentData, true);

    // Проверяем, существует ли автомобиль с таким ID в массиве
    if (isset($cars[$car_id])) {
        // Удаляем автомобиль из массива
        unset($cars[$car_id]);

        // Сохраняем обновленные данные в файл JSON
        file_put_contents('cars.json', json_encode($cars, JSON_PRETTY_PRINT));

        // Перенаправляем пользователя на админ-панель с сообщением об успешном удалении
        header("Location: admin_panel.php?message=deleted");
        exit();
    } else {
        // Если автомобиля с таким ID не существует, перенаправляем пользователя на страницу с сообщением об ошибке
        header("Location: admin_panel.php?error=not_found");
        exit();
    }
} else {
    // Если параметр ID не был передан, перенаправляем пользователя на страницу админ-панели или обработайте ошибку
    header("Location: admin_panel.php?error=no_id");
    exit();
}
?>
