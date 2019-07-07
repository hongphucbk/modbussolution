<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InsModbustcpDevice extends Model
{
    protected $table = "ins_modbustcp_device";

    public function ins_modbustcp_parameter()
    {
    	return $this->hasMany('App\InsModbustcpParameter','device_id','id');
    }

    public function ins_modbustcp_control()
    {
    	return $this->hasMany('App\InsModbustcpControl','device_id','id');
    }
}
