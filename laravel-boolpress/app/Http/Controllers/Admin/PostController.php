<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\Tag;

use App\Category;
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
        $posts= Post::paginate(6);

        $data=[
            'posts'=>$posts
        ];

        return view('admin.posts.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        $tags=Tag::all();
        $data=[
            'categories'=>$categories,
            'tags'=>$tags

        ];
        return view(' admin.posts.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $request->validate($this->getValidation());

       $form_data = $request->all();
       
     
       $new_post = new Post();
       $new_post->fill( $form_data);
       
       $new_post->slug = $this->getFreeSlugFromTitle($new_post->title);
       $new_post->save();
       //IMPORTANTE una volta salvata il nuovo post 
       //devo attacare tags, questo solo se tags esiste
       if(isset($form_data['tags'])){
        $new_post->tags()->sync($form_data['tags']);
       }
       

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
        
        $post = Post::findOrFail($id);
        $tags=Tag::all();
     
        $data=[
            'post'=>$post,
            'tags'=>$tags
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
        $categories=Category::all();
        $tags=Tag::all();
        $data=[
            'post'=>$post,
            'categories'=>$categories,
            'tags'=>$tags
        ];
        
        return view(' admin.posts.edit', $data);
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
        $request->validate($this->getValidation());
        $form_data = $request->all();
        $update_post = Post::findOrFail($id);
        if($form_data['title'] !=   $update_post->title ){
            $form_data['slug'] = $this->getFreeSlugFromTitle( $form_data['title']);
        }else{
            $form_data['slug'] = $update_post->slug;
        }
        $update_post ->update($form_data);
        
        //IMPORTANTE una volta salvata il nuovo post 
       //devo attacare tags, questo solo se tags esiste
       if(isset($form_data['tags'])){
        $update_post->tags()->sync($form_data['tags']);
       }else{
        $update_post->tags()->sync([]);
       }
       
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
        $post_delete = Post::findOrFail ($id);
        $post_delete->tags()->sync([]);
        $post_delete-> delete();
        return redirect()-> route('admin.posts.index');
       
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
    public function getValidation(){
        return[
            'title' => 'required|max:255',
            'content' => 'required|max:60000',
            'category_id' => 'nullable|exists:categories,id',
            'tags' => 'nullable|exists:tags,id',
            

        ];
    }
}
