<?php
namespace App\Http\Controllers\Site;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Offer;
use DB;
use Session;

use Route;
use App\ActivityLog;
use Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Input;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\URL;
use Laravel\Socialite\Facades\Socialite;
use Yajra\Datatables\Datatables;
use App\Testimonial;
use App\StaticBlock;

class HomeController extends Controller
{
    /*   
	 	Added by Devang Mavani
      	listing home page of fynches
	*/ 
    public function index()
    {
    	Session::forget('yelp_experience');
    	$banner_section_block = StaticBlock::where('slug','banner-section')->first();
		$work_section_block = StaticBlock::where('slug','how-work-section')->first();
		$happiness_section_block = StaticBlock::where('slug','happiness-home-section')->first();
		
        $testimonails= Testimonial::orderBy('updated_at','desc')->where('status', "Active")->limit(2)->get();
		return view('site.index', ['banner_section_block' => $banner_section_block, 'work_section_block' =>$work_section_block,'happiness_section_block' =>$happiness_section_block ,'testimonails' => $testimonails]);
    }
    
}
