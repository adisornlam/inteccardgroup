<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

use App\Model\Content;
use App\Model\Category;

class NewsController extends Controller
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
        //$request->user()->roles->first()->name;
        
        $authcheck = $request->user()->hasAnyRole(['supoeradministrator','administrator']);
        $news = Content::with('categories')->orderBy('id','ASC')->paginate(20);
        return view('backend.news.index',compact('news','authcheck'))
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
        return view('backend.news.create',compact('categories'));
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
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if($request->hasFile('attachment')){
            $pathFile = $this->uploadfile($request->file('attachment'),'contents/attachment/');
        }
        
        // create Post
        $news = new Content;
        $news->name = $request->input('name');
        $news->categories_id = $request->input('categories_id');
        $news->created_user_id = auth()->user()->id;
        $news->image = $this->uploadfile($request->file('image'),'contents/cover/');
        $news->attachment = (isset($pathFile) ? $pathFile:NULL);
        $news->link = $request->input('link');
        $news->active = ($request->input('active')=== '1' ? 1:0);
        $news->save();
        return redirect()->route('news.index')
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
        $news = Content::find($id);
        return view('backend.news.show',compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news = Content::find($id);
        $categories = Category::pluck('name', 'id');
        return view('backend.news.edit',compact('news','categories'));
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
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'attachment' => 'mimes:xlsx,doc,docx,ppt,pptx,pdf|max:204800'
        ]);

        $news = Content::find($id);
        $news->name = $request->input('name');
        $news->categories_id = $request->input('categories_id');
        $news->link = $request->input('link');
        $news->active = ($request->input('active')=== '1' ? 1:0);
        $news->save();

        if($request->hasFile('image')){
            $pathImage = $this->uploadfile($request->file('image'),'contents/cover/');
            $news->image = $pathImage;
            $news->save();
        }

        if($request->hasFile('attachment')){
            $pathFile = $this->uploadfile($request->file('attachment'),'contents/attachment/');
            $news->attachment = $pathFile;
            $news->save();
        }

        return redirect()->route('news.index')
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
        return redirect()->route('news.index') 
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
