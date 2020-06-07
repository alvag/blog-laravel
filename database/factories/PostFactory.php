<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define( Post::class, function ( Faker $faker ) {
    return [
        'title' => $faker->realText( $faker->numberBetween( 30, 80 ) ),
        'excerpt' => $faker->realText( 500 ),
        'published_at' => $faker->randomElement( [ $faker->dateTimeThisMonth(), null ] ),
        'body' => $faker->realText( $faker->numberBetween( 500, 1500 ) )
    ];
} );
