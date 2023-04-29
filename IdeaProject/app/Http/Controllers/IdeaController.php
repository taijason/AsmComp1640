<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Idea;
use App\Models\IdeaType;

class IdeaController extends Controller
{
    public function index()
    {
        $data = Idea::get();
        return view('list', compact('data'));
    }

    public function index2()
    {
        $data = Idea::select('ideas.*', 'ideaTypes.ideaTypeName')
            -> join('ideaType','ideaTypes.ideaTypeID', '=', 'ideas.ideaTypeID')
            -> get(); //or first()
        return view('list2', compact('data'));
    }

    public function add()
    {
        $data = IdeaType::get();
        return view('add', compact('data'));
    }

    public function save(Request $request)
    {
        $id = $request->id;
        $name = $request->name;
        $content = $request->content;
        $file = $request->file;
        $ideaType = $request->ideaType;

        $idea = new Idea();
        $idea->ideaID = $id;
        $idea->ideaName = $name;
        $idea->ideaContent = $content;
        $idea->ideaFile = $file;
        $idea->ideaTypeID = $ideaType;
        $idea->save();

        return redirect()->back()->with('Success', 'You have added your idea successfully!');
    }

    public function edit($id)
    {
        $ideaTypes = IdeaType::get();
        $data = Idea::where('ideaID', '=', $id)->first();
        return view('edit', compact('data', 'ideaTypes'));
    }

    public function update(Request $request)
    {
        $id = $request->id;
        Idea::where('ideaID', '=', $id)->update([
            'ideaName'=>$request->name,
            'ideaContent'=>$request->content,
            'ideaFile'=>$request->file,
            'ideaTypeID'=>$request->ideaType
        ]);
        return redirect()->back()->with('success', 'The idea has been changed successfully!');
    }

    public function delete($id)
    {
        Idea::where('ideaID', '=', $id)->delete();
        return redirect()->back()->with('success', 'The idea has been deleted successfully!');
    }
}
