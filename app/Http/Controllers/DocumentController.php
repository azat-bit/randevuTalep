<?php

namespace App\Http\Controllers;

use App\Services\DocumentService;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    protected $documentService;

    public function __construct(DocumentService $documentService)
    {
        $this->documentService = $documentService;
    }

    // Tüm belgeleri listele
    public function index()
    {
        // DocumentService'den tüm dökümantasyonları al
        $documents = $this->documentService->getAllDocuments();

        // documents.index Blade görünümüne gönder
        return view('document.index', compact('documents'));
    }

    public function create($id)
    {
        return view('document.create', compact('id'));
    }
    // Yeni belge oluştur
  // DocumentController.php
public function store(Request $request)
{
    // Gelen verileri doğrula
    $validatedData = $request->validate([
        'title' => 'required|string|max:255',
        'user_id' => 'required|integer',
        'description' => 'nullable|string|max:1000',
        'file_path' => 'required|file', // 'file' doğrulaması
    ]);

    try {
        // Dosya yükleme işlemi
        if ($request->hasFile('file_path')) {
            // Dosyanın yolunu belirleyin ve yükleyin
            $filePath = $request->file('file_path')->store('documents', 'public'); 
            $validatedData['file_path'] = $filePath; // Dosya yolunu veritabanına kaydetmek için
        } else {
            return response()->json(['error' => 'Dosya eksik.'], 400);
        }

        // DocumentService kullanarak yeni bir document oluştur
        $document = $this->documentService->createDocument($validatedData);

        // Başarılı yanıt döndür
        return response()->json([
            'message' => 'Belge başarıyla oluşturuldu!',
            'document' => $document
        ]);
    } catch (\Exception $e) {
        // Hata durumunda yanıt döndür
        return response()->json(['error' => 'Bir hata oluştu: ' . $e->getMessage()], 500);
    }
}

    // Belgeyi göster
    public function show($id)
    {
        $document = $this->documentService->getDocumentById($id);
        if (!$document) {
            return response()->json(['message' => 'Document not found'], 404);
        }
        return response()->json($document);
    }

    // Belgeyi güncelle
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'title' => 'sometimes|string|max:255',
            'file_path' => 'sometimes|string',
            'description' => 'nullable|string',
        ]);

        $document = $this->documentService->updateDocumentById($id, $data);
        if (!$document) {
            return response()->json(['message' => 'Document not found or not updated'], 404);
        }
        return response()->json($document);
    }

    // Belgeyi sil
    public function destroy($id)
    {
        $result = $this->documentService->deleteDocumentById($id);
        if (!$result) {
            return response()->json(['message' => 'Document not found or not deleted'], 404);
        }
        return response()->json(['message' => 'Document deleted successfully']);
    }
}
