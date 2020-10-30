<?php

use Illuminate\Database\Seeder;
use App\Cliente;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cliente::create([
            'ruc' => '20506675457',
            'rsocial' => 'MINERA CHINALCO PERÚ S.A.',
            'direccion' => 'AV. EL DERBY NRO. 250 URB. EL DERBY (PISO 20) LIMA - LIMA - SANTIAGO DE SURCO',
        ]);

        Cliente::create([
            'ruc' => '20100017572',
            'rsocial' => 'SOCIEDAD MINERA EL BROCAL S.A.A.',
            'direccion' => 'CAL.LAS BEGONIAS NRO. 415 INT. P-19 (RECEPCION PISO 19) LIMA - LIMA - SAN ISIDRO',
        ]);

        Cliente::create([
            'ruc' => '20114915026',
            'rsocial' => 'COMPAÑIA MINERA ANTAPACCAY S.A.',
            'direccion' => 'CAMPAMENTO MINERO TINTAYA NRO. SN CAMPAMENTO MINERO TINTAYA (KM.5 YAURI CARRETERA CUSCO AREQUIPA) CUSCO - ESPINAR - ESPINAR',
        ]);
    }
}
