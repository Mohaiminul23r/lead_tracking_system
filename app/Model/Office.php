<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    use ModelCommonTrait;
     protected $fillable = [
        'name','email', 'phone','company-id',

    ];

     public function company(){
        return $this->belongsTo('App\Model\Company');
    }

    public function address(){
        return $this->belongsTo('App\Model\Address');
    }

    // public function GetDataForDataTable($name = 'name',$limit = 20, $offset = 0, $search = '', $status = 0){
    //     $totalData = $this::query();
    //     $filterData = $this::query(); 

    //     if($status == 1){
    //         $totalData->where('status', 1);
    //         $filterData->where('status', 1);
    //     }

    //     if($limit == -1)
    //         $limit = 9999999;

    //     return [
    //         'data' => $totalData->where($name, 'like', '%'.$search.'%')
    //                             ->with('company','address','address.country','address.city')
    //                             ->offset($offset)
    //                             ->limit($limit)
    //                             ->orderBy('offices.created_at')
    //                             ->get(),

    //         'recordsTotal'    => $this->countRow(),

    //         'recordsFiltered' => $filterData->where('companies.name', 'like', '%'.$search.'%')
    //                                         ->join('companies','company_id','companies.id')
    //                                         ->with('company','address','address.country','address.city')
    //                                         ->count(),
                
    //         'draw' => 0
    //     ];
    // }
}
