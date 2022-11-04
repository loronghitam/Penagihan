<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Join;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class JoinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        try {
            $rules = [
                'alamat' => 'required',
                'paket' => 'required',
            ];
            $message = [
                'alamat.required' => 'Alamat Harus di isi kalo engga nanti bingung buat masangnya boss',
                'paket.required' => 'Yakali mau daftar engga ngisi datanya goblok beud'
            ];

            $validator = Validator::make($request->all(), $rules, $message);

            if ($validator->fails()) {
                return 'Data tidak lengkap ' . $validator->errors();
            }

            $id = Auth::user()->id;
            // dd($id);
            DB::transaction(function () use ($request, $id) {
                Join::create([
                    'user_id' => $id,
                    'alamat' => $request->alamat,
                    'package_id' => $request->paket,
                ]);
            });
            return redirect('/form')->with('status', 'Profile updated!');
        } catch (Exception $e) {
            dd($e);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
