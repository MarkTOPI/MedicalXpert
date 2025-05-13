<?php
require_once('bitrix_api.php'); // подключаем класс для взаимодействия с API Bitrix24

// Собираем данные из формы
$name = isset($_POST['NAME']) ? trim($_POST['NAME']) : '';
$phone = isset($_POST['PHONE_WORK']) ? trim($_POST['PHONE_WORK']) : '';
$comments = isset($_POST['COMMENTS']) ? trim($_POST['COMMENTS']) : '';

// Структура данных для передачи в Bitrix24
$data = [
    'fields' => [
        'TITLE' => 'Заявка с сайта',      // Заголовок сделки
        'STAGE_ID' => 'NEW',              // Начальная стадия сделки ("Новое")
        'COMMENTS' => $comments,          // Комментарии к сделке
        'CONTACT_ID' => ''                // Оставляем пустое значение, если контакты не нужны
    ]
];

// Отправляем номер телефона в качестве дополнительной информации
if ($phone != '') {
    $data['fields']['PHONE'] = [['VALUE' => $phone, 'VALUE_TYPE' => 'WORK']];   // Тип WORK означает рабочий телефон
}

// Выполняем запрос к API Bitrix24
try {
    $response = sendToBitrix24('/crm.deal.add', $data);  // Метод для создания сделки
    if ($response && !isset($response['error'])) {       // Проверяем успешность операции
        echo '<p style="color: green;">Заявка успешно создана! Спасибо за обращение.</p>';
    } else {
        throw new Exception('Ошибка создания заявки');
    }
} catch(Exception $ex) {
    echo '<p style="color: red;">Возникла ошибка при передаче данных: '.$ex->getMessage().'</p>';
}

// Функция отправки данных в Bitrix24
function sendToBitrix24($method, $params) {
    global $bx24_access_token;  // Ваш токен доступа Bitrix24

    $url = 'https://medicalxpert.bitrix24.ru/rest/'.$method.'?auth='.$bx24_access_token;
    $options = array(
        CURLOPT_URL            => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HEADER         => false,
        CURLOPT_POST           => true,
        CURLOPT_POSTFIELDS     => http_build_query(['params' => $params])
    );

    $ch = curl_init();
    curl_setopt_array($ch, $options);
    $response = curl_exec($ch);
    curl_close($ch);

    return json_decode($response, true);
}