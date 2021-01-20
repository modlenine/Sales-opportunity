<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Customer visit report</title>

    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD3A9Mc08SyCJjtWFLFijSITvvx0UmdmFU&callback=initMap&libraries=places&v=weekly" defer></script>
    <!-- Google api key อย่าเอาไปใช้มั่วนะครับ ขอสงวนสิทธิ์-->

    <style>
        .dataTables_filter,
        .dataTables_length,
        .dataTables_info,
        .dataTables_paginate {
            display: none;
        }

        /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
        #map {
            height: 600px;
        }

        /* Optional: Makes the sample page fill the window. */
        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
        }


        #description {
            font-family: Roboto;
            font-size: 15px;
            font-weight: 300;
        }

        #infowindow-content .title {
            font-weight: bold;
        }

        #infowindow-content {
            display: none;
        }

        #map #infowindow-content {
            display: inline;
        }

        .pac-card {
            margin: 10px 10px 0 0;
            border-radius: 2px 0 0 2px;
            box-sizing: border-box;
            -moz-box-sizing: border-box;
            outline: none;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
            background-color: #fff;
            font-family: Roboto;
        }

        #pac-container {
            padding-bottom: 12px;
            margin-right: 12px;
        }

        .pac-controls {
            display: inline-block;
            padding: 5px 11px;
        }

        .pac-controls label {
            font-family: Roboto;
            font-size: 13px;
            font-weight: 300;
        }

        #pac-input {
            background-color: #fff;
            font-family: Roboto;
            font-size: 15px;
            font-weight: 300;
            margin-left: 12px;
            padding: 0 11px 0 13px;
            text-overflow: ellipsis;
            width: 400px;
        }

        #pac-input:focus {
            border-color: #4d90fe;
        }

        #title {
            color: #fff;
            background-color: #4d90fe;
            font-size: 25px;
            font-weight: 500;
            padding: 6px 12px;
        }
    </style>


    <script>
        // This example requires the Places library. Include the libraries=places
        // parameter when you first load the API. For example:
        // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">
        function initMap() {
            const map = new google.maps.Map(document.getElementById("map"), {
                center: {
                    lat: 13.75618500472269,
                    lng: 100.50178655767212
                },
                zoom: 9,
            });
            const card = document.getElementById("pac-card");
            const input = document.getElementById("pac-input");
            map.controls[google.maps.ControlPosition.TOP_RIGHT].push(card);
            const autocomplete = new google.maps.places.Autocomplete(input);
            // Bind the map's bounds (viewport) property to the autocomplete object,
            // so that the autocomplete requests use the current map bounds for the
            // bounds option in the request.
            autocomplete.bindTo("bounds", map);
            // Set the data fields to return when the user selects a place.
            autocomplete.setFields([
                "address_components",
                "geometry",
                "icon",
                "name",
            ]);


            const infowindow = new google.maps.InfoWindow();
            const infowindowContent = document.getElementById("infowindow-content");
            infowindow.setContent(infowindowContent);
            var marker = new google.maps.Marker({
                map,
                anchorPoint: new google.maps.Point(0, -29),
                draggable: true,
                animation: google.maps.Animation.DROP,

            });


            autocomplete.addListener("place_changed", () => {
                infowindow.close();
                marker.setVisible(false);
                const place = autocomplete.getPlace();

                if (!place.geometry) {
                    // User entered the name of a Place that was not suggested and
                    // pressed the Enter key, or the Place Details request failed.
                    window.alert(
                        "No details available for input: '" + place.name + "'"
                    );
                    return;
                }

                // If the place has a geometry, then present it on a map.
                if (place.geometry.viewport) {
                    map.fitBounds(place.geometry.viewport);
                } else {
                    map.setCenter(place.geometry.location);
                    map.setZoom(17); // Why 17? Because it looks good.
                }

                


                marker.setPosition(place.geometry.location);
                marker.setVisible(true);
                document.getElementById("locationLat").value = marker.getPosition().lat();
                document.getElementById("locationLng").value = marker.getPosition().lng();
                document.getElementById("locationName").value = input.value;
                


                let address = "";

                if (place.address_components) {
                    address = [
                        (place.address_components[0] &&
                            place.address_components[0].short_name) ||
                        "",
                        (place.address_components[1] &&
                            place.address_components[1].short_name) ||
                        "",
                        (place.address_components[2] &&
                            place.address_components[2].short_name) ||
                        "",
                    ].join(" ");
                }
                infowindowContent.children["place-icon"].src = place.icon;
                infowindowContent.children["place-name"].textContent = place.name;
                infowindowContent.children["place-address"].textContent = address;
                infowindow.open(map, marker);
                
            });

            marker.addListener("mouseup", saylocation);

            function saylocation() {
                // document.getElementById("locationLat").value = marker.getPosition().lat();
                // document.getElementById("locationLng").value = marker.getPosition().lng();
                document.getElementById("locationLat").value = marker.getPosition().lat();
                document.getElementById("locationLng").value = marker.getPosition().lng();
            }





            // Sets a listener on a radio button to change the filter type on Places
            // Autocomplete.
            function setupClickListener(id, types) {
                const radioButton = document.getElementById(id);
                radioButton.addEventListener("click", () => {
                    autocomplete.setTypes(types);
                });
                
            }
            setupClickListener("changetype-all", []);
            setupClickListener("changetype-address", ["address"]);
            setupClickListener("changetype-establishment", ["establishment"]);
            setupClickListener("changetype-geocode", ["geocode"]);
            document
                .getElementById("use-strict-bounds")
                .addEventListener("click", function() {
                    console.log("Checkbox clicked! New state=" + this.checked);
                    autocomplete.setOptions({
                        strictBounds: this.checked
                    });
                    
                });
        }
    </script>
