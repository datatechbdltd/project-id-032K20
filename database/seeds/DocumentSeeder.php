<?php

use Illuminate\Database\Seeder;

class DocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $document = new \App\Document();
        $document->user_id    = 2;
        $document->document    = "Nidssdd";
        $document->document_type_id    = 1;
        $document->save();

        $document = new \App\Document();
        $document->user_id    = 3;
        $document->document    = "Nidssfgdgddd";
        $document->document_type_id    = 2;
        $document->save();

        $document = new \App\Document();
        $document->user_id    = 2;
        $document->document    = "Nidsgfdfsdd";
        $document->document_type_id    = 2;
        $document->save();
    }
}
