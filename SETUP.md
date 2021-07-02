# Laravel School

// alternativ for php artisan serve

- php -S localhost:8000 -t public/

## authentication

- composer require laravel/jetstream

- php artisan jetstream:install livewire

- npm install && npm run dev

## enable features

- config/fortify.php & jetstream.php

### test users

- youremail@yourprovider.ch

- siteart@feritel.swiss

- test1234

### get data into view

## Eloquent

use App\Models\User;

Route::middleware...

-  $users = User::all();
- return view('dashboard', compact('users'));

change timeformat in view // $user->created_at->diffForHumans() 

## Querybuilder

use Illuminate\Support\Facades\DB;

-  $users = DB::table('users')->get();

- {{ Carbon\Carbon::parse($user->created_at)->diffForHumans() }}

## pagination

-  $categories = Category::latest()->paginate(5);

- on blade add  {{ $categories->links() }}

## count tableitems by index

- {{ $categories->firstItem()+$loop->index }}

- count items in blade without index @php($i 0 1) return view with {{ $i++ }}

## relate different tables 

- Eloquent: "return $this->hasOne(User::class, 'id', 'user_id');" in Category Model

- then you can access it in blade with {{$category->user->name}}

- Querybuilder: 

```PHP
    $categories = DB::table('categories)
                  ->join('users', 'categories.user_id', 'users.id')
                  ->select('categories.*', 'user.name')
                  ->latest()->paginate(5);
```
- in blade access it with {{ $category->name }}

## display images

// you want to put the style into an external file
```HTML
<img src="{{ asset($brand->brand_image) }}"style="height:3rem; with:4rem;" alt="{{$brand->brand_name}}">
```

## Laravel Image Intervention

[Intervention Image](http://image.intervention.io/)

## Enable Profilephoto update with jetstream or change setings in jetstream.php

```PHP
php artisan storage:link
```
- set a link to storage folder where profile photo is located storage/app/public/profile-photos/

- change APP_URL in .env to http://127.0.0.1:XXXX->(port you use) to let laravel find the photo

## deploy app

- export database

- php artisan config:cache

- php artisan cache:clear

- php artisan view:clear

- zip App folder

- create database

- import .sql file

- unzip file into homeroute

- delete bootstrap/cache/config.php

- create .htaccess file on server and fill it with [githublink](https://gist.github.com/liaotzukai/8e61a3f6dd82c267e05270b505eb6d5a)

- done :-)
