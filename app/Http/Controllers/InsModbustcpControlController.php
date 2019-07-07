<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\InsModbustcpDevice;
use App\InsModbustcpParameter;
use App\InsModbustcpControl;
use App\InsModbustcpValue;
use Moura137\LaravelElephant\ElephantFacade;
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

	// public function get_Edit_Admin($id)
	// {
	// 	$parameter = InsModbustcpParameter::find($id);
	// 	$devices = InsModbustcpDevice::all();
	// 	return view('admin.apps.instrument.modbustcp.parameter.edit',compact('parameter','devices'));
	// }

	// public function post_Edit_Admin($id, Request $request)
	// {
	// 	$this->validate($request,[
 //            'name' => 'required',
 //            'device_id' => 'required',
 //            'register' => 'required',
 //        ],
 //        [
 //            'name.required'=>'Please input name',
 //            'device_id.required'=>'Please select device name',
 //            'register.required'=>'Please input register',
 //        ]);

	// 	$parameter = InsModbustcpParameter::find($id);
	// 	$parameter->name = $request->name;
	// 	$parameter->register = $request->register;
	// 	$parameter->device_id = $request->device_id;
	// 	$parameter->display = $request->display;
	// 	$parameter->note = $request->note;
	// 	$parameter->scalevalue = $request->scalevalue;
	// 	$parameter->slaveid = $request->slaveid;
		
	// 	$parameter->save();
	// 	return redirect()->back()->with('notification','Edit successfully');
	// }


	public function get_Control()
	{
		$controls = InsModbustcpControl::all();

		return view('scada.modbustcp.control.control', compact('controls'));
	}

	public function testElephant()
	{
		ElephantFacade::emit('eventMsg', array('foo' => 'bar'));
		//return view('scada.modbustcp.control.control', compact('controls'));
	}

		


}
