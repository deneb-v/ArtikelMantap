<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Artikel;
use App\Model;
use Faker\Generator as Faker;
use ParagraphGenerator  as pg;
// 'title',
// 'content',
// 'writer',
// 'image',
// 'imageDesc'

$factory->define(Artikel::class, function (Faker $faker) {
    $userID = UserIdGenerator::generateUserID();
    return [
        'title' => $faker->sentence(),
        'writer' => $faker->name(),
        'writer_id' => $faker->randomElement($userID),
        'content' => ParagraphGenerator::generateHTMLParagraph(25,6,$faker),
        'imageDesc' => $faker->sentence(),
        'image' => 'img/'.$faker->image($dir=storage_path('app/public/img/'), $width=640, $height=480, 'cats', false)
    ];
});
