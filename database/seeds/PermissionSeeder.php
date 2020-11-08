<?php

use Illuminate\Database\Seeder;
use App\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $createproduct = new Permission();
        $createproduct->name         = 'list-product';
        $createproduct->display_name = 'list products'; // optional
        // Allow a user to...
        $createproduct->description  = 'list new products'; // optional
        $createproduct->save();

        $createproduct = new Permission();
        $createproduct->name         = 'create-product';
        $createproduct->display_name = 'Create products'; // optional
        // Allow a user to...
        $createproduct->description  = 'create new products'; // optional
        $createproduct->save();
        
        $createproduct = new Permission();
        $createproduct->name         = 'edit-product';
        $createproduct->display_name = 'edit products'; // optional
        // Allow a user to...
        $createproduct->description  = 'edit products'; // optional
        $createproduct->save();

        $createproduct = new Permission();
        $createproduct->name         = 'delete-product';
        $createproduct->display_name = 'delete products'; // optional
        // Allow a user to...
        $createproduct->description  = 'delete products'; // optional
        $createproduct->save();

        $editUser = new Permission();
        $editUser->name         = 'list-user';
        $editUser->display_name = 'list Users'; // optional
        // Allow a user to...
        $editUser->description  = 'list users'; // optional
        $editUser->save();

        $editUser = new Permission();
        $editUser->name         = 'create-user';
        $editUser->display_name = 'Create Users'; // optional
        // Allow a user to...
        $editUser->description  = 'create existing users'; // optional
        $editUser->save();

        $editUser = new Permission();
        $editUser->name         = 'edit-user';
        $editUser->display_name = 'Edit Users'; // optional
        // Allow a user to...
        $editUser->description  = 'edit existing users'; // optional
        $editUser->save();

        $editUser = new Permission();
        $editUser->name         = 'delete-user';
        $editUser->display_name = 'delete Users'; // optional
        // Allow a user to...
        $editUser->description  = 'delete existing users'; // optional
        $editUser->save();
        
    }
}
