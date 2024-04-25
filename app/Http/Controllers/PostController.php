<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\file;




class PostController extends Controller
{


  public function index()
  {
    $posts = Post::all();
    return view('index', compact('posts'));
  }
  
  public function myposts()
  {
    $posts = Post::all();
    return view('index', compact('posts'));
  }
 
  public function store(Request $request)
  {
    $request->validate([
      'title' => 'required|max:255',
      'description' => 'required',
      'content' => 'required',
      'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
      'categories' => 'required|array',
      'categories.*' => 'exists:categories,id'
    ]);
    $folders = 'images/'.date("Y/m/d");
        $extension = $request->file('image')->extension();
        $imageName = time().'-'.Str::slug(basename($request->file('image')->getClientOriginalName(), ".".$extension), '-').'.'.$extension;
        $request->file('image')->move(public_path($folders), $imageName);
        $request->request->add(['image' => $folders.'/'.$imageName]);

        // Associer l'user_id du post à l'utilisateur connecté
        $postData = $request->all();
        
    
    $postData = [
      'title' => $request->input('title'),
      'description' => $request->input('description'),
      'content' => $request->input('content'),
      'image' => $folders.'/'.$imageName, // Save the image name to the database
      'user_id' => Auth::id(),
  ];

  $post = Post::create($postData);
  $post->categories()->attach($request->categories);

  return redirect()->route('posts.index')
      ->with('success', 'Post created successfully.');
}
  public function update(Request $request, $id)
  {
    $request->validate([
      'title' => 'required|max:255',
      'description' => 'required',
      'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
      'content' => 'required',
      
    ]);

    $newReq = $request->except(['image']);
    if ($request->hasFile('image')) {

      $folders = 'images/'.date("Y/m/d");
        $extension = $request->file('image')->extension();
        $imageName = time().'-'.Str::slug(basename($request->file('image')->getClientOriginalName(), ".".$extension), '-').'.'.$extension;
        $request->file('image')->move(public_path($folders), $imageName);
        $newReq['image'] = $folders.'/'.$imageName;
    }

    $post = Post::find($id);
    $post->update($newReq);
    $post->categories()->sync($request->categories);
    return redirect()->route('posts.index')
      ->with('success', 'Post updated successfully.');
  }

  public function destroy($id)
  {
    $post = Post::find($id);
    $post->delete();
    return redirect()->route('posts.index')
      ->with('success', 'Post deleted successfully');
  }

  public function create()
    {

      $categories = Category::all();
        return view('posts.create',compact('categories'));
        
    }
  
 
  public function show($id)
  {
    $post = Post::find($id);
    return view('posts.show', compact('post'));
  }
 
  public function edit($id)
  {
    $categories = Category::all();
    $post = Post::find($id);
    $idCategories = array_column($post->categories->all(), 'id');
    return view('edit',[
    "title" => "Edit Post",
    "post" => $post,
    'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
   'categories' => $categories,
   'idCategories' => $idCategories,
    ]);
  }
}