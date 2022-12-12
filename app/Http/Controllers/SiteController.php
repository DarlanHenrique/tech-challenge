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
    public function project($id, $project){

        $commit = GithubDatas::findOrFail($id);  
        $hoje= date("Y-m-d");
        $datas = GithubCommits::all();
        $data_limite = date('d/m/Y', strtotime('-90 day'));
        $explode_data = explode("/", $data_limite, 5);
        $day = $explode_data[0];
        $month = $explode_data[1];
        $year = $explode_data[2];

        $count = 0;
        return view('projects.project', compact('commit', 'project', 'datas', 'hoje', 'day', 'month', 'year', 'count'));
    }
}