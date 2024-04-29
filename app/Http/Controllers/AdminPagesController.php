<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\User;
use App\Models\Section;
use App\Models\UnitType;
use App\Models\PaymentPlan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class AdminPagesController extends Controller
{
    
    public function home(){

        //actualizamos el lenguaje
        $lang = auth()->user()->lang;
        App::setLocale($lang);

        $unit_types = UnitType::all();
        $payment_plans = PaymentPlan::all();

        return view('admin.home', compact('unit_types', 'payment_plans'));
    }

    public function inventory(){
        //actualizamos el lenguaje
        $lang = auth()->user()->lang;
        App::setLocale($lang);

        $sections = Section::all();

        return view('admin.inventory', compact('sections'));
    }

    public function unit($id){

        //actualizamos el lenguaje
        $lang = auth()->user()->lang;
        App::setLocale($lang);

        $unit = Unit::find($id);

        return view('admin.unit', compact('unit'));
    }

    public function saved($user_id){

        //actualizamos el lenguaje
        $lang = auth()->user()->lang;
        App::setLocale($lang);
        
        $user = User::find($user_id);

        $units = $user->savedUnits;

        return view('admin.saved-units', compact('units'));
    }

    public function profile(){

        //actualizamos el lenguaje
        $lang = auth()->user()->lang;
        App::setLocale($lang);

        $user = User::find(auth()->user()->id);

        return view('admin.profile', compact('user'));
    }

    public function addSavedUnit(Request $request)
    {

        //Store units in my favorite list

        $request->validate([
            'unit_id' => 'integer|required'
        ]);

        $unit = Unit::findOrFail( $request->input('unit_id') );

        $unit->users()->attach( auth()->user()->id );

        $unit->save();

        return back()->with('msg', 'Se ha guardado la unidad correctamente');

    }

    public function removeSavedUnit( $id )
    {

        $unit = Unit::findOrFail( $id );

        $unit->users()->detach( auth()->user()->id );

         $unit->save();

        return back()->with('msg', 'Se ha eliminado la unidad correctamente');

    }

    public function search(Request $request){

        //actualizamos el lenguaje
        $lang = auth()->user()->lang;
        App::setLocale($lang);

        $search = $request->input('search_status');

        if( isset($search) ){

            $min_price = $request->input('min_price');
            $max_price = $request->input('max_price');
            $floor = $request->input('floor');
            $bedrooms = $request->input('bedrooms');

            if( !isset($min_price) ){
                $min_price = 1;
            }

            if( !isset($max_price) ){
                $max_price = 9999999999;
            }

            $units = Unit::where('price', '>' ,$min_price)->where('price','<', $max_price);

            if( isset($floor) ){
                $units = $units->where('floor', $floor);
            }

            if( isset($bedrooms) ){

                switch($bedrooms){

                    case 1:
                        $units = $units->where('unit_type_id', 6);
                    break;

                    case 2:
                        $units = $units->whereIn('unit_type_id', [3,4] );
                    break;

                    case 3:
                        $units = $units->whereIn('unit_type_id', [1,2] );
                    break;

                    case 10:
                        $units = $units->where('unit_type_id', 5);
                    break;

                }
                
            }

            $units = $units->paginate(10)->appends(request()->query());

        }else{
            $units = Unit::paginate(10)->appends(request()->query());
        }

        return view('admin.search', compact('units'));
    }

    public function updateProfile(Request $request){


        return redirect()->back()->with('message', 'Cambios guardados');
    }


    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
