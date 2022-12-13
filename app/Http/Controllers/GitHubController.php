<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Exception;
use Socialite;
use App\Models\User;
use App\Models\GithubDatas;

class GitHubController extends Controller
{
    public function gitRedirect()
    {
        return Socialite::driver('github')->redirect();
    }
       
    public function gitCallback()
    {
        try {
     
            $user = Socialite::driver('github')->user();
      
            $searchUser = User::where('github_id', $user->id)->first();
      
            if($searchUser){
                Auth::login($searchUser);

                return redirect('/dashboard');
      
            }else{
                $gitUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'github_id'=> $user->user['id'],
                    'github_nickname'=> $user->nickname,
                    'auth_type'=> 'github',
                    'password' => encrypt('gitpwd059')
                ]);
     
                Auth::login($gitUser);
                $nickname = Auth::user()->github_nickname;
                $user_id = Auth::user()->id;
                $github_user_info = login_datas($nickname);
                $repo_quantities = $github_user_info->public_repos;
                updateUser($user_id, $repo_quantities);
                repo_datas($github_user_info, $nickname, $user_id);
                $github_datas = GithubDatas::all();
                foreach ($github_datas as $github_data) { 
                    $commit_quantities = readCommits($nickname, $github_data->project, $github_data->id);
                    updateRepos($github_data->id, $commit_quantities);
                }

                return redirect('/dashboard');
            }
     
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
