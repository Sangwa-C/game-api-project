<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    //
    public function getAllUsers(Request $request) {
        // logic to get all user goes here

        $user = User::get()->toJson(JSON_PRETTY_PRINT);
        return response($user, 250);
      }


      public function createUser(Request $request) {
        // logic to create a user record goes here
        $user= new User();
        $user->UserName = $request->UserName;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();

        return response()->json([
            "message" => "user added"
        ], 201);

    }

      public function getUser($id) {
        // logic to get a user record goes here

        if (User::where('id', $id)->exists()) {
            $user = User::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($user, 250);
          } else {
            return response()->json([
              "message" => "User not found"
            ], 404);
          }
      }


      public function updateUser(Request $request, $id) {
        // logic to update a user record goes here

        if (User::where('id', $id)->exists()) {
            $user = User::find($id);
            $user->UserName = is_null($request->UserName) ? $user->UserName : $request->UserName;
            $user->email = is_null($request->email) ? $user->email : $request->email;
            $user->userType = is_null($request->userType) ? $user->userType : $request->userType;
            $user->save();

            return response()->json([
                "message" => "user updated successfully"
            ], 250);
            } else {
            return response()->json([
                "message" => "user not found"
            ], 404);

        }
      }

      public function deleteUser ($id) {
        // logic to delete a user record goes here

        if(User::where('id', $id)->exists()) {
            $user = User::find($id);
            $user->delete();

            return response()->json([
              "message" => "records deleted"
            ], 202);
          } else {
            return response()->json([
              "message" => "Student not found"
            ], 404);
          }
      }
}
