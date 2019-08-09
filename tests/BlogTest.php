<?php
// TestCase for Blog CRUD operation
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Post;

class BlogTest extends TestCase
{
    
    use DatabaseMigrations;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBlogExample()
    {
        $this->assertTrue(true);
    }

    /** test */
    public function test_user_can_read_all_the_blogpost(){

       //Given we have Blog post in the database
       $Category =  factory(App\Category::class)->create();
       //$post = factory('App\blog')->create(); 
       //$post = $Category->posts()->create(2);
       $post = $Category->posts()->create([
        'title' => 'Demo_'.str_random(5),
        'body'  => 'This Post is related to'.str_random(20),
        'slug'  =>  str_random(10),
     ]);

       //When user visit the blog page
       
       $response = $this->get('/blog');
       //$response = $this->get('/blog/'. $post->id);

        //He should be able to read the blog
        //$response->assertSee($post->title);
        //$response->see($post->title);

        

        // Assert
        // See the concert details
        //$response->assertSee($post->title);
        //$response->seeInDatabase('posts',$post->title);
        //$response->assertSee('Demo_3j4gT');

        $this->seeInDatabase('posts',['title'=>$post->title]);
        
    }

     /** @test */
    public function test_user_can_read_single_blogpost()
    {
        //Create Catgory of Blogpost in the database
        $Category =  factory(App\Category::class)->create();
       //Create Blogpost in the database
        $post = $Category->posts()->create([
         'title' => 'Demo_'.str_random(5),
         'body'  => 'This Post is related to'.str_random(20),
         'slug'  =>  str_random(10),
       ]);

         //When user visit the blog page
        $response = $this->get('/blog/'.$post->id);    
        //He can see the Blog details
        $this->seeInDatabase('posts',['title'=>$post->title,'body'=>$post->body]);    
     }

       /** @test */
    public function test_user_can_update_the_blogpost()
    {
        //Create Catgory of Blogpost in the database
        $Category =  factory(App\Category::class)->create();
       //Create Blogpost in the database
        $post = $Category->posts()->create([
         //'title' => 'Demo_'.str_random(5),
         'title' => 'Demo Post Created on 8thAug',
         'body'  => 'This Post is related to 8thAug'.str_random(20),
         'slug'  =>  str_random(10),
       ]);

        //When user visit the blog page
        //$response = $this->get('/blog/'.$post->id);    
        //He can see the Blog details
        //$this->seeInDatabase('posts',['title'=>$post->title]);

        $post = Post::find($post->id); 
       
        $post->title = 'Updated Title of Demo Post Created on 8thAug';
        $post->slug  =  str_random(10);
        $post->body  = 'Updated Post is related to 8thAug'.str_random(20);

        $post->save();

        //The post should be updated in the database.
        $this->seeInDatabase('posts',['id'=> $post->id , 'title' => 'Updated Title of Demo Post Created on 8thAug']);

     }


     /** @test */
   public function test_user_can_delete_the_blogpost(){

       // Search by BlogPost Title and delete

         $title = 'Updated Title of Demo Post Created on 8thAug';
         $found_blopost = Post::where('title', '=', $title)->first(); 
         $this->assertEquals($found_blopost->title,$title);
         $found_blopost->delete();
        // $this->notSeeInDatabase('posts',['title'=>'Updated Title of Demo Post Created on 8thAug']);
        $this->notSeeInDatabase('posts',['title'=>$title]);

    }

}
