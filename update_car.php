<?php
// Проверяем, был ли отправлен POST-запрос
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Получаем данные из формы
    $car_id = $_POST['car_id'];
    $brand = $_POST['brand'];
    $model = $_POST['model'];
    $year = $_POST['year'];
    $fuel = $_POST['fuel'];
    $volume = $_POST['volume'];
    $power = $_POST['power'];
    $mileage = $_POST['mileage'];

    // Загружаем текущие данные из файла JSON
    $currentData = file_get_contents('cars.json');
    $cars = json_decode($currentData, true);

    // Проверяем, существует ли автомобиль с таким ID в массиве
    if (isset($cars[$car_id])) {
        // Обновляем информацию об автомобиле
        $cars[$car_id]['марка'] = $brand;
        $cars[$car_id]['модель'] = $model;
        $cars[$car_id]['год'] = $year;
        $cars[$car_id]['топливо'] = $fuel;
        $cars[$car_id]['объем'] = $volume;
        $cars[$car_id]['мощность'] = $power;
        $cars[$car_id]['пробег'] = $mileage;

        // Сохраняем обновленные данные в файл JSON
        file_put_contents('cars.json', json_encode($cars, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));

        // Перенаправляем пользователя на страницу админ-панели с сообщением об успешном обновлении или обрабатываем по-другому
        header("Location: admin_panel.php?success=updated");
        exit();
    } else {
        // Если автомобиля с таким ID не существует, перенаправляем пользователя на страницу с сообщением об ошибке или обрабатываем по-другому
        header("Location: admin_panel.php?error=not_found");
        exit();
    }
} else {
    // Если форма не была отправлена, перенаправляем пользователя на страницу админ-панели или обработайте ошибку
    header("Location: admin_panel.php?error=no_post");
    exit();
}
?>
