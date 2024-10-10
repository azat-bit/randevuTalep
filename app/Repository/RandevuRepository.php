<?php

namespace App\Repository;
use App\Models\Randevu;
use App\Repository\BaseRepository;

class RandevuRepository extends BaseRepository
{
    protected $model;

    public function __construct(Randevu $randevu)
    {
        $this->model = $randevu;
    }
    public function getRandevuById($id)
    {
        return $this->model->find($id);
    }

    public function getRandevu()
    {
        return $this->model->all();
    }
    public function getRandevuByUserId($id)
    {
        return $this->model->where('user_id', $id)->get();
    }
    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function count($id){
        return $this->model->where('user_id', $id)->count();
    }
    public function deleteById($id)
    {
        $randevu = $this->model->find($id);
        if ($randevu) {
            return $randevu->delete();
        }
        return false;
    }
    public function updateById($id, array $data)
    {
        $randevu = $this->model->find($id);
        if ($randevu) {
            $randevu->update($data);
            return $randevu;
        }
        return null;
    }
}
