@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <form class="form-group" method="post" action="{{route('contacts.store')}}">
                @csrf
                <div class="container">
                    <p><b>Basic Info</b></p>
                    <hr />
                    <div class="form-row m-2">
                        <div class="form-group col-md-9">
                            <label>Account Name:</label>
                            <input type="text" name="account_name" id="account_name" class="form-control">
                            <input type="hidden" name="contact_id" id="contact_id">
                        </div>
                        <div class="col-md-3">
                            <label for="contact_country">Country</label>
                            <input list="countryLists" name="contact_country" id="contact_country" class="form-control">
                            <datalist id="countryLists">
                                {{ getCountry()}}
                            </datalist>
                        </div>
                    </div>
                    <p><b>Address Info</b></p>
                    <hr />
                    <div class="form-row m-2">
                        <div class="col-md-6">
                            <label>Full Address:</label>
                            <textarea name="full_address" id="full_address" class="form-control" rows="3"></textarea>
                        </div>
                        <div class="col-md-6">
                            <label>Alternate Address</label>
                            <textarea name="alternate_address" id="alternate_address" class="form-control"
                                rows="3"></textarea>
                        </div>
                    </div>
                    <p><b>Contact Info</b></p>
                    <hr />
                    <div class="form-row m-2">
                        <div class="col-md-4">
                            <label>Contact Person</label>
                            <input type="text" name="contact_person" id="contact_person" class="form-control"
                                placeholder="Fullname">
                        </div>
                        <div class="col-md-4">
                            <label>Email</label>
                            <input type="email" name="contact_email" id="contact_email" class="form-control"
                                placeholder="email">
                        </div>
                        <div class="col-md-4">
                            <label>Mobile Phone</label>
                            <input type="text" name="contact_phone" id="contact_phone" class="form-control">
                        </div>
                    </div>
                    <div class="form-row m-2">
                        <div class="col-md-4">
                            <label>Alternative Contact </label>
                            <input type="text" name="alternative_person" id="alternative_person" class="form-control"
                                placeholder="Fullname">
                        </div>
                        <div class="col-md-4">
                            <label>Email</label>
                            <input type="email" name="alternative_person_email" id="alternative_person_email"
                                class="form-control" placeholder="email">
                        </div>
                        <div class="col-md-4">
                            <label>Mobile Phone</label>
                            <input type="text" name="alternative_person_phone" id="alternative_person_phone"
                                class="form-control">
                        </div>
                    </div>

                    <div class="form-group m-4">
                        <button type="submit" class="btn btn-primary">Add Contact</button>
                    </div>

                </div>
        </div>
        </form>
    </div>
</div>
</div>
@endsection