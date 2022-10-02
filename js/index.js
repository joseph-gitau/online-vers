// On page load or when changing themes, best to add inline in `head` to avoid FOUC
if (
    localStorage.getItem("color-theme") === "dark" ||
    (!("color-theme" in localStorage) &&
        window.matchMedia("(prefers-color-scheme: dark)").matches)
) {
    document.documentElement.classList.add("dark");
} else {
    document.documentElement.classList.remove("dark");
}
$(document).ready(function () {
    var themeToggleDarkIcon = document.getElementById("theme-toggle-dark-icon");
    var themeToggleLightIcon = document.getElementById(
        "theme-toggle-light-icon"
    );

    // Change the icons inside the button based on previous settings
    if (
        localStorage.getItem("color-theme") === "dark" ||
        (!("color-theme" in localStorage) &&
            window.matchMedia("(prefers-color-scheme: dark)").matches)
    ) {
        themeToggleLightIcon.classList.remove("hidden");
    } else {
        themeToggleDarkIcon.classList.remove("hidden");
    }

    var themeToggleBtn = document.getElementById("theme-toggle");

    themeToggleBtn.addEventListener("click", function () {
        // toggle icons inside button
        themeToggleDarkIcon.classList.toggle("hidden");
        themeToggleLightIcon.classList.toggle("hidden");

        // if set via local storage previously
        if (localStorage.getItem("color-theme")) {
            if (localStorage.getItem("color-theme") === "light") {
                document.documentElement.classList.add("dark");
                localStorage.setItem("color-theme", "dark");
            } else {
                document.documentElement.classList.remove("dark");
                localStorage.setItem("color-theme", "light");
            }

            // if NOT set via local storage previously
        } else {
            if (document.documentElement.classList.contains("dark")) {
                document.documentElement.classList.remove("dark");
                localStorage.setItem("color-theme", "light");
            } else {
                document.documentElement.classList.add("dark");
                localStorage.setItem("color-theme", "dark");
            }
        }
    });
    // v2xwa3
    var themeToggleDarkIcon2 = document.getElementById(
        "theme-toggle-dark-icon2"
    );
    var themeToggleLightIcon2 = document.getElementById(
        "theme-toggle-light-icon2"
    );

    // Change the icons inside the button based on previous settings
    if (
        localStorage.getItem("color-theme") === "dark" ||
        (!("color-theme" in localStorage) &&
            window.matchMedia("(prefers-color-scheme: dark)").matches)
    ) {
        themeToggleLightIcon2.classList.remove("hidden");
    } else {
        themeToggleDarkIcon2.classList.remove("hidden");
    }

    var themeToggleBtn2 = document.getElementById("theme-toggle2");

    themeToggleBtn2.addEventListener("click", function () {
        // toggle icons inside button
        themeToggleDarkIcon2.classList.toggle("hidden");
        themeToggleLightIcon2.classList.toggle("hidden");

        // if set via local storage previously
        if (localStorage.getItem("color-theme")) {
            if (localStorage.getItem("color-theme") === "light") {
                document.documentElement.classList.add("dark");
                localStorage.setItem("color-theme", "dark");
            } else {
                document.documentElement.classList.remove("dark");
                localStorage.setItem("color-theme", "light");
            }

            // if NOT set via local storage previously
        } else {
            if (document.documentElement.classList.contains("dark")) {
                document.documentElement.classList.remove("dark");
                localStorage.setItem("color-theme", "light");
            } else {
                document.documentElement.classList.add("dark");
                localStorage.setItem("color-theme", "dark");
            }
        }
    });
});
// loaders
// $(window).on("load", function () {
//     $("#loadergif").fadeOut("slow");
//     console.clear();
// });

// search
$(document).ready(function () {
    $("#loadergif").delay(2000).fadeOut("slow");
    $('.normal-search input[type="text"]').on("keyup input", function () {
        /* Get input value on change */
        var inputVal = $(this).val();
        console.log(inputVal);
        var resultDropdown = $(".results");
        // console.log(resultDropdown);
        if (inputVal.length) {
            $(".loader-se").show();
            $.get("/search/" + inputVal, {
                // term: inputVal,
            }).done(function (data) {
                // Display the returned data in browser
                resultDropdown.html(data);
                if (resultDropdown.length > 0) {
                    $(".loader-se").hide();
                }
            });
        } else {
            resultDropdown.empty();
        }
    });
    // setInterval(function(){
    //     fetch('https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js').catch(() => {
    //         const classExists = document.getElementsByClassName('adp-underlay').length > 0;
    //         if(classExists){
    //             console.clear();
    //         } else{
    //         	let adp_underlay = document.createElement('div');
    //         	adp_underlay.className = 'adp-underlay';
    //         	document.body.appendChild(adp_underlay);
    //         	let adp = document.createElement('div');
    //         	adp.className = 'adp';
    //         	adp.innerHTML = `
    //         		<h3>Ad Blocker Detected!</h3>
    //         		<p>We use advertisements to keep our website online, could you please whitelist our website, thanks!</p>
    //         		<a href="">Okay</a>
    //         	`;
    //         	document.body.appendChild(adp);

    //         	adp.querySelector('a').onclick = e => {
    //         		e.preventDefault();
    //         		document.body.removeChild(adp_underlay);
    //         		document.body.removeChild(adp);
    //         	};
    //         }
    //     });
    // }, 2000);
});

// show category on hover
$(document).ready(function () {
    $("#category").hover(
        function () {
            console.log("hover");
            $(".categoryms").removeClass("hidden");
        },
        function () {
            $(".categoryms").addClass("hidden");
        }
    );
});
