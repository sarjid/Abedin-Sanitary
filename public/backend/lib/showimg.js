function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#one')
                .attr('src', e.target.result)
                .width(83)
                .height(88);
        };
        reader.readAsDataURL(input.files[0]);
    }
 }

 function readURL1(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#two')
                .attr('src', e.target.result)
                .width(83)
                .height(88);
        };
        reader.readAsDataURL(input.files[0]);
    }
 }

 function readURL2(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#three')
                .attr('src', e.target.result)
                .width(83)
                .height(88);
        };
        reader.readAsDataURL(input.files[0]);
    }
 }

 function readURLpost(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#post_img')
                .attr('src', e.target.result)
                .width(158)
                .height(88);
        };
        reader.readAsDataURL(input.files[0]);
    }
 }

 function readURLlogo(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#logo')
                .attr('src', e.target.result)
                .width(204)
                .height(70);
        };
        reader.readAsDataURL(input.files[0]);
    }
 }