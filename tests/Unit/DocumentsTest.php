<?php

namespace Tests\Unit;

use App\Models\Document;
use App\Models\Opportunity;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Schema;

class DocumentsTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /** @test */
    public function documents_database_has_expected_columns()
    {
        $this->assertTrue(Schema::hasColumns('documents', [
            'id', "opportunity_id",
            "user_id",
            "description_id",
            "original_name",
            "file_path",
            "description_type"
        ]), 1);
    }

    /** @test */
    public function a_document_can_be_uploaded_for_an_opportunity()
    {
        $opportunity = factory(Opportunity::class)->create();
        $document = factory(Document::class)->create([
            'description_id' => $opportunity->id,
            'description_type' => 'App\Models\Opportunity'
        ]);

        $this->assertInstanceOf(Opportunity::class, $document->description);
    }

    /**
     * @test
     */
    public function a_document_can_be_uploaded_by_user()
    {
        $opportunity = factory(Opportunity::class)->create();
        $document = factory(Document::class)->create([
            'description_id' => $opportunity->id,
            'description_type' => 'App\Models\Opportunity'
        ]);
        $this->assertInstanceOf(User::class, $document->uploadedBy);
    }
}
