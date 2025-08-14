<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsSeeder extends Seeder
{
    public function run()
    {
        $products = [
            [
                'name' => 'Carregador sem fio por indução 15W para iPhone - Branco',
                'description' => null,
                'image' => 'img/carregador-inducao-wireless-iphone-15w-branco.webp',
                'url' => 'https://s.shopee.com.br/7V5xRSWBHQ',
                'category' => 'utilidades',
                'price' => 200.00,
                'alt' => 'Carregador sem fio por indução 15W para iPhone - Branco',
            ],
            [
                'name' => 'Robô Aspirador Automático Mondial Multi Clean 30W',
                'description' => 'Aspirador robô bivolt com tecnologia automática para facilitar a limpeza diária da sua casa.',
                'image' => 'img/robo-aspirador.webp',
                'url' => 'https://s.shopee.com.br/2qK6f2ubVg',
                'category' => 'limpeza',
                'price' => 300.00,
                'alt' => 'Robô Aspirador Automático Mondial Multi Clean Bivolt 30W - Ideal para Limpeza Doméstica',
            ],
            [
                'name' => 'Mini Robô Aspirador 3 em 1 Inteligente e Silencioso',
                'description' => 'Compacto e eficiente, aspira, varre e limpa com baixo ruído. Ideal para ambientes pequenos.',
                'image' => 'img/robo-varredor-aspirador-3-em-1.webp',
                'url' => 'https://s.shopee.com.br/4q5B3BbH9h',
                'category' => 'limpeza',
                'price' => 87.00,
                'alt' => 'Mini Robô Aspirador de Pó 3 em 1 Inteligente e Silencioso para Limpeza Automática',
            ],
            [
                'name' => 'Kit 2 Luminárias LED Inteligentes com Sensor de Movimento USB',
                'description' => 'Luminárias recarregáveis com sensor de movimento, ideais para ambientes internos e econômicas.',
                'image' => 'img/kit-2-luminarias-led-inteligentes-sensor-movimento-usb.jpg',
                'url' => 'https://s.shopee.com.br/4VSKftNqSQ',
                'category' => 'iluminacao',
                'price' => 13.90,
                'alt' => 'Kit com 2 luminárias LED inteligentes com sensor de movimento e recarregáveis por USB',
            ],
            [
                'name' => 'Câmera de Segurança 360° Wi-Fi com Encaixe de Lâmpada',
                'description' => 'Monitoramento inteligente com visão 360° e fácil instalação em soquete de lâmpada.',
                'image' => 'img/camera-seguranca-360-wifi-encaixe-lampada.webp',
                'url' => 'https://s.shopee.com.br/8Kf3FbwgZ1',
                'category' => 'seguranca',
                'price' => 53.00,
                'alt' => 'Câmera de segurança Wi-Fi 360 graus com encaixe para lâmpada inteligente',
            ],
            [
                'name' => 'Fechadura Digital Biométrica Inteligente Com Corpo De Trava',
                'description' => null,
                'image' => 'img/Fechadura Digital Biométrica Inteligente Com Corpo De Trava.webp',
                'url' => 'https://s.shopee.com.br/1qRZWI0S58',
                'category' => 'seguranca',
                'price' => 348.99,
                'alt' => 'Fechadura Digital Biométrica Inteligente Com Corpo De Trava',
            ],
            [
                'name' => 'Refletor LED Solar 300W com Placa e Bateria à Prova D\'água',
                'description' => null,
                'image' => 'img/refletor-solar.webp',
                'url' => 'https://s.shopee.com.br/3VZnVVvIBB',
                'category' => 'iluminacao',
                'price' => 95.88,
                'alt' => 'Refletor LED Solar 300W com Placa e Bateria à Prova D\'água',
            ],
            [
                'name' => 'Kit 4 Luminárias Solares Vintage com Sensor para Área Externa',
                'description' => null,
                'image' => 'img/Kit 4 Luminária Arandela Vintage Placa Solar Lâmpada Externa Moderna Decoração Com Sensor.webp',
                'url' => 'https://s.shopee.com.br/10sSX6QlSa',
                'category' => 'iluminacao',
                'price' => 49.90,
                'alt' => 'Kit 4 Luminárias Solares Vintage com Sensor para Área Externa',
            ],
            [
                'name' => 'Módulo Interruptor Inteligente Tuya Wi-Fi 1 Canal 16A',
                'description' => null,
                'image' => 'img/Módulo Interruptor Inteligente.webp',
                'url' => 'https://s.shopee.com.br/9KXaSdxML2',
                'category' => 'automacao',
                'price' => 25.00,
                'alt' => 'Módulo Interruptor Inteligente Tuya Wi-Fi 1 Canal 16A',
            ],
            [
                'name' => 'Interruptor Inteligente Touch com Controle Remoto Wi-Fi',
                'description' => null,
                'image' => 'img/Interruptor Inteligente Touch com Controle Remoto Sem Fio para Alexa e Google Home.webp',
                'url' => 'https://s.shopee.com.br/2B4Pvj9NbS',
                'category' => 'automacao',
                'price' => 69.00,
                'alt' => 'Interruptor Inteligente Touch com Controle Remoto Wi-Fi',
            ],
            [
                'name' => 'Motor De Cortina Obturador De Rolo Inteligente Abridor Tempo Mais Próximo Controle De Aplicativo',
                'description' => null,
                'image' => 'img/Motor De Cortina Obturador De Rolo Inteligente Abridor Tempo Mais Próximo Controle De Aplicativo.webp',
                'url' => 'https://s.shopee.com.br/8ALd4tavbY',
                'category' => 'automacao',
                'price' => 229.99,
                'alt' => 'Motor De Cortina Obturador De Rolo Inteligente Abridor Tempo Mais Próximo Controle De Aplicativo',
            ],
            [
                'name' => 'Kit 4 Luminárias Solares com Sensor de Presença e 3 Modos',
                'description' => null,
                'image' => 'img/4 Luminária Solar 100 Led Sensor Presença Com 3 Funções luminária solar parede.webp',
                'url' => 'https://s.shopee.com.br/qZ2LhVAyu',
                'category' => 'iluminacao',
                'price' => 199.99,
                'alt' => 'Kit 4 Luminárias Solares com Sensor de Presença e 3 Modos',
            ],
            [
                'name' => 'Lâmpada LED Inteligente Smart Wi-Fi 10W E27 Avant Neo',
                'description' => null,
                'image' => 'img/Lampada Led Pera Smart Inteligente Wi Fi 10w 2700K-6500K.webp',
                'url' => 'https://s.shopee.com.br/20l0nrZe8G',
                'category' => 'iluminacao',
                'price' => 20.90,
                'alt' => 'Lâmpada LED Inteligente Smart Wi-Fi 10W E27 Avant Neo',
            ],
            [
                'name' => 'Assistente Virtual Alexa Echo Dot 5 Geração Alto Falante Original Com NF Envio Imediato',
                'description' => null,
                'image' => 'img/Assistente Virtual Alexa Echo Dot 5 Geração Alto Falante Original Com NF Envio Imediato.webp',
                'url' => 'https://s.shopee.com.br/6fWqNkuNiN',
                'category' => 'assistente',
                'price' => 397.90,
                'alt' => 'Assistente Virtual Alexa Echo Dot 5 Geração Alto Falante Original Com NF Envio Imediato',
            ],
            // Agora produtos extras que estavam no HTML com descrição e outros links:
            [
                'name' => 'Mini Umidificador Difusor Aromatizador Egg Portátil USB LED',
                'description' => 'Umidificador USB silencioso com LED, melhora ar e hidrata pele.',
                'image' => 'img/mini-umidificador-difusor-egg-usb-led.webp',
                'url' => 'https://s.shopee.com.br/1qRcSzR2lc',
                'category' => 'aromas',
                'price' => 40.00,
                'alt' => 'Mini Umidificador Difusor Aromatizador Egg Portátil USB LED Aromatizador De Ambiente Purificador De Ar Casa Escritório Escola',
            ],
            [
                'name' => 'Difusor De Aromas, Umidificador De Ar Ultra-Sônico 500Ml',
                'description' => 'Difusor ultrassônico 500ml com LED, controle remoto e aromaterapia.',
                'image' => 'img/difusor-aromas-umidificador-ultrasonico-500ml.webp',
                'url' => 'https://s.shopee.com.br/4L8xQGpTVb',
                'category' => 'aromas',
                'price' => 300.99,
                'alt' => 'Difusor De Aromas, Umidificador De Ar Ultra-Sônico 500Ml',
            ],
            [
                'name' => 'Vela aromática perfumada artesanal PREMIUM 110g 5 fragrâncias',
                'description' => 'Aromas sofisticados que criam ambientes acolhedores e elegantes.',
                'image' => 'img/vela-aromatica-premium-110g-5-fragrancias.webp',
                'url' => 'https://s.shopee.com.br/3qCgr5E9TM',
                'category' => 'aromas',
                'price' => 28.90,
                'alt' => 'Vela aromática perfumada artesanal PREMIUM 110g 5 fragrâncias',
            ],
            [
                'name' => 'Vela Aromática Frutas Vermelhas Perfumada | Pavio Duplo',
                'description' => 'Aroma frutado e doce que transforma qualquer ambiente em aconchego.',
                'image' => 'img/vela-aromatica-frutas-vermelhas-pavio-duplo.webp',
                'url' => 'https://s.shopee.com.br/1g8CFfMKS9',
                'category' => 'aromas',
                'price' => 34.90,
                'alt' => 'Vela Aromática Frutas Vermelhas Perfumada | Pavio Duplo',
            ],
            [
                'name' => 'Umidificador E Aromatizador De Ar Grande 8H Difusor Elétrico Ultrassónico Portátil LED',
                'description' => 'Design natural em madeira com névoa silenciosa para ar saudável e relaxante.',
                'image' => 'img/umidificador-ar-grande-8h-led-ultrassonico.webp',
                'url' => 'https://s.shopee.com.br/4L8xQpAwFe',
                'category' => 'aromas',
                'price' => 200.00,
                'alt' => 'Umidificador E Aromatizador De Ar Grande 8H Difusor Elétrico Ultrassónico De Ambiente Portátil Led',
            ],
            // Outros produtos do HTML original que não repeti e que você queira, avise.
        ];

        DB::table('products')->insert($products);
    }
}
