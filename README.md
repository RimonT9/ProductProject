- Разработал функционал на Laravel c базой данных MySQL.
- Реализовал вывод списка продуктов, просмотр карточки продукта, добавление,  редактирование и удаление продукта.
- Создал Eloquent-модель «Product», связанную с таблицей «products».В модели реализовал Local Scope для получения только доступных продуктов (STATUS = “available”).
- Сделал валидацию создания и редактирования:NAME — обязательное поле, длиной не менее 10 символов; ARTICLE — обязательное поле, только латинские символы и цифры, уникальное в таблице.
- Создал роль администратора, который может редактировать артикул, остальным пользователям можно редактировать всё, кроме артикула. Роль пользователя можно узнать из настроек (config(‘products.role’)). Реализовал валидацию и проверку прав.
- При создании продукта реализовал отправку на заданный в конфигурации Email (config(‘products.email’)) уведомления (Notification) о том, что продукт создан. Уведомление отправляется через задачу (Job) в очереди (Queue).
- Реализовал метод для получения списка продуктов по API в виде json.
- Реализовал команду, которая будет запускаться каждую минуту через штатный механизм Task Scheduling. Команда берется в конфиге url (config(‘products.webhook’)) и отправляет туда POST запрос с информацией о продукте, с наибольшим ID. Для тестового endpoint взял http://webhook.site.
