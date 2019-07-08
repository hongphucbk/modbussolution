<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\InsModbustcpDevice;
use App\InsModbustcpParameter;
use App\InsModbustcpValue;
use Carbon\Carbon;
use App\Exports\DeviceExport;


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

	public function get_Export_Admin()
	{
		$type = "xlsx";
        $duoi1 = date('Ymd');
        $duoi2 = date('His');

		return (new DeviceExport())->download('Modbus TCP Device-'.$duoi1.'-'.$duoi2.'.xlsx');
	}
	

	
}
