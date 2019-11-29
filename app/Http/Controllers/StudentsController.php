<?php

namespace App\Http\Controllers;

use App\Caste;
use App\Father;
use App\Fee;
use App\Grade;
use App\Mother;
use App\Religion;
use App\Section;
use App\Station;
use App\Stream;
use App\Students;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $classes = Grade::pluck('class', 'id');
        return view('admin.students.index', compact(['classes']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $classes = Grade::pluck("class", "id");
        $stations = Station::pluck('name', 'id');
        $streams = Stream::pluck('name', 'id');
        $roll_number = Students::orderBy('id', 'DESC')->first();

        if ($roll_number == null) {
            $new_roll = 1;
        } else {
            $new_roll = $roll_number->roll_number + 1;
        }

        $adm_number = Students::orderBy('id', 'DESC')->first();

        if ($adm_number == null) {
            $new_adm = 1;
        } else {
            $new_adm = $adm_number->adm_no + 1;
        }

        $castes = Caste::pluck('name', 'id');
        $religions = Religion::pluck('name', 'id');
        return view("admin.students.create", compact(['classes', 'stations', 'streams', 'new_roll', 'new_adm', 'religions', 'castes']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $input = $request->all();

        $student = Students::create([
            'name' => $input['name'],
            'admission_date' => $input['date_of_adm'],
            'session' => $input['session'],
            'previous_ad_number' => $input['prev_adm_no'] == null ? 0 : $input['prev_adm_no'],
            'class' => $input['grade_id'],
            'section' => $request->section_id,
            'stream' => $input['stream_id'],
            'roll_number' => $input['roll_number'],
            'adm_no' => $input['adm_no'],
            'gender' => $input['gender'],
            'DOB_certificate' => $request->dob_cer == null ? 0 : $request->dob_cer,
            'slc' => $request->slc == null ? 0 : $request->slc,
            'report_card' => $request->rc == null ? 0 : $request->rc,
            'aadhar_card' => $request->ac == null ? 0 : $request->ac,
            'tc' => $request->tc == null ? 0 : $request->tc,
            'document_verified' => $input['verified'],
            'DOB' => $input['DOB'],
            'tel1' => $input['tel1'],
            'tel2' => $input['tel2'] == null ? 0 : $input['tel2'],
            'address' => $input['address'],
            'addhar_number' => $input['UID'] == null ? 0 : $input['UID'],
            'convinience_req' => $input['required'],
            'station' => $input['station_id'] == null ? 0 : $input['station_id'],
            'cast_category' => $input['caste_id'],
            'religion' => $input['religion_id'],
            'blood_group' => $input['blood'],
            'annual_income' => $input['income'],
            'adm_type' => $input['adm_type']
        ]);

        $mother = Mother::create([
            'student_id' => $student->id,
            'name' => $input['mother_name'],
            'occupation' => $input['mother_occup'],
            'UID' => $input['mother_uid'] == null ? 0 : $input['mother_uid'],
            'qual' => $input['mother_qual'],
        ]);

        $father = Father::create([
            'student_id' => $student->id,
            'name' => $input['father_name'],
            'occupation' => $input['father_occup'],
            'UID' => $input['father_uid'] == null ? 0 : $input['father_uid'],
            'qual' => $input['father_qual'],
        ]);

        $class = Grade::findOrFail($request->grade_id);
        $section = Section::findOrFail($request->section_id);
        if ($request->station_id !== 0) {
            $station = Station::findOrFail($request->station_id);
        }
        $section->update([
            'capacity' => $section->capacity - 1,
        ]);

        $fee = Fee::create([
            'student_id' => $student->id,
            'q1' => 0,
            'q2' => 0,
            'q3' => 0,
            'q4' => 0,
            'fee' => $class->fee,
            'transport_fee' => $station == null ? 0 : $station->fee,
            'computer_fee' => $class->computer_fee,
            'totalFee' => $class->fee + $class->computer_fee + $station == null ? 0 : $station->fee,
            'paid_fee' => 0
        ]);


        $path = public_path("/photos");
        $image = $request->file('photo');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move($path, $imageName);


        $student_update = Students::findOrFail($student->id);
        $student_update->update([
            'father' => $father->id,
            'mother' => $mother->id,
            'path' => $imageName
        ]);

        $request->session()->flash('created', "Student registered successfully");
        return redirect('/students');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Students  $students
     * @return \Illuminate\Http\Response
     */
    public function show($id)


    {
        //

        $student = Students::findOrFail($id);
        $class = Grade::findOrFail($student->class);
        $section = Section::findOrFail($student->section);
        $father = Father::findOrFail($student->father);
        $mother = Mother::findOrFail($student->mother);
        $stream = Stream::findOrFail($student->stream);
        $station = Station::findOrFail($student->station);
        $caste = Caste::findOrFail($student->cast_category);
        $religion = Religion::findOrFail($student->religion);

        return view('admin.students.show', compact(['student', 'stream', 'class', 'section', 'father', 'mother', 'station', 'caste', 'religion']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Students  $students
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $student = Students::findOrFail($id);
        $classes = Grade::pluck("class", "id");
        $stations = Station::pluck('name', 'id');
        $streams = Stream::pluck('name', 'id');
        $roll_number = Students::orderBy('id', 'DESC')->get()->first();
        $adm_number = Students::orderBy('id', 'DESC')->get()->first();
        $castes = Caste::pluck('name', 'id');
        $religions = Religion::pluck('name', 'id');
        $father = Father::findOrFail($student->father);
        $mother = Mother::findOrFail($student->mother);
        $sections = Section::where('grade_id', $student->class)->get();
        return view("admin.students.edit", compact(['classes', 'stations', 'streams', 'roll_number', 'adm_number', 'religions', 'castes', 'student', 'father', 'mother', 'sections']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Students  $students
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $input = $request->all();

        $student = Students::findOrFail($id);

        $student->update([
            'name' => $input['name'],
            'admission_date' => $input['date_of_adm'],
            'session' => $input['session'],
            'previous_ad_number' => $input['prev_adm_no'],
            'class' => $input['grade_id'],
            'section' => $request->section_id,
            'stream' => $input['stream_id'],
            'roll_number' => $input['roll_number'],
            'adm_no' => $input['adm_no'],
            'gender' => $input['gender'],
            'DOB_certificate' => $request->dob_cer == null ? 0 : $request->dob_cer,
            'slc' => $request->slc == null ? 0 : $request->slc,
            'report_card' => $request->rc == null ? 0 : $request->rc,
            'aadhar_card' => $request->ac == null ? 0 : $request->ac,
            'tc' => $request->slc == null ? 0 : $request->tc,
            'document_verified' => $input['verified'],
            'DOB' => $input['DOB'],
            'tel1' => $input['tel1'],
            'tel2' => $input['tel2'],
            'address' => $input['address'],
            'addhar_number' => $input['UID'],
            'convinience_req' => $input['required'],
            'station' => $input['station_id'],
            'cast_category' => $input['caste_id'],
            'religion' => $input['religion_id'],
            'blood_group' => $input['blood'],
            'annual_income' => $input['income'],
            'adm_type' => $input['adm_type']
        ]);


        $mother = Mother::where('student_id', $student->id);


        $mother->update([
            'student_id' => $student->id,
            'name' => $input['mother_name'],
            'occupation' => $input['mother_occup'],
            'UID' => $input['mother_uid'],
            'qual' => $input['mother_qual'],
        ]);

        $father = Father::where('student_id', $student->id);


        $father->update([
            'student_id' => $student->id,
            'name' => $input['father_name'],
            'occupation' => $input['father_occup'],
            'UID' => $input['father_uid'],
            'qual' => $input['father_qual'],
        ]);

        if ($request->photo !== null) {
            $path = "/photos";
            $image = $request->file('photo');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move($path, $imageName);
        }



        $request->session()->flash('updated', "Student updated successfully");
        return redirect('/students');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Students  $students
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        Students::findOrFail($id)->delete();
        session()->flash('deleted', "Deleted Successfully");
        return redirect()->back();
    }

    public function getSections($classid = 0)
    {
        // Fetch Sections by Classid
        $sectionData['data'] = Section::where('grade_id', $classid)->get();

        echo json_encode($sectionData);
        exit;
    }

    public function getStudents()
    {
        // Fetch Sections by Classid


        if (isset($_GET['keyword'])) {
            $keyword = $_GET['keyword'];
            $sectionData['data'] = Students::where('name', 'like', '%' . $keyword . '%')->orWhere('tel1', $keyword)->orWhere('tel2', $keyword)->orWhere('adm_no', $keyword)->get();
        } else {
            $class = $_GET['grade'];
            $section = $_GET['section'];
            $sectionData['data'] = Students::where('class', $class)->where('section', $section)->get();
        }


        echo json_encode($sectionData);
        exit;
    }
}
