<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Produtos</title>
</head>
<body>
    <h1>Estoque</h1>
    
    <div style="background: #f4f4f4; padding: 15px; margin-bottom: 20px; border: 1px solid #ddd;">
        <strong>Resumo do Estoque:</strong><br>
        Itens Cadastrados: {{ $products->count() }} <br>
        Peças em Estoque: {{ $totalQuantity }} <br>
        Valor Total Patrimonial: R$ {{ number_format($totalValue, 2, ',', '.') }}
    </div>
    
    <a href="{{ route('products.create') }}">Novo Produto</a>

    <table border="1" width="100%">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Qtd</th>
                <th>Preço</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->quantity }}</td>
                <td>R$ {{ number_format($product->price, 2, ',', '.') }}</td>
                <td>
                    <a href="{{ route('products.edit', $product->id) }}">Editar</a>
                    
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                        @csrf 
                        @method('DELETE') 
                        <button type="submit">Excluir</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>