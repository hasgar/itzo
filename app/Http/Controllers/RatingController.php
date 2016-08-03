<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use App\Ratings;
use App\Healthcare;
use Auth;
class RatingController extends Controller
{
   public function __construct()
  {
      $this->middleware('isUser');
  }
  
   public function addRating(Request $request)
  {
      $rules = array(
        'rating' => 'required|in:1,2,3,4,5',
        'message' => 'required',
        'healthcare_id' => 'required|Exists:healthcare,id'
    );
    $validation = Validator::make( $request->all(), $rules );
    if ( $validation->fails() )
    {
        return [
            'status' => 'error',
            'message' => 'validation_failed',
            'errors' => $validation->errors()
        ];
    }
    
    Ratings::create([
            'rating' => $request['rating'],
            'user_id' => Auth::user()->id,
            'message' => $request['message'],
            'healthcare_id' =>  $request['healthcare_id'],
        ]);
    
    return redirect('/healthcare/'.Healthcare::where('id',$request['healthcare_id'])->pluck('id')[0].'/'.urlencode(Healthcare::where('id',$request['healthcare_id'])->pluck('name')[0]));
  }
}
