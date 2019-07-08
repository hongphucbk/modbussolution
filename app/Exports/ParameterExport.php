<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;


use App\InsModbustcpDevice;
use App\InsModbustcpParameter;
use App\InsModbustcpValue;

class ParameterExport implements FromQuery, WithHeadings, WithMapping
{
	use Exportable;
    
    public function headings(): array
    {
        return [
            'No.',
            'Device name',
            'IP Address',
            'Parameter name',
            'Register',
            'Slave id',
            'Scale value',
            'Note',
            'Time',
        ];
    }

    public function map($data): array
    {
        return [
            $data->id,
            $data->ins_modbustcp_device->name,
            $data->ins_modbustcp_device->IPaddress,
            $data->name,
            $data->register,
            $data->slaveid,
            $data->scalevalue,
            $data->note,
            $data->created_at,
        ];
    }

	public function __construct()
    {
        
    }

    public function query()
    {
        return InsModbustcpParameter::query();
    }
}
