<?php

namespace App\Http\Controllers;

use App\Models\Dog;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Log\Logger;
use Illuminate\View\View;

class DogController extends Controller
{
    protected Dog $dog;
    protected Logger $logger;

    public function __construct(Dog $dog, Logger $logger)
    {
        $this->dog = $dog;
        $this->logger = $logger;
    }

    public function create(): View
    {
        return view('dog.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $redirect = redirect()->route('dogs.create');

        $validated = $request->validate([
            'name' => 'required|min:2|max:255',
            'birth_date' => 'required|date',
            'is_birth_date_exact' => 'boolean'
        ]);

        try {
            $this->dog->create($validated);
        } catch (Exception $e) {
            $this->logger->error('Error during dog creation: ' . $e->getMessage());

            return $redirect->withErrors('An error occurred while creating the dog. Please try again.');
        }

        return $redirect->with('success', 'Dog created successfully');
    }
}
