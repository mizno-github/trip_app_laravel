<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('stores')->insert([
            'detail_title' => '三神峯公園',
            'name' => '三神峯公園',
            'area_id' => 41041,
            'other_address' => '宮城県仙台市太白区三神峯３丁目５−１４−１２',
            'tel' => '0222451223',
            'fax' => '0222451224',
            'eigyo_time' => '12:00 ~ 13:00 (土日祝を除く)',
            'access' => 'バス:  仙台西口バス停から三神峯公園駅前で下車<br>車:  長町南JCTから南へ向かう<br>',
            'message' => '春は桜が満開です',
            'detail_text' => '三神峯公園は、ソメイヨシノやヤエザクラ、シダレザクラなど、市内の公園の中で一番サクラの木が多くサクラの名所として知られています。500本を超えるサクラの木は、満開になる時期が違うので、長い間花を楽しむことができ、花を愛でる多くの市民で賑わいます。公園内には、広々とした芝生広場があり、楽しげに遊ぶ子どもたちの微笑ましい姿に出会えます。広場の入口付近のマツ林は優しい緑陰をつくり、涼を求める人々が訪れます。また、三神峯公園は、縄文時代の大規模な集落の遺跡や、旧陸軍幼年学校跡地の記念碑があることでも知られており、一年を通して仙台市民の憩いの場になっています。',
            'main_img' => '/img/sakura.jpg',
            'sub_img' => '/img/sakura2.jpg',
        ]);
    }
}
