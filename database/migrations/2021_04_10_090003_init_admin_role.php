<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class InitAdminRole extends Migration
{
    CONST CRUD = ['create', 'read', 'update', 'delete'];
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $role = Role::create(['name' => 'admin']);

        foreach($this::CRUD as $crud) {
            $permission = Permission::create(['name' => $crud . ' tradingPools']);
            $role->givePermissionTo($permission);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $role = Role::findByName('admin');
        $role->delete();

        foreach($this::CRUD as $crud) {
            $permission = Permission::findByName($crud . ' tradingPools');
            $permission->delete();
        }
    }
}
