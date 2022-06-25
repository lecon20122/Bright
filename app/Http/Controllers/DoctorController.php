<?php

namespace App\Http\Controllers;

use App\Enums\DataBaseEnum;
use App\Http\Resources\UserResource;
use App\Models\Category;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Auth\RedirectsUsers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;

class DoctorController extends Controller
{
    use RedirectsUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('admin.modules.doctor.index', [
            'doctors' => User::doctor()->paginate(15),
            'categories' => Category::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(Request $request)
    {
        try {
            $data = $request->all();
            $data['type'] = DataBaseEnum::DOCTOR;
            User::create($data);
            return redirect($this->redirectPath());
        } catch (Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($doctor_id)
    {
        $doctor = User::where('id' , $doctor_id)->get();
        return view('site.modules.doctors.index', [
            'CategoryUsers' => $doctor,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //find by id

        //update($request->all)
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    public function toggleApprovalForDoctor(User $doctor)
    {
        try {
            if ($doctor->type == DataBaseEnum::DOCTOR) {
                $doctor->is_approved = !$doctor->is_approved;
                $doctor->save();
            }
            return Redirect()->back()->with('success', `Doctor $doctor->name is approved successfully`);
        } catch (Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }
    public function toggleSponsorForDoctor(User $doctor)
    {
        try {
            if ($doctor->type == DataBaseEnum::DOCTOR) {
                $doctor->sponsor = !$doctor->sponsor;
                $doctor->save();
            }
            return Redirect()->back()->with('success', `Doctor $doctor->name is approved successfully`);
        } catch (Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }


    public function doctorRegistrationPage()
    {
        $doctor = Category::with('children')->parent()->where('name', DataBaseEnum::DOCTOR)->get();

        return view('auth.join-us', [
            'categories' => $doctor,
        ]);
    }

    public function getDoctorsByCategory(Category $category)
    {
        return view('site.modules.doctors.index', [
            'CategoryUsers' => $category->users,
        ]);
    }

    public function takeClinicTest(Category $category)
    {

        return view('site.modules.questions.index', [
            'category' => $category
        ]);
    }

    public function attachDoctorToCategory(Request $request, User $doctor)
    {
        try {
            $category = Category::find($request->category_id);
            $doctor->categories()->attach($category);
            return Redirect()->back()->with('success', `Doctor $doctor->name is attached to $category->name successfully`);
        } catch (Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function attachDoctorToCategoryView(User $doctor)
    {
        return view('admin.modules.doctor.edit', [
            'doctor' => $doctor,
            'categories' => Category::all(),
        ]);
    }
}
