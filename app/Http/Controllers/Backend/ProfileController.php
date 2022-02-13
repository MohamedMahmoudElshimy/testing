<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRequest;
use App\Models\Profile;
use App\Traits\offerTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    use offerTrait;
    public function create(){
        return view('profile.create');
    }

    public function store(ProfileRequest $request){

        $file_name = $this -> saveImage(  $request -> photo , $request -> folder );

        $profile = Profile::create([
            'photo'      => $file_name,
            'name'    => $request -> name ,
            'price'       => $request -> price,
            'details'    => $request -> details,
        ]);

        if($profile) {
            return response()->json([
                'status' => true,
                'msg' => 'تم الحفظ بنجاح'
            ]);
        }else{
            return response()->json([
                'status' => false,
                'msg' => 'فشل الحفظ برجاء المحاوله مجددا'
            ]);
        }
    }

    public function all(){
        $profiles = Profile::select(
            'id',
            'photo',
            'name',
            'price',
            'details'
        )->get();

        return view('profile.all', compact('profiles'));
    }

    public function delete(Request $request){

        $profile = Profile::find($request -> id);

        if(!$profile)
            return redirect()->back() -> with(['error' => __('messages.offer mot exist')]);

        $profile -> delete();

        return response()->json([
            'status' => true,
            'msg'    => 'تم الحذف بنجاح',
            'id'     => $request ->id
        ]);

    }


    public function edit(Request $request ){

        $profile = Profile::find($request -> id);

        if(!$profile)
            return response()->json([
                'status' => true,
                'msg'    => 'هذا العرض غير موجود',
            ]);

        $profile = Profile::select(
            'id',
            'photo',
            'name',
            'price',
            'details'
        )->find($request->id);

        return view('profile.edit', compact('profile'));
    }


    public function update(Request $request){

        $profile = Profile::find($request -> id);

        if(!$profile)
            return response()->json([
                'status' => true,
                'msg'    => 'تم التحديث بنجاح',
            ]);

        $profile ->update($request->all());

        return response()->json([
            'status' => true,
            'msg'    => 'تم التحديث بنجاح',
        ]);


    }
}
