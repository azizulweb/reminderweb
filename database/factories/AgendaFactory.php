<?php

namespace Database\Factories;

use App\Models\Agenda;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Agenda>
 */
class AgendaFactory extends Factory
{
    protected $model = Agenda::class;

    public function definition()
    {
        return [
            'user_id' => $this->faker->randomElement([1, 4, 5]),
            'nama_kegiatan' => $this->faker->sentence(3),
            'deskripsi_singkat' => $this->faker->paragraph,
            'tanggal_kegiatan' => Carbon::now()->addDays(rand(1, 30)), // tanggal acak di masa depan
            'time_start' => $this->faker->time(),
            'time_end' => $this->faker->time(),
            'is_done' => $this->faker->boolean(),
        ];
    }
}
