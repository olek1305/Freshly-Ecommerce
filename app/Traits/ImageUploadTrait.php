<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

trait ImageUploadTrait {

    public function uploadImage(Request $request, $inputName, $path): bool|string
    {
        // Validate the uploaded file
        $request->validate([
            $inputName => 'required|mimes:jpg,jpeg,png,gif,webp|max:2048'
        ]);

        if ($request->hasFile($inputName)) {
            return $this->ensureDirectoryExists($request, $inputName, $path);
        }

        return false;
    }

    public function uploadMultiImage(Request $request, $inputName, $path): bool|array
    {
        $imagePaths = [];
        if($request->hasFile($inputName)) {

            $images = $request->{$inputName};

            foreach ($images as $image) {
                $ext = $image->getClientOriginalExtension();
                $imageName = 'media_' . uniqid() . '.' . $ext;

                $image->move(public_path($path), $imageName);

                $imagePaths[] = $path . '/' . $imageName;
            }

            return $imagePaths;
        }

        return false;
    }

    public function updateImage(Request $request, $inputName, $path, $oldPath = null): bool|string
    {
        if($request->hasFile($inputName)) {
            // Delete old image if it exists
            if($oldPath && File::exists(public_path($oldPath))) {
                File::delete(public_path($oldPath));
            }

            return $this->ensureDirectoryExists($request, $inputName, $path);
        }

        return false;
    }

    public function deleteImage(string $path): bool
    {
        if(File::exists(public_path($path))) {
            File::delete(public_path($path));
        }

        return true;
    }

    /**
     * @param Request $request
     * @param $inputName
     * @param $path
     * @return string
     */
    public function ensureDirectoryExists(Request $request, $inputName, $path): string
    {
        $image = $request->file($inputName);
        $ext = $image->getClientOriginalExtension();
        $imageName = 'media_' . uniqid() . '.' . $ext;

        // Ensure the directory exists
        $fullPath = public_path($path);
        if (!File::exists($fullPath)) {
            File::makeDirectory($fullPath, 0755, true);
        }

        // Move the new image to the specified path
        $image->move($fullPath, $imageName);

        return $path . '/' . $imageName;
    }
}
