<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSiteRequest;
use App\Http\Requests\UpdateSiteRequest;
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

    public function teste(){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.github.com/repos/DarlanHenrique/-Equipe-2-Trainee-2020.1/commits");
        //return the transfer as a string
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
    
        // $output contains the output string
        $commits_output = curl_exec($ch);
        curl_close($ch);
        $commits_info = json_decode($commits_output);

        $commits_quantities = count($commits_info);
        for ($i=0; $i < $commits_quantities; $i++) { 
            $gitDatas = GithubDatas::create([
                'user_id' => $user_id,
                'project' => $commits_info[$i]->name,
            ]);
        }
        dd($commits_info[0]->commit->author->date);
    }

}