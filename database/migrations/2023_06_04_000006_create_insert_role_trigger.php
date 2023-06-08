<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Migrations\Migration;

class CreateInsertRoleTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
        CREATE TRIGGER insert_user_role
        AFTER INSERT ON users
        FOR EACH ROW
        BEGIN
            IF NEW.role = \'borrower\' THEN
                INSERT INTO borrowers (user_id, created_at, updated_at)
                VALUES (NEW.id, NOW(), NOW());
            END IF;

            IF NEW.role = \'supervisor\' THEN
                INSERT INTO supervisors (user_id, created_at, updated_at)
                VALUES (NEW.id, NOW(), NOW());
            END IF;

            IF NEW.role = \'admin\' THEN
                INSERT INTO admins (user_id, created_at, updated_at)
                VALUES (NEW.id, NOW(), NOW());
            END IF;

            IF NEW.role = \'pic\' THEN
                INSERT INTO people_in_charge (user_id, created_at, updated_at)
                VALUES (NEW.id, NOW(), NOW());
            END IF;
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
