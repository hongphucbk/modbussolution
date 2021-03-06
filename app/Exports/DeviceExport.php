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

class DeviceExport implements FromQuery, WithHeadings, WithMapping
{
	use Exportable;
    
    public function headings(): array
    {
        return [
            'NO.',
            'Device Name',
            'IP Address',
            'Note',
            'Time',
        ];
    }

    public function map($data): array
    {
        return [
            $data->id,
            $data->name,
            $data->IPaddress,
            $data->note,
            $data->created_at,
        ];
    }

	public function __construct()
    {
        
    }

    public function query()
    {
        return InsModbustcpDevice::query();
    }
}
