<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        :root {
            --bg-color: #121212;
            --text-color: #ffffff;
            --card-bg-color: #1f1f1f;
            --border-color: #424242;
            --link-color: #bb86fc;
        }

        html, body {
            margin: 0;
            padding: 0;
            background-color: var(--bg-color);
            color: var(--text-color);
            min-height: 100vh;
            height: 100%;
            width: 100%;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            background-color: var(--bg-color);
            width: 100%;
            max-width: 600px;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .card-body, .border {
            background-color: var(--card-bg-color);
            border: 1px solid var(--border-color);
            border-radius: 8px;
            padding: 20px;
            margin-top: 20px;
            color: var(--text-color);
        }

        a {
            color: var(--link-color);
            text-decoration: none;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>Web Pengajuan Beasiswa</title>
</head>
<body style="background-color: #121212">
    <div class="container py-5">
        <div class="w-50 center border rounded px-3 py-3 mx-auto">
            <h1>Register</h1>
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                    @foreach ($errors->all() as $item)
                    <li>{{ $item }}</li>
                    @endforeach
                    </ul>
                </div>
            @endif
            <div class="card-body">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" value="{{ old('name')}}" class="form-control" id="name" required autofocus autocomplete="name">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" name="email" value="{{ old('email')}}" class="form-control" id="email" required autocomplete="username">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="password" required autocomplete="new-password">
                    </div>
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                        <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" required autocomplete="new-password">
                    </div>
                    <div class="mb-3">
                        <div class="d-grid">
                            <button name="submit" type="submit" class="btn btn-primary">Register</button>
                        </div>
                    </div>
                    <div class="flex items-center justify-end mt-4">
                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                            {{ __('Already registered?') }}
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if($message = Session::get('failed'))
        <script>
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "{{$message}}",
            });
        </script>    
    @endif
</body>
</html>
