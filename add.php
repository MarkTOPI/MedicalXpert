<?php
// Данные для создания сделки
$dealData = [
    'fields' => [
        'TITLE' => 'Название сделки', // Название сделки
        'CONTACT_ID' => 123, // ID контакта (если есть)
        'UF_CRM_1744520240362' => 'Почта', // Дополнительный комментарий
        'UF_CRM_1744985104713' => 'Коммент', // Имя пользователя (если есть пользовательское поле)
    ]
];
print_r($dealData);
// URL вашего REST API в Битриксе
$apiUrl = 'https://medicalxpert.bitrix24.ru/rest/1/fdpf9tfw3izdfz7b/crm.deal.add.json';

// Преобразуем данные в JSON
$jsonData = json_encode($dealData);
print_r($jsonData);
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
    echo 'Сделка успешно создана!';
}
// Закрываем cURL
curl_close($ch);

header("Location: https://medicalxpert.ru/")

exit();

?>