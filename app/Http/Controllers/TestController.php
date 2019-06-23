<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Topic;
use App\Section;
use App\User;
use App\People;
use App\Question;
use App\Student;
use App\Answer;
use App\Test;
use App\Note;
use App\TestGoogle;
use App\NoteGoogle;

class TestController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function evaluacion($id_test)
	{
		$topics   = Topic::all();
		$sections = Section::all()->sortByDesc('id');
		$id = Auth::user()->id;
		$me = User::find($id);
		$test = Test::where('id',$id_test)->first();

		return view('admin.evaluacion')
				->with('me', $me)
				->with('test',$test)
				->with('sections', $sections)
				->with('topics', $topics);
	}

	public function pregunta($id_test)
	{
		$topics   = Topic::all();
		$sections = Section::all()->sortByDesc('id');
		$id = Auth::user()->id;
		$me = User::find($id);
		$test = Test::where('id',$id_test)->first();

		return view('admin.pregunta')
				->with('me', $me)
				->with('test',$test)
				->with('sections', $sections)
				->with('topics', $topics);
	}

	public function pregunta_guardar(Request $request)
	{
		$data = request()->validate([
			'text'		=>	'required',
    		'value'		=>	'required',
    		'test_id'	=>	'required'
		]);
		// $en valor maximo de la evaluacion
		// $pv valor de la pregunta que se quiere crear
		// $ep valor total de las preguntas de la evaluacion

		$en = Test::where('id',$data['test_id'])->first()->note;
		$pv = $data['value'];

		if ($pv>$en) {
			return back()->with('info','El valor de la pregunta supera la ponderacion maxima de la evaluacion!');
		}

		$ep = Test::where('id',$data['test_id'])->first()->questions->sum('value');

		if ($ep === 0) {
			$pregunta = Question::create([
	    		'text'		=>	$data['text'],
	    		'value'		=>	$data['value'],
	    		'test_id'	=>	$data['test_id']
			]);
		}

		$ep = Test::where('id',$data['test_id'])->first()->questions->sum('value');

		if (($pv+$ep)>$en) {
			return back()->with('info','El valor de la pregunta supera la cantidad restante!');
		}elseif (($pv+$ep) === $en) {
			$pregunta = Question::create([
	    		'text'		=>	$data['text'],
	    		'value'		=>	$data['value'],
	    		'test_id'	=>	$data['test_id']
			]);
		}else{
			$pregunta = Question::create([
	    		'text'		=>	$data['text'],
	    		'value'		=>	$data['value'],
	    		'test_id'	=>	$data['test_id']
			]);
		}

		if (isset($pregunta)) {
			return redirect(route('evaluacion.ver',$pregunta->test_id))->with('info','Pregunta registrada exitosamente!');
		}else{
			return back()->with('info','No se ha creado la pregunta!');
		}
	}

	public function evaluacion_estudiante($id_test)
	{
		$topics   = Topic::all();
		$sections = Section::all()->sortByDesc('id');
		$id = Auth::user()->id;
		$me = User::find($id);
		$test = Test::where('id',$id_test)->first();
		$total_evl = $test->questions->sum('value');
		$total_pts = \MyHelper::notaTotal($id_test,$me->people->id);

		if($total_pts >= ($total_evl/2)){
			$aprobado = 'Aprobado';
		}else{
			$aprobado = 'Reprobado';
		}

		if ($total_pts == 0) {
			$aprobado = 'Sin nota';
		}

		return view('user.evaluacion')
				->with('total_evl', $total_evl)
				->with('total_pts', $total_pts)
				->with('aprobado', $aprobado)
				->with('me', $me)
				->with('test',$test)
				->with('sections', $sections)
				->with('topics', $topics);
	}

	public function respuesta($id_test,$id_question)
	{
		$topics   = Topic::all();
		$sections = Section::all()->sortByDesc('id');
		$id = Auth::user()->id;
		$me = User::find($id);
		$test = Test::where('id',$id_test)->first();
		$question = Question::where('id',$id_question)->first();

		return view('user.respuesta')
				->with('me', $me)
				->with('test',$test)
				->with('question',$question)
				->with('sections', $sections)
				->with('topics', $topics);
	}

	public function respuesta_guardar(Request $request)
	{
		$data = request()->validate([
			'text'			=>	'required',
    		'people_id'		=>	'required',
    		'question_id'	=>	'required',
    		'student_id'	=>	'required',
    		'test_id'		=>	'required'
		]);

		$test = Test::find($data['test_id']);
		$test->students()->attach($data['student_id']);

		$respuesta = Answer::create([
    		'text'			=>	$data['text'],
    		'people_id'		=>	$data['people_id'],
    		'question_id'	=>	$data['question_id'],
    		'test_id'		=>	$data['test_id'],
    		'student_id'	=>	$data['student_id']
		]);

		return redirect(route('estudiante.evaluacion',$respuesta->test_id))->with('info','Respuesta registrada exitosamente!');
	}

	public function nota($people,$test,$question,$answer)
	{
		$people 	= People::where('id',$people)->first();
		$test 		= Test::where('id',$test)->first();
		$question 	= Question::where('id',$question)->first();
		$answer 	= Answer::where('id',$answer)->first();

		$topics   = Topic::all();
		$sections = Section::all()->sortByDesc('id');
		$id = Auth::user()->id;
		$me = User::find($id);

		return view('admin.notas',compact('topics','sections','me','question','test','people','answer'));
	}

	public function asignar_nota(Request $request)
	{
		$data = request()->validate([
    		'people_id'		=>	'required',
    		'question_id'	=>	'required',
    		'answer_id'		=>	'required',
    		'test_id'		=>	'required',
			'note'			=>	'required'
		]);
		$pregunta_valor = Question::find($data['question_id'])->value;
		$nota_valor = $data['note'];

		if ($nota_valor > $pregunta_valor) {
			return back()->with('info','La nota sobrepasa la ponderacion de la pregunta!');
		}

		$nota = Note::create([
			'people_id'		=>	$data['people_id'],
    		'question_id'	=>	$data['question_id'],
    		'answer_id'		=>	$data['answer_id'],
    		'test_id'		=>	$data['test_id'],
			'note'			=>	$data['note']
		]);

		$usuario = User::where('people_id',$data['people_id'])->first();
		return redirect(route('historial',$usuario->id))->with('info','La nota fue asignada con exito!');
	}
}
