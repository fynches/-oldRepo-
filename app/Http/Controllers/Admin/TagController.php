<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
use Auth; 
use App\User;
use App\Countries;
use App\States;
use App\Cities;
use App\ActivityLog;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use URL;
use App\Events\UserCreated;
use App\Experience;
use App\Tag;



class TagController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //display Event listing
    public function index() {
    	$tag=array();
        return view('admin/Tag/index', ['title_for_layout' => 'List Experience Keywords','tag'=>$tag]);
    } 
	
	public function create($event_id="") {
        
        return view('admin/Tag/create', ['title_for_layout' => 'Add Experience Keywords']);
    }
    
   
	public function getData() {
        	
        DB::statement(DB::raw('set @rownum=0'));

        $data = Tag::orderBy('id','desc')->get(['tags.*', DB::raw('@rownum  := @rownum  + 1 AS rownum')]);
        return Datatables::of($data)->make(true);
           
    }
	
	public function show($id) {

        $tag = Tag::find($id);

        if (empty($tag)) {
            Session::flash('error_msg', 'Experience Keywords not found.');
            return redirect('/admin/tag');
        }
        return view('admin/Tag/show', ['title_for_layout' => 'Experience Keywords Details',
            'tag' => $tag]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //save user record
    public function store(Request $request) {
    	
        $validator = Validator::make($request->all(), [
                    'tag_name' => 'required|max:200',
                    'status' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/admin/tag')
                            ->withInput()
                            ->withErrors($validator);
        }

        $data = $request->all();
		
		$files = Input::file('image');
	    if ($files && !empty($files)) {
	        
	        $rules = array('file' => 'mimes:jpg,jpeg,png,gif');
	        $validator = Validator::make(array('file' => $files), $rules);
	        if ($validator->passes()) {
	            $destinationPath = 'storage/tagImages/';
	            $timestamp = time();
	            $filename = $timestamp . '_' . trim($files->getClientOriginalName());
	            //echo $filename;
	            $path_thumb =  'storage/tagImages/thumb/';
	            if (!file_exists($path_thumb)) {
	                mkdir($path_thumb, 0777, true);
	                chmod($path_thumb, 0777);
	            }
	            
	            Image::make($files->getRealPath())->resize(300, 300)->save('storage/tagImages/thumb/' . $filename);
	            $upload_success = $files->move($destinationPath, $filename);
	
	            if (file_exists('storage/tagImages/' . $filename)) {
	                chmod('storage/tagImages/' . $filename, 0777);
	            }
	            if (file_exists('storage/tagImages/thumb/' . $filename)) {
	                chmod('storage/tagImages/thumb/' . $filename, 0777);
	            }
	        } else {
	            return Redirect::to('/tag')->withInput()->withErrors($validator);
	        }
	        $image_name = $filename;
	    }
        
		$data['image'] = $image_name;
		
        $tag = Tag::tagcreate($data);

        if ($tag) {
            $msg = "Experience Keywords Created Successfully.";
            $log = ActivityLog::createlog(Auth::Id(), "Tag", $msg, Auth::Id());
            Session::flash('success_msg', $msg);
            return redirect('/admin/tag');
        } else {
            Session::flash('error_msg', 'Something went wrong!');
            return redirect('/admin/tag');
        }
    }

   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //edit Experience record
    public function edit($id) {

        $tag = Tag::find($id);
        $title_for_layout = 'Edit Experience Keywords Details';

        if (empty($tag)) {
            Session::flash('error_msg', 'Tag not found.');
            return redirect('/admin/tag');
        }
        
        return view('admin/Tag/edit', ['title_for_layout' => $title_for_layout,
            'tag' => $tag]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     //update user record or user profile
    public function update(Request $request, $id) {
    	
        $tag = Tag::find($id);

        if (empty($tag)) {
            Session::flash('error_msg', 'Tag not found.');
            return redirect('/admin/tag');
        }

        $validator = Validator::make($request->all(), [
                    'tag_name' => 'required|max:200',
                    'status' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/admin/tag/' . $id . '/edit')
                            ->withInput()
                            ->withErrors($validator);
        } else {
            $data = $request->all();
			
			if (key_exists('image', $data)) {
				
                    $tag_image = Input::file('image');
					$tag_record = Tag::where('id',$id)->first(); 
					
                    if ($tag_image) {
                    	
						if(count($tag_record)>0){
		                    $oldPicture = $tag_record['image'];
		                    $data['image'] =  $oldPicture;
		                }
						
                        $rules = array('file' => 'mimes:jpg,jpeg,png,bmp,gif');
                        $validator = Validator::make(array('file' => $tag_image), $rules);


                        $profile_image = '';
                        if ($validator->passes()) {
                            $destinationPath = 'storage/tagImages/';
                            $timestamp = time() . uniqid();
                            $filename = $timestamp . '_' . trim($tag_image->getClientOriginalName());
                            $path_thumb =  'storage/tagImages/thumb/';
						
                            if (!File::exists($path_thumb)) {
                            	mkdir($path_thumb, 0777, true);
                                chmod($path_thumb, 0777);
                            }

                            Image::make($tag_image->getRealPath())->resize(110, 90, function($constraint) {
                                $constraint->aspectRatio();
                            })->save('storage/tagImages/thumb/' . $filename);
							
							$upload_success = $tag_image->move($destinationPath, $filename);
							
							if ($upload_success) {
	                            if (file_exists($destinationPath. $oldPicture)) {
	                                $unlink_success = File::delete($destinationPath . $oldPicture);
	                            }
	                            if (file_exists($path_thumb . $oldPicture)) {
	                                $unlink_success = File::delete($path_thumb . $oldPicture);
	                            }                             
                        	} 
						     $profile_image = $filename;
                        }
                    }
                } else {
                    if (isset($data['old_images'])) {
                        $profile_image = $data['old_images'];
                    } else {
                        $profile_image = '';
                    }
                }
				
			$data['image']= $profile_image;
			$tagresult = Tag::tagupdate($data,$id);
			
            if($tagresult){
                $msg = "Experience Keywords Updated Successfully.";
				$log = ActivityLog::createlog(Auth::Id(), "Tag", $msg, Auth::Id());
                Session::flash('success_msg', $msg);
                return redirect('/admin/tag');
            }else{
                Session::flash('error_msg', 'Something went wrong!');
                return redirect('/admin/tag/' . $id . '/edit');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //delete tag record 
    public function destroy($id) {        
        $tag = Tag::findOrFail($id);
        $tag->delete();
        $msg = "Experience Keywords Deleted Successfully.";
		$log = ActivityLog::createlog(Auth::Id(), "Tag", $msg, Auth::Id());
        Session::flash('success_msg', $msg);
        Session::save();
        echo 1;
        exit;
    }


    // Multiple tag delete
    function multiple_row_delete($id) {
    	
        $ids = explode(",", $id);
        Tag::destroy($ids);
        $msg = "Experience Keywords Deleted Successfully.";
        $log = ActivityLog::createlog(Auth::Id(), "Tag", $msg, Auth::Id());
        Session::flash('success_msg', $msg);
        Session::save();
        echo 1;
        exit;
    }
}
