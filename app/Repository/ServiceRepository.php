<?php

namespace App\Repository;

use App\Models\Hizmet;

class ServiceRepository extends BaseRepository
{
    // Service modelini kullanarak BaseRepository'den miras alıyoruz
    public function __construct(Hizmet $service)
    {
        parent::__construct($service);
    }


}
