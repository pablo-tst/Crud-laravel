<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Produto</title>
</head>
<body>
    <h1>Novo Produto</h1>

    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        
        <label>Nome:</label>
        <input type="text" name="name" required>
        <br><br>

        <label>Quantidade:</label>
        <input type="number" name="quantity" required>
        <br><br>

        <label>Preço:</label>
        <input type="text" name="price" placeholder="10.50" required>
        <br><br>

        <button type="submit">Salvar</button>
    </form>
</body>
</html>