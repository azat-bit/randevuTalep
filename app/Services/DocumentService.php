<?php

namespace App\Services;

use App\Repository\DocumentRepository;

class DocumentService
{
    protected $documentRepository;

    public function __construct(DocumentRepository $documentRepository)
    {
        $this->documentRepository = $documentRepository;
    }

    // Belirli bir belgeyi ID'ye göre getir
    public function getDocumentById($id)
    {
        return $this->documentRepository->getDocumentById($id);
    }

    // Tüm belgeleri getir
    public function getAllDocuments()
    {
        return $this->documentRepository->getAllDocuments();
    }

    // Belirli bir kullanıcıya ait belgeleri getir
    public function getDocumentsByUserId($userId)
    {
        return $this->documentRepository->getDocumentsByUserId($userId);
    }

    // Yeni bir belge oluştur
    public function createDocument(array $data)
    {
        // İş mantığı burada olabilir, örneğin dosya boyut kontrolü
        return $this->documentRepository->create($data);
    }

    // Belirli bir kullanıcıya ait belge sayısını getir
    public function countDocumentsByUserId($userId)
    {
        return $this->documentRepository->countDocumentsByUserId($userId);
    }

    // Belgeyi ID'ye göre sil
    public function deleteDocumentById($id)
    {
        return $this->documentRepository->deleteById($id);
    }

    // Belgeyi ID'ye göre güncelle
    public function updateDocumentById($id, array $data)
    {
        return $this->documentRepository->updateById($id, $data);
    }
}
