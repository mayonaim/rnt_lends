<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Migrations\Migration;

class CreateSupervisorTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
           CREATE TRIGGER insert_supervisor
           AFTER INSERT ON users
           FOR EACH ROW
           BEGIN
               IF NEW.role = "supervisor" THEN
                   INSERT INTO supervisors (user_id, created_at, updated_at)
                   VALUES (NEW.id, NOW(), NOW());
               END IF;
           END
       ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER IF EXISTS insert_supervisor');
    }
}
