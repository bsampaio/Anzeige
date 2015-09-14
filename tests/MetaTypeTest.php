<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class MetaTypeTest extends TestCase
{

    use DatabaseTransactions;

    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testShouldSaveAMetaType(){
        $metaType = factory(App\MetaType::class)->create();
        $this->assertNotNull($metaType);
    }

    /**
     * Verifica se o objeto salvo pode ser obtido pelo get
     *
     * @return void
     */
//    public function testShouldFindInJson(){
//        $metaType = factory(App\MetaType::class)->create();
//        $this->get('/metatype',[])
//             ->seeJson($metaType->toArray());
//    }

    
    public function testShouldFindRegistered(){
        $metaType = factory(App\MetaType::class)->create();
        $this->visit('/metatype/'.$metaType->id)
             ->see($metaType->value)
             ->see($metaType->id);
    }

    /**
     * Verifica se o objeto salvo pode ser alterado
     *
     * @return void
     */
    public function testShouldEdit(){
        $oldMetaType = factory(App\MetaType::class)->create();
        $metaType = App\MetaType::findOrFail($oldMetaType->id);
        $metaType->value = 'Another Value';
        $metaType->save();
        $metaType = App\MetaType::findOrFail($oldMetaType->id);

        $this->assertNotEquals($oldMetaType->value, $metaType->value);
    }
}