</head>

<body>



    <div class="app-main__inner">
        <!-- Subcontent section -->
        <div class="row">
            <div class="col-md-12 bg-white p-3">
                <a href="<?= base_url('cusvisit_list.html') ?>" class="button button-mini button-3d button-circle button-teal"><i class="icon-chevron-sign-left"></i>กลับ</a>
            </div>
        </div><br>

        <div class="row">
            <div class="col-md-12 bg-white p-3">
                <div class="card-body">
                    <h2 class="" style="color:#000;text-align:center;"><u>CUSTOMER VISIT REPORT</u></h2>

                    <form action="<?= base_url('savedata_cus.html') ?>" method="post" class="needs-validation" novalidate autocomplete="off">

                        <div class="card-body" style="border:2px solid #000;">
                            <div class="form-row">
                                <div class="col-md-8">
                                    <div class="position-relative form-group">
                                        <label class="">Customer Name:</label>
                                        <input name="csvr_cusname" id="csvr_cusname" placeholder="" type="text" class="form-control" required>
                                        <div class="invalid-feedback">กรุณาระบุ Customer Name</div>

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="position-relative form-group">
                                        <label for="" class="">Country</label>
                                        <input name="csvr_country" id="csvr_country" placeholder="" type="text" class="form-control">
                                    </div>
                                </div>
                            </div>


                            <div class="form-row">
                                <div class="col-md-8">
                                    <div class="position-relative form-group">
                                        <label class="">Business Type:</label>
                                        <input name="csvr_business" id="csvr_business" placeholder="" type="text" class="form-control" required>
                                        <div class="invalid-feedback">กรุณาระบุ Business Type</div>

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="position-relative form-group">
                                        <label for="" class="">Date / Time:</label>
                                        <input name="csvr_datetime" id="csvr_datetime" placeholder="" type="text" class="form-control datepicker" value="<?= date("Y-m-d H:i:s") ?>">
                                    </div>
                                </div>
                            </div>


                            <div class="form-row">
                                <div class="col-md-8">
                                    <div class="position-relative form-group">
                                        <label class="">Contact Persons / Position:</label>
                                        <textarea name="csvr_contact" id="csvr_contact" cols="30" rows="3" class="form-control" required></textarea>
                                        <div class="invalid-feedback">กรุณาระบุ Contact Persons / Position</div>

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="position-relative form-group">
                                        <label for="" class="">Salee participants:</label>
                                        <textarea name="csvr_salee" id="csvr_salee" cols="30" rows="3" class="form-control" required></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-4">
                                    <div class="position-relative form-group">
                                        <label class="">Tel No:</label>
                                        <input name="csvr_tel" id="csvr_tel" placeholder="" type="text" class="form-control" required>
                                        <div class="invalid-feedback">กรุณาระบุ Tel No</div>

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="position-relative form-group">
                                        <label class="">Fax No:</label>
                                        <input name="csvr_fax" id="csvr_fax" placeholder="" type="text" class="form-control">

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="position-relative form-group">
                                        <label class="">Email:</label>
                                        <input name="csvr_email" id="csvr_email" placeholder="" type="text" class="form-control">

                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-4">
                                    <div class="position-relative form-group">
                                        <label class="">Location lat:</label>
                                        <input name="locationLat" id="locationLat" placeholder="" type="text" class="form-control" required>
                                        <div class="invalid-feedback">กรุณาระบุ Location</div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="position-relative form-group">
                                        <label class="">Location lng:</label>
                                        <input name="locationLng" id="locationLng" placeholder="" type="text" class="form-control">
                                        <div class="invalid-feedback">กรุณาระบุ Location</div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="position-relative form-group">
                                        <label class="">Location name:</label>
                                        <input name="locationName" id="locationName" placeholder="" type="text" class="form-control">

                                    </div>
                                </div>
                            </div>

                            <div class="pac-card" id="pac-card">
                                <div>
                                    <div id="title">Autocomplete search</div>
                                    <div id="type-selector" class="pac-controls">
                                        <!-- <input type="radio" name="type" id="changetype-all" checked="checked" />
                                        <label for="changetype-all">All</label> -->

                                        <!-- <input type="radio" name="type" id="changetype-establishment" />
                                        <label for="changetype-establishment">Establishments</label>

                                        <input type="radio" name="type" id="changetype-address" />
                                        <label for="changetype-address">Addresses</label>

                                        <input type="radio" name="type" id="changetype-geocode" />
                                        <label for="changetype-geocode">Geocodes</label> -->
                                    </div>
                                    <!-- <div id="strict-bounds-selector" class="pac-controls">
                                        <input type="checkbox" id="use-strict-bounds" value="" />
                                        <label for="use-strict-bounds">Strict Bounds</label>
                                    </div> -->
                                </div>
                                <div id="pac-container">
                                    <input id="pac-input" type="text" placeholder="Enter a location" />
                                </div>
                            </div>

                            <div id="map"></div>
                            <div id="infowindow-content">
                                <img src="" width="16" height="16" id="place-icon" />
                                <span id="place-name" class="title"></span><br />
                                <span id="place-address"></span>
                            </div>


                        </div><br>

                        <div style="font-size:16px;">1.Customer Information / Competitor Product Usage: ข้อมูลของลูกค้า สินค้าที่ลูกค้าใช้อยู่</div>
                        <div class="card-body">
                            <div class="col-md-12 form-group">
                                <a href="javascript:void(0)" data-toggle="modal" data-target="#addCusProUse"><i class="fas fa-plus-circle advAddDetail" data-toggle="tooltip" data-placement="left" title="เพิ่มข้อมูล"></i></a>
                                <!-- <i class="fas fa-trash-alt advDelDetail"></i> -->
                            </div>
                            <div class="table-responsive">
                                <table id="cusViDetail" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Type</th>
                                            <th>Salee Products</th>
                                            <th>Q'ty(mt/year)</th>
                                            <th>Competition Products</th>
                                            <th>Q'ty(mt/year)</th>
                                            <th>Remark</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div><br>

                        <div style="font-size:16px;">2.Discussion : รายละเอียด หรือ บทสรุปที่คุยกับลูกค้า</div>
                        <div class="card-body">
                            <div class="form-row">
                                <div class="col-md-12">
                                    <div class="position-relative form-group">

                                        <textarea name="csvr_discussion" id="csvr_discussion" cols="30" rows="5" class="form-control" required></textarea>
                                        <div class="invalid-feedback">กรุณาระบุ รายละเอียด หรือ บทสรุปที่คุยกับลูกค้า</div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div style="font-size:16px;">3.Action Plan and Follow up : สิ่งที่ต้องทำต่อ และ กำหนดติดตามงาน</div>
                        <div class="card-body">
                            <div class="form-row">
                                <div class="col-md-12">
                                    <div class="position-relative form-group">

                                        <textarea name="csvr_action" id="csvr_action" cols="30" rows="5" class="form-control" required></textarea>
                                        <div class="invalid-feedback">กรุณาระบุ สิ่งที่ต้องทำต่อ และ กำหนดติดตามงาน</div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <input hidden type="text" name="csvr_salesname" id="csvr_salesname" value="<?= getUser()->Fname . " " . getUser()->Lname ?>">
                        <input hidden type="text" name="csvr_salesecode" id="csvr_salesecode" value="<?= getUser()->ecode ?>">










                        <button type="submit" id="btnAddCusvisit" name="btnAddCusvisit" class="mt-2 btn btn-primary">บันทึกข้อมูล</button>
                    </form>
                    <script>
                        $(document).ready(function() {
                            $('#cusViDetail').DataTable({
                                "columnDefs": [{
                                        targets: "_all",
                                        orderable: false
                                    }, {
                                        "width": "5%",
                                        "targets": 0
                                    },
                                    {
                                        "width": "25%",
                                        "targets": 1
                                    },
                                    {
                                        "width": "8%",
                                        "targets": 2
                                    },
                                    {
                                        "width": "25%",
                                        "targets": 3
                                    },
                                    {
                                        "width": "8%",
                                        "targets": 4
                                    },
                                    {
                                        "width": "8%",
                                        "targets": 5
                                    },
                                    {
                                        "width": "8%",
                                        "targets": 6
                                    }
                                ]
                            });


                            // assuming the controls you want to attach the plugin to
                            // have the "datepicker" class set
                            $('input.datepicker').Zebra_DatePicker({
                                format: 'Y-m-d H:i'
                            });



                            // Function เพิ่มข้อมูลจาก Modal ลง Table
                            var count = 0;
                            $(document).on('click', '#btnAddCusUse', function() {
                                $('.dataTables_empty').remove();

                                var csv_type = $('#csv_type').val();
                                var csv_saleeproduct = $('#csv_saleeproduct').val();
                                var csv_qty1 = $('#csv_qty1').val();
                                var csv_competition = $('#csv_competition').val();
                                var csv_qty2 = $('#csv_qty2').val();
                                var csv_remark = $('#csv_remark').val();

                                count = count + 1;
                                output = '<tr id="row_' + count + '">';

                                output += '<td>' + csv_type + ' <input type="hidden" name="csvrs_type[]" id="csvrs_type' + count + '" class="first_name" value="' + csv_type + '" /></td>';

                                output += '<td>' + csv_saleeproduct + ' <input type="hidden" name="csvrs_saleeproduct[]" id="csvrs_saleeproduct' + count + '" value="' + csv_saleeproduct + '" /></td>';

                                output += '<td>' + csv_qty1 + ' <input type="hidden" name="csvrs_qty1[]" id="csvrs_qty1' + count + '" value="' + csv_qty1 + '" /></td>';

                                output += '<td>' + csv_competition + ' <input type="hidden" name="csvrs_competition[]" id="csvrs_competition' + count + '" value="' + csv_competition + '" /></td>';

                                output += '<td class="price">' + csv_qty2 + ' <input type="hidden" name="csvrs_qty2[]" id="csvrs_qty2' + count + '" value="' + csv_qty2 + '" /></td>';

                                output += '<td class="price">' + csv_remark + ' <input type="hidden" name="csvrs_remark[]" id="csvrs_remark' + count + '" value="' + csv_remark + '" /></td>';

                                output += '<td><button type="button" name="remove_details" class="btn btn-danger btn-xs remove_details" id="' + count + '">Remove</button></td>';
                                output += '</tr>';

                                $('#cusViDetail tbody').append(output);


                                $('#csv_type').val('');
                                $('#csv_saleeproduct').val('');
                                $('#csv_qty1').val('');
                                $('#csv_competition').val('');
                                $('#csv_qty2').val('');
                                $('#csv_remark').val('');


                            });

                            // Function เพิ่มข้อมูลจาก Modal ลง Table




                            $(document).on('click', '.remove_details', function() {
                                var row_id = $(this).attr("id");
                                if (confirm("คุณต้องการลบรายชื่อนี้ออกจากรายการใช่หรือไม่ ?")) {
                                    $('#row_' + row_id + '').remove();

                                } else {
                                    return false;
                                }
                            });


















                        });



                        // Example starter JavaScript for disabling form submissions if there are invalid fields
                        (function() {
                            'use strict';
                            window.addEventListener('load', function() {
                                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                                var forms = document.getElementsByClassName('needs-validation');
                                // Loop over them and prevent submission
                                var validation = Array.prototype.filter.call(forms, function(form) {
                                    form.addEventListener('submit', function(event) {
                                        if (form.checkValidity() === false) {
                                            event.preventDefault();
                                            event.stopPropagation();
                                        }
                                        form.classList.add('was-validated');
                                    }, false);
                                });
                            }, false);
                        })();
                    </script>
                </div>
            </div>
        </div>

    </div><!-- Subcontent section -->


</body>

</html>