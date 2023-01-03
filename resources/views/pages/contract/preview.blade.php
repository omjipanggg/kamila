<!DOCTYPE html>
@foreach($applicants as $data)
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>PKWT&mdash;{{ $data['name'] }}&mdash;{{ date('Ymd') }}</title>
	<style>
		*, *::before, *::after {
			font-family: 'Tahoma';
			margin: 0;
			padding: 0;
			box-sizing: border-box;
			/*outline: 1px solid lightskyblue;*/
		}
		@page {
			margin: 0;
		}
		body {
			margin: 24mm 24mm 10mm 24mm;
			font-size: 12px;
		}
		.container {
			margin: 0 auto 0 auto;
			padding: 0 1rem 0 1rem;
/*			position: relative;		*/
		}

		.break {
			page-break-after: always;
		}
		.text-left { text-align: left; }
		.text-center { text-align: center; }
		.text-right { text-align: right; }
		.text-justify { text-align: justify; }

		.bold { font-weight: bold; }
		.italic { font-style: italic; }
		.undelined { text-decoration: underline; }

		.logo {
			width: 96px;
		}
		.img-wrap {
			text-align: center;
		}
		.floated {
			position: absolute;
			width: 80px;
			height: auto;
			top: 2rem;
			right: 1rem;
		}

		hr.line {
			outline: none;
			margin: 1rem 0;
			border: none;
			background-color: black;
			width: 100%;
			height: 1px;
		}
		.lh-1 {
			line-height: 1.2;
		}
		
		.pb-1 { padding-bottom: 1rem; }
		
		.ps-1 { padding-left: 1rem; }
		.ps-5 { padding-left: .5rem; }

		.w-5 {
			width: 120px;
			display: inline-block;
		}

		.title-container {
			margin: auto;
			padding-bottom: 2rem;
		}
		.group-left,
		.group-right {
			width: 200px;
		}
		.group-left {
			float: left;
		}
		.group-right {
			float: right;
		}
		.signature .name {
			margin-top: 118px;
		}
		.rome {
			float: left;
		}
		table {
			border-collapse: collapse;
		}

		table.text td:nth-child(2) { padding-left: 3rem; }
		table.text td:nth-child(3) { font-weight: bold; padding-left: .25rem; }

		table.tableOne td:nth-child(1) { width: 16px; }
		table.tableOne td:nth-child(2) { width: 120px; }
		table.tableOne td:nth-child(3) { width: 6px; }

		table.tableFour td:nth-child(1) { width: 16px; }
		table.tableFour td:nth-child(2) { width: 180px; }
		table.tableFour td:nth-child(3) { width: 6px; }

		ol li {
			/*padding-left: .5rem;*/
			text-align: justify;
		}
		ol li ol {
			padding-left: 1rem;
			padding-top: .25rem;
		}
		ol.article-list > li + li {
			padding-top: 1rem;
		}

		section {
			padding-bottom: 1rem;
		}
		a {
			text-decoration: none;
			color: black;
		}
	</style>
