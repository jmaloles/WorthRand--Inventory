<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\Permission;
use App\User;

class RolesAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create roles
        $owner = Role::create([
            'name' => 'owner',
            'display_name' => 'Owner',
            'description' => 'Performs all tasks',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        $admin = Role::create([
            'name' => 'admin',
            'display_name' => 'Admin',
            'description' => 'Performs administrative tasks',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        $assistant = Role::create([
            'name' => 'assistant',
            'display_name' => 'Assistant',
            'description' => 'Performs assistant tasks',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        $collection = Role::create([
            'name' => 'collection',
            'display_name' => 'Collection',
            'description' => 'Performs collection tasks',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        $sales_engineer = Role::create([
            'name' => 'sales-engineer',
            'display_name' => 'Sales Engineer',
            'description' => 'Performs inbound calls tasks',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        // create permissions
        $viewReport = Permission::create([
            'name' => 'view-report',
            'display_name' => 'View Reports',
            'description' => 'Manage and view reports',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        $editUser = Permission::create([
            'name' => 'edit-user',
            'display_name' => 'Edit Users',
            'description' => 'manage users',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        $editProposal = Permission::create([
            'name' => 'edit-proposals',
            'display_name' => 'Edit Proposals',
            'description' => 'Manage Proposals',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        $viewProposal = Permission::create([
            'name' => 'view-proposal',
            'display_name' => 'View Proposal',
            'description' => 'View Proposal'
        ]);

        $acceptProposal = Permission::create([
            'name' => 'accept-proposal',
            'display_name' => 'Accept Proposals',
            'description' => 'Accept Proposals',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        $sendProposal = Permission::create([
            'name' => 'send-proposal',
            'display_name' => 'Send Proposals',
            'description' => 'Send and Resend Proposal',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        $collectSales = Permission::create([
            'name' => 'collect-sales',
            'display_name' => 'Collect Sales',
            'description' => 'Collect Sales',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        $addItemWithoutProposal = Permission::create([
            'name' => 'add-item-without-proposal',
            'display_name' => 'Add item without proposal',
            'description' => 'Add item without proposal',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        $addItemWithProposal = Permission::create([
            'name' => 'add-item-with-proposal',
            'display_name' => 'Add item with proposal',
            'description' => 'Add item with proposal',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        // assign permissions to roles
        $owner->attachPermissions(array($editUser, $editProposal, $sendProposal, $acceptProposal, $viewReport, $viewProposal, $addItemWithoutProposal));
        $admin->attachPermissions(array($editUser, $editProposal, $sendProposal, $acceptProposal, $viewReport, $viewProposal, $addItemWithoutProposal));
        $assistant->attachPermissions(array($sendProposal, $acceptProposal, $viewReport, $viewProposal));
        $collection->attachPermissions(array($viewProposal, $sendProposal, $acceptProposal, $viewReport, $collectSales));
        $sales_engineer->attachPermissions(array($sendProposal, $viewReport, $addItemWithProposal));

        // attach admin user to owner role
        $userOwner = User::where('email', 'test_owner@yahoo.com')->firstOrFail();
        $userOwner->attachRole($owner);

        // attach admin user to admin role
        $userAdmin = User::where('email', 'test_admin@yahoo.com')->firstOrFail();
        $userAdmin->attachRole($admin);

        // attach admin user to assistant role
        $userAssistant = User::where('email', 'test_assistant@yahoo.com')->firstOrFail();
        $userAssistant->attachRole($assistant);

        // attach admin user to collection role
        $userCollection = User::where('email', 'test_collection@yahoo.com')->firstOrFail();
        $userCollection->attachRole($collection);

        // assign default role to users
        $users = User::all();
        foreach($users as $normalUser) {
            if($normalUser->hasRole('sales_engineer')) continue;
            $normalUser->attachRole($sales_engineer);
        }
    }
}
