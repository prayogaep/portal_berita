<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Post;
use App\Models\Profile;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user1 = User::create([
            'name' => 'Prayoga Erlangga Putra',
            'username' => 'prayogaep',
            'email' => 'prayoga@gmail.com',
            'password' => bcrypt('password'),
            'is_admin' => true
        ]);
        $user2 = User::create([
            'name' => 'Root User',
            'username' => 'root',
            'email' => 'root@root.com',
            'password' => bcrypt('password'),
            'is_admin' => true
        ]);

        Profile::create([
            'nama' => 'Prayoga Erlangga Putra',
            'description' => 'Programmer|Lecturer|Content Creator',
            'profesi' => 'Programmer',
            'contact' => '0',
            'user_id' => $user1->id,
            'foto' => 'default.png'
        ]);
        Profile::create([
            'nama' => 'Root',
            'description' => 'Root',
            'profesi' => 'Programmer',
            'contact' => '0',
            'user_id' => $user2->id,
            'foto' => 'default.png'
        ]);
        // User::create([
        //     'name' => 'Muksin Alatas',
        //     'email' => 'muksin@gmail.com',
        //     'password' => bcrypt('12345')
        // ]);

        // User::factory(3)->create();
        // Category::create([
        //     'name' => 'Web Programming',
        //     'slug' => 'web-programming'
        // ]);

        // Category::create([
        //     'name' => 'Web Design',
        //     'slug' => 'web-design'
        // ]);

        // Category::create([
        //     'name' => 'Personal',
        //     'slug' => 'personal'
        // ]);

        // Post::factory(20)->create();
        // Post::create([
        //     'title' => 'Judul Pertama',
        //     'slug' => 'judul-pertama',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio veniam qui,',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam, quod fugiat tenetur mollitia ipsa consequatur consectetur rem, voluptates nihil impedit optio. Consectetur hic error incidunt sapiente perferendis maiores sequi dicta natus, necessitatibus quis placeat explicabo! Amet, inventore quisquam omnis magni dolorem optio eligendi obcaecati unde dignissimos, iste non praesentium rem debitis consectetur facilis incidunt temporibus corporis. Est dolores ullam dolorem asperiores quidem tenetur nemo veniam itaque! Voluptatum earum amet facere et iste tempore blanditiis, pariatur sint placeat enim maiores est cum cumque dolor praesentium similique optio quas asperiores? Sed qui veritatis aliquam distinctio natus ab voluptatum vero minima dolorum a.',
        //     'category_id' => 1,
        //     'user_id' => 1
        // ]);
        // Post::create([
        //     'title' => 'Judul Ke Dua',
        //     'slug' => 'judul-ke-dua',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio veniam qui,',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam, quod fugiat tenetur mollitia ipsa consequatur consectetur rem, voluptates nihil impedit optio. Consectetur hic error incidunt sapiente perferendis maiores sequi dicta natus, necessitatibus quis placeat explicabo! Amet, inventore quisquam omnis magni dolorem optio eligendi obcaecati unde dignissimos, iste non praesentium rem debitis consectetur facilis incidunt temporibus corporis. Est dolores ullam dolorem asperiores quidem tenetur nemo veniam itaque! Voluptatum earum amet facere et iste tempore blanditiis, pariatur sint placeat enim maiores est cum cumque dolor praesentium similique optio quas asperiores? Sed qui veritatis aliquam distinctio natus ab voluptatum vero minima dolorum a.',
        //     'category_id' => 1,
        //     'user_id' => 1
        // ]);
        // Post::create([
        //     'title' => 'Judul Ke Tiga',
        //     'slug' => 'judul-ke-tiga',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio veniam qui,',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam, quod fugiat tenetur mollitia ipsa consequatur consectetur rem, voluptates nihil impedit optio. Consectetur hic error incidunt sapiente perferendis maiores sequi dicta natus, necessitatibus quis placeat explicabo! Amet, inventore quisquam omnis magni dolorem optio eligendi obcaecati unde dignissimos, iste non praesentium rem debitis consectetur facilis incidunt temporibus corporis. Est dolores ullam dolorem asperiores quidem tenetur nemo veniam itaque! Voluptatum earum amet facere et iste tempore blanditiis, pariatur sint placeat enim maiores est cum cumque dolor praesentium similique optio quas asperiores? Sed qui veritatis aliquam distinctio natus ab voluptatum vero minima dolorum a.',
        //     'category_id' => 2,
        //     'user_id' => 2
        // ]);
        // Post::create([
        //     'title' => 'Judul Ke Empat',
        //     'slug' => 'judul-ke-empat',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio veniam qui,',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam, quod fugiat tenetur mollitia ipsa consequatur consectetur rem, voluptates nihil impedit optio. Consectetur hic error incidunt sapiente perferendis maiores sequi dicta natus, necessitatibus quis placeat explicabo! Amet, inventore quisquam omnis magni dolorem optio eligendi obcaecati unde dignissimos, iste non praesentium rem debitis consectetur facilis incidunt temporibus corporis. Est dolores ullam dolorem asperiores quidem tenetur nemo veniam itaque! Voluptatum earum amet facere et iste tempore blanditiis, pariatur sint placeat enim maiores est cum cumque dolor praesentium similique optio quas asperiores? Sed qui veritatis aliquam distinctio natus ab voluptatum vero minima dolorum a.',
        //     'category_id' => 2,
        //     'user_id' => 2
        // ]);

    }
}
