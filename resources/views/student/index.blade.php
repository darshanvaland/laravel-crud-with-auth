
@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('student/css/style.css') }}">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="alert alert-primary alert-dismissible fade show" role="alert"  style="display:none;">
                    <span id="succes-alert"></span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                <div class="container m-4">
                    <form action="" method="POST" id="student_form">
                        @csrf
                        <input type="text" id="id" name="id" value="" hidden>
                        <div class="col-md-12 row">
                            <div class="col-md-6">
                                <label for="name">Name:</label>
                                <input type="text" name="name" class="form-control" id="name" placeholder="Enter your name">
                                <span id="span_name"></span>
                            </div>
                            <div class="col-md-6">
                                <label for="email">Email:</label>
                                <input type="text" name="email" class="form-control" id="email" placeholder="Enter your name">
                                <span id="span_email"></span>
                            </div>
                        </div>
                        <div class="col-md-12 row mt-3">
                            <div class="col-md-6">
                                <label for="phone">Phone:</label>
                                <input type="text" name="phone" class="form-control" id="phone" placeholder="Enter your phone">
                                <span id="span_phone"></span>
                            </div>
                            <div class="col-md-6">
                                <label for="gender" >Gender:</label> <br>
                                <input type="radio" name="gender" value="Male"> Male
                                <input type="radio" name="gender" value="Feale"> Female
                                <input type="radio" name="gender" value="Other"> Other
                                <span id="span_gender"></span>
                            </div>
                        </div><div class="col-md-12 row mt-3">
                            <div class="col-md-6">
                                <label for="city">City:</label>
                                <select name="city" id="city" class="form-control">
                                    <option value="0">Select Your City</option>
                                    <option value="Virpur">Virpur</option>
                                    <option value="Balasinor">Balasinor</option>
                                    <option value="Godhra">Godhra</option>
                                </select>
                                <span id="span_city"></span>
                            </div>
                            <div class="col-md-6">
                                <label for="hobby">Hobby:</label> <br>
                                <input type="checkbox" name="hobby[]" value="Code">Code
                                <input type="checkbox" name="hobby[]" value="Travel">Travel
                                <input type="checkbox" name="hobby[]" value="Run">Run
                                <span id="span_hobby"></span>
                            </div>
                        </div><div class="col-md-12 row mt-3">
                            <div class="col-md-6">
                                <label for="address">Address:</label>
                                <textarea name="address" id="adresss" class="form-control" cols="20" rows="2" placeholder="Enter your address"></textarea>
                                <span id="span_adress"></span>
                            </div>
                            <div class="col-md-6 mt-5">
                                <button class="btn btn-success" type="button" id="submit" >Save</button>
                                <button class="btn btn-danger" type="reset" id="resetbtn" >Reset</button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
        <div class="col-md-12 mt-4">
            <table class="table table-striped data-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Gender</th>
                        <th>City</th>
                        <th>Hobby</th>
                        <th>Address</th>
                        <th>Action</th>
                    </tr>
                </thead>
                
            </table>
        </div>

    </div>
</div>
@endsection
{{-- <link rel="stylesheet" href="{{ asset('student/css/style.css') }}"> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
<script src="{{ asset('student/js/student.js') }}"> 
</script>