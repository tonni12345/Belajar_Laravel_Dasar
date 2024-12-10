<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FileControllerTest extends TestCase
{
   public function testUpload()
   {
        $picture = UploadedFile::fake()->image("tonni.png");

        $this->post('/file/upload', [
            "picture" => $picture
        ]);
   }
}
