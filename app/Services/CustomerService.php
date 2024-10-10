<?php

namespace App\Services;

use App\Repository\CustomerRepository;

class CustomerService
{
    protected $customerRepository;

    public function __construct(CustomerRepository $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    // İş mantığı burada tanımlanır.
    public function getAllCustomers()
    {
        return $this->customerRepository->all();
    }

    public function createCustomer(array $data)
    {
        return $this->customerRepository->create($data);
    }

    // Diğer iş mantığı metotları
}
