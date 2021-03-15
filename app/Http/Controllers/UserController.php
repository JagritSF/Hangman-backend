<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\CorrectLetter;
use App\Models\WrongLetter;
use App\Models\LastWord;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /*  
        Start Game for the user
    */
    public function startGame(Request $request)
    {
        $input = $request->all();
        $dataToBeReturn = [];
        $validator = Validator::make($input, [
            'email' => 'unique:users,email'
        ]);
        /*  
            Check if the user has played the game before
        */
        if ($validator->fails()) {
            $user = User::where('email', $input['email'])->first();
            $lastWord = LastWord::where('user_id', $user['id'])->first();
            if (!empty($lastWord)) {
                $wrongLetters = WrongLetter::select('letter')
                ->where('user_id', $user['id'])
                ->where('word', $lastWord['word'])
                ->get();
                $wrongLettersToReturn = [];
                $correctLettersToReturn = [];
                /*  
                    Check if there are wrong letters in Database for the last incomplete
                */
                if (!empty($wrongLetters)) {
                    foreach ($wrongLetters as $letter) {
                        $wrongLettersToReturn[] = $letter['letter'];
                    }
                }
                $correctLetters = CorrectLetter::select('letter')
                ->where('user_id', $user['id'])
                ->where('word', $lastWord['word'])
                ->get();
                /*  
                    Check if there are correct letters in Database for the last incomplete
                */
                if (!empty($correctLetters)) {
                    foreach ($correctLetters as $letter) {
                        $correctLettersToReturn[] = $letter['letter'];
                    }
                }
                $dataToBeReturn['user_id'] = $user['id'];
                $dataToBeReturn['last_word'] = $lastWord['word'];
                $dataToBeReturn['wrong_letters'] = $wrongLettersToReturn;
                $dataToBeReturn['correct_letters'] = $correctLettersToReturn;
            } else {
                $dataToBeReturn['user_id'] = $user['id'];
            }
            return response()->json($dataToBeReturn, 200);
        }
        $input = $request->all();
        $user = User::create($input);
        $dataToBeReturn['user_id'] = $user['id'];
        return response()->json($dataToBeReturn, 200);
    }

    /*  
        Save Correct letters for a word to Database
    */
    public function saveCorrectLetters(Request $request)
    {
        $input = $request->all();
        CorrectLetter::create($input);
        return response()->json($input, 200);
    }

    /*  
        Save Wrong letters for a word to Database
    */
    public function saveWrongLetters(Request $request)
    {
        $input = $request->all();
        WrongLetter::create($input);
        return response()->json($input, 200);
    }

    /*  
        Save Last Random Word which is selected for the user for the game to Database
    */
    public function saveLastWord(Request $request)
    {
        $input = $request->all();
        $lastWord = LastWord::where('user_id', $input['user_id'])->delete();
        LastWord::create($input);
        return response()->json($input, 200);
    }
}
