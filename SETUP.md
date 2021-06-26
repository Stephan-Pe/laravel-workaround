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

- stephanpetersen@bluewin.ch

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