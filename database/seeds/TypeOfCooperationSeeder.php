

 <?php

use Illuminate\Database\Seeder;
use App\TypeOfCooperation;
use App\TypeOfCooperationOneDerivative;
use App\TypeOfCooperationTwoDerivative;

class TypeOfCooperationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $typOfCoop1 = TypeOfCooperation::create([
            'created_by' => 1,
            'updated_by' => 1,
            'name' => 'Permohonan Bantuan Dana'
        ]);

        $typOfCoop2 = TypeOfCooperation::create([
            'created_by' => 1,
            'updated_by' => 1,
            'name' => 'Kerja Sama Substansi'
        ]);

        $typeOfCoopOneDerivative1 = $typOfCoop2->typeOfCooperationOneDerivative()->create([
            'created_by' => 1,
            'updated_by' => 1,
            'name' => 'Luar Negeri'
        ]);

        TypeOfCooperationTwoDerivative::create([
            'type_of_cooperation_id' => 2,
            'type_of_cooperation_one_derivative_id' => $typeOfCoopOneDerivative1->id,
            'created_by' => 1,
            'updated_by' => 1,
            'name' => 'Nota Kesepahaman'
        ]);

        $typeOfCoopOneDerivative2 =  $typOfCoop2->typeOfCooperationOneDerivative()->create([
            'created_by' => 1,
            'updated_by' => 1,
            'name' => 'Dalam Negeri'
        ]);

        TypeOfCooperationTwoDerivative::create([
            'type_of_cooperation_id' => 2,
            'type_of_cooperation_one_derivative_id' => $typeOfCoopOneDerivative2->id,
            'created_by' => 1,
            'updated_by' => 1,
            'name' => 'PKS'
        ]);

        TypeOfCooperationTwoDerivative::create([
            'type_of_cooperation_id' => 2,
            'type_of_cooperation_one_derivative_id' => $typeOfCoopOneDerivative2->id,
            'created_by' => 1,
            'updated_by' => 1,
            'name' => 'Perpanjangan'
        ]);

        TypeOfCooperationTwoDerivative::create([
            'type_of_cooperation_id' => 2,
            'type_of_cooperation_one_derivative_id' => $typeOfCoopOneDerivative2->id,
            'created_by' => 1,
            'updated_by' => 1,
            'name' => 'Lainnya'
        ]);
    }
}
