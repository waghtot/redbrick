<?php
    if(isset($data)){
        echo "<h1>".$data->view."</h1>";
        echo "<p>".$data->data."</p>";
    }
?>

<form name="profile" id="Profile">
    <label>Person Information</label>
    <div class="form-group">
        <select name="title" id="title" class="form-control">
            <option value="0">Title</option>
        </select>
    </div>
    <div class="form-group">
        <input type="text" name="FirstName" id="firstname" class="form-control" placeholder="First Name">
    </div>
    <div class="form-group">
        <input type="text" name="LastName" id="lastname" class="form-control" placeholder="Last Name">
    </div>

    <label>Address Information</label>
    <div class="form-group">
        <input type="text" name="country" id="country" class="form-control" placeholder="Country">
    </div>
    <div class="form-group">
        <input type="text" name="city" id="city" class="form-control" placeholder="City">
    </div>
    <div class="form-group">
        <input type="text" name="PostCode" id="postcode" class="form-control" placeholder="PostCode">
    </div>

    <label>Contact Information</label>
    <div class="form-group">
        <input type="email" name="email" id="email" class="form-control" placeholder="Email Address">
    </div>
    <div class="form-group">
        <input type="text" name="mobile" id="phoneMobile" class="form-control" placeholder="Mobile">
    </div>
    <div class="form-group">
        <input type="text" name="phoneHome" id="phoneHome" class="form-control" placeholder="Land Line">
    </div>

    <label>Skills Information</label>
    <div class="form-group">
        <input type="checkbox" name="handyMan" id="handyman"> Handyman
    </div>

    <div class="form-group">
        <select name="skills" id="skills" class="form-control">
            <option value="0">Main Skill</option>
        </select>
    </div>
    <div class="form-group">
        <select name="skills" id="skills" class="form-control">
            <option value="0">Additional Skill 1</option>
        </select>
    </div>
    <div class="form-group">
        <select name="skills" id="skills" class="form-control">
            <option value="0">Additional Skill 2</option>
        </select>
    </div>
    <div class="form-group">
        <select name="skills" id="skills" class="form-control">
            <option value="0">Additional Skill 3</option>
        </select>
    </div>
    <div class="form-group">
        <input type="checkbox" name="cscs" id="cscs"> Valid CSCS card
    </div>

    <div class="form-group">
        <input type="button" class="btn btn-info btn-md" id="btn-profile" value="Save">
    </div>

</form>