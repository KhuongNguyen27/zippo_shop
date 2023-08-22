<?php

namespace App\Exports;

use App\Models\Customer;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class CustomerExport implements FromCollection, ShouldAutoSize, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Customer::with('order')->get();
    }
    public function headings(): array {
        return [
            'ID',
            'Name',
            'Day of birth',
            'Gender',    
            'Address',    
            'Email',    
            'Phone',    
            "Created",
            
        ];
    }
    public function map($user): array {
        return [
            $user->id,
            $user->name,
            $user->day_of_birth,
            $user->gender,
            $user->address,
            $user->email,
            $user->phone,
            $user->day_of_birth,
            $user->created_at,
        ];
    }
}
