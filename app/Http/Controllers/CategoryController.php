<?php
namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\post;
use Illuminate\Http\Request;



  
    
    class CategoryController extends Controller
    {
        
        public function index()
        {
            $categories = Category::all();
            return view('indexcategory',[
            'title' => 'Mes categories',
            'categories' => $categories,
        ]);
        }
    
      
        public function show($id)
        {
            
            $category = Category::find($id);
            
            return view('category.show', compact('category'));
        }
    
       
        public function create()
        {
          $categories = Category::all();
          return view('createcategory',[
            'categories' => $categories
          ]);
        }
    
        public function store(Request $request)
        {
            $request->validate([
                'title' => 'required|max:255',
                'description' => 'required|max:255'
            ]);

            dump($request);
        
            $category = Category::create([
                'title' => $request->title,
                'description' => $request->description,
            ]);
        
            return redirect()->route('categories.index')->with('success', 'Category created successfully.');
        }
        
      
       
        public function edit($id)
        {
       
            $category = Category::find($id);
           
            return view('editcategory', compact('category'));
        }
    
       
        public function update(Request $request, $id)
        {
        
            $request->validate([
                'title' => 'required',
                'description' => 'required',
               
            ]);
    
          
            $category = Category::find($id);
            $category->title = $request->title;
            $category->description = $request->description;
           
            $category->update();
           
    
            
            return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
        }
    
        public function destroy($id)
        {
           
            $category = Category::find($id);
            $category->delete();
    
           
            return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
        }
    }
    

