<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Customer visit report</title>

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
            height: 500px;
        }

        /* Optional: Makes the sample page fill the window. */
        /* html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
        } */
    </style>





</head>

<body>



    <div class="app-main__inner">
        <!-- Subcontent section -->
        <div class="row">
            <div class="col-md-12 bg-white p-3">
                <a href="<?= base_url('cusvisit_list.html') ?>" class="button button-mini button-3d button-circle button-teal"><i class="icon-chevron-sign-left"></i>กลับ</a>
                <a href="<?= base_url('customer_print.html/') . $cno ?>" target="_blank" class="button button-mini button-circle button-3d button-amber"><i class="icon-edit2"></i>ปริ้นเอกสาร</a>
                <a href="<?= base_url('editcusvisit.html/') . $cno ?>" class="button button-mini button-circle button-3d button-amber"><i class="icon-edit2"></i>แก้ไขข้อมูล</a>
            </div>
        </div><br>

        <div class="row">
            <div class="col-md-12 bg-white p-3">
                <div class="card-body">
                    <h2 class="" style="color:#000;text-align:center;"><u>CUSTOMER VISIT REPORT</u></h2>

                    <div class="card-body" style="border:2px solid #000;">
                        <div class="form-row">
                            <div class="col-md-8">
                                <div class="position-relative form-group">
                                    <label class="">Customer Name:</label>
                                    <input name="csvr_cusname" id="csvr_cusname" type="text" class="form-control" value="{csvr_cusname}" readonly>
                                    <div class="invalid-feedback">กรุณาระบุ Customer Name</div>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="position-relative form-group">
                                    <label for="" class="">Country</label>
                                    <input name="csvr_country" id="csvr_country" type="text" class="form-control" value="{csvr_country}" readonly>
                                </div>
                            </div>
                        </div>


                        <div class="form-row">
                            <div class="col-md-8">
                                <div class="position-relative form-group">
                                    <label class="">Business Type:</label>
                                    <input name="csvr_business" id="csvr_business" type="text" class="form-control" value="{csvr_business}" readonly>
                                    <div class="invalid-feedback">กรุณาระบุ Business Type</div>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="position-relative form-group">
                                    <label for="" class="">Date / Time:</label>
                                    <input name="csvr_datetime" id="csvr_datetime" type="text" class="form-control" value="{csvr_datetime}" readonly>
                                </div>
                            </div>
                        </div>


                        <div class="form-row">
                            <div class="col-md-8">
                                <div class="position-relative form-group">
                                    <label class="">Contact Persons / Position:</label>
                                    <textarea name="csvr_contact" id="csvr_contact" cols="30" rows="3" class="form-control" readonly>{csvr_contact}</textarea>
                                    <div class="invalid-feedback">กรุณาระบุ Contact Persons / Position</div>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="position-relative form-group">
                                    <label for="" class="">Salee participants:</label>
                                    <textarea name="csvr_salee" id="csvr_salee" cols="30" rows="3" class="form-control" readonly>{csvr_salee}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-4">
                                <div class="position-relative form-group">
                                    <label class="">Tel No:</label>
                                    <input name="csvr_tel" id="csvr_tel" type="text" class="form-control" value="{csvr_tel}" readonly>
                                    <div class="invalid-feedback">กรุณาระบุ Tel No</div>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="position-relative form-group">
                                    <label class="">Fax No:</label>
                                    <input name="csvr_fax" id="csvr_fax" type="text" class="form-control" value="{csvr_fax}" readonly>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="position-relative form-group">
                                    <label class="">Email:</label>
                                    <input name="csvr_email" id="csvr_email" type="text" class="form-control" value="{csvr_email}" readonly>

                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-4">
                                <div class="position-relative form-group">
                                    <label class="">Location lat:</label>
                                    <input name="locationLat" id="locationLat" type="text" class="form-control" value="<?= $csvr_lolat ?>" readonly>
                                    <div class="invalid-feedback">กรุณาระบุ Location</div>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="position-relative form-group">
                                    <label class="">Location lng:</label>
                                    <input name="locationLng" id="locationLng" type="text" class="form-control" value="<?= $csvr_lolng ?>" readonly>
                                    <div class="invalid-feedback">กรุณาระบุ Location</div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="position-relative form-group">
                                    <label class="">Location name:</label>
                                    <input name="locationName" id="locationName" type="text" class="form-control" value="<?= $csvr_loname ?>" readonly>

                                </div>
                            </div>
                        </div>
                        <div id="map"></div>

                    </div><br>



                    <div style="font-size:16px;">1.Customer Information / Competitor Product Usage: ข้อมูลของลูกค้า สินค้าที่ลูกค้าใช้อยู่</div>
                    <div class="card-body">

                        <div class="table-responsive">
                            <table id="cusViDetailV" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Type</th>
                                        <th>Salee Products</th>
                                        <th>Q'ty(mt/year)</th>
                                        <th>Competition Products</th>
                                        <th>Q'ty(mt/year)</th>
                                        <th>Remark</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    foreach (getSubCus($cno)->result() as $rss) {
                                    ?>
                                        <tr>
                                            <td><?= $rss->csvrs_type ?></td>
                                            <td><?= $rss->csvrs_saleeproduct ?></td>
                                            <td><?= $rss->csvrs_qty1 ?></td>
                                            <td><?= $rss->csvrs_competition ?></td>
                                            <td><?= $rss->csvrs_qty2 ?></td>
                                            <td><?= $rss->csvrs_remark ?></td>
                                        </tr>
                                    <?php }; ?>
                                </tbody>
                            </table>
                        </div>
                    </div><br>

                    <div style="font-size:16px;">2.Discussion : รายละเอียด หรือ บทสรุปที่คุยกับลูกค้า</div>
                    <div class="card-body">
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="position-relative form-group">

                                    <textarea name="csvr_discussion" id="csvr_discussion" cols="30" rows="5" class="form-control" readonly>{csvr_discussion}</textarea>
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

                                    <textarea name="csvr_action" id="csvr_action" cols="30" rows="5" class="form-control" readonly>{csvr_action}</textarea>
                                    <div class="invalid-feedback">กรุณาระบุ สิ่งที่ต้องทำต่อ และ กำหนดติดตามงาน</div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <script>
                        // The following example creates a marker in Stockholm, Sweden using a DROP
                        // animation. Clicking on the marker will toggle the animation between a BOUNCE
                        // animation and no animation.
                        let marker;
                        let lat = parseFloat(document.getElementById("locationLat").value);
                        let lng = parseFloat(document.getElementById("locationLng").value);
                        let locationname = document.getElementById("locationName").value;

                        function initMap() {
                            const map = new google.maps.Map(document.getElementById("map"), {
                                zoom: 13,
                                center: {
                                    lat: lat,
                                    lng: lng
                                },
                            });

                            const contentString = locationname;

                            const infowindow = new google.maps.InfoWindow({
                                content: contentString,
                            });

                            marker = new google.maps.Marker({
                                map,
                                draggable: false,
                                animation: google.maps.Animation.DROP,
                                position: {
                                    lat: lat,
                                    lng: lng
                                },
                            });

                            marker.addListener("mouseup", saylocation);

                            infowindow.open(map, marker);
                            // marker.addListener("click", () => {
                            //     infowindow.open(map, marker);
                            // });

                        }

                        function saylocation() {
                            document.getElementById("inputLocationLat").value = marker.getPosition().lat();
                            document.getElementById("inputLocationLng").value = marker.getPosition().lng();
                            document.getElementById("inputLocationLatLng").value = marker.getPosition();
                        }

                        function toggleBounce() {
                            if (marker.getAnimation() !== null) {
                                marker.setAnimation(null);
                            } else {
                                marker.setAnimation(google.maps.Animation.BOUNCE);
                            }
                        }
                    </script>

                    <script>
                        $(document).ready(function() {
                            $('#cusViDetailV').DataTable({
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


                        });
                    </script>
                </div>
            </div>
        </div>

    </div><!-- Subcontent section -->


</body>

</html>