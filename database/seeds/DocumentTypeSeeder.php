<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DocumentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $document_type = new \App\DocumentType();
        $document_type->name    = Str::random(60);
        $document_type->save();

        $document_type = new \App\DocumentType();
        $document_type->name    = Str::random(60);

        $document_type->save();
    }
}
