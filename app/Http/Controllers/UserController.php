<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Group;


class UserController extends Controller
{
    public function getUsersFromGroup($groupID){
        $group = Group::where('id', '=', $groupID)->first();
        $usersInGroup = $group->users->toArray();

        return $usersInGroup;
    }
}
