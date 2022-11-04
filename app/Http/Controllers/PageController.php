<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Bill;
use App\Models\Join;
use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Join::exists();
        if (!$data) {
            $data = false;
            return view('dashboard', compact('data'));
        }

        $data = Join::where('user_id', auth()->user()->id)->orderBy('id', 'desc')->first();
        $coba = DB::table('bills')
            ->join('joins', 'bills.join_id', '=', 'joins.id')
            ->select('joins.user_id as id', 'bills.*')
            ->orderByDesc('bills.id')
            ->first();
        if (!Bill::exists()) {
            $bill = DB::table('bills')
                ->join('joins', 'bills.join_id', '=', 'joins.id')
                ->select('joins.user_id as id', 'bills.*')
                ->whereNull('bills.image')
                ->orderByDesc('joins.id')
                ->first();
        } else {
            $bill = DB::table('bills')
                ->join('joins', 'bills.join_id', '=', 'joins.id')
                ->select('joins.user_id as id', 'bills.*', 'joins.id as number')
                ->whereNull('bills.payment')
                ->orderBy('joins.id', 'desc')
                ->first();
            // dd($bill);
        }


        // dd($dataNow);
        return view('dashboard', compact('data', 'bill'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Package::all();
        // dd($join);

        return view('form', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('riwayat');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        dd('asik');
        return view('pay');
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
