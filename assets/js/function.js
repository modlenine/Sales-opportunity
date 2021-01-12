

// Function Comma
function numberWithCommas(x) {
    var parts = x.toString().split(".");
    parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    return parts.join(".");
}
// Function Comma





// Function save comment to database

function saveComment()
{
    $.ajax({
        url:"/intsys/sop/savecomment.html",
        method:"POST",
        data:$('#saveComment').serialize(),
        success:function(data){
            console.log(data);
            window.location.reload();
        }
    });
}

// Function save comment to database