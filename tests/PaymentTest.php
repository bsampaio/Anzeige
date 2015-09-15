<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Payment;

class PaymentTest extends TestCase
{

    use DatabaseTransactions;
    
    private $faker;
    
    public function __construct() 
    {
        $this->faker = \Faker\Factory::create();
    }
    
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testShouldSaveCorrectDates()
    {
        
        $payment = $this->createPayment();
        
        $this->assertNotEmpty($payment->due_date);
        $this->assertNotEmpty($payment->paid_date);
    }
    
    
    /**
     * Creates and returns a new Payment.
     *
     * @return App\Payment
     */
    private function createPayment()
    {
        return App\Payment::create([
            'metatype_id' => $this->getMetaType()['id'],
            'due_date'    => \Carbon\Carbon::now()->format('d/m/Y'),
            'value'       => $this->faker->randomFloat(2, 0.01, 99999999999.99),
            'paid_date'   => \Carbon\Carbon::now()->format('d/m/Y'),
            'description' => $this->faker->paragraph(3)
        ]);
    }
    
    /**
     * Return a MetaType or creates if not exists
     *
     * @return App\MetaType
     */
    private function getMetaType()
    {
        $metatype = App\MetaType::all(['id'])->toArray();
        if(!count($metatype)){
            $metatype = factory(App\MetaType::class)->create();
            return $metatype;
        }
        return $this->faker->randomElement($metatype);
    }
}
