
## Table of Contents
- [Fallback](#Fallback)
- [View](#View)
- [Constraints](#cCnstraints)
- [prefix group](#prefix-group)
- [Assignment](#Assignment)

## Fallback

The purpose of using it so when the user head into a wrong uri, the server returns a user-frendly error.

E.g

```
Route: faallback(function(){
         return redirect('/');
        })
```

## View

In order to display a front-end page, the page should be located inside the directory
```
resources
|___ Views
|____|______welcome.blade.php
```

Then I have to pass my FE page into this route, using the get function:

```
Route: :get('', function () {
         return view('welcome');
         })
```

#### Example

```
Route: :get('', function () {
         return view('cv');
         })
```

#### Mian Route

```

Route: :get('link', function () {
$url = route('w');
         return "<a href='$url'>go to welcome</a>";
})

Route: :get('welcome', function () {
         return "welcome to laravel";
         })->name('w');

```
