$jq=jQuery.noConflict();
    $jq(document).ready(function(e)
    {
                     
                $jq('#logoutbut').click(function () {
                    ssi_modal.show({
                        sizeClass: 'small',
                        position: 'center   ',
                        content: 'Are u sure?',
                        title: 'Exit',
                        buttons: [{
                            className: 'btn btn-primary',
                            label: 'Ok',
                            enableAfter: 3,
                            closeAfter: true,
                            method: function () {
                                window.location = "logout.php";
                                ssi_modal.notify('info', {content: 'Ok'})
                            }
                        }, {
                            className: 'btn btn-danger',
                            position: 'center top',
                            label: 'Cancel',
                            closeAfter: true,
                            method: function () {
                                ssi_modal.notify('error', { title: 'Exit',position: 'center top',content: 'Cancelled....'})
                            }
                        }]
                    });
                })
           
    });