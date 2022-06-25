<?php

namespace App\Http\Controllers;

use App\Enums\DataBaseEnum;
use App\Models\Category;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function content()
    {
        return [
            DataBaseEnum::ADHD => [
                'Introduction' => [
                    'content' => 'adhd1',
                    'image' => '',
                ],
                'Summary' => [
                    'content' => 'adhd2',
                    'image' => '',
                ],
            ],
            DataBaseEnum::AUTISM => [
                'content' => 'autism',
                'image' => '',
            ],
            DataBaseEnum::DOWN_SYNDROME => [
                'content' => 'down',
                'image' => '',
            ],
            DataBaseEnum::VISUAL_DISABILITY => [
                'content' => 'visual',
                'image' => '',
            ],
        ];
    }

    public function getContent(Category $category)
    {
        $content = $this->content();
        // dd($content[$category->name]['section_one']['image']);


        // foreach ($content[$category->name] as $section => $value) {

        // }
        // $content['content'] // example content for view
        // return view('', [
        //     'content' => $content[$category->name]
        // ]);
    }
}
