<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Requests\StoreNewsRequest;
use App\Http\Requests\UpdateNewsRequest;
use App\News;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::latest()->get();

        return view('News.index',compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('News.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNewsRequest $request)
    {
//        dd($request);
        $user_id = Auth::user()->id;
        $news = new News;
        $news->title = $request->title;
        $news->body = $request->body;
        $news->user_id = $user_id;
        $news->save();
        return redirect('news');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        return view('News.show',compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
//        $this->authorize('view',$news);
        return view('News.edit',compact('news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNewsRequest $request, News $news)
    {
        $this->authorize('update',$news);
        $news->update($request->all());
        return redirect(route('news.show',$news->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        $this->authorize('delete',$news);
        $news->delete();
        return redirect('news');
    }



//    public function storeComment(Request $request,News $news)
//    {
//
//
//        $news->comments()->create([
//            'user_id'   => Auth::id(),
//            'body'      => $request->get('body')
//        ]);
//
//        return back();
//    }
}
