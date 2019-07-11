<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\InsModbustcpDevice;
use App\InsModbustcpParameter;
use App\InsModbustcpControl;
use App\InsModbustcpValue;
use App\Exports\ControlExport;

class InsModbustcpControlController extends Controller
{
    public function get_List_Admin()
	{
		$controls = InsModbustcpControl::all();
		return view('admin.apps.instrument.modbustcp.control.list', compact('controls'));
	}

	public function get_Add_Admin()
	{
		$devices = InsModbustcpDevice::all();
		return view('admin.apps.instrument.modbustcp.control.add', compact('devices'));
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

		$control = new InsModbustcpControl;
		$control->name = $request->name;
		$control->register = $request->register;
		$control->scalevalue = $request->scalevalue;
		$control->slaveid = $request->slaveid;
		$control->device_id = $request->device_id;
		$control->note = $request->note;
		$control->type = $request->type;
		$control->save();
		return redirect()->back()->with('notification','Add successfully');
	}

	public function get_Edit_Admin($id)
	{
		$parameter = InsModbustcpParameter::find($id);
		$devices = InsModbustcpDevice::all();
		$control = InsModbustcpControl::find($id);
		return view('admin.apps.instrument.modbustcp.control.edit',compact('control','devices'));
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

		$control = InsModbustcpControl::find($id);
		$control->name = $request->name;
		$control->register = $request->register;
		$control->device_id = $request->device_id;
		$control->display = $request->display;
		$control->note = $request->note;
		$control->scalevalue = $request->scalevalue;
		$control->slaveid = $request->slaveid;
		$control->type = $request->type;
		
		$control->save();
		return redirect()->back()->with('notification','Edit successfully');
	}


	public function get_Control()
	{
		$controls = InsModbustcpControl::where('type','Button')
										->get();
		$text_controls = InsModbustcpControl::where('type','Text')
										->get();

		return view('scada.modbustcp.control.control', compact('controls','text_controls'));
	}

	public function get_Export_Admin()
	{
		$type = "xlsx";
        $duoi1 = date('Ymd');
        $duoi2 = date('His');

		return (new ControlExport())->download('Modbus TCP Control-'.$duoi1.'-'.$duoi2.'.xlsx');
	}

}
