<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Orders;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function account(){
        $user = User::find(auth()->user()->id);
        $orders = $user->orders()->with('product')->get();
        return view('account', compact('user', 'orders'));
    }
}