</head>
<body>
	<div class="container">
		@include('components.functions')

		{{-- <img src="http://images2.imgbox.com/70/72/oPmNvjlN_o.jpg" alt="Head" class="floated" /> --}}
		
		<div class="title-container">
			<p class="text-center bold lh-1">PERJANJIAN KERJA WAKTU TERTENTU</p>
			<p class="text-center bold lh-1">ANTARA</p>
			<p class="text-center bold lh-1">PT KINARYA ALIHDAYA MANDIRI</p>
			<p class="text-center bold lh-1">DENGAN</p>
			<p class="text-center bold lh-1">{{ strtoupper($data['name']) }}</p>
		</div>

		<hr class="line">

		<div class="page" id="page">
			
			<p class="text-center pb-1">No.: {{ sprintf('%03s', $newlyId+1) }}/DIR-KP/PKWT-1/HQ-JBT/{{ monthToRome(date('m')) }}/{{ date('Y') }}</p>

			<section id="chapterZero">

				<p class="pb-1 text-justify">Pada hari ini, <strong>{{ dayString(date('w')) }}</strong> tanggal <strong>{{ numString(date('j')) }}</strong> bulan <strong>{{ monthString(date('n')) }}</strong> tahun <strong>{{ numString(date('Y')) }} ({{ date('d/m/Y') }}),</strong> pihak-pihak yang bertandatangan di bawah ini:</p>

				<p class="rome bold">I.</p><p class="ps-1 pb-1 text-justify"><strong>PT KINARYA ALIHDAYA MANDIRI,</strong> yang didirikan berdasarkan Akta Pendirian Nomor: 08 tanggal 05 April 2012 yang telah mendapat pengesahan dari Menteri Hukum dan Hak Asasi Manusia Nomor: AHU-20511.AH.01.01 Tahun 2012 tanggal 20 April 2012 dengan akta perubahan terakhir Akta Pernyataan Keputusan Rapat PT Kinarya Alihdaya Mandiri Nomor: 05 Tanggal 11 Agustus 2022, yang dalam perbuatan hukum ini secara sah diwakili oleh <strong>Ariadi Nuratmojo</strong> sebagai Direktur yang selanjutnya dalam perjanjian ini disebut <strong>PIHAK PERTAMA</strong>.</p>

				<div class="group">
					<p class="rome bold">II.</p>
					<div class="ps-1">
						<table class="text">
							<tr>
								<td>Nama</td>
								<td>:</td>
								<td>{{ $data['name'] }}</td>
							</tr>
							<tr>
								<td>NIK</td>
								<td>:</td>
								<td>{{ printId($newlyId) }}</td>
							</tr>
							<tr>
								<td>No. KTP</td>
								<td>:</td>
								<td>{{ $data['id_number'] }}</td>
							</tr>
							<tr>
								<td>Tempat/Tanggal lahir</td>
								<td>:</td>
								<td>{{ $data['birth_place'] }}, {{ $data['birth_date'] }}</td>
							</tr>
							<tr>
								<td>Jenis kelamin</td>
								<td>:</td>
								<td>{{ ($data['gender_id'] == 1) ? 'Laki-laki' : 'Perempuan' }}</td>
							</tr>
							<tr>
								<td>Alamat domisili</td>
								<td>:</td>
								<td>{{ $data['current_address'] . ', ' . $data['current_city'] . ', ' . $data['current_province'] . ' ' . $data['current_zip_code'] }}</td>
							</tr>
						</table>
					</div>
					<p class="text-justify ps-1 pb-1">Dalam hal ini bertindak untuk dan atas nama diri sendiri, selanjutnya dalam perjanjian ini disebut <strong>PIHAK KEDUA.</strong></p>
				</div>

				<p class="text-justify">Dengan terlebih dahulu mempertimbangkan hal-hal sebagai berikut:</p>
				<ol type="a" class="ps-1 pb-1">
					<li>Bahwa kerjasama antara PIHAK PERTAMA dengan PIHAK PEMBERI KERJA (selanjutnya disebut dengan MITRA) untuk melakukan pekerjaan tertentu sebagaimana yang diperjanjikan dengan MITRA.</li>
					<li>Bahwa untuk memenuhi pekerjaan tertentu dengan jangka waktu terbatas maka PIHAK PERTAMA bermaksud mempekerjakan PIHAK KEDUA setelah dilakukan proses rekrutmen atau penilaian dari PIHAK PERTAMA dan PIHAK KEDUA bersedia menerima pekerjaan tersebut.</li>
				</ol>

				<p class="text-justify pb-1">Setelah mempertimbangkan hal di atas, PIHAK PERTAMA dan PIHAK KEDUA (selanjutnya disebut dengan <strong>PARA PIHAK</strong>) sepakat untuk mengadakan Perjanjian Kerja Waktu Tertentu (PKWT) dengan ketentuan sebagai berikut:</p>
			</section>

			<section id="chapterOne">
				<div class="title-container">
					<p class="text-center bold lh-1"><a href="#chapterOneContent">Pasal 1</a></p>
					<p class="text-center bold lh-1">LINGKUP PEKERJAAN</p>
				</div>

				<div id="chapterOneContent">
				<ol class="ps-1 pb-1 article-list">
					<li>PIHAK PERTAMA memberikan tugas tanggungjawab pekerjaan kepada PIHAK KEDUA sebagaimana PIHAK KEDUA menerima penugasan pekerjaan tersebut yang berasal dari MITRA untuk dilaksanakan dengan sebaik-baiknya sebagai:
						<table class="tableOne">
							<tr>
								<td>a.</td>
								<td>Posisi/Jabatan</td>
								<td>:</td>
								<td><strong>DATA</strong></td>
							</tr>
							<tr>
								<td>b.</td>
								<td>Dept./Unit Kerja</td>
								<td>:</td>
								<td><strong>DATA</strong></td>
							</tr>
							<tr>
								<td>c.</td>
								<td>Nama mitra</td>
								<td>:</td>
								<td><strong>DATA</strong></td>
							</tr>
							<tr>
								<td>d.</td>
								<td>Lokasi kerja (Kota)</td>
								<td>:</td>
								<td><strong>DATA</strong></td>
							</tr>
						</table>
					</li>
					<li>PIHAK PERTAMA dapat mengubah, menambah dan atau mengurangi tugas sebagaimana dimaksud dalam ayat (1). Pasal ini yang memiliki kaitan dengan tugas pekerjaan PIHAK KEDUA. PIHAK PERTAMA berhak menugaskan PIHAK KEDUA sebagaimana PIHAK KEDUA berkewajiban melaksanakan penugasan PIHAK PERTAMA untuk bekerja di lokasi lain ataupun MITRA lain selain yang disebutkan pada Pasal 1 ayat (1).</li>
					<li>PIHAK PERTAMA memberikan kewenangan kepada MITRA untuk melakukan pembinaan, pengawasan dan penilaian kinerja PIHAK KEDUA termasuk usulan kelanjutan/pemberhentian PKWT.</li>
				</ol>
				</div>
			</section>

			<div class="break"></div>

			<section id="chapterTwo">
				<div class="title-container">
					<p class="text-center bold lh-1"><a href="#chapterTwoContent">Pasal 2</a></p>
					<p class="text-center bold lh-1">SIFAT HUBUNGAN KERJA</p>
				</div>

				<div id="chapterTwoContent">
				<ol class="ps-1 pb-1 article-list">
					<li>PIHAK KEDUA menyetujui dan bersedia untuk bekerja pada PIHAK PERTAMA dengan status sebagai <u>KARYAWAN KONTRAK.</u></li>
					<li>PIHAK KEDUA menyetujui bahwa hubungan kerja dalam PKWT ini <ins>tidak dipersiapkan untuk diangkat sebagai karyawan tetap,</ins> baik pada PIHAK PERTAMA maupun MITRA.</li>
				</ol>
				</div>
			</section>

			<section id="chapterThree">
				<div class="title-container">
					<p class="text-center bold lh-1"><a href="#chapterThreeContent">Pasal 3</a></p>
					<p class="text-center bold lh-1">JANGKA WAKTU PERJANJIAN</p>
				</div>

				<div id="chapterThreeContent">
				<ol class="ps-1 pb-1 article-list">
					<li>PKWT ini diadakan untuk masa waktu <strong>{{ countDays($dates['start'], $dates['end']) }}</strong> terhitung dari tanggal <strong>{{ $dates['start'] }}</strong> sampai dengan tanggal <strong>{{ $dates['end'] }}.</strong></li>
					<li>Atas pertimbangan kelanjutan pekerjaan tertentu dari MITRA dan evaluasi pekerjaan sebagaimana dimaksud dalam Pasal 1 ayat (3) Perjanjian ini, jangka waktu sebagaimana dimaksud dalam Pasal 3 ayat (1) Perjanjian ini dapat berupa:
						<ol type="a">
							<li>PKWT diperpanjang dengan jangka waktu yang disepakati oleh PARA PIHAK yang dituangkan dalam Amandemen Perpanjangan.</li>
							<li>PKWT berakhir sesuai dengan jangka waktu dalam Perjanjian ini.</li>
						</ol>
					</li>
				</ol>
				</div>
			</section>

			<section id="chapterFour">
				<div class="title-container">
					<p class="text-center bold lh-1"><a href="#chapterFourContent">Pasal 4</a></p>
					<p class="text-center bold lh-1">WAKTU KERJA DAN LEMBUR</p>
				</div>

				<div id="chapterFourContent">
				<ol class="ps-1 pb-1 article-list">
					<li>PIHAK KEDUA berkewajiban bekerja selama 8 (Delapan) jam sehari, dengan total jam kerja maksimal 40 (Empat Puluh) jam seminggu, dengan uraian jadwal sebagai berikut:
						<table class="tableFour">
							<tr>
								<td>a.</td>
								<td>Senin s.d. Jum'at</td>
								<td>:</td>
								<td>Pukul 08.00 s.d. 17.00</td>
							</tr>
							<tr>
								<td></td>
								<td>Istirahat (Senin s.d. Kamis)</td>
								<td>:</td>
								<td>Pukul 12.00 s.d. 13.00</td>
							</tr>
							<tr>
								<td></td>
								<td>Istirahat (Jum'at)</td>
								<td>:</td>
								<td>Pukul 11.30 s.d. 13.00</td>
							</tr>
							<tr>
								<td>b.</td>
								<td>Sabtu s.d. Minggu</td>
								<td>:</td>
								<td>Libur</td>
							</tr>
						</table>
					</li>
					<li>PIHAK PERTAMA dapat melakukan penjadwalan kerja khusus (kerja bergilir/kerja shift) kepada PIHAK KEDUA selain ketentuan waktu kerja yang ditetapkan dalam ayat (1) Pasal ini, dengan tetap memperhatikan ketentuan maksimal kerja dalam seminggu dan waktu istirahat/libur, minimal 1 (Satu) hari dalam seminggu.</li>
					<li>Apabila PIHAK KEDUA melakukan pekerjaan melebihi 8 (Delapan) jam per hari (Sistem 5 hari kerja, 2 hari libur) atau melebihi 7 (Tujuh) jam sehari (Sistem 6 hari kerja, 1 hari libur) dengan total jam kerja melebihi 40 (Empat Puluh) jam seminggu, PIHAK KEDUA berhak untuk mendapatkan uang lembur dengan jumlah maksimal yang diatur oleh PIHAK PERTAMA dengan MITRA yang tidak melebihi ketentuan perundang-undangan terkait maksimal lembur. Setiap lembur wajib mengisi terlebih dahulu Surat Perintah Kerja Lembur (SPKL) sesuai dengan ketentuan yang diatur PIHAK PERTAMA.</li>
					<li>Jam kerja untuk pekerjaan tertentu (kerja bergilir atau kerja shift) yang melebihi jadwal 8 (Delapan) jam sehari atau 7 (Tujuh) jam sehari, perhitungan jam lembur dihitung apabila telah melebihi secara kumulatif 40 jam per minggu.</li>
					<li>Kelebihan jam kerja sebagaimana dimaksud dalam Pasal 4 ayat (3) dan (4) tidak diperhitungkan sebagai jam lembur PIHAK KEDUA, sebagaimana kesepakatan antara PIHAK PERTAMA dengan MITRA termasuk pekerjaan-pekerjaan yang terkait dengan pencapaian target, kecuali ditentukan lain oleh MITRA untuk mendapatkan lembur.</li>
				</ol>
				</div>
			</section>

			<div class="break"></div>

			<section id="chapterFive">
				<div class="title-container">
					<p class="text-center bold lh-1"><a href="#chapterFiveContent">Pasal 5</a></p>
					<p class="text-center bold lh-1">UPAH BULANAN</p>
				</div>

				<div id="chapterFiveContent">
				<ol class="ps-1 pb-1 article-list">
					<li>Atas pekerjaan yang dilakukan oleh PIHAK KEDUA, PIHAK KEDUA berhak mendapat upah bulanan dari PIHAK PERTAMA sebesar <strong>DATA</strong> dengan rincian sebagai berikut:
						<table class="tableFour">
							<tr>
								<td>a.</td>
								<td>Gaji pokok</td>
								<td>:</td>
								<td><strong>Rp000.000.000</strong></td>
							</tr>
							<tr>
								<td>b.</td>
								<td>Tunjangan tetap</td>
								<td>:</td>
								<td><strong>Rp000.000.000</strong></td>
							</tr>
						</table>
					</li>
					<li>Selain komponen upah yang diperoleh PIHAK KEDUA sebagaimana dimaksud dalam Pasal 5 ayat (1) Perjanjian ini, PIHAK PERTAMA dapat menambahkan pendapatan lain kepada PIHAK KEDUA sebagai komponen non upah sesuai dengan ketentuan dari PIHAK PERTAMA.</li>
					<li>Dalam hal PIHAK KEDUA memiliki kewajiban hutang atau potongan lainnya yang disepakati oleh PARA PIHAK, PIHAK PERTAMA berhak melakukan pemotongan pembayarannya dari upah bulanan yang diterima PIHAK KEDUA.</li>
					<li>PIHAK KEDUA akan menanggung biaya pajak penghasilan yang timbul dari pembayaran gaji dan pembayaran lainnya, kecuali ditentukan lain oleh PIHAK PERTAMA.</li>
					<li>Upah sebagaimana dimaksud dalam Pasal 5 ayat (1) dibayarkan setiap bulan selambat-lambatnya pada akhir bulan kalender.</li>
				</ol>
				</div>
			</section>

			<section id="chapterSix">
				<div class="title-container">
					<p class="text-center bold lh-1"><a href="#chapterSixContent">Pasal 6</a></p>
					<p class="text-center bold lh-1">JAMINAN PERLINDUNGAN KERJA &amp; PENGALIHAN PEKERJAAN</p>
				</div>

				<div id="chapterSixContent">
				<ol class="ps-1 pb-1 article-list">
					<li>Atas pelaksanaan Perjanjian ini PIHAK PERTAMA menjamin PIHAK KEDUA dalam hal:
						<ol type="a">
							<li>Menerima upah tidak kurang dari upah minimal sesuai dengan ketentuan terkait pengupahan yang diatur oleh Pemerintah.</li>
							<li>Keikutsertaan dalam program BPJS Ketenagakerjaan termasuk BPJS Pensiun dan BPJS Kesehatan dengan kewajiban premi sesuai dengan ketentuan perundang-undangan.</li>
							<li>Menerima Tunjangan Hari Raya (THR) yang besarnya dan tata cara pembayarannya sesuai dengan ketentuan perundang-undangan yang berlaku.</li>
							<li>Mendapatkan hak cuti tahunan selama 12 (Dua Belas) hari kerja apabila PIHAK KEDUA telah mempunyai masa kerja 12 (Dua Belas) bulan terus-menerus dapat diambil secara bertahap.</li>
						</ol>
					</li>
					<li>Apabila terjadi pergantian perusahaan pengelola Alihdaya dari PIHAK PERTAMA ke Pihak Lain (Perusahaan Pengelola Alihdaya Baru) atas obyek pekerjaan yang sama dan masih ada maka:
						<ol type="a">
							<li>PIHAK PERTAMA akan membantu mengurus pengalihan PIHAK KEDUA kepada Pihak Lain berupa merekomendasikan PIHAK KEDUA ke Pihak Lain melalui MITRA dengan keputusan penerimaan diserahkan Pihak Lain.</li>
							<li>Dalam hal PIHAK KEDUA tidak memperoleh jaminan kelangsungan bekerja sebagaimana dimaksud dalam ayat (2) butir (a) Perjanian ini, PIHAK PERTAMA menjamin hak-hak PIHAK KEDUA dalam Perjanjian Kerja Waktu Tertentu (PKWT) ini dengan tetap membayar sisa hak gaji dan hak lainnya (jika ada), termasuk uang kompensasi yang menjadi kewajiban PIHAK PERTAMA ke PIHAK KEDUA.</li>
						</ol>
					</li>
				</ol>
				</div>
			</section>

			<section id="chapterSeven">
				<div class="title-container">
					<p class="text-center bold lh-1"><a href="#chapterSevenContent">Pasal 7</a></p>
					<p class="text-center bold lh-1">MANGKIR DAN IJIN MENINGGALKAN PEKERJAAN</p>
				</div>

				<div id="chapterSevenContent">
				<ol class="ps-1 pb-1 article-list">
					<li>Apabila PIHAK KEDUA tidak masuk kerja pada hari kerja tanpa alasan yang dapat diterima dan pemberitahuan yang sah <strong>(mangkir)</strong> pada hari tidak masuk, maka akan dikenakan potongan terhadap upah bulanan sebesar:
					</li>
					<div class="img-wrap">
						{{-- <img src="http://images2.imgbox.com/4e/f2/W1IUAfM8_o.png" alt="Head" /> --}}
					</div>
					<li>Jika PIHAK KEDUA tidak bekerja karena sakit atau ijin <strong>(diluar ijin meninggalkan pekerjaan),</strong> maka upah bulanan tetap dibayarkan.</li>
				</ol>
				</div>
			</section>

			<div class="break"></div>

			<section id="chapterEight">
				<div class="title-container">
					<p class="text-center bold lh-1"><a href="#chapterEightContent">Pasal 8</a></p>
					<p class="text-center bold lh-1">PELANGGARAN TATA TERTIB KERJA</p>
				</div>

				<div id="chapterEightContent">
				<ol class="ps-1 pb-1 article-list">
					<li>PIHAK KEDUA wajib mentaati seluruh ketentuan dan tata tertib dalam PKWT ini berikut segala ketentuan yang tercantum dalam Peraturan Perusahaan maupun Peraturan Ketenagakerjaan lainnya yang berlaku pada PIHAK PERTAMA, serta ketentuan dan peraturan yang berlaku di lokasi kerja MITRA.</li>
					<li>Setiap perbuatan dan/atau tindakan PIHAK KEDUA yang melanggar ketentuan tersebut pada ayat (1), akan diberikan sanksi sesuai dengan ketentuan yang berlaku pada PIHAK PERTAMA atau MITRA.</li>
					<li>PIHAK PERTAMA dapat memberikan <strong>Surat Peringatan</strong> kepada PIHAK KEDUA bilamana PIHAK KEDUA melakukan perbuatan-perbuatan sebagai berikut:
						<ol type="a">
							<li>Menolak untuk mentaati perintah atau penugasan yang layak diberikan kepadanya.</li>
							<li>Secara sengaja atau lalai mengakibatkan dirinya dalam keadaan tidak dapat melaksanakan pekerjaan.</li>
							<li>Tidak cakap atau mampu bekerja walaupun telah diupayakan berkerja pada bidang-bidang tugas yang lain yang tersedia pada PIHAK PERTAMA.</li>
							<li>Melanggar ketentuan yang telah ditetapkan dalam kesepakatan kerja ini, dan mendapatkan peringatan sesuai ketentuan yang berlaku pada PIHAK PERTAMA.</li>
						</ol>
					</li>
				</ol>
				</div>
			</section>

			<section id="chapterNine">
				<div class="title-container">
					<p class="text-center bold lh-1"><a href="#chapterNineContent">Pasal 9</a></p>
					<p class="text-center bold lh-1">KERAHASIAAN DATA</p>
				</div>

				<div id="chapterNineContent">
				<ol class="ps-1 pb-1 article-list">
					<li>PIHAK KEDUA yang ditempatkan di MITRA wajib menjaga kerahasian data dan informasi dengan cara tidak membocorkan rahasia, penyalahgunaan akses pengguna, membagikan dokumen ke pihak lain, menyebarluaskan atau menggandakan, maupun kegiatan lainnya dengan alasan atau kepentingan apapun, kecuali dilakukan sesuai dengan standar prosedur pekerjaan yang berlaku di MITRA.</li>
					<li>Apabila MITRA mensyaratkan adanya PERJANJIAN KERAHASIAAN untuk setiap karyawan yang ditempatkan atau bekerja di lokasi MITRA, maka PIHAK KEDUA wajib dan taat akan perjanjian kerahasiaan tersebut dan menjadi bagian yang tidak terpisahkan dari PKWT ini.</li>
					<li>PIHAK KEDUA berkewajiban mengembalikan semua dokumen atau peralatan kerja yang diterima dari PIHAK PERTAMA atau MITRA apabila sudah tidak bekerja lagi di lokasi MITRA dengan kewajiban tetap menjaga kerahasiaan sebagaimana dimaksud dalam Pasal 9 ayat (1) dan (2).</li>
				</ol>
				</div>
			</section>

			<section id="chapterTen">
				<div class="title-container">
					<p class="text-center bold lh-1"><a href="#chapterTenContent">Pasal 10</a></p>
					<p class="text-center bold lh-1">BERAKHIRNYA PKWT</p>
				</div>

				<div id="chapterTenContent">
				<ol class="ps-1 pb-1 article-list">
					<li>Perjanjian kerja ini berakhir demi hukum, dengan berakhirnya jangka waktu yang telah ditentukan atau selesainya pekerjaan dalam perjanjian kerja yang disepakati.</li>
					<li>Perjanjian kerja ini dapat berakhir sebelum selesainya jangka waktu yang diperjanjikan dalam PKWT berupa Pemutusan Hubungan Kerja (PHK) dengan alasan:
						<ol type="a">
							<li>PIHAK KEDUA meninggal dunia.</li>
							<li>PIHAK KEDUA mengajukan surat pengunduran diri efektif 30 hari sebelum hari pengunduran diri.</li>
							<li>PIHAK PERTAMA jatuh pailit; apabila terjadi kepailitan pada PIHAK PERTAMA maka hak-hak PIHAK KEDUA diselesaikan sesuai dengan Peraturan Perundang-undangan yang berlaku.</li>
							<li>Melakukan pelanggaran berat seperti yang tercantum dalam Peraturan Perusahaan dan atau ketentuan lain yang berlaku pada PIHAK PERTAMA atau MITRA.</li>
							<li>Melakukan pelanggaran terhadap ketentuan perjanjian kerja ini dan telah mendapat Surat Peringatan terakhir.</li>
							<li> 5 (Lima) hari kerja secara berturut-turut tanpa memberikan alasan dan keterangan yang sah kepada PIHAK PERTAMA.</li>
							<li>Tidak mencapai target performansi yang telah ditetapkan oleh PIHAK PERTAMA maupun MITRA, dan PIHAK KEDUA telah mendapatkan Surat Peringatan atas ketidakmampuan tersebut.</li>
							<li>KEDUA dikembalikan oleh MITRA kepada PIHAK PERTAMA.</li>
							<li>Berakhirnya Perjanjian Kerjasama atau Purchase Order (PO) antara PIHAK PERTAMA dengan MITRA lebih cepat dari yang disepakati sebelumnya.</li>
							<li>Berkurangnya volume pekerjaan yang dipesan oleh MITRA ke PIHAK PERTAMA yang berakibat PKWT dengan PIHAK KEDUA berakhir lebih cepat dari jangka waktu yang telah disepakati sebelumnya.</li>
						</ol>
					</li>
				</ol>
				</div>
			</section>

			<div class="break"></div>

			<section id="chapterEleven">
				<div class="title-container">
					<p class="text-center bold lh-1"><a href="#chapterElevenContent">Pasal 11</a></p>
					<p class="text-center bold lh-1">KOMPENSASI PKWT</p>
				</div>

				<div id="chapterElevenContent">
				<ol class="ps-1 pb-1 article-list">
					<li>PIHAK PERTAMA akan memberikan uang kompensasi kepada PIHAK KEDUA dengan ketentuan, sebagai berikut:
						<ol type="a">
							<li>PIHAK KEDUA mempunyai masa kerja paling sedikit 1 (Satu) bulan secara terus-menerus pada saat berakhirnya PKWT.</li>
							<li>Apabila PKWT diperpanjang, maka uang kompensasi diberikan saat selesainya jangka waktu PKWT sebelum perpanjangan.</li>
							<li>Uang kompensasi berikutnya diberikan setelah perpanjangan jangka waktu PKWT berakhir atau selesai.</li>
							<li>Dalam hal PKWT lebih cepat penyelesaiannya dari lamanya waktu yang diperjanjikan dalam PKWT, maka uang kompensasi dihitung sampai dengan saat selesainya pekerjaan.</li>
						</ol>
					</li>
					<li>Selain Pasal 11 ayat (1) di atas, PIHAK PERTAMA tidak memberikan uang kompensasi kepada PIHAK KEDUA yang disebabkan oleh:
						<ol type="a">
							<li>Pelanggaran yang dilakukan oleh PIHAK KEDUA dan telah mendapatkan sanksi dari PIHAK PERTAMA berupa pemberian Surat Peringatan yang berlaku selama 6 (enam) bulan. Kompensasi tidak diberikan selama masa berlakunya surat peringatan.</li>
							<li>PIHAK KEDUA mendapatkan pemutusan hubungan kerja oleh PIHAK PERTAMA dengan alasan sebagaimana dimaksud dalam Pasal 10 ayat (2) butir (d), (e), (f) dan (g).</li>
							<li>PIHAK KEDUA mengajukan surat pengunduran diri kurang dari 30 (Tiga Puluh) hari sebelum tanggal efektif pengunduran diri.</li>
						</ol>
					</li>
					<li>Dalam hal terjadi Pemutusan Hubungan Kerja (PHK), PIHAK KEDUA berkewajiban mengembalikan seluruh perlengkapan kerja milik PIHAK PERTAMA atau MITRA sebelum uang kompensasi diberikan.</li>
					<li>Apabila terjadi kerusakan peralatan kerja milik PIHAK PERTAMA atau MITRA yang diakibatkan PIHAK KEDUA, maka uang kompensasi akan dipotong sesuai dengan besarnya kerugian yang ditimbulkan.</li>
					<li>PARA PIHAK sepakat untuk mengesampingkan Pasal 62 Undang-Undang Nomor 13 Tahun 2003 tentang Ketenagakerjaan.</li>
				</ol>
				</div>
			</section>

			<section id="chapterTwelve">
				<div class="title-container">
					<p class="text-center bold lh-1"><a href="#chapterTwelveContent">Pasal 12</a></p>
					<p class="text-center bold lh-1">TANGGUNG JAWAB HUKUM &amp; GANTI KERUGIAN</p>
				</div>

				<div id="chapterTwelveContent">
				<ol class="ps-1 pb-1 article-list">
					<li>Apabila PIHAK KEDUA ternyata terbukti melakukan tindakan yang merugikan PIHAK PERTAMA dan MITRA, maka PIHAK KEDUA wajib mengganti kerugian menurut ketentuan ganti rugi yang berlaku pada PIHAK PERTAMA dan MITRA.</li>
					<li>Apabila terbukti melakukan pelanggaran terkait kerahasiaan data, informasi dan dokumen sebagaimana dimaksud dalam Pasal 9 ayat (1) dan (2), maka PIHAK KEDUA bertanggungjawab secara pidana maupun perdata berupa mengganti seluruh kerugian yang diderita PIHAK PERTAMA maupun MITRA termasuk pemutusan hubungan kerja tanpa kompensasi apapun.</li>
				</ol>
				</div>
			</section>

			<section id="chapterThirteen">
				<div class="title-container">
					<p class="text-center bold lh-1"><a href="#chapterThirteenContent">Pasal 13</a></p>
					<p class="text-center bold lh-1">AMANDEMEN &amp; ADENDUM</p>
				</div>

				<div id="chapterThirteenContent">
					<p class="pb-1 text-justify">PIHAK PERTAMA dengan persetujuan PIHAK KEDUA dapat mengubah, menambah dan atau mengurangi ketentuan dalam perjanjian ini yang dituangkan dalam amandemen/adendum dan menjadi lampiran yang tidak terpisahkan dari perjanjian ini.</p>
				</div>
			</section>
			
			<div class="break"></div>

			<section id="chapterFourteen">
				<div class="title-container">
					<p class="text-center bold lh-1"><a href="#chapterFourteenContent">Pasal 14</a></p>
					<p class="text-center bold lh-1">PENYELESAIAN PERSELISIHAN</p>
				</div>

				<div id="chapterFourteenContent">
				<ol class="ps-1 pb-1 article-list">
					<li>Dalam hal terjadi perselisihan diantara PARA PIHAK sebagai akibat dari pelaksanaan perjanjian ini, PARA PIHAK sepakat untuk menyelesaikannya secara musyawarah dan mufakat.</li>
					<li>Apabila penyelesaian secara musyawarah tidak tercapai kesepakatan, PARA PIHAK sepakat untuk melibatkan pihak ketiga melalui Mediasi. Jika penyelesaian melalui mediasi tidak juga dapat menyelesaikan perselisihan, maka PARA PIHAK sepakat untuk menyelesaikannya secara hukum melalui Pengadilan Hubungan Industrial.</li>
				</ol>
				</div>
			</section>

			<section id="chapterFiveteen">
				<div class="title-container">
					<p class="text-center bold lh-1"><a href="#chapterFiveteenContent">Pasal 15</a></p>
					<p class="text-center bold lh-1">PENUTUP</p>
				</div>

				<div id="chapterFiveteenContent">
					<p class="pb-1 text-justify">PKWT ini dibuat rangkap 2 (Dua) ASLI di atas kertas bermaterai cukup serta mempunyai kekuatan hukum yang sama setelah ditandatangani oleh PARA PIHAK, masing-masing 1 (Satu) disimpan oleh PARA PIHAK.</p>
					<p class="pb-1 text-justify">Demikian PKWT ini dibuat, dimengerti, dipahami dan ditandatangani dalam keadaan sadar, tanpa adanya tekanan dan paksaan dari pihak manapun, serta berlaku setelah ditandatangani oleh kedua belah pihak.</p>
				</div>
			</section>

			<div class="signature text-center" id="signature">
				<div class="group-left">
					<p class="top bold">PIHAK PERTAMA</p>
					<div class="name">
						<p><b><u>Ariadi Nuratmojo</u></b></p>
						<p>Direktur</p>
					</div>
				</div>
				<div class="group-right">
					<p class="top bold">PIHAK KEDUA</p>
					<div class="name">
						<p><b><u>{{ $data['name'] }}</u></b></p>
						<p>Karyawan</p>
					</div>
				</div>
			</div>

		</div>

	</div>
</body>
</html>
@endforeach