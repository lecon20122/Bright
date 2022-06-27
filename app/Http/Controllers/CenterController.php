<?php

namespace App\Http\Controllers;
use App\Enums\DataBaseEnum;
use App\Models\User;
use App\Models\Category;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

use Illuminate\Routing\Redirector;

class CenterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('admin.modules.Center.index', [
            'centers' => User::center()->paginate(15),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

            try {
                $data = $request->all();
                $data['type'] = DataBaseEnum::CENTER;
                User::create($data);
                return redirect($this->redirectPath());
            } catch (Exception $exception) {
                return redirect()->back()->with('error', $exception->getMessage());
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function toggleApprovalForCenter(User $center)

    {

        try {
            if ($center->type == DataBaseEnum::CENTER) {
                $center->is_approved = !$center->is_approved;
                $center->save();
            }
            return Redirect()->back()->with('success', `center $center->name is approved successfully`);
        } catch (Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }
    public function toggleSponsorForCenter(User $center)
    {
        try {
            if ($center->type == DataBaseEnum::CENTER) {
                $center->sponsor = !$center->sponsor;
                $center->save();
            }
            return Redirect()->back()->with('success', `Center $center->name is approved successfully`);
        } catch (Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function CenterRegistrationPage()
    {
        $center = Category::with('children')->parent()->where('name', DataBaseEnum::CENTER)->get();

        return view('auth.join-us', [
            'categories' => $center,
        ]);
    }
    public function getCentersByCategory(Category $category)
    {
        return view('site.modules.doctors.index', [
            'CategoryUsers' => $category->users,
        ]);
    }
    public function attachCenterToCategory(Request $request, User $center)
    {
        try {
            $category = Category::find($request->category_id);
            $center->categories()->attach($category);
            return Redirect()->back()->with('success', `Center $center->name is attached to $category->name successfully`);
        } catch (Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }
        public function attachCenterToCategoryView(User $center)
        {
            return view('admin.modules.Center.edit', [
                'center' => $center,
                'categories' => Category::all(),
            ]);
        }
}
