<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class UpResFeatureController extends Controller
{
    //

    public function index(Request $request)
    {
        if ($request->id !== null) {
            $get = Http::withHeaders([
                'Authorization' => config('replicate.api_key'),
                'Content-Type' => 'application/json',
            ])->get('https://api.replicate.com/v1/predictions/' . $request->id);
            $response = $get->json();
            // if ($response['status'] == 'succeeded') {
            //     unlink($response['input']['image']);
            // }
            return response()->json($response);
        }


        return view('features.upResolusi.index');
    }

    public function proses(Request $request)
    {
        $validasi = $request->validate([
            'gambar' => 'required',
        ]);

        $face_enhance = $request->boolean('face_enhance');
        $gambar = $request->file('gambar');
        $extension = $gambar->getClientOriginalExtension();
        $nameImage = hash('sha256', time()) . '.' . $extension;
        $saveImage = $gambar->move('imageUp', $nameImage);

        $post = Http::withHeaders([
            'Authorization' => config('replicate.api_key'),
            'Content-Type' => 'application/json',
        ])->post('https://api.replicate.com/v1/predictions', [
            "version" => "42fed1c4974146d4d2414e2be2c5277c7fcf05fcc3a73abf41610695738c1d7b",
            "input" => [
                // asset('imageUp/'.$nameImage)

                "image" => "https://kaligerman.000webhostapp.com/defaultImage/bg1.jpg",
                "scale" => intval($request->scale),
                "face_enhance" => $face_enhance,
            ]
        ]);
        $data = $post->json();
        if ($data['status'] == 'starting') {
            return response()->json($data);
        }
    }

    public function cancel(Request $request)
    {
        if ($request->urlCancel !== null) {
            $cancel = Http::withHeaders([
                'Authorization' => config('replicate.api_key'),
                'Content-Type' => 'application/json',
            ])->post($request->urlCancel);

            $response = $cancel->json();
            return response()->json($response);
            // canceled
        }
    }
}
