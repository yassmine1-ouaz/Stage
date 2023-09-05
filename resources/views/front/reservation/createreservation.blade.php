<!-- Modal create events START -->
<div class="modal fade" id="modalreservation{{$immobilier->id}}" tabindex="-1" aria-labelledby="modalLabelCreateAlbum" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <!-- Modal feed header START -->
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabelCreateAlbum"> reservation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Modal feed header END -->
            <!-- Modal feed body START -->
            <div class="modal-body">
                <!-- Form START -->
                <form class="row g-4" action="{{ route('user.store-reservation') }}" method="post">
                    <input type="hidden" value="{{$immobilier->id}}" name="id">
                    @if( Session::has('success')) <div class="alert-success">{{ Session::get('success')}}
                    </div>
                    @endif
                    @if( Session::has('fail'))
                    <div class="alert-danger">{{ Session::get('fail')}}</div>
                    @endif
                    @csrf {{--***pour la secrisation****--}}



                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <i class="bi bi-envelope fa-fw pe-1"></i>
                            <label>Reservation Date</label>
                            <input class="form-control" id="reserv_date" name="reserv_date" type="datetime-local">
                        </div>
                    </div><!-- col-md-6 col-sm-12 -->
                    <!-- Description -->
                    <div class="col-12">
                        <label class="form-label">Message</label>
                        <textarea class="form-control" rows="2" name="message" placeholder=""></textarea>
                        @if(isset($errors))
                        @error('message')
                        <span class="invalid-feedback" role="alert">
                            <strong> {{ $message }}</strong>
                        </span>
                        @enderror
                        @endif
                    </div>

                    <!-- Dropzone photo END -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger-soft me-2" data-bs-dismiss="modal"> Cancel</button>
                        <button type="submit" href="" class="btn btn-success-soft">Reserve now</button>
                    </div>
                </form>
                <!-- Form END -->
            </div>
            <!-- Modal feed body END -->
            <!-- Modal footer -->
            <!-- Button -->

        </div>

    </div>
</div>
<!-- Modal create events END -->