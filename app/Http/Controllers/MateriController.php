<?php

namespace App\Http\Controllers;

use App\Models\MateriModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use FilippoToso\PdfWatermarker\Support\Pdf;
use FilippoToso\PdfWatermarker\Watermarks\ImageWatermark;
use FilippoToso\PdfWatermarker\PdfWatermarker;
use FilippoToso\PdfWatermarker\Support\Position;


class MateriController extends Controller
{
    function index()
    {
        $materi = MateriModel::orderBy('id', 'desc')->get();
        return view('materi.index', compact('materi'));
    }

    function addView()
    {
        return view('materi.add');
    }

    function addPost(Request $request)
    {
        $file = $request->file('image');
        $pdf = $request->file('pdf');
        DB::beginTransaction();
        try {
            if ($file != null) {
                $imageName = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('/asset'), $imageName);
                $path = 'asset/' . $imageName;
            } else {
                $path = null;
            }

            if ($pdf != null) {
                $pdfName = time() . '_' . $pdf->getClientOriginalName();
                $pdf->move(public_path('/asset'), $pdfName);
                $pdfpath = 'asset/' . $pdfName;
            } else {
                $pdfpath = null;
            }

            // Specify path to the existing pdf
            $pdfW = new Pdf($pdfpath);

            // Specify path to image. The image must have a 96 DPI resolution.
            $watermark = new ImageWatermark('front/imgs/logowatermark.png'); 

            // Create a new watermarker
            $watermarker = new PDFWatermarker($pdfW, $watermark); 
            
            // Save the new PDF to its specified location
            $watermarker->save($pdfpath);

            MateriModel::create([
                'title' => $request->title,
                'image' => $path,
                'pdf' => $pdfpath,
                'price' => $request->price,
                'description' => $request->description,
                'status' => $request->status == 'true' ? 1 : 0,
            ]);
            DB::commit();
            return redirect()->route('materi_view_index')->with('message', 'Materi berhasil di tambahkan!');
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->route('materi_add_view')->with('error_message', $exception->getMessage());
        }
    }

    function editView($id)
    {
        $materi = MateriModel::find($id);
        return view('materi.edit', compact('materi'));
    }

    function editPatch(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $materi = MateriModel::find($id);
            $data = [
                'title' => $request->title,
                'price' => $request->price,
                'description' => $request->description,
                'status' => $request->status == 'true' ? 1 : 0,
            ];

            $file = $request->file('image');
            if ($file != null) {
                $imageName = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('/asset'), $imageName);
                $path = 'asset/' . $imageName;
                $data['image'] = $path;
            }

            if ($pdf != null) {
                $pdfName = time() . '_' . $pdf->getClientOriginalName();
                $pdf->move(public_path('/asset'), $pdfName);
                $pdfpath = 'asset/' . $pdfName;
            } else {
                $pdfpath = null;
            }

            // Specify path to the existing pdf
            $pdfW = new Pdf($pdfpath);

            // Specify path to image. The image must have a 96 DPI resolution.
            $watermark = new ImageWatermark('front/imgs/logowatermark.png'); 

            // Create a new watermarker
            $watermarker = new PDFWatermarker($pdfW, $watermark); 
            
            // Save the new PDF to its specified location
            $watermarker->save($pdfpath);
            
            $materi->update($data);
            DB::commit();

            return redirect()->route('materi_view_index')->with('message', 'Materi berhasil di edit!');
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->route('materi_edit_view', $id)->with('error_message', $exception->getMessage());
        }
    }

    function delete($id)
    {
        DB::beginTransaction();
        try {
            MateriModel::find($id)->delete();
            DB::commit();
            return response([
                'status' => true,
                'message' => 'Delete materi success',
                'data' => null
            ]);
        } catch (\Exception $exception) {
            DB::rollback();
            return response([
                'status' => false,
                'message' => 'Delete materi failed',
                'error' => $exception->getMessage()
            ]);
        }
    }
}