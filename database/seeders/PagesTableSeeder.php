<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PagesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('pages')->insert([
            [
                'title' => 'Produtos para deixar a casa cheirosa',
                'slug' => 'produtos-para-deixar-a-casa-cheirosa',
                'description' => 'Descubra os melhores produtos para aromatizar sua casa e deixá-la com um cheiro agradável todos os dias.',
                'meta_description' => 'Produtos para deixar a casa cheirosa, com aromas incríveis e de longa duração.',
                'hero_image' => 'cheirosa.jpg', // ajuste conforme a imagem real
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Produtos para casa inteligente',
                'slug' => 'produtos-para-casa-inteligente',
                'description' => 'Transforme sua casa em um lar inteligente com dispositivos modernos e funcionais.',
                'meta_description' => 'Dispositivos e produtos para automatizar sua casa.',
                'hero_image' => 'casa-inteligente.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Produtos de casa mais vendidos na Shopee',
                'slug' => 'produtos-de-casa-mais-vendidos-na-shopee',
                'description' => 'Confira os produtos de casa mais vendidos na Shopee e aprovados pelos clientes.',
                'meta_description' => 'Lista dos produtos de casa mais vendidos na Shopee.',
                'hero_image' => 'mais-vendidos.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Coisas úteis para casa',
                'slug' => 'coisas-uteis-para-casa',
                'description' => 'Selecionamos itens úteis para facilitar sua rotina e melhorar sua casa.',
                'meta_description' => 'Coisas úteis e práticas para o dia a dia em casa.',
                'hero_image' => 'uteis.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
