<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $level2   = ['输出设备', '输入设备' , '网络设备', '其它'];
        $level3_1 = ['针式打印机', '智能复合机/多功能一体机', '喷墨打印机', '激光打印机', '投影仪', '耳机', '条码/标签打印机', '证卡打印机', '其它'];
        $level3_2 = ['触摸屏', '高拍仪', '扫码枪', '扫描仪', '摄像头', '身份证阅读机具', '指纹设备', '手写板', '读卡器', '手写屏', 'U-Key', '键盘/鼠标', '信息交互终端', '印控机', '虹膜设备', '指静脉设备', '人脸设备', '其它'];
        $level3_3 = ['交换机', '路由器', 'USB网卡', '其它'];
        $level3_4 = ['移动存储', '其它'];

        foreach ($level2 as $title) {
            DB::table('types')->insert([
                'parent_id' => 0,
                'order'     => 0,
                'title'     => $title,
                'depth'     => 1,
            ]);
        }

        foreach ($level3_1 as $title) {
            DB::table('types')->insert([
                'parent_id' => 1,
                'order'     => 0,
                'title'     => $title,
                'depth'     => 2,
            ]);
        }

        foreach ($level3_2 as $title) {
            DB::table('types')->insert([
                'parent_id' => 2,
                'order'     => 0,
                'title'     => $title,
                'depth'     => 2,
            ]);
        }

        foreach ($level3_3 as $title) {
            DB::table('types')->insert([
                'parent_id' => 3,
                'order'     => 0,
                'title'     => $title,
                'depth'     => 2,
            ]);
        }

        foreach ($level3_4 as $title) {
            DB::table('types')->insert([
                'parent_id' => 4,
                'order'     => 0,
                'title'     => $title,
                'depth'     => 2,
            ]);
        }
    }
}
