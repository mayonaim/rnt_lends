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
            CREATE TRIGGER subtract_stock_trigger
            AFTER INSERT ON borrow_requests
            FOR EACH ROW
            BEGIN
                CASE
                    WHEN NEW.status = \'approved\' AND NEW.amount_borrowed > 0 THEN
                        UPDATE assets
                        SET stock = stock - NEW.amount_borrowed
                        WHERE id = NEW.asset_id;
                    WHEN NEW.status = \'finished\' THEN
                        UPDATE assets
                        SET stock = stock + NEW.amount_borrowed
                        WHERE id = NEW.asset_id;
                END CASE;
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
        DB::unprepared('DROP TRIGGER IF EXISTS subtract_stock_trigger');
    }
}
