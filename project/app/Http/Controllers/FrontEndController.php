<?php

namespace App\Http\Controllers;

use App\Category;
use App\PageSettings;
use App\Subscribers;
use App\TvDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FrontEndController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $topchannels = TvDetail::where('status','1')
            ->orderBy('views','desc')
            ->take(4)
            ->get();
        $latestchannels = TvDetail::where('status','1')
            ->orderBy('id','desc')
            ->take(4)
            ->get();
        $channels = TvDetail::where('featured','yes')
            ->where('status','1')
            ->take(4)
            ->get();
        return view('index', compact('channels','topchannels','latestchannels'));
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
        //
    }

    //Profile Data
    public function tv($id)
    {
        $tvinfo = TvDetail::findOrFail($id);
        $views['views'] = $tvinfo->views + 1;
        $tvinfo->update($views);
        return view('tvpage',compact('tvinfo'));
    }

    //Contact Page Data
    public function contact()
    {
        $pagedata = PageSettings::find(1);
        return view('contact', compact('pagedata'));
    }

    //About Page Data
    public function about()
    {
        $pagedata = PageSettings::find(1);
        return view('about', compact('pagedata'));
    }

    //FAQ Page Data
    public function faq()
    {
        $pagedata = PageSettings::find(1);
        return view('faq', compact('pagedata'));
    }

    //Show All Users
    public function all()
    {
        $cities = UsersModel::distinct()->get(['city']);
        $categories = Category::all();
        $allusers = UsersModel::where('status', 1)->get();
        $pagename = "All Lawyers List";
        return view('listall', compact('allusers','pagename','categories','cities'));
    }

    //Show Featured Users
    public function featured()
    {
        $cities = UsersModel::distinct()->get(['city']);
        $categories = Category::all();
        $allusers = UsersModel::where('featured', 1)
            ->where('status', 1)
            ->get();
        $pagename = "Featured Lawyers List";
        return view('listall', compact('allusers','pagename','categories','cities'));
    }

    //Show Category Users
    public function category($category)
    {
        $categories = Category::where('slug', $category)->first();
        $channels = TvDetail::where('status', 1)
            ->where('category', $categories->name)
            ->get();
        $pagename = ucwords($categories->name)." TV Channels";
        return view('channels', compact('channels','pagename','categories'));
    }

    //Show Searched Users
    public function order($id)
    {

        $pricing = PricingTable::where('status', 1)
            ->where('id', $id)
            ->first();

        return view('order', compact('pricing'));
    }

    //User Subscription
    public function subscribe(Request $request)
    {
        $subscribe = new Subscribers;
        $subscribe->fill($request->all());
        $subscribe->save();
        Session::flash('subscribe', 'You are subscribed Successfully.');
        return redirect('/');
    }

    //Send email to user
    public function usermail(Request $request)
    {
    	$userdata = UsersModel::find($request->to);
        $subject = "Email From Of Lawyer Profile";
        $to = $userdata->email;
        $name = $request->name;
        $from = $request->email;
        $msg = "Name: ".$name."\nEmail: ".$from."\nMessage: ".$request->message;

        Session::flash('pmail', 'Email Sent !!');
        mail($to,$subject,$msg);

        return redirect('/profile/'.$request->to.'/'.$userdata->name);
    }
    
    //Send email to Admin
    public function contactmail(Request $request)
    {
        $pagedata = PageSettings::findOrFail(1);
        $subject = "Contact From Of Lawyer";
        $to = $request->to;
        $name = $request->name;
        $phone = $request->phone;
        $department = $request->department;
        $from = $request->email;
        $msg = "Name: ".$name."\nEmail: ".$from."\nPhone: ".$request->phone."\nGender ".$request->department."\nMessage: ".$request->message;

        mail($to,$subject,$msg);

        Session::flash('cmail', $pagedata->contact);
        return redirect('/contact');
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
