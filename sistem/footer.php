<?php include '../asset/css/gelombang-svg.html'; ?>

        <footer class="footer" style="background-color: #3F9A74; margin-top: -10px;" id="contact-us">
            <div class="container">
                <div class="row">
                    <!-- Footer Location-->
                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <h4 class="text-uppercase mb-4" align="center">Our Social Media</h4>
                            <div class="content-baru">
                        <center><a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-twitter"></i></a>
                        <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-instagram"></i></i></a>
                        <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-line"></i></a>
                        <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-youtube"></i></a></center>

                </div>
                    </div>
                    <!-- Footer Social Icons-->
                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <h4 class="text-uppercase mb-4" align="center">Dimana Kita?</h4>
                        <p align="justify"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2800.3264592056316!2d107.62739703411766!3d-6.978658538056239!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e9af0369adf3%3A0x122e47e3c362e2b4!2sFakultas%20Teknik%20Elektro%20-%20Telkom%20University!5e0!3m2!1sid!2sid!4v1617202862095!5m2!1sid!2sid" style="border:0; width: 325px; height: 250px; border-radius: 20px; box-shadow: 0 16px 38px -12px rgba(0, 0, 0, 0.56), 0 4px 25px 0px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.2);" allowfullscreen="" loading="lazy"></iframe></p>
                    
                    </div>
                    <!-- Footer About Text-->
                    <div class="col-lg-4">
                    <h4 class="text-uppercase mb-4" align="center">Contact Us!</h4>
                    <div class="alert alert-success alert-dismissible fade show d-none my-alert" role="alert">
                        <strong>Terima Kasih</strong> Pesan anda sudah kami terima.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form name="message">
                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="Masukkan Email" id="email" style="border: none;" name="email">
                        </div>
                        <br>
                        <div class="form-group" style="margin-top: -20px;">
                            <textarea class="form-control" placeholder="Masukkan Pesan" style="border: none;" name="pesan"></textarea>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary custom-mail" style="float: right; background-color: #006D6D; border: none; border-radius: 20px; margin-top: -20px; ">Submit</button>
                    </form>
                </div>
            </div>
        </div>
        <p style="text-align: center; margin-top: 50px; color:white; margin-bottom: -50px;">&copy Copyright Tangan.id- 2021</p>
        </footer>

</body>
</html>
<!--Message-->
<script>
  const scriptURL = 'https://script.google.com/macros/s/AKfycbwe64BzvenRAX4ilqvMLl10F4Wag4YHzVINADuECdpIkeuebZ2AOpmR3LmBRqJbSePYHg/exec'
  const form = document.forms['message']
  const myAlert=document.querySelector('.my-alert')
  

  form.addEventListener('submit', e => {
    e.preventDefault()
    fetch(scriptURL, { method: 'POST', body: new FormData(form)})
      .then(response =>{ 
          //ketika tombol submit dikirim
          myAlert.classList.toggle('d-none')
          console.log('Success!', response)
          form.reset()
          })
      .catch(error => console.error('Error!', error.message))
  })
</script>

<!-- GLARE CARD -->
<script type="text/javascript" src="../asset/js/vanilla-tilt.js"></script>
<script type="text/javascript">
    VanillaTilt.init(document.querySelectorAll(".kartu"),{
        max:25,
        speed:400,
        glare:true,
        "max-glare":1,
    });
</script>


<!-- NAVBAR SCROLLING GANTI WARNA-->
<script type="text/javascript">
        $(window).on("scroll", function(){
            if($(window).scrollTop() > 100){
                $(".tambahan-ku").addClass("active");
            } else {
                $(".tambahan-ku").removeClass("active");
            }
        });
</script>


<!-- SCROLL BUTTON -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js" 
        integrity="sha384-tsQFqpEReu7ZLhBV2VZlAu7zcOV+rXbYlF2cqB8txI/8aZajjp4Bqd+V6D5IgvKT" 
        crossorigin="anonymous">
</script>
<script type="text/javascript">
    $(document).ready(function(){

    $(".sscroll").on('click', function(event) {
          if (this.hash !== "") {
            event.preventDefault();
            var hash = this.hash;
            $('html, body').animate({
              scrollTop: $(hash).offset().top
            }, 1200, function(){
              
            });
          }
        });
        
    });
</script>
