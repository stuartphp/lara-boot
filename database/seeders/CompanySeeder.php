<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Company;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Company::create([
            'attela_reference'=>'12345',
            'user_id'=>1,
            'trading_name'=>'Demo Company',
            'registered_as'=>'Investment 123 Pty (Ltd)',
            'registration_number'=>'123456',
            'vat_number'=>'123456',
            'contact_name'=>'The Boss',
            'contact_number'=>'0821234567',
            'email'=>'super@demo.com',
            'physical_address'=>'123 Test street',
            'postal_address'=>'PO.Box 123',
            'domain'=>null,
            'url_contact_us'=>null,
            'url_terms_and_conditions'=>null,
            'url_privacy_policy'=>null,
            'slogan'=>null,
            'document_logo'=>null,
            'website_logo'=>null,
        ]);
    }
}
