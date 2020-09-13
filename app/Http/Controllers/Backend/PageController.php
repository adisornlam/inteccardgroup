<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

use App\Model\Page;

class PageController extends Controller
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
        $pages = Page::paginate(20);
        return view('backend.pages.index',compact('pages','authcheck'))
            ->with('i', ($request->input('page', 1) - 1) * 20);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.create');
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
            'long_desc' => 'required'
        ]);
        
        // create Post
        $pages = new Page;
        $pages->name = $request->input('name');
        $pages->slug = $request->input('slug');
        $pages->long_desc = $request->input('long_desc');
        $pages->created_user_id = auth()->user()->id;
        $pages->active = ($request->input('active')=== '1' ? 1:0);
        $pages->save();
        return redirect()->route('pages.index')
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
        $page = Page::find($id);
        return view('backend.pages.show',compact('page'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page = Page::find($id);
        return view('backend.pages.edit',compact('page'));
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
        ]);

        $pages = Page::find($id);
        $pages->name = $request->input('name');
        $pages->slug = $request->input('slug');
        $pages->long_desc = $request->input('long_desc');
        $pages->active = ($request->input('active')=== '1' ? 1:0);
        $pages->save();

        return redirect()->route('pages.index')
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
        Page::find($id)->delete();
        return redirect()->route('pages.index')
                        ->with('success','ลบข้อมูลเสร็จเรียบร้อยแล้ว');
    }

    public function uploadfile($file, $path)
    {           
        $extension = $file->getClientOriginalExtension();
        $fileNameToStore = time().'.'.$extension;                       
        Storage::disk('public')->put($path.$fileNameToStore,  File::get($file));
        return $path.$fileNameToStore;
    }

    public function uploadImage(Request $request) {
        $CKEditor = $request->input('CKEditor');
        $funcNum  = $request->input('CKEditorFuncNum');
        $message  = $url = '';
        if (Input::hasFile('upload')) {
            $file = Input::file('upload');
            if ($file->isValid()) {
                $filename =rand(1000,9999).$file->getClientOriginalName();
                $file->move(public_path().'/wysiwyg/', $filename);
                $url = url('wysiwyg/' . $filename);
            } else {
                $message = 'An error occurred while uploading the file.';
            }
        } else {
            $message = 'No file uploaded.';
        }
        return '<script>window.parent.CKEDITOR.tools.callFunction('.$funcNum.', "'.$url.'", "'.$message.'")</script>';
    }
}
