<?php

use Illuminate\Database\Seeder;

class DocumentTypeAndUserTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $doc_type_and_user_type = new \App\DocumentTypesAndUserTypes();
        $doc_type_and_user_type->user_type_id    = 1;
        $doc_type_and_user_type->document_type_id    = 1;
        $doc_type_and_user_type->save();

        $doc_type_and_user_type = new \App\DocumentTypesAndUserTypes();
        $doc_type_and_user_type->user_type_id    = 1;
        $doc_type_and_user_type->document_type_id    = 2;
        $doc_type_and_user_type->save();

        $doc_type_and_user_type = new \App\DocumentTypesAndUserTypes();
        $doc_type_and_user_type->user_type_id    = 2;
        $doc_type_and_user_type->document_type_id    = 2;
        $doc_type_and_user_type->save();

        $doc_type_and_user_type = new \App\DocumentTypesAndUserTypes();
        $doc_type_and_user_type->user_type_id    = 2;
        $doc_type_and_user_type->document_type_id    = 1;
        $doc_type_and_user_type->save();

    }
}
