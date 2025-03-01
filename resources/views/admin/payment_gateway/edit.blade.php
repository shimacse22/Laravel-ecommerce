@extends('admin.layouts.app')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create Page</h1>
                </div>
    
            </div>
        </div>
        @include('admin.message');
        <!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card custom-card">
                        <div class="card-header">
                            <h5 class="card-title">Aamarpay Payment Gateway</h5>
                        </div>
                    <form action="{{ route('update.aamarpay') }}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{ $aamarpay->id }}">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Store ID </label>
                                        <input type="text" name="store_id" value="{{ $aamarpay->store_id }}" class="form-control" placeholder="Name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="slug" class="form-label">Signature Key</label>
                                        <input type="text" name="signature_key" value="{{ $aamarpay->signature_key }}" class="form-control" placeholder="Slug">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        
                                        <input type="checkbox" name="status" value="1" @if($aamarpay->status==1) checked @endif>
                                        <label for="slug" class="form-label">Live Server</label>
                                        <small>(if not checked its use for sandbox)</small>
                                    </div>
                                </div>
        
                            </div>
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button type="reset" class="btn btn-secondary">Reset</button>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card custom-card">
                        <div class="card-header">
                            <h5 class="card-title">Surjopay Payment Gateway</h5>
                        </div>
                    <form action="#" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Store ID </label>
                                        <input type="text" name="store_id" value="{{ $surjopay->store_id }}" class="form-control" placeholder="Name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="slug" class="form-label">Signature Key</label>
                                        <input type="text" name="signature_key" value="{{$surjopay->signature_key }}" class="form-control" placeholder="Slug">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        
                                        <input type="checkbox" name="status" value="1" {{ $surjopay->status==1 ? 'checked' : "" }}>
                                        <label for="slug" class="form-label">Live Server</label>
                                    </div>
                                </div>
        
                            </div>
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button type="reset" class="btn btn-secondary">Reset</button>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card custom-card">
                        <div class="card-header">
                            <h5 class="card-title">Sslcommerz Payment Gateway</h5>
                        </div>
                    <form action="#" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Store ID </label>
                                        <input type="text" name="store_id" value="{{  $sslcommerz->store_id }}" class="form-control" placeholder="Name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="slug" class="form-label">Signature Key</label>
                                        <input type="text" name="signature_key" value="{{  $sslcommerz->signature_key }}" class="form-control" placeholder="Slug">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        
                                        <input type="checkbox" name="status" value="1" {{ $sslcommerz->status==1 ? 'checked' : "" }}>
                                        <label for="slug" class="form-label">Live Server</label>
                                    </div>
                                </div>
        
                            </div>
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button type="reset" class="btn btn-secondary">Reset</button>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- /.card -->
    @endsection
   
