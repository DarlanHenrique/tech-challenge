<?php

use App\Models\GithubDatas;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;
use App\Models\GithubCommits;

class AddGithubSocialIdField extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('github_datas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignIdFor(User::class);
            $table->string('project');
            $table->integer('commits_quantities');
            $table->timestamps();
        });
        Schema::create('github_commits', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignIdFor(GithubDatas::class);
            $table->string('commits');
            $table->string('dates');
            $table->timestamps();
        });
        Schema::table('users', function ($table) {
            $table->string('github_id')->nullable();
            $table->string('auth_type')->nullable();
            $table->string('github_nickname')->unique();
            $table->string('github_repo_quantities')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('github_datas');
        Schema::dropIfExists('github_commits');
        Schema::table('users', function ($table) {
            $table->dropColumn('github_id');
            $table->dropColumn('auth_type');
            $table->dropColumn('github_nickname');

         });
    }
}
