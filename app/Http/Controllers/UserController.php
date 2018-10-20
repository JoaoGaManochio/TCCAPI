<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Vacancies;

class UserController extends Controller{
	
	public function index(){
		return view('user');
	}

	public function allUsers(){
		$usuarios = User::all();
		return $usuarios;	
	}

	public function getUser($id){
		$usuarios = User::find($id);
		if (is_null($usuarios)) {
			return /*Response::json(*/["response" => "Usuario não encontrado"]/*, 400)*/;
		}
		return $usuarios;
	}

    public function save(Request $input){
    	if($input->has('first_name')){
            /*
            $us = User::where('emai', $input['emai'])->get();
            if($input['email'] == $us){
                return response()->json("E-mail já cadastrado");
            }*/
	    	$input = Input::all();
	    	$input['password'] = Hash::make($input['password']);
	    	$user = new User();
	    	$user->fill($input);
	    	//$user->api_token = str_random(60);
        	$user->save();
	    	//return $user->toJson();
            return response()->json('Usuario cadastrado com sucesso!!!!');
	    }
    }

    public function delete($id){
    	$usuarios = User::find($id);
    	if(is_null($usuarios)){
    		return ["response" => "Usuario não encontrado!"];
    	}
    	$usuarios->delete();
    	return ["response" => "Usuario removido!"];
    }

    public function update($id){
       	$user = User::find($id);
    	if(is_null($user)){
    		return ["Response" => "Usuario não encontrado!"];
    	}
    	$input = Input::all();
    	if(isset($input['password'])){
    		$input['password'] = Hash::make($input['password']);
    	}
    	$user->fill($input);
    	$user->save();
    	return $user;
    }

//Criar a verificação para o ADMIN
    public function login(Request $request){
		if (auth()->attempt(['email' => $request->input('email'), 'password' => $request->input('password')])){
        $user = auth()->user();
       	//$user->api_token = str_random(60);
        $user->save();

        return response()-> json($user->id);
    }
    return response()->json([
        'error' => 'Usuario não cadastrado!',
        'code' => 401], 401);
	}
}
