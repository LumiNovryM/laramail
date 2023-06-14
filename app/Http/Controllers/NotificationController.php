<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\BirthdayWish;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
        $users = User::whereDate('birthdate','2023-06-14')->get();

        foreach($users as $user){ 

            $messages['hi'] = "Hey, Happy Birthday {$user->name}";
            $messages['wish'] = "On behalf pf the entire company I wish you my best wishes for much happiness in your life.";

            $user->notify(new BirthdayWish($messages));
            dd('Done');

        }
    }
}
