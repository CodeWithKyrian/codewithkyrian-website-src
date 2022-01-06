<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Comment;
use App\Models\MediaLibrary;
use App\Models\Post;
use App\Models\Role;
use App\Models\Token;
use App\Models\User;
use Hash;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Role::firstOrCreate(['name' => Role::ROLE_EDITOR]);
        $role_admin = Role::firstOrCreate(['name' => Role::ROLE_ADMIN]);

        // MediaLibrary
        MediaLibrary::firstOrCreate([]);

        // Users
        $user = User::create(
            [
                'email' => 'kyrianobikwelu@gmail.com',
                'name' => 'Kyrian Obikwelu',
                'password' => Hash::make('Koshna55'),
                'email_verified_at' => now()
            ]
        );

        $user->roles()->sync([$role_admin->id]);

        $category = Category::create(['name' => 'Laravel & PHP']);
        Category::create(['name' => 'Vuejs']);
        Category::create(['name' => 'Unity & C#']);
        Category::create(['name' => 'General Programming']);

        // Posts
        $post = Post::firstOrCreate(
            [
                'title' => 'Hello World',
                'author_id' => $user->id
            ],
            [
                'description' => 'A welcome not to everyone that comes into this beautiful blog that you have spent real time to create and manage and design and perfect to this point',
                'content' => "
                    Welcome to your new laravel blog !
                    Don't forget that there's a lot of work to do here godu. 
                    But don't feel bad about it. Soonest, you'll be done with this shit !
                    Make sure you don't give up on this else.. Well you know what's coming next<br>
                    <blockquote>He who fails to plan, plans to fail. And woe unto that man that 
                    fails to acknowledge the fact that you have done enough work on himself; for he hath
                    done upon himself great harm and wrongest deed. He deserves a huge huge blow to the forehead!</blockquote>
                    Thanks for reading. Oya, time to rest. Here are things to do when you're too damn tired: 
                    <ol>
                    <li> Go and take a good nap for at least six hours or more</li>
                    <li> Eat good food. When I mean good food, I mean real palatable and edible food that will fill you:
                    <ul><li>Rice</li><li>Beans</li><li>Cassava Flakes</li></ul>
                    </li>
                    <li> Be yourself all the time whenever you want to rest and sleep all the time</li>
                    </ol>

                    For all the time you do this, you can always need to play it in the feature of the play that we want.
                    ",
                'posted_at' => now(),
                'category_id' => $category->id
            ]
        );

        // Comments
        Comment::create(
            [
                'author_id' => $user->id,
                'post_id' => $post->id,
                'content' => "Hey ! I'm a comment as example."
            ]
        );


        if (config('app.env') != 'production') {
            $this->call(DevDatabaseSeeder::class);
        }
    }
}
