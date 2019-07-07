<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InsModbustcpControl extends Model
{
    protected $table = "ins_modbustcp_control";

    public function ins_modbustcp_device()
    {
    	return $this->belongsTo('App\InsModbustcpDevice','device_id','id');
    }

}
