<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\ Str;
//aggiunta Carbon
use Carbon\Carbon;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts= Post::all();

        $data=[
            'posts'=>$posts
        ];

        return view(' admin.posts.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view(' admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required|max:60000',
        ]);

       $form_data = $request->all();
       $new_post = new Post();
       $new_post->fill( $form_data);
       
       $new_post->slug = $this->getFreeSlugFromTitle($new_post->title);
       $new_post->save();

       return redirect()->route('admin.posts.show',['post'=>$new_post->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //aggiunta Carbon
        $now = Carbon::now($id);
        //controllo Carbon
        //dd($now);

        $post= Post::findOrFail($id);

        $data=[
            'post'=>$post
        ];
        
        return view(' admin.posts.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post= Post::findOrFail($id);

        $data=[
            'post'=>$post
        ];
        
        return view(' admin.posts.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required|max:60000',
        ]);
        $form_data = $request->all();
        $update_post = Post::findOrFail($id);
        if($form_data['title'] !=   $update_post->title ){
            $form_data['slug'] = $this->getFreeSlugFromTitle( $form_data['title']);
        }else{
            $form_data['slug'] = $update_post->slug;
        }
        $update_post ->update($form_data);

        return redirect()->route('admin.posts.show',['post'=> $update_post->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    protected function getFreeSlugFromTitle($title ){
        //Assegno una possibilità di salvataggio se non è già esistente
       $slug_to_save = Str::slug ($title ,'-');
       $slug_base =$slug_to_save;
       //verifico le condizioni di unicità
       $existing_slug= Post::where('slug', '=' ,$slug_to_save)->first();

       //finchè non trovo uno slug libero
       $counter=1;
       while($existing_slug){
       $slug_to_save = $slug_base . '-' . $counter;
       //blocco il ciclo
       $existing_slug= Post::where('slug','=',$slug_to_save)->first();
       //avvio il counter
       $counter++;
       }
       return  $slug_to_save;
    }
}
