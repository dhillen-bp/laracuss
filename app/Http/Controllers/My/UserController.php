<?php

namespace App\Http\Controllers\My;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Discussion;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function show($username)
    {
        $user = User::where('username', $username)->first();
        if (!$user) {
            return abort(404);
        }

        $picture = filter_var($user->picture, FILTER_VALIDATE_URL) ? $user->picture : Storage::url($user->picture);

        $perPage = 3;
        $columns = ['*'];
        $discussionsPageName = 'discussions';
        $answersPageName = 'answers';

        return response()->view('pages.users.show', [
            'user'          => $user,
            'picture'       => $picture,
            'discussions'   => Discussion::where('user_id', $user->id)->paginate($perPage, $columns, $discussionsPageName),
            'answers'       => Answer::where('user_id', $user->id)->paginate($perPage, $columns, $answersPageName),
        ]);
    }
}
