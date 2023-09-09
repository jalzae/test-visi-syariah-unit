<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Test extends Controller
{
    public function number_one(Request $request)
    {
        $input = $request->input('input');

        if (!isset($input)) {
            $input = 'Halo, kami adalah visicloud';
        }

        $data = [
            'input' => $input,
            'hasil' => str_word_count($input)
        ];

        return response()->json($data);
    }

    public function number_two(Request $request)
    {
        $input = $request->input('input');

        if (!isset($input)) {
            $input = 'tujuh,dua,lima,satu';
        }

        $inputArray = explode(',', $input);

        $order = ["satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan"];

        $inputArray = collect($inputArray)->sortBy(function ($item) use ($order) {
            return array_search($item, $order, true);
        })->toArray();
        $sortedInput = implode(',', $inputArray);

        $data = [
            'input' => $input,
            'result' => $sortedInput
        ];
        return response()->json($data);
    }
    public function number_three(Request $request)
    {
        $input = $request->input('input');

        if (!isset($input)) {
            $input = 'tujuh,dua,lima,satu';
        }

        $inputArray = explode(',', $input);

        $order = ["satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan"];

        $inputArray = collect($inputArray)->sortBy(function ($item) use ($order) {
            return array_search($item, $order, true);
        })->toArray();

        $data = [
            'input' => $input,
            'min' => min($inputArray),
            'max' => max($inputArray)
        ];
        return response()->json($data);
    }

    public function number_four(Request $request)
    {
        $input = $request->input('input');

        if (!isset($input)) {
            $input = 'Halo, kami adalah visicloud';
        }

        $data = [
            'input' => $input,
            'hasil' => strrev($input)
        ];

        return response()->json($data);
    }
}
