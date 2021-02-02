$(document).ready(function() {
    $("#signup").submit(function(e) {
        e.preventDefault();
        let pass = $("#pass").val();
        let cpass = $("#cpass").val();
        console.log(pass, cpass);
        $.ajax({
            type: 'POST',
            url: 'helper.php',
            data: $(this).serialize() + '&action=insert',
            success: function(data) {
                console.log(data);
            }
        })
    })
    $("#login").submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'helper.php',
            data: $(this).serialize() + '&action=show',
            success: function(data) {
                console.log(data);
                window.location.href = "index.php";
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
                console.log(data);
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
                console.log(data);
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
        $("#qnext").show();
        $("#back").show();
        var n = $("#select").val();
        var opt = $('input[name="opt"]:checked').val();
        if (id < 5) {
            $.ajax({
                type: 'POST',
                url: 'helper.php',
                data: {
                    'cname': n,
                    'id': id,
                    'marks': i,
                    'opt': opt,
                    'action': 'next'
                },
                success: function(data) {
                    if (data.match("&nbsp")) {
                        i = i + 5;
                        console.log(i);
                        $(".score").html(`<h1 class="pro">${i+5}</h1>`);
                        if (i > 10) {
                            $(".pass").html(`<h1 class="pro">Pass</h1>`);
                        } else {
                            $(".pass").html(`<h1 class="pro">Fail</h1>`);
                        }
                    } else {
                        $(".score").html(`<h1 class="pro">${i}</h1>`);
                        $(".pass").html(`<h1 class="pro">Fail</h1>`);
                    }
                    $(".contain").hide();
                    $(".data").html(data);
                }
            })
        } else {
            $(".five").hide();
            $(".sc").show();
            $(".pro").show();
            $(".sco").show();
        }
        id = id + 1;
    })
    $(".back").on('click', function() {
        id = id - 1;
        var n = $("#select").val();
        console.log(n);
        $.ajax({
            type: 'POST',
            url: 'helper.php',
            data: {
                'cname': n,
                'id': id,
                'action': 'next'
            },
            success: function(data) {
                // console.log(data);
                $(".contain").hide();
                $(".data").html(data);
            }
        })
    })
})