<?php

namespace App\Http\Controllers;

use App\Models\UytArticle;
use App\Models\UytContent;
use App\Models\UytFacilitator;
use App\Models\UytResource;
use App\Models\UytStory;
use App\Models\UytVideo;
use App\Models\UytWorkshopRegistration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UytAdminController extends Controller
{
    /**
     * Tampilan Kelola Konten CMS UYT
     */
    public function indexContent()
    {
        $contents = UytContent::all()->keyBy('key');
        return view('admin.uyt.content', compact('contents'));
    }

    /**
     * Update Konten CMS UYT
     */
    public function updateContent(Request $request)
    {
        DB::beginTransaction();
        try {
            foreach ($request->except('_token') as $key => $data) {
                if (is_array($data)) {
                    if ($key === 'stats') {
                        UytContent::updateOrCreate(
                            ['key' => 'stats'],
                            [
                                'title' => 'Statistik Dampak UYT',
                                'content' => json_encode($data),
                            ]
                        );
                    } else {
                        UytContent::updateOrCreate(
                            ['key' => $key],
                            [
                                'title' => $data['title'] ?? null,
                                'subtitle' => $data['subtitle'] ?? null,
                                'content' => $data['content'] ?? null,
                                'video_url' => $data['video_url'] ?? null,
                            ]
                        );
                    }
                }
            }
            DB::commit();
            return redirect()->back()->with('message', 'Konten Use Your Talents berhasil diperbarui!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error_message', 'Gagal memperbarui konten: ' . $e->getMessage());
        }
    }

    /**
     * Daftar Resources Dokumen & Presentasi UYT
     */
    public function indexResource()
    {
        $resources = UytResource::orderBy('order_num', 'asc')->get();
        return view('admin.uyt.resources', compact('resources'));
    }

    public function storeResource(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string',
            'file' => 'nullable|file|mimes:pdf,ppt,pptx,doc,docx,zip|max:20480',
            'description' => 'nullable|string',
        ]);

        $filePath = 'front/documents/sample.pdf';
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/uyt_resources'), $filename);
            $filePath = 'uploads/uyt_resources/' . $filename;
        }

        UytResource::create([
            'title' => $request->title,
            'category' => $request->category,
            'file_path' => $filePath,
            'description' => $request->description,
            'status' => $request->has('status') ? 1 : 0,
        ]);

        return redirect()->back()->with('message', 'Dokumen Resources berhasil ditambahkan!');
    }

    public function deleteResource($id)
    {
        $res = UytResource::findOrFail($id);
        $res->delete();
        return redirect()->back()->with('message', 'Dokumen Resources berhasil dihapus!');
    }

    /**
     * Daftar Fasilitator UYT
     */
    public function indexFacilitator()
    {
        $facilitators = UytFacilitator::orderBy('order_num', 'asc')->get();
        return view('admin.uyt.facilitators', compact('facilitators'));
    }

    public function storeFacilitator(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'testimony' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photoPath = \App\Helpers\ImageCompressionHelper::compressAndSave($request->file('photo'), 'uploads/uyt_facilitators', 800, 78);
        }

        UytFacilitator::create([
            'name' => $request->name,
            'role' => $request->role,
            'location' => $request->location,
            'testimony' => $request->testimony,
            'photo' => $photoPath,
            'status' => 1,
        ]);

        return redirect()->back()->with('message', 'Fasilitator UYT berhasil ditambahkan!');
    }

    public function deleteFacilitator($id)
    {
        $fac = UytFacilitator::findOrFail($id);
        $fac->delete();
        return redirect()->back()->with('message', 'Fasilitator berhasil dihapus!');
    }

    /**
     * Daftar Cerita Masuk dari Komunitas
     */
    public function indexStories()
    {
        $stories = UytStory::orderBy('id', 'desc')->get();
        return view('admin.uyt.stories', compact('stories'));
    }

    public function togglePublishStory($id)
    {
        $story = UytStory::findOrFail($id);
        $story->is_published = !$story->is_published;
        $story->save();

        return redirect()->back()->with('message', 'Status publikasi cerita berhasil diubah!');
    }

    public function deleteStory($id)
    {
        $story = UytStory::findOrFail($id);
        $story->delete();
        return redirect()->back()->with('message', 'Cerita berhasil dihapus!');
    }

    /**
     * Export Data Kiriman Cerita Komunitas ke CSV / Excel
     */
    public function exportStories()
    {
        $fileName = 'Cerita_Komunitas_UYT_' . date('Ymd_His') . '.csv';
        $stories = UytStory::orderBy('id', 'desc')->get();

        $headers = [
            "Content-type" => "text/csv; charset=UTF-8",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0"
        ];

        $columns = [
            'ID', 'Nama Pengirim', 'Email', 'No Telepon / WA', 'Gereja / Lembaga',
            'Judul Cerita', 'Isi Cerita', 'Status Publikasi', 'Tanggal Kirim'
        ];

        $callback = function() use($stories, $columns) {
            $file = fopen('php://output', 'w');
            fputs($file, "\xEF\xBB\xBF");
            fputcsv($file, $columns);

            foreach ($stories as $st) {
                fputcsv($file, [
                    $st->id,
                    $st->name,
                    $st->email,
                    $st->phone ?? '-',
                    $st->organization ?? '-',
                    $st->title,
                    $st->story,
                    $st->is_published ? 'Dipublikasikan' : 'Pending Review',
                    $st->created_at ? $st->created_at->format('d-m-Y H:i') : '-'
                ]);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    /**
     * Daftar Pendaftaran Workshop UYT
     */
    public function indexWorkshops()
    {
        $workshops = UytWorkshopRegistration::orderBy('id', 'desc')->get();
        return view('admin.uyt.workshops', compact('workshops'));
    }

    public function updateWorkshopStatus(Request $request, $id)
    {
        $ws = UytWorkshopRegistration::findOrFail($id);
        $ws->status = $request->status;
        $ws->save();

        return redirect()->back()->with('message', 'Status pendaftaran workshop diperbarui!');
    }

    public function deleteWorkshop($id)
    {
        $ws = UytWorkshopRegistration::findOrFail($id);
        $ws->delete();
        return redirect()->back()->with('message', 'Pendaftaran workshop berhasil dihapus!');
    }

    /**
     * Export Data Pendaftaran Workshop ke CSV / Excel
     */
    public function exportWorkshops()
    {
        $fileName = 'Pendaftaran_Workshop_UYT_' . date('Ymd_His') . '.csv';
        $workshops = UytWorkshopRegistration::orderBy('id', 'desc')->get();

        $headers = [
            "Content-type" => "text/csv; charset=UTF-8",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0"
        ];

        $columns = [
            'ID', 'Nama Pemohon', 'Email', 'No Telepon / WA', 'Nama Lembaga',
            'Kategori Lembaga', 'Kota / Provinsi', 'Jenis Workshop', 'Estimasi Peserta',
            'Rencana Tanggal', 'Pesan / Harapan', 'Status', 'Tanggal Daftar'
        ];

        $callback = function() use($workshops, $columns) {
            $file = fopen('php://output', 'w');
            // Menulis BOM untuk kompatibilitas Excel UTF-8
            fputs($file, "\xEF\xBB\xBF");
            fputcsv($file, $columns);

            foreach ($workshops as $ws) {
                $statusText = 'Menunggu Konfirmasi';
                if ($ws->status == 'contacted') $statusText = 'Sudah Dihubungi';
                elseif ($ws->status == 'scheduled') $statusText = 'Terjadwal';
                elseif ($ws->status == 'completed') $statusText = 'Selesai';
                elseif ($ws->status == 'cancelled') $statusText = 'Dibatalkan';

                fputcsv($file, [
                    $ws->id,
                    $ws->name,
                    $ws->email,
                    $ws->phone,
                    $ws->organization_name,
                    $ws->organization_type,
                    $ws->city,
                    $ws->workshop_type,
                    $ws->estimated_participants,
                    $ws->preferred_date ? date('d-m-Y', strtotime($ws->preferred_date)) : '-',
                    $ws->message,
                    $statusText,
                    $ws->created_at ? $ws->created_at->format('d-m-Y H:i') : '-'
                ]);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    // ================= ARTIKEL KHUSUS UYT ================= //
    public function indexArticles()
    {
        $articles = UytArticle::with('admin')->orderBy('id', 'desc')->get();
        return view('admin.uyt.articles.index', compact('articles'));
    }

    public function addArticleView()
    {
        return view('admin.uyt.articles.add');
    }

    public function storeArticle(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'media' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
        ]);

        DB::beginTransaction();
        try {
            $path = $request->hasFile('media') 
                ? \App\Helpers\ImageCompressionHelper::compressAndSave($request->file('media'), 'uploads/uyt_articles', 1200, 78) 
                : null;

            UytArticle::create([
                'guid' => Str::uuid()->toString(),
                'title' => $request->title,
                'slug' => Str::slug($request->title) . '-' . time(),
                'description' => $request->description,
                'media' => $path,
                'user_id' => Auth::id(),
                'status' => $request->status == 'true' || $request->status == '1' ? 1 : 0,
            ]);

            DB::commit();
            return redirect()->route('admin_uyt_articles')->with('message', 'Artikel UYT berhasil ditambahkan!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error_message', 'Gagal menambahkan artikel: ' . $e->getMessage());
        }
    }

    public function editArticleView($id)
    {
        $article = UytArticle::findOrFail($id);
        return view('admin.uyt.articles.edit', compact('article'));
    }

    public function updateArticle(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'media' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
        ]);

        DB::beginTransaction();
        try {
            $article = UytArticle::findOrFail($id);
            $data = [
                'title' => $request->title,
                'slug' => Str::slug($request->title) . '-' . $article->id,
                'description' => $request->description,
                'status' => $request->status == 'true' || $request->status == '1' ? 1 : 0,
            ];

            if ($request->hasFile('media')) {
                $data['media'] = \App\Helpers\ImageCompressionHelper::compressAndSave($request->file('media'), 'uploads/uyt_articles', 1200, 78);
            }

            $article->update($data);
            DB::commit();
            return redirect()->route('admin_uyt_articles')->with('message', 'Artikel UYT berhasil diperbarui!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error_message', 'Gagal memperbarui artikel: ' . $e->getMessage());
        }
    }

    public function deleteArticle($id)
    {
        $article = UytArticle::findOrFail($id);
        $article->delete();
        return redirect()->back()->with('message', 'Artikel UYT berhasil dihapus!');
    }

    // ================= VIDEO KHUSUS UYT ================= //
    public function indexVideos()
    {
        $videos = UytVideo::with('admin')->orderBy('id', 'desc')->get();
        return view('admin.uyt.videos.index', compact('videos'));
    }

    public function addVideoView()
    {
        return view('admin.uyt.videos.add');
    }

    public function storeVideo(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'url_video' => 'required|string|max:255',
            'description' => 'nullable|string',
            'media' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
        ]);

        DB::beginTransaction();
        try {
            $path = $request->hasFile('media') 
                ? \App\Helpers\ImageCompressionHelper::compressAndSave($request->file('media'), 'uploads/uyt_videos', 1200, 78) 
                : null;

            UytVideo::create([
                'guid' => Str::uuid()->toString(),
                'title' => $request->title,
                'url_video' => $request->url_video,
                'description' => $request->description,
                'media' => $path,
                'user_id' => Auth::id(),
                'status' => $request->status == 'true' || $request->status == '1' ? 1 : 0,
            ]);

            DB::commit();
            return redirect()->route('admin_uyt_videos')->with('message', 'Video UYT berhasil ditambahkan!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error_message', 'Gagal menambahkan video: ' . $e->getMessage());
        }
    }

    public function editVideoView($id)
    {
        $video = UytVideo::findOrFail($id);
        return view('admin.uyt.videos.edit', compact('video'));
    }

    public function updateVideo(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'url_video' => 'required|string|max:255',
            'description' => 'nullable|string',
            'media' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
        ]);

        DB::beginTransaction();
        try {
            $video = UytVideo::findOrFail($id);
            $data = [
                'title' => $request->title,
                'url_video' => $request->url_video,
                'description' => $request->description,
                'status' => $request->status == 'true' || $request->status == '1' ? 1 : 0,
            ];

            if ($request->hasFile('media')) {
                $data['media'] = \App\Helpers\ImageCompressionHelper::compressAndSave($request->file('media'), 'uploads/uyt_videos', 1200, 78);
            }

            $video->update($data);
            DB::commit();
            return redirect()->route('admin_uyt_videos')->with('message', 'Video UYT berhasil diperbarui!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error_message', 'Gagal memperbarui video: ' . $e->getMessage());
        }
    }

    public function deleteVideo($id)
    {
        $video = UytVideo::findOrFail($id);
        $video->delete();
        return redirect()->back()->with('message', 'Video UYT berhasil dihapus!');
    }
}
