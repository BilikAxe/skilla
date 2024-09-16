<h1 align="center">Backend</h1>
<p>Backend сервиса работы менеджеров с заказами и исполнителями</p>

- Авторизация/регистрация через laravel Passport:
    -  выдача токенов при авторизации
    ```
        POST 'localhost:8000/api/registration' [name, email, password, password_confirmation]
        POST 'localhost:8000/api/login' [email, password] 
    ```
- Пользователь может
    - создать заказ
    ```
        POST 'localhost:8000/api/orders' [type_id, partnership_id, user_id, date, address, amount, status, description]
    ```
    - назначить исполнителя на заказ
    ```
        POST 'localhost:8000/api/orders/assign-worker' [worker_id, order_id]
    ```
    - получить список исполнителей по выбранным типам заказов
    ```
        GET 'localhost:8000/api/workers' QParams[oreder_type_id]
    ```
    - посмотреть активные сессии пользователя
    ```
       GET 'localhost:8000/api/active-session'
    ```
    - закрыть какую либо сессию
    ```
        DELETE 'revoke-session/{tokenId}'
    ```
