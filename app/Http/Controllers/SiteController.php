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

    public function dashboard(){

        $url = "https://api.github.com/users/";
        $nickname = Auth::user()->github_nickname;
        $ch = curl_init();
        // set url
        curl_setopt($ch, CURLOPT_URL, $url.$nickname);
        //return the transfer as a string
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');

        // $output contains the output string
        $output = curl_exec($ch);
        
        // close curl resource to free up system resources
        curl_close($ch); 

        $github_user_info = json_decode($output);
        $repo_quantities = $github_user_info->public_repos;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url.$nickname."/repos");
        //return the transfer as a string
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');

        // $output contains the output string
        $commits_output = curl_exec($ch);
        curl_close($ch);
        $commits_info = json_decode($commits_output);
/*         dd($commits_info[0]->name); */

        return view('dashboard.index');


    }


}