<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;


class UsersExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function headings():array{
        return[
            'نام و نام خانوادگی',
            'نمره',
        ];
    }


    public function collection()
    {
        return  $users=DB::table('natijes')
            ->leftJoin('users','natijes.user_id','=','users.id')
            ->select(
                DB::raw('name  as name'),
                DB::raw('nomre as nomre')
            )
            ->where('nomre','>','12')
            ->get();
    }
}
