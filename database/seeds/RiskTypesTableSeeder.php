<?php

use Illuminate\Database\Seeder;

class RiskTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('risk_types')->insert([
            'symbol' => 'E',
            'name' => 'External Risk',
            'detail' => 'ความเสี่ยงที่ไม่ได้เกิดประจำ แต่ส่งผลกระทบต่อสัมฤทธิ์ผลตามแผนกลยุทธ์ และไม่สามารถคาดการณ์การเกิดความสูญเสียได้อย่างแม่นยำ รวมไปถึงเหตุการณ์ที่เกิดจากปัจจัยภายนอกที่อยู่นอกเหนือการควบคุม เช่น ความเสี่ยงจากผลกระทบการเป็นประชาคมอาเซียนของประเทศไทย และความเสี่ยงที่กระทบต่อเป้าหมายการเป็นมหาวิทยาลัยนานาชาติ ความเสี่ยงทางการเมือง การโยกย้ายผู้บริหาร เป็นต้น ',
            'created_by' => '1',
            'created_at' => new DateTime,
            'updated_by' => '1',
            'updated_at' => new DateTime,
        ]);
        DB::table('risk_types')->insert([
            'symbol' => 'S',
            'name' => 'Strategic Risk',
            'detail' => 'ความเสี่ยงที่เกี่ยวข้องกับวัตถุประสงค์เชิงกลยุทธ์ ซึ่งได้รับผลกระทบจากสภาพแวดล้อม นโยบายของผู้บริหาร เช่น การเมือง เศรษฐกิจ กฎหมาย ตลาด ภาพลักษณ์ ผู้นำ ชื่อเสียง ลูกค้า เป็นต้น',
            'created_by' => '1',
            'created_at' => new DateTime,
            'updated_by' => '1',
            'updated_at' => new DateTime,
        ]);
        DB::table('risk_types')->insert([
            'symbol' => 'G',
            'name' => ':Governance Risk',
            'detail' => 'ความเสี่ยงที่เกี่ยวข้องกับเรื่องธรรมาภิบาลที่อาจเกิดขึ้นจากการดำเนินแผนงาน/โครงการ เพื่อให้เป็นไปตามหลักธรรมาภิบาล (Good Governance) โดยเฉพาะจรรยาบรรณของ  อาจารย์และบุคลากร',
            'created_by' => '1',
            'created_at' => new DateTime,
            'updated_by' => '1',
            'updated_at' => new DateTime,
        ]);
        DB::table('risk_types')->insert([
            'symbol' => 'O',
            'name' => 'Operational Risk',
            'detail' => 'ความเสี่ยงเกี่ยวกับ การผิดพลาดในการปฏิบัติงาน จากวิธีการทำงาน เช่น ความเสี่ยงของกระบวนการบริหารหลักสูตร การบริหารงานวิจัย ระบบประกันคุณภาพ',
            'created_by' => '1',
            'created_at' => new DateTime,
            'updated_by' => '1',
            'updated_at' => new DateTime,
        ]);
        DB::table('risk_types')->insert([
            'symbol' => 'F',
            'name' => 'Financial Risk',
            'detail' => 'ความเสี่ยงที่เกี่ยวกับการเงินและทรัพย์สินซึ่งมีผลทำให้มหาวิทยาลัยต้องมีรายได้ลดน้อยลงหรือค่าใช้จ่ายเพิ่มขึ้น หรือความเสียหายต่อทรัพย์สินของมหาวิทยาลัย เช่น การผันผวนทางการเงินสภาพคล่องอัตราดอกเบี้ย ข้อมูลเอกสารหลักฐานทางการเงิน การรายงานทางการเงินบัญชี การเงินและงบประมาณ เป็นต้น',
            'created_by' => '1',
            'created_at' => new DateTime,
            'updated_by' => '1',
            'updated_at' => new DateTime,
        ]);
        DB::table('risk_types')->insert([
            'symbol' => 'C',
            'name' => ':Compliance Risk',
            'detail' => 'ความเสี่ยงที่เกี่ยวข้องกับประเด็นข้อกฎหมาย ระเบียบ การปกป้องคุ้มครองผู้มีส่วนได้เสีย การป้องกันข้อมูลรวมถึงประเด็นทางด้านกฎระเบียบอื่นๆ',
            'created_by' => '1',
            'created_at' => new DateTime,
            'updated_by' => '1',
            'updated_at' => new DateTime,
        ]);
        DB::table('risk_types')->insert([
            'symbol' => 'HR',
            'name' => 'Human Resource Risk',
            'detail' => 'ความเสี่ยงเกี่ยวกับ พนักงาน และผู้บริหารระดับสูง ขาดความรู้หรือประสบการณ์ หรือมีพฤติกรรมที่ไม่เหมาะสม ความเสี่ยงเกี่ยวกับการที่บุคลากรและระบบงาน ไม่สามารถดำเนินงานต่อไปได้ตามปกติเมื่อเกิดเหตุการณ์ผิดปกติ',
            'created_by' => '1',
            'created_at' => new DateTime,
            'updated_by' => '1',
            'updated_at' => new DateTime,
        ]);
        DB::table('risk_types')->insert([
            'symbol' => 'IT',
            'name' => 'Information and Technology  Risk',
            'detail' => 'ความเสี่ยงเกี่ยวกับความผิดพลาดของระบบเทคโนโลยีและสารสนเทศ ส่งผลให้ในการปฏิบัติงานเกิดความผิดพลาดหรือหยุดชะงัก',
            'created_by' => '1',
            'created_at' => new DateTime,
            'updated_by' => '1',
            'updated_at' => new DateTime,
        ]);
    }
}
