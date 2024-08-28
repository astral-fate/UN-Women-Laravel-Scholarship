<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Assignment
- modify CarController, so it can add category_id and update it
- use @selected() directive in edit car blade file

## MCV Set-up



``` php artisan make:migration create_categories_table```

``` php artisan make:model Category ```

``` php artisan migrate ```

``` php artisan make:seeder CategorySeeder ```

php artisan make:migration add_category_id_to_cars_table --table=cars

``` php artisan db:seed ```

``` php artisan make:controller CarController -r ```

![image](https://github.com/user-attachments/assets/de15eb80-d436-4a5b-83e2-9d5044e21a4f)



![image](https://github.com/user-attachments/assets/a0b618ba-a1c5-4710-8dc1-2949b9af879a)

![image](https://github.com/user-attachments/assets/c91aab75-2c1f-46e4-aaf1-0b98d6658daf)

<img width="958" alt="image" src="https://github.com/user-attachments/assets/52d3f6d9-a211-4a17-92ca-b68f095a3e4b">

