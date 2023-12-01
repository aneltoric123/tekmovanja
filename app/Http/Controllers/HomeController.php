<?php
namespace App\Http\Controllers;
use App\Models\CategoryModel;
use App\Models\CompetionModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function showHomepage()
    {
        $categories = CategoryModel::all();
        $competitions = CompetionModel::all();

        return view('homepage', compact('categories', 'competitions'));
    }
}

