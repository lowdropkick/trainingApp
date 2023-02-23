<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Policies\userPolicy;
class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function update(Course $course, User $user)
    {
        $course->users()->updateExistingPivot($user, ['passed' => true]);
        return redirect()->back();
    }

    public function index()
    {
        $current_user_id = auth()->id(); // get the ID of the currently logged in user
        $current_user_role = Role::where('user_id', $current_user_id)->first(); // get the role of the logged in user
        ;
        if ($current_user_role && $current_user_role->role == 'manager') {
            $courses = Course::all();
            $users = User::where('id', '!=', $current_user_id)->get();
            return view("home", compact('courses', 'users'));
        }

        if ($current_user_role && $current_user_role->role == 'student') {
            $courses = Course::whereHas('users', function($query) use ($current_user_id) {
                $query->where('user_id', $current_user_id);
            })->get(); // get all courses for the logged in user
            $users =  Auth::user();

            return view("home", compact('courses', 'users'));

        }
    }


        public
        function results($id, $user_id)
        {
            $course = Course::findOrFail($id);

            if ($course->users()->wherePivot('user_id', $user_id)->wherePivot('course_id', $course->id)->wherePivot('passed', true)->exists()) {
                return view('Course_progress.cert', ['course' => $course]);
            } elseif ($course->passed) {
                return view('Course_progress.cert', ['course' => $course]);
            } else {
                return view('Course_progress.not_passed', ['course' => $course]);
            }
        }

}

