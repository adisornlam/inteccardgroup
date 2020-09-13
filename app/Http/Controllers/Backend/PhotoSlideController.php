<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

use App\Model\PhotoSlide;

class PhotoSlideController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $authcheck = $request->user()->hasAnyRole(['supoeradministrator','administrator']);
        $photoslides = PhotoSlide::paginate(20);
        return view('backend.photoslides.index',compact('photoslides','authcheck'))
            ->with('i', ($request->input('page', 1) - 1) * 20);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.photoslides.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $photoslide = new PhotoSlide;
        $photoslide->name = $request->input('name');
        $photoslide->description = $request->input('description');
        $photoslide->link = $request->input('link');
        $photoslide->created_user_id = auth()->user()->id;
        $photoslide->photo = $this->uploadfile($request->file('photo'),'contents/photoslide/');
        $photoslide->active = ($request->input('active')=== '1' ? 1:0);
        $photoslide->save();
        return redirect()->route('photoslide.index')
                        ->with('success','บันทึกข้อมูลเสร็จเรียบร้อยแล้ว');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $photoslide = PhotoSlide::find($id);
        return view('backend.photoslides.show',compact('photoslide'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $photoslide = PhotoSlide::find($id);
        return view('backend.photoslides.edit',compact('photoslide'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $photoslide = PhotoSlide::find($id);
        $photoslide->name = $request->input('name');
        $photoslide->description = $request->input('description');
        $photoslide->link = $request->input('link');
        $photoslide->active = ($request->input('active')=== '1' ? 1:0);
        $photoslide->save();

        if($request->hasFile('photo')){
            $photo = $this->uploadfile($request->file('photo'),'contents/photoslide/');
            $photoslide->photo = $photo;
            $photoslide->save();
        }

        return redirect()->route('photoslide.index')
                        ->with('success','บันทึกข้อมูลเสร็จเรียบร้อยแล้ว');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PhotoSlide::find($id)->delete();
        return redirect()->route('photoslide.index') 
                        ->with('success','ลบข้อมูลเสร็จเรียบร้อยแล้ว');
    }

    public function uploadfile($file, $path)
    {           
        $extension = $file->getClientOriginalExtension();
        $fileNameToStore = time().'.'.$extension;                       
        Storage::disk('public')->put($path.$fileNameToStore,  File::get($file));
        $rs = 'inteccardgroup/uploads/'.$path.$fileNameToStore;
        return url($rs);
    }
}
