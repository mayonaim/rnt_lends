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
        BEGIN
            IF NEW.role = \'borrower\' THEN
                INSERT INTO borrowers (user_id, created_at, updated_at)
                VALUES (NEW.id, NOW(), NOW());
            ELSEIF NEW.role = \'supervisor\' THEN
                INSERT INTO supervisors (user_id, created_at, updated_at)
                VALUES (NEW.id, NOW(), NOW());
            ELSEIF NEW.role = \'admin\' THEN
                INSERT INTO admins (user_id, created_at, updated_at)
                VALUES (NEW.id, NOW(), NOW());
            ELSEIF NEW.role = \'pic\' THEN
                INSERT INTO people_in_charge (user_id, created_at, updated_at)
                VALUES (NEW.id, NOW(), NOW());
        END;
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
