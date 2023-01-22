 <!-- start profile -->

    <div id="profile" class="profile lity-hide">


        <form method="post" action="editprofile.php" enctype="multipart/form-data" id="proform">
            <div class="hideprofiletable">

                <table>

                    <!-- <div class="outercircle">

                        <div class="innercircle">
 -->
                            <div class="upload-btn-wrapper">
                                      <button class="btn">Upload</button>
                                      <input type="file" name="photo">
                            </div>

                      <!--   </div>

                    </div> -->  

                    <tr>
                        <td>
                            <i class="fa fa-bank">&nbsp;&nbsp;&nbsp;</i>Name&nbsp;&nbsp;<b style="color:red"> *</b>
                        </td>

                        <td>
                            <input type="text" name="name" value="<?php echo $rowprofile['OName'] ?>" class="inputprofile" id="proname">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <i class="fa fa-google">&nbsp;&nbsp;&nbsp;</i>Email&nbsp;&nbsp;<b style="color:red"> *</b>
                        </td>

                        <td>
                            <input type="text" name="email" value="<?php echo $rowprofile['Email'] ?>" class="inputprofile" id="proemail">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <i class="fa fa-credit-card">&nbsp;&nbsp;&nbsp;</i>NRC&nbsp;&nbsp;<b style="color:red"> *</b>
                        </td>

                        <td>
                            <input type="text" name="nrc" value="<?php echo $rowprofile['NRC'] ?>" class="inputprofile" id="pronrc">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <i class="fa fa-location-arrow">&nbsp;&nbsp;&nbsp;</i>Address&nbsp;&nbsp;
                        </td>

                        <td>
                            <input type="text" name="address" value="<?php echo $rowprofile['Address'] ?>" class="inputprofile" id="proaddress">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <i class="fa fa-birthday-cake">&nbsp;&nbsp;&nbsp;</i>DOB&nbsp;&nbsp;
                        </td>

                        <td>
                            <input type="date" name="dob" value="<?php echo $rowprofile['DateOfBirth'] ?>" class="inputprofile" id="prodob">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <i class="fa fa-phone">&nbsp;&nbsp;&nbsp;</i>Phone&nbsp;&nbsp;<b style="color:red"> *</b>
                        </td>

                        <td>
                            <input type="text" name="phone" value="<?php echo $rowprofile['PhoneNo'] ?>" class="inputprofile" id="prophone">
                        </td>
                    </tr>

                </table>
            </div>



            <div class="profilebox">

                <div class="profileimgbox">

                    <div class="outercircle">

                        <div class="innercircle">
                            <?php $photo = $rowprofile['Photo'];
                            echo "<script> alert($photo); </script>"; ?>
                            <img src="<?php echo $rowprofile['Photo'] ?>" style="width: 170px;height: 170px;border-radius: 50%;" data-lity data-lity-desc="Photo of a flower" alt="*-*">

                        </div>

                    </div>


                    <h1><?php $oname = $rowprofile['OName'];
                        echo $oname; ?></h1>

                    <p class="bio">Hello, My name is <?php echo $oname; ?>. I'm a UIT student.</p>

                </div>


                <div class="profilecontent">
                    <div class="showprofiletable">
                        <table>
                            <tr>
                                <td>
                                    <i class="fa fa-bank">&nbsp;&nbsp;&nbsp;</i>Name&nbsp;&nbsp;
                                </td>

                                <td>
                                    <?php echo $rowprofile['OName'] ?>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <i class="fa fa-google">&nbsp;&nbsp;&nbsp;</i>Email&nbsp;&nbsp;
                                </td>

                                <td>
                                    <?php echo $rowprofile['Email'] ?>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <i class="fa fa-credit-card">&nbsp;&nbsp;&nbsp;</i>NRC&nbsp;&nbsp;
                                </td>

                                <td>
                                    <?php echo $rowprofile['NRC'] ?>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <i class="fa fa-location-arrow">&nbsp;&nbsp;&nbsp;</i>Address&nbsp;&nbsp;
                                </td>

                                <td>
                                    <?php echo $rowprofile['Address'] ?>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <i class="fa fa-birthday-cake">&nbsp;&nbsp;&nbsp;</i>DOB&nbsp;&nbsp;
                                </td>

                                <td>
                                    <?php

                                    $dob = $rowprofile['DateOfBirth'];
                                    $day = (int) substr($dob, 8, 2);
                                    $month = (int) substr($dob, 5, 2);
                                    $year  = (int) substr($dob, 0, 4);
                                    echo $month . "/" . $day . "/" . $year;

                                    ?>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <i class="fa fa-phone">&nbsp;&nbsp;&nbsp;</i>Phone&nbsp;&nbsp;
                                </td>

                                <td>
                                    <?php echo $rowprofile['PhoneNo'] ?>
                                </td>
                            </tr>

                        </table>
                    </div>



                </div>
            </div>

            <div class="profilebutton">

                <button class="profilenext">Edit</button>
                <button class="profileback">Back</button>
                <button class="profilesubmit">Save</button>

            </div>

