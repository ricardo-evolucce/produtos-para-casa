<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder2 extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'name' => 'kit Tapete para Banheiro de Secagem Rápida e Super Absorvente',
                'category' => 'casa',
                'price' => 30.00,
                'url' => 'https://s.shopee.com.br/6Ku24sK5g1',
                'image' => 'img/kit Tapete para Banheiro de Secagem Rápida e Super Absorvente.webp',
                'description' => 'Ideal para Chuveiro Cozinha e Varanda',
            ],
            [
                'name' => 'Mesas de Cabeceira Retro para Quarto Casal ou Solteiro Nicho Decoração Palma',
                'category' => 'casa',
                'price' => 50.00,
                'url' => 'https://s.shopee.com.br/6pqIfv9jNM',
                'image' => 'img/Mesas de Cabeceira Retro para Quarto Casal ou Solteiro Nicho Decoração Palma.webp',
                'description' => 'Itens essenciais sempre ao alcance',
            ],
            [
                'name' => 'Suporte Para Celular E Tablet Ajustável Apoio Mesa',
                'category' => 'aromas',
                'price' => 40.00,
                'url' => 'https://s.shopee.com.br/4flo5HhLAj',
                'image' => 'img/Suporte Para Celular E Tablet Ajustável Apoio Mesa.webp',
                'description' => 'Altura e ângulo reguláveis para melhor ergonomia e postura, em qualquer lugar.',
            ],
            [
                'name' => 'Inox Prata Torneira Com Chuveiro Com Rotação De 360°',
                'category' => 'aromas',
                'price' => 119.80,
                'url' => 'https://s.shopee.com.br/40W7IwJGHd',
                'image' => 'img/Inox Prata Torneira Com Chuveiro.webp',
                'description' => 'Cozinha Luxo Parede Promoção',
            ],
            [
                'name' => 'Kit 2 Prateleiras Suporte Com Alto Adesivos Para Parede',
                'category' => 'casa',
                'price' => 35.00,
                'url' => 'https://s.shopee.com.br/AA6keSMxts',
                'image' => 'img/Kit 2 Prateleiras Suporte Com Alto Adesivos Para Parede.webp',
                'description' => 'Banheiro Cozinha Lavanderia Shampoo Sabonete',
            ],
            [
                'name' => 'Cabide Adulto Preto Kit 100 Cabides',
                'category' => 'casa',
                'price' => 16.99,
                'url' => 'https://s.shopee.com.br/1VomKdV8GA',
                'image' => 'img/cabide adulto preto.webp',
                'description' => 'Reforçados Organizar Roupas',
            ],
            [
                'name' => 'Lençol Protetor Ajustável Macio e Impermeável Decorativo Avulso',
                'category' => 'casa',
                'price' => 39.90,
                'url' => 'https://s.shopee.com.br/AA6keiXHAh',
                'image' => 'img/Lençol Protetor Ajustável Macio.webp',
                'description' => 'Para Colchão Berço, Solteiro, Casal, Queen e King',
            ],
            [
                'name' => 'Haste De Limpeza Esgoto Banheiro Cozinha',
                'category' => 'casa',
                'price' => 23.99,
                'url' => 'https://s.shopee.com.br/10sVk0c8fY',
                'image' => 'img/Haste De Limpeza Esgoto Banheiro Cozinha Limpador E Desentupidor Pia Ralo.webp',
                'description' => 'Limpador E Desentupidor Pia Ralo',
            ],
            [
                'name' => 'Espelho Adesivo Plástico Decorativo',
                'category' => 'casa',
                'price' => 80.00,
                'url' => 'https://s.shopee.com.br/gFfLY8yDj',
                'image' => 'img/Espelho Adesivo Plástico Decorativo.webp',
                'description' => 'Flexível Adesivo Espelhado Retangular ou Oval 30x40',
            ],
        ];

        DB::table('products')->insert($products);
    }
}
