<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSiteRequest;
use App\Http\Requests\UpdateSiteRequest;
use App\Models\GithubCommits;
use App\Models\GithubDatas;
use Auth;

class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('inicio.index');
    }

    public function dashboard(){


        return view('dashboard.index');
    }

    public function projects(){

        $user_id = Auth::user()->id;
        $commits = GithubDatas::all();
        $repo_quantities = Auth::user()->github_repo_quantities;

        return view('projects.index', compact('user_id', 'commits', 'repo_quantities'));
    }    

}