<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Migrations\Migration;

class CreateAdminTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
           CREATE TRIGGER insert_admin
           AFTER INSERT ON users
           FOR EACH ROW
           BEGIN
               IF NEW.role = "admin" THEN
                   INSERT INTO admins (user_id, created_at, updated_at)
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
        DB::unprepared('DROP TRIGGER IF EXISTS insert_admin');
    }
}
