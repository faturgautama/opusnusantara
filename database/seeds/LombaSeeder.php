<?php

use Illuminate\Database\Seeder;
use App\Lomba;
class LombaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        for($i=0;$i<10;$i++){
            $lomba = new Lomba();
            $lomba->organizer_id = "0";
            $lomba->name = $faker->word;
            $lomba->description = $faker->text($maxNBChars = 150);
            $lomba->poster = $faker->imageUrl($width = 620, $height = 877);
            $lomba->tanggal_start_pendaftaran = $faker->date($format = 'Y-m-d', $max ='+5 years');
            $lomba->tanggal_end_pendaftaran = $faker->date($format = 'Y-m-d', $max ='+5 years');
            $lomba->type = "kelas";
            $lomba->save();
        }
    }
}