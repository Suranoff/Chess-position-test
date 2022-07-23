<?php

namespace App;

class Migration
{
    /**
     * @throws \Exception
     */
    public function up()
    {
        DB::getInstance()->import();
    }

    /**
     * @throws \Exception
     */
    public function down()
    {
        DB::getInstance()->delete('position');
    }
}