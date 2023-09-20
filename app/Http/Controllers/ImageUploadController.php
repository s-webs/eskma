<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageUploadController extends Controller
{
    public function upload(Request $request)
    {
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('uploads'), $imageName); // Перемещаем изображение в папку uploads
            $imageUrl = asset('uploads/' . $imageName); // Формируем URL-адрес изображения

            return response()->json(['url' => $imageUrl]);
        }

        return response()->json(['error' => 'Ошибка загрузки изображения.']);
    }
}
