<form method="post" action="{{ route('admin.cars.edit.store_ch_data', ['id' => $car->id]) }}?type=ch_driver"
    onsuccess="storeChaufferData" onfailure="showError" enctype="multipart/form-data">
    @csrf

    <div class="row">
        <div class="col-md-4 mb-3">
            <label for="driverName" class="form-label">Driver Name</label>
            <input type="text" class="form-control" id="driverName"
                name="name" placeholder="John Doe" maxlength="20" value="{{ isset($car->driver['name']) ? $car->driver['name'] : '' }}">
        </div>
        <div class="col-md-4 mb-3">
            <label for="driverPhoto" class="form-label">Photo</label>
            <input type="file" class="form-control" id="driverPhoto"
                name="photo">
        </div>
        <div class="col-md-4 mb-3">
            <label for="yearsExperience" class="form-label">Years of
                Experience</label>
            <input type="text" class="form-control" id="yearsExperience"
                name="years_experience" placeholder="15 years"
                pattern="^[0-9]+(\.[0-9]{2}){0,1}$" step="0.01" maxlength="20"
                value="{{ isset($car->driver['years_experience']) ? $car->driver['years_experience'] : '' }}">
        </div>
        <div class="col-md-4 mb-3">
            <label for="specialSkills" class="form-label">Special Skills</label>
            <input type="text" class="form-control" id="specialSkills"
                name="special_skills"
                placeholder="Defensive driving, off-road driving" maxlength="20"
                value="{{ isset($car->driver['special_skills']) ? $car->driver['special_skills'] : '' }}">
        </div>
        <div class="col-md-4 mb-3">
            <label for="primaryLanguage" class="form-label">Primary Language</label>
            <input type="text" class="form-control" id="primaryLanguage"
                name="primary_language" placeholder="English"
                maxlength="20" value="{{ isset($car->driver['primary_language']) ? $car->driver['primary_language'] : '' }}">
        </div>
        <div class="col-md-4 mb-3">
            <label for="additionalLanguages" class="form-label">Additional
                Languages</label>
            <input type="text" class="form-control" id="additionalLanguages"
                name="additional_languages"
                placeholder="Spanish, French" maxlength="20"
                value="{{ isset($car->driver['additional_languages']) ? $car->driver['additional_languages'] : '' }}">
        </div>
        <div class="col-md-4 mb-3">
            <label for="areaExpertise" class="form-label">Area Expertise</label>
            <input type="text" class="form-control" id="areaExpertise"
                name="area_expertise" placeholder="New York City"
                maxlength="20"
                value="{{ isset($car->driver['area_expertise']) ? $car->driver['area_expertise'] : '' }}">
        </div>
        <div class="col-md-4 mb-3">
            <label for="tourGuideExperience" class="form-label">Tour Guide
                Experience</label>
            <input type="text" class="form-control" id="tourGuideExperience"
                name="tour_guide_experience" placeholder="5 years"
                maxlength="20"
                value="{{ isset($car->driver['tour_guide_experience']) ? $car->driver['tour_guide_experience'] : '' }}">
        </div>
        <div class="col-md-4 mb-3">
            <label for="drivingLicenses" class="form-label">Driving Licenses</label>
            <input type="text" class="form-control" id="drivingLicenses"
                name="driving_licenses"
                placeholder="CDL, motorcycle license" maxlength="20"
                value="{{ isset($car->driver['driving_licenses']) ? $car->driver['driving_licenses'] : '' }}">
        </div>
        <div class="col-md-4 mb-3">
            <label for="certifications" class="form-label">Certifications</label>
            <input type="text" class="form-control" id="certifications"
                name="certifications"
                placeholder="First Aid Certified, Advanced Defensive Driving"
                maxlength="20"
                value="{{ isset($car->driver['certifications']) ? $car->driver['certifications'] : '' }}">
        </div>
        <div class="col-md-4 mb-3">
            <label for="workHours" class="form-label">Work Hours</label>
            <input type="text" class="form-control" id="workHours"
                name="work_hours" placeholder="8:00 AM to 8:00 PM"
                value="{{ isset($car->driver['work_hours']) ? $car->driver['work_hours'] : '' }}">
        </div>
        <div class="col-md-4 mb-3">
            <label for="daysOff" class="form-label">Days Off</label>
            <input type="text" class="form-control" id="daysOff"
                name="days_off"
                placeholder="Sundays and public holidays" maxlength="20"
                value="{{ isset($car->driver['days_off']) ? $car->driver['days_off'] : '' }}">
        </div>
        <div class="col-md-4 mb-3">
            <label for="phoneNumber" class="form-label">Phone Number</label>
            <input type="tel" class="form-control" id="phoneNumber"
                name="phone_number" placeholder="(555) 123-4567"
                value="{{ isset($car->driver['phone_number']) ? $car->driver['phone_number'] : '' }}">
        </div>
        <div class="col-md-4 mb-3">
            <label for="emailAddress" class="form-label">Email Address</label>
            <input type="email" class="form-control" id="emailAddress"
                name="email_address"
                placeholder="john.doe@example.com"
                value="{{ isset($car->driver['email_address']) ? $car->driver['email_address'] : '' }}">
        </div>
        <div class="col-md-4 mb-3">
            <label for="overallRating" class="form-label">Overall Rating</label>
            <input type="text" class="form-control" id="overallRating"
                name="overall_rating"
                placeholder="★★★★☆ (4.8 out of 5)" maxlength="20"
                value="{{ isset($car->driver['overall_rating']) ? $car->driver['overall_rating'] : '' }}">
        </div>
        <div class="col-md-4 mb-3">
            <div class="mb-3">
                <label for="customerReviews" class="form-label">Customer
                    Reviews</label>
                <textarea class="form-control" id="customerReviews" rows="4" name="customer_reviews"
                    placeholder='"John was an excellent driver and guide..."'
                    >{{ isset($car->driver['customer_reviews']) ? $car->driver['customer_reviews'] : '' }}</textarea>
            </div>
        </div>
    </div>

    <!-- Terms and Conditions -->
    <h4 class="mt-4">Terms and Conditions</h4>

    <div class="mb-3">
        <label for="workingHours" class="form-label">Driver's Working Hours</label>
        <textarea class="form-control" id="workingHours" rows="3" name="working_hours"
            placeholder="Standard Hours, Overtime...">{{ isset($car->driver['working_hours']) ? $car->driver['working_hours'] : '' }}</textarea>
    </div>
    <div class="mb-3">
        <label for="driverBreaks" class="form-label">Driver Breaks</label>
        <textarea class="form-control" id="driverBreaks" rows="3" name="driver_breaks"
            placeholder="Mandatory Breaks, Extended Trips...">{{ isset($car->driver['driver_breaks']) ? $car->driver['driver_breaks'] : '' }}</textarea>
    </div>
    <div class="mb-3">
        <label for="accommodation" class="form-label">Accommodation for Overnight
            Stays</label>
        <textarea class="form-control" id="accommodation" rows="3" name="accommodation"
            placeholder="Customer Responsibility, Additional Charges...">{{ isset($car->driver['accommodation']) ? $car->driver['accommodation'] : '' }}</textarea>
    </div>
    <div class="mb-3">
        <label for="food" class="form-label">Driver’s Food</label>
        <textarea class="form-control" id="food" rows="3" name="food"
            placeholder="During Standard Hours, Overtime and Overnight...">{{ isset($car->driver['food']) ? $car->driver['food'] : '' }}</textarea>
    </div>
    <div class="mb-3">
        <label for="tollTax" class="form-label">Toll Tax</label>
        <textarea class="form-control" id="tollTax" rows="3" name="toll_tax"
            placeholder="Customer Responsibility, Reimbursement...">{{ isset($car->driver['toll_tax']) ? $car->driver['toll_tax'] : '' }}</textarea>
    </div>
    <div class="mb-3">
        <label for="dropoffLocation" class="form-label">Drop-off Location</label>
        <textarea class="form-control" id="dropoffLocation" rows="3" name="dropoff_location"
            placeholder="Different Drop-off Location...">{{ isset($car->driver['dropoff_location']) ? $car->driver['dropoff_location'] : '' }}</textarea>
    </div>
    <div class="mb-3">
        <label for="miscellaneous" class="form-label">Miscellaneous</label>
        <textarea class="form-control" id="miscellaneous" rows="3" name="miscellaneous"
            placeholder="Traffic Violations, Personal Belongings, Cancellation Policy...">{{ isset($car->driver['miscellaneous']) ? $car->driver['miscellaneous'] : '' }}</textarea>
    </div>

    <button type="submit" class="d-none" id="submit_button">Submit</button>
</form>

@push('car_edit_form_button')
    <button type="submit" onclick="triggerSubmit()" class="btn btn-lg btn-primary">Save</button>
@endpush

<script type="text/javascript">
    function triggerSubmit() {
        jQuery('#submit_button').trigger('click')
    }

    function storeChaufferData(response){
        if(response.status == 'success'){
            NioApp.Toast(response.message, 'success', {
                position: 'top-right'
            });
        } else {
            showError(response);
        }
    }
</script>
