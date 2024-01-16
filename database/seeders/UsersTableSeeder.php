<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'first_name' => 'محمد',
            'father_name' => 'الرشيد',
            'last_name' => 'الطريفي',
            'id_number' => '2196027581',
            'phone' => '0567147271',
            'user_type' => 1,
        ]);
        DB::table('users')->insert([
            'first_name' => 'عبدالمعين',
            'father_name' => 'محمد',
            'last_name' => 'طالب',
            'id_number' => '2007045160',
            'phone' => '0500106030',
            'user_type' => 3,
        ]);
        DB::table('users')->insert([
            'first_name' => 'جمال',
            'father_name' => 'عبدالكريم',
            'last_name' => 'عباد',
            'id_number' => '2052401722',
            'phone' => '0552244045',
            'user_type' => 3,
        ]);
        DB::table('users')->insert([
            'first_name' => 'عمر',
            'father_name' => 'عبدالرحمن',
            'last_name' => 'الفراج',
            'id_number' => '1076766086',
            'phone' => '0567978777',
            'user_type' => 3,
        ]);
        DB::table('users')->insert([
            'first_name' => 'سلطان',
            'father_name' => 'سعود',
            'last_name' => 'القحطاني',
            'id_number' => '1085183588',
            'phone' => '0547444711',
            'user_type' => 3,
        ]);
        DB::table('users')->insert([
            'first_name' => 'مشعل',
            'father_name' => 'سليمان',
            'last_name' => 'الفراج',
            'id_number' => '1083206290',
            'phone' => '0500008054',
            'user_type' => 3,
        ]);
        DB::table('users')->insert([
            'first_name' => 'فيصل',
            'father_name' => 'مرشد',
            'last_name' => 'صالح',
            'id_number' => '2207724499',
            'phone' => '0500058016',
            'user_type' => 3,
        ]);
        DB::table('users')->insert([
            'first_name' => 'عبدالله',
            'father_name' => 'حمد',
            'last_name' => 'الجمعة',
            'id_number' => '1000339596',
            'phone' => '0554455866',
            'user_type' => 3,
        ]);
        DB::table('users')->insert([
            'first_name' => 'مالك',
            'father_name' => 'حسين',
            'last_name' => 'الزاملي',
            'id_number' => '2100695093',
            'phone' => '0501640208',
            'user_type' => 3,
        ]);
        DB::table('users')->insert([
            'first_name' => 'عبداللطيف',
            'father_name' => 'محمد',
            'last_name' => 'العتيبي',
            'id_number' => '1104132525',
            'phone' => '0569603260',
            'user_type' => 3,
        ]);
        DB::table('users')->insert([
            'first_name' => 'محمد',
            'father_name' => 'سعد',
            'last_name' => 'الرشيد',
            'id_number' => null,
            'phone' => '0505105486',
            'user_type' => 3,
        ]);
        DB::table('users')->insert([
            'first_name' => 'سعد',
            'father_name' => 'محمد',
            'last_name' => 'القحطاني',
            'id_number' => '1000103943',
            'phone' => '0553735049',
            'user_type' => 3,
        ]);
        DB::table('users')->insert([
            'first_name' => 'محمد حرب',
            'father_name' => 'أديب',
            'last_name' => 'صالح',
            'id_number' => '2069597371',
            'phone' => '0501177283',
            'user_type' => 3,
        ]);
        DB::table('users')->insert([
            'first_name' => 'بندر',
            'father_name' => 'علي',
            'last_name' => 'العماري',
            'id_number' => '1069332342',
            'phone' => '0553330561',
            'user_type' => 3,
        ]);
        DB::table('users')->insert([
            'first_name' => 'فرحان',
            'father_name' => 'حمدان',
            'last_name' => 'المطيري',
            'id_number' => null,
            'phone' => '0530311111',
            'user_type' => 3,
        ]);
        DB::table('users')->insert([
            'first_name' => 'عبدالرحمن',
            'father_name' => 'سعيد',
            'last_name' => 'المالكي',
            'id_number' => '1037336136',
            'phone' => '0555224370',
            'user_type' => 3,
        ]);
        DB::table('users')->insert([
            'first_name' => 'ماجد',
            'father_name' => 'علي',
            'last_name' => 'راشد',
            'id_number' => '2199651122',
            'phone' => '0553795502',
            'user_type' => 3,
        ]);
        DB::table('users')->insert([
            'first_name' => 'يزيد',
            'father_name' => 'علي',
            'last_name' => 'العلي',
            'id_number' => '106247021',
            'phone' => '0543430590',
            'user_type' => 3,
        ]);
        DB::table('users')->insert([
            'first_name' => 'أحمد',
            'father_name' => 'سمير',
            'last_name' => 'المحبوب',
            'id_number' => '1065145052',
            'phone' => '0543899967',
            'user_type' => 3,
        ]);
        DB::table('users')->insert([
            'first_name' => 'محمد',
            'father_name' => 'عبدالرحمن',
            'last_name' => 'الهويمل',
            'id_number' => '1070775224',
            'phone' => '0500032029',
            'user_type' => 3,
        ]);
        DB::table('users')->insert([
            'first_name' => 'عبدالرحمن',
            'father_name' => '-',
            'last_name' => 'باعفيف',
            'id_number' => '1014591828',
            'phone' => '050863999',
            'user_type' => 3,
        ]);
        DB::table('users')->insert([
            'first_name' => 'أحمد',
            'father_name' => 'إسماعيل',
            'last_name' => 'الأرناؤط',
            'id_number' => '2364601464',
            'phone' => '0531214412',
            'user_type' => 3,
        ]);
        DB::table('users')->insert([
            'first_name' => 'فهد',
            'father_name' => 'أحمد',
            'last_name' => 'باغوزة',
            'id_number' => '2121414169',
            'phone' => '0502224141',
            'user_type' => 3,
        ]);
        DB::table('users')->insert([
            'first_name' => 'فيصل',
            'father_name' => 'عبدالله',
            'last_name' => 'الدمخ',
            'id_number' => '1062218969',
            'phone' => '0545151525',
            'user_type' => 3,
        ]);
        DB::table('users')->insert([
            'first_name' => 'فهد',
            'father_name' => 'عبدالمحسن',
            'last_name' => 'الدبيخي',
            'id_number' => '1100239886',
            'phone' => '0551100459',
            'user_type' => 3,
        ]);
        DB::table('users')->insert([
            'first_name' => 'محمد',
            'father_name' => 'حمدان',
            'last_name' => 'محمد',
            'id_number' => '2501589960',
            'phone' => '0507373407',
            'user_type' => 3,
        ]);
        DB::table('users')->insert([
            'first_name' => 'عبدالله',
            'father_name' => 'ماجد',
            'last_name' => 'العمار',
            'id_number' => '1098561952',
            'phone' => '0530666666',
            'user_type' => 3,
        ]);
        DB::table('users')->insert([
            'first_name' => 'سلمان',
            'father_name' => 'سلطان',
            'last_name' => 'العتيبي',
            'id_number' => '1108564228',
            'phone' => '0502057103',
            'user_type' => 3,
        ]);
        DB::table('users')->insert([
            'first_name' => 'محمد',
            'father_name' => 'معيذر',
            'last_name' => 'المعيذر',
            'id_number' => '1091580397',
            'phone' => '0568211088',
            'user_type' => 3,
        ]);
       
     
    }
}
