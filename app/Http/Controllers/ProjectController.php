<?php

namespace App\Http\Controllers;

use App\Project;
use App\Page;
use App\Tag;
use App\Language;
use Auth;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $projects = Project::get();
        return view('project.index',compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $project= new Project();
        $languages = Language::get();
        return view('project.create',compact(['project','languages']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        if($request->tags != ""){
            $tags_arr = explode(',',$request->tags);
        }
        $validatedData = $request->validate([
            'title' => 'required|unique:projects|max:255',
            'description' => 'required',
            'language' => 'required'
        ]);
        $project = new Project();
        $project->title = $request->title;
        $project->description = $request->description;
        $project->user_id = Auth::user()->id;
        $project->type= "web";

        $language = Language::where('name',$request->language)->first();
        if(!isset($language)){
            $language = new Language();
            $language->name = $request->language;
            $language->save();
        }
        $project->language_id = $language->id;

        $page = new Page();
        $page->name = str_replace(" ", "", $request->title );
        $page->displayName = $request->title;
        $page->class = "project";
        $page->route = "project/main/".$page->name;
        $page->save();

        $project->page_id = $page->id;

        $project->save();

        if(isset($tags_arr)){
            foreach($tags_arr as $tag_){
                Tag::newTag($tag_,$project->id);
            }
        }

        $myfile = fopen("../resources/views/project/main/".str_replace(" ", "", $request->title ).".blade.php", "w") or die("Unable to open file!");

        $info = "Project ".$request->title." was successfully created";
        return view('home',compact('info'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $Project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
        // dd($project);
        return view('project.show',compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $languages = Language::get();
        return view('project.create',compact(['project','languages']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        if($request->tags != ""){
            $tags_arr = explode(',',$request->tags);
        }
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'language' => 'required'
        ]);

        $project->title = $request->title;
        $project->description = $request->description;
        
        $language = Language::where('name',$request->language)->first();
        if(!isset($language)){
            $language = new Language();
            $language->name = $request->language;
            $language->save();
        }
        $project->language_id = $language->id;
          
        $project->save();

        if(isset($tags_arr)){
             foreach($tags_arr as $tag_){
                Tag::newTag($tag_,$project->id);
            }
        }

        $info = "Project ".$request->title." was successfully updated";
        return view('home',compact('info'));


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        
        $project->delete();
        return view('home');
    }
}
