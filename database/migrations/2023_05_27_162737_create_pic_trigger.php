<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Migrations\Migration;

class CreatePICTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
           CREATE TRIGGER insert_pic
           AFTER INSERT ON users
           FOR EACH ROW
           BEGIN
               IF NEW.role = "people_in_charge" THEN
                   INSERT INTO people_in_charge (user_id, created_at, updated_at)
                   VALUES (NEW.user_id, NOW(), NOW());
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
        DB::unprepared('DROP TRIGGER IF EXISTS insert_pic');
    }
}
