<?php 

namespace ChromaMS\Http\Controllers\Backend;

use ChromaMS\Post;

use ChromaMS\User;

class DashboardController extends Controller
{

	public function index(Post $posts, User $users)
	{
		$posts = $posts->orderBy('updated_at' , 'desc')->take(5)->get();

		$users = $users->whereNotNull('last_login_at')->orderBy('last_login_at' , 'desc')->take(5)->get();

		return view('backend.dashboard' , compact('posts' , 'users'));
	}
	
}


 ?>