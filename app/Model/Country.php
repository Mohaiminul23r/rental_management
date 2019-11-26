<?php

namespace App\Model;
use Auth;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = [
    	'name',
    ];

    public function cities(){
    	return $this->hasMany('App\Model\City');
    }

     public function address(){
    	return $this->hasMany('App\Model\Address');
    }

    public function getDataForDataTable($limit = 20, $offset = 0, $search = [], $where = [], $with = [], $join = [], $order_By = [], $table_col_name = ''){

		$totalData = $this::query();
		$filterData = $this::query();

		if(count($where) > 0){	
			foreach ($where as $keyW => $valueW) {
				$totalData->where($keyW, $valueW);
				$filterData->where($keyW, $valueW);	
			}	
		}


		if($limit > 0){
			$totalData->limit($limit)->offset($offset);
		}

		if(count($with) > 0){
			foreach ($with as $with) {	
				$totalData->with($with);
				$filterData->with($with);

			}
		}

		if(count($join) > 0){
			foreach ($join as list($nameJ, $withJ, $asJ)) {	
				$totalData->leftJoin($nameJ, $withJ, '=', $nameJ.'.id')
				->selectRaw($asJ);
				$filterData->leftJoin($nameJ, $withJ, '=', $nameJ.'.id')
				->selectRaw($asJ);
			}
			
			$totalData->selectRaw($this->getTable().'.*');
			$filterData->selectRaw($this->getTable().'.*');
		}

		if(count($search) > 0){
			foreach ($search as $keyS => $valueS) {	
				$totalData->orWhere($keyS, 'like', "%$valueS%");
				$filterData->orWhere($keyS, 'like', "%$valueS%");
			}	
		}


		if($table_col_name != null){
			if (Auth::user()->hasRole(['admin', 'manager'])) {
			    $totalData->where($table_col_name , '!=', Auth::user()->id);
			    $filterData->where($table_col_name , '!=', Auth::user()->id);
			}
			else{
				$totalData->where($table_col_name , '=', Auth::user()->id);
			    $filterData->where($table_col_name , '=', Auth::user()->id);
			}
		}

		$by = 'created_at';
		$order = 'DESC';
		if(count($order_By) > 0){
			$by = $order_By['by'];
			$order = $order_By['order'];
		}

// look([$totalData->toSql(),$totalData->getBindings()]);
		return [
			'data' => $totalData->orderBy($this->getTable().'.'.$by, $order)
				->get(),
			'draw'	 	=> 0,
			'recordsTotal'	=> $this->count(),
			'recordsFiltered'	=> $filterData->count(),
		]; 
	}
}
