Deploy
Установить и настроить веб-сервер, СУБД, PHP скачать composer (если не установлены)
Прописать конфиги для веб-сервера
Склонировать проект git clone <ссылка>
Скопировать содержимое .env.example в .env 
Отредактировать .env
composer install
npm install
php artisan key:generate
php artisan migrate --seed
php artisan serve (для локальной разработки)