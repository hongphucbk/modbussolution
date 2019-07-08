<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\InsModbustcpDevice;
use App\InsModbustcpParameter;
use App\InsModbustcpValue;
use App\Exports\ParameterExport;


class InsModbustcpParameterController extends Controller
{
    public function get_List_Admin()
	{
		$parameters = InsModbustcpParameter::all();

		return view('admin.apps.instrument.modbustcp.parameter.list', compact('parameters'));
	}

	public function get_Add_Admin()
	{
		$devices = InsModbustcpDevice::all();
		return view('admin.apps.instrument.modbustcp.parameter.add', compact('devices'));
	}

	public function post_Add_Admin(Request $request)
	{
		$this->validate($request,[
            'name' => 'required',
            'device_id' => 'required',
            'register' => 'required',
        ],
        [
            'name.required'=>'Please input name',
            'device_id.required'=>'Please select device name',
            'register.required'=>'Please input register',
        ]);

		$parameter = new InsModbustcpParameter;
		$parameter->name = $request->name;
		$parameter->register = $request->register;
		$parameter->scalevalue = $request->scalevalue;
		$parameter->slaveid = $request->slaveid;
		$parameter->device_id = $request->device_id;
		$parameter->note = $request->note;

		$parameter->save();
		return redirect()->back()->with('notification','Add successfully');
	}

	public function get_Edit_Admin($id)
	{
		$parameter = InsModbustcpParameter::find($id);
		$devices = InsModbustcpDevice::all();
		return view('admin.apps.instrument.modbustcp.parameter.edit',compact('parameter','devices'));
	}

	public function post_Edit_Admin($id, Request $request)
	{
		$this->validate($request,[
            'name' => 'required',
            'device_id' => 'required',
            'register' => 'required',
        ],
        [
            'name.required'=>'Please input name',
            'device_id.required'=>'Please select device name',
            'register.required'=>'Please input register',
        ]);

		$parameter = InsModbustcpParameter::find($id);
		$parameter->name = $request->name;
		$parameter->register = $request->register;
		$parameter->device_id = $request->device_id;
		$parameter->display = $request->display;
		$parameter->note = $request->note;
		$parameter->scalevalue = $request->scalevalue;
		$parameter->slaveid = $request->slaveid;
		
		$parameter->save();
		return redirect()->back()->with('notification','Edit successfully');
	}

	public function get_Export_Admin()
	{
		$type = "xlsx";
        $duoi1 = date('Ymd');
        $duoi2 = date('His');

		return (new ParameterExport())->download('Modbus TCP Parameter-'.$duoi1.'-'.$duoi2.'.xlsx');
	}

}
