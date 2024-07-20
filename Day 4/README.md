

## Table of Contents
- [Middleware](#Middleware)
- [Controller](#Controller)
- [Databse](#Databse)
- [CURD operations](#CURD-operations)
- [Assignment](#Assignment)

## Middleware




## Databse
to set up the configration of the databse, we shall check the file ``` .env ```. 

In case of Laravel project protject inistilization, if i haven't create a databse, I can run the comman line:
``` php artisan migrate ```



## CURD operations

If we want to create new table in a databse, we can write this command

``` php artisan make:migration create_cars_table```

Then we can navigate to migration folder, and we now have a new file called  ``` 2024_07_20_154229_create_cars_table.php ```
Then we will create the new schema as follow:

```

$table->id();
$table->string('carTitle', 100);
$table->text('description');
$table->float('price');
$table->boolean('published');
$table->timestamps();

```

Then to push these changes into out databse, we write

``` php artisan migrate ```

Now we have the cars table in our db

<img width="959" alt="image" src="https://github.com/user-attachments/assets/f0a94e6c-2f44-46f2-85e2-3e2ee61119a1">

## Controller

![image](https://github.com/user-attachments/assets/6e68801c-4436-46e8-ba46-8f1b3e6037c3)

After that we will create the model, it has to be single, and 1st capital letter, since it's a class. We will use the coman

``` php artisan make:model Car ```

Then, in the app dir, in the model dir, a new car.php file will be created. We will add to it

```

class Car extends Model
{
    use HasFactory;
    protected $fillable = [
        'carTitle',
        'description',
        'price',
        'published'
    ];
}
```

We will make a new controller, using the command
``` php artisan make:controller CarController -r ```


## Assignment

create classes

migration file, model, crud controller 'create & store working'

data

- class name
- capacity
- is fulled
- price
- time from
- time to
