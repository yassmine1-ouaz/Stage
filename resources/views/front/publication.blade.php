@include('sweetalert::alert')
<div class="card card-body">
    <div class="d-flex mb-3">
        <!-- Avatar -->
        <div class="avatar avatar-xs me-2">
            <a href="#"> <img class="avatar-img rounded-circle" src="assets/images/avatar/03.jpg" alt=""> </a>
        </div>
        <!-- Post input -->
        <form class="w-100">
            <textarea class="form-control pe-4 border-0" rows="1" data-autoresize placeholder="Share your thoughts..."></textarea>
        </form>
    </div>
    <!-- Share feed toolbar START -->
    <ul class="nav nav-pills nav-stack small fw-normal">
        <li class="nav-item">
            <a href="#" class="nav-link bg-light py-1 px-2 mb-0" data-bs-toggle="modal" data-bs-target="#modalCreateEvents"> <i class="bi bi-calendar2-event-fill text-danger pe-2"></i>Add publication </a>
        </li>


    </ul>
    <!-- Share feed toolbar END -->
</div>

<!-- Modal create events START -->
<div class="modal fade" id="modalCreateEvents" tabindex="-1" aria-labelledby="modalLabelCreateAlbum" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <!-- Modal feed header START -->
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabelCreateAlbum">Add publication</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Modal feed header END -->
            <!-- Modal feed body START -->
            <div class="modal-body">
                <!-- Form START -->
                <form class="row g-4" action="{{ route('user.home') }}" method="post" enctype="multipart/form-data">

                    @if( Session::has('success'))
                    <div class="alert-success">{{ Session::get('success')}}</div>
                    @endif
                    @if( Session::has('fail'))
                    <div class="alert-danger">{{ Session::get('fail')}}</div>
                    @endif
                    @csrf {{--***pour la secrisation****--}}

                    <!-- Title -->
                    <div class="col-12">
                        <label class="form-label">Titre</label>
                        <input type="text" class="form-control" name="name" placeholder=" name here">
                        @if(isset($errors))
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong> {{ $message }}</strong>
                        </span>
                        @enderror
                        @endif
                    </div>


                    <div class="form-group">
                        <label for="exampleFormControlSelect1"> select type</label>
                        <select class="form-control" name="immob_type" id="exampleFormControlSelect1">
                            @forelse($types as $type)
                            <option value="{{$type->id}}">{{$type->type}}</option>
                            @empty
                            <option>NO DATA</option>
                            @endforelse
                        </select>
                    </div>


                    <!-- Description -->
                    <div class="col-12">
                        <label class="form-label">Description</label>
                        <textarea class="form-control" rows="2" name="description" placeholder=""></textarea>
                        @if(isset($errors))
                        @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong> {{ $message }}</strong>
                        </span>
                        @enderror
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlSelect1"> select Ville</label>
                        <select class="form-control" name="ville_id" id="exampleFormControlSelect1">
                            <option value="">Please Select</option>

                            @forelse($villes as $ville)
                            <option value="{{$ville->id}}">{{$ville->name}}</option>
                            @empty
                            <option>NO DATA</option>

                            @endforelse
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlSelect1"> Etat</label>
                        <select class="form-control" name="etat" id="exampleFormControlSelect1">*
                            <option value="">Please Select</option>
                            <option value="A LOUER">A LOUER</option>
                            <option value="A VENDRE">A VENDRE</option>

                        </select>
                    </div>


                    <div class="col-12">
                        <label class="form-label">surface</label>
                        <input type="text" class="form-control" name="surface" placeholder="    ">
                        @if(isset($errors))
                        @error('surface')
                        <span class="invalid-feedback" role="alert">
                            <strong> {{ $message }}</strong>
                        </span>
                        @enderror
                        @endif
                    </div>

                    <div class="col-12">
                        <label class="form-label">prix</label>
                        <input type="text" class="form-control" name="prix" placeholder=" ">
                        @if(isset($errors))
                        @error('prix')
                        <span class="invalid-feedback" role="alert">
                            <strong> {{ $message }}</strong>
                        </span>
                        @enderror
                        @endif
                    </div>

                    <!--  photo START -->
                    <div>
                        <label class="form-label">Images</label>

                        <input type="file" multiple name="image[]" class="dropzone dropzone-default card shadow-none">
                        </input>

                    </div>

                    <!-- Dropzone photo END -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger-soft me-2" data-bs-dismiss="modal"> Cancel</button>
                        <button type="submit" href="" class="btn btn-success-soft">Create now</button>
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