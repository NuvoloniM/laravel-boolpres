<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// importo lo stesso model usato pe ri backhand
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //  mi comporto allo stesso modo del backend, mi creo una variabile che raccoglie tutti i dati del model
        // posso usare il metodo paginate, non devo più usare il get xk è sottinteso ma devo fare atteznione a cosa mando ad axios xk cambia 
        $posts = Post::orderBy('updated_at', 'DESC')->with('Category','tags' )->paginate(5);
        // cambia il modo di ritornale la vista e i dati al suo interno 
        return response()->json(compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // mantengo l'$id come variabile per capire cosa mostrare.
        // $post = Post::with('Category', 'tags')->find($id);
        // uso lo slug come parametro  da mostrare nella uri nella sezione front
        // non posso usare find ma uso first()-> non gli devo passare parametri dentro erchè li ottiene da where
        $post = Post::where('slug', $slug)->with(['Category', 'tags'])->first();

        return response()->json( $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
}
