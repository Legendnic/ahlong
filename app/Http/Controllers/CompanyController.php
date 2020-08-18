<?php

namespace App\Http\Controllers;

use App\company;
use App\user_company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{

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
        $user_company = user_company::where('user_id',Auth::user()->id)->first();
        return view('company', compact('user_company'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_company = user_company::where('user_id',Auth::user()->id)->first();
        return view('company_add', compact('user_company'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $company = new company;
        $company->name = $request->name;        
        $company->email = $request->email;        
        $company->address = $request->address;        
        $company->field = $request->field;        
        $company->description = $request->description;        
        $company->save();

        $user_company = new user_company;
        $user_company->user_id = Auth::user()->id;
        $user_company->company_id = $company->id;
        $user_company->save();
        return view('company', compact('user_company'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(company $company)
    {
        $all_company = $company->all();
        return view('company_list', compact('all_company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(company $company)
    {
        $user_company = user_company::where('user_id',Auth::user()->id)->first();
        if($user_company){
            $edit_company = $company->find($user_company->company_id);
        }else{
            $edit_company=null;
        }
        return view('company_edit', compact('edit_company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, company $company, $id)
    {
        $update_company = $company->find($id);
        $update_company->name = $request->name;
        $update_company->email = $request->email;
        $update_company->address = $request->address;
        $update_company->field = $request->field;
        $update_company->description = $request->description;
        $update_company->save();
        $user_company = user_company::where('company_id',$update_company->id)->first();
        
        return view('company', compact('user_company'));
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(company $company, $id)
    {
        // dd($id);
        $delete_company = $company->where('id',$id)->delete();
        $user_company = user_company::where('user_id',Auth::user()->id)->first();
        
        return view('company', compact('user_company'));
    }
}
