<?php

namespace App\Http\Controllers;
use App\Http\Requests\Admin\ResultRequest;
use Illuminate\Http\Request;
use App\Models\Lesson;
use App\Models\Question;
use App\Models\Option;
use App\Models\Result;

class AdminController extends Controller
{
    public function add_lesson()
    {
        return view('admin.add_lesson');
    }
 
    public function upload_lesson(Request $request)
    {
        $data = new Lesson;
        $data->topic = $request->topic;
        $data-> title = $request->title;
        $data-> materi = $request->materi;
        $data-> author = $request->author;
        $image = $request->image;
        if($image)
        {
            $imagename = time().'.'.$image->
                getClientOriginalExtension();

            $request->image->move('lessons', $imagename);
            
            $data->image = $imagename;
        }
        $data->save();
        
        toastr()->timeOut(10000)->closeButton()->addSuccess('Materi Added Successfully');
        
        return redirect()->back(); 
        
    }

    public function view_lesson()
    {
        $lesson = Lesson::paginate(3);
        return view('admin.view_lesson', compact('lesson'));
    }

    public function delete_lesson($id)
    {
        $data = Lesson::find($id);

        $image_path = public_path('lessons/'. $data->image);

        if(file_exists($image_path))
        {
            unlink($image_path);
        }
        
        $data->delete();

        toastr()->timeOut(10000)->closeButton()->addSuccess('Materi Deleted Successfully');

        return redirect()-> back(); 
    }

    public function update_lesson($id)
    {
        $data = Lesson::find($id);
        return view('admin.update_page', compact('data'));
    }

    public function edit_lesson(Request $request, $id)
    {
        $data = Lesson::find($id);
        $data->topic = $request->topic;
        $data->title = $request->title;
        $data->materi = $request->materi;
        $data->author = $request->author;
        $image = $request->image;
        if($image)
        {
            $imagename = time().'.'.$image-> getClientOriginalExtension(); 
            
            $request->image->move('lessons', $imagename);
            $data->image = $imagename;
        }

        $data->save();
        toastr()->timeOut(10000)->closeButton()->addSuccess('Materi Updated Successfully');

        return redirect('/view_lesson');  
    } 

    // Function untuk menambahkan question
    public function add_question()
    {
        $lessons = Lesson::all();  // Mengubah variabel ke bentuk jamak
        return view('admin.add_question', compact('lessons'));
    }

    // Function untuk mengunggah question
    public function upload_question(Request $request)
    {
        $data = new Question;
        $data->lesson_id = $request->lesson;  // Mengubah 'lessons' ke 'lesson'
        $data->question_text = $request->question_text;
        $data->save();
        
        toastr()->timeOut(10000)->closeButton()->addSuccess('Question Added Successfully');
        return redirect()->back();
    }

    // Function untuk melihat questions
    public function view_question()
    {
        $question = Question::paginate(3);
        return view('admin.view_question', compact('question'));
    }

    // Function untuk menghapus question
    public function delete_question($id)
    {
        $question = Question::find($id);
        $question->delete();

        toastr()->timeOut(10000)->closeButton()->addSuccess('Question Deleted Successfully');
        return redirect()->back();
    }

    // Function untuk memperbarui question
    public function update_question($id)
    {
        $question = Question::find($id);
        $lessons = Lesson::all();
        return view('admin.update_question', compact('question', 'lessons'));
    }

    // Function untuk mengedit question
    public function edit_question(Request $request, $id)
    {
        $question = Question::find($id);
        $question->lesson_id = $request->lesson;  // Mengubah 'lessons' ke 'lesson'
        $question->question_text = $request->question_text;
        $question->save();

        toastr()->timeOut(10000)->closeButton()->addSuccess('Question Updated Successfully');
        return redirect('/view_question');
    }
    
// Function untuk menambahkan option
public function add_option()
{
    $questions = Question::all();  // Mengubah variabel ke bentuk jamak
    return view('admin.add_option', compact('questions'));
}

// Function untuk mengunggah option
public function upload_option(Request $request)
{
    $data = new Option;
    $data->question_id = $request->question;  // Pastikan nama request sesuai dengan form
    $data->option_text = $request->option_text;
    $data->points = $request->points;  // Jika ada field points
    $data->save();
    
    toastr()->timeOut(10000)->closeButton()->addSuccess('Option Added Successfully');
    return redirect()->back();
}

// Function untuk melihat options
public function view_option()
{
    $option = Option::paginate(3);
    return view('admin.view_option', compact('option'));
}

// Function untuk menghapus option
public function delete_option($id)
{
    $option = Option::find($id);
    $option->delete();

    toastr()->timeOut(10000)->closeButton()->addSuccess('Option Deleted Successfully');
    return redirect()->back();
}

// Function untuk memperbarui option
public function update_option($id)
{
    $option = Option::find($id);
    $questions = Question::all();
    return view('admin.update_option', compact('option', 'questions'));
}

// Function untuk mengedit option
public function edit_option(Request $request, $id)
{
    $option = Option::find($id);
    $option->question_id = $request->question;
    $option->option_text = $request->option_text;
    $option->points = $request->points;  // Jika ada field points
    $option->save();

    toastr()->timeOut(10000)->closeButton()->addSuccess('Option Updated Successfully');
    return redirect('/view_option');
}
public function index_result()
    {
        $results = Result::paginate(3);
        return view('admin.index_result', compact('results'));
    }

    public function create_result()
    {
        $questions = Question::all()->pluck('question_text', 'id');
        return view('admin.create_result', compact('questions'));
    }

    public function upload_result(ResultRequest $request)
    {
        $result = new Result;
        $result->user_id = auth()->id();
        $result->fill($request->validated())->save();
        $result->questions()->sync($request->input('questions', []));

        toastr()->timeOut(10000)->closeButton()->addSuccess('Result Added Successfully');
        return redirect()->back();
    }

    public function view_result()
    {
        $results = Result::paginate(3);
        return view('admin.view_result', compact('results'));
    }

    public function delete_result(Result $result)
    {
        $result->delete();

        toastr()->timeOut(10000)->closeButton()->addSuccess('Result Deleted Successfully');
        return redirect()->back();
    }

    public function update_result(ResultRequest $request, Result $result)
    {
        $result->update($request->validated() + ['user_id' => auth()->id()]);
        $result->questions()->sync($request->input('questions', []));

        toastr()->timeOut(10000)->closeButton()->addSuccess('Result Updated Successfully');
        return redirect()->route('admin.results.index');
    }

    public function edit_result(Result $result)
    {
        $questions = Question::all()->pluck('question_text', 'id');
        return view('admin.edit_result', compact('result', 'questions'));
    }
    }