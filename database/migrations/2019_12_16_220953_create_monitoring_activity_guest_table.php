
  <?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMonitoringActivityGuestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monitoring_activity_guest', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('submission_proposal_guest_id');
            $table->string('title_activity')->nullable();
            $table->date('implementation_date')->nullable();
            $table->string('location')->nullable();
            $table->text('description_activities')->nullable();
            // $table->text('problem_solving')->nullable();
            // $table->text('report')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('monitoring_activity_guest');
    }
}
