var b = 0;
$(document).ready(function() {
    $("#signup").submit(function(e) {
        e.preventDefault();
        let pass = $("#pass").val();
        let cpass = $("#cpass").val();
        if (pass == cpass) {
            //console.lo(pass, cpass);
            $.ajax({
                type: 'POST',
                url: 'helper.php',
                data: $(this).serialize() + '&action=insert',
                success: function(data) {
                    //console.lo(data);
                    if (data == 1) {
                        alert("successfuly signup");
                        window.location.href = "login.php";
                    } else {
                        alert("something went wrong");
                    }
                }
            })
        } else {
            alert("confirm password did not match");
        }
    })
    $("#login").submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'helper.php',
            data: $(this).serialize() + '&action=show',
            success: function(data) {
                //console.lo(data);
                if (data == 1) {

                    window.location.href = "index.php";
                } else {
                    alert("username and password did not match");
                }
            }
        })
    })
    $("#addquestion").submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: '../helper.php',
            data: $(this).serialize() + '&action=add',
            success: function(data) {
                console.log(this.data);
                if (data == 1) {
                    alert("inserted");
                    location.reload();
                } else {
                    alert("something went wrong");
                }
            }
        })
    })
    var id = 0;
    $(".next").on('click', function(e) {
        $(".r1").hide();
        $("#r2").show();
    })
    $("#category").on('click', function(e) {
        e.preventDefault();
        let cname = $("#c_name").val();
        console.log(cname);
        $.ajax({
            type: 'POST',
            url: '../helper.php',
            data: {
                'cname': cname,
                'action': 'create'
            },
            success: function(data) {
                //console.lo(data);
                if (data == 1) {
                    alert("inserted");
                    location.reload();
                } else {
                    alert("something went wrong");
                }
            }
        })
    })
    var i = 0;
    $(".qnext").on('click', function() {
        var a = $("#trig").prop('disabled', false);
        if (a.length == 1) {
            $("#t").show();
            setInterval(function() { myFunction(); }, 1000);
        } else {}
        var n = $("#select").val();
        $("#r2").hide();
        $("#regForm").show();
        $.ajax({
            type: 'POST',
            url: 'helper.php',
            data: {
                'cname': n,
                'action': 'next'
            },
            success: function(data) {
                // console.log(data);
                $(".tab").html(`${data}`);
            }
        })
    });

    $(".del").on('click', function() {
        let id = $(this).data("id");
        let a = confirm("are you sure you want to delete");
        // //console.lo(id);
        if (a == true) {
            $.ajax({
                type: 'POST',
                url: '../helper.php',
                data: { 'id': id, 'action': 'del' },
                success: function(data) {
                    //console.lo(data);
                    if (data == 1) {
                        location.reload();
                    } else {
                        //console.lo(data);

                    }
                }
            })
        } else {
            location.reload();
        }
    })

})
var sec = 10;
var min = 0;

function myFunction() {
    $(".timer").text(min + ":" + sec);
    sec = sec - 1;
    if (sec == 0) {
        min = min - 1;
        sec = 59;
    }
    if (min == -1 && sec == 59) {
        $("#regForm").hide();
        $(".score").show();
        $(".marks").text(marks);
        $(".right").text(right);
        $(".wrong").text(wrong);
        $(".notq").text(ques);
        $(".timer").hide();
    }
}