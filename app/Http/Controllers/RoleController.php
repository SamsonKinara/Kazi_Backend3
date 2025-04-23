<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index(){
        try{
            
        $roles=Role::all();

        if($roles->count()>0){
            return response()->json([$roles], 200);
        }
        else{
            return "No Role was found!";
        }
        } catch(\Exception $e){
            return response()->json([ "Error"=>"Error Fetching Roles"], 500);
        }
    }

    public function createRole(Request $request){
        $validated = $request -> validate([
            "name" => "required|string|max:255|unique:roles",
            "slug" => "required|string|max:255|unique:roles",
            "description" => "nullable|string|max:1000",
        ]);

        try{
            $role = Role::create($validated);
            $role = new Role();
            $role->name = $request->name;
            $role->slug = $request->slug;
            $role->description = $request->description;

            $newRole = $role->save();
            
            if($role){
                return response()->json(["Created Role", $role], 200);
            }
            else{
                return "No Role was found";
            }

            
            if($createdRole) {
                return "Role created successfully!";
            }
            else{
                return "Role Not Created";
            }
        }
        catch(\Exception $e){
            return "Error Creating Role";
        }
    }

    public function getRole($id){
        try{
            $role = Role::findOrFail($id);
            if($role->count()>0){
                return response()->json([$role],200);
            }
            else{
                return "Role Was Not Found for ID: '$id'";
            }
        }
        catch(\Exception $e){
            return response()->json([
                "Error"=>"Error fetching role '$e'"
            ],401);
        }
    } 

    public function updateRole(Request $request, $id){
        $validated = $request -> validate([
        "name" => "required|string|max:255|unique:roles",
        "slug" => "required|string|max:255|unique:roles",
        "description" => "nullable|string|max:1000",
    ]);

    try{
        $role = Role::put($validated);

        if($role){
            return response()->json([$role], 200);
        }
        else{
            return "Role Was Not Found for ID: $id";
        }

    }
    catch(\Exception $e){
        return response()->json([
            "Error"=>"Error Updating Role '$e'"
        ], 401);

    }
    }
    public function deleteRole($id){
        $roleToDelete= Role::findOrfail($id);

        try{
            if($roleToDelete){
                $deletedRole = Role::destroy($id);
                if($deletedRole){
                return "Role Deleted Successfully";
            }

            else{
                return "Failed To Delete Role";
            }
        }
    }
        catch(\Exception $e){
            return "Error deleting the record";
        }
    }
}