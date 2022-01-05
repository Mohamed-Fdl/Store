<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductImg;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        if(request()->category){
            $products=Product::with('categories')->whereHas('categories',function($q){
                $q->where('slug',request()->category);
            })->paginate(5);
            return view('products.index',['products'=>$products]);
        }
        else{
            $products=Product::with('categories')->paginate(6);
            return view('products.index',['products'=>$products]);
        }
    }

    public function show($slug)
    {
        $same=Product::inRandomOrder()->take(10)->get();
        $images=Product::where('slug',$slug)->first()->images;
        return view('products.show',['images'=>$images,'singles'=>Product::where('slug',$slug)->get(),'sames'=>$same]);
    }

    public function search()
    {
        request()->validate([
            'q' => 'required|min:3',
        ]);
        $q=request()->input('q');
        $allProducts=Product::where('title','like',"%$q%")->orWhere('description','like',"%$q%");
        $nbr_result=$allProducts->count();
        $products=$allProducts->paginate(6);
        return view('products.index',['products'=>$products,'nbr_result'=>$nbr_result]);
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'title' => 'required|max:255',
            'subtitle' => 'required',
            'description' => 'required|max:255',
            'price' => 'required|numeric',
            'rating' => 'required|numeric|min:1|max:5',
            'stocks' => 'required|numeric',
            'image' => 'required',
        ]);
        $slug=Str::slug($validated['title'],'-');
        $validated['slug']=$slug;
        $path = $request->file('image')->store('avatars');
        $validated['image']=$path;
        $product= new Product();
        $product->title=$validated['title'];
        $product->subtitle=$validated['subtitle'];
        $product->slug=$validated['slug'];
        $product->description=$validated['description'];
        $product->price=$validated['price'];
        $product->rating=$validated['rating'];
        $product->stocks=$validated['stocks'];
        $product->image=$validated['image'];
        $product->save();
        //stock le produit en db
        $id=$product->id;
        foreach(Category::all() as $k=> $category)
        {
            if($request->input($k+1)){
                DB::insert('insert into category_product (category_id, product_id) values (?, ?)', [$request->input($k+1), $id]);
            }
        }
        //stock le produit et sa categorie en base de donnée
        if($request->file('img_f1')){
            $path1= $request->file('img_f1')->store('avatars');
            $p_image1=new ProductImg();
            $p_image1->product_id=$id;
            $p_image1->img=$path1;
            $p_image1->save();
        }
        if($request->file('img_f2')){
            $path2 = $request->file('img_f2')->store('avatars');
            $p_image2=new ProductImg();
            $p_image2->product_id=$id;
            $p_image2->img=$path2;
            $p_image2->save();
        }
        //stock les images facultatives si elles existent
        $request->session()->flash('success', 'Product '.$validated['title'].' successfully added!');
        return back();
    }

    public function store_category(Request $request){
        $validated = $request->validate([
            'name' => 'required|max:255',
        ]);
        $validated['slug']=Str::slug($validated['name'],'-');
        Category::create($validated);
        $request->session()->flash('success', 'Category \''.$validated['name'].'\'successfully added!');
        return back();
    }

}

