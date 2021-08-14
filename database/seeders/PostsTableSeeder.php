<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Post;
use App\Models\Categories;
use App\Models\Tag;
use App\Models\User;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $category1 = Categories::create([
        'name' =>'News'
      ]);

      $author1 = User::create([
        'name' => 'Rajeev Bohara',
        'email' => 'rajeevbohara237@gmail.com',
        'password' => Hash::make('rajeev123')
      ]);

      $author2 = User::create([
        'name' => 'Bishal Shrestha',
        'email' => 'bindassbishal@gmail.com',
        'password' => Hash::make('bishal123')
      ]);

      $category2 = Categories::create([
        'name' =>'Marketing'
      ]);

      $category3 = Categories::create([
        'name' =>'Partnership'
      ]);

          $post1 = Post::create([
          'title' => 'Content Management System',
          'description' => 'This CMS includes several features like Creating, Updating, and Deleting posts and categories',
          'content' => 'Content Management System',
          'category_id' => $category1->id,
          'image'=> 'posts/1.jpg',
          'user_id' => $author1->id
        ]);

        $post2 = $author2->posts()->create([
        'title' => 'Employee Management System',
        'description' => 'This CMS includes several features like Creating, Updating, and Deleting posts and categories',
        'content' => 'Content Management System',
        'category_id' => $category2->id,
        'image'=> 'posts/2.jpg'
      ]);

      $post3 = $author1->posts()->create([
      'title' => 'Roster Management System',
      'description' => 'This CMS includes several features like Creating, Updating, and Deleting posts and categories',
      'content' => 'Content Management System',
      'category_id' => $category3->id,
      'image'=> 'posts/3.jpg'
    ]);

    $post4 = $author2->posts()->create([
    'title' => 'Category Management System',
    'description' => 'This CMS includes several features like Creating, Updating, and Deleting posts and categories',
    'content' => 'Content Management System',
    'category_id' => $category2->id,
    'image'=> 'posts/4.jpg'
  ]);

  $tag1 = Tag::create([
    'name' =>'Job'
  ]);

  $tag2 = Tag::create([
    'name' =>'Customers'
  ]);

  $tag3 = Tag::create([
    'name' =>'record'
  ]);

  $post1->tags()->attach([$tag1->id, $tag2->id]);
  $post2->tags()->attach([$tag2->id, $tag3->id]);
  $post3->tags()->attach([$tag1->id, $tag3->id]);
    }
}
