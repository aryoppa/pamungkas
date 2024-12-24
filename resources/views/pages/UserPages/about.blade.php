@extends('layouts.logged-navbar')

@section('content')
<div class="container mt-5 pt-3">
	<div class="card p-5">
		<div class="row">
			<div class="col-lg-5 col-sm-12">
				<img src="../assets/images/team.png" width="100%" alt="">
			</div>
			<div class="col-lg-7 col-sm-12 pt-5">
				<div class="container pt-3">
					<div class="row">
						<h1>
							<b class="text-grey text-color-secondary">
								SmartEngTest
							</b>
						</h1>
						<p class="fs-6">
							Data Science Research, Universitas Pendidikan Indonesia
						</p>
					</div>
					<div class="row gap-2">
						<div class="col-1">
							<img src="https://upload.wikimedia.org/wikipedia/id/0/09/Logo_Almamater_UPI.svg" width="40px" alt="">
						</div>
						<div class="col-1">
							<img src="assets/images/logo-light.png" alt="logo-image" width="120px">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row p-3" style="text-align: justify;">
		<h2 class="text-center py-4 text-color-primary">
			<b>
				Tentang Kami
			</b>
		</h2>
		<p class="pb-2">
			SmartEngTest merupakan sebuah sistem yang berfokus pada pengembangan solusi pembelajaran bahasa Inggris melalui generator soal yang inovatif. Sistem ini menawarkan berbagai fitur dan layanan yang dapat membantu pengguna meningkatkan kemampuan berbahasa Inggris dengan lebih efektif.
			Website SmartEngTest dirancang khusus untuk memudahkan pengguna dalam menghasilkan soal-soal berbahasa Inggris. Dengan menggunakan generator soal yang mudah digunakan, pengguna dapat membuat soal secara otomatis hanya dengan memasukkan link berita yang tersedia di website. Hal ini memungkinkan pengguna untuk melatih keterampilan membaca dan pemahaman bahasa Inggris dengan menggunakan konten aktual dan relevan.
		</p>
		<p class="pb-2">
			Selain itu, SmartEngTest juga menyediakan layanan Computer Based Test (CBT) yang memungkinkan pengguna untuk mengukur kemampuan berbahasa Inggris mereka. Layanan CBT ini dapat digunakan oleh individu untuk menguji diri mereka sendiri atau oleh guru dalam melakukan ujian kepada murid-muridnya. Dengan adanya layanan CBT, pengguna dapat berlatih dan menguji kemampuan mereka kapan saja dan di mana saja.
			SmartEngTest dapat diakses secara online melalui berbagai perangkat seperti komputer, tablet, dan smartphone. Meskipun untuk penggunaan CBT, disarankan menggunakan desktop agar mendapatkan pengalaman ujian yang lebih baik. Dengan fleksibilitas akses ini, pengguna dapat belajar dan berlatih bahasa Inggris sesuai dengan preferensi dan kenyamanan mereka.
		</p>
		<p class="pb-2">
			SmartEngTest merupakan salah satu produk yang dikembangkan oleh Team Data Science Research, Program Studi Ilmu Komputer Universitas Pendidikan Indonesia. Perusahaan ini bekerja sama dengan mitra dari bidang Teknologi dan Bahasa Inggris, seperti PT. Scada Prima Cipta dan Travelia Pratama, untuk menghadirkan solusi pembelajaran bahasa Inggris yang terpercaya dan inovatif.
		</p>
		<p class="pb-2">
			Dengan komitmen untuk memberikan layanan berkualitas dan meningkatkan kemampuan berbahasa Inggris pengguna, SmartEngTest terus mengembangkan platformnya dan menghadirkan fitur-fitur baru yang relevan dengan kebutuhan pembelajaran bahasa Inggris. Melalui sistem generator soal ini, diharapkan pengguna dapat mencapai tingkat kemahiran berbahasa Inggris yang lebih tinggi dan meraih kesuksesan dalam pendidikan dan karier mereka.
		</p>
		<div class="row py-3">
			<div class="col">
				<img src="assets/images/logo-scada.png" class="float-end" style="width: 35%;" alt="">
			</div>
			<div class="col">
				<img src="assets/images/logo-travelia.png" style="width: 20%;" alt="">
			</div>
		</div>
		<p class="pb-2 text-center pt-2">
			Adapun tim yang terlibat dalam pengembangan SmartEngTest adalah sebagai berikut:
		</p>
		<div class="row">
			<div class="col-lg-6 col-sm-12">
				<div class="card mx-auto shadow-none border-0 po-cards">
					<img class="card-img-top mx-auto rounded-circle" style="width: 40%;" src="/assets/images/about/lala.jpg" alt="">
					<div class="card-body text-center">
						<p class="card-title fw-bold text-color-primary">Prof. Dr. Lala Septem Riza, M.T.</p>
						<p class="card-text">Product Owner</p>
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-sm-12">
				<div class="card mx-auto shadow-none border-0 po-cards">
					<img class="card-img-top mx-auto rounded-circle" style="width: 40%;" src="/assets/images/about/rasim.jpg" alt="">
					<div class="card-body text-center">
						<p class="card-title fw-bold text-color-primary">Dr. Rasim, M.T.</p>
						<p class="card-text">Product Owner</p>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-4 col-sm-12">
				<div class="card mx-auto shadow-none border-0">
					<img class="card-img-top mx-auto rounded-circle" style="width: 40%;" src="/assets/images/about/melvyn.jpg" alt="">
					<div class="card-body text-center">
						<p class="card-title fw-bold text-color-primary">Melvyn</p>
						<p class="card-text">Engineer</p>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-sm-12">
				<div class="card mx-auto shadow-none border-0">
					<img class="card-img-top mx-auto rounded-circle" style="width: 40%;" src="/assets/images/about/aryo.jpg" alt="">
					<div class="card-body text-center">
						<p class="card-title fw-bold text-color-primary">Aryo</p>
						<p class="card-text">Engineer</p>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-sm-12">
				<div class="card mx-auto shadow-none border-0">
					<img class="card-img-top mx-auto rounded-circle" style="width: 40%;" src="/assets/images/about/naufal.jpg" alt="">
					<div class="card-body text-center">
						<p class="card-title fw-bold text-color-primary">Naufal</p>
						<p class="card-text">Engineer</p>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-sm-12">
				<div class="card mx-auto shadow-none border-0">
					<img class="card-img-top mx-auto" style="width: 40%;" src="https://www.pngkey.com/png/full/202-2024691_my-profile-comments-my-profile-icon-png.png" alt="">
					<div class="card-body text-center">
						<p class="card-title fw-bold text-color-primary">Erry</p>
						<p class="card-text">Engineer</p>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-sm-12">
				<div class="card mx-auto shadow-none border-0">
					<img class="card-img-top mx-auto rounded-circle" style="width: 40%;" src="/assets/images/about/alfaza.png" alt="">
					<div class="card-body text-center">
						<p class="card-title fw-bold text-color-primary">Alfaza</p>
						<p class="card-text">Developer</p>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-sm-12">
				<div class="card mx-auto shadow-none border-0">
					<img class="card-img-top mx-auto rounded-circle" style="width: 40%;" src="/assets/images/about/aji.jpg" alt="">
					<div class="card-body text-center">
						<p class="card-title fw-bold text-color-primary">Aji</p>
						<p class="card-text">Engineer</p>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-sm-12">
				<div class="card mx-auto shadow-none border-0">
					<img class="card-img-top mx-auto rounded-circle" style="width: 40%;" src="/assets/images/about/arfi.jpg" alt="">
					<div class="card-body text-center">
						<p class="card-title fw-bold text-color-primary">Arfiansyah</p>
						<p class="card-text">Developer</p>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-sm-12">
				<div class="card mx-auto shadow-none border-0">
					<img class="card-img-top mx-auto rounded-circle" style="width: 40%;" src="/assets/images/about/ira.jpg" alt="">
					<div class="card-body text-center">
						<p class="card-title fw-bold text-color-primary">Ira</p>
						<p class="card-text">Developer</p>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-sm-12">
				<div class="card mx-auto shadow-none border-0">
					<img class="card-img-top mx-auto rounded-circle" style="width: 40%;" src="/assets/images/about/satria.png" alt="">
					<div class="card-body text-center">
						<p class="card-title fw-bold text-color-primary">Satria</p>
						<p class="card-text">Developer</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row p-3 pt-0">
		<h2 class="text-color-primary">
			<b>
				Kontak Kami
			</b>
		</h2>
		<p class="pt-3 pb-2">
			Alamat: Jl. Dr. Setiabudhi No. 229 Bandung 40154. Jawa Barat - Indonesia <br>
			Telp. 022-2013163. &nbsp;
			Fax. 022-2013651.
		</p>
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.245664626473!2d107.5921612144704!3d-6.861133895041766!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e6b943c2c5ff%3A0xee36226510a79e76!2sUniversitas%20Pendidikan%20Indonesia!5e0!3m2!1sen!2sid!4v1679047805322!5m2!1sen!2sid" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
		<p class="pt-3">
		</p>
	</div>
</div>
</div>
@endsection