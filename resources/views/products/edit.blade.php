<!DOCTYPE html>
<html lang="pt-br" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Produto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                
                <div class="card shadow">
                    <div class="card-header bg-warning text-dark">
                        <h4 class="mb-0">Editar Produto</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('products.update', $product->id) }}" method="POST">
                            @csrf 
                            @method('PUT')
                    
                            <div class="mb-3">
                                <label class="form-label">Nome do Produto:</label>
                                <input type="text" name="name" class="form-control" value="{{ $product->name }}" required>
                            </div>
                    
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Quantidade:</label>
                                    <input type="number" name="quantity" class="form-control" value="{{ $product->quantity }}" required>
                                </div>
                        
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Preço (R$):</label>
                                    <input type="text" name="price" class="form-control" value="{{ number_format($product->price, 2, ',', '') }}" required>
                                </div>
                            </div>
                    
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-warning btn-lg">Atualizar Dados</button>
                                <a href="{{ route('products.index') }}" class="btn btn-outline-secondary">Cancelar</a>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

</body>
</html>