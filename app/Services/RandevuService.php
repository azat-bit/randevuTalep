<?php

namespace App\Services;
use App\Repository\RandevuRepository;

class RandevuService{
    protected $randevuRepository;

    public function __construct(RandevuRepository $randevuRepository){
        $this->randevuRepository = $randevuRepository;
    }
    public function getRandevuByid($id){
        return $this->randevuRepository->getRandevuById($id);
    }
    public function getRandevu(){  
        $test =  $this->randevuRepository->getRandevu();
        return  $test ;
    }
    public function getRandevuByUserId($userId)
    {
        $test = $this->randevuRepository->getRandevuByUserId($userId);
        return $test;
    }

    public function create($data){
        return $this->randevuRepository->create($data);
    }
    public function count($id){
        return $this->randevuRepository->count($id);
    }
        
}