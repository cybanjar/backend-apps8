<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employe;

class EmployeController extends Controller
{
    public function index()
    {
        $emp = Employe::all();
        return response()->json($emp);
    }


}
