<?php
// Проверяем, была ли отправлена форма
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Получаем данные из формы
    $brand = $_POST['brand'];
    $model = $_POST['model'];
    $year = $_POST['year'];
    $fuel = $_POST['fuel'];
    $volume = $_POST['volume'];
    $power = $_POST['power'];
    $mileage = $_POST['mileage'];

    // Проверяем, загружено ли изображение
    if ($_FILES['image']['error'] == UPLOAD_ERR_OK) {
        $image_name = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];
        $image_path = 'images/' . $image_name; // Путь, куда сохранить изображение
        // Перемещаем изображение в нужную папку
        move_uploaded_file($image_tmp, $image_path);
    } else {
        // Если изображение не было загружено, устанавливаем путь по умолчанию или обработайте ошибку
        $image_path = 'images/default_image.jpg';
    }

    // Загружаем текущие данные из файла JSON
    $currentData = file_get_contents('cars.json');
    $cars = json_decode($currentData, true);

    // Добавляем новый автомобиль в массив
    $newCar = array(
        "марка" => $brand,
        "модель" => $model,
        "изображение" => $image_path,
        "год" => $year,
        "топливо" => $fuel,
        "объем" => $volume,
        "мощность" => $power,
        "пробег" => $mileage
    );
    $cars[] = $newCar;

    // Сохраняем обновленные данные в файл JSON
    file_put_contents('cars.json', json_encode($cars, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));

    // Перенаправляем пользователя обратно на страницу админ-панели или отобразите сообщение об успехе
    header("Location: admin_panel.php");
    exit();
} else {
    // Если форма не была отправлена, перенаправляем пользователя на страницу админ-панели или обработайте ошибку
    header("Location: admin_panel.php");
    exit();
}
?>
