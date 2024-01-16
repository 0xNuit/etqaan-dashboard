<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('procedures_terms', function (Blueprint $table) {
            $table->id();
            $table->string('term');
        });

        // Insert static values
        DB::table('procedures_terms')->insert([
            ['term' => 'استلام الوثائق'],
            ['term' => 'تطبيقاها والتأكد منها'],
            ['term' => 'توثيق العقود والتأكد من صحتها'],
            ['term' => 'توثيق العقود وإصدار التصاريح'],
            ['term' => 'الوقوف على العقار'],
            ['term' => 'الدراسة التفصيلية للعقار'],
            ['term' => 'تحديد الفئات المستهدفة'],
            ['term' => 'تنفيذ الخطة التسويقية وبدء الحملة الإعلانية'],
            ['term' => 'إدارة الطلبات والسومات'],
            ['term' => 'إخطار إدارة المصرف بنتائج الاعتماد'],
            ['term' => 'الإفراغ وإغلاق المشروع'],
        ]);
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('procedures_terms');
    }
};
