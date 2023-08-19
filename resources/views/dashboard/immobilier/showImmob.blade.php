@extends('master')

@section('title','show Immobilier')

@section('content')



    <h1 class="mb-0"> Detail Immobilier </h1>
    <br>

    <div class="row-cols-5">
        <!-- General Element -->
        <div class="card col-5">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary"> Detail Immobilier </h6>
            </div>
            <div class="card-body">
                <form>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Name</label>
                        <input type="text" class="form-control" value="{{$immobilier->name}}"
                               placeholder="name"readonly>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">type</label>
                        <input type="text" class="form-control" value="{{$immobilier->typeImmob->type }}"
                               placeholder="type"readonly>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">etat</label>
                        <input type="text" class="form-control"  value="{{$immobilier->etat}}" placeholder="etat"readonly>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">surface</label>
                        <input type="text" class="form-control" value="{{$immobilier->surface}} M²" placeholder="surface"readonly>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Ville</label>
                        <input type="text" class="form-control" value="{{$immobilier->villes->name }}" placeholder="surface"readonly>
                    </div>

                    <div class="form-group">
                        <label class="form-label">description</label>
                        <textarea class="form-control"  name="description"  rows="3" readonly>{{$immobilier->description}}</textarea>

                    </div>
                    <div class="form-group">
                        <label>prix</label>
                        <input class="form-control" type="text" value="{{$immobilier->prix}} DT" placeholder="prix" readonly>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">status</label>
                        <input type="text" class="form-control"  value="{{$immobilier->status}}" placeholder="status"readonly>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Created At</label>
                        <input type="text" class="form-control" value="{{$immobilier->created_at}}"
                               placeholder="Created At"readonly>
                    </div><div class="form-group">
                        <label for="exampleFormControlInput1">Updated At</label>
                        <input type="text" class="form-control" value="{{$immobilier->updated_at}}"
                               placeholder="Updated At"readonly>
                    </div>
                    <div class="row-3">
                        <div class="col-6">

                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Name</label>
                                    <input type="text" class="form-control" value="{{$immobilier->name}}"
                                           placeholder="name"readonly>
                                </div>
                    </div>
                    </div>
                </form>
            </div>

        </div>

@endsection
