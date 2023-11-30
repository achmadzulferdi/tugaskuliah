<?php

namespace App\Http\Controllers;

//import Model "Post
use App\Models\Post;

//return type View
use Illuminate\View\View;

//return type redirectResponse
use Illuminate\Http\RedirectResponse;

use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * index
     *
     * @return View
     */
    public function index(): View
    {
        //get posts
        $posts = Post::latest()->paginate(5);

        //render view with posts
        return view('posts.index', compact('posts'));
    }

    /**
     * create
     *
     * @return View
     */
    public function create(): View
    {
        return view('posts.create');
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'tanggal'       => 'required|max:10',
            'jam'           => 'required|max:5',
            'kegiatan'      => 'required|max:50',
            'tempat'        => 'required|max:50',
            'keterangan'    => 'required|max:50',
            'pelaksana'     => 'required|max:50'
        ]);



        //create post
        Post::create([
            'tanggal'   => $request->tanggal,
            'jam'       => $request->jam,	
            'kegiatan'  => $request->kegiatan,
            'tempat'    => $request->tempat,            
            'keterangan'=> $request->keterangan,
            'pelaksana' => $request->pelaksana
        ]);

        //redirect to index
        return redirect()->route('posts.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

      /**
     * show
     *
     * @param  mixed $id
     * @return View
     */
    public function show(string $id): View
    {
        //get post by ID
        $posts = Post::findOrFail($id);

        //render view with post
        return view('posts.show', compact('posts'));
    }

  /**
     * edit
     *
     * @param  mixed $id
     * @return View
     */
    public function edit(string $id): View
    {
        //get post by ID
        $post = Post::findOrFail($id);

        //render view with post
        return view('posts.edit', compact('post'));
    }
    
    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'tanggal'       => 'required|max:10',
            'jam'           => 'required|max:5',
            'kegiatan'      => 'required|max:50',
            'tempat'        => 'required|max:50',
            'keterangan'    => 'required|max:50',
            'pelaksana'     => 'required|max:50'
        ]);

        //get post by ID
        $post = Post::findOrFail($id);

        //check if image is uploaded
            //update post with new image
            $post->update([
                'tanggal'   => $request->tanggal,
                'jam'       => $request->jam,	
                'kegiatan'  => $request->kegiatan,
                'tempat'    => $request->tempat,            
                'keterangan'=> $request->keterangan,
                'pelaksana' => $request->pelaksana
                ]);

        
        //redirect to index
        return redirect()->route('posts.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy($id): RedirectResponse
    {
        //get post by ID
        $post = Post::findOrFail($id);

         //delete post
        $post->delete();

        //redirect to index
        return redirect()->route('posts.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}


