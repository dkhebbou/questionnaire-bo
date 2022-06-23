<?php

namespace App\Http\Controllers\Sondage;

use App\Http\Controllers\Controller;
use App\Models\Sondage\Question;
use App\Models\Sondage\Questionnaire;
use App\Models\Sondage\Rubrique;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function index()
  {
    $surveys = Questionnaire::get();
    return view('Sondage/admin/index', compact('surveys'));
  }

  public function creer()
  {
    return view('Sondage/admin/creer-questionnaire');
  }

  public function create(Request $request)
  {
    $quest = new Questionnaire();
    $quest->titre = $request->titre;
    $quest->description = $request->description;
    $quest->titreAr = $request->titreAr;
    $quest->descriptionAr = $request->descriptionAr;
    $quest->slug = Str::slug($quest->titre);
    $questCreated = $quest->save();
    for($i=0; $i< count($request->rubrique);$i++)
    {
        $r = new Rubrique();
        $r->titre = $request->rubrique[$i];
        $r->titreAr = $request->rubriqueAr[$i];
        $r->titreAr = $request->rubriqueAr[$i];
        $r->questionnaire()->associate($quest);
        $r->save();
    }
    return Redirect::to("/admin-sondage");
  }

  public function detail_questionnaire(Request $request)
  {
    $quest = new Questionnaire();

    $survey = $quest->find($request->questionnaire);
    $rubriques = Rubrique::get() ->where('questionnaire_id', $survey->id);
    //dd($survey);
    //$survey->load('questions');
    return view('Sondage/admin/detail_questionnaire', compact('survey','rubriques'));
  }

  public function create_question(Request $request)
    {
    //   $question = new Question();
    //   $question->titre = $request->titre;
    //   $question->option_name = $request->option_name;
    //   $question->titreAr = $request->titreAr;
    //   $question->option_nameAr = $request->option_nameAr;
    //   $question->question_type = $request->question_type;
    //   $question->questionnaire_id = $request->questionnaire;
    // $arr['user_id'] = Auth::id();
    // dd($request->all());
    // $question->save();
    // return back();
    $r = new Rubrique();
    $r = $r->find($request->rubrique);
    $arr = $request->all();
    $arr['questionnaire_id'] = $request->questionnaire;
    $arr['rubrique_id'] = $request->rubrique;
    //dd($survey);
    //$arr['user_id'] = Auth::id();
    $r->questions()->create($arr);
    return back();
    }
}
