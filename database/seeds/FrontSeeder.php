<?php

use App\CategoryPage;
use App\SectionPage;
use Illuminate\Database\Seeder;
use App\Page;
class FrontSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $section = SectionPage::create([
            'created_by' => 1,
            'updated_by' => 1,
            'name' => 'Informasi'
        ]);

        $category = CategoryPage::create([
            'created_by' => 1,
            'updated_by' => 1,
            'section_id' => $section->id,
            'name' => 'Deputi & Sesmen'
        ]);

        $data = [
            0 => [
                'title' => 'Deputi Bidang Kesetaraan Gender',
                'url' => 'deputi-bidang-kesetaraan-gender',
                'short_content' => '<p>Deputi Bidang Kesetaraan Gender adalah Deputi pada Kementerian Pemberdayaan Perempua dan Perlindungan Anak yang menangani isu‐isu yang berkaitan dengan pemberdayaa perempuan dalam upaya mewujudkan kesetaraan gender dan mempunyai tuga menyelenggarakan perumusan kebijakan serta koordinasi dan sinkronisasi pelaksanaan kebijakan di bidang kesetaraan gender</p>',
                'content' => '<p>Deputi Bidang Kesetaraan Gender adalah Deputi pada Kementerian Pemberdayaan Perempua dan Perlindungan Anak yang menangani isu‐isu yang berkaitan dengan pemberdayaa perempuan dalam upaya mewujudkan kesetaraan gender dan mempunyai tuga menyelenggarakan perumusan kebijakan serta koordinasi dan sinkronisasi pelaksanaan kebijakan di bidang kesetaraan gender</p>',
                'image' => 'Deputi_Kesetaraan_Gender.jpg',
                'pdf' => 'DEPUTI BIDANG KESETARAAN GENDER.pdf',
            ],
            1 => [
                'title' => 'Deputi Bidang Partisipasi Masyarakat',
                'url' => 'deputi-bidang-partisipasi-masyarakat',
                'short_content' => '<p>Deputi Bidang Partisipasi Masyarakat adalah Deputi pada Kementerian Pemberdayaan Perempuan dan Perlindungan Anak yang menangani isu-isu yang berkaitan dengan keterlibatan berbagai pihak mulai dari pemerintah, non pemerintah, Lembaga Profesi dan Dunia Usaha, media, hingga organisasi keagamaan dan masyarakat dalam upaya mewujudkan pemberdayaan perempuan dan perlindungan anak dan mempunyai tugas menyelenggarakan perumusan kebijakan serta koordinasi dan sinkronisasi pelaksanaan kebijakan di bidang partisipasi masyarakat.</p>',
                'content' => '<p>Deputi Bidang Partisipasi Masyarakat adalah Deputi pada Kementerian Pemberdayaan Perempuan dan Perlindungan Anak yang menangani isu-isu yang berkaitan dengan keterlibatan berbagai pihak mulai dari pemerintah, non pemerintah, Lembaga Profesi dan Dunia Usaha, media, hingga organisasi keagamaan dan masyarakat dalam upaya mewujudkan pemberdayaan perempuan dan perlindungan anak dan mempunyai tugas menyelenggarakan perumusan kebijakan serta koordinasi dan sinkronisasi pelaksanaan kebijakan di bidang partisipasi masyarakat.</p>',
                'image' => 'Deputi_Partisipasi_Masyarakat.jpg',
                'pdf' => 'DEPUTI BIDANG PARTISIPASI MASYARAKAT KEMENTERIAN.pdf'
            ],
            2 => [
                'title' => 'Deputi Bidang Perlindungan Anak',
                'url' => 'deputi-bidang-perlindungan-anak',
                'short_content' => '<p>Deputi Bidang Perlindungan Anak adalah Deputi pada Kementerian Pemberdayaan Perempuan dan Perlindungan Anak yang menangani isu-isu yang berkaitan dengan upaya melindungi dan mewujudkan hak-hak dasar anak dan mempunyai tugas menyelenggarakan perumusan kebijakan serta koordinasi dan sinkronisasi pelaksanaan kebijakan di bidang perlindungan anak.</p>',
                'content' => '<p>Deputi Bidang Perlindungan Anak adalah Deputi pada Kementerian Pemberdayaan Perempuan dan Perlindungan Anak yang menangani isu-isu yang berkaitan dengan upaya melindungi dan mewujudkan hak-hak dasar anak dan mempunyai tugas menyelenggarakan perumusan kebijakan serta koordinasi dan sinkronisasi pelaksanaan kebijakan di bidang perlindungan anak.</p>',
                'image' => 'Deputi_Perlindungan_Anak.jpg',
                'pdf' => 'DEPUTI BIDANG PERLINDUNGAN ANAK KEMENTERIAN.pdf'
            ],
            3 => [
                'title' => 'DEPUTI Bidang Perlindungan Hak Perempuan Kementerian PP DAN PA',
                'url' => 'deputi-bidang-perlindungan-hak-perempuan-kementerian-pp-dan-pa',
                'short_content' => '<p>Deputi Bidang Perlindungan Hak Perempuan adalah Deputi pada Kementerian Pemberdayaan Perempuan dan Perlindungan Anak yang menangani isu‐isu yang berkaitan dengan upaya melindungi dan mewujudkan perlindungan hak perempuan dan mempunyai tugas menyelenggarakan perumusan kebijakan serta koordinasi dan sinkronisasi pelaksanaan kebijakan di bidang perlindungan hak perempuan.</p>',
                'content' => '<p>Deputi Bidang Perlindungan Hak Perempuan adalah Deputi pada Kementerian Pemberdayaan Perempuan dan Perlindungan Anak yang menangani isu‐isu yang berkaitan dengan upaya melindungi dan mewujudkan perlindungan hak perempuan dan mempunyai tugas menyelenggarakan perumusan kebijakan serta koordinasi dan sinkronisasi pelaksanaan kebijakan di bidang perlindungan hak perempuan.</p>',
                'image' => 'Deputi_Perlindungan_Hak_Perempuan.jpg',
                'pdf' => 'DEPUTI BIDANG PERLINDUNGAN HAK PEREMPUAN.pdf'
            ],
            4 => [
                'title' => 'Deputi Bidang Tumbuh Kembang Anak Kementerian PP DAN PA',
                'url' => 'deputi-bidang-tumbuh-kembang-anak-kementerian-pp-dan-pa',
                'short_content' => '<p>Deputi Bidang Tumbuh Kembang Anak adalah Deputi pada Kementerian Pemberdayaan Perempuan dan Perlindungan Anak yang menangani isu-isu yang berkaitan dengan upaya pemenuhan hak-hak dasar anak sehingga pertumbuhan dan perkembangannya akan menjadi optimal dan mempunyai tugas menyelenggarakan perumusan kebijakan serta koordinasi dan
                sinkronisasi pelaksanaan kebijakan di bidang tumbuh kembang anak. </p>',
                'content' => '<p>Deputi Bidang Tumbuh Kembang Anak adalah Deputi pada Kementerian Pemberdayaan Perempuan dan Perlindungan Anak yang menangani isu-isu yang berkaitan dengan upaya pemenuhan hak-hak dasar anak sehingga pertumbuhan dan perkembangannya akan menjadi optimal dan mempunyai tugas menyelenggarakan perumusan kebijakan serta koordinasi dan
                sinkronisasi pelaksanaan kebijakan di bidang tumbuh kembang anak. </p>',
                'image' => 'Deputi_Tumbuh_Kembang_Anak.jpg',
                'pdf' => 'DEPUTI BIDANG TUMBUH KEMBANG ANAK KEMENTERIAN.pdf'
            ],
            5 => [
                'title' => 'Sesmen',
                'url' => 'deputi-bidang-tumbuh-kembang-anak-kementerian-pp-dan-pa',
                'short_content' => '<p>Sekretariat Kementerian menangani bidang Dukungan Manajemen dan mempunyai tugas menyelenggarakan koordinasi pelaksanaan tugas, pembinaan, dan pemberian dukungan administrasi kepada seluruh unit organisasi di lingkungan Kementerian Pemberdayaan Perempuan dan Perlindungan Anak.</p>',
                'content' => '<p>Sekretariat Kementerian menangani bidang Dukungan Manajemen dan mempunyai tugas menyelenggarakan koordinasi pelaksanaan tugas, pembinaan, dan pemberian dukungan administrasi kepada seluruh unit organisasi di lingkungan Kementerian Pemberdayaan Perempuan dan Perlindungan Anak.</p>',
                'image' => 'Sesmen.jpg',
                'pdf' => 'SESMEN.pdf'
            ]
        ];

        foreach($data as $key => $value) {
            $page = Page::create([
                'created_by' => 1,
                'updated_by' => 1,
                'section_id' => 1,
                'category_id' => 1,
                'title' => $value['title'],
                'url' => $value['url'],
                'short_content' => $value['short_content'],
                'content' => $value['content'],
                'image' => $value['image'],
                'publish' => 1,
                'approved' => 1,
            ]);

            $page->files()->create([
                'created_by' => 1,
                'page_id' => $page->id,
                'name' => $value['title'],
                'file' => "file_page/".$page->id."/".$value['pdf'],
            ]);
        }

    }
}
