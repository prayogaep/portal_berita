<?php

namespace App\Models;


class Post
{
    private static $blog_posts = [
        [
            "title" => "Judul Post Pertama",
            "slug" => "judul-post-pertama",
            "author" => "Prayoga Erlangga Putra",
            "body" => "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Culpa saepe ab quae non impedit? Quaerat repudiandae quod voluptatum alias ratione esse in molestias aspernatur, earum blanditiis saepe quasi nobis aut nesciunt reprehenderit assumenda! Sed ipsum quas adipisci eum iste consequatur asperiores accusamus? Fuga, velit? Totam nisi aperiam omnis culpa alias autem vitae, delectus non optio consequatur provident laborum cum laboriosam, incidunt quis aspernatur, odit quasi ad ex architecto illum. Officia distinctio reprehenderit, labore impedit non atque similique. Ab, corporis ullam?"
        ],
        [
            "title" => "Judul Post Kedua",
            "slug" => "judul-post-kedua",
            "author" => "Muksin Alatas",
            "body" => "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolor pariatur, dicta enim deserunt eligendi quo cum optio maxime corporis! Nisi labore commodi non, maxime ex, amet earum debitis vero, ratione suscipit saepe qui similique facere consectetur natus! Libero quaerat non quos possimus temporibus voluptatibus quia. Fugit, qui labore provident libero ullam dolor accusamus quibusdam nulla tenetur temporibus repudiandae adipisci in inventore ducimus eveniet quos distinctio veritatis eius incidunt fugiat sapiente tempora voluptate quidem! Id ut error eaque quibusdam possimus voluptatem vero quasi, explicabo aliquid? Magnam cum molestias quo nesciunt dignissimos? Consectetur nam, amet aspernatur totam provident tempora saepe veniam modi."
        ]
    ];

    public static function all()
    {
        return collect(self::$blog_posts);
    }

    public static function find($slug)
    {
        $posts = static::all();
        return $posts->firstWhere('slug', $slug);
    }
}
