
 <section id="chefs" class="chefs">
    <div class="container">

      <div class="section-title">
        <h2>Our Proffesional <span>Chefs</span></h2>
        <p>Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.</p>
      </div>

      <div class="row">

        @foreach($data2 as $dt)

        <div class="col-lg-4 col-md-6">
          <div class="member">
            <div class="pic"> <img src="chefimage/{{$dt->image}}" class="img-fluid" style="height: 356px; width:356px; " alt="image"> </div>
            <div class="member-info">
              <h4> {{$dt->name}} </h4>
              <span> {{$dt->speciality}} </span>
              <div class="social">
                <a href=""><i class="bi bi-twitter"></i></a>
                <a href=""><i class="bi bi-facebook"></i></a>
                <a href=""><i class="bi bi-instagram"></i></a>
                <a href=""><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>
        </div>

        @endforeach



      </div>

    </div>
  </section>