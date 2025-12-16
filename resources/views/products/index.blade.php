<!DOCTYPE html>
<html lang="pt-br" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controle de Estoque</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>

    <nav class="navbar navbar-expand-lg bg-body-tertiary mb-4 border-bottom">
        <div class="container">
            <span class="navbar-brand mb-0 h1">Sistema Admin</span>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-outline-danger btn-sm">Sair / Logout</button>
            </form>
        </div>
    </nav>
    
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="display-6">Controle de Estoque</h1>
            <a href="{{ route('products.create') }}" class="btn btn-success btn-lg">
                <i class="bi bi-plus-circle"></i> Novo Produto
            </a>
        </div>

        <div class="card text-bg-secondary mb-4">
            <div class="card-body">
                <h5 class="card-title"><i class="bi bi-speedometer2"></i> Resumo Geral</h5>
                <div class="row text-center">
                    <div class="col-md-4">
                        <h3>{{ $products->count() }}</h3>
                        <small>Itens Cadastrados</small>
                    </div>
                    <div class="col-md-4">
                        <h3>{{ $totalQuantity ?? 0 }}</h3>
                        <small>Peças em Estoque</small>
                    </div>
                    <div class="col-md-4">
                        <h3>R$ {{ number_format($totalValue ?? 0, 2, ',', '.') }}</h3>
                        <small>Valor Patrimonial</small>
                    </div>
                </div>
            </div>
        </div>

        <form action="{{ route('products.index') }}" method="GET" class="mb-4">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Pesquisar produto por nome..." value="{{ request('search') }}">
                <button class="btn btn-primary" type="submit"><i class="bi bi-search"></i> Pesquisar</button>
                @if(request('search'))
                    <a href="{{ route('products.index') }}" class="btn btn-secondary">Limpar</a>
                @endif
            </div>
        </form>

        <div class="card shadow-sm">
            <div class="card-body p-0">
                <table class="table table-hover table-striped mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th>Nome do Produto</th>
                            <th class="text-center">Quantidade</th>
                            <th class="text-end">Preço Unitário</th>
                            <th class="text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                        <tr class="align-middle">
                            <td>{{ $product->name }}</td>
                            <td class="text-center">
                                <span class="badge bg-primary rounded-pill">{{ $product->quantity }}</span>
                            </td>
                            <td class="text-end">R$ {{ number_format($product->price, 2, ',', '.') }}</td>
                            <td class="text-center">
                                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-outline-warning">
                                    <i class="bi bi-pencil"></i> Editar
                                </a>
                                
                                <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Tem certeza que deseja excluir este item?');">
                                    @csrf 
                                    @method('DELETE') 
                                    <button type="submit" class="btn btn-sm btn-outline-danger">
                                        <i class="bi bi-trash"></i> Excluir
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        
        @if($products->isEmpty())
            <div class="alert alert-info mt-3 text-center">
                Nenhum produto cadastrado. Clique em "Novo Produto" para começar.
            </div>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>