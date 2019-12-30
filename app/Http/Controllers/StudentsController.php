<?php

namespace App\Http\Controllers;

use App\Caste;
use App\ExplicitCon;
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
        $students_latest = Students::orderBy('admission_date', 'DESC')->paginate(3);

        return view('admin.students.index', compact(['classes', 'students_latest']));
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
        $other = ExplicitCon::pluck('name', 'id');
        $streams = Stream::pluck('name', 'id');
        $roll_number = Students::orderBy('admission_date', 'DESC')->first();

        if ($roll_number == null) {
            $new_roll = 1;
        } else {
            $new_roll = $roll_number->roll_number + 1;
        }

        $adm_number = Students::orderBy('admission_date', 'DESC')->first();

        if ($adm_number == null) {
            $new_adm = 1;
        } else {
            $new_adm = $adm_number->adm_no + 1;
        }

        $castes = Caste::pluck('name', 'id');
        $religions = Religion::pluck('name', 'id');
        return view("admin.students.create", compact(['classes', 'stations', 'streams', 'new_roll', 'new_adm', 'religions', 'castes', 'other']));
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
            'father' => $input['father_name'] !== null ? $input['father_name'] : 'Not Given',
            'mother' => $input['mother_name'] !== null ? $input['mother_name'] : 'Not Given',
            'DOB' => $input['DOB'] !== null ? $input['DOB'] : now()->toDateString(),
            'tel1' => $input['tel1'] !== null ? $input['tel1'] : 0,
            'tel2' => 0,
            'address' => $input['address'] !== null ? $input['address'] : 'Not Given',
            'addhar_number' => $input['UID'] == null ? 0 : $input['UID'],
            'convinience_req' => $input['required'] !== null ? $input['required'] : 0,
            'station' => $input['station_id'] == null ? 0 : $input['station_id'],
            'cast_category' => $input['caste_id'],
            'religion' => $input['religion_id'],
            'blood_group' => $input['blood'] !== null ? $input['blood'] : 0,
            'annual_income' => $input['annual_income'] !== null ? $input['annual_income'] : 0,
            'adm_type' => $input['adm_type'] !== null ? $input['adm_type'] : 0,
            'status' => 1,
            'other_con' => $input['other_con'] == null ? 0 : $input['other_con']
        ]);


        $fee = Fee::create([
            'student_id' => $student->id,
        ]);

        $mother = Mother::create([
            'student_id' => $student->id,
            'name' => $input['mother_name'] !== null ? $input['mother_name'] : 'N/A',
            'occupation' => $input['mother_occup'] == null ? 'N/A' : $input['mother_occup'],
            'UID' => $input['mother_uid'] == null ? 0 : $input['mother_uid'],
            'qual' => $input['mother_qual'] == null ? 0 : $input['mother_qual'],
        ]);

        $father = Father::create([
            'student_id' => $student->id,
            'name' => $input['father_name'] !== null ? $input['father_name'] : 'N/A',
            'occupation' => $input['father_occup'] == null ? 0 : $input['occup'],
            'UID' => $input['father_uid'] == null ? 0 : $input['father_uid'],
            'qual' => $input['mother_qual'] == null ? 0 : $input['mother_qual'],
        ]);

        $class = Grade::findOrFail($request->grade_id);
        $section = Section::findOrFail($request->section_id);
        if ($request->station_id !== 0) {
            $station = Station::findOrFail($request->station_id);
        }
        $section->update([
            'capacity' => $section->capacity - 1,
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
        return redirect('/students/'.$student->id);
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
        return view('admin.students.show', compact(['student']));
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
        $other = ExplicitCon::pluck('name', 'id');

        return view("admin.students.edit", compact(['classes', 'stations', 'streams', 'roll_number', 'adm_number', 'religions', 'castes', 'student', 'sections', 'other']));
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
        $student = Students::findOrFail($id);
        $student->update($request->all());
        $request->session()->flash('updated', "Student updated successfully");
        return redirect()->back();
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

    public function getStudents()
    {
        // Fetch Sections by Classid


        if (isset($_GET['keyword'])) {
            $keyword = $_GET['keyword'];
            $sectionData['data'] = Students::orderBy('name')->where('name', 'like', '%' . $keyword . '%')->orWhere('tel1', $keyword)->orWhere('tel2', $keyword)->orWhere('adm_no', $keyword)->orWhere('father', 'like', '%' . $keyword . '%')->get();
        } else {
            $class = $_GET['grade'];
            $section = $_GET['section'];
            $sectionData['data'] = Students::orderBy('name')->where('class', $class)->where('section', $section)->get();
        }


        echo json_encode($sectionData);
        exit;
    }

    public function report()
    {

        $report = $_GET['by'];


        $students = Students::count();
        $male = Students::where("gender", 0)->count();
        $female = Students::where("gender", 1)->count();

        $religions = Religion::all();
        $classes = Grade::all();
        $castes = Caste::all();
        $students_dis = Students::all();
        $students_latest = Students::orderBy('admission_date', 'DESC')->paginate(5);

        return view('admin.reports.index', compact(['male', 'female', 'students', 'religions', 'classes', 'castes', 'students_dis', 'students_latest', 'report']));
    }
}
