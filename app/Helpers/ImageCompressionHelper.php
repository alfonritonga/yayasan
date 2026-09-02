<?php

namespace App\Helpers;

class ImageCompressionHelper
{
    /**
     * Kompres dan simpan gambar dengan ukuran maksimal ~300KB
     * 
     * @param \Illuminate\Http\UploadedFile $file
     * @param string $folder Relative folder path di dalam public/ (default: 'asset')
     * @param int $maxWidth Max width resize (default: 1200)
     * @param int $quality JPG compression quality (default: 78)
     * @return string Relative path file yang disimpan (e.g. 'asset/1700000000_xxx.jpg')
     */
    public static function compressAndSave($file, $folder = 'asset', $maxWidth = 1200, $quality = 78)
    {
        if (!$file) {
            return null;
        }

        $ext = strtolower($file->getClientOriginalExtension());
        $filename = time() . '_' . uniqid() . '.' . (in_array($ext, ['png', 'bmp']) ? 'jpg' : ($ext ?: 'jpg'));
        
        $destinationPath = public_path('/' . trim($folder, '/'));
        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0755, true);
        }

        $targetFile = $destinationPath . '/' . $filename;
        $tempPath = $file->getRealPath();

        // Cek dukungan GD library
        if (in_array($ext, ['jpg', 'jpeg', 'png', 'webp', 'bmp']) && function_exists('imagecreatefromstring')) {
            $imageData = @file_get_contents($tempPath);
            if ($imageData !== false) {
                $srcImage = @imagecreatefromstring($imageData);

                if ($srcImage !== false) {
                    $origWidth = imagesx($srcImage);
                    $origHeight = imagesy($srcImage);

                    // Resize jika melebihi maxWidth
                    if ($origWidth > $maxWidth) {
                        $newWidth = $maxWidth;
                        $newHeight = (int)($origHeight * ($maxWidth / $origWidth));

                        $dstImage = imagecreatetruecolor($newWidth, $newHeight);
                        // Background putih bersih untuk mencegah background hitam pada PNG transparan
                        $white = imagecolorallocate($dstImage, 255, 255, 255);
                        imagefilledrectangle($dstImage, 0, 0, $newWidth, $newHeight, $white);
                        imagecopyresampled($dstImage, $srcImage, 0, 0, 0, 0, $newWidth, $newHeight, $origWidth, $origHeight);
                        imagedestroy($srcImage);
                        $srcImage = $dstImage;
                    }

                    // Kompresi ke JPG dengan kualitas optimal (menghasilkan file 100KB - 250KB)
                    imagejpeg($srcImage, $targetFile, $quality);
                    imagedestroy($srcImage);

                    return trim($folder, '/') . '/' . $filename;
                }
            }
        }

        // Fallback jika bukan tipe gambar standar
        $file->move($destinationPath, $filename);
        return trim($folder, '/') . '/' . $filename;
    }
}
