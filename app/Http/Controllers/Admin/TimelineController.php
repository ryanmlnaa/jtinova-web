<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Timeline;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class TimelineController extends Controller
{
    public function index()
    {
        $title = "Timeline";
        $data = Timeline::latest()->get();
        return view('admin.timeline.index', compact('title', 'data'));
    }

    public function create()
    {
        $title = "Timeline";
        return view('admin.timeline.create', compact('title'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'jenis' => 'required|string|max:255|in:mbkm,instruktur,freelance',
            'description.*' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            "syllabus_link" => "nullable|file|mimes:pdf|max:2048",
            'start_at.*' => 'required|date',
            'end_at.*' => 'required|date',
        ]);
        if($validator->fails()){
            $messages = $validator->errors()->all();
            $messages = implode('<br>', $messages);
            Alert::error($messages)->flash();
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $convertedData = [];
        foreach ($request['description'] as $index => $description) {
            $convertedData[] = [
                "title" => $description,
                "start" => $request['start_at'][$index],
                "end" => $request['end_at'][$index]
            ];
        }

        Timeline::create([
            'title' => $request->title,
            'jenis' => $request->jenis,
            'tahun_ajaran' => $request->deskripsi,
            'timeline' => json_encode($convertedData),
            'syllabus_link' => $request->hasFile('syllabus_link') ? $request->file('syllabus_link')->store('pdffile/syllabus', 'public') : null,
        ]);

        Alert::success("Success", "Berhasil Menambahkan Data");
        return redirect()->route('timeline.index');
    }

    public function edit($id)
    {
        $timeline = Timeline::findOrFail($id);
        $title = "Timeline - Edit";
        return view('admin.timeline.edit', compact('timeline', 'title'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'jenis' => 'required|string|max:255|in:mbkm,instruktur,freelance',
            'description.*' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'status' => 'required|in:0,1',
            "syllabus_link" => "nullable|file|mimes:pdf|max:2048",
            'start_at.*' => 'required|date',
            'end_at.*' => 'required|date',
        ]);
        if($validator->fails()){
            $messages = $validator->errors()->all();
            $messages = implode('<br>', $messages);
            Alert::error($messages)->flash();
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $convertedData = [];
        foreach ($request['description'] as $index => $description) {
            $convertedData[] = [
                "title" => $description,
                "start" => $request['start_at'][$index],
                "end" => $request['end_at'][$index]
            ];
        }

        $timeline = Timeline::findOrFail($id);

        if ($request->hasFile('syllabus_link')) {
            if ($timeline->syllabus_link) {
                Storage::disk('public')->delete($timeline->syllabus_link);
            }
        }

        $timeline->update([
            'title' => $request->title,
            'jenis' => $request->jenis,
            'tahun_ajaran' => $request->deskripsi,
            'status' => $request->status,
            'timeline' => json_encode($convertedData),
            'syllabus_link' => $request->hasFile('syllabus_link') ? $request->file('syllabus_link')->store('pdffile/syllabus', 'public') : $timeline->syllabus_link,
        ]);

        Alert::success("Success", "Berhasil Mengubah Data");
        return redirect()->route('timeline.index');
    }

    public function destroy($id)
    {
        $timeline = Timeline::findOrFail($id);
        if ($timeline->syllabus_link) {
            Storage::disk('public')->delete($timeline->syllabus_link);
        }

        $timeline->delete();

        Alert::success("Success", "Berhasil Menghapus Data");
        return redirect()->route('timeline.index');
    }
}
