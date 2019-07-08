<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\InsModbustcpDevice;
use App\InsModbustcpParameter;
use App\InsModbustcpValue;

class InsModbustcpDeviceController extends Controller
{
	public function get_List_Admin()
	{
		$devices = InsModbustcpDevice::all();
		return view('admin.apps.instrument.modbustcp.device.list', compact('devices'));
	}

	public function get_Add_Admin()
	{
		return view('admin.apps.instrument.modbustcp.device.add');
	}

	public function post_Add_Admin(Request $request)
	{
		$this->validate($request,[
            'name' => 'required',
            'IPaddress' => 'required',
        ],
        [
            'name.required'=>'Please input name',
            'IPaddress.required'=>'Please input IP address',
        ]);

		$device = new InsModbustcpDevice;
		$device->name = $request->name;
		$device->IPaddress = $request->IPaddress;
		$device->note = $request->note;

		$device->save();
		return redirect()->back()->with('notification','Add successfully');
	}
    
    public function get_Edit_Admin($id)
	{
		$device = InsModbustcpDevice::find($id);
		return view('admin.apps.instrument.modbustcp.device.edit',compact('device'));
	}

	public function post_Edit_Admin($id, Request $request)
	{
		$this->validate($request,[
            'name' => 'required',
            'IPaddress' => 'required',
        ],
        [
            'name.required'=>'Please input name',
            'IPaddress.required'=>'Please input IP address',
        ]);

		$device = InsModbustcpDevice::find($id);
		$device->name = $request->name;
		$device->IPaddress = $request->IPaddress;
		$device->note = $request->note;

		$device->save();
		return redirect()->back()->with('notification','Add successfully');
	}

	fun
	get_Export_Admin

	$type = "xlsx";
        $today = Carbon::now();
        $ngay = $request->DateFind;
        $ngay2 = $request->DateFind2;
        $ngay =  Carbon::create(substr($ngay, 0, 4), substr($ngay, 5, 2), substr($ngay, 8, 2), 0, 0, 0);
        $ngay2 = Carbon::create(substr($ngay2, 0, 4), substr($ngay2, 5, 2), substr($ngay2, 8, 2), 23, 59, 59);

        $duoi1 = date('Ymd');
        $duoi2 = date('His');

		return (new ModbustcpExport($ngay,$ngay2 ))->download('Modbus TCP-'.$duoi1.'-'.$duoi2.'.xlsx');
}
