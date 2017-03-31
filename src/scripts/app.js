$(function() {

    webshim.setOptions('forms', {
        //set lazyCustomMessages to true
        lazyCustomMessages: true,
        //show custom styleable validation bubble
        replaceValidationUI: true
    });

    //start polyfilling
    webshim.polyfill('forms');

    function phoneLink() {
        var md = new MobileDetect(window.navigator.userAgent);
        var phoneLink = $(".phone-link");

        if (md.mobile()) {
            phoneLink.attr("href", "tel:" + $(".phone-link").data("phone"));
            phoneLink.removeClass("js-small-btn");
            console.log("mobile")
        } else {
            phoneLink.attr("href", "");
            phoneLink.addClass("js-small-btn");
            console.log("pc")
        }
    }
    phoneLink();

    // form handler
    var body = $("body");
    var name;

    $("input[name=phone]").inputmask({
        "mask": "+9(999)999-9999",
        greedy: false,
    });

    body.on("click", ".js-small-btn", function(e) {
        e.preventDefault();

        if (!$(".thanks").length) {
            body.addClass("form-open");
            $(".form-wrap_small").addClass("form-wrap_open");
        }
    });

    $("#smallForm, #bottomForm").submit(function(e) {
        e.preventDefault();
        $(".form-wrap_open").removeClass("form-wrap_open");

        var self = $(this);
        var selfName = self.find("input[name=name]");
        var selfPhone = self.find("input[name=phone]");
        var selfEmail = self.find("input[name=email]");
        var formData = self.serialize();
        console.log(formData);

        $("[name=name1]").val(selfName.val());
        $("[name=phone1]").val(selfPhone.val());
        $("[name=email1]").val(selfEmail.val());

        $.ajax({
            type: "POST",
            url: "php/send.php",
            data: formData,
            success: function(data) {
                //location = "thanks.html";
            }
        });

        body.addClass("form-open");
        $(".form-wrap_big").addClass("form-wrap_open");

        name = selfName.val();

        if (name) {
            localStorage.setItem("centoflawname", name + ", ");
        } else {
            localStorage.setItem("centoflawname", "");
        }
    });

    body.on("click", function(e) {
        var self = $(e.target);

        if (self.hasClass("form-wrap") || self.hasClass("form__close")) {
            body.removeClass("form-open");
            $(".form-wrap").removeClass("form-wrap_open");
        }
    });

    $("#bigForm").submit(function(e) {
        e.preventDefault();

        var self = $(this);
        var formData = self.serialize();

        $.ajax({
            type: "POST",
            url: "php/sendpresent.php",
            data: formData,
            success: function(data) {
                location = "thanks.html";
            }
        });
    });

    if ($("#thanksName").length) {
        $("#thanksName").text(localStorage.getItem("centoflawname"));
    };
    // form handler

});

