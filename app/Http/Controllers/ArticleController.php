<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Models\ArticleModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    function index()
    {
        $articles = ArticleModel::orderBy('id', 'desc')->get();
        return view('artikel.index', compact('articles'));
    }

    function addView()
    {
        return view('artikel.add');
    }

    function addPost(ArticleRequest $request)
    {
        $file = $request->file('media');
        DB::beginTransaction();
        try {
            if ($file != null) {
                $path = $this->compressAndSaveImage($file);
            } else {
                $path = null;
            }

            ArticleModel::create([
                'guid' => Str::uuid()->toString(),
                'slug' => Str::slug($request->title),
                'user_id' => Auth::user()->id,
                'title' => $request->title,
                'description' => $request->description,
                'status' => $request->status == 'true' ? 1 : 0,
                'media' => $path,
            ]);
            DB::commit();
            return redirect()->route('article_view_index')->with('message', 'Artikel berhasil di tambahkan!');
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->route('article_add_view')->with('error_message', $exception->getMessage());
        }
    }

    function editView($id)
    {
        $article = ArticleModel::with('admin')->find($id);
        return view('artikel.edit', compact('article'));
    }

    function editPatch(ArticleRequest $request, $id)
    {
        DB::beginTransaction();
        try {
            $job = ArticleModel::with('admin')->find($id);
            $data = [
                'title' => $request->title,
                'slug' => Str::slug($request->title),
                'description' => $request->description,
                'from' => $request->from,
                'to' => $request->to,
                'status' => $request->status == 'true' ? 1 : 0
            ];

            $file = $request->file('media');
            if ($file != null) {
                $path = $this->compressAndSaveImage($file);
                $data['media'] = $path;
            }
            $job->update($data);
            DB::commit();

            return redirect()->route('article_view_index')->with('message', 'Artikel berhasil di edit!');
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->route('article_edit_view', $id)->with('error_message', $exception->getMessage());
        }
    }

    /**
     * Kompres dan simpan gambar maksimal ~300KB
     */
    private function compressAndSaveImage($file)
    {
        $ext = strtolower($file->getClientOriginalExtension());
        $filename = time() . '_' . uniqid() . '.' . ($ext === 'png' ? 'jpg' : $ext);
        $destinationPath = public_path('/asset');

        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0755, true);
        }

        $targetFile = $destinationPath . '/' . $filename;
        $tempPath = $file->getRealPath();

        // Menggunakan GD untuk resize & kompres
        if (in_array($ext, ['jpg', 'jpeg', 'png', 'webp']) && function_exists('imagecreatefromstring')) {
            $imageData = file_get_contents($tempPath);
            $srcImage = @imagecreatefromstring($imageData);

            if ($srcImage !== false) {
                $origWidth = imagesx($srcImage);
                $origHeight = imagesy($srcImage);

                // Batasi dimensi maksimal width 1200px agar efisien
                $maxWidth = 1200;
                if ($origWidth > $maxWidth) {
                    $newWidth = $maxWidth;
                    $newHeight = (int)($origHeight * ($maxWidth / $origWidth));

                    $dstImage = imagecreatetruecolor($newWidth, $newHeight);
                    // Pertahankan background putih jika ada transparansi
                    $white = imagecolorallocate($dstImage, 255, 255, 255);
                    imagefilledrectangle($dstImage, 0, 0, $newWidth, $newHeight, $white);
                    imagecopyresampled($dstImage, $srcImage, 0, 0, 0, 0, $newWidth, $newHeight, $origWidth, $origHeight);
                    imagedestroy($srcImage);
                    $srcImage = $dstImage;
                }

                // Kompresi kualitas JPG 78% (rata-rata ukuran jadi 100KB - 250KB, di bawah 300KB)
                imagejpeg($srcImage, $targetFile, 78);
                imagedestroy($srcImage);

                return 'asset/' . $filename;
            }
        }

        // Fallback jika bukan image yang didukung GD
        $file->move($destinationPath, $filename);
        return 'asset/' . $filename;
    }

    function delete($id)
    {
        DB::beginTransaction();
        try {
            ArticleModel::find($id)->delete();
            DB::commit();
            return response([
                'status' => true,
                'message' => 'Delete artikel success',
                'data' => null
            ]);
        } catch (\Exception $exception) {
            DB::rollback();
            return response([
                'status' => false,
                'message' => 'Delete artikel failed',
                'error' => $exception->getMessage()
            ]);
        }
    }
}
