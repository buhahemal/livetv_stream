<?php

namespace App\Http\Controllers;

use App\Category;
use App\TvDetail;
use Illuminate\Http\Request;

class TvDetailsController extends Controller
{

    /**
 * Display a listing of the resource.
 *
 * @return \Illuminate\Http\Response
 */

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tvs = TvDetail::all();
        return view('admin.managetvs', compact('tvs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.tvadd',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $slider = new TvDetail();
        $slider->fill($request->all());

        if ($file = $request->file('featured_image')){
            $photo_name = str_random(3).$request->file('featured_image')->getClientOriginalName();
            $file->move('assets/images/tv',$photo_name);
            $slider['featured_image'] = $photo_name;
        }
        $slider->save();
        return redirect('admin/tv')->with('message','New Tv Added Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
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
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $tv = TvDetail::findOrFail($id);
        return view('admin.tvedit', compact('tv','categories'));
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
        $slider = TvDetail::findOrFail($id);
        $data = $request->all();

        if ($file = $request->file('featured_image')){
            $photo_name = str_random(3).$request->file('featured_image')->getClientOriginalName();
            $file->move('assets/images/tv',$photo_name);
            $data['featured_image'] = $photo_name;
        }
        if ($request->live !="yes"){
            $data['live'] = "no";
        }
        if ($request->featured !="yes"){
            $data['featured'] = "no";
        }

        $slider->update($data);
        return redirect('admin/tv')->with('message','Tv Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tv = TvDetail::findOrFail($id);
        $tv->delete();

        return redirect('admin/tv')->with('message','TV/Video Deleted Successfully.');
    }
}
