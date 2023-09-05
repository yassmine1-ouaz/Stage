@extends('front.masterfront')

@section('title','Front')
@include('sweetalert::alert')

@section('content')
<form action="{{route('storeReservation')}}" method="post">

    <div class="agent-details">
        <div class="d-flex align-items-center">
            <div class="agent-image"><a href="https://www.logis.tn/agent/century-21-infinity/"><img class="rounded" src="https://logistunisie.s3.amazonaws.com/uploads/2023/05/09081405/IMG_7993-150x150.jpeg" alt="" width="80" height="80"></a></div>
            <ul class="agent-information list-unstyled">
                <i class="bi bi-person"></i> {{Auth::user()->name}}</li>
                <li class="agent-phone-wrap clearfix"><i class="bi bi-telephone-fill"></i><span class="agent-phone "><a href="tel:+21625794794">+216 {{Auth::user()->phone}}</a></span><i class="houzez-icon icon-mobile-phone mr-1"></i></li>
                <li class="agent-social-media"></li>
            </ul>
        </div>
    </div>
    <div class="card-header border-0 pb-0">
        <h3>Make Reservation</h3>
    </div>

    <div class="form_messages"></div>

    <div class="row">

        <div class="col-md-6 col-sm-12">
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    <label for="exampleFormControlSelect1"> select</label>
                    <select class="form-control" name="type_id" id="exampleFormControlSelect1">
                        @forelse($users as $user)
                        <option value="{{$user->id}}">{{$user->name}}</option>
                        @empty
                        <option>NO DATA</option>

                        @endforelse
                    </select>
                </div>
            </div><!-- col-md-6 col-sm-12 -->
        </div><!-- col-md-6 col-sm-12 -->



        <div class="col-md-6 col-sm-12">
            <div class="form-group">
                <i class="bi bi-envelope fa-fw pe-1"></i>
                <label>Reservation Date</label>
                <input class="form-control" id="reserv_date" name="reserv_date" type="datetime-local">
            </div>
        </div><!-- col-md-6 col-sm-12 -->

        <div class="col-md-6 col-sm-12">
            <div class="form-group">
                <label for="exampleFormControlSelect1">Example select</label>
                <select class="form-control" name="type_id" id="exampleFormControlSelect1">
                    @forelse($immobiliers as $immobilier)
                    <option value="{{$immobilier->id}}">{{$immobilier->name}}</option>
                    @empty
                    <option>NO DATA</option>

                    @endforelse
                </select>
            </div>
        </div><!-- col-md-6 col-sm-12 -->


        <div class="col-sm-12 col-xs-12">
            <div class="form-group form-group-textarea">
                <i class="bi bi-chat-fill pe-1"></i>
                <label>Message</label>
                <textarea class="form-control hz-form-message" name="message" rows="5" placeholder="Enter your Message">Hello, I am interested in [S+2]</textarea>
            </div>
        </div><!-- col-sm-12 col-xs-12 -->


        <div class="col-sm-12 col-xs-12">

            <button type="submit" class="houzez_agent_property_form btn btn-secondary btn-sm-full-width">
                <span class="btn-loader houzez-loader-js"></span>Request Information
            </button>


        </div><!-- col-sm-12 col-xs-12 -->

    </div><!-- row -->
</form>


@endsection