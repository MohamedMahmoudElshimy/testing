<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\OfferRequest;
use App\Models\Offer;
use App\Traits\offerTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class BackendController extends Controller
{

    use offerTrait;

    public function create(){
        return view('admin.create');
    }

    public function store(OfferRequest $request){

        // Validate Data Before Insert To Database


//        $rules = [
//            'firstName'  => 'required|max:100|unique:offers,firstName',
//            'lastName'   => 'required|max:100|unique:offers,lastName',
//            'password'   => 'required|max:100|unique:offers,password',
//            'email'      => 'required|max:100|unique:offers,email',
//            'address'    => 'required|max:100',
//            'city'       => 'required|max:100',
//            'country'    => 'required|max:100',
//        ];
//
//        $message = [
//            'firstName.required'  => trans('messages.offer firstName required'),
//            'firstName.unique'    => trans('messages.offer firstName unique'),
//            'lastName.required'   => trans('messages.offer lastName required'),
//            'lastName.unique'     => trans('messages.offer lastName unique'),
//            'password.required'   => trans('messages.offer password required'),
//            'email.required'      => trans('messages.email required'),
//            'email.unique'        => trans('messages.email unique'),
//            'address.required'    => trans('messages.address required'),
//            'address.unique'      => trans('messages.address unique'),
//            'city.required'       => trans('messages.city required'),
//            'city.unique'         => trans('messages.city unique'),
//            'country.required'    => trans('messages.country required'),
//            'country.unique'      => trans('messages.country unique'),
//
//        ];
//        $validate = Validator::make($request->all(),$rules , $message);
//
//        if($validate -> fails()){
//            return redirect()->back()->withErrors($validate)->withInput($request->all());
//        }

        $file_name = $this -> saveImage(  $request -> photo , $request -> folder );

        Offer::create([
            'photo' => $file_name,
            'firstName_en'  => $request -> firstName_en ,
            'lastName_en'   => $request -> lastName_en,
            'firstName_ar'  => $request -> firstName_ar ,
            'lastName_ar'   => $request -> lastName_ar,
            'password'   => Hash::make($request['password']),
            'email'      => $request -> email,
            'address'    => $request -> address,
            'city'       => $request -> city,
            'country'    => $request -> country,
        ]);
        return 'Created User Thank you';
    }

    public function allOffer(){

        $offers = Offer::select(
            'id',
            'photo',
            'firstName_'.LaravelLocalization::getCurrentLocale().' as firstName',
            'lastName_'.LaravelLocalization::getCurrentLocale().' as lastName',
            'address',
            'city',
            'country'
        )->get();

        return view('admin.allOfferDB', compact('offers'));
    }

    public function editOffer($id){

        $offer = Offer::find($id);

        if (!$offer)

            return redirect() -> back();


            $offer = Offer::select('id','photo', 'firstName_en', 'lastName_ar', 'firstName_ar', 'lastName_en', 'email', 'password',
                'address',
                'city',
                'country'
            )->find($id);

            return view('admin.edit' , compact('offer'));
    }

    public function delete($id){
        $offer = Offer::find($id);

        if(!$offer)
            return redirect()->back() -> with(['error' => __('messages.offer mot exist')]);

            $offer -> delete();

            return redirect() -> route('offer.allDB') -> with(['success' => __('messages.offer deleted')]);



    }

    public function updateOffer(OfferRequest $request , $id){

        $offer = Offer::find($id);

        if (!$offer)

            return redirect()->back();
            $file_name = $this -> saveImage(  $request -> photo , $request -> folder );

        $offer -> update([
            'photo' => $file_name,
            'firstName_en'  => $request -> firstName_en ,
            'lastName_en'   => $request -> lastName_en,
            'firstName_ar'  => $request -> firstName_ar ,
            'lastName_ar'   => $request -> lastName_ar,
            'password'   => Hash::make($request['password']),
            'email'      => $request -> email,
            'address'    => $request -> address,
            'city'       => $request -> city,
            'country'    => $request -> country,
        ]);
//            $offer->update($request->all());

        return redirect()->back() -> with(['success' => 'تم بنجاح']);


    }


}
