<?php
use App\Models\GithubDatas;
use App\Models\GithubCommits;
use App\Models\User;

function login_datas($nickname){
    $url = "https://api.github.com/users/";
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

    return $github_user_info;
}

function repo_datas($github_user_info, $nickname, $user_id){
    $url = "https://api.github.com/users/";
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

    for ($i=0; $i < $repo_quantities; $i++) { 
        $gitDatas = GithubDatas::create([
            'user_id' => $user_id,
            'project' => $commits_info[$i]->name,
        ]);
    }
}

function updateUser($user_id, $repo_quantities){
    $user = User::find($user_id);
 
    $user->github_repo_quantities = $repo_quantities;
     
    $user->save();
}

function updateRepos($commit_id, $commit_quantities){
    $githubDatas = GithubDatas::find($commit_id);
 
    $githubDatas->commit_quantities = $commit_quantities;
     
    $githubDatas->save();
}

function readCommits ($nickname, $repo_name, $repo_quantities){
    $url = "https://api.github.com/repos/";

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url.$nickname."/".$repo_name."/commits");

    //return the transfer as a string
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');

    // $output contains the output string
    $commits_output = curl_exec($ch);
    curl_close($ch);
    $commits_info = json_decode($commits_output);;
    $commits_quantities = count($commits_info);
    $commits = GithubDatas::all();

    for ($i = 0; $i < $repo_quantities; $i++) { 
        for ($j=0; $j < $commits_quantities; $j++) { 
            $gitDatas = GithubCommits::create([
                'github_datas_id' => $commits[$i]->id,
                'dates' => $commits_info[$j]->commit->author->date,
            ]);
        }
    }
}
