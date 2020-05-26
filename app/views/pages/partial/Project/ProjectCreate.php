
<form name="create">
    <h3>Create Project</h3>
    <div id="step-one"> <!-- set project name -->
    <label>Project Name</label>
    <div class="form-group">
        <input type="text" name="projecName" id="projecName" class="form-control" placeholder="Project Name"
        value="">
    </div>

        <div class="form-group">
            <div class="form-row">
                <div class="col">
                <label>Project Start Date</label>
                    <input type="date" name="start" id="start-date" class="form-control" placeholder="Start Date" value="">
                </div>
                <div class="col">
                <label>Project End Date</label>
                    <input type="date" name="end" id="end-date" class="form-control" placeholder="End Date" value="">
                </div>
            </div>
        </div>

        <div class="form-group">
            <input type="button" class="btn btn-info btn-md" id="btn-step-two" value="Next">
        </div>

    </div>

    <div id="step-two"> <!-- set start and end date for project -->
        <h5>Client Details</h5>
        <label>Person</label>
        <div class="form-group">
            <input type="text" name="clientName" id="clientName" class="form-control" placeholder="Client Name" value="">
        </div>
        <div class="form-group">
            <input type="text" name="contactPerson" id="contactPerson" class="form-control" placeholder="Person to contact" value="">
        </div>
        <label>Contect</label>
        <div class="form-group">
            <input type="email" name="email" id="email" class="form-control" placeholder="Email" maxlength="100" value="">
        </div>
        <div class="form-group">
            <input type="text" name="phoneHome" id="phoneHome" class="form-control" placeholder="Phone Home" maxlength="20" value="">
        </div>
        <div class="form-group">
            <input type="text" name="phoneMobile" id="phoneMobile" class="form-control" placeholder="Phone Mobile" maxlength="20" value="">
        </div>

        <div class="form-group">
            <input type="button" class="btn btn-info btn-md" id="btn-back-step-one" value="Back">
            <input type="button" class="btn btn-info btn-md" id="btn-step-three" value="Next">
        </div>
    </div>

    <div id="step-three">

        <h5>Project Address</h5>
        <label>Address</label>
        <div class="form-group">
            <input type="text" name="Address1" id="Address1" class="form-control" placeholder="Street number" value="">
        </div>
        <div class="form-group">
            <input type="text" name="Address2" id="Address2" class="form-control" placeholder="Details" value="">
        </div>
        <div class="form-group">
            <input type="text" name="Address3" id="Address3" class="form-control" placeholder="City" value="">
        </div>
        <div class="form-group">
            <input type="text" name="Address4" id="Address4" class="form-control" placeholder="County" value="">
        </div>
        <div class="form-group">
            <input type="text" name="postCode" id="postCode" class="form-control" placeholder="Postcode" value="">
        </div>
        <div class="form-group">
            <select name="country" id="country" class="form-control">
                <option value="0">Country</option>
            </select>
        </div>

        <div class="form-group">
            <input type="button" class="btn btn-info btn-md" id="btn-back-step-two" value="Back">
            <input type="button" class="btn btn-info btn-md" id="btn-project-save" value="Save">
        </div>
    </div>
</form>