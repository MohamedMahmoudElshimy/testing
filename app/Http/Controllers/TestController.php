<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;

class TestController extends Controller
{

  public function __construct()
  {

  }

    public function index(){
      $user = Offer::select('name' , 'price')->get();
      return ($user);
    }

    public function create(){
      return view('offers.create');
    }

    public function store(Request $request){
        Offer::create([
          'name' => $request -> name,
          'price' => $request -> price,
          'details' => $request -> details,
        ]);
         return ' Done Thank You';
    }

    // public function store(){
    //   Offer::create([
    //     'name'    => 'Mahmoud',
    //     'price'   => '10000',
    //     'details' => 'Offer details',
    //   ]);
    // }
}
