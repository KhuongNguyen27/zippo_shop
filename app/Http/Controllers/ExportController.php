<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UserExport;
use App\Exports\CustomerExport;

class ExportController extends Controller
{
    public function user_export()
    {
        return Excel::download(new UserExport, 'users.xlsx');
    }
    public function customer_export()
    {
        return Excel::download(new CustomerExport, 'customers.xlsx');
    }
}
