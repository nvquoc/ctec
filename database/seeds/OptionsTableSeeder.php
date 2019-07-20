<?php

use Illuminate\Database\Seeder;

class OptionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('options')->insert([
            ['name' => 'site_title', 'value' => 'Trường Cao đẳng Kinh tế - Kỹ thuật Cần Thơ'],
            ['name' => 'site_description', 'value' => 'Trường Cao đẳng Kinh tế - Kỹ thuật Cần Thơ'],
            ['name' => 'site_footer', 'value' => 'Bản quyền thuộc Trường Cao đẳng Kinh tế - Kỹ thuật Cần Thơ<br>Địa chỉ: Số 9, đường Cách Mạng Tháng Tám, Phường An Hòa, Quận Ninh Kiều, TP. Cần Thơ<br>Điện thoai: (84-0292) 3826072 ; Fax: (84-0292) 3821326 ; Email: ktktct@ctec.edu.vn'],
            ['name' => 'site_icon', 'value' => 'favicon.gif'],
            ['name' => 'site_logo', 'value' => 'logo.gif'],
            ['name' => 'site_banner', 'value' => 'banner.png']
        ]);
    }
}
