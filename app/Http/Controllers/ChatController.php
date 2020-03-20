<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/3/16
 * Time: 11:04
 */
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){


        $user = Auth::user();

        return view('chat.index',compact('user'));
    }
}