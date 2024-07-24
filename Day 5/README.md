
## Protected Tables

We need to follow a specfic rules in order for Laravel to make the integeration

## Store function

Assosiated array contains of key and value

```
if(isset($request->published)) {
        $pub = true;
        } else {
        $pub = false;
        }  

$data = [
//'k' => 'v'
'carTitle' => $request->title,
'description' => $request->description,
'price' => $request->price,
'published' => $pub,

];

Car: :create($data);

```

## Assignment

For the ```classes``` table, launch ```index``` and display data there.
