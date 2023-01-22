<!-- start profile -->

    <div id="inline" class="profile lity-hide">


        <form method="post" action="editprofilefordriver.php" enctype="multipart/form-data" id="proform">
            <div class="hideprofiletable">

                <table>
                    
                    <div class="upload-btn-wrapper">
                                      <button class="btn">Upload</button>
                                      <input type="file" name="photo"/>
                    </div>

                    </div><br><br><br>
                    <tr>
                        <td>
                            <i class="fa fa-bank">&nbsp;&nbsp;&nbsp;</i>Name&nbsp;&nbsp;
                        </td>

                        <td>
                            <input type="text" name="name" value="<?php echo $rowprofile['DName'] ?>" class="inputprofile" id="proname">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <i class="fa fa-google">&nbsp;&nbsp;&nbsp;</i>Email&nbsp;&nbsp;
                        </td>

                        <td>
                            <input type="text" name="email" value="<?php echo $rowprofile['Email'] ?>" class="inputprofile" disabled="disabled">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <i class="fa fa-credit-card">&nbsp;&nbsp;&nbsp;</i>NRC&nbsp;&nbsp;
                        </td>

                        <td>
                            <input type="text" name="nrc" value="<?php echo $rowprofile['NRC'] ?>" class="inputprofile" disabled="disabled">
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
                            <i class="fa fa-phone">&nbsp;&nbsp;&nbsp;</i>Phone&nbsp;&nbsp;
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

                            <img src="<?php echo $rowprofile['Photo'] ?>" style="width: 170px;height: 170px;border-radius: 50%;" data-lity data-lity-desc="Photo of a flower">
                        </div>

                    </div>


                    <h1><?php $dname = $rowprofile['DName'];
                        echo $dname; ?></h1>

                    <p class="bio">Hello, My name is <?php echo $dname; ?>. I'm a UIT student.</p>

                </div>


                <div class="profilecontent">
                    <div class="showprofiletable">
                        <table>
                            <tr>
                                <td>
                                    <i class="fa fa-bank">&nbsp;&nbsp;&nbsp;</i>Name&nbsp;&nbsp;
                                </td>

                                <td>
                                    <?php echo $rowprofile['DName'] ?>
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


        </form>


    </div>
            <!-- end driver profile. -->