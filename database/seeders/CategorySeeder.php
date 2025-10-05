<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $categories = [
            ['nama' =>'Paracetamol','kode' =>'PL'],
            ['nama' =>'ObatBatukBerdahak','kode' =>'OBB'],
            ['nama' =>'ObatMaag','kode' =>'OMA'],
            ['nama' =>'AlkesBerJarum','kode' =>'ABJ'],
            ['nama' =>'AlkesDigital','kode' =>'ADG'],
            ['nama' =>'AlkesSekaliPakai','kode' =>'ASP'],

        ];

        foreach ($categories as $kategori) {
            Category::create($kategori);
        }
    }
}
