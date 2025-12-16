<!DOCTYPE html>
<html lang="pt-br" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Controle de Estoque</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="d-flex align-items-center py-4 bg-body-tertiary" style="height: 100vh;">
    
    <main class="form-signin w-100 m-auto" style="max-width: 330px; padding: 15px;">
        <form action="{{ route('login.auth') }}" method="POST">
            @csrf
            <h1 class="h3 mb-3 fw-normal text-center">Acesso Restrito</h1>

            <div class="form-floating mb-2">
                <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com" required>
                <label for="floatingInput">E-mail</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password" required>
                <label for="floatingPassword">Senha</label>
            </div>

            <button class="btn btn-primary w-100 py-2" type="submit">Entrar no Sistema</button>
            
            @if($errors->any())
                <div class="alert alert-danger mt-3">
                    {{ $errors->first() }}
                </div>
            @endif
        </form>
    </main>

</body>
</html>