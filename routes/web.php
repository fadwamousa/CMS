<?php

use App\Post;
/*
Route::get('admin/posts/example',array('as'=>'admin.home',function(){

	$url = route('admin.home');

	return "The Url is :".$url;
}));


Route::get('/songs',array('as'=>'songfadwa',function(){


      return "hello";
}));//name Route


Route::match(['get','post'],'/admin',function(){

	return "Welcom In Laravel 5.2";

});

Route::get('user/{id}', function ($id) {
    return 'User '.$id;
});

Route::get('username/{name?}',function($name = null){
	return "Hello My name is ".$name;
});

Route::get('name/{username?}',function($username){

	return "my name is ".$username;

});

*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index/{index}','PostsController@show_view');

Route::get('/posts/{id}','PostsController@index');
Route::resource('posts','PostsController');

/*Raw SQL */
Route::get('/insert',function(){

	\DB::insert('INSERT INTO posts(title,body) VALUES (?,?)',['Welcome','This is Welcome message Two from laravel Raw Sql']);
});

Route::get('/read',function(){

	$posts = \DB::select('SELECT * FROM posts where id=?',[1]);
	
	return var_dump($posts);
	
});
Route::get('/update',function(){

	$posts = \DB::update('UPDATE posts SET title=? WHERE id=?',['fadwa',2]);
});

Route::get('/delete',function(){

	$posts = \DB::delete('DELETE FROM posts WHERE id=?',[1]);
});
///////////////////////////////////////////////
/*ELQUOENT*/
Route::get('/read',function(){

	$posts = App\Post::all();
      
	foreach($posts as $post){
		return $post->title;
	}
});
Route::get('/read/find',function(){

	
      $post  = App\Post::find(1);
      //$post  = App\Post::findOrFail(1);
      return $post;
	
});

Route::get('/first',function(){

	  $post  = App\Post::where('id',1)->first();
      //$post  = App\Post::where('id',1)->firstOrFail();
      //$post  = App\Post::findOrFail(1);
      return $post;
	
});


Route::get('/insert2',function(){

	  $post  = new App\Post();
	  $post->title = "This is first Title";
	  $post->body  = "This is Body And I am create ";
	  $post->save();
	
});

Route::get('/update2',function(){

	  $post  = App\Post::find(2);
	  $post->title = "This is first Title";
	  $post->body  = "This is Body And I am create ";
	  $post->save();
	
});


Route::get('/insert3',function(){

	  $post = App\Post::create(['title'=>'This is Third Title','body'=>'This is Body number 3']);
	
});

Route::get('/find',function(){

	
      $post  = App\Post::where('id',3)->orderBy('body','DESC')->take(1)->get();
      return $post;
	
});

Route::get('/update_data',function(){
	App\Post::where('id',2)->where('is_admin',0)->update(['title'=>'Yas is very bad Compny','body'=>'Yas is very Bad and ugly company in egypt']);
});

Route::get('/delete_data',function(){
	App\Post::where('id',2)->where('is_admin',0)->delete();
});

Route::get('/delete_way',function(){
	App\Post::destroy(4);
});

Route::get('/soft_delete',function(){
	Post::find(11)->delete();
});