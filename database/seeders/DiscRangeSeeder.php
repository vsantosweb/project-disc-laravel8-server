<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DiscRangeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('disc_ranges')->insert([
            //D
            ['disc_id' => 1, 'range' => str_replace(["\n", "\r", " "], "", '[
                {"intensity":28, "range": ' . json_encode(range(13, 28)) . '},
                {"intensity":27, "range": ' . json_encode(range(11, 12)) . '},
                {"intensity":26, "range": ' . json_encode(range(10, 10)) . '},
                {"intensity":25, "range": ' . json_encode(range(9, 9)) . '}
            ]'), 'segment_id' => 7],

            ['disc_id' => 1, 'range' => str_replace(["\n", "\r", " "], "", '[
                {"intensity":24, "range": ' . json_encode(range(8, 7)) . '},
                {"intensity":23, "range": ' . json_encode(range(6, 6)) . '},
                {"intensity":21, "range": ' . json_encode(range(5, 5)) . '}
            ]'), 'segment_id' => 6],

            ['disc_id' => 1, 'range' =>
            str_replace(["\n", "\r", " "], "", '[
                {"intensity":20, "range": ' . json_encode(range(4, 4)) . '},
                {"intensity":19, "range": ' . json_encode(range(3, 3)) . '},
                {"intensity":17, "range": ' . json_encode(range(2, 2)) . '}
            ]'), 'segment_id' => 5],
            ['disc_id' => 1, 'range' => str_replace(["\n", "\r", " "], "", '[
                {"intensity":16, "range": ' . json_encode(range(1, 1)) . '},
                {"intensity":14, "range": ' . json_encode(range(0, 0)) . '}

            ]'), 'segment_id' => 4],
            ['disc_id' => 1, 'range' => str_replace(["\n", "\r", " "], "", '[
                {"intensity":12, "range": ' . json_encode(range(-1, -1)) . '},
                {"intensity":11, "range": ' . json_encode(range(-2, -2)) . '},
                {"intensity":9, "range": ' . json_encode(range(-3, -3)) . '}
            ]'), 'segment_id' => 3],
            ['disc_id' => 1, 'range' =>str_replace(["\n", "\r", " "], "", '[
                {"intensity":8, "range": ' . json_encode(range(-4, -4)) . '},
                {"intensity":6, "range": ' . json_encode(range(-5, -5)) . '},
                {"intensity":5, "range": ' . json_encode(range(-6, -6)) . '}
            ]'), 'segment_id' => 2],
            ['disc_id' => 1, 'range' => str_replace(["\n", "\r", " "], "", '[
                {"intensity":4, "range": ' . json_encode(range(-7, -8)) . '},
                {"intensity":3, "range": ' . json_encode(range(-9, -9)) . '},
                {"intensity":2, "range": ' . json_encode(range(-10, -24)) . '},
                {"intensity":1, "range": ' . json_encode(range(-25, -28)) . '}
            ]'), 'segment_id' => 1],

            //I
            ['disc_id' => 2, 'range' =>  str_replace(["\n", "\r", " "], "", '[
                {"intensity":28, "range": ' . json_encode(range(14, 28)) . '},
                {"intensity":27, "range": ' . json_encode(range(11, 13)) . '},
                {"intensity":26, "range": ' . json_encode(range(10, 10)) . '},
                {"intensity":25, "range": ' . json_encode(range(9, 9)) . '}
            ]'), 'segment_id' => 7],

            ['disc_id' => 2, 'range' => str_replace(["\n", "\r", " "], "", '[
                {"intensity":24, "range": ' . json_encode(range(8, 8)) . '},
                {"intensity":23, "range": ' . json_encode(range(7, 7)) . '},
                {"intensity":22, "range": ' . json_encode(range(6, 6)) . '},
                {"intensity":21, "range": ' . json_encode(range(5, 5)) . '}
            ]'), 'segment_id' => 6],

            ['disc_id' => 2, 'range' => str_replace(["\n", "\r", " "], "", '[
                {"intensity":19, "range": ' . json_encode(range(4, 4)) . '},
                {"intensity":18, "range": ' . json_encode(range(3, 3)) . '}
            ]'), 'segment_id' => 5],

            ['disc_id' => 2, 'range' => str_replace(["\n", "\r", " "], "", '[
                {"intensity":16, "range": ' . json_encode(range(2, 2)) . '},
                {"intensity":14, "range": ' . json_encode(range(1, 1)) . '},
                {"intensity":13, "range": ' . json_encode(range(0, 0)) . '}
            ]'), 'segment_id' => 4],

            ['disc_id' => 2, 'range' => str_replace(["\n", "\r", " "], "", '[
                {"intensity":11, "range": ' . json_encode(range(-1, -1)) . '},
                {"intensity":9, "range": ' . json_encode(range(-2, -2)) . '}
            ]'), 'segment_id' => 3],

            ['disc_id' => 2, 'range' => str_replace(["\n", "\r", " "], "", '[
                {"intensity":7, "range": ' . json_encode(range(-3, -3)) . '},
                {"intensity":6, "range": ' . json_encode(range(-4, -4)) . '}
            ]'), 'segment_id' => 2],

            ['disc_id' => 2, 'range' => str_replace(["\n", "\r", " "], "", '[
                {"intensity":4, "range": ' . json_encode(range(-5, -5)) . '},
                {"intensity":3, "range": ' . json_encode(range(-6, -7)) . '},
                {"intensity":2, "range": ' . json_encode(range(-8, -25)) . '},
                {"intensity":1, "range": ' . json_encode(range(-26, -28)) . '}

            ]'), 'segment_id' => 1],

            //S
            ['disc_id' => 3, 'range' => str_replace(["\n", "\r", " "], "", '[
                {"intensity":28, "range": ' . json_encode(range(12, 28)) . '},
                {"intensity":27, "range": ' . json_encode(range(11, 11)) . '},
                {"intensity":26, "range": ' . json_encode(range(9, 10)) . '},
                {"intensity":25, "range": ' . json_encode(range(8, 8)) . '}
            ]'), 'segment_id' => 7],

            ['disc_id' => 3, 'range' => str_replace(["\n", "\r", " "], "", '[
                {"intensity":23, "range": ' . json_encode(range(7, 7)) . '},
                {"intensity":22, "range": ' . json_encode(range(6, 6)) . '}
            ]'), 'segment_id' => 6],

            ['disc_id' => 3, 'range' => str_replace(["\n", "\r", " "], "", '[
                {"intensity":20, "range": ' . json_encode(range(5, 5)) . '},
                {"intensity":19, "range": ' . json_encode(range(4, 4)) . '},
                {"intensity":17, "range": ' . json_encode(range(3, 3)) . '}
            ]'), 'segment_id' => 5],

            ['disc_id' => 3, 'range' => str_replace(["\n", "\r", " "], "", '[
                {"intensity":15, "range": ' . json_encode(range(2, 2)) . '}
            ]'), 'segment_id' => 4],

            ['disc_id' => 3, 'range' => str_replace(["\n", "\r", " "], "", '[
                {"intensity":12, "range": ' . json_encode(range(1, 1)) . '},
                {"intensity":10, "range": ' . json_encode(range(0, 0)) . '}
            ]'), 'segment_id' => 3],

            ['disc_id' => 3, 'range' => str_replace(["\n", "\r", " "], "", '[
                {"intensity":8, "range": ' . json_encode(range(-1, -1)) . '},
                {"intensity":7, "range": ' . json_encode(range(-2, -2)) . '},
                {"intensity":5, "range": ' . json_encode(range(-3, -3)) . '}

            ]'), 'segment_id' => 2],
            ['disc_id' => 3, 'range' => str_replace(["\n", "\r", " "], "", '[
                {"intensity":4, "range": ' . json_encode(range(-4, -4)) . '},
                {"intensity":3, "range": ' . json_encode(range(-5, -5)) . '},
                {"intensity":2, "range": ' . json_encode(range(-6, -25)) . '},
                {"intensity":1, "range": ' . json_encode(range(-26, -28)) . '}

            ]'), 'segment_id' => 1],

            //c
            ['disc_id' => 4, 'range' => str_replace(["\n", "\r", " "], "", '[
                {"intensity":28, "range": ' . json_encode(range(9, 28)) . '},
                {"intensity":27, "range": ' . json_encode(range(7, 8)) . '},
                {"intensity":26, "range": ' . json_encode(range(5, 6)) . '},
                {"intensity":25, "range": ' . json_encode(range(4, 4)) . '}

            ]'), 'segment_id' => 7],

            ['disc_id' => 4, 'range' => str_replace(["\n", "\r", " "], "", '[
                {"intensity":24, "range": ' . json_encode(range(3, 3)) . '},
                {"intensity":23, "range": ' . json_encode(range(2, 2)) . '},
                {"intensity":22, "range": ' . json_encode(range(1, 1)) . '}
            ]'), 'segment_id' => 6],

            ['disc_id' => 4, 'range' => str_replace(["\n", "\r", " "], "", '[
                {"intensity":20, "range": ' . json_encode(range(0, 0)) . '},
                {"intensity":19, "range": ' . json_encode(range(-1, -1)) . '},
                {"intensity":17, "range": ' . json_encode(range(-2, -2)) . '}

            ]'), 'segment_id' => 5],

            ['disc_id' => 4, 'range' => str_replace(["\n", "\r", " "], "", '[
                {"intensity":15, "range": ' . json_encode(range(-3, -3)) . '},
                {"intensity":13, "range": ' . json_encode(range(-4, -4)) . '}
            ]'), 'segment_id' => 4],

            ['disc_id' => 4, 'range' => str_replace(["\n", "\r", " "], "", '[
                {"intensity":11, "range": ' . json_encode(range(-5, -5)) . '},
                {"intensity":10, "range": ' . json_encode(range(-6, -6)) . '}
            ]'), 'segment_id' => 3],
            ['disc_id' => 4, 'range' => str_replace(["\n", "\r", " "], "", '[
                {"intensity":8, "range": ' . json_encode(range(-7, -7)) . '},
                {"intensity":6, "range": ' . json_encode(range(-8, -8)) . '},
                {"intensity":5, "range": ' . json_encode(range(-9, -9)) . '}

            ]'), 'segment_id' => 2],

            ['disc_id' => 4, 'range' => str_replace(["\n", "\r", " "], "", '[
                {"intensity":4, "range": ' . json_encode(range(-10, -10)) . '},
                {"intensity":3, "range": ' . json_encode(range(-11, -11)) . '},
                {"intensity":2, "range": ' . json_encode(range(-12, -24)) . '},
                {"intensity":1, "range": ' . json_encode(range(-25, -28)) . '}

            ]'), 'segment_id' => 1],
        ]);
    }
}
