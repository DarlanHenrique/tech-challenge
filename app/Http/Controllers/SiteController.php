<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSiteRequest;
use App\Http\Requests\UpdateSiteRequest;
use App\Models\Site;
use App\Models\User;
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

    public function getJSON(){

        $ch = curl_init();
        $nickname = Auth::user()->github_nickname;
        // set url
        curl_setopt($ch, CURLOPT_URL, "https://api.github.com/users/".$nickname);
        //return the transfer as a string
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');

        // $output contains the output string
        $output = curl_exec($ch);
        $github_user_info = json_decode($output);
        dd($github_user_info);
        $repo_quantities = $github_user_info->public_repos;



        // close curl resource to free up system resources
        curl_close($ch); 

    }


}