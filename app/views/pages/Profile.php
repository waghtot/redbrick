<?php
    if(isset($data)){
        echo "<h1>".$data->view."</h1>";
        echo "<p>".$data->data."</p>";
        // echo "<pre>".print_r($data->person, 1)."</pre>";
        // echo "<pre>".print_r($data->profile, 1)."</pre>";
    }
?>

<form name="profile" id="Profile">
    <label>Person Information</label>
    <div class="form-group">
    <select name="title" id="title" class="form-control">
            <?php
                foreach($data->title as $key=>$value){
                    echo "<option value=\"".$key."\"";
                    if(isset($data->person) && $data->person->title_Id == $key )
                    {
                        echo " selected";
                    }   
                    echo ">".$value."</option>\n";
                }
            ?>
        </select>
    </div>
    <div class="form-group">
        <input type="text" name="FirstName" id="firstname" class="form-control" placeholder="First Name"
         value="<?php if(isset($data->person)){echo $data->person->firstName;} ?>">
    </div>
    <div class="form-group">
        <input type="text" name="LastName" id="lastname" class="form-control" placeholder="Last Name"
        value="<?php if(isset($data->person)){echo $data->person->lastName;} ?>">
    </div>

    <label>Address Information</label>
    <div class="form-group">

        <select name="country" id="country" class="form-control">
            <?php
                foreach($data->country as $key=>$value){
                    echo "<option value=\"".$key."\"";
                        if(isset($data->person) && $data->person->country == $key){
                            echo " selected ";                            
                        }else{
                            if($key == "826"){
                                echo " selected ";
                            }
                        }
                    echo ">".$value."</option>\n";
                }
            ?>
        </select>
    </div>
    <div class="form-group">
        <input type="text" name="city" id="city" class="form-control" placeholder="City"
            value="<?php if(isset($data->person)){echo $data->person->AddressLine3; }?>">
    </div>
    <div class="form-group">
        <input type="text" name="PostCode" id="postcode" class="form-control" placeholder="PostCode"
        value="<?php if(isset($data->person)){echo $data->person->postCode; }?>">
    </div>

    <label>Contact Information</label>
    <div class="form-group">
        <input type="email" name="email" id="email" class="form-control" placeholder="Email Address"
        value="<?php if(isset($data->person)){echo $data->person->email; }?>">
    </div>
    <div class="form-group">
        <input type="text" name="mobile" id="phoneMobile" class="form-control" placeholder="Mobile"
        value="<?php if(isset($data->person)){echo $data->person->phoneMobile; }?>">
    </div>
    <div class="form-group">
        <input type="text" name="phoneHome" id="phoneHome" class="form-control" placeholder="Land Line"
        value="<?php if(isset($data->person)){echo $data->person->phoneHome; }?>">
    </div>
    <label>About Me</label>
    <div class="form-group">
        <textarea name="aboutme" id="aboutme" class="form-control" placeholder="About me"><?php 
            if(isset($data->profile)){echo $data->profile->about; }
        ?></textarea>
    </div>

    <label>Skills Information</label>
    <div class="form-group">
        <select name="skills" id="skills1" class="form-control">
            <option value="0">My profession</option>
            <?php
                foreach($data->jobtitle as $key=>$value){
                    echo "<option value=\"".$key."\"";
                        if(isset($data->profile) && $data->profile->skill1 == $key ){echo " selected "; }
                    echo ">".$value."</option>\n";
                }
            ?>
        </select>
    </div>
    <div class="form-group">
        <select name="skills" id="skills2" class="form-control">
            <option value="0">Additional Skill 1</option>
            <?php
                foreach($data->jobtitle as $key=>$value){
                    echo "<option value=\"".$key."\"";
                        if(isset($data->profile) && $data->profile->skill2 == $key ){echo " selected "; }
                    echo ">".$value."</option>\n";
                }
            ?>
        </select>
    </div>
    <div class="form-group">
        <select name="skills" id="skills3" class="form-control">
            <option value="0">Additional Skill 2</option>
            <?php
                foreach($data->jobtitle as $key=>$value){
                    echo "<option value=\"".$key."\"";
                        if(isset($data->profile) && $data->profile->skill3 == $key ){echo " selected "; }
                    echo ">".$value."</option>\n";
                }
            ?>
        </select>
    </div>
    <div class="form-group">
        <select name="skills" id="skills4" class="form-control">
            <option value="0">Additional Skill 3</option>
            <?php
                foreach($data->jobtitle as $key=>$value){
                    echo "<option value=\"".$key."\"";
                        if(isset($data->profile) && $data->profile->skill4 == $key ){echo " selected "; }
                    echo ">".$value."</option>\n";
                }
            ?>
        </select>
    </div>
    <div class="form-group">
        <input type="checkbox" name="cscs" id="cscs"
            <?php if(isset($data->profile) && $data->profile->cscs == 1 ){echo " checked "; }?>
        > Valid CSCS card
    </div>

    <div class="form-group">
        <input type="button" class="btn btn-info btn-md" id="<?php echo $data->person->button; ?>" value="Save">
    </div>

</form>