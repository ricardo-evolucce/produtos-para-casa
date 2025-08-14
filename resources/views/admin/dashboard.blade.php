@extends('layouts.admin')

@section('title', 'Painel Administrativo')

@section('content')
<div class="admin-dashboard">
    <h1>Painel Administrativo</h1>
    <p>Bem-vindo, {{ auth()->user()->name }}!</p>

    <div class="dashboard-links">
        <a href="{{ route('admin.menus.index') }}" class="dashboard-card">
            <h3>Gerenciar Menus</h3>
            <p>Criar, editar e organizar menus do site.</p>
        </a>
        
        <a href="{{ route('admin.pages.index') }}" class="dashboard-card">
            <h3>Gerenciar Páginas</h3>
            <p>Controle o conteúdo e SEO das páginas.</p>
        </a>

        <a href="{{ route('admin.products.index') }}" class="dashboard-card">
            <h3>Gerenciar Produtos</h3>
            <p>Adicionar, editar e remover produtos.</p>
        </a>
    </div>
</div>
@endsection
