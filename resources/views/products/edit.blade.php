<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Produto</title>
</head>
<body>
    <h1>Editar Produto</h1>

    <form action="{{ route('products.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Nome:</label>
        <input type="text" name="name" value="{{ $product->name }}" required>
        <br><br>

        <label>Quantidade:</label>
        <input type="number" name="quantity" value="{{ $product->quantity }}" required>
        <br><br>

        <label>Preço:</label>
        <input type="text" name="price" value="{{ $product->price }}" required>
        <br><br>

        <button type="submit">Atualizar</button>
    </form>
</body>
</html>