<?php

namespace App\Http\Controllers;

use App\Models\Ebook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class EbookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ebooks = Ebook::with('user')->where('user_id', Auth::user()->id)->get();
        return view('dashboard.ebook.index', compact('ebooks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'file_upload' => 'required|mimes:pdf'
        ];
        $validatedData = $request->validate($rules);
        $file = $request->file('file_upload');
        $fileName = $file->getClientOriginalName();
        $fileName = str_replace(' ', '_', $fileName);
        $destinationPath = public_path() . '/ebook';
        $file->move($destinationPath, $fileName);
        $validatedData['file_upload'] = $fileName;
        $save = Ebook::create([
            'file_upload' => $validatedData['file_upload'],
            'user_id' => Auth::user()->id
        ]);
        if ($save == true) {
            Alert::success('Success', 'File has been uploded');
            return redirect('/dashboard/ebook');
        } else {
            Alert::error('Error', 'Upload Failed!');
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ebook = Ebook::find($id);
        unlink(public_path("ebook/" . $ebook->file_upload));
        Ebook::destroy($id);
        Alert::success('Success', 'Ebook has been deleted!');
        return redirect("/dashboard/ebook");
    }
}
