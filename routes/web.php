<?php

use Illuminate\Support\Facades\Route;

$flowers = [
    ['id' => 1, 'name' => 'Rose', 'image' => 'rose.png', 'desc' => 'A classic red rose symbolizing love and passion.', 'price' => '60.000 - 100.000', 'detail' => ' Simbol cinta dan keindahan abadi. Mawar merah melambangkan gairah dan romantisme. Setiap kelopaknya menceritakan kisah cinta yang tak lekang oleh waktu.'],
    ['id' => 2, 'name' => 'Tulip', 'image' => 'tulip.png', 'desc' => 'A vibrant tulip, perfect for brightening up any space.', 'price' => '300.000 - 500.000', 'detail' => 'Keanggunan dalam kesederhanaan. Tulip melambangkan kasih sayang, kenyamanan, dan kebahagiaan. Dengan warnanya yang beragam, setiap tulip menyampaikan perasaan dengan kelembutan dan kehangatan.'],
    ['id' => 3, 'name' => 'Sunflower', 'image' => 'sunflower.png', 'desc' => 'A cheerful sunflower that brings warmth and happiness.', 'price' => '60.000', 'detail' => 'Lambang kebahagiaan dan keteguhan. Seperti matahari yang selalu bersinar, bunga ini melambangkan kegembiraan, harapan, dan kesetiaan. Energinya yang cerah membawa kehangatan dalam setiap hati.'],
    ['id' => 4, 'name' => 'Lily', 'image' => 'lily.png', 'desc' => 'A delicate white lily representing purity and peace.', 'price' => '100.000', 'detail' => 'Simbol kemurnian dan kemegahan. Bunga lili putih sering dikaitkan dengan ketulusan dan kelembutan, sementara lili oranye melambangkan gairah. Aromanya yang lembut menenangkan jiwa dan membawa kedamaian.'],
    ['id' => 5, 'name' => 'Orchid', 'image' => 'orchid.png', 'desc' => 'An exotic orchid known for its elegance and beauty.', 'price' => '75.000', 'detail' => 'Elegansi yang misterius. Anggrek melambangkan keindahan eksotis, cinta yang mendalam, dan keberanian. Bentuknya yang unik menjadikannya simbol keanggunan dan kemewahan.'],
    ['id' => 6, 'name' => 'Daisy', 'image' => 'daisy.png', 'desc' => 'A simple yet charming daisy full of joy.', 'price' => '15.000 - 20.000', 'detail' => 'Kesederhanaan yang menawan. Dengan kelopak putih dan pusat kuning cerah, bunga daisy melambangkan kepolosan, harapan, dan awal yang baru. Seperti sinar matahari pagi, ia membawa kebahagiaan ke dalam kehidupan.'],
    ['id' => 7, 'name' => 'Lavender', 'image' => 'lavender.png', 'desc' => 'A fragrant lavender that soothes the senses.', 'price' => '85.000', 'detail' => ' Aroma ketenangan dan kesejahteraan. Lavender melambangkan ketenangan, keanggunan, dan perlindungan. Wanginya yang khas memberikan kedamaian dan relaksasi, seperti pelukan hangat di senja yang indah.'],
    ['id' => 8, 'name' => 'Peony', 'image' => 'peony.png', 'desc' => 'A luxurious peony representing prosperity.', 'price' => '100.000 - 125.000', 'detail' => 'Keberuntungan dan kemakmuran. Dengan kelopak yang berlapis indah, peony melambangkan kebahagiaan, cinta yang langgeng, dan kehidupan yang penuh berkah. Pesonanya yang mewah membuatnya istimewa di setiap momen bahagia.'],
    ['id' => 9, 'name' => 'Chrysanthemum', 'image' => 'chrysanthemum.png', 'desc' => 'A symbol of longevity and happiness.', 'price' => '30.000', 'detail' => 'Keindahan yang abadi. Bunga krisan melambangkan keceriaan, persahabatan, dan umur panjang. Warna-warninya yang memikat memberikan nuansa semangat dan optimisme dalam kehidupan.'],
    ['id' => 10, 'name' => 'Carnation', 'image' => 'carnation.png', 'desc' => 'A romantic carnation with deep meanings.', 'price' => '85.000', 'detail' => 'Simbol cinta yang lembut. Anyelir merah muda melambangkan rasa syukur, sementara yang merah melambangkan cinta yang dalam. Kelopaknya yang berombak memberikan kesan anggun dan romantis, sempurna untuk mengungkapkan kasih sayang yang tulus.']
];

Route::get('/', function () use ($flowers) {
    return view('home', ['flowers' => $flowers]);
});

Route::get('/catalog', function () use ($flowers) {
    return view('catalog', ['flowers' => $flowers]);
});

Route::get('/catalog/{id}', function ($id) use ($flowers) {
    $flower = collect($flowers)->firstWhere('id', $id);

    if (!$flower) {
        abort(404);
    }

    return view('detail', ['flower' => $flower]);
});
