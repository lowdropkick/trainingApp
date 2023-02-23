<?php

namespace App\Policies;

use App\Models\Course;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class userPolicy
{
    public function viewAny(User $user)
    {

        return $user->roles()->where('role', 'manager')->exists() ? Response::allow() : Response::deny();;
    }
    public function view(User $user, Course $course)
    {

        $allowedCourses = $user->course()->pluck('name')->toArray();


        return in_array($course->name, $allowedCourses)  ? Response::allow() : Response::deny();
    }

}
