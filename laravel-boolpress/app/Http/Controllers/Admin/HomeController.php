<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
//provo in generale il funzionamento
use App\Post;
use App\Tag;


class HomeController extends Controller
{
    public function index(){
        //controllo se ottengo la visualizzazione
        //$post=Post::find(5);
        //dd($post->tags);
        //Testo la reversibilità
        //$tag=Tag::find(5);
        //dd($tag->posts);

        $user=Auth::user();
        
        $data=[
            'user'=>$user
        ];
        return view('admin.home',$data);
    }
}
   
