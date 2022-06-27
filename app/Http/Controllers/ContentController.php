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
                'Introduction' => [
                    'content' => 'adhd1',
                    'image' => '',
                ],
                'Summary' => [
                    'content' => 'adhd2',
                    'image' => '',
                ],
            ],
            DataBaseEnum::DOWN_SYNDROME => [
                'Introduction' => [
                    'content' => null,
                    'image' => null,
                ],
                'Summary' => [
                    'content' => null,
                    'image' => null,
                ],
            ],
            DataBaseEnum::VISUAL_DISABILITY => [
                'Introduction' => [
                    'content' => null,
                    'image' => null,
                ],
                'Summary' => [
                    'content' => null,
                    'image' => null,
                ],
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
        return view('site.modules.content.index', [
            'content' => $content[$category->name]
        ]);
    }
}
