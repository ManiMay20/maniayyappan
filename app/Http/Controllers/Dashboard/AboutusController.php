<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AboutusController extends Controller
{
    public function index() { 
        $data = About::all();
    	return view('dashboard.pages.aboutus', [ 'data'=> $data ]);
    }
    public function update_about(Request $request){ 

    	$validator = Validator::make($request->all(), [
		    "contents"    => "required|array",
		    "contents.*"  => "required",
		]);
		if ($validator->fails()) {
            return redirect()->back()->with('error', 'please enter all fields!');
        }
        DB::beginTransaction();
        try {
            $length = count($request->input());
	         for ($i=0; $i < $length; $i++) { 
	         	 $language = $request->input('language')[$i];
	             $content  = $request->input('contents')[$i];
	             $update = About::where('language', $language)->update(['content' => $content]);
	         }
            DB::commit();
        } 
        catch(Exception $ex) {
            DB::rollBack();
            throw $ex;
        }
        return redirect()->back()->with('success', 'Language update successfully!');
    }
}
