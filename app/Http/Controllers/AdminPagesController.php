<?php

namespace App\Http\Controllers;

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

        return view('admin.inventory');
    }

    public function search(){

        return view('admin.search');
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
