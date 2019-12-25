<?php

namespace App\Http\Controllers;

use App\DbcoSolution;
use App\DbcoCustomer;
use App\DbcoCategory;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\MssqlExtController;
use App\Http\Controllers\ServiceClassController;

class DbcoSolutionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function isSolutionRelated($solution, $dbco_customer) // подключено решение к кастомеру или нет, принимает на вход экземпляр DbcoSolution и экземпляр DbcoCustomer
    {
        If ($dbco_customer->dbcoSolutions()->where('iinstallsolution', '=', $solution->isolutionid)->where('deleted_at', '=', null)->count()) { // если существует запись в pivot и флаг удаления не установлен
            return 'success';
        } else {
            return 'primary';
        }
    }

    public function index($isolutioncategory = 1, DbcoCategory $dbco_category) //
    {

        $buttonState = [];

        $categories = $dbco_category->where('icategoryparent', null)->get();
        $current_category_tag = ($isolutioncategory) ? $dbco_category->find($isolutioncategory)->ccategorytag : '#';

        $solutions = DbcoSolution::where('isolutiontype', 1)->where('csolutiontag', 'like', $current_category_tag)->where('isolutiondeleted', 0)->paginate(12);


        $authors = [];

        if (Auth::check()) {
            $dbco_customer = DbcoCustomer::getCurrentCustomer();

            ServiceClassController::setIsOwnedSolutionFlag($dbco_customer, $solutions); //устанавливаем isOwned для каждого солюшена в коллекции для отображения в представлении
          $isInLoad= ServiceClassController::get_array_load_solution($dbco_customer, $solutions);
        }else{$isInLoad=[];}

        foreach ($solutions as $solution) {
            if (isset($dbco_customer)) {
                $buttonState[$solution->isolutionid] = $solution->createSolutionButtonStateData($this->isSolutionRelated($solution, $dbco_customer));
            } else {
                $buttonState[$solution->isolutionid] = $solution->createSolutionButtonStateData('secondary');
            }

            $authors[$solution->isolutionid] = ($author = DbcoCustomer::where('icustomerid', $solution->isolutiondeveloper)->first()) ? $author->ccustomername : '';
        }


        if (request()->wantsJson()) {
            $data['body'] = view('dbco.solutions.single_block', ['solutions' => $solutions, 'buttonState' => $buttonState, 'categories' => $categories, 'isolutioncategory' => $isolutioncategory, 'authors' => $authors,'isInLoad'=>$isInLoad])->render();


            $data['page_hide'] = 0;
            if ($solutions->lastPage() <= $solutions->currentPage()) {
                $data['page_hide'] = 1;
            }
            return response()->json(
                array('body' => $data));

        }


        return view('dbco.solutions.index', ['solutions' => $solutions, 'buttonState' => $buttonState, 'categories' => $categories, 'isolutioncategory' => $isolutioncategory, 'authors' => $authors,'isInLoad'=>$isInLoad]);

    }

    public function toggle($sid) // принимает id солюшена
    {

        $dbco_customer = DbcoCustomer::getCurrentCustomer();

        If ($dbco_customer->dbcoSolutions()->where('iinstallsolution', '=', $sid)->where('deleted_at', '=', null)->count()) { // если существует запись в pivot и флаг удаления НЕ установлен
            $dbco_customer->dbcoSolutions()->updateExistingPivot($sid, ['deleted_at' => date("Y-m-d H:i:s"), 'iinstallstate' => 0]); //устанавливаем флаг
        } elseif ($dbco_customer->dbcoSolutions()->where('iinstallsolution', '=', $sid)->where('deleted_at', '!=', null)->count()) { // если существует запись в pivot и флаг удаления установлен
            $dbco_customer->dbcoSolutions()->updateExistingPivot($sid, ['deleted_at' => null, 'iinstallstate' => 1]); // снимаем флаг удаления
        } else {
            $dbco_customer->dbcoSolutions()->attach($sid); //если ни то ни другое - создаем запись в pivot
            // по умолчанию MySQL ставит iinstallstate в таблице в 1, а iinstallstateext - в 0
        }

        //MssqlExtController::callMssqlProcedure('sp_update_install '.$dbco_customer->icustomerid);

        //return redirect()->route('dbcosolution.index');
        return back();

    }

}