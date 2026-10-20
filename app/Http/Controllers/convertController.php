<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class convertController extends Controller
{

    public function show($type = 'length')
{
    return view('welcome', ['type' => $type]);
}


    public function convert(Request $request){



  /*   $request->validate([
    'type' => 'required|in:length,weight,temperature',
    'input_value' => 'required|numeric',
    'from_unit' => 'required|string',
    'to_unit' => 'required|string',
]); */


        $value=$request->input("input_value");
        $fromUnit=$request->input("from_unit");
        $toUnit=$request->input("to_unit");
        $type = $request->input('type');

        /* dd($value,$fromUnit,$toUnit); */
        /* return "Value :$value,From $fromUnit, To $toUnit";  */     

        $units=[
           'length'=>[ 
            'm'=>1,
            'km'=>1000,
            'cm'=>0.01,
            'mm'=>0.001
        ],
       'weight' => [
                'kg' => 1,
                'g' => 0.001,
                'mg' => 0.000001,
                'lb' => 0.45359237,
            ],
        ];

        if ($type === 'temperature') {
            $celsius = match ($fromUnit) {
                'c' => $value,
                'f' => ($value - 32) * 5 / 9,
                'k' => $value - 273.15,
            };

            $result = match ($toUnit) {
                'c' => $celsius,
                'f' => $celsius * 9 / 5 + 32,
                'k' => $celsius + 273.15,
            };
        } else {
            $result = $value * $units[$type][$fromUnit]
                            / $units[$type][$toUnit];
        }

        return redirect()->route('converter.show', $type)
            ->with([
                'converted_value' => round($result, 6),
                'original_value' => $value,
                'from_unit' => $fromUnit,
                'to_unit' => $toUnit,
            ]);

       /*  $result=$value *$units[$fromUnit] /$units[$toUnit];

        return back()->with([
            'converted_value'=>$result,
            'original_value'=>$value,
            'from_unit'=>$fromUnit,
            'to_unit'=>$toUnit,
        ]); */
    }


    
}
