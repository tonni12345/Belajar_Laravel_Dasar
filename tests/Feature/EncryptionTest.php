<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EncryptionTest extends TestCase
{
   public function testEncryption()
   {
       $encrypt = Crypt::encrypt('Tonni Ramdani');
       var_dump($encrypt);

       $decrypt = Crypt::decrypt($encrypt);

       self::assertEquals("Tonni Ramdani", $decrypt);
   }
}
