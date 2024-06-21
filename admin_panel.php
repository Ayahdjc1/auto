<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админ-панель</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center mb-4">Админ-панель</h2>
    <h3>Добавить новый автомобиль</h3>
    <form action="add_car.php" method="post" enctype="multipart/form-data">
       <div class="form-group">
            <label for="brand">Марка</label>
            <input type="text" class="form-control" id="brand" name="brand" required>
        </div>
        <div class="form-group">
            <label for="model">Модель</label>
            <input type="text" class="form-control" id="model" name="model" required>
        </div>
        <div class="form-group">
            <label for="image">Изображение</label>
            <input type="file" class="form-control-file" id="image" name="image" required>
        </div>
        <div class="form-group">
            <label for="year">Год</label>
            <input type="number" class="form-control" id="year" name="year" required>
        </div>
        <div class="form-group">
            <label for="fuel">Топливо</label>
            <input type="text" class="form-control" id="fuel" name="fuel" required>
        </div>
        <div class="form-group">
            <label for="volume">Объем</label>
            <input type="text" class="form-control" id="volume" name="volume" required>
        </div>
        <div class="form-group">
            <label for="power">Мощность</label>
            <input type="text" class="form-control" id="power" name="power" required>
        </div>
        <div class="form-group">
            <label for="mileage">Пробег</label>
            <input type="text" class="form-control" id="mileage" name="mileage" required>
        </div>
        <button type="submit" class="btn btn-primary">Добавить</button>
    </form>

    <h3 class="mt-5">Список автомобилей</h3>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Марка</th>
                <th>Модель</th>
                <th>Год</th>
                <th>Топливо</th>
                <th>Объем</th>
                <th>Мощность</th>
                <th>Пробег</th>
                <th>Действие</th> <!-- Добавляем столбец для кнопки "Изменить" -->
            </tr>
        </thead>
        <tbody>
            <?php
            // Читаем данные из файла JSON
            $data = file_get_contents('cars.json');
            $cars = json_decode($data, true);

            // Отображаем данные в виде таблицы
            foreach ($cars as $key => $car) {
                echo '<tr>';
                echo '<td>' . $key . '</td>'; // ID автомобиля
                echo '<td>' . $car['марка'] . '</td>';
                echo '<td>' . $car['модель'] . '</td>';
                echo '<td>' . $car['год'] . '</td>';
                echo '<td>' . $car['топливо'] . '</td>';
                echo '<td>' . $car['объем'] . '</td>';
                echo '<td>' . $car['мощность'] . '</td>';
                echo '<td>' . $car['пробег'] . '</td>';
                echo '<td><a href="edit_car.php?id=' . $key . '" class="btn btn-primary">Изменить</a></td>'; // Кнопка "Изменить"
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>
</div>

<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
