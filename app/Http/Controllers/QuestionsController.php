<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use JavaScript;


class QuestionsController extends Controller
{
    //
    public function index(){
        $questionCollection = Question::all();

        $questionsList = array();

        foreach($questionCollection as $question) {
            $questionsList[] = $question->question;
        }   

        JavaScript::put([
            'questions' => $questionsList,
         ]);
       
         return view('b2b');
    }
}
