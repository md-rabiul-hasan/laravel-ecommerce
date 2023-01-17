<?php

namespace App\Traits;

use Exception;
use Illuminate\Support\Facades\File;


trait ImageOperationTrait
{

    /**
     * This method work for image upload
     */
    public function imageUpload($image,  $directory = 'images')
    {
        // Folder create if not exists
        if (!File::exists($directory)) {
            File::makeDirectory($directory, $mode = 0777, true, true);
        }

        // Folder create if not exists
        if (isset($image)) {
            $image_filename = time() . uniqid() . $image->getClientOriginalName();
            try {
                $image->move($directory, $image_filename);
                return $directory . $image_filename;
            } catch (Exception $e) {
                return null;
            }
        } else {
            return null;
        }
    }

    /**
     * This method work for image upload and remove existing image when data update
     */
    public function imageRemoveAndUpload($old_image_path, $image,  $directory = 'images')
    {
        // Folder create if not exists
        if (!File::exists($directory)) {
            File::makeDirectory($directory, $mode = 0777, true, true);
        }

        // image upload and return image path
        if (isset($image)) {
            $image_filename = time() . uniqid() . $image->getClientOriginalName();
            try {
                $this->imageRemove($old_image_path); // remove old image
                // upload new image
                $image->move($directory, $image_filename);
                return $directory . $image_filename;
            } catch (Exception $e) {
                return $old_image_path;
            }
        } else {
            return $old_image_path;
        }
    }

    /**
     * This method work for image remove
     */
    public function imageRemove($image_path)
    {
        if (file_exists($image_path)) {
            unlink($image_path);
        }
    }
}
