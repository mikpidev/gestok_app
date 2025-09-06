<style>
    .gestok-form-card {
        background: #fff;
        color: #000;
        width: 100%;
        max-width: 450px;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.2);
        overflow: hidden;
        margin: 2rem auto;
    }
    .gestok-form-header {
        background: #000;
        color: #fff;
        padding: 1.5rem;
        text-align: center;
    }
    .gestok-form-header h1 {
        font-size: 1.6rem;
        font-weight: bold;
        margin: 0;
    }
    .gestok-form-header p {
        font-size: 0.9rem;
        margin-top: 0.5rem;
    }
    .gestok-form-body {
        padding: 2rem;
    }
    .gestok-form-body label {
        font-size: 0.9rem;
        display: block;
        margin-bottom: 0.3rem;
        font-weight: 500;
    }
    .gestok-form-body input[type="email"],
    .gestok-form-body input[type="password"],
    .gestok-form-body input[type="text"],
    .gestok-form-body input[type="numeric"],

    .gestok-form-body select {
        width: 100%;
        padding: 0.6rem;
        margin-bottom: 1rem;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 0.95rem;
        box-sizing: border-box;
    }
    .gestok-form-body select {
        background: #fff;
        cursor: pointer;
    }
    .gestok-form-body .btn {
        background: #000;
        color: #fff;
        border: none;
        padding: 0.8rem 1.5rem;
        border-radius: 5px;
        cursor: pointer;
        font-size: 0.95rem;
        font-weight: bold;
        width: 100%;
        margin-bottom: 1rem;
        text-decoration: none;
        display: inline-block;
        text-align: center;
    }
    .gestok-form-body .btn:hover {
        background: #333;
    }
    .gestok-form-body .btn-secondary {
        background: #666;
        color: #fff;
    }
    .gestok-form-body .btn-secondary:hover {
        background: #555;
    }
    .gestok-form-body .text-danger {
        color: #dc3545;
        font-size: 0.8rem;
        margin-top: -0.8rem;
        margin-bottom: 0.8rem;
    }
    .gestok-form-body .form-text {
        font-size: 0.8rem;
        color: #666;
        margin-top: -0.8rem;
        margin-bottom: 0.8rem;
    }
    .gestok-form-actions {
        display: flex;
        gap: 0.5rem;
        flex-direction: column;
    }
    @media (min-width: 400px) {
        .gestok-form-actions {
            flex-direction: row;
        }
        .gestok-form-actions .btn {
            width: auto;
            flex: 1;
            margin-bottom: 0;
        }
    }
</style>

<div class="gestok-form-card">
    <div class="gestok-form-header">
        <h1>{{ isset($productType) ? 'Editar Producto' : 'Nuevo Producto' }}</h1>
        <p>{{ $store->store_name }}</p>
    </div>
    <div class="gestok-form-body">
        <form action="{{ isset($productType) ? route('stores.product_types.update', [$store->id, $productType->id]) : route('stores.product_types.store', $store->id) }}" method="POST">
            @csrf
            @if(isset($productType))
                @method('PUT')
            @endif
            <input type="hidden" name="company_id" id="company_id" class="form-control" value="{{ old('company_id', $store->company_id ?? '') }}" required>
            <input type="hidden" name="store_id" id="store_id" class="form-control" value="{{ old('store_id', $store->id ?? '') }}" required>
            
            <label for="name">Nombre</label>
            <input type="text" id="name" name="name" value="{{ old('name', $productType->name ?? '') }}" required>
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            <label for="price">Precio</label>
            <input type="numeric" id="price" name="price" step="0.00" value="{{ old('price', $productType->price ?? '') }}" required>
            @error('price')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            <label for="stock">Cantidad</label>
            <input type="numeric" id="stock" name="stock" min="1" step="1" value="{{ old('stock', $productType->stock ?? '') }}" required>
            @error('stock')
                <div class="text-danger">{{ $message }}</div>   
            @enderror
            <label for="category">Categoría</label>
            <input type="text" id="category" name="category" value="{{ old('category', $productType->category ?? '') }}" required>
            @error('category')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            <label for="description">Descripción</label>
            <input type="text" id="description" name="description" value="{{ old('description', $productType->description ?? '') }}" required>
            @error('description')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            
            <div class="gestok-form-actions">
                <button type="submit" class="btn">
                    {{ isset($productType) ? 'Actualizar Producto' : 'Crear Producto' }}
                </button>
                <a href="{{ route('stores.product_types.index', $store->id) }}" class="btn btn-secondary">
                    Cancelar
                </a>
            </div>
        </form>
    </div>
</div>


