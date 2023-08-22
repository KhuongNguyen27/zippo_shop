<?php

namespace App\Exports;
 
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;


class UserExport implements FromCollection,WithHeadings,WithMapping, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User::with('group')->get();
       
    }
    /**
     * Returns headers for report
     * @return array
     */
    public function headings(): array {
        return [
            'ID',
            'Name',
            'Email',    
            'Gender',    
            'Position',    
            'Day of birth',    
            'Address',    
            'Phone',    
            "Created",
            
        ];
    }
 
    public function map($user): array {
        return [
            $user->id,
            $user->name,
            $user->email,
            $user->gender,
            $user->group->name,
            $user->day_of_birth,
            $user->address,
            $user->phone,
            $user->created_at,
        ];
}
}
