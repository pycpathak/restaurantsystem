{{--  
@if($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show text-center">
    <button type="button" class="btn-close"      {{ $message }}

    </div>
@endif --}}
 <!-- ======= Book A Table Section ======= -->
    <section id="book-a-table" class="book-a-table">
        <div class="container">
  
          <div class="section-title">
            <h2>Book a <span>Table</span></h2>
            <p>Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.</p>
          </div>
  
          <form action="{{url('/reservation')}}" method="post" >
            @csrf
            <div class="row">
              <div class="col-lg-4 col-md-6 form-group">  
                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name *" value="{{old('name')}}">        
                <span class="text-danger">
                  @error('name')
                      {{ $message }}
                  @enderror
                </span>
                
              </div>
              <div class="col-lg-4 col-md-6 form-group mt-3 mt-md-0">
                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email " value="{{old('email')}}" >
                
              </div>
              <div class="col-lg-4 col-md-6 form-group mt-3 mt-md-0">
              
                <input type="tel" class="form-control  @error('phone') is-invalid @enderror" name="phone" id="phone" placeholder="Your Phone *" value="{{old('phone')}}" >
                <span class="text-danger">
                  @error('phone')
                      {{ $message }}
                  @enderror
                </span>
                
              </div>
            </div>
            <div class="row">
              <div class="col-lg-4 col-md-6 form-group mt-3">
                <input type="date" name="date"  class="form-control" id="date" min= "{{date("Y-m-d")}}" value="{{old('date')}}" >

                <span class="text-danger">
                  @error('date')
                      {{ $message }}
                  @enderror
                </span>
                
                
              </div>
              <div class="col-lg-4 col-md-6 form-group mt-3">
                <input type="time" class="form-control" name="time" id="time"  value="{{old('time')}}">
                
              </div>
              <div class="col-lg-4 col-md-6 form-group mt-3">
                
                <input type="number" class="form-control" name="people" id="people" placeholder="# of people *" value="{{old('people')}}" >
                <span class="text-danger">
                  @error('people')
                      {{ $message }}
                  @enderror
                </span>
                
              </div>
            </div>
            <div class="form-group mt-3">
              <label > Write Message </label>
              <textarea class="form-control" name="message" rows="3" placeholder="Message"> {{old('message')}} </textarea>
              
            </div>

            <div class="text-center mt-3"><button type="submit" style="color: #ffb03b; font-size: 20px;
              font-weight: 700; " > Submit Data </button></div>
          </form>
          
  
        </div>
      </section><!-- End Book A Table Section -->
  