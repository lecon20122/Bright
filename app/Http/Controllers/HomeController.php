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
        $headerImage = [
            DataBaseEnum::ADHD => 'adhd2.png',
            DataBaseEnum::AUTISM => 'aut.png',
            DataBaseEnum::DOWN_SYNDROME => '4915786.jpg',
            DataBaseEnum::VISUAL_DISABILITY => 'visual.png',
        ];
        $description = [
            DataBaseEnum::ADHD => '  اضطراب نقص الأنتباه مع فرط الحركة هو اضطراب نفسي من نوع تأخر النمو العصبي',
            DataBaseEnum::AUTISM => '"التوحد أو ذاتوية" هو ضعف التفاعل الاجتماعي والتواصل اللفظي وغير اللفظي وأنماط سلوكية مقيدة ومتكررة.',
            DataBaseEnum::DOWN_SYNDROME => 'متلازمة داون  يصاحب المتلازمة غالباً ضعف في القدرات الذهنية والنمو البدني، وبمظاهر وجهية مميزة',
            DataBaseEnum::VISUAL_DISABILITY => 'العجز أو الضعف في حاسّة البصر ',
        ];


        $specialtiesCategory = Category::with('children')->where('name', DataBaseEnum::SPECIALTIES)->first();
        $FeaturedCategoryDoctors = Category::where('name', DataBaseEnum::FEATURED)->first();
        // dd($FeaturedCategoryDoctors);
        return view('site.index', [
            'specialties' =>  $specialtiesCategory,
            'backgroundColors' => $backgroundColors,
            'headerImage' => $headerImage,
            'description' => $description,
            'FeaturedCategoryDoctors' => $FeaturedCategoryDoctors,
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
