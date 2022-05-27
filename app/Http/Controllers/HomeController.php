<?php

namespace App\Http\Controllers;

use App\Enums\DataBaseEnum;
use App\Models\Category;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\If_;

use function PHPUnit\Framework\isNull;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $backgroundColors =  [
            DataBaseEnum::ADHD => 'primary',
            DataBaseEnum::AUTISM => 'warning',
            DataBaseEnum::DOWN_SYNDROME => 'info',
            DataBaseEnum::VISUAL_DISABILITY => 'danger',
        ];
        $specialtiesCategory = Category::with('children')->where('name', DataBaseEnum::SPECIALTIES)->first();
        return view('site.index', [
            'specialties' =>  $specialtiesCategory,
            'backgroundColors' => $backgroundColors,
        ]);
    }

    /**
     * Redirect the authenticated user to welcome view
     *
     *
     */
    public function welcome()
    {
        return view('welcome');
    }
}
