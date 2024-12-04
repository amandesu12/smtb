<?php

namespace App\Http\Controllers;

use App\Models\Fruit;
use Illuminate\Http\Request;
use App\Http\Requests\FruitRequest;
use Illuminate\Validation\Rule;

class FruitController extends Controller
{
    // Index Function
    
    public function index(){
        $fruits = Fruit::all();
        return view('fruits.index', compact('fruits'));
    }


    // Store Function
    public function store(FruitRequest $request){
        // Validasi Data
        $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                'regex:/^[a-zA-Z\s]+$/', // Hanya huruf dan spasi
                'unique:fruits,name',   // Nama harus unik
            ],
            'price' => 'required|integer|min:1000', // Harga minimal 1000
            'stock' => 'required|boolean',          // Hanya boolean
        ]);
    
        Fruit::create($request->all());
    
        return redirect('/')->with('success', 'Buah berhasil ditambahkan!');
        }

        // Edit Function
        public function edit($id){
            $fruit = Fruit::findOrFail($id);
            return view('fruits.edit', compact('fruit'));
            }

        // Update Function
        public function update(FruitRequest $request, $id){
            // Validasi Data
            $request->validate([
                'name' => [
                    'required',
                    'string',
                    'max:255',
                    'regex:/^[a-zA-Z\s]+$/', // Hanya huruf dan spasi
                    Rule::unique('fruits', 'name')->ignore($id), // Unik kecuali untuk ID yang sedang diedit
                ],
                'price' => 'required|integer|min:1000', // Harga minimal 1000
                'stock' => 'required|boolean',          // Hanya boolean
            ]);

            // array ke dua validasi
            $request->validate([
                'name' => [
                    'required',
                    'string',
                    'max:255',
                    'regex:/^[a-zA-Z\s]+$/',
                    'unique:fruits,name',
                ],
                'price' => 'required|integer|min:1000',
                'stock' => 'required|boolean',
            ], [
                'name.required' => 'Nama buah wajib diisi.',
                'name.string' => 'Nama buah harus berupa teks.',
                'name.regex' => 'Nama buah hanya boleh berisi huruf dan spasi.',
                'name.unique' => 'Nama buah sudah ada dalam database.',
                'price.required' => 'Harga buah wajib diisi.',
                'price.integer' => 'Harga buah harus berupa angka.',
                'price.min' => 'Harga buah harus minimal Rp 1000.',
                'stock.required' => 'Stok buah wajib diisi.',
                'stock.boolean' => 'Stok hanya boleh bernilai 1 (tersedia) atau 0 (habis).',
            ]);
            
        
            $fruit = Fruit::findOrFail($id);
            $fruit->update($request->all());
        
            return redirect()->route('fruits.index')->with('success', 'Buah berhasil diperbarui!');
        }

        //Delete Data
        public function destroy($id){
            $fruits = Fruit::findOrFail($id);
            $fruits->delete();

            return redirect('/')->with('success', 'Fruit Deleted Successfully');
        }

        // Search Data
        public function search(Request $request){
            $query = $request->input('query');
            $fruits = Fruit::where('name', 'LIKE', '%' . $query . '%')->get();

            return view('fruits.index', compact('fruits'));
        }
        
}