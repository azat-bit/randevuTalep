<?php

namespace App\Http\Controllers;

use App\Services\HizmetService;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    protected $serviceService;
    public function __construct(HizmetService $serviceService){
        $this->serviceService = $serviceService;
    }
    public function index() {
        $services = $this->serviceService->getAllServices();
        return view('services');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
        ]);
        $this->serviceService->createService($request->all());
        return redirect()->route('services.index')->with('success', 'Service created successfully');
    }
    public function update($id, Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
        ]);
        $this->serviceService->updateService($id, $request->all());
        return redirect()->route('services.index')->with('success', 'Service updated successfully');
    }

    public function destroy($id)
    {

        $this->serviceService->deleteService($id);
        return redirect()->route('services.index')->with('success', 'Service deleted successfully');
    }
    public function destroy1()
    {
        try {
            $services = $this->serviceService->getAllServices();
            if (!$services) {
                return response()->json(['message' => 'Product not found'], 404);
            }
            return response()->json([
                'message' => 'Servisler listelendi',
                'data' => $services
            ], 200);
        } catch (\Exception $e) {

            return response()->json([
                'message' => 'Bir hata oluştu',
                'error' => $e->getMessage()
            ], 500);
        }
    }

}
