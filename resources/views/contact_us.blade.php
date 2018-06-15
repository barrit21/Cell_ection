@section('content')

<script>
  $(function(){
    $('#emailform').submit(function(event) {
      var verified = grecaptcha.getResponse();
      if (verified.length === 0) {
        event.preventDefault();
      }
    });
  });
</script>

<div class="content-wrapper">
  <div class="container">

    <nav aria-label="...">
      <ul class="pager">
        <li class="previous"><a href="/"><p class="glyphicon glyphicon-arrow-left" aria-hidden="true"></p></a></li>
      </ul>
    </nav>       

    <!-- Contact us menu -->
    <div>
        @if (Session::has('flash_message'))
          <div class="alert alert-success" role="alert">
            {{Session::get('flash_message')}}
          </div>
        @endif
        <div class="jumbotron">
          <h1 class="text-center">Contact Us</h1> </br>
          <div class="col-sm-12">
            <blockquote class="blockquote-reverse">
              <p>For any questions, please fill in the fields below. We will be happy to answer you as soon as possible.</p>
            </blockquote>
          </div> 

        <form class="form-horizontal" method="POST" id="emailform">
          {{csrf_field() }}
          <div class="form-group">
            <label for="inputEmail" class="col-sm-2 control-label">Email</label>
            <div class="col-sm-10">
              <input type="email" class="form-control" id="inputEmail" placeholder="email@example.com" name='email'>
              @if ($errors->has('email'))
                <small class="alert alert-warning alert-dismissible">{{ $errors-> first('email') }}</small>
              @endif
            </div>
          </div>

          <div class="form-group">
            <label for="inputSubject" class="col-sm-2 control-label">Subject</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputSubject" placeholder="Your subject here." name="subject">
              @if ($errors->has('subject'))
                <small class="alert alert-warning alert-dismissible">{{ $errors-> first('subject') }}</small>
              @endif
            </div>
          </div>

          <div class="form-group">
            <label for="inputMessage" class="col-sm-2 control-label" placeholder="Your message here.">Message</label>
            <div class="col-sm-10">
              <textarea class="form-control" rows="3" name="message"></textarea>
              @if ($errors->has('message'))
                <small class="alert alert-warning alert-dismissible">{{ $errors-> first('message') }}</small>
              @endif
            </div>
          </div>

          <div class="g-recaptcha" data-sitekey="{{env('GOOGLE_RECAPTCHA_KEY')}}">
          </div>

          <div class="form-group" align="right">
            <button type="submit" class="btn btn-default" type="submit">Send</button>
          </div>

        </form>

        </div>
    
    </div>
  </div>
</div>

@stop