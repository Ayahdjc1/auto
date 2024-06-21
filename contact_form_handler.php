<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Получаем данные из формы
    $name = $_POST['name'];
    $contact = $_POST['contact'];
    $message = $_POST['message'];
    
    // Заготовленный email для отправки информации о заявке
    $admin_email = "pavpyarka@mail.ru";
    
    // Формируем сообщение
    $subject = "Новая заявка с сайта";
    $body = "Имя: $name\n";
    $body .= "Email: $contact\n";
    $body .= "Сообщение: $message\n";
    
    // Отправляем уведомление пользователю
    $user_subject = "Ваша заявка принята";
    $user_body = "Спасибо за ваше сообщение, $name! Мы рассмотрим ваш запрос в ближайшее время.";
    $headers = "From: pavpyarka@mail.ru";
    mail($contact, $user_subject, $user_body, $headers);
    
    // Отправляем информацию о заявке админу
    mail($admin_email, $subject, $body, $headers);

    // Редирект обратно на страницу контактов
    header("Location: contact.html");
    exit();
}
?>
