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
            CREATE TRIGGER subtract_stock_trigger
            AFTER UPDATE ON borrow_requests
            FOR EACH ROW
            BEGIN
                IF NEW.status = \'approved\' AND NEW.amount_borrowed > 0 THEN
                    UPDATE assets
                    SET stock = stock - NEW.amount_borrowed
                    WHERE id = NEW.asset_id;
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
        DB::unprepared('DROP TRIGGER IF EXISTS insert_pic');
    }
}
