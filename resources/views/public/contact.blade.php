<!-- ======= Contact Section ======= -->
<section id="contact" class="contact">

    <!-- Bagian Atas -->
    <div class="contact-header" style="text-align: center; padding: 30px 15px; background-color: #fff;">
        <h2>Hubungi Kami</h2>
        <p>Mohon lengkapi data diri Anda dan tuliskan pertanyaan atau permintaan Anda dalam formulir di bawah ini.
           Unit Patient Relations kami akan segera membantu Anda.</p>
        <img src="assets/img/perawat.png" alt="Perawat" style="max-width: 100%; height: auto; margin-top: 20px;">
    </div>

    <div class="container mt-5">
        <div class="row g-4">

            <!-- Kolom Kiri (Info + Form) -->
            <div class="col-lg-6">

                <!-- Info Boxes -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="info-box">
                            <i class="bx bx-map"></i>
                            <h3>Alamat</h3>
                            <p>Jl. Mas Sirin No.79, Bakalankrapyak, Kec. Kaliwungu, Kabupaten Kudus, Jawa Tengah 59316</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="info-box mt-4">
                            <i class="bx bx-envelope"></i>
                            <h3>Email</h3>
                            <p>𝑟𝑠𝑠𝑎𝑟𝑘𝑖𝑒𝑠.𝑘𝑢@𝑔𝑚𝑎𝑖𝑙.𝑐𝑜𝑚</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="info-box mt-4">
                            <i class="bx bx-phone-call"></i>
                            <h3>Telepon</h3>
                            <p>(0291) 4150501</p>
                        </div>
                    </div>
                </div>

                <!-- Form Contact -->
                <div class="mt-4">
                    <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <input type="text" name="name" class="form-control" id="name"
                                    placeholder="Your Name" required>
                            </div>
                            <div class="col-md-6 form-group mt-3 mt-md-0">
                                <input type="email" class="form-control" name="email" id="email"
                                    placeholder="Your Email" required>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <input type="text" class="form-control" name="subject" id="subject"
                                placeholder="Subject" required>
                        </div>
                        <div class="form-group mt-3">
                            <textarea class="form-control" name="message" rows="7"
                                placeholder="Message" required></textarea>
                        </div>
                        <div class="my-3">
                            <div class="loading">Loading</div>
                            <div class="error-message"></div>
                            <div class="sent-message">Your message has been sent. Thank you!</div>
                        </div>
                        <div class="text-center"><button type="submit">Send Message</button></div>
                    </form>
                </div>
            </div>

            <!-- Kolom Kanan (Lokasi Kami) -->
            <div class="col-lg-6">
                <div class="card shadow-sm border-0 rounded-4 p-4">
                    <h4 class="card-title mb-3 fw-bold">Lokasi Kami</h4>

                    <!-- Map -->
                    <div class="mb-3" style="height: 250px;">
                        <iframe 
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3956.0682666402355!2d110.841247!3d-6.805048!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e70e3f54f0a7e75%3A0x51db2e0d54e0f1b!2sRSUD%20dr.%20Loekmono%20Hadi%20Kudus!5e0!3m2!1sid!2sid!4v1690000000000"
                            width="100%" 
                            height="100%" 
                            style="border:0;" 
                            allowfullscreen="" 
                            loading="lazy" 
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>

                    <!-- Button -->
                    <a href="https://maps.app.goo.gl/Vqza3tuNj1pniuC48" 
                        target="_blank" 
                        class="btn btn-dark w-100 py-2 rounded-3">
                        <i class="bi bi-send-fill me-2"></i> Dapatkan Petunjuk Arah
                    </a>
                </div>
            </div>


        </div>
    </div>

</section>
<!-- End Contact Section -->
