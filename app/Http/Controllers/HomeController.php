<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreTestRequest;
use Illuminate\Http\Request;
use App\Models\Option;
use App\Models\Lesson;
use App\Models\Result;
use App\Models\User;


class HomeController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function home()
    {
        $lesson = Lesson::all();
        return view('home.index', compact('lesson'));
    }
    
    public function login_home()
    {
        $lesson = Lesson::all();
        return view('home.index', compact('lesson'));
    }

    public function lesson_details($id)
    {
        $data = Lesson::find($id);
        return view('home.lesson_details', compact('data'));
    }

    public function materi()
    {
        $lesson = Lesson::all();
        return view('home.materi', compact('lesson'));
    }

    public function index_test()
    {
        $lessons = Lesson::with(['lessonQuestions' => function ($query) {
                $query->inRandomOrder()
                    ->with(['questionOptions' => function ($query) {
                        $query->inRandomOrder();
                    }]);
            }])
            ->whereHas('lessonQuestions')
            ->get();

        return view('home.test', compact('lessons'));
    }

    public function test_store(StoreTestRequest $request)
    {
        
    $options = Option::find(array_values($request->input('questions')));

    $result = auth()->user()->userResults()->create([
        'total_points' => $options->sum('points')
    ]);

    $questions = $options->mapWithKeys(function ($option) {
        return [$option->question_id => [
            'option_id' => $option->id,
            'points' => $option->points
        ]];
    })->toArray();

    $result->questions()->sync($questions);

    return redirect()->route('results_show', $result->id);
    }


    public function show($result_id){
        $result = Result::whereHas('user', function ($query) {
            $query->whereId(auth()->id());
        })->findOrFail($result_id);
    
        return view('home.results', compact('result'));
    }
}