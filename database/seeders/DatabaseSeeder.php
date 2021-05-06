<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Project;
use App\Models\Task;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('PRAGMA foreign_keys = OFF;');
        DB::table('project_user')->truncate();
        Project::truncate();
        Task::truncate();
        User::truncate();
        DB::statement('PRAGMA foreign_keys = ON;');

        $admin = User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@projectmanager.local',
            'password' => bcrypt('secret')
        ]);

        $user = User::create([
            'name' => 'Raul Alvarez',
            'email' => 'raul@projectmanager.local',
            'password' => bcrypt('secret')
        ]);

        $project = Project::create([
            'title' => 'Create Project Manager App',
            'description' => 'Write the Project Manager',
            'manager_id' => $admin->id
        ]);

        $task1 = Task::create([
            'title' => 'Seed database',
            'description' => 'Seed the database whit test data',
            'status_code' => 'COMP',
            'project_id' => $project->id,
            'user_id' => $admin->id,
        ]);

        $task2 = Task::create([
            'title' => 'Complete development',
            'description' => 'Write all the code',
            'status_code' => 'OPEN',
            'project_id' => $project->id,
            'user_id' => $user->id,
        ]);

        $project->users()->saveMany([$admin, $user]);
    }
}
