<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>


## Assignment

## Step 1: Create Backup Database

``` php artisan make:command BackupDatabase ```

## Step 2: Set up db Credentials

```

 {
        $databaseName = config('database.connections.mysql.database');
        $username = 'root';  
        $password = '';      
        $host = 'localhost'; 
        $port = config('database.connections.mysql.port', '3306');

```

## Step 3: backup data

``` php artisan backup:database ```


## Step 4: saved sql database

![Screenshot 2024-08-28 151545](https://github.com/user-attachments/assets/df6bf261-8b54-45f3-9178-cc1e5b31c8dd)

## Refrences 

https://medium.com/@maitrikt1998/laravel-11-implementing-daily-database-backups-without-the-need-for-packages-506a4b1bc188
