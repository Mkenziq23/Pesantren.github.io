<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Kamar;
use Yajra\DataTables\Facades\DataTables;



class KamarController extends Controller
{
    public function index(Request $request)
    {
        return view('kesantrian.kamar',[
            "tittle" => "Kamar",
        ]);
    }
    public function getKamar()
    {
        $kamar = Kamar::select(['id_kamar','nama_kamar']);
        return DataTables::of($kamar)
            ->addColumn('DT_RowIndex', function ($kamar) {
                return $kamar->id_kamar;
            })
            ->addColumn('action', function ($kamar) {
                $button = '<button type="button" name="edit" id="'.$kamar->id_kamar.'" class="edit btn btn-icon btn-2 bg-gradient-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal">
                    <svg xmlns="http://www.w3.org/2000/svg" height="16" width="18" viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M402.6 83.2l90.2 90.2c3.8 3.8 3.8 10 0 13.8L274.4 405.6l-92.8 10.3c-12.4 1.4-22.9-9.1-21.5-21.5l10.3-92.8L388.8 83.2c3.8-3.8 10-3.8 13.8 0zm162-22.9l-48.8-48.8c-15.2-15.2-39.9-15.2-55.2 0l-35.4 35.4c-3.8 3.8-3.8 10 0 13.8l90.2 90.2c3.8 3.8 10 3.8 13.8 0l35.4-35.4c15.2-15.3 15.2-40 0-55.2zM384 346.2V448H64V128h229.8c3.2 0 6.2-1.3 8.5-3.5l40-40c7.6-7.6 2.2-20.5-8.5-20.5H48C21.5 64 0 85.5 0 112v352c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V306.2c0-10.7-12.9-16-20.5-8.5l-40 40c-2.2 2.3-3.5 5.3-3.5 8.5z"/></svg>
                </button>';
                    $button .= '<button type="button" name="delete" id="'.$kamar->id_Kamar.'" class="delete btn btn-icon btn-2 bg-gradient-danger btn-sm" >
                    <svg xmlns="http://www.w3.org/2000/svg" height="16" width="18" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M32 464a48 48 0 0 0 48 48h288a48 48 0 0 0 48-48V128H32zm272-256a16 16 0 0 1 32 0v224a16 16 0 0 1 -32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1 -32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1 -32 0zM432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.7 23.7 0 0 0 -21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0 -16-16z"/></svg>
                </button>';
                return $button;
            })
            ->make(true);
    }

    public function store(Request $request)
    {
        $kamar = Kamar::create($request->all());

        return response()->json(['success' => 'Kamar added successfully', 'data' => $kamar]);
    }

    public function edit($id)
    {
        $kamar = Kamar::find($id);

        return response()->json(['data' => $kamar]);
    }

    public function update(Request $request, $id)
    {
        $kamar = Kamar::find($id);
        $kamar->update($request->all());

        return response()->json(['success' => 'Item updated successfully', 'data' => $kamar]);
    }

    public function destroy($id)
    {
        Kamar::find($id)->delete();

        return response()->json(['success' => 'Item deleted successfully']);
    }

}
