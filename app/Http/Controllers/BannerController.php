<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Session;
use App\Banner;

class BannerController extends Controller
{
    public function view_index()
    {
        
        return view ('admin.banner.index');
    }

    public function view_create()
    {
        return view('admin.banner.create');
    }

    public function create(Request $req)
    {
        $banner=new Banner;
        $banner->Link=$req->banner_link;
        
        if($req->hasFile('Image'))
        {
            $file = $req->file('Image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' .$extension;
            $file->move('images/banner',$filename);
            $banner->Image = $filename;
        }
        else{
            $banner->Image = NULL;
        }

        if($req->banner_status==1)
            $banner->Status=1;
        else
            $banner->Status=0;

        $banner->save();
        Session::put('message','The banner is added successfully');
        return redirect::to('/view_banner_index');
    }

    public function unactivate_banner($id)
    {
        Banner::where('BannerID',$id)->update(['Status'=>0]);

        Session::put('message','The banner is unactivated successfully');

        return redirect::to('/view_banner_index');
    }

    public function activate_banner($id)
    {
        Banner::where('BannerID',$id)->update(['Status'=>1]);

        Session::put('message','The banner is activated successfully');

        return redirect::to('/view_banner_index');
    }

    public function delete_banner($id)
    {
        Banner::where('BannerID',$id)->delete();

        Session::put('message','The banner is deleted successfully');

        return redirect::to('/view_banner_index');
    }
}
