<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Join;
use Carbon\Carbon;
use Filament\Pages\Dashboard;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Termwind\Components\Dd;

class BillController extends Controller
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
        return view('pay');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $extension = $request->file('gambar')->getClientOriginalExtension();
        $uniq = Str::orderedUuid();
        $name = 'assets/' . $uniq . '.' . $extension;
        $path = public_path('/storage/assets/');
        // dd($path);
        $request->file('gambar')->move($path, $name);
        // dd($request);
        $join = Join::orderBy('id', 'desc')->first();
        // dd($join->id);
        Bill::where('join_id', $join->id)->where('payment', null)
            ->update([
                'image' => $name,
            ]);

        return redirect('dashboard');
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
