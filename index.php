<?php
// Получаем данные из формы
$fullName = $_POST['full-name'];
$phone = $_POST['phone'];
$message = $_POST['message'];

// URL вашего REST API
$apiUrl = 'https://your-api-url.com/endpoint';

// Данные для отправки
$data = [
    'fullName' => $fullName,
    'phone' => $phone,
    'message' => $message
];

// Преобразуем данные в JSON
$jsonData = json_encode($data);

// Настройки для cURL
$ch = curl_init($apiUrl);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json',
    'Content-Length: ' . strlen($jsonData)
]);

// Выполняем запрос
$response = curl_exec($ch);

// Проверяем результат
if ($response === false) {
    echo 'Ошибка: ' . curl_error($ch);
} else {
    echo 'Данные успешно отправлены!';
}

// Закрываем cURL
curl_close($ch);
?>