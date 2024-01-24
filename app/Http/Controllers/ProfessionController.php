<?php

namespace App\Http\Controllers;

use App\Profession;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Skill;
use App\Sortable;
use App\User;
use Illuminate\Database\Eloquent\Builder;

class ProfessionController extends Controller
{
    public function index()
    {
        $profession = Profession::withCount('profiles')->orderBy('title')
        ->paginate(10)
        ;

        return view('professions.index', [
            'professions' => $profession,
        ]);
    }

    public function destroy(Profession $profession)
    {
        abort_if($profession->profiles()->exists(), 400, 'Cannot delete a profession linked to a profile');

        $profession->delete();

        return redirect()->route('profession.index');
    }
}
