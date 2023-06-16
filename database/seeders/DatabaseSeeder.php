<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        User::create([
            'name' => 'Robi Adadi Suparlan',
            'email' => 'robiadadis@gmail.com',
            'password' => bcrypt('12345')
        ]);

        User::create([
            'name' => 'Dadang Yeager',
            'email' => 'dadangyeager@gmail.com',
            'password' => bcrypt('12345')
        ]);

        User::create([
            'name' => 'Ucup Tehyung',
            'email' => 'ucuptehyung@gmail.com',
            'password' => bcrypt('12345')
        ]);

        Category::create([
            'name' => 'Web Programming',
            'slug' => 'web-programming'
        ]);

        Category::create([
            'name' => 'Web Desain',
            'slug' => 'web-desain'
        ]);

        Category::create([
            'name' => 'Personal',
            'slug' => 'personal'
        ]);

        Post::create([
            'title' => 'Judul Pertama',
            'slug' => 'judul-pertama',
            'excerpt' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Temporibus quae necessitatibus doloremque itaque nihil provident',
            'body' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Temporibus quae necessitatibus doloremque itaque nihil provident, fuga dolorem atque amet error dolor neque delectus magnam nemo est commodi culpa id beatae impedit dicta laudantium repellendus distinctio ducimus. Quia illum dolor cupiditate officia architecto. Cupiditate, modi sunt incidunt maiores porro asperiores quaerat fugiat voluptates, ea sit distinctio ducimus. Aliquid, eveniet? Officia distinctio recusandae officiis, nihil aliquid expedita dolorem iste quos. Debitis nihil iure repudiandae ratione cum earum magnam pariatur a, odit in sequi libero doloribus odio ipsa facere, fugiat nobis! Neque, maiores enim. Aperiam sit mollitia iste magni? Ex nesciunt voluptate animi!',
            'category_id' => 1,
            'user_id' => 1
        ]);

        Post::create([
            'title' => 'Judul Ke Dua',
            'slug' => 'judul-ke-dua',
            'excerpt' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Temporibus quae necessitatibus doloremque itaque nihil provident',
            'body' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Temporibus quae necessitatibus doloremque itaque nihil provident, fuga dolorem atque amet error dolor neque delectus magnam nemo est commodi culpa id beatae impedit dicta laudantium repellendus distinctio ducimus. Quia illum dolor cupiditate officia architecto. Cupiditate, modi sunt incidunt maiores porro asperiores quaerat fugiat voluptates, ea sit distinctio ducimus. Aliquid, eveniet? Officia distinctio recusandae officiis, nihil aliquid expedita dolorem iste quos. Debitis nihil iure repudiandae ratione cum earum magnam pariatur a, odit in sequi libero doloribus odio ipsa facere, fugiat nobis! Neque, maiores enim. Aperiam sit mollitia iste magni? Ex nesciunt voluptate animi!',
            'category_id' => 2,
            'user_id' => 2
        ]);

        Post::create([
            'title' => 'Judul Ke Tiga',
            'slug' => 'judul-ke-tiga',
            'excerpt' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Temporibus quae necessitatibus doloremque itaque nihil provident',
            'body' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Temporibus quae necessitatibus doloremque itaque nihil provident, fuga dolorem atque amet error dolor neque delectus magnam nemo est commodi culpa id beatae impedit dicta laudantium repellendus distinctio ducimus. Quia illum dolor cupiditate officia architecto. Cupiditate, modi sunt incidunt maiores porro asperiores quaerat fugiat voluptates, ea sit distinctio ducimus. Aliquid, eveniet? Officia distinctio recusandae officiis, nihil aliquid expedita dolorem iste quos. Debitis nihil iure repudiandae ratione cum earum magnam pariatur a, odit in sequi libero doloribus odio ipsa facere, fugiat nobis! Neque, maiores enim. Aperiam sit mollitia iste magni? Ex nesciunt voluptate animi!',
            'category_id' => 3,
            'user_id' => 3
        ]);
    
    }
}
