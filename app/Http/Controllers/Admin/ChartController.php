<?php

namespace App\Http\Controllers\Admin;

use App\Exports\UsersExport;
use App\Http\Controllers\Controller;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;


class ChartController extends Controller
{
    public function index()
    {

        $users=DB::table('natijes')
            ->leftJoin('users','natijes.user_id','=','users.id')
            ->select(
                DB::raw('name  as name'),
                DB::raw('nomre as nomre')
            )
            ->where('nomre','>','12')
           //->groupBy('id')
            ->get();

       // dd($users);
        $result[] = ['نام و نام خانوادگی','نمره'];
        foreach ($users as $key => $value) {
            $result[++$key] = [$value->name,$value->nomre];
        }

        $data['user'] = json_encode($result);

        return view('admin.chart',compact('data'));
    }

    public function getChartData()
    {
        return Excel::download(new UsersExport, 'charts.xlsx');
    }
}
