##### 安裝Passport

composer require laravel/passport



##### 設定ServiceProvider

AuthServiceProvider

- 設定passport驗證（包含Scope、routes）

PassportServiceProvider

- 為了覆寫password grant instance所建立



##### 設定config/auth.php

- api下guards的driver要改成passport

`

 'guards' => [

​        'web' => [

​            'driver' => 'session',

​            'provider' => 'users',

​        ],



​        'api' => [

​            'driver' => 'passport',

​            'provider' => 'users',

​        ],

​    ],

`

- providers可以設定要操作的users資料表model

`

'providers' => [

​        'users' => [

​            'driver' => 'eloquent',

​            'model' => App\Models\Entities\Leadercampus\User::class,

​        ],

`



##### Migrate

Passport有自己的資料庫目錄，所以我們要下指令進行遷移

php artisan migrate



##### 使用passport:install指令

這個指令會建立用來產生安全 Access Token 的加密金鑰

此外，該指令會建立用於產生 Access Token 的「個人存取」與「密碼授權」的客戶端：

php artisan passport:install



##### 產生要連線的client

php artisan passport:client --password


