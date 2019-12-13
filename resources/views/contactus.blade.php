@extends('layouts.master')
@section('content')
<div class="contact-us-container">
<div class="container contact-us">
    <div class="row">
        <div class="col-md-6 col-left d-flex justify-content-center align-items-center ">
            <div class="col-left-text">
                <div class="d-flex flex-row">
                    <i class="fas fa-map-marker-alt pr-21"></i>
                    <div>
                        <h4>Address</h4>
                        <p>75-81 Stirling Rd, Acton, London 8DJ, United Kingdom</p>
                    </div>
                </div>
                <div class="d-flex flex-row">
                    <i class="fas fa-phone-alt"></i>
                    <div>
                        <h4>Let's Talk</h4>
                        <p>+44 20 8992 6923</p>
                    </div>
                </div>
                <div class="d-flex flex-row">
                    <i class="far fa-envelope"></i>
                    <div>
                        <h4>General Support</h4>
                        <p>contact@example.com</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-right">
            <h2>Drop Us A Line</h2>
            <form class="mt-5">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputFirstname">First Name *</label>
                        <input type="name" class="form-control" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputLastname">Last Name *</label>
                        <input type="name" class="form-control" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Email</label>
                        <input type="email" class="form-control" id="inputEmail4">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPhone4">Phone Number *</label>
                        <input type="text" class="form-control" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="inputCity">Address</label>
                        <input type="text" class="form-control" id="inputCity">
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">We're all ears! *</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
            </form>
        </div>
    </div>
</div>
</div>

@endsection