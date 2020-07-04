<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Session;
use File;
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
        return redirect::to('/banners');
    }

    public function unactivate_banner($id)
    {
        Banner::where('BannerID',$id)->update(['Status'=>0]);

        Session::put('message','The banner is unactivated successfully');

        return redirect::to('/banners');
    }

    public function activate_banner($id)
    {
        Banner::where('BannerID',$id)->update(['Status'=>1]);

        Session::put('message','The banner is activated successfully');

        return redirect::to('/banners');
    }

    public function delete_banner($id)
    {
        $select_banner=Banner::where('BannerID',$id)->first();

        if($select_banner->Image!=NULL)
        {
            File::delete('images/banner/'.$select_banner->Image);
        }

        Banner::where('BannerID',$id)->delete();

        Session::put('message','The banner is deleted successfully');

        return redirect::to('/banners');
    }

    public function view_edit($id)
    {
        $select_banner=Banner::where('BannerID',$id)->first();

        $manage_banner = view('admin.banner.edit')->with('select_banner',$select_banner);

        return view('admin.layouts.app')->with('admin.banner.edit',$manage_banner);
    }

    public function edit_banner(Request $req)
    {

        $select_banner = DB::table('banner')->where('BannerID', $req->banner_id)
            ->first();
            DB::table('banner')->where('BannerID', $req->banner_id)
            ->update(['Link'=>$req->banner_link]);

            if($req->banner_status==1)
                DB::table('banner')->where('BannerID', $req->banner_id)
                    ->update(['Status'=>1]);
            else
            DB::table('banner')->where('BannerID', $req->banner_id)
                     ->update(['Status'=>0]);
            


            if($req->hasFile('Image'))
            {
                if($select_banner->Image!=NULL)
                {
                    File::delete('images/banner/'.$select_banner->Image);
                }
                $file = $req->file('Image');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' .$extension;
                $file->move('images/banner',$filename);
                DB::table('banner')->where('bannerID', $req->banner_id)
                    ->update(['Image'=>$filename]);
            }


        Session::put('message','The banner is updated successfully');
        return redirect::to('/banners');
    }
}
