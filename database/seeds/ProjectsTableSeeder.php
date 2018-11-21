<?php

use Illuminate\Database\Seeder;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('projects')->insert([
            'name'=>'My project name',
            'description'=>'Some description :)',
            'project_owner_id'=>12,
            'hourly_rate'=>401,
            'url'=>'my_urlas',
            'admin_id'=>2,
            'login_details'=>'some detailsas',
            'git_url'=>'some_urlas',
            'logo_url'=>'logino_urlas',
            'system_type'=>'sistemdad type',
            'details_id'=>1
        ]);
    }
}