<!-- 
            <script>
                var form = $('#proform');
                var proname = $("#proname");
                var proemail = $("#proemail");
                var pronrc = $("#pronrc");
                var prophone = $("#prophone");

                $(form).submit(function(event) {
                    function isValidEmail(email) {
                        var emailRegExp = /^([a-z 0-9])+\.?([a-z 0-9])+\@([a-z])+\.(com|org|edu)\.?([a-z]+)?$/gi;
                        return (emailRegExp.test(email));
                    }

                    function isValidNRC(nrc) {
                        var nrcRegExp = /^[0-9]+\/\w+\([A-Z]\)[0-9]{6}$/gi;
                        return (nrcRegExp.test(nrc));
                    }

                    function isValidPhone(tel) {
                        var telRegExp = /^[0-9]{2}[0-9]{9,13}$/gi;
                        return (telRegExp.test(tel));
                    }
                    // Stop the browser from submitting the form.
                    event.preventDefault();

                    proname.css("border", "1px solid lightgray");
                    proemail.css("border", "1px solid lightgray");
                    pronrc.css("border", "1px solid lightgray");
                    prophone.css("border", "1px solid lightgray");
                    var flag = 1;
                    // TODO
                    if (proname.val() == 0 || proemail.val() == 0 || pronrc.val() == 0 || prophone.val() == 0) {
                        if (proname.val() == 0) {
                            proname.css("border", "1px solid red");
                        }
                        if (proemail.val() == 0) {
                            proemail.css("border", "1px solid red");
                        }
                        if (pronrc.val() == 0) {
                            pronrc.css("border", "1px solid red");
                        }
                        if (prophone.val() == 0) {
                            prophone.css("border", "1px solid red");
                        }
                        flag = 0;
                    }
                    if (!isValidEmail(proemail.val())) {
                        proemail.css("border", "1px solid red");
                        flag = 0;
                    }
                    if (!isValidNRC(pronrc.val())) {
                        pronrc.css("border", "1px solid red");
                        flag = 0;
                    }
                    if (!isValidPhone(prophone.val())) {
                        prophone.css("border", "1px solid red");
                        flag = 0;
                    }

                    if (flag == 1) {
                        var pronameval = proname.val();
                        var proemailval = proemail.val();
                        var pronrcval = pronrc.val();
                        var prophoneval = prophone.val();
                        var proaddressval = $("#proaddress").val();
                        var prodobval = $("#prodob").val();
                        proname.css("border", "1px solid lightgray");
                        proemail.css("border", "1px solid lightgray");
                        pronrc.css("border", "1px solid lightgray");
                        prophone.css("border", "1px solid lightgray");
                        location.href = "editprofile.php?name=" + pronameval + "&email=" + proemailval + "&nrc=" + pronrcval + "&address=" + proaddressval + "&dob=" + prodobval + "&phone="+prophoneval ;

                    }
                });
            </script>
        -->

         </form>


    </div>


    <!-- end profile -->