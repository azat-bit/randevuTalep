<?php

namespace App\Repository;

use App\Models\Document;
use App\Repository\BaseRepository;

class DocumentRepository extends BaseRepository
{
    protected $model;

    public function __construct(Document $document)
    {
        $this->model = $document;
    }

    // Belirli bir belgeyi ID'ye göre getir
    public function getDocumentById($id)
    {
        return $this->model->find($id);
    }

    // Tüm belgeleri getir
    public function getAllDocuments()
    {
        return $this->model->all();
    }

    // Kullanıcı ID'sine göre belgeleri getir
    public function getDocumentsByUserId($id)
    {
        return $this->model->where('user_id', $id)->get();
    }

    // Yeni bir belge oluştur
    public function create(array $data)
    {
        return $this->model->create($data);
    }

    // Kullanıcı ID'sine göre belge sayısını al
    public function countByUserId($id)
    {
        return $this->model->where('user_id', $id)->count();
    }

    // Belgeyi ID'ye göre sil
    public function deleteById($id)
    {
        $document = $this->model->find($id);
        if ($document) {
            return $document->delete();
        }
        return false;
    }

    // Belgeyi ID'ye göre güncelle
    public function updateById($id, array $data)
    {
        $document = $this->model->find($id);
        if ($document) {
            $document->update($data);
            return $document;
        }
        return null;
    }
}
