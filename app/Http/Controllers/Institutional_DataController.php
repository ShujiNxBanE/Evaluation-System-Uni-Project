<?php

namespace App\Http\Controllers;

use App\Models\Institutional_Data;
use Illuminate\Http\Request;

class Institutional_DataController extends Controller
{
    public function index()
    {
        $institutional_datas = Institutional_Data::orderBy('id','desc')->paginate(5);
        return view('create_institutional_data.index', compact('institutional_datas'));
    }

    public function create()
    {
        return view('create_institutional_data.create');
    }

    public function store(Request $request)
    {
        $institutional_data = new Institutional_Data();
        $institutional_data->name = $request->name;
        $institutional_data->country = $request->country;
        $institutional_data->creation_year = $request->creation_year;
        $institutional_data->institution_character = $request->institution_character;
        $institutional_data->program_edition = $request->program_edition;
        $institutional_data->web_adresss = $request->web_adresss;
        $institutional_data->postal_address = $request->postal_address;
        $institutional_data->recognition_resolution = $request->recognition_resolution;
        $institutional_data->start_date = $request->start_date;
        $institutional_data->end_date = $request->end_date;
        $institutional_data->number_of_hours = $request->number_of_hours;
        $institutional_data->total_teaching_staff = $request->total_teaching_staff;
        $institutional_data->total_administrative_staff = $request->total_administrative_staff;
        $institutional_data->certificate = $request->certificate;
        $institutional_data->save();

        return redirect()->route('institutional_datas');
    }

    public function show($institutional_data)
    {
        $institutional_data = Institutional_Data::find($institutional_data);
        return view('create_institutional_data.show',compact('institutional_data'));
    }

    public function edit($institutional_data)
    {
        $institutional_data = Institutional_Data::find($institutional_data);
        return view('create_institutional_data.edit',compact('institutional_data'));
    }

    public function update(Request $request, $institutional_data)
    {
        $institutional_data = Institutional_Data::find($institutional_data);
        $institutional_data->name = $request->name;
        $institutional_data->country = $request->country;
        $institutional_data->creation_year = $request->creation_year;
        $institutional_data->institution_character = $request->institution_character;
        $institutional_data->program_edition = $request->program_edition;
        $institutional_data->web_adresss = $request->web_adresss;
        $institutional_data->postal_address = $request->postal_address;
        $institutional_data->recognition_resolution = $request->recognition_resolution;
        $institutional_data->start_date = $request->start_date;
        $institutional_data->end_date = $request->end_date;
        $institutional_data->number_of_hours = $request->number_of_hours;
        $institutional_data->total_teaching_staff = $request->total_teaching_staff;
        $institutional_data->total_administrative_staff = $request->total_administrative_staff;
        $institutional_data->certificate = $request->certificate;
        $institutional_data->save();

        return redirect()->route('show_institutional_data_details', ['institutional_data' => $institutional_data->id]);
    }

    public function destroy($institutional_data)
    {
        $institutional_data = Institutional_Data::find($institutional_data);
        $institutional_data->delete();
        return redirect()->route('institutional_datas');
    }
}
