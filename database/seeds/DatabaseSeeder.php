<?php

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
        // Users and posts seeds
		factory(App\User::class, 50)->create()->each(function ($user) {
			for($i=0;$i<random_int(1, 5);$i++){
	        	$user->posts()->save(factory(App\Post::class)->make());
	    	}
	    });
		$this->defaultPages();
    }
    	// Page seeder
    public function defaultPages(){

	    $page = new App\Page;
	    $page->displayName = "Posts";
	    $page->name ="post";
	    $page->class ="post";
	    $page->route= "/posts";
	    $page->save();	

	    $page = new App\Page;
	    $page->displayName = "About";
	    $page->name ="about";
	    $page->route= "/about";
	    $page->save();	
    }
}
