<?php

namespace App\Http\Controllers;

use App\Http\Requests\DishCreateRequest;
use App\Models\Category;
use App\Models\Dish;
use Illuminate\Http\Request;

class DishesController extends Controller
{
    public function __construct()
    {   
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dishes = Dish::all();
        return view('kitchen.dish',[
            'dishes' => $dishes,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $dishes = Dish::all();
        return view('kitchen.dish_create',[
            'dishes' => $dishes,
            'categories' => $categories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DishCreateRequest $request)
    {
        $dish = new Dish();
        $dish->name = $request->name;
        $dish->category_id = $request->category;
        
        $imageName = date('YmdHis').".".request()->dish_image->getClientOriginalExtension();
        request()->dish_image->move(public_path('images'),$imageName);
        $dish->image = $imageName;

        $dish->save();

        return redirect('/dish')->with('message','Dish is successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Dish $dish)
    {
        $categories = Category::all();
        return view('kitchen.dish_edit',[
            'dish' => $dish,
            'categories' => $categories,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dish $dish)
    {
        request()->validate([
            'name' => 'required',
            'category' => 'required',
        ]);
        $dish->name = $request->name;
        $dish->category_id = $request->category;
        
        if($request->dish_image)
        {
            $imageName = date('YmdHis').".".request()->dish_image->getClientOriginalExtension();
            request()->dish_image->move(public_path('images'),$imageName);
            $dish->image = $imageName;
        }
       

        $dish->save();

        return redirect('/dish')->with('message','Dish is successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dish $dish)
    {
        $dish->delete();
        return redirect('/dish')->with('message','Successfully Deleted');

    }
}
