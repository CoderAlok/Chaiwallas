<?php


namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class ApiController extends Controller
{

    // --- Api for user login ---
    public function userLogin(Request $request){
        $users = DB::table('tbl_user')
                        ->where('role', 2)
                        ->where('email', $request->input('email'))
                        // ->where('password', $request->input('password'))
                        ->first();

        if($users){
            $chk_pass = Hash::check($request->input('password'), $users->password);

            if($chk_pass){
                return response()->json([
                    "status" => 1,
                    "token" => base64_encode($users->id),
                    // "token1" => base64_decode(base64_encode($users->id)),
                    "data" => $users,
                    "message" => "Login successful."
                ], 200);
            }
            else{
                return response()->json([
                    "status" => 0,
                    "message" => "Wrong password"
                ], 200);
            }
        }
        else{
            return response()->json([
                "status" => 0,
                "message" => "Login Failed."
            ], 200);
        }

    }

    // --- Api method for regsitration ---
    public function userRegister(Request $request){

        $users = DB::table('tbl_user')
                        ->where('role', 2)
                        ->where('email', $request->input('email'))
                        ->first();
        
        if($users){
            return response()->json([
                "status" => 0,
                "data" => $users,
                "message" => "Sorry, Email already exists."
            ], 200);
        }
        else{
            $ins_data = [
                'first_name'=>$request->input('firstname'),
                'last_name'=>$request->input('lastname'),
                'email'=>$request->input('email'),
                'password'=> Hash::make($request->input('password')),
                'role'=>2,
                'status'=>1
            ];
            // $users = DB::table('template_type')->insert($ins_data);
            $users_id = DB::table('tbl_user')->insertGetId($ins_data);

            if($users_id){
                return response()->json([
                    "status" => 1,
                    "message" => "User registration was successfull."
                ], 200);
            }
            else{
                return response()->json([
                    "status" => 0,
                    "message" => "Sorry, Failed to register. Please check your database functions."
                ], 200);
            }
        }

    }
    
    public function templatetypes(Request $request){
        
        $template_types = DB::table('mst_template_type')->where('status', '1')->get();
                        
        
        foreach($template_types as $key => $val){
            $data[$key] = [
                "id"=>$val->id,
                "name"=>$val->name
            ];
        }
        
        return response()->json([
                "status" => 1,
                "type" => $data,
                "message" => "Template types loaded successfully."
            ], 200);
    }  
    
    public function templates(Request $request){
        
        if(!empty($request->input('type'))){
            // $template_types = $request->input('type');
            $template_types = DB::table('tbl_template')
                        ->where('type_id', $request->input('type'))
                        ->where('status', '1')
                        ->get();
        }
        else if(!empty($request->input('search'))){
            // $template_types = $request->input('search');
            $template_types = DB::table('tbl_template')
                        ->where('title', 'LIKE', '%'.$request->input('search').'%')
                        ->orwhere('description', 'LIKE', '%'.$request->input('search').'%')
                        ->where('status', '1')
                        ->get();
        }
        else if(!empty($request->input('type')) && !empty($request->input('search'))){
            $template_types = DB::table('tbl_template')
                        ->where('type_id', 'LIKE', $request->input('type'))
                        ->andwhere('title', 'LIKE', '%'.$request->input('search').'%')
                        ->orwhere('description', 'LIKE', '%'.$request->input('search').'%')
                        ->where('status', '1')
                        ->get();
        }
        else{
            // $template_types = 'nothis';
            $template_types = DB::table('tbl_template')->where('status', '1')->get();
        }
        
        
        foreach($template_types as $key => $val){
            $data[$key] = [
                "type_id"=>$val->type_id,
                "title"=>$val->title,
                "description"=>$val->description,
                "word_limit"=>$val->word_limit,
                "icon"=>$val->icon,
                "is_pro"=>$val->is_pro,
                "is_favorite"=>$val->is_favorite,
                "status"=>$val->status
            ];
        }

                        
        return response()->json([
                "status" => 1,
                "templates" => $data,
                "message" => "Templates loaded successfully."
            ], 200);
    }
    
    
    // --- Api method for Project creation ---
    public function projectCreate(Request $request){
        $ins_data = [
            'user_id'      => base64_decode($request->input('user_id')),
            'keyword'      => $request->input('keyword'),
            'content_long' => $request->input('content_long'),
            'title'        => $request->input('title'),
            'paragraph'    => $request->input('paragraph'),
            'status'       => 1
        ];
        // $users = DB::table('template_type')->insert($ins_data);
        $project_id = DB::table('tbl_projects')->insertGetId($ins_data);

        if($project_id){
            return response()->json([
                "status" => 1,
                "message" => "Project created successfully."
            ], 200);
        }
        else{
            return response()->json([
                "status" => 1,
                "message" => "Sorry, Failed to create the project. Please check your database functions."
            ], 201);
        }

    }
    
    public function projectList(Request $request){
        $projects = DB::table('tbl_projects')
                ->where('user_id', base64_decode($request->input('user_id')))
                ->get();
        
        return response()->json([
                "status" => 1,
                "projects" => $projects,
                "message" => "Projects loaded successfully."
            ], 200);

    }

}
