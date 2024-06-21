<?php
// Проверяем, был ли передан параметр ID в запросе
if (isset($_GET['id'])) {
    // Получаем ID автомобиля из параметра запроса
    $car_id = $_GET['id'];

    // Загружаем текущие данные из файла JSON
    $currentData = file_get_contents('cars.json');
    $cars = json_decode($currentData, true);

    // Проверяем, существует ли автомобиль с таким ID в массиве
    if (isset($cars[$car_id])) {
        // Если автомобиль существует, можем отобразить форму для редактирования
        $car = $cars[$car_id];
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Редактирование автомобиля</title>
            <!-- Bootstrap CSS -->
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        </head>
        <body>

        <div class="container mt-5">
            <h2 class="text-center mb-4">Редактирование автомобиля</h2>
            <form action="update_car.php" method="post">
                <input type="hidden" name="car_id" value="<?php echo $car_id; ?>"> <!-- Скрытое поле с ID автомобиля -->
                <div class="form-group">
                    <label for="brand">Марка</label>
                    <input type="text" class="form-control" id="brand" name="brand" value="<?php echo $car['марка']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="model">Модель</label>
                    <input type="text" class="form-control" id="model" name="model" value="<?php echo $car['модель']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="image">Изображение</label>
                    <input type="file" class="form-control-file" id="image" name="image">
                </div>
                <div class="form-group">
                    <label for="year">Год</label>
                    <input type="number" class="form-control" id="year" name="year" value="<?php echo $car['год']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="fuel">Топливо</label>
                    <input type="text" class="form-control" id="fuel" name="fuel" value="<?php echo $car['топливо']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="volume">Объем</label>
                    <input type="text" class="form-control" id="volume" name="volume" value="<?php echo $car['объем']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="power">Мощность</label>
                    <input type="text" class="form-control" id="power" name="power" value="<?php echo $car['мощность']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="mileage">Пробег</label>
                    <input type="text" class="form-control" id="mileage" name="mileage" value="<?php echo $car['пробег']; ?>" required>
                </div>
                <button type="submit" class="btn btn-primary">Сохранить изменения</button>
            </form>
            
            <!-- Форма для удаления автомобиля -->
            <form action="delete_car.php" method="post" class="mt-3">
                <input type="hidden" name="car_id" value="<?php echo $car_id; ?>"> <!-- Скрытое поле с ID автомобиля -->
                <button type="submit" class="btn btn-danger">Удалить автомобиль</button>
            </form>
        </div>

        <!-- Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

        </body>
        </html>
        <?php
    } else {
        // Если автомобиля с таким ID не существует, перенаправляем пользователя на страницу с сообщением об ошибке или обрабатываем по-другому
        header("Location: admin_panel.php?error=not_found");
        exit();
    }
} else {
    // Если параметр ID не был передан, перенаправляем пользователя на страницу админ-панели или обработайте ошибку
    header("Location: admin_panel.php?error=no_id");
    exit();
}
?>
