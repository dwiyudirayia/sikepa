

 <?php

use App\SubmissionType;
use App\TypeOfCooperationOneDerivative;
use Illuminate\Database\Seeder;
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
        // $submissionType1 = SubmissionType::create([
        //     'created_by' => 1,
        //     'updated_by' => 1,
        //     'name' => 'PKS',
        // ]);
        // $submissionType2 = SubmissionType::create([
        //     'created_by' => 1,
        //     'updated_by' => 1,
        //     'name' => 'MOU',
        // ]);

        // $submissionType1->typeCooperation()->create([
        //     'created_by' => 1,
        //     'updated_by' => 1,
        //     'name' => 'Permohonan Bantuan Dana',
        // ]);

        // $submissionType2->typeCooperation()->create([
        //     'created_by' => 1,
        //     'updated_by' => 1,
        //     'name' => 'Permohonan Bantuan Dana',
        // ]);

        // $typeOfCoop1 = $submissionType1->typeCooperation()->create([
        //     'created_by' => 1,
        //     'updated_by' => 1,
        //     'name' => 'Kerja Sama Substansi'
        // ]);

        // $typeOfCoop2 = $submissionType2->typeCooperation()->create([
        //     'created_by' => 1,
        //     'updated_by' => 1,
        //     'name' => 'Kerja Sama Substansi'
        // ]);

        // $typeOfCoopOneDerivative1 = $typeOfCoop1->typeOfCooperationOneDerivative()->create([
        //     'created_by' => 1,
        //     'updated_by' => 1,
        //     'name' => 'Luar Negeri'
        // ]);

        $typeOfCooperationOne1 = TypeOfCooperationOneDerivative::create([
            'created_by' => 1,
            'updated_by' => 1,
            'name' => 'Luar Negeri'
        ]);

        // TypeOfCooperationTwoDerivative::create([
        //     'type_of_cooperation_one_derivative_id' => $typeOfCoopOneDerivative1->id,
        //     'created_by' => 1,
        //     'updated_by' => 1,
        //     'name' => 'Nota Kesepahaman'
        // ]);
        $typeOfCooperationOne1->typeOfCooperationTwoDerivative()->create([
            'created_by' => 1,
            'updated_by' => 1,
            'name' => 'Nota Kesepahaman'
        ]);

        // $typeOfCoopOneDerivative1 =  $typeOfCoop1->typeOfCooperationOneDerivative()->create([
        //     'created_by' => 1,
        //     'updated_by' => 1,
        //     'name' => 'Dalam Negeri'
        // ]);

        $typeOfCooperationOne2 = TypeOfCooperationOneDerivative::create([
            'created_by' => 1,
            'updated_by' => 1,
            'name' => 'Dalam Negeri'
        ]);

        // TypeOfCooperationTwoDerivative::create([
        //     'type_of_cooperation_one_derivative_id' => $typeOfCoopOneDerivative1->id,
        //     'created_by' => 1,
        //     'updated_by' => 1,
        //     'name' => 'PKS'
        // ]);

        // TypeOfCooperationTwoDerivative::create([
        //     'type_of_cooperation_one_derivative_id' => $typeOfCoopOneDerivative1->id,
        //     'created_by' => 1,
        //     'updated_by' => 1,
        //     'name' => 'Perpanjangan'
        // ]);

        // TypeOfCooperationTwoDerivative::create([
        //     'type_of_cooperation_one_derivative_id' => $typeOfCoopOneDerivative1->id,
        //     'created_by' => 1,
        //     'updated_by' => 1,
        //     'name' => 'Lainnya'
        // ]);

        TypeOfCooperationTwoDerivative::create([
            'type_of_cooperation_one_derivative_id' => $typeOfCooperationOne2->id,
            'created_by' => 1,
            'updated_by' => 1,
            'name' => 'MOU'
        ]);

        TypeOfCooperationTwoDerivative::create([
            'type_of_cooperation_one_derivative_id' => $typeOfCooperationOne2->id,
            'created_by' => 1,
            'updated_by' => 1,
            'name' => 'Perpanjangan'
        ]);

        TypeOfCooperationTwoDerivative::create([
            'type_of_cooperation_one_derivative_id' => $typeOfCooperationOne2->id,
            'created_by' => 1,
            'updated_by' => 1,
            'name' => 'Adendum'
        ]);
    }
}
