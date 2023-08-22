<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Redirect;
use PDF;

class NotesController extends Controller
{
    // public function order_notes()
    // {
    //     $data['notes'] = Note::paginate(10);
   
    //     return view('notes',$data);
    // }
 
    public function order_pdf($id){
        $data['notes'] = Order::with('orderdetail','customer')->orderBy('id', 'DESC')->findOrFail($id);
        $data['title'] = 'Notes List';
        $pdf = PDF::loadView('admin.order.pdf',compact('data'))->setPaper('a4', 'landscape');
        return $pdf->download('order.pdf');
    }
    
}