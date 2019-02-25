<?php

namespace App\Http\Controllers;
use App\Project;
use App\Language;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $languages = Language::get()->sortBy('name');
        return view('language.index',compact('languages'));
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
        $i = 0;
        $ids = [];
        while($request->$i!=null){
            array_push($ids, Language::find($request->$i));
            $i++;
        }
        if($ids[0]->projects->count()>=$ids[1]->projects->count()){
            foreach($ids[1]->projects as $project){
                $project->language_id = $ids[0]->id;
                $project->save();
            }
            $ids[1]->delete();
        }else{
            foreach($ids[0]->projects as $project){
                $project->language_id = $ids[1]->id;
                $project->save();
            }
            $ids[0]->delete();
        }
        return $this->index();
     
        
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function show(Language $language)
    {
        $projects = Project::where("language_id",$language->id)->get();
        $info = "Showing Projects coded in ".$language->name;
        return view('project.index',compact(['projects','info']));    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function edit(Language $language)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Language $language)
    {   
        $oldName = $language->name;
        $language->name = $request['name'];
        $language->save();
        return response()->json(['success'=>$oldName." changé pour ".$language->name,'name'=>$language->name]);
        // dd($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function destroy(Language $language)
    {
        //
    }
}
