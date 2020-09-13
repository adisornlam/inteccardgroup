<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

use App\Model\Content;
use App\Model\Category;

class ContentController extends Controller
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
        $contents = Content::with('categories')->orderBy('id','ASC')->paginate(20);
        return view('backend.contents.index',compact('contents','authcheck'))
            ->with('i', ($request->input('page', 1) - 1) * 20);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id');
        return view('backend.contents.create',compact('categories'));
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
            'short_desc' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        
        // create Post
        $contents = new Content;
        $contents->name = $request->input('name');
        $contents->short_desc = $request->input('short_desc');
        $contents->categories_id = $request->input('categories_id');
        $contents->created_user_id = auth()->user()->id;
        $contents->image = $this->uploadfile($request->file('image'),'contents/cover/');
        $contents->link = ($request->has('link') ? $request->input('link'):NULL);
        $contents->active = ($request->input('active')=== '1' ? 1:0);
        $contents->save();
        return redirect()->route('contents.index')
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
        $content = Content::find($id);
        return view('backend.contents.show',compact('content'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $content = Content::find($id);
        $categories = Category::pluck('name', 'id');
        return view('backend.contents.edit',compact('content','categories'));
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
            'short_desc' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $contents = Content::find($id);
        $contents->name = $request->input('name');
        $contents->short_desc = $request->input('short_desc');
        $contents->categories_id = $request->input('categories_id');
        $contents->link = ($request->has('link') ? $request->input('link'):NULL);
        $contents->active = ($request->input('active')=== '1' ? 1:0);
        $contents->save();

        if($request->hasFile('image')){
            $pathImage = $this->uploadfile($request->file('image'),'contents/cover/');
            $contents->image = $pathImage;
            $contents->save();
        }

        return redirect()->route('contents.index')
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
        Content::find($id)->delete();
        return redirect()->route('contents.index')
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