<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\stock as stocks;
use App\Models\logout as logouts;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\classes\functionClass;

class IndexController extends Controller
{
    public function indexPage()
    {
        return view('user.index');
    }
    public function viewLoginPage()
    {
        return view('user.login');
    }
    public function viewRegisterPage()
    {
        return view('user.register');
    }
    public function postPage()
    {
        return view('user.posts');
    }
    public function chairs()
    {
        $stocks = stocks::where('itemname' , 'NOT LIKE' , 'cushions%')->get();
        $add = new functionClass();
        
        return $stocks;
        
    }
    public function cushions()
    {
        $stocks = stocks::where('itemname' , 'LIKE' , 'cushions%')->get();
        return $stocks;
    }
    public function deleteItemPage()
    {
        return view('admin.update_item');
    }

    public function appLogout()
    {
        $id = session('user_id');
        $lastLogoutTime = logouts::find($id);
        if($lastLogoutTime)
        {
            $lastLogoutTime->count = $lastLogoutTime->count + 1;
            $lastLogoutTime->save();
        }
        else
        {
            $logoutTime = new logouts;
            $logoutTime->user_id = $id;
            $logoutTime->save();
        }
        Auth::logout();
        session()->flush();
        return Redirect('products');
    }
}
