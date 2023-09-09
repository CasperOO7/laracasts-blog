<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user1=User::factory()->create(['name'=>'casper']);
        $user2=User::factory()->create(['name'=>'shrouk']);
        Post::factory(5)->create(['user_id'=>$user1->id]);
        Post::factory(5)->create(['user_id'=>$user2->id]);
        Comment::factory(3)->create(['user_id'=>$user1->id,'post_id'=>6]);
        Comment::factory(3)->create(['user_id'=>$user2->id,'post_id'=>1]);
    }
}
