<?php
// Получаем данные из POST запроса
$carsData = $_POST['cars'];

// Путь к файлу JSON с данными о машинах
$jsonFilePath = 'cars.json';

// Преобразуем данные в формат JSON
$jsonData = json_encode($carsData, JSON_PRETTY_PRINT);

// Записываем данные в файл
if (file_put_contents($jsonFilePath, $jsonData)) {
    // Возвращаем успешный статус
    http_response_code(200);
    echo "Данные успешно сохранены.";
} else {
    // Возвращаем ошибку в случае неудачи
    http_response_code(500);
    echo "Ошибка при сохранении данных.";
}
?>
