<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AgentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.agents.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id=null,$viewFlag=0)
    {
        return view('admin.pages.agents.create',compact('id','viewFlag'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->all();
        // $userid=Auth::user()->id;
        // $priceplan = new Priceplan([
        //     'user_id'=> $userid,
        //     'price'=>$request->get('price'),
        //     'section'=>$request->get('section'),
        //     'offer'=>$request->get('offer'),
        //     'title'=>$request->get('title'),
        //     'discription'=>$request->get('discription'),
        //     'service'=>$request->get('service'),
        //     'tag'=>$request->get('tag'),
            
        //     'icon'=>$request->get('icon'),
        //     'section'=>$request->get('section')
        // ]);
        // $priceplan->save();
        // return back()->with('success', 'Price plan has been added');
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
        // $priceplan = Priceplan::find($id);
        // $priceplan->delete();
        // return back()->with('success', 'Price Plan has been deleted ');
    }

    public function agentDetails($id) {
        $agentDetails = User::find($id);
        return view('frontend.pages.agentdetails',compact('agentDetails'));
    }
}
