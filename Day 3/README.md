
## Table of Contents
- [Fallback](#Fallback)
- [Routes](#Orentations)
- [Constraints](#cCnstraints)
- [prefix group](#prefix-group)
- [Assignment](#Assignment)

## Fallback

The purpose of using it so when the user head into a wrong uri, the server returns a user-frendly error.

E.g

```
Route: faallback(function(){
         return redirect('/');
        }
```

