<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Рекламный баннер</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .banner {
            background-color: #f8d7da;
            color: #721c24;
            padding: 10px;
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            text-align: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            display: none; /* Баннер скрыт по умолчанию */
        }

        #close-banner {
            background-color: #721c24;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            font-size: 14px;
        }

        #close-banner:hover {
            background-color: #d9534f;
        }

        #clear-cookie {
            background-color: #5bc0de;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            font-size: 14px;
            margin-top: 20px;
        }

        #clear-cookie:hover {
            background-color: #31b0d5;
        }
    </style>
</head>
<body>

    <!-- Рекламный баннер -->
    <div id="banner" class="banner">
        <p>Это рекламный баннер!</p>
        <button id="close-banner">Закрыть</button>
    </div>

    <!-- Кнопка для очистки cookie -->
    <button id="clear-cookie">Очистить Cookie</button>

    <script>
        // Функция для получения cookie по имени
        function getCookie(name) {
            const value = `; ${document.cookie}`;
            const parts = value.split(`; ${name}=`);
            if (parts.length === 2) return parts.pop().split(';').shift();
            return null;
        }

        
        // Функция для установки cookie
        function setCookie(name, value, days) {
            const date = new Date();
            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000)); // Время жизни cookie
            const expires = "expires=" + date.toUTCString();
            document.cookie = `${name}=${value}; ${expires}; path=/`;
        }

        // Функция для удаления cookie
        function deleteCookie(name) {
            document.cookie = `${name}=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/`;
        }

        // Проверяем, был ли показан баннер
        if (!getCookie('bannerShown')) {
            // Показываем баннер
            document.getElementById('banner').style.display = 'block';
        }

        // Закрытие баннера и установка cookie
        document.getElementById('close-banner').addEventListener('click', function() {
            setCookie('bannerShown', 'true', 30); // Устанавливаем cookie на 30 дней
            document.getElementById('banner').style.display = 'none'; // Скрываем баннер
        });

        // Обработчик для кнопки очистки cookie
        document.getElementById('clear-cookie').addEventListener('click', function() {
            deleteCookie('bannerShown'); // Очищаем cookie
            document.getElementById('banner').style.display = 'block'; // Показываем баннер снова
        });
    </script>

</body>
</html>
