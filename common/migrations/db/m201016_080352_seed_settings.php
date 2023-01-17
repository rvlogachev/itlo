<?php

use yii\db\Migration;

/**
 * Class m201016_080352_seed_settings
 */
class m201016_080352_seed_settings extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
	    $this->insert('{{%med_settings}}', [
		    'reference_temp_ot' => 0,
		    'reference_temp_do' => 36.6,
		    'reference_bpp_up_ot' => 110,
		    'reference_bpp_up_do' => 130,
		    'reference_bpp_lower_ot' =>75,
		    'reference_bpp_lower_do' => 85,
		    'reference_bpp_pulse_ot' => 50,
		    'reference_bpp_pulse_do' => 80,
		    'reference_alco_ot' =>0,
		    'reference_alco_do' =>0.018,
		    'user_id' => 1,
		    'rate' => 100,
		    'all_phone' => '+7(956) 464-00-00',
		    'printer_count' => 1333,

	    ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
	    $this->delete('{{%med_settings}}', [
		    'user_id' => [1]
	    ]);
    }


}
