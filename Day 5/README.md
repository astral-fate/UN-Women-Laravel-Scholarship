
## Protected Tables

We need to follow a specfic rules in order for Laravel to make the integeration

## Store function

Assosiated array contains of key and value

```

$data = [
//'k' => 'v'
'carTitle' => $request->title,
'description' => $request->description,
'price' => $request->price,
'published' => $pub,

];

Car: :create($data);

```

We call the templete in the index sunction as follow:

```
public function index() {

        // get all cars from database
        //return view all cars, cars data
        // select * from cars;
        $cars = Car: :get();
        
        return view('cars', compact('cars'));
       }
```


Then we create a new Route:

```

Route: :get('cars',[CarController :: class,'index'])->name('cars.index');

Route: :get('classes',[ClassController :: class, 'index']);


```

Then we modify the HTML templete to include for each as follow:

```
          <tbody>
            @foreach($cars as $car) 
            <tr>
              <td scope="row">{{$car['carTitle']}}</td>
              <td>{{$car['price']}}</td>
              <td>{{$car['description']}}</td>
              <td>{{$car['published']}}</td>
              <td><a href="{{route('cars.edit', $car['id'])}}">Edit</a></td>
            </tr>
            @endforeach
```

After these changes we have t update the databse using this command

``` php artisan migrate:rollback   ```

## Assignment

For the ```classes``` table, launch ```index``` and display data there.
![image](https://github.com/user-attachments/assets/67bd1b9e-d12b-45ae-b04b-012c20dff022)


![image](https://github.com/user-attachments/assets/75296f1a-51f1-47ca-abd9-6f5bf9863d6a)
