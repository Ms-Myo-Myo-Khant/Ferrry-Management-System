<!-- start profile -->

    <div id="profile" class="profile lity-hide">


                <form action="editprofileforparent.php" method="post" enctype="multipart/form-data" id="proform">
                <div class="hideprofiletable">
                            
                        <table>

                                <div class="upload-btn-wrapper">
                                      <button class="btn">Upload</button>
                                      <input type="file" name="photo"/>
                                </div>

                                <tr>
                                    <td> 
                                    <i class="fa fa-bank">&nbsp;&nbsp;&nbsp;</i>Name&nbsp;&nbsp;
                                    </td>
                                    
                                    <td>
                                    <input type="text" name="name" value="<?php echo $prowprofile['PName']?>" class="inputprofile" id="proname">
                                    </td>
                                </tr>

                                <tr>
                                    <td> 
                                    <i class="fa fa-google">&nbsp;&nbsp;&nbsp;</i>Email&nbsp;&nbsp;
                                    </td>
                                    
                                    <td>
                                    <input type="text" name="email" value="<?php echo $srowprofile['Email']?>" class="inputprofile" disabled="disabled">
                                    </td>
                                </tr>

                                <tr>
                                    <td> 
                                    <i class="fa fa-credit-card">&nbsp;&nbsp;&nbsp;</i>NRC&nbsp;&nbsp;
                                    </td>
                                    
                                    <td>
                                    <input type="text" name="nrc" value="<?php echo $prowprofile['PNRC']?>" class="inputprofile" disabled="disabled">
                                    </td>
                                </tr>

                                <tr>
                                    <td> 
                                    <i class="fa fa-phone">&nbsp;&nbsp;&nbsp;</i>Phone&nbsp;&nbsp;
                                    </td>
                                    
                                    <td>
                                    <input type="text" name="phone" value="<?php echo $srowprofile['PhoneNo']?>" class="inputprofile" id="prophone">
                                    </td>
                                </tr>

                                <tr>
                                    <td> 
                                    <i class="fa fa-location-arrow">&nbsp;&nbsp;&nbsp;</i>Address&nbsp;&nbsp;
                                    </td>
                                    
                                    <td>
                                    <input type="text" name="address" value="<?php echo $srowprofile['Address']?>" class="inputprofile" id="proaddress">
                                    </td>
                                </tr>

                        </table>
                </div>



                <div class="profilebox">
                    
                        <div class="profileimgbox">
                                
                                <div class="outercircle">
                                    
                                        <div class="innercircle">
                                            
                                            <img src="<?php echo $srowprofile['Photo'] ?>" style="width: 170px;height: 170px;border-radius: 50%;" data-lity data-lity-desc="Photo of a flower">

                                        </div>

                                </div>


                                <h1><?php $pname=$prowprofile['PName']; echo $pname; ?></h1>

                                <p class="bio">Hello, My name is <?php echo $pname; ?>. I'm a UIT student.</p>

                        </div>              


                        <div class="profilecontent">
                            <div class="showprofiletable">
                            <table>
                                <tr>
                                    <td> 
                                    <i class="fa fa-bank">&nbsp;&nbsp;&nbsp;</i>Name&nbsp;&nbsp;
                                    </td>
                                    
                                    <td>
                                    <?php echo $prowprofile['PName']?>
                                    </td>
                                </tr>

                                <tr>
                                    <td> 
                                    <i class="fa fa-google">&nbsp;&nbsp;&nbsp;</i>Email&nbsp;&nbsp;
                                    </td>
                                    
                                    <td>
                                    <?php echo $srowprofile['Email']?>
                                    </td>
                                </tr>

                                <tr>
                                    <td> 
                                    <i class="fa fa-credit-card">&nbsp;&nbsp;&nbsp;</i>NRC&nbsp;&nbsp;
                                    </td>
                                    
                                    <td>
                                    <?php echo $prowprofile['PNRC']?>
                                    </td>
                                </tr>

                                <tr>
                                    <td> 
                                    <i class="fa fa-location-arrow">&nbsp;&nbsp;&nbsp;</i>Address&nbsp;&nbsp;
                                    </td>
                                    
                                    <td>
                                    <?php echo $srowprofile['Address']?>
                                    </td>
                                </tr>

                                

                                <tr>
                                    <td> 
                                    <i class="fa fa-phone">&nbsp;&nbsp;&nbsp;</i>Phone&nbsp;&nbsp;
                                    </td>
                                    
                                    <td>
                                   <?php echo $srowprofile['PhoneNo']?>
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

                <!-- end parent profile -->