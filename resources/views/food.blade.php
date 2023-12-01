
<section id="menu" class="menu">
    <div class="container">

      <div class="section-title">
        <h2>Check our tasty <span>Menu</span></h2>
      </div>

      <div class="row">
        <div class="col-lg-12 d-flex justify-content-center">
          <ul id="menu-flters">
            <li data-filter="*" class="filter-active">Show All</li>
            <li data-filter=".filter-starters">Starters</li>
            <li data-filter=".filter-salads">Salads</li>
            <li data-filter=".filter-specialty">Specialty</li>
          </ul>
        </div>
      </div>

      <div class="row menu-container">


      @foreach($data as $dt)
      <form action="{{url('/addcart', $dt->id)}}" method="POST">
        @csrf
        <div class="col-lg-6 menu-item filter-{{$dt->filter}}">
          <div class="menu-content">
           
            <a href="#">{{ $dt->title }}</a><span> {{ $dt->price }} </span>
          </div>
          <div class="menu-ingredients">
            <img src="foodimage/{{$dt->image}}" style="height:50px; width:50px; border-radius:50%;">
            {{ $dt->description }}
            <br>

            <div class="mt-2">
              <input type="number" name="cartnum" min="1" max="15" value="1" style="width: 80px;" >
              <input type="submit" value="Add to cart">
            </div>
          </div>
        </div>
      </form>
      @endforeach



      </div>

    </div>
  </section>