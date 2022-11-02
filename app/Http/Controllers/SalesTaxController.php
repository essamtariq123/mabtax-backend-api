<?php

namespace App\Http\Controllers;

use App\Models\SalesTax;
use Illuminate\Http\Request;

class SalesTaxController extends Controller
{
    public function store(Request $request)
    {
        $form = json_decode($request->form, true);
        // $files = json_decode(json_encode($request->files), true);


        $sales_tax = SalesTax::create([
            'name' => $form['name'],
            'type' => $form['type'],
            'date' => $form['date'],
            'nature' => $form['nature'],
            'description' => $form['description'],
            'consumer' => $form['consumer'],
            'user_id' => 1
        ]);

        if ($request->hasFile('files')) {
            $files = $request->file('files');

            
            foreach ($files as $file) {
                $sales_tax->addMedia($file)->toMediaCollection('sales-tax', 's3');
            }
        }


        return response()->json(['message' => 'Thankyou For submitting your sales tax. the agent will be right back with you']);
    }
}
