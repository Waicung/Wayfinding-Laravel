<?php

use Illuminate\Database\Seeder;
use App\Models\Admin;
use App\Models\User;
use App\Models\Form;
use App\Models\Test;

class SuperuserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Superuser, shared forms and tests
     *
     * @return void
     */
    public function run()
    {
        factory(Admin::class, 'superuser')
            ->create()
            ->each(function ($u) {
                $u->user()->save(factory(User::class)->make());
                foreach(factory(Form::class, 5)->make() as $form){
                    $u->forms()->save($form);
                }
                foreach(factory(Test::class, 5)->make() as $test){
                    $u->forms()->save($test);
                }

            });
    }
}
