@extends('main')

@section('title', 'HoofStage | Contact')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h2>Contact Me</h2>
            <hr>
            <form action="{{ url('contact') }}" method="POST">
            {{ csrf_field() }}
                <div class="form-group">
                    <label name="email">Email:</label>
                    <input name="email" id="email" class="form-control">
                </div>

                 <div class="form-group">
                    <label name="subject">Subject:</label>
                    <input name="subject" id="subject" class="form-control">
                </div>

                 <div class="form-group">
                    <label name="message">Message:</label>
                    <textarea name="message" id="message" class="form-control" placeholder="Type your message here..."></textarea>
                </div>

                <input type="submit" value="Send Message" class="btn btn-success">
            </form>
        </div>
    </div>
</div>
   
@endsection