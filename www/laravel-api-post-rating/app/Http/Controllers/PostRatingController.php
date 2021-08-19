<?php

namespace App\Http\Controllers;

use App\Models\PostRating;
use Illuminate\Http\Request;

/**
 * Class PostRatingController
 *
 * @package App\Http\Controllers
 *
 * Author: Ihor Khaletskyi
 * Author URI: https://sitepro4web.com/
 */
class PostRatingController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post_ratings = PostRating::latest()->paginate(5);

        return view('ratings.index', compact('post_ratings'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ratings.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'post_id'     => 'required',
                'post_title'  => 'required',
                'user_rating' => 'required',
            ]
        );

        $post_rating = new PostRating(
            [
                'post_id'     => $request->get('post_id'),
                'post_title'  => $request->get('post_title'),
                'user_rating' => $request->get('user_rating'),
            ]
        );
        $post_rating->save();
        return redirect('/ratings')->with('success', 'Contact save!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post_rating = PostRating::find($id);
        return view('ratings.edit', compact('post_rating'));  //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'post_id'     => 'required',
                'post_title'  => 'required',
                'user_rating' => 'required',
            ]
        );

        $post_rating              = PostRating::find($id);
        $post_rating->post_id     = $request->get('post_id');
        $post_rating->post_title  = $request->get('post_title');
        $post_rating->user_rating = $request->get('user_rating');
        $post_rating->save();

        return redirect('/ratings')->with('success', 'Post Rating updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post_rating = PostRating::find($id);
        $post_rating->delete();

        return redirect('/ratings')->with('success', 'Post Rating deleted!');
    }

}
