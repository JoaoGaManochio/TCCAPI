<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Vacancies;
class VacanciesController extends Controller
{
    
	public function verificaVagas(){
		//$vagas = Vacancies::find($id);
		$vagas = Vacancies::where('available', 'S')->get();
		return response()-> json($vagas);
	}

    public function verificaVagasUser($id){
        $vagas = Vacancies::where('id_user', $id)->get();
        if(is_null($vagas)){
            return response()->json([
            'error' => 'Usuario não possui vagas reservadas!',
            'code' => 401], 401);
        }
        else{
            return response()-> json($vagas);   
        }
    }


    public function reservarVagas($id, $id_user){
        $vagas = Vacancies::find($id);
        $vagas->available = 'N';
        $vagas->id_user = $id_user;
        $vagas->save();
        return $vagas;
    }

    public function cancelarVagas($id, $id_user){
        $id_user = NULL;
        $vagas = Vacancies::find($id);
        $vagas->available = 'S';
        $vagas->id_user = $id_user;
        $vagas->save();
        return $vagas;
    }

    public function cadastrarVagas(Request $input){
    	if($input->has('name')){
    		$input = Input::all();
    		$vagas = new Vacancies();
    		$vagas->fill($input);
    		$vagas->save();
    		return response()->json("Cadastro realizado!!");
    	}
    	else{
    		return response()->json("Faltando informações!!");
    	}
    }
    public function removerVagas($id){
    	$vagas = Vacancies::find($id);
    	if(is_null($vagas)){
    		response()->json("Vaga não encontrada!");
    	}
    	else{
    		$vagas->delete();
    		return response()->json("Vaga removida!!!");
    	}
    }
}
