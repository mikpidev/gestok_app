<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Gestok')</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background: #f2f2f2;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }
        .auth-card {
            background: #fff;
            color: #000;
            width: 100%;
            max-width: 400px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.2);
            overflow: hidden;
        }
        .auth-header {
            background: #000;
            color: #fff;
            padding: 1.5rem;
            text-align: center;
        }
        .auth-header h1 {
            font-size: 1.6rem;
            font-weight: bold;
            margin: 0;
        }
        .auth-header p {
            font-size: 0.9rem;
            margin-top: 0.5rem;
        }
        .auth-body {
            padding: 2rem;
        }
        label {
            font-size: 0.9rem;
            display: block;
            margin-bottom: 0.3rem;
        }
        input[type="email"],
        input[type="password"],
        input[type="text"] {
            width: 100%;
            padding: 0.6rem;
            margin-bottom: 1rem;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 0.95rem;
        }
        .actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        input[type="checkbox"] {
            margin-right: 0.4rem;
        }
        .btn {
            background: #000;
            color: #fff;
            border: none;
            padding: 0.6rem 1.2rem;
            border-radius: 5px;
            cursor: pointer;
            font-size: 0.95rem;
            font-weight: bold;
        }
        .btn:hover {
            background: #333;
        }
        .link {
            font-size: 0.85rem;
            color: #000;
            text-decoration: underline;
        }
        .link:hover {
            text-decoration: none;
        }
        .register, .extra {
            text-align: center;
            margin-top: 1.2rem;
            font-size: 0.9rem;
        }
        .register a, .extra a {
            color: #000;
            font-weight: bold;
        }
    </style>
    
</head>
<body>
    <div class="auth-card">
        <div class="auth-header">
            <h1>Gestok</h1>
            <p>@yield('subtitle')</p>
        </div>
        <div class="auth-body">
            @yield('content')
        </div>
    </div>
</body>
</html>
