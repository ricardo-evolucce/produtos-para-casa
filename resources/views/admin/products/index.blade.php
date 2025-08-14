@extends('layouts.admin')

@section('title', 'Product List')

@section('content')

<h1>Products</h1>

@if(session('success'))
    <div style="color: green; margin-bottom: 1rem;">
        {{ session('success') }}
    </div>
@endif

<a href="{{ route('admin.products.create') }}" style="margin-bottom: 1rem; display: inline-block;">+ New Product</a>

<table border="1" cellpadding="5" cellspacing="0" style="border-collapse: collapse; width: 100%;">
    <thead>
        <tr style="background-color: #f0f0f0;">
            <th>ID</th>
            <th>Name</th>
            <th>Category</th>
            <th>Price (R$)</th>
            <th>URL</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    @foreach($products as $product)
        <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->category }}</td>
            <td>{{ number_format($product->price, 2, ',', '.') }}</td>
            <td><a href="{{ $product->url }}" target="_blank" rel="noopener noreferrer">Link</a></td>
            <td>
                <a href="{{ route('admin.products.edit', $product->id) }}">Edit</a> |
                <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure want to delete this product?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" style="background:none; border:none; color:red; cursor:pointer; padding:0;">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

<div class="pagination-wrapper" style="margin-top: 1rem;">
    {{ $products->links('pagination::bootstrap-5') }}

</div>

@endsection

@section('styles')
<style>
    /* Estilizando a paginação padrão do Laravel */
 .pagination {
    display: flex;
    justify-content: center;
    list-style: none;
    padding: 0;
}

.pagination li {
    margin: 0 5px;
}

.pagination a,
.pagination span {
    display: inline-block;
    padding: 6px 12px;
    font-size: 14px;
    background: #f8f9fa;
    border: 1px solid #ddd;
    color: #007bff;
    text-decoration: none;
}

.pagination .active span {
    background: #007bff;
    color: white;
    border-color: #007bff;
}

.pagination a:hover {
    background: #e9ecef;
}

</style>
@endsection
