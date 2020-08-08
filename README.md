### Test task for BWT

## Description

Основная часть тестового задания заключалась в разработке метода для контроллера, 
который по входящему названию страны вернёт все компании, относящиеся к этой стране, пользователей,
относящихся к компании и так же дату присоединения пользователя к компании.

Для инициализации таблиц и тестовых данных следует выполнить миграции.

Получить всех юзеров информацию об их компаниях и дате присоеденения ожно в методе CountryController@getUsers()

Контроллер CountryController так же содержит 2 метода которые возвращаю требуемы результат: getCompanies и getCompaniesShort

Первый возвращает полную информацию о компаниях и её юзерах используя только отношения моделей и стандартный методы поиска.

Во втором методе реализовано использование связки DataProvide & DataService & DataContainer. Основная логика происходит в классе
App\Services\CountryService однако обращаемся мы не к нему, так как он не использует статические методы.

Были созданы апи роуты, благодаря которым можно проверить результат работы приложения.

Перед выполнением обоих методов происходит валидация страны в App\Http\Middleware\CheckCountry. В случае если страна в базе не найдена
будет брошен соответствующий Exception.

## Require

 * php 7.2
 * mysql

# Install Project

 * composer install
 * sudo chmod -R 777 storage/
 * php artisan key:generate
 * php artisan migrate
 * create a file ".env"
 * create Database in Mysql and connect it in .env

## Examples of work

Params in row (JSON):
```
{
    "name": "Canada"
}
``` 

 /api/country/get-companies 
```
[
    {
        "id": 1,
        "name": "Google",
        "country_id": 1,
        "users": [
            {
                "id": 1,
                "name": "test",
                "email": "test1@example.com",
                "created_at": "2020-08-08 18:31:20",
                "pivot": {
                    "company_id": 1,
                    "user_id": 1,
                    "connected_at": "2020-08-08 18:31:20"
                }
            },
            {
                "id": 2,
                "name": "test",
                "email": "test2@example.com",
                "created_at": "2020-08-08 18:31:20",
                "pivot": {
                    "company_id": 1,
                    "user_id": 2,
                    "connected_at": "2020-08-08 18:31:20"
                }
            }
        ]
    },
    {
        "id": 2,
        "name": "Apple",
        "country_id": 1,
        "users": [
            {
                "id": 2,
                "name": "test",
                "email": "test2@example.com",
                "created_at": "2020-08-08 18:31:20",
                "pivot": {
                    "company_id": 2,
                    "user_id": 2,
                    "connected_at": "2020-08-08 18:31:20"
                }
            }
        ]
    }
]
``` 

/api/country/get-companies-short
```
[
    {
        "Company": "Google",
        "Users": [
            {
                "User Name": "test",
                "User Email": "test1@example.com",
                "Connected to company": "2020-08-08 18:31:20"
            },
            {
                "User Name": "test",
                "User Email": "test2@example.com",
                "Connected to company": "2020-08-08 18:31:20"
            }
        ]
    },
    {
        "Company": "Apple",
        "Users": [
            {
                "User Name": "test",
                "User Email": "test2@example.com",
                "Connected to company": "2020-08-08 18:31:20"
            }
        ]
    }
]
```
