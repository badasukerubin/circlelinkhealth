<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\PatientBloodPressure\StoreRequest;
use App\Models\PatientBloodPressure;
use App\Models\User;
use Illuminate\Http\Request;

class PatientBloodPressureController extends Controller
{
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->middleware('permission:patient-blood-pressure-list|patient-blood-pressure-create|patient-blood-pressure-edit|patient-blood-pressure-delete', ['only' => ['index','show']]);
        $this->middleware('permission:patient-blood-pressure-create', ['only' => ['create','store']]);
        $this->middleware('permission:patient-blood-pressure-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:patient-blood-pressure-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.patientbloodpressure.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        abort_if(auth()->user()->type !== User::TYPE_PATIENT && !$request->id, 404);
        return view('users.patientbloodpressure.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        abort_if(auth()->user()->type !== User::TYPE_PATIENT && !$request->id, 404);
        $userId = fn ($request): ?int =>  auth()->user()->type === User::TYPE_PATIENT ? auth()->id() : $request->id;
        $user = User::findOrFail($userId($request));

        if ($user->type === User::TYPE_PATIENT) {
            $patientBloodPressure = $request->validated();
            $patientBloodPressure = array_merge($patientBloodPressure, ['user_id' => $userId($request)]);

            \ray($patientBloodPressure);
            PatientBloodPressure::create($patientBloodPressure);

            return redirect()->back()->with('status', 'Blood pressure recorded successfully');
        }

        return redirect()->back()->with('status', 'You cannot record blood pressure for a non patient');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PatientBloodPressure  $patientBloodPressure
     * @return \Illuminate\Http\Response
     */
    public function show(PatientBloodPressure $patientBloodPressure)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PatientBloodPressure  $patientBloodPressure
     * @return \Illuminate\Http\Response
     */
    public function edit(PatientBloodPressure $patientBloodPressure)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PatientBloodPressure  $patientBloodPressure
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PatientBloodPressure $patientBloodPressure)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PatientBloodPressure  $patientBloodPressure
     * @return \Illuminate\Http\Response
     */
    public function destroy(PatientBloodPressure $patientBloodPressure)
    {
        //
    }
}
