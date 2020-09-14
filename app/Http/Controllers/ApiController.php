<?php

namespace App\Http\Controllers;

use App\Category;
use App\questions;
use App\User;
use Illuminate\Http\Request;
use Symfony\Component\Console\Question\Question;

class ApiController extends Controller
{
    //
    public function getAllUsers(Request $request)
    {
        // logic to get all user goes here

        $user = User::get()->toJson(JSON_PRETTY_PRINT);
        return response($user, 250);
    }


    public function createUser(Request $request)
    {
        // logic to create a user record goes here
        $user = new User();
        $user->UserName = $request->UserName;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();

        return response()->json([
            "message" => "user added"
        ], 201);
    }

    public function getUser($id)
    {
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


    public function updateUser(Request $request, $id)
    {
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

    public function deleteUser($id)
    {
        // logic to delete a user record goes here

        if (User::where('id', $id)->exists()) {
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

    // for category table

    public function getAllCategories()
    {
        // logic to get all categories goes here
        $category = Category::get()->toJson(JSON_PRETTY_PRINT);
        return response($category, 200);
    }

    public function createCategory(Request $request)
    {
        // logic to create a category record goes here

        $category = new Category();
        $category->catName = $request->catName;
        $category->score = $request->score;
        $category->save();

        return response()->json([
            "message" => "category created"
        ], 201);
    }

    public function getCategory($id)
    {
        // logic to get a category record goes here

        if (Category::where('id', $id)->exists()) {
            $category = Category::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($category, 200);
        } else {
            return response()->json([
                "message" => "category not found"
            ], 404);
        }
    }

    public function updateCategory(Request $request, $id)
    {
        // logic to update a category record goes here

        if (Category::where('id', $id)->exists()) {
            $category = Category::find($id);
            $category->catName = is_null($request->catName) ? $category->catName : $request->catName;
            $category->score = is_null($request->score) ? $category->score : $request->score;
            $category->save();

            return response()->json([
                "message" => "category updated successfully"
            ], 200);
        } else {
            return response()->json([
                "message" => "category not found"
            ], 404);
        }
    }

    public function deleteCategory($id)
    {
        // logic to delete a category record goes here

        if (Category::where('id', $id)->exists()) {
            $category = Category::find($id);
            $category->delete();

            return response()->json([
                "message" => "category deleted"
            ], 202);
        } else {
            return response()->json([
                "message" => "category not found"
            ], 404);
        }
    }



    // for category table

    public function getAllQuestions()
    {
        // logic to get all questions goes here
        $questions = questions::get()->toJson(JSON_PRETTY_PRINT);
        return response($questions, 200);
    }

    public function createQuestion(Request $request)
    {
        // logic to create a questions record goes here

        $question = new questions();
        $question->question = $request->question;
        $question->answer = $request->answer;
        $question->falseAnswer1 = $request->falseAnswer1;
        $question->falseAnswer2 = $request->falseAnswer2;
        $question->falseAnswer3 = $request->falseAnswer3;
        $question->categoryId = $request->categoryId;
        $question->save();

        return response()->json([
            "message" => "question created"
        ], 201);
    }

    public function getQuestion($id)
    {
        // logic to get a questions record goes here

        if (questions::where('id', $id)->exists()) {
            $question = questions::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($question, 200);
        } else {
            return response()->json([
                "message" => "question not found"
            ], 404);
        }
    }

    public function getQuestionByCatId($id)
    {
        // logic to get a questions record goes here

        if (questions::where('categoryId', $id)->exists()) {
            $question = questions::where('categoryId', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($question, 200);
        } else {
            return response()->json([
                "message" => "question not found"
            ], 404);
        }
    }

    public function updateQuestion(Request $request, $id)
    {
        // logic to update a category record goes here

        if (questions::where('id', $id)->exists()) {
            $question = questions::find($id);
            $question->question = is_null($request->question) ? $question->question : $request->question;
            $question->answer = is_null($request->answer) ? $question->answer : $request->answer;
            $question->falseAnswer1 = is_null($request->falseAnswer1) ? $question->falseAnswer1 : $request->falseAnswer1;
            $question->falseAnswer2 = is_null($request->falseAnswer2) ? $question->falseAnswer2 : $request->falseAnswer2;
            $question->falseAnswer3 = is_null($request->falseAnswer3) ? $question->falseAnswer3 : $request->falseAnswer3;
            $question->categoryId = is_null($request->categoryId) ? $question->categoryId : $request->categoryId;
            $question->save();

            return response()->json([
                "message" => "question updated successfully"
            ], 200);
        } else {
            return response()->json([
                "message" => "question not found"
            ], 404);
        }
    }

    public function deleteQuestion($id)
    {
        // logic to delete a category record goes here

        if (questions::where('id', $id)->exists()) {
            $question = questions::find($id);
            $question->delete();

            return response()->json([
                "message" => "question deleted"
            ], 202);
        } else {
            return response()->json([
                "message" => "questions not found"
            ], 404);
        }
    }
}
