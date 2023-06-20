<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Migrations\Migration;

class CreateSubtractStockTrigger extends Migration
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
                IF NEW.status = \'approved\' AND NEW.amount_borrowed > 0 THEN
                    UPDATE assets
                    SET stock = stock - NEW.amount_borrowed
                    WHERE id = NEW.asset_id;
                ELSEIF NEW.status = \'finished\' THEN
                    UPDATE assets
                    SET stock = stock + NEW.amount_borrowed
                    WHERE id = NEW.asset_id;
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
