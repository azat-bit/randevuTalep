<?php

namespace App\Services;

use App\Repository\ServiceRepository;

class HizmetService
{
    protected $serviceRepository;

    public function __construct(ServiceRepository $serviceRepository)
    {
        $this->serviceRepository = $serviceRepository;
    }

    /**
     * Tüm hizmetleri getir.
     */
    public function getAllServices()
    {
        return $this->serviceRepository->all();
    }

    /**
     * Yeni bir hizmet oluştur.
     */
    public function createService(array $data)
    {
        return $this->serviceRepository->create($data);
    }

    /**
     * Belirli bir hizmeti güncelle.
     */
    public function updateService($id, array $data)
    {
        $service = $this->serviceRepository->find($id);
        if ($service) {
            return $this->serviceRepository->update($service, $data);
        }

        return null;  // Bulunamadıysa
    }

    /**
     * Belirli bir hizmeti sil.
     */
    public function deleteService($id)
    {
        return $this->serviceRepository->delete($id);
    }

    // İhtiyaçlarınıza göre başka iş mantığı fonksiyonları ekleyin.
}
