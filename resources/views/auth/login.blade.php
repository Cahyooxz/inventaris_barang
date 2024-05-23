<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
        {{-- font --}}
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Figtree:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
        
        {{-- css --}}
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    
        {{-- icon --}}
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center align-items-center min-vh-100">
            <div class="col-5">
                <div class="card p-3">
                    <div class="card-body">
                        <h4 class="fw-bold mb-3">Login</h4>
                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                            <label for="Username" class="mt-3 mb-3">Username</label>
                            <input type="text" required class="form-control" autofocus autocomplete="username" name="username">
                            <x-input-error :messages="$errors->get('username')" class="mt-2" />

                            <label for="password" class="mt-3 mb-3">Password</label>
                            <input type="password" required class="form-control mb-3" autofocus autocomplete="password" name="password">
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />

                            <button type="submit" class="btn btn-dark mt-3 w-100">Login</button>
                        </form>  
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
