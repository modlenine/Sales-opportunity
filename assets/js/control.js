$(document).ready(function(){
    


// Head Control

// Control menu show active (Head page)
if($('#checkPage').val() == ""){
    $('#mainpage').addClass('mm-active');
}else if($('#checkPage').val() == "projectlist.html" || $('#checkPage').val() == "addproject.html"){
    $('#listpage').addClass('mm-active');
}
// Control menu show active





















// Control add page // Control add page // Control add page // Control add page
// ควบคุมการทำงานของ การคำนวนประมาณการรายได้ของปีที่ 1 - 3
// โดยสูตรคือ จำนวนการใช้ * ราคาขาย * เปอร์เซ็นสำเร็จ
// Control add page // Control add page // Control add page // Control add page
if($('#checkPage').val() == "addproject.html"){


    
// Check number input Check number input Check number input
// Check number input Check number input Check number input
// Check number input Check number input Check number input
// Control ปริมาณปีที่จะใช้
$('#m_productuse').keyup(function(){
    // Control ให้กรอกเฉพาะตัวเลข
    let checkNumber_m_productuse = /[^A-Za-zก-เ]/.test($(this).val());
    if($('#m_productuse').val() != ''){
        if(checkNumber_m_productuse == false){
            $('#notify_m_productuse').html('<div class="alert alert-danger" role="alert">กรุณาระบุเฉพาะตัวเลขเท่านั้น</div>');
            $('#m_productuse').val('');
        }else{
            $('#notify_m_productuse').html('');
        }
    }
    // Control ให้กรอกเฉพาะตัวเลข  
});
// Control ปริมาณปีที่จะใช้


// Control Idea price
$('#m_ideaprice').keyup(function(){

    // Control ให้กรอกเฉพาะตัวเลข
    let checkNumber_ideaprice = /[^A-Za-zก-เ]/.test($(this).val());
    if($('#m_ideaprice').val() != ''){
        if(checkNumber_ideaprice == false){
            $('#notify_m_ideaprice').html('<div class="alert alert-danger" role="alert">กรุณาระบุเฉพาะตัวเลขเท่านั้น</div>');
            $('#m_ideaprice').val('');
        }else{
            $('#notify_m_ideaprice').html('');
        }
    }
    // Control ให้กรอกเฉพาะตัวเลข 
});
// Control Idea price




// Control m_forcaseuse1
$('#m_forcastuse1').keyup(function(){
    // Control ให้กรอกเฉพาะตัวเลข
    let checkNumber_forcaseuse1 = /[^A-Za-zก-เ]/.test($(this).val());
    if($('#m_forcastuse1').val() != ''){
        if(checkNumber_forcaseuse1 == false){
            $('#notify_m_forcastuse1').html('<div class="alert alert-danger" role="alert">กรุณาระบุเฉพาะตัวเลขเท่านั้น</div>');
            $('#m_forcastuse1').val('');
        }else{
            $('#notify_m_forcastuse1').html('');
        }
    }
    // Control ให้กรอกเฉพาะตัวเลข 
})
// Control m_forcaseuse1




// Control m_forcaseuse2
$('#m_forcastuse2').keyup(function(){
    // Control ให้กรอกเฉพาะตัวเลข
    let checkNumber_forcaseuse2 = /[^A-Za-zก-เ]/.test($(this).val());
    if($('#m_forcastuse2').val() != ''){
        if(checkNumber_forcaseuse2 == false){
            $('#notify_m_forcastuse2').html('<div class="alert alert-danger" role="alert">กรุณาระบุเฉพาะตัวเลขเท่านั้น</div>');
            $('#m_forcastuse2').val('');
        }else{
            $('#notify_m_forcastuse2').html('');
        }
    }
    // Control ให้กรอกเฉพาะตัวเลข 
})
// Control m_forcaseuse2




// Control m_forcaseuse3
$('#m_forcastuse3').keyup(function(){
    // Control ให้กรอกเฉพาะตัวเลข
    let checkNumber_forcaseuse3 = /[^A-Za-zก-เ]/.test($(this).val());
    if($('#m_forcastuse3').val() != ''){
        if(checkNumber_forcaseuse3 == false){
            $('#notify_m_forcastuse3').html('<div class="alert alert-danger" role="alert">กรุณาระบุเฉพาะตัวเลขเท่านั้น</div>');
            $('#m_forcastuse3').val('');
        }else{
            $('#notify_m_forcastuse3').html('');
        }
    }
    // Control ให้กรอกเฉพาะตัวเลข 
})
// Control m_forcaseuse3
// Check number input Check number input Check number input
// Check number input Check number input Check number input
// Check number input Check number input Check number input



// Check ค่าว่างก่อนที่จะกรอกประมาณการณ์ยอดการใช้ Check ค่าว่างก่อนที่จะกรอกประมาณการณ์ยอดการใช้
// Check ค่าว่างก่อนที่จะกรอกประมาณการณ์ยอดการใช้ Check ค่าว่างก่อนที่จะกรอกประมาณการณ์ยอดการใช้
// Check ค่าว่างก่อนที่จะกรอกประมาณการณ์ยอดการใช้ Check ค่าว่างก่อนที่จะกรอกประมาณการณ์ยอดการใช้
// Control m_forcaseuse1
$('#m_forcastuse1').focus(function(){
    if($('#m_ideaprice').val() == ''){
        $('#notify_m_ideaprice').html('<div class="alert alert-danger" role="alert">กรุณาระบุ Idea price ด้วยค่ะ</div>');
    }else{
        $('#notify_m_ideaprice').html('');
    }

    if($('#m_percensuccess option:selected').val() == ''){
        $('#notify_m_percensuccess').html('<div class="alert alert-danger" role="alert">กรุณาเลือก เปอร์เซ็นความสำเร็จ ด้วยค่ะ</div>');
    }else{
        $('#notify_m_percensuccess').html('');
    }
});
$('#m_forcastuse1').blur(function(){
    if($('#m_ideaprice').val() == ''){
        $('#notify_m_ideaprice').html('<div class="alert alert-danger" role="alert">กรุณากรอก Idea price ด้วยค่ะ</div>');
        $('#m_forcastuse1').val('');
    }else{
        $('#notify_m_ideaprice').html('');
    }

    if($('#m_percensuccess option:selected').val() == ''){
        $('#notify_m_percensuccess').html('<div class="alert alert-danger" role="alert">กรุณาเลือก เปอร์เซ็นความสำเร็จ ด้วยค่ะ</div>');
        $('#m_forcastuse1').val('');
    }else{
        $('#notify_m_percensuccess').html('');
    }
});
// Control m_forcaseuse1


// Control m_forcaseuse2
$('#m_forcastuse2').focus(function(){
    if($('#m_ideaprice').val() == ''){
        $('#notify_m_ideaprice').html('<div class="alert alert-danger" role="alert"> กรุณากรอก Idea price ด้วยค่ะ</div>');
    }else{
        $('#notify_m_ideaprice').html('');
    }

    if($('#m_percensuccess option:selected').val() == ''){
        $('#notify_m_percensuccess').html('<div class="alert alert-danger" role="alert"> กรุณาเลือก เปอร์เซ็นความสำเร็จ ด้วยค่ะ</div>');
    }else{
        $('#notify_m_percensuccess').html('');
    }
});
$('#m_forcastuse2').blur(function(){
    if($('#m_ideaprice').val() == ''){
        $('#notify_m_ideaprice').html('<div class="alert alert-danger" role="alert"> กรุณากรอก Idea price ด้วยค่ะ</div>');
        $('#m_forcastuse1').val('');
    }else{
        $('#notify_m_ideaprice').html('');
    }

    if($('#m_percensuccess option:selected').val() == ''){
        $('#notify_m_percensuccess').html('<div class="alert alert-danger" role="alert"> กรุณาเลือก เปอร์เซ็นความสำเร็จ ด้วยค่ะ</div>');
        $('#m_forcastuse1').val('');
    }else{
        $('#notify_m_percensuccess').html('');
    }
});
// Control m_forcaseuse2



// Control m_forcaseuse3
$('#m_forcastuse3').focus(function(){
    if($('#m_ideaprice').val() == ''){
        $('#notify_m_ideaprice').html('<div class="alert alert-danger" role="alert"> กรุณากรอก Idea price ด้วยค่ะ</div>');
    }else{
        $('#notify_m_ideaprice').html('');
    }

    if($('#m_percensuccess option:selected').val() == ''){
        $('#notify_m_percensuccess').html('<div class="alert alert-danger" role="alert"> กรุณาเลือก เปอร์เซ็นความสำเร็จ ด้วยค่ะ</div>');
    }else{
        $('#notify_m_percensuccess').html('');
    }
});
$('#m_forcastuse3').blur(function(){
    if($('#m_ideaprice').val() == ''){
        $('#notify_m_ideaprice').html('<div class="alert alert-danger" role="alert"> กรุณากรอก Idea price ด้วยค่ะ</div>');
        $('#m_forcastuse1').val('');
    }else{
        $('#notify_m_ideaprice').html('');
    }

    if($('#m_percensuccess option:selected').val() == ''){
        $('#notify_m_percensuccess').html('<div class="alert alert-danger" role="alert"> กรุณาเลือก เปอร์เซ็นความสำเร็จ ด้วยค่ะ</div>');
        $('#m_forcastuse1').val('');
    }else{
        $('#notify_m_percensuccess').html('');
    }
});
// Control m_forcaseuse3


// Check ค่าว่างก่อนที่จะกรอกประมาณการณ์ยอดการใช้ Check ค่าว่างก่อนที่จะกรอกประมาณการณ์ยอดการใช้
// Check ค่าว่างก่อนที่จะกรอกประมาณการณ์ยอดการใช้ Check ค่าว่างก่อนที่จะกรอกประมาณการณ์ยอดการใช้
// Check ค่าว่างก่อนที่จะกรอกประมาณการณ์ยอดการใช้ Check ค่าว่างก่อนที่จะกรอกประมาณการณ์ยอดการใช้


    // For case use 1
    $('#m_forcastuse1').keyup(function() {
        $('#m_forcastmoney1').val( (parseFloat($('#m_forcastuse1').val()) * parseFloat($('#m_ideaprice').val())) * parseFloat($('#m_percensuccess').val())/100 );
    });
    $('#m_ideaprice').keyup(function() {
        $('#m_forcastmoney1').val( (parseFloat($('#m_forcastuse1').val()) * parseFloat($('#m_ideaprice').val())) * parseFloat($('#m_percensuccess').val())/100 );
    });
    $('#m_percensuccess').change(function() {
        $('#m_forcastmoney1').val( (parseFloat($('#m_forcastuse1').val()) * parseFloat($('#m_ideaprice').val())) * parseFloat($('#m_percensuccess').val())/100 );
    });
    // For case use 1



    // For case use 2
    $('#m_forcastuse2').keyup(function() {
        $('#m_forcastmoney2').val( (parseFloat($('#m_forcastuse2').val()) * parseFloat($('#m_ideaprice').val())) * parseFloat($('#m_percensuccess').val())/100 );
    });
    $('#m_ideaprice').keyup(function() {
        $('#m_forcastmoney2').val( (parseFloat($('#m_forcastuse2').val()) * parseFloat($('#m_ideaprice').val())) * parseFloat($('#m_percensuccess').val())/100 );
    });
    $('#m_percensuccess').change(function() {
        $('#m_forcastmoney2').val( (parseFloat($('#m_forcastuse2').val()) * parseFloat($('#m_ideaprice').val())) * parseFloat($('#m_percensuccess').val())/100 );
    });
     // For case use 2



    // For case use 3
    $('#m_forcastuse3').keyup(function() {
        $('#m_forcastmoney3').val( (parseFloat($('#m_forcastuse3').val()) * parseFloat($('#m_ideaprice').val())) * parseFloat($('#m_percensuccess').val())/100 );
    });
    $('#m_ideaprice').keyup(function() {
        $('#m_forcastmoney3').val( (parseFloat($('#m_forcastuse3').val()) * parseFloat($('#m_ideaprice').val())) * parseFloat($('#m_percensuccess').val())/100 );
    });
    $('#m_percensuccess').change(function() {
        $('#m_forcastmoney3').val( (parseFloat($('#m_forcastuse3').val()) * parseFloat($('#m_ideaprice').val())) * parseFloat($('#m_percensuccess').val())/100 );
    });
    // For case use 3



    // Control Comma input Control Comma input Control Comma input
    // Control Comma input Control Comma input Control Comma input
    // Control Comma input Control Comma input Control Comma input

    // Convert Currency to comma
    $('input[name="m_productuse"] ,input[name="m_ideaprice"]').keyup(function (event) {/*****Comma function*******/
        // skip for arrow keys
        if (event.which >= 37 && event.which <= 40)
            return;
        // Function for use comma with decimal
        $(this).val(function (index, value) {
            value = value.replace(/,/g, '');
            return numberWithCommas(value);
        });
        // Function for use comma with decimal
    });


    $('input[id="m_forcastuse1"]').keyup(function(){
        // Function for use comma with decimal
        $(this).val(function (index, value) {
            value = value.replace(/,/g, '');
            return numberWithCommas(value);
        });
        $('input[id="m_forcastmoney1"]').val(function (index, value) {
            value = value.replace(/,/g, '');
            return numberWithCommas(value);
        });
        // Function for use comma with decimal
    });

    $('input[id="m_forcastuse2"]').keyup(function(){
        // Function for use comma with decimal
        $(this).val(function (index, value) {
            value = value.replace(/,/g, '');
            return numberWithCommas(value);
        });
        $('input[id="m_forcastmoney2"]').val(function (index, value) {
            value = value.replace(/,/g, '');
            return numberWithCommas(value);
        });
        // Function for use comma with decimal
    });

    $('input[id="m_forcastuse3"]').keyup(function(){
        // Function for use comma with decimal
        $(this).val(function (index, value) {
            value = value.replace(/,/g, '');
            return numberWithCommas(value);
        });
        $('input[id="m_forcastmoney3"]').val(function (index, value) {
            value = value.replace(/,/g, '');
            return numberWithCommas(value);
        });
        // Function for use comma with decimal
    });

    // Control Comma input Control Comma input Control Comma input
    // Control Comma input Control Comma input Control Comma input
    // Control Comma input Control Comma input Control Comma input
   

}
// Control add page // Control add page // Control add page // Control add page
// Control add page // Control add page // Control add page // Control add page
// Control add page // Control add page // Control add page // Control add page



































// control edit page control edit page control edit page control edit page
// control edit page control edit page control edit page control edit page
// control edit page control edit page control edit page control edit page
if($('#checkPage').val() == "editproject.html")
{

// กำหนดค่า Comma ให้ตอนเปิด page
$('#em_forcastmoney1 , #em_forcastmoney2 , #em_forcastmoney3 ,#em_forcastuse1 , #em_forcastuse2 , #em_forcastuse3 , #em_ideaprice').val(function (index, value) {
    value = value.replace(/,/g, '');
    return numberWithCommas(value);
});






    // Check number input Check number input Check number input
// Check number input Check number input Check number input
// Check number input Check number input Check number input
// Control ปริมาณปีที่จะใช้
$('#em_productuse').keyup(function(){
    // Control ให้กรอกเฉพาะตัวเลข
    let checkNumber_m_productuse = /[^A-Za-zก-เ]/.test($(this).val());
    if($('#em_productuse').val() != ''){
        if(checkNumber_m_productuse == false){
            $('#enotify_m_productuse').html('<div class="alert alert-danger" role="alert">กรุณาระบุเฉพาะตัวเลขเท่านั้น</div>');
            $('#em_productuse').val('');
        }else{
            $('#enotify_m_productuse').html('');
        }
    }
    // Control ให้กรอกเฉพาะตัวเลข  
});
// Control ปริมาณปีที่จะใช้


// Control Idea price
$('#em_ideaprice').keyup(function(){

    // Control ให้กรอกเฉพาะตัวเลข
    let checkNumber_ideaprice = /[^A-Za-zก-เ]/.test($(this).val());
    if($('#em_ideaprice').val() != ''){
        if(checkNumber_ideaprice == false){
            $('#enotify_m_ideaprice').html('<div class="alert alert-danger" role="alert">กรุณาระบุเฉพาะตัวเลขเท่านั้น</div>');
            $('#em_ideaprice').val('');
        }else{
            $('#enotify_m_ideaprice').html('');
        }
    }
    // Control ให้กรอกเฉพาะตัวเลข 
});
// Control Idea price


// Control m_forcaseuse1
$('#em_forcastuse1').keyup(function(){
    // Control ให้กรอกเฉพาะตัวเลข
    let checkNumber_forcaseuse1 = /[^A-Za-zก-เ]/.test($(this).val());
    if($('#em_forcastuse1').val() != ''){
        if(checkNumber_forcaseuse1 == false){
            $('#enotify_m_forcastuse1').html('<div class="alert alert-danger" role="alert">กรุณาระบุเฉพาะตัวเลขเท่านั้น</div>');
            $('#em_forcastuse1').val('');
        }else{
            $('#enotify_m_forcastuse1').html('');
        }
    }
    // Control ให้กรอกเฉพาะตัวเลข 
})
// Control m_forcaseuse1




// Control m_forcaseuse2
$('#em_forcastuse2').keyup(function(){
    // Control ให้กรอกเฉพาะตัวเลข
    let checkNumber_forcaseuse2 = /[^A-Za-zก-เ]/.test($(this).val());
    if($('#em_forcastuse2').val() != ''){
        if(checkNumber_forcaseuse2 == false){
            $('#enotify_m_forcastuse2').html('<div class="alert alert-danger" role="alert">กรุณาระบุเฉพาะตัวเลขเท่านั้น</div>');
            $('#em_forcastuse2').val('');
        }else{
            $('#enotify_m_forcastuse2').html('');
        }
    }
    // Control ให้กรอกเฉพาะตัวเลข 
})
// Control m_forcaseuse2




// Control m_forcaseuse3
$('#em_forcastuse3').keyup(function(){
    // Control ให้กรอกเฉพาะตัวเลข
    let checkNumber_forcaseuse3 = /[^A-Za-zก-เ]/.test($(this).val());
    if($('#em_forcastuse3').val() != ''){
        if(checkNumber_forcaseuse3 == false){
            $('#enotify_m_forcastuse3').html('<div class="alert alert-danger" role="alert">กรุณาระบุเฉพาะตัวเลขเท่านั้น</div>');
            $('#em_forcastuse3').val('');
        }else{
            $('#enotify_m_forcastuse3').html('');
        }
    }
    // Control ให้กรอกเฉพาะตัวเลข 
})
// Control m_forcaseuse3
// Check number input Check number input Check number input
// Check number input Check number input Check number input
// Check number input Check number input Check number input


// Check ค่าว่างก่อนที่จะกรอกประมาณการณ์ยอดการใช้ Check ค่าว่างก่อนที่จะกรอกประมาณการณ์ยอดการใช้
// Check ค่าว่างก่อนที่จะกรอกประมาณการณ์ยอดการใช้ Check ค่าว่างก่อนที่จะกรอกประมาณการณ์ยอดการใช้
// Check ค่าว่างก่อนที่จะกรอกประมาณการณ์ยอดการใช้ Check ค่าว่างก่อนที่จะกรอกประมาณการณ์ยอดการใช้
// Control m_forcaseuse1
$('#em_forcastuse1').focus(function(){
    if($('#em_ideaprice').val() == ''){
        $('#enotify_m_ideaprice').html('<div class="alert alert-danger" role="alert">กรุณาระบุ Idea price ด้วยค่ะ</div>');
    }else{
        $('#enotify_m_ideaprice').html('');
    }

    if($('#em_percensuccess option:selected').val() == ''){
        $('#enotify_m_percensuccess').html('<div class="alert alert-danger" role="alert">กรุณาเลือก เปอร์เซ็นความสำเร็จ ด้วยค่ะ</div>');
    }else{
        $('#enotify_m_percensuccess').html('');
    }
});
$('#em_forcastuse1').blur(function(){
    if($('#em_ideaprice').val() == ''){
        $('#enotify_m_ideaprice').html('<div class="alert alert-danger" role="alert">กรุณากรอก Idea price ด้วยค่ะ</div>');
        $('#em_forcastuse1').val('');
    }else{
        $('#enotify_m_ideaprice').html('');
    }

    if($('#em_percensuccess option:selected').val() == ''){
        $('#enotify_m_percensuccess').html('<div class="alert alert-danger" role="alert">กรุณาเลือก เปอร์เซ็นความสำเร็จ ด้วยค่ะ</div>');
        $('#em_forcastuse1').val('');
    }else{
        $('#enotify_m_percensuccess').html('');
    }
});
// Control m_forcaseuse1


// Control m_forcaseuse2
$('#em_forcastuse2').focus(function(){
    if($('#em_ideaprice').val() == ''){
        $('#enotify_m_ideaprice').html('<div class="alert alert-danger" role="alert"> กรุณากรอก Idea price ด้วยค่ะ</div>');
    }else{
        $('#enotify_m_ideaprice').html('');
    }

    if($('#em_percensuccess option:selected').val() == ''){
        $('#enotify_m_percensuccess').html('<div class="alert alert-danger" role="alert"> กรุณาเลือก เปอร์เซ็นความสำเร็จ ด้วยค่ะ</div>');
    }else{
        $('#enotify_m_percensuccess').html('');
    }
});
$('#em_forcastuse2').blur(function(){
    if($('#em_ideaprice').val() == ''){
        $('#enotify_m_ideaprice').html('<div class="alert alert-danger" role="alert"> กรุณากรอก Idea price ด้วยค่ะ</div>');
        $('#em_forcastuse1').val('');
    }else{
        $('#enotify_m_ideaprice').html('');
    }

    if($('#em_percensuccess option:selected').val() == ''){
        $('#enotify_m_percensuccess').html('<div class="alert alert-danger" role="alert"> กรุณาเลือก เปอร์เซ็นความสำเร็จ ด้วยค่ะ</div>');
        $('#em_forcastuse1').val('');
    }else{
        $('#enotify_m_percensuccess').html('');
    }
});
// Control m_forcaseuse2



// Control m_forcaseuse3
$('#em_forcastuse3').focus(function(){
    if($('#em_ideaprice').val() == ''){
        $('#enotify_m_ideaprice').html('<div class="alert alert-danger" role="alert"> กรุณากรอก Idea price ด้วยค่ะ</div>');
    }else{
        $('#enotify_m_ideaprice').html('');
    }

    if($('#em_percensuccess option:selected').val() == ''){
        $('#enotify_m_percensuccess').html('<div class="alert alert-danger" role="alert"> กรุณาเลือก เปอร์เซ็นความสำเร็จ ด้วยค่ะ</div>');
    }else{
        $('#enotify_m_percensuccess').html('');
    }
});
$('#em_forcastuse3').blur(function(){
    if($('#em_ideaprice').val() == ''){
        $('#enotify_m_ideaprice').html('<div class="alert alert-danger" role="alert"> กรุณากรอก Idea price ด้วยค่ะ</div>');
        $('#em_forcastuse1').val('');
    }else{
        $('#enotify_m_ideaprice').html('');
    }

    if($('#em_percensuccess option:selected').val() == ''){
        $('#enotify_m_percensuccess').html('<div class="alert alert-danger" role="alert"> กรุณาเลือก เปอร์เซ็นความสำเร็จ ด้วยค่ะ</div>');
        $('#em_forcastuse1').val('');
    }else{
        $('#enotify_m_percensuccess').html('');
    }
});
// Control m_forcaseuse3


// Check ค่าว่างก่อนที่จะกรอกประมาณการณ์ยอดการใช้ Check ค่าว่างก่อนที่จะกรอกประมาณการณ์ยอดการใช้
// Check ค่าว่างก่อนที่จะกรอกประมาณการณ์ยอดการใช้ Check ค่าว่างก่อนที่จะกรอกประมาณการณ์ยอดการใช้
// Check ค่าว่างก่อนที่จะกรอกประมาณการณ์ยอดการใช้ Check ค่าว่างก่อนที่จะกรอกประมาณการณ์ยอดการใช้


    // For case use 1
    $('#em_forcastuse1').keyup(function() {
        $('#em_forcastmoney1').val( (parseFloat($('#em_forcastuse1').val()) * parseFloat($('#em_ideaprice').val())) * parseFloat($('#em_percensuccess').val())/100 );
    });
    $('#em_ideaprice').keyup(function() {
        $('#em_forcastmoney1').val( (parseFloat($('#em_forcastuse1').val()) * parseFloat($('#em_ideaprice').val())) * parseFloat($('#em_percensuccess').val())/100 );
    });
    $('#em_percensuccess').change(function() {
        $('#em_forcastmoney1').val( (parseFloat($('#em_forcastuse1').val()) * parseFloat($('#em_ideaprice').val())) * parseFloat($('#em_percensuccess').val())/100 );
    });
    // For case use 1



    // For case use 2
    $('#em_forcastuse2').keyup(function() {
        $('#em_forcastmoney2').val( (parseFloat($('#em_forcastuse2').val()) * parseFloat($('#em_ideaprice').val())) * parseFloat($('#em_percensuccess').val())/100 );
    });
    $('#em_ideaprice').keyup(function() {
        $('#em_forcastmoney2').val( (parseFloat($('#em_forcastuse2').val()) * parseFloat($('#em_ideaprice').val())) * parseFloat($('#em_percensuccess').val())/100 );
    });
    $('#em_percensuccess').change(function() {
        $('#em_forcastmoney2').val( (parseFloat($('#em_forcastuse2').val()) * parseFloat($('#em_ideaprice').val())) * parseFloat($('#em_percensuccess').val())/100 );
    });
     // For case use 2



    // For case use 3
    $('#em_forcastuse3').keyup(function() {
        $('#em_forcastmoney3').val( (parseFloat($('#em_forcastuse3').val()) * parseFloat($('#em_ideaprice').val())) * parseFloat($('#em_percensuccess').val())/100 );
    });
    $('#em_ideaprice').keyup(function() {
        $('#em_forcastmoney3').val( (parseFloat($('#em_forcastuse3').val()) * parseFloat($('#em_ideaprice').val())) * parseFloat($('#em_percensuccess').val())/100 );
    });
    $('#em_percensuccess').change(function() {
        $('#em_forcastmoney3').val( (parseFloat($('#em_forcastuse3').val()) * parseFloat($('#em_ideaprice').val())) * parseFloat($('#em_percensuccess').val())/100 );
    });
    // For case use 3



    // Control Comma input Control Comma input Control Comma input
    // Control Comma input Control Comma input Control Comma input
    // Control Comma input Control Comma input Control Comma input

    // Convert Currency to comma
    $('input[name="em_productuse"] ,input[name="em_ideaprice"]').keyup(function (event) {/*****Comma function*******/
        // skip for arrow keys
        if (event.which >= 37 && event.which <= 40)
            return;
        // Function for use comma with decimal
        $(this).val(function (index, value) {
            value = value.replace(/,/g, '');
            return numberWithCommas(value);
        });
        // Function for use comma with decimal
    });


    $('#em_percensuccess').change(function (event) {/*****Comma function*******/
        // skip for arrow keys
        if (event.which >= 37 && event.which <= 40)
            return;
        // Function for use comma with decimal
        $(this).val(function (index, value) {
            value = value.replace(/,/g, '');
            return numberWithCommas(value);
        });
        $('input[id="em_forcastmoney1"]').val(function (index, value) {
            value = value.replace(/,/g, '');
            return numberWithCommas(value);
        });
        $('input[id="em_forcastmoney2"]').val(function (index, value) {
            value = value.replace(/,/g, '');
            return numberWithCommas(value);
        });
        $('input[id="em_forcastmoney3"]').val(function (index, value) {
            value = value.replace(/,/g, '');
            return numberWithCommas(value);
        });
        // Function for use comma with decimal
    });


    $('input[id="em_forcastuse1"]').keyup(function(){
        // Function for use comma with decimal
        $(this).val(function (index, value) {
            value = value.replace(/,/g, '');
            return numberWithCommas(value);
        });
        $('input[id="em_forcastmoney1"]').val(function (index, value) {
            value = value.replace(/,/g, '');
            return numberWithCommas(value);
        });
        // Function for use comma with decimal
    });

    $('input[id="em_forcastuse2"]').keyup(function(){
        // Function for use comma with decimal
        $(this).val(function (index, value) {
            value = value.replace(/,/g, '');
            return numberWithCommas(value);
        });
        $('input[id="em_forcastmoney2"]').val(function (index, value) {
            value = value.replace(/,/g, '');
            return numberWithCommas(value);
        });
        // Function for use comma with decimal
    });

    $('input[id="em_forcastuse3"]').keyup(function(){
        // Function for use comma with decimal
        $(this).val(function (index, value) {
            value = value.replace(/,/g, '');
            return numberWithCommas(value);
        });
        $('input[id="em_forcastmoney3"]').val(function (index, value) {
            value = value.replace(/,/g, '');
            return numberWithCommas(value);
        });
        // Function for use comma with decimal
    });

    $('input[id="em_ideaprice"]').keyup(function(){
        // Function for use comma with decimal
        $(this).val(function (index, value) {
            value = value.replace(/,/g, '');
            return numberWithCommas(value);
        });
        $('input[id="em_forcastmoney1"] , input[id="em_forcastmoney2"] , input[id="em_forcastmoney3"]').val(function (index, value) {
            value = value.replace(/,/g, '');
            return numberWithCommas(value);
        });
        // Function for use comma with decimal
    });

    // Control Comma input Control Comma input Control Comma input
    // Control Comma input Control Comma input Control Comma input
    // Control Comma input Control Comma input Control Comma input



}

// control edit page control edit page control edit page control edit page
// control edit page control edit page control edit page control edit page
// control edit page control edit page control edit page control edit page

































// control Addnew job page control Addnew job page control Addnew job page control Addnew job page
// control Addnew job page control Addnew job page control Addnew job page control Addnew job page
// control Addnew job page control Addnew job page control Addnew job page control Addnew job page
// control Addnew job page control Addnew job page control Addnew job page control Addnew job page
if($('#checkPage').val() == "addnewjob.html")
{

// กำหนดค่า Comma ให้ตอนเปิด page
$('#nm_forcastmoney1 , #nm_forcastmoney2 , #nm_forcastmoney3 ,#nm_forcastuse1 , #nm_forcastuse2 , #nm_forcastuse3 , #nm_ideaprice').val(function (index, value) {
    value = value.replace(/,/g, '');
    return numberWithCommas(value);
});
// Check number input Check number input Check number input
// Check number input Check number input Check number input
// Check number input Check number input Check number input
// Control ปริมาณปีที่จะใช้
$('#nm_productuse').keyup(function(){
    // Control ให้กรอกเฉพาะตัวเลข
    let checkNumber_m_productuse = /[^A-Za-zก-เ]/.test($(this).val());
    if($('#nm_productuse').val() != ''){
        if(checkNumber_m_productuse == false){
            $('#nnotify_m_productuse').html('<div class="alert alert-danger" role="alert">กรุณาระบุเฉพาะตัวเลขเท่านั้น</div>');
            $('#nm_productuse').val('');
        }else{
            $('#nnotify_m_productuse').html('');
        }
    }
    // Control ให้กรอกเฉพาะตัวเลข  
});
// Control ปริมาณปีที่จะใช้


// Control Idea price
$('#nm_ideaprice').keyup(function(){

    // Control ให้กรอกเฉพาะตัวเลข
    let checkNumber_ideaprice = /[^A-Za-zก-เ]/.test($(this).val());
    if($('#nm_ideaprice').val() != ''){
        if(checkNumber_ideaprice == false){
            $('#nnotify_m_ideaprice').html('<div class="alert alert-danger" role="alert">กรุณาระบุเฉพาะตัวเลขเท่านั้น</div>');
            $('#nm_ideaprice').val('');
        }else{
            $('#nnotify_m_ideaprice').html('');
        }
    }
    // Control ให้กรอกเฉพาะตัวเลข 
});
// Control Idea price


// Control m_forcaseuse1
$('#nm_forcastuse1').keyup(function(){
    // Control ให้กรอกเฉพาะตัวเลข
    let checkNumber_forcaseuse1 = /[^A-Za-zก-เ]/.test($(this).val());
    if($('#nm_forcastuse1').val() != ''){
        if(checkNumber_forcaseuse1 == false){
            $('#nnotify_m_forcastuse1').html('<div class="alert alert-danger" role="alert">กรุณาระบุเฉพาะตัวเลขเท่านั้น</div>');
            $('#nm_forcastuse1').val('');
        }else{
            $('#nnotify_m_forcastuse1').html('');
        }
    }
    // Control ให้กรอกเฉพาะตัวเลข 
})
// Control m_forcaseuse1




// Control m_forcaseuse2
$('#nm_forcastuse2').keyup(function(){
    // Control ให้กรอกเฉพาะตัวเลข
    let checkNumber_forcaseuse2 = /[^A-Za-zก-เ]/.test($(this).val());
    if($('#nm_forcastuse2').val() != ''){
        if(checkNumber_forcaseuse2 == false){
            $('#nnotify_m_forcastuse2').html('<div class="alert alert-danger" role="alert">กรุณาระบุเฉพาะตัวเลขเท่านั้น</div>');
            $('#nm_forcastuse2').val('');
        }else{
            $('#nnotify_m_forcastuse2').html('');
        }
    }
    // Control ให้กรอกเฉพาะตัวเลข 
})
// Control m_forcaseuse2




// Control m_forcaseuse3
$('#nm_forcastuse3').keyup(function(){
    // Control ให้กรอกเฉพาะตัวเลข
    let checkNumber_forcaseuse3 = /[^A-Za-zก-เ]/.test($(this).val());
    if($('#nm_forcastuse3').val() != ''){
        if(checkNumber_forcaseuse3 == false){
            $('#nnotify_m_forcastuse3').html('<div class="alert alert-danger" role="alert">กรุณาระบุเฉพาะตัวเลขเท่านั้น</div>');
            $('#nm_forcastuse3').val('');
        }else{
            $('#nnotify_m_forcastuse3').html('');
        }
    }
    // Control ให้กรอกเฉพาะตัวเลข 
})
// Control m_forcaseuse3
// Check number input Check number input Check number input
// Check number input Check number input Check number input
// Check number input Check number input Check number input




// Check ค่าว่างก่อนที่จะกรอกประมาณการณ์ยอดการใช้ Check ค่าว่างก่อนที่จะกรอกประมาณการณ์ยอดการใช้
// Check ค่าว่างก่อนที่จะกรอกประมาณการณ์ยอดการใช้ Check ค่าว่างก่อนที่จะกรอกประมาณการณ์ยอดการใช้
// Check ค่าว่างก่อนที่จะกรอกประมาณการณ์ยอดการใช้ Check ค่าว่างก่อนที่จะกรอกประมาณการณ์ยอดการใช้
// Control m_forcaseuse1
$('#nm_forcastuse1').focus(function(){
    if($('#nm_ideaprice').val() == ''){
        $('#nnotify_m_ideaprice').html('<div class="alert alert-danger" role="alert">กรุณาระบุ Idea price ด้วยค่ะ</div>');
    }else{
        $('#nnotify_m_ideaprice').html('');
    }

    if($('#nm_percensuccess option:selected').val() == ''){
        $('#nnotify_m_percensuccess').html('<div class="alert alert-danger" role="alert">กรุณาเลือก เปอร์เซ็นความสำเร็จ ด้วยค่ะ</div>');
    }else{
        $('#nnotify_m_percensuccess').html('');
    }
});
$('#nm_forcastuse1').blur(function(){
    if($('#nm_ideaprice').val() == ''){
        $('#nnotify_m_ideaprice').html('<div class="alert alert-danger" role="alert">กรุณากรอก Idea price ด้วยค่ะ</div>');
        $('#nm_forcastuse1').val('');
    }else{
        $('#nnotify_m_ideaprice').html('');
    }

    if($('#nm_percensuccess option:selected').val() == ''){
        $('#nnotify_m_percensuccess').html('<div class="alert alert-danger" role="alert">กรุณาเลือก เปอร์เซ็นความสำเร็จ ด้วยค่ะ</div>');
        $('#nm_forcastuse1').val('');
    }else{
        $('#nnotify_m_percensuccess').html('');
    }
});
// Control m_forcaseuse1


// Control m_forcaseuse2
$('#nm_forcastuse2').focus(function(){
    if($('#nm_ideaprice').val() == ''){
        $('#nnotify_m_ideaprice').html('<div class="alert alert-danger" role="alert"> กรุณากรอก Idea price ด้วยค่ะ</div>');
    }else{
        $('#nnotify_m_ideaprice').html('');
    }

    if($('#nm_percensuccess option:selected').val() == ''){
        $('#nnotify_m_percensuccess').html('<div class="alert alert-danger" role="alert"> กรุณาเลือก เปอร์เซ็นความสำเร็จ ด้วยค่ะ</div>');
    }else{
        $('#nnotify_m_percensuccess').html('');
    }
});
$('#nm_forcastuse2').blur(function(){
    if($('#nm_ideaprice').val() == ''){
        $('#nnotify_m_ideaprice').html('<div class="alert alert-danger" role="alert"> กรุณากรอก Idea price ด้วยค่ะ</div>');
        $('#nm_forcastuse1').val('');
    }else{
        $('#nnotify_m_ideaprice').html('');
    }

    if($('#nm_percensuccess option:selected').val() == ''){
        $('#nnotify_m_percensuccess').html('<div class="alert alert-danger" role="alert"> กรุณาเลือก เปอร์เซ็นความสำเร็จ ด้วยค่ะ</div>');
        $('#nm_forcastuse1').val('');
    }else{
        $('#nnotify_m_percensuccess').html('');
    }
});
// Control m_forcaseuse2



// Control m_forcaseuse3
$('#nm_forcastuse3').focus(function(){
    if($('#nm_ideaprice').val() == ''){
        $('#nnotify_m_ideaprice').html('<div class="alert alert-danger" role="alert"> กรุณากรอก Idea price ด้วยค่ะ</div>');
    }else{
        $('#nnotify_m_ideaprice').html('');
    }

    if($('#nm_percensuccess option:selected').val() == ''){
        $('#nnotify_m_percensuccess').html('<div class="alert alert-danger" role="alert"> กรุณาเลือก เปอร์เซ็นความสำเร็จ ด้วยค่ะ</div>');
    }else{
        $('#nnotify_m_percensuccess').html('');
    }
});
$('#nm_forcastuse3').blur(function(){
    if($('#nm_ideaprice').val() == ''){
        $('#nnotify_m_ideaprice').html('<div class="alert alert-danger" role="alert"> กรุณากรอก Idea price ด้วยค่ะ</div>');
        $('#nm_forcastuse1').val('');
    }else{
        $('#nnotify_m_ideaprice').html('');
    }

    if($('#nm_percensuccess option:selected').val() == ''){
        $('#nnotify_m_percensuccess').html('<div class="alert alert-danger" role="alert"> กรุณาเลือก เปอร์เซ็นความสำเร็จ ด้วยค่ะ</div>');
        $('#nm_forcastuse1').val('');
    }else{
        $('#nnotify_m_percensuccess').html('');
    }
});
// Control m_forcaseuse3


// Check ค่าว่างก่อนที่จะกรอกประมาณการณ์ยอดการใช้ Check ค่าว่างก่อนที่จะกรอกประมาณการณ์ยอดการใช้
// Check ค่าว่างก่อนที่จะกรอกประมาณการณ์ยอดการใช้ Check ค่าว่างก่อนที่จะกรอกประมาณการณ์ยอดการใช้
// Check ค่าว่างก่อนที่จะกรอกประมาณการณ์ยอดการใช้ Check ค่าว่างก่อนที่จะกรอกประมาณการณ์ยอดการใช้


    // For case use 1
    $('#nm_forcastuse1').keyup(function() {
        $('#nm_forcastmoney1').val( (parseFloat($('#nm_forcastuse1').val()) * parseFloat($('#nm_ideaprice').val())) * parseFloat($('#nm_percensuccess').val())/100 );
    });
    $('#nm_ideaprice').keyup(function() {
        $('#nm_forcastmoney1').val( (parseFloat($('#nm_forcastuse1').val()) * parseFloat($('#nm_ideaprice').val())) * parseFloat($('#nm_percensuccess').val())/100 );
    });
    $('#nm_percensuccess').change(function() {
        $('#nm_forcastmoney1').val( (parseFloat($('#nm_forcastuse1').val()) * parseFloat($('#nm_ideaprice').val())) * parseFloat($('#nm_percensuccess').val())/100 );
    });
    // For case use 1



    // For case use 2
    $('#nm_forcastuse2').keyup(function() {
        $('#nm_forcastmoney2').val( (parseFloat($('#nm_forcastuse2').val()) * parseFloat($('#nm_ideaprice').val())) * parseFloat($('#nm_percensuccess').val())/100 );
    });
    $('#nm_ideaprice').keyup(function() {
        $('#nm_forcastmoney2').val( (parseFloat($('#nm_forcastuse2').val()) * parseFloat($('#nm_ideaprice').val())) * parseFloat($('#nm_percensuccess').val())/100 );
    });
    $('#nm_percensuccess').change(function() {
        $('#nm_forcastmoney2').val( (parseFloat($('#nm_forcastuse2').val()) * parseFloat($('#nm_ideaprice').val())) * parseFloat($('#nm_percensuccess').val())/100 );
    });
     // For case use 2



    // For case use 3
    $('#nm_forcastuse3').keyup(function() {
        $('#nm_forcastmoney3').val( (parseFloat($('#nm_forcastuse3').val()) * parseFloat($('#nm_ideaprice').val())) * parseFloat($('#nm_percensuccess').val())/100 );
    });
    $('#nm_ideaprice').keyup(function() {
        $('#nm_forcastmoney3').val( (parseFloat($('#nm_forcastuse3').val()) * parseFloat($('#nm_ideaprice').val())) * parseFloat($('#nm_percensuccess').val())/100 );
    });
    $('#nm_percensuccess').change(function() {
        $('#nm_forcastmoney3').val( (parseFloat($('#nm_forcastuse3').val()) * parseFloat($('#nm_ideaprice').val())) * parseFloat($('#nm_percensuccess').val())/100 );
    });
    // For case use 3



    // Control Comma input Control Comma input Control Comma input
    // Control Comma input Control Comma input Control Comma input
    // Control Comma input Control Comma input Control Comma input

    // Convert Currency to comma
    $('input[name="nm_productuse"] ,input[name="nm_ideaprice"]').keyup(function (event) {/*****Comma function*******/
        // skip for arrow keys
        if (event.which >= 37 && event.which <= 40)
            return;
        // Function for use comma with decimal
        $(this).val(function (index, value) {
            value = value.replace(/,/g, '');
            return numberWithCommas(value);
        });
        // Function for use comma with decimal
    });


    $('#nm_percensuccess').change(function (event) {/*****Comma function*******/
        // skip for arrow keys
        if (event.which >= 37 && event.which <= 40)
            return;
        // Function for use comma with decimal
        $(this).val(function (index, value) {
            value = value.replace(/,/g, '');
            return numberWithCommas(value);
        });
        $('input[id="nm_forcastmoney1"]').val(function (index, value) {
            value = value.replace(/,/g, '');
            return numberWithCommas(value);
        });
        $('input[id="nm_forcastmoney2"]').val(function (index, value) {
            value = value.replace(/,/g, '');
            return numberWithCommas(value);
        });
        $('input[id="nm_forcastmoney3"]').val(function (index, value) {
            value = value.replace(/,/g, '');
            return numberWithCommas(value);
        });
        // Function for use comma with decimal
    });


    $('input[id="nm_forcastuse1"]').keyup(function(){
        // Function for use comma with decimal
        $(this).val(function (index, value) {
            value = value.replace(/,/g, '');
            return numberWithCommas(value);
        });
        $('input[id="nm_forcastmoney1"]').val(function (index, value) {
            value = value.replace(/,/g, '');
            return numberWithCommas(value);
        });
        // Function for use comma with decimal
    });

    $('input[id="nm_forcastuse2"]').keyup(function(){
        // Function for use comma with decimal
        $(this).val(function (index, value) {
            value = value.replace(/,/g, '');
            return numberWithCommas(value);
        });
        $('input[id="nm_forcastmoney2"]').val(function (index, value) {
            value = value.replace(/,/g, '');
            return numberWithCommas(value);
        });
        // Function for use comma with decimal
    });

    $('input[id="nm_forcastuse3"]').keyup(function(){
        // Function for use comma with decimal
        $(this).val(function (index, value) {
            value = value.replace(/,/g, '');
            return numberWithCommas(value);
        });
        $('input[id="nm_forcastmoney3"]').val(function (index, value) {
            value = value.replace(/,/g, '');
            return numberWithCommas(value);
        });
        // Function for use comma with decimal
    });

    $('input[id="nm_ideaprice"]').keyup(function(){
        // Function for use comma with decimal
        $(this).val(function (index, value) {
            value = value.replace(/,/g, '');
            return numberWithCommas(value);
        });
        $('input[id="nm_forcastmoney1"] , input[id="nm_forcastmoney2"] , input[id="nm_forcastmoney3"]').val(function (index, value) {
            value = value.replace(/,/g, '');
            return numberWithCommas(value);
        });
        // Function for use comma with decimal
    });

    // Control Comma input Control Comma input Control Comma input
    // Control Comma input Control Comma input Control Comma input
    // Control Comma input Control Comma input Control Comma input
    
}
// control Addnew job page control Addnew job page control Addnew job page control Addnew job page
// control Addnew job page control Addnew job page control Addnew job page control Addnew job page
// control Addnew job page control Addnew job page control Addnew job page control Addnew job page
// control Addnew job page control Addnew job page control Addnew job page control Addnew job page



























// control viewfull page control viewfull page control viewfull page control viewfull page
// control viewfull page control viewfull page control viewfull page control viewfull page
// control viewfull page control viewfull page control viewfull page control viewfull page
// control viewfull page control viewfull page control viewfull page control viewfull page
if($('#checkPage').val() == "viewfulldata.html")
{
    $('.comma_f_money , .comma_f_use').text(function (index, value) {
        value = value.replace(/,/g, '');
        return numberWithCommas(value);
    });


    // Control ปุ่ม เพิ่มไอเท็มใหม่ Control ปุ่ม เพิ่มไอเท็มใหม่
    // Control ปุ่ม เพิ่มไอเท็มใหม่ Control ปุ่ม เพิ่มไอเท็มใหม่
    $('#addNewItem').css("display" , "none");
        if($('#checkSubStatus').val() == "fail"){
            $('#addNewItem').css("display" , "");
        }else{
            $('#addNewItem').css("display" , "none");
        }
    // Control ปุ่ม เพิ่มไอเท็มใหม่ Control ปุ่ม เพิ่มไอเท็มใหม่
    // Control ปุ่ม เพิ่มไอเท็มใหม่ Control ปุ่ม เพิ่มไอเท็มใหม่
}
// control viewfull page control viewfull page control viewfull page control viewfull page
// control viewfull page control viewfull page control viewfull page control viewfull page
// control viewfull page control viewfull page control viewfull page control viewfull page
// control viewfull page control viewfull page control viewfull page control viewfull page







if($('#check_reportpage').val() == "report.html")
{

    load_report();

    $('#btn_datesearch').click(function(){
        load_reportDate($('#report_datestart').val(), $('#report_dateend').val());
    });

    $('#btn_datereset').click(function () {
        location.reload();
    });
}


















// Control รูปภาพแสดงผลของเปอร์เซ็น
$(".distanceImage").progressPie({
    color:"#FF6600"
});
$(".percensuccessImage").progressPie({
    color:"#009900"
});
// Control รูปภาพแสดงผลของเปอร์เซ็น



// Control การส่งค่าจาก Form ไปยัง Modal

    $('#btnAddComment').click(function(){
        let data_subid = $(this).attr("data_subid");
        let data_masid = $(this).attr("data_masid");

        $('#trn_msid').val(data_subid);
        $('#trn_procode').val(data_masid);
    });

// Control การส่งค่าจาก Form ไปยัง Modal




// Control การบันทึกค่าจาก Modal ลง Database

    $('#btnSaveComment').click(function(){
        saveComment();
    });

// Control การบันทึกค่าจาก Modal ลง Database














}); // End Control js
