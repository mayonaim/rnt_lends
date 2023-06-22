<?php

use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    public function up()
    {
        DB::unprepared('
            CREATE TRIGGER update_asset_stock
            AFTER UPDATE ON borrow_requests
            FOR EACH ROW
            BEGIN
                IF NEW.status = "finished" THEN
                    UPDATE assets
                    SET stock = stock + OLD.amount_borrowed
                    WHERE id = OLD.asset_id;
                END IF;

                IF NEW.status = "approved" AND NEW.amount_borrowed > 0 THEN
                    UPDATE assets
                    SET stock = stock - NEW.amount_borrowed
                    WHERE id = NEW.asset_id;
                END IF;
            END
        ');
    }

    public function down()
    {
        DB::unprepared('DROP TRIGGER IF EXISTS update_asset_stock');
    }
};